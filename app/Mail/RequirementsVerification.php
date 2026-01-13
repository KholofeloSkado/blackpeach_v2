<?php
namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequirementsVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $pdfPath;

    public function __construct(Lead $lead, array $document)
    {
        $this->lead = $lead;
        $this->pdfPath = $document['path'];
    }

    public function build()
    {
        return $this->subject('Requirements Document - ' . $this->lead->reference_number)
                    ->view('mail.requirements-verification')
                    ->attach($this->pdfPath);
    }
}
