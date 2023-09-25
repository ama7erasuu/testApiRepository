<?php

namespace App\Mail;

use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param Request $request
     */
    public function __construct(
        protected Request $request
    ){
    }

    /**
     * @return RequestShipped
     */
    public function build(): RequestShipped
    {
        return $this->view('mail.RequestLetter')->with('request', $this->request);
    }
}
