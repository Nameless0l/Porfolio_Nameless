<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user_name;
    public $user_email;
    public $message;
    public $subject;
    public function __construct($user_name, $user_email, $message, $subject)
    {
        $this->user_email = $user_email;
        $this->user_name = $user_name;
        $this->message = $message;
        $this->subject = $subject;

    }

    /**
     *  Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:$this->subject,
        );
    }
    public function build (){
        $level = 'success';
        $introLines = [
            $this->subject,
            // Ajoutez d'autres lignes d'introduction au besoin
        ];
        $outroLines = [
            $this->message,
            // Ajoutez d'autres lignes de conclusion au besoin
        ];
        return $this->from($this->user_email)
                    ->markdown('vendor.notifications.email')
                    ->with(['greeting'=>"Message de ".$this->user_name." dépuis votre PortFolio",'level'=>$level,'introLines'=>$introLines,'salutation'=>"Message de ".$this->user_email,'outroLines'=>$outroLines]);   
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: '',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
