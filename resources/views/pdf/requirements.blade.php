<!DOCTYPE html>
<html>
<head>
    <title>Requirements Document - {{ $lead->reference_number }}</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; line-height: 1.6; color: #333; }
        .header { background: linear-gradient(135deg, #1e40af, #3b82f6); color: white; padding: 2rem; text-align: center; }
        .container { max-width: 800px; margin: 0 auto; padding: 2rem; }
        .lead-details { background: #f8fafc; padding: 2rem; border-radius: 12px; margin: 2rem 0; }
        table { width: 100%; border-collapse: collapse; margin: 1rem 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        .total { font-size: 1.5rem; font-weight: bold; color: #1e40af; }
        .signature { margin-top: 4rem; display: flex; justify-content: space-between; }
        .status-badge { padding: 4px 12px; border-radius: 20px; color: white; font-weight: bold; }
        .status-new { background: #3b82f6; }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin: 0; font-size: 2.5rem;">ServiceHub Pro</h1>
        <p style="margin: 0.5rem 0 0;">Requirements Confirmation Document</p>
        <h2 style="margin: 1rem 0 0; font-size: 1.5rem;">{{ $lead->reference_number }}</h2>
    </div>

    <div class="container">
        <div class="lead-details">
            <h2 style="color: #1e40af; margin-bottom: 1.5rem;">Lead Information</h2>
            <table>
                <tr><td style="width: 30%; font-weight: bold;">Name:</td><td>{{ $lead->name }}</td></tr>
                <tr><td>Phone (WhatsApp):</td><td>{{ $lead->phone }}</td></tr>
                @if($lead->email)<tr><td>Email:</td><td>{{ $lead->email }}</td></tr>@endif
                @if($lead->business_name)<tr><td>Business:</td><td>{{ $lead->business_name }}</td></tr>@endif
                @if($lead->current_website)<tr><td>Current Website:</td><td>{{ $lead->current_website }}</td></tr>@endif
            </table>
        </div>

        <div class="lead-details">
            <h2 style="color: #1e40af; margin-bottom: 1.5rem;">Package Selection</h2>
            <table>
                <tr><td style="width: 60%; font-weight: bold;">{{ ucfirst(str_replace('_', ' ', $lead->package_selected)) }}</td>
                    <td>R{{ number_format($lead->total_cost, 0) }}</td></tr>
                @if($lead->extras_json)
                    @php $extras = $lead->extras_json; @endphp
                    @if($extras['seo_profile'])<tr><td>✓ SEO Profile</td><td>+ R250</td></tr>@endif
                    @if($extras['dns'])<tr><td>✓ DNS Registration</td><td>+ R80</td></tr>@endif
                    @if($extras['hosting'])<tr><td>✓ 12 Months Hosting</td><td>+ R1,200</td></tr>@endif
                @endif
            </table>
        </div>

        <div style="text-align: right; margin: 2rem 0;">
            <div class="total">Total Investment: <span style="font-size: 2rem;">R{{ number_format($lead->total_cost, 0) }}</span></div>
        </div>

        <div style="background: #f1f5f9; padding: 1.5rem; border-radius: 8px; margin: 2rem 0;">
            <h3 style="margin: 0 0 1rem; color: #1e40af;">Next Steps:</h3>
            <ol style="margin: 0; padding-left: 1.5rem;">
                <li>Our team will review your requirements within 24 hours</li>
                <li>Schedule WhatsApp/video call to finalize scope</li>
                <li>70% deposit invoice issued upon approval</li>
                <li>Development begins (7-14 business days)</li>
            </ol>
        </div>

        <div class="signature">
            <div style="text-align: center;">
                <p style="margin: 0 0 1rem; font-weight: bold;">Prepared By</p>
                <p style="margin: 0; font-size: 1.1rem;">ServiceHub Pro Team</p>
                <p style="margin: 2rem 0 0; font-size: 0.9rem; color: #64748b;">{{ now()->format('F j, Y \a\t g:i A') }}</p>
            </div>
            <div style="text-align: center;">
                <p style="margin: 0 0 1rem; font-weight: bold;">Lead Signature</p>
                <p style="margin: 2rem 0 0; font-size: 0.9rem; color: #64748b;">Digital acceptance via portal</p>
            </div>
        </div>
    </div>
</body>
</html>
