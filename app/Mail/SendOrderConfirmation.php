<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

/**
 * SendOrderConfirmation is a mailable class responsible for constructing and sending an order confirmation email.
 * It includes details about the user and the transaction associated with the order.
 */
class SendOrderConfirmation extends Mailable
{
    /**
     * @var mixed The user to whom the order confirmation will be sent.
     */
    public $user;

    /**
     * @var array The details of the transaction related to the order.
     */
    public $transactionDetails;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * 
     * @param mixed $user The user instance.
     * @param array $transactionDetails Details of the transaction.
     */
    public function __construct($user, $transactionDetails)
    {
        $this->user = $user;
        $this->transactionDetails = $transactionDetails;
    }

    /**
     * Get the message envelope.
     * Defines the sender and the subject of the email.
     *
     * @return Envelope Returns an Envelope instance with sender and subject details.
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
     * Determines the view and data to be used in the email content.
     *
     * @return Content Returns a Content instance specifying the view and data for the email.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.send_order_confirmation',
            with: [
                'user' => $this->user,
                'transactionDetails' => $this->transactionDetails,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     * Currently, this method returns an empty array as no attachments are added by default.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment> Returns an array of attachments.
     */
    public function attachments(): array
    {
        return [];
    }
}
