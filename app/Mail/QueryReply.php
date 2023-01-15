<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QueryReply extends Mailable
{
    use Queueable, SerializesModels;

    public string $recipient;

    public string $query;

    public string $reply;

    public function __construct(string $recipient, string $query, string $reply)
    {
        $this->recipient = $recipient;
        $this->query = $query;
        $this->reply = $reply;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your treemium query',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.query-reply',
        );
    }
}
