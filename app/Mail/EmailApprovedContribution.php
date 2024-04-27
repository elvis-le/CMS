<?php

namespace App\Mail;

use App\Models\AcademicYear;
use App\Models\Contribution;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailApprovedContribution extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected User $user,
        protected User $mc,
        protected AcademicYear $academicYear,
        protected Contribution $contribution,
    )
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('greenwich@fe.edu.vn', 'Greenwich'),
            subject: 'Email Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.rejected-notification',
            with: [
                'marketingCoordinatorsName' => $this->mc->name,
                'studentName' => $this->user->name,
                'academicYearName' => $this->academicYear->name,
                'studentID' => $this->contribution->user_id,
                'academicYear' => $this->academicYear->id,
                'contributionID' => $this->contribution->id,
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
