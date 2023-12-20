<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * ContactMail is a mailable class responsible for constructing and sending contact form emails.
 * It contains the data provided in the contact form and sends it to a predefined recipient.
 */
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array The data received from the contact form.
     */
    public array $data;

    /**
     * Create a new message instance.
     * Initializes the mail with data provided from the contact form.
     *
     * @param array $data Data passed to the email view.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     * Defines the subject of the email.
     *
     * @return Envelope Returns an Envelope instance with the subject of the email.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
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
            view: 'emails.send_contact',
            with: [
                'data' => $this->data,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment> Returns an array of attachments.
     */
    public function attachments(): array
    {
        return [];
    }
}
