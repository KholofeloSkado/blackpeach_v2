{{-- resources/views/emails/intake-completed.blade.php --}}
@php
  $brand = [
    'bg' => '#0a0a0f',
    'card' => '#ffffff',
    'muted' => '#6b7280',
    'text' => '#111827',
    'line' => '#e5e7eb',
    'accent' => '#B10000',
    'soft' => '#f9fafb',
  ];
@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="x-apple-disable-message-reformatting">
  <title>Intake received — Blackpeach</title>
</head>
<body style="margin:0; padding:0; background:{{ $brand['soft'] }}; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:{{ $brand['soft'] }};">
    <tr>
      <td align="center" style="padding:28px 16px;">
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:600px;">
          <tr>
            <td style="background:{{ $brand['bg'] }}; padding:22px 24px; border-radius:16px 16px 0 0;">
              <div style="font-size:14px; letter-spacing:.08em; text-transform:uppercase; opacity:.8; color:#fff;">Blackpeach</div>
              <div style="font-size:22px; font-weight:700; margin-top:6px; color:#fff;">Project intake received</div>
              <div style="margin-top:8px; font-size:12px; color:#ffffff; opacity:.75;">
                We’ll respond within 24 hours on business days.
              </div>
            </td>
          </tr>

          <tr>
            <td style="background:{{ $brand['card'] }}; padding:24px; border:1px solid {{ $brand['line'] }}; border-top:0;">
              <p style="margin:0 0 14px 0; font-size:16px; line-height:1.6;">Hi {{ $lead->name }},</p>

              <p style="margin:0 0 16px 0; font-size:14px; line-height:1.7; color:{{ $brand['text'] }};">
                Thanks — we’ve received your intake details. If anything changes, reply to this email and we’ll update your brief.
              </p>

              <div style="padding:16px; background:{{ $brand['soft'] }}; border:1px solid {{ $brand['line'] }}; border-radius:12px;">
                <div style="font-size:12px; letter-spacing:.08em; text-transform:uppercase; color:{{ $brand['muted'] }}; margin-bottom:10px;">
                  Summary submitted
                </div>

                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:14px;">
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }};">Primary goal</td>
                    <td style="padding:8px 0; text-align:right; font-weight:600;">{{ $intake->primary_goal }}</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Budget range</td>
                    <td style="padding:8px 0; text-align:right; font-weight:600; border-top:1px solid {{ $brand['line'] }};">{{ $intake->budget_range }}</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Operating status</td>
                    <td style="padding:8px 0; text-align:right; font-weight:600; border-top:1px solid {{ $brand['line'] }};">{{ $intake->operating_status }}</td>
                  </tr>
                </table>
              </div>

              <p style="margin:16px 0 0 0; font-size:12px; color:{{ $brand['muted'] }}; line-height:1.6;">
                Note: a website supports your business systems; it doesn’t guarantee revenue. We’ll recommend scope based on your goals and readiness.
              </p>
            </td>
          </tr>

          <tr>
            <td style="background:{{ $brand['card'] }}; padding:18px 24px; border:1px solid {{ $brand['line'] }}; border-top:0; border-radius:0 0 16px 16px;">
              <div style="font-size:12px; color:{{ $brand['muted'] }}; line-height:1.6;">
                © {{ date('Y') }} Blackpeach Consulting • Reply to this email to reach the team.
              </div>
            </td>
          </tr>

          <tr><td style="height:14px;"></td></tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
