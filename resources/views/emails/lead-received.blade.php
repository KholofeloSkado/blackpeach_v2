{{-- resources/views/emails/lead-received.blade.php --}}
@php
  $brand = [
    'bg' => '#0a0a0f',
    'card' => '#ffffff',
    'muted' => '#6b7280',
    'text' => '#111827',
    'line' => '#e5e7eb',
    'accent' => '#B10000',
    'accent_hover' => '#8a0000',
    'soft' => '#f9fafb',
    'green' => '#25D366', // WhatsApp brand color
  ];
  
  // WhatsApp message
  $whatsappMessage = urlencode("Hi Blackpeach team, I'm {$lead->name}. I recently submitted an enquiry and would like to discuss my project further.");
  $whatsappNumber = '27844551871'; // Replace with actual number
  $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$whatsappMessage}";
  
  // Website & email
  $websiteUrl = config('app.url');
  $contactEmail = 'hello@blackpeach.co.za'; // Replace with actual email
@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="x-apple-disable-message-reformatting">
  <title>Enquiry received — Blackpeach</title>
  <style>
    @media only screen and (max-width: 600px) {
      .container { width: 100% !important; }
      .mobile-padding { padding: 16px !important; }
    }
  </style>
</head>
<body style="margin:0; padding:0; background:{{ $brand['soft'] }}; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:{{ $brand['soft'] }};">
    <tr>
      <td align="center" style="padding:28px 16px;">
        <!-- Container -->
        <table role="presentation" class="container" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:600px;">
          
          <!-- Header with Logo -->
          <tr>
            <td style="background:{{ $brand['bg'] }}; padding:24px; border-radius:16px 16px 0 0;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td align="left" style="color:#fff;">
                    <!-- Logo/Brand -->
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:12px;">
                      <tr>
                        <td style="padding-right:12px; vertical-align:middle;">
                          <img src="{{ asset('images/8.png') }}" alt="Blackpeach" width="48" height="48" style="display:block; border:0;">
                        </td>
                        <td style="vertical-align:middle;">
                          <div style="font-size:20px; font-weight:700; letter-spacing:-.01em;">Blackpeach</div>
                        </td>
                      </tr>
                    </table>
                    <div style="font-size:24px; font-weight:700; margin-top:4px;">Enquiry Received</div>
                  </td>
                  <td align="right" style="color:#fff; opacity:.75; font-size:13px; vertical-align:top;">
                    {{ now()->format('d M Y') }}
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Body Card -->
          <tr>
            <td class="mobile-padding" style="background:{{ $brand['card'] }}; padding:32px; border:1px solid {{ $brand['line'] }}; border-top:0;">
              <div style="font-size:16px; line-height:1.6;">
                <p style="margin:0 0 16px 0; font-size:18px; font-weight:600;">Hi {{ $lead->name }},</p>

                <p style="margin:0 0 16px 0;">
                  Thanks for reaching out to Blackpeach. We've received your enquiry and we're excited to learn more about your project.
                </p>

                <p style="margin:0 0 20px 0;">
                  To provide you with an accurate scope, timeline, and next steps, please take a moment to confirm a few project details:
                </p>

                <!-- CTA Button -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:0 0 24px 0;">
                  <tr>
                    <td bgcolor="{{ $brand['accent'] }}" style="border-radius:10px; box-shadow:0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -1px rgba(0,0,0,.06);">
                      <a href="{{ $confirmUrl }}"
                         style="display:inline-block; padding:14px 28px; color:#fff; text-decoration:none; font-weight:700; font-size:15px; letter-spacing:-.01em;">
                        Confirm Project Details →
                      </a>
                    </td>
                  </tr>
                </table>

                <!-- Quick Response Time Info -->
                <div style="margin:0 0 24px 0; padding:16px; background:{{ $brand['soft'] }}; border-left:4px solid {{ $brand['accent'] }}; border-radius:8px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                      <td style="padding-right:12px; vertical-align:top;">
                        <div style="width:24px; height:24px; background:{{ $brand['accent'] }}; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                          <span style="color:#fff; font-size:14px;">⏱</span>
                        </div>
                      </td>
                      <td>
                        <div style="font-size:14px; line-height:1.5;">
                          <strong style="color:{{ $brand['text'] }};">Response time:</strong>
                          <span style="color:{{ $brand['muted'] }};">We'll review your details and respond within 24 hours on business days.</span>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>

                <!-- Contact Options -->
                <div style="margin:24px 0; padding:20px; background:{{ $brand['soft'] }}; border:1px solid {{ $brand['line'] }}; border-radius:12px;">
                  <div style="font-size:14px; font-weight:600; color:{{ $brand['text'] }}; margin-bottom:14px;">
                    Prefer to chat directly?
                  </div>
                  
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <!-- WhatsApp Button -->
                      <td style="padding-right:8px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td bgcolor="{{ $brand['green'] }}" style="border-radius:8px; text-align:center;">
                              <a href="{{ $whatsappUrl }}" 
                                 style="display:block; padding:12px 16px; color:#fff; text-decoration:none; font-weight:600; font-size:13px;">
                                💬 WhatsApp Us
                              </a>
                            </td>
                          </tr>
                        </table>
                      </td>
                      
                      <!-- Email Button -->
                      <td style="padding-left:8px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td bgcolor="{{ $brand['text'] }}" style="border-radius:8px; text-align:center;">
                              <a href="mailto:{{ $contactEmail }}" 
                                 style="display:block; padding:12px 16px; color:#fff; text-decoration:none; font-weight:600; font-size:13px;">
                                ✉️ Email Us
                              </a>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>

                <!-- Fallback link -->
                <p style="margin:20px 0 0 0; font-size:12px; color:{{ $brand['muted'] }}; padding-top:16px; border-top:1px solid {{ $brand['line'] }};">
                  If the button doesn't work, copy this link:<br>
                  <a href="{{ $confirmUrl }}" style="color:{{ $brand['accent'] }}; text-decoration:none; word-break:break-all;">{{ $confirmUrl }}</a>
                </p>
              </div>
            </td>
          </tr>

          <!-- Signature Section -->
          <tr>
            <td class="mobile-padding" style="background:{{ $brand['card'] }}; padding:24px 32px; border:1px solid {{ $brand['line'] }}; border-top:0;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td style="padding-bottom:16px; border-bottom:1px solid {{ $brand['line'] }};">
                    <div style="font-size:13px; color:{{ $brand['muted'] }}; line-height:1.6;">
                      <strong style="color:{{ $brand['text'] }}; font-size:14px; display:block; margin-bottom:4px;">
                        The Blackpeach Team
                      </strong>
                      Systems. Clarity. Growth.
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td class="mobile-padding" style="background:{{ $brand['card'] }}; padding:20px 32px; border:1px solid {{ $brand['line'] }}; border-top:0; border-radius:0 0 16px 16px;">
              <!-- Links -->
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:12px;">
                <tr>
                  <td align="center">
                    <a href="{{ $websiteUrl }}" style="color:{{ $brand['accent'] }}; text-decoration:none; font-size:13px; font-weight:600; margin:0 12px;">
                      Visit Website
                    </a>
                    <span style="color:{{ $brand['line'] }};">•</span>
                    <a href="mailto:{{ $contactEmail }}" style="color:{{ $brand['accent'] }}; text-decoration:none; font-size:13px; font-weight:600; margin:0 12px;">
                      {{ $contactEmail }}
                    </a>
                  </td>
                </tr>
              </table>

              <!-- Security & Copyright -->
              <div style="font-size:11px; color:{{ $brand['muted'] }}; line-height:1.6; text-align:center;">
                <div style="margin-bottom:6px;">
                  <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:{{ $brand['accent'] }}; vertical-align:middle; margin-right:6px;"></span>
                  Your information is treated confidentially and never shared.
                </div>
                <div>
                  © {{ date('Y') }} Blackpeach Consulting. All rights reserved.
                </div>
              </div>
            </td>
          </tr>

          <!-- Spacer -->
          <tr><td style="height:16px;"></td></tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>