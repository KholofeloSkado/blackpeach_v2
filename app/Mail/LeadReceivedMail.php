<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Lead $lead,
        public bool $isAdmin = false
    ) {}

    public function build()
    {
        $replyTo   = config('mail.notify_address');
        $replyName = config('mail.notify_name', config('mail.from.name', 'Website'));

        $subject = $this->isAdmin
            ? 'ADMIN: New lead captured — ' . $this->lead->name
            : 'Enquiry received — confirm your details (Blackpeach)';

        $view = $this->isAdmin
            ? 'emails.lead-received-admin'
            : 'emails.lead-received';

        $mailable = $this
            ->subject($subject)
            ->view($view)
            ->with([
                'lead' => $this->lead,
                'confirmUrl' => route('public.confirm', ['token' => $this->lead->public_token]),
            ]);

        // Only apply reply-to if configured (prevents "must have To/Cc/Bcc" style headaches)
        if (!empty($replyTo)) {
            $mailable->replyTo($replyTo, $replyName);
        }

        return $mailable;
    }
}
