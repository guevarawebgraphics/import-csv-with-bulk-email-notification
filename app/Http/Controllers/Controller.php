<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Jobs\RequestMailJob;
use Illuminate\Support\Facades\Queue;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
    * test email queues
    **/
    public function sendRequestMail()
    {
        $job = new RequestMailJob();
        Queue::push($job);
    }
}
