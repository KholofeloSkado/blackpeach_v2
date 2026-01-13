<!DOCTYPE html>
<html>
<head>
    <title>Your Requirements Document</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    <div style="max-width: 600px; margin: 0 auto;">
        <h1 style="color: #1e40af; font-size: 24px;">Requirements Document Ready!</h1>
        
        <p>Hi {{ $lead->name }},</p>
        
        <p>Your customized requirements document ({{ $lead->reference_number }}) has been prepared and attached.</p>
        
        <div style="background: #f8fafc; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: #1e40af;">Your Selection:</h3>
            <p><strong>Package:</strong> {{ ucfirst(str_replace('_', ' ', $lead->package_selected)) }}</p>
            <p><strong>Total:</strong> R{{ number_format($lead->total_cost, 0) }}</p>
            @if($lead->extras_json)
                <p><strong>Extras:</strong> 
                    @php $extras = $lead->extras_json; @endphp
                    @if($extras['seo_profile'])SEO Profile, @endif
                    @if($extras['dns'])DNS Registration, @endif
                    @if($extras['hosting'])12 Months Hosting @endif
                </p>
            @endif
        </div>
        
        <p><strong>Next Steps:</strong></p>
        <ol style="padding-left: 20px;">
            <li>Review the attached PDF document</li>
            <li>Reply via WhatsApp if you have questions</li>
            <li>We'll schedule a call within 24 hours</li>
        </ol>
        
        <p style="color: #666; font-size: 14px;">
            <strong>Reference:</strong> {{ $lead->reference_number }}<br>
            <strong>Submitted:</strong> {{ $lead->created_at->format('M j, Y \a\t g:i A') }}
        </p>
        
        <hr style="margin: 40px 0;">
        <p style="color: #999; font-size: 12px;">
            ServiceHub Pro | Professional Web Solutions<br>
            <a href="https://blackpeach.co.za">blackpeach.co.za</a>
        </p>
    </div>
</body>
</html>
