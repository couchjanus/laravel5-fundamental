<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to(config('mail.support.address'))
            ->subject('Janus Nic Inquiry')
            ->markdown('emails.contact')
            ->with(
                [
                'contactName'=>$this->contact,
                // 'contactName'=>$this->contact['name'],
                // 'contactMessage'=>$this->contact['msg'],
                // 'contactEmail'=>$this->contact['email'],
                ]
            );
        // return $this->markdown('emails.contact');
    }
}
