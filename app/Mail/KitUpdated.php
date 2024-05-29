<?php

namespace App\Mail;

use App\Models\Kit;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Support\OperationSupport;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class KitUpdated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Kit $kit,
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = '💾 Sada pracovních listů byla změněna';
        // Add title and teacher name to the subject if they are set
        if($this->kit->title) {
            $subject .= ': ' . $this->kit->title;
        }
        if($this->kit->teacher_name) {
            $subject .= ' (' . $this->kit->teacher_name . ')';
        }

        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.kit.updated',
            with: [
                'kit' => $this->kit,
                'url' => route('kit.show', ['kit' => $this->kit]),
                'operations' => OperationSupport::getOperationsNames($this->kit->range_operations),
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
