<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBinderForm extends Mailable
{
    use Queueable, SerializesModels;
        protected $form;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\BinderForm $form)
    {
        $this->form = $form;
        $this->subject('Je inschrijfformulier voor Iewan');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('aanname@iewan.nl')->view('mail.binder-form')->with(['form' => $this->form]);
    }
}
