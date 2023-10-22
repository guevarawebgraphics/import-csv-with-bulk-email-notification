<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CSVImported;
use App\Jobs\RequestMailJob;
use Illuminate\Support\Facades\Queue;

class ImportController extends Controller
{
    public function index()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $file = $request->file('csv_file');

        $csvData = file_get_contents($file);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (!$row || count($row) != count($header)) continue; // skip empty rows
            $data = array_combine($header, $row); // changed from $user to $data


            if ($row[5]) {

                $checkExists = CSVImported::where('email', $row[5])->first();

                if( !empty($checkExists) ){
                    CSVImported::where('email', $row[5] )->update([
                        'company'     => $row[0] ?? null,     // Assuming 'company' is the first column
                        'first_name'  => $row[1] ?? null,     // Assuming 'first_name' is the second column
                        'last_name'   => $row[2] ?? null,     // ... and so on
                        'phone'       => $row[3] ?? null,
                        'mobile_phone'=> $row[4] ?? null,
                        'website'     => $row[6] ?? null,
                        'address'     => $row[7] ?? null,
                        'city'        => $row[8] ?? null,
                        'state'       => $row[9] ?? null,
                        'zip'         => $row[10] ?? null
                    ]);
                } else {
                    CSVImported::create([
                        'company'     => $row[0] ?? null,     // Assuming 'company' is the first column
                        'first_name'  => $row[1] ?? null,     // Assuming 'first_name' is the second column
                        'last_name'   => $row[2] ?? null,     // ... and so on
                        'phone'       => $row[3] ?? null,
                        'mobile_phone'=> $row[4] ?? null,
                        'email'       => $row[5] ?? null,
                        'website'     => $row[6] ?? null,
                        'address'     => $row[7] ?? null,
                        'city'        => $row[8] ?? null,
                        'state'       => $row[9] ?? null,
                        'zip'         => $row[10] ?? null,
                        'created_at'  => now(),
                        'updated_at'  => now()
                    ]);
                }


                $user_data = [
                    'company'     => $row[0] ?? null,
                    'first_name'  => $row[1] ?? null,
                    'last_name'   => $row[2] ?? null,
                    'phone'       => $row[3] ?? null,
                    'mobile_phone'=> $row[4] ?? null,
                    'email'       => $row[5] ?? null,
                    'website'     => $row[6] ?? null,
                    'address'     => $row[7] ?? null,
                    'city'        => $row[8] ?? null,
                    'state'       => $row[9] ?? null,
                    'zip'         => $row[10] ?? null,
                ];
                $job = new RequestMailJob($user_data);
                Queue::push($job);
                
            }
            

        }

        return redirect('/import')->with('success', 'Data imported successfully!');
    }

    public function verify($email) { 
        $data = CSVImported::where('email', $email)->first();
        if (empty($data)) {
            abort(404,404);
        }
        
        return view('verify', compact('data') );
    }

    public function confirmVerify(Request $request, $id) {
        $update = CSVImported::where('id', $id)->update(['is_verified'    =>   1]);
        return redirect()->back()->with('success','Successfully verified, Thank you!');
    }
}
