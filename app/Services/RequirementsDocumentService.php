<?php
namespace App\Services;

use App\Models\Lead;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequirementsVerification;

class RequirementsDocumentService
{
    public function generateForLead(Lead $lead)
    {
        $pdf = Pdf::loadView('pdf.requirements', compact('lead'));
        $filename = 'SH-' . str_pad($lead->id, 6, '0', STR_PAD_LEFT) . '_Requirements.pdf';
        
        return [
            'pdf' => $pdf,
            'filename' => $filename,
            'path' => storage_path("app/public/{$filename}")
        ];
    }

    public function sendToLead(Lead $lead)
    {
        $document = $this->generateForLead($lead);
        $pdf = $document['pdf'];
        $pdf->save($document['path']);
        
        Mail::to($lead->email ?? 'admin@blackpeach.co.za')
            ->send(new RequirementsVerification($lead, $document));
        
        $lead->update(['status' => 'requirements_sent']);
    return $document['filename'];
    }
}
