<?php

namespace App\Mail;

use App\Models\Lead;
use App\Models\ProjectIntake;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IntakeCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Lead $lead, public ProjectIntake $intake, public bool $isAdmin = false) {}


    public function build()
    {
        $replyTo = config('mail.notify_address');
        $replyName = config('mail.notify_name');

        return $this
            ->subject('Project intake received — we’ll respond within 24 hours (Blackpeach)')
            ->replyTo($replyTo, $replyName)
            ->view('emails.intake-completed')
            ->with([
                'lead' => $this->lead,
                'intake' => $this->intake,
            ]);

        $view = $this->isAdmin ? 'emails.intake-completed-admin' : 'emails.intake-completed';

        return $this
            ->subject($this->isAdmin ? 'ADMIN: Intake completed — '.$this->lead->name : 'Project intake received — we’ll respond within 24 hours (Blackpeach)')
            ->replyTo($replyTo, $replyName)
            ->view($view)
            ->with([
                'lead' => $this->lead,
                'intake' => $this->intake,
            ]);

    }
}
