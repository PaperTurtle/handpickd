<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class SendOrderConfirmation extends Mailable
{
    public $user;
    public $transactionDetails;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $transactionDetails)
    {
        $this->user = $user;
        $this->transactionDetails = $transactionDetails;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('handpickd.shop@gmail.com', 'Handpickd'),
            subject: 'Order Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.send_order_confirmation',
            with: [
                'user' => $this->user,
                // 'transactionDetails' => $this->transactionDetails,
            ],
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
