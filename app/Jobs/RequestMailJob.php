<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\RequestMail;
use Mail;

class RequestMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $arrayData;

    /**
     * Create a new job instance.
     */
    public function __construct($arrayData)
    {
        $this->arrayData = $arrayData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       $email = new RequestMail($this->arrayData);
        Mail::to($this->arrayData['email'])->send($email);
        
    }
}
