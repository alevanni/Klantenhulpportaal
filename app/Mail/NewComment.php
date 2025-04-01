<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use App\Models\Comment;
use App\Models\User;

class NewComment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Ticket $ticket, protected Comment $comment, protected User $sender, protected User $receiver)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Comment from ' . $this->sender->first_name . ' ' . $this->sender->last_name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new-comment',
            with: [
                'receiverName' => $this->receiver->first_name . ' ' . $this->receiver->last_name,
                'commentBody' => $this->comment->body,
                'senderName' => $this->sender->first_name . ' ' . $this->sender->last_name,
                'senderEmail' => $this->sender->email,
                'ticketId' => $this->ticket->id,
                'ticketTitle' => $this->ticket->title
            ]
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
