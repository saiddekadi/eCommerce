<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Recuperation extends Mailable
{
    use Queueable, SerializesModels;

    public $array;

    public function __construct(Array $array)
    {
        $this->array = $array;
    }

   
    public function build()
    {
        return $this->from('kadiatous100@gmail.com')
                ->view('emails.forgotPassword');
    }
}
