{{-- resources/views/emails/lead-received-admin.blade.php --}}
@php
  $brand = ['soft' => '#f9fafb','card' => '#ffffff','text' => '#111827','muted' => '#6b7280','line' => '#e5e7eb','accent' => '#B10000'];
@endphp
<!doctype html>
<html>
<body style="margin:0;padding:0;background:{{ $brand['soft'] }};font-family:Inter,system-ui,Segoe UI,Arial,sans-serif;color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr><td align="center" style="padding:20px 12px;">
      <table role="presentation" width="680" cellspacing="0" cellpadding="0" border="0" style="width:100%;max-width:680px;background:{{ $brand['card'] }};border:1px solid {{ $brand['line'] }};border-radius:14px;">
        <tr>
          <td style="padding:16px 18px;border-bottom:1px solid {{ $brand['line'] }};">
            <div style="font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:{{ $brand['muted'] }};">Admin</div>
            <div style="font-size:18px;font-weight:700;margin-top:4px;">New lead captured</div>
          </td>
        </tr>
        <tr><td style="padding:18px;">
          <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:13px;">
            <tr><td style="color:{{ $brand['muted'] }};padding:6px 0;">Name</td><td style="text-align:right;font-weight:600;padding:6px 0;">{{ $lead->name }}</td></tr>
            <tr><td style="color:{{ $brand['muted'] }};padding:6px 0;border-top:1px solid {{ $brand['line'] }};">Email</td><td style="text-align:right;font-weight:600;padding:6px 0;border-top:1px solid {{ $brand['line'] }};">{{ $lead->email }}</td></tr>
            <tr><td style="color:{{ $brand['muted'] }};padding:6px 0;border-top:1px solid {{ $brand['line'] }};">Phone</td><td style="text-align:right;font-weight:600;padding:6px 0;border-top:1px solid {{ $brand['line'] }};">{{ $lead->phone }}</td></tr>
            <tr><td style="color:{{ $brand['muted'] }};padding:6px 0;border-top:1px solid {{ $brand['line'] }};">Business</td><td style="text-align:right;font-weight:600;padding:6px 0;border-top:1px solid {{ $brand['line'] }};">{{ $lead->business_name ?? '—' }}</td></tr>
            <tr><td style="color:{{ $brand['muted'] }};padding:6px 0;border-top:1px solid {{ $brand['line'] }};">Message</td><td style="text-align:right;font-weight:600;padding:6px 0;border-top:1px solid {{ $brand['line'] }};">{{ $lead->message ?? '—' }}</td></tr>
          </table>

          <div style="margin-top:14px;padding:12px;border:1px solid {{ $brand['line'] }};border-radius:12px;background:#fff;">
            <div style="font-size:12px;color:{{ $brand['muted'] }};margin-bottom:8px;">Confirm link</div>
            <a href="{{ $confirmUrl }}" style="color:{{ $brand['accent'] }};text-decoration:underline;">{{ $confirmUrl }}</a>
          </div>

          <div style="margin-top:10px;font-size:12px;color:{{ $brand['muted'] }};">
            Lead ID: {{ $lead->id }} • Status: {{ $lead->status }}
          </div>
        </td></tr>
      </table>
    </td></tr>
  </table>
</body>
</html>
