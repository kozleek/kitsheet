<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $name,
        public string $mail,
        public string $message,
        public string $techinfo,
        public ?string $file_path = null,
        public ?string $file_name = null,
        public ?string $file_type = null,
    )
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: $this->mail,
            subject: '🐞 Report od ' . $this->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.report.created',
            with: [
                'name' => $this->name,
                'mail' => $this->mail,
                'message' => $this->message,
                'techinfo' => $this->techinfo,
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
        if ($this->file_path === null) {
            return [];
        }

        return [
            Attachment::fromPath(storage_path('app/public/' . $this->file_path))
                    ->as($this->file_name)
                    ->withMime($this->file_type),
        ];
    }
}
