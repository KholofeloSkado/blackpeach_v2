{{-- resources/views/emails/lead-received.blade.php --}}
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
  <title>Enquiry received — Blackpeach</title>
</head>
<body style="margin:0; padding:0; background:{{ $brand['soft'] }}; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:{{ $brand['soft'] }};">
    <tr>
      <td align="center" style="padding:28px 16px;">
        <!-- Container -->
        <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:600px;">
          <!-- Header -->
          <tr>
            <td style="background:{{ $brand['bg'] }}; padding:22px 24px; border-radius:16px 16px 0 0;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td align="left" style="color:#fff;">
                    <div style="font-size:14px; letter-spacing:.08em; text-transform:uppercase; opacity:.8;">Blackpeach</div>
                    <div style="font-size:22px; font-weight:700; margin-top:6px;">Enquiry received</div>
                  </td>
                  <td align="right" style="color:#fff; opacity:.85; font-size:12px;">
                    {{ now()->format('d M Y') }}
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Body Card -->
          <tr>
            <td style="background:{{ $brand['card'] }}; padding:24px; border:1px solid {{ $brand['line'] }}; border-top:0;">
              <div style="font-size:16px; line-height:1.6;">
                <p style="margin:0 0 14px 0;">Hi {{ $lead->name }},</p>

                <p style="margin:0 0 14px 0;">
                  Thanks for contacting Blackpeach — we’ve received your enquiry.
                </p>

                <p style="margin:0 0 18px 0;">
                  To respond with the right scope, please confirm a few project details:
                </p>

                <!-- CTA Button -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:0 0 18px 0;">
                  <tr>
                    <td bgcolor="{{ $brand['accent'] }}" style="border-radius:12px;">
                      <a href="{{ $confirmUrl }}"
                         style="display:inline-block; padding:12px 18px; color:#fff; text-decoration:none; font-weight:700; font-size:14px;">
                        Confirm details →
                      </a>
                    </td>
                  </tr>
                </table>

                <!-- Fallback link -->
                <p style="margin:0 0 14px 0; font-size:13px; color:{{ $brand['muted'] }};">
                  If the button doesn’t work, copy and paste this link:
                  <br>
                  <a href="{{ $confirmUrl }}" style="color:{{ $brand['accent'] }}; text-decoration:underline;">{{ $confirmUrl }}</a>
                </p>

                <!-- Trust / SLA -->
                <div style="margin-top:18px; padding:14px; background:{{ $brand['soft'] }}; border:1px solid {{ $brand['line'] }}; border-radius:12px;">
                  <div style="font-size:13px; color:{{ $brand['muted'] }}; line-height:1.5;">
                    <strong style="color:{{ $brand['text'] }};">Response time:</strong> within 24 hours on business days.
                    <br>
                    You can reply to this email if you’d prefer to share details directly.
                  </div>
                </div>
              </div>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background:{{ $brand['card'] }}; padding:18px 24px; border:1px solid {{ $brand['line'] }}; border-top:0; border-radius:0 0 16px 16px;">
              <div style="font-size:12px; color:{{ $brand['muted'] }}; line-height:1.6;">
                <div style="margin-bottom:8px;">
                  <span style="display:inline-block; width:10px; height:10px; border-radius:999px; background:{{ $brand['accent'] }}; vertical-align:middle; margin-right:8px;"></span>
                  Your information is treated confidentially and never shared.
                </div>
                <div>
                  © {{ date('Y') }} Blackpeach Consulting
                </div>
              </div>
            </td>
          </tr>

          <!-- Spacer -->
          <tr><td style="height:14px;"></td></tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
