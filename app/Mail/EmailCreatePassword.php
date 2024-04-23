<?php

namespace App\Mail;

use App\Models\AcademicYear;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailCreatePassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected $name,
        protected $email,
        protected $phone,
        protected $year,
        protected $roles_id,
        protected $faculty_id,
    )
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('greenwich@fe.edu.vn', 'Greenwich'),
            subject: 'Email Create Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.create-password-email',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'year' => $this->year,
                'roles_id' => $this->roles_id,
                'faculty_id' => $this->faculty_id,
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
