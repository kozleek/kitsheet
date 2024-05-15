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

class CreateKit extends Mailable
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
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: 'Nová sada pracovních listů byla vytvořena',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $kitOperations = json_decode($this->kit->range_operations);
        $lastElement = end($kitOperations);

        $operations = '';
        foreach ($kitOperations as $operation) {
            $operations .= OperationSupport::getOperationName($operation);
            if ($operation !== $lastElement) {
                $operations .= ', ';
            }
        }

        return new Content(
            markdown: 'emails.kit.create',
            with: [
                'kit' => $this->kit,
                'url' => route('kit.show', $this->kit),
                'operations' => $operations,
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
