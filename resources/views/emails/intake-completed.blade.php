{{-- resources/views/emails/intake-completed.blade.php --}}
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
    'green' => '#25D366',
  ];

  // Make logo absolute (email-safe-ish)
  $logoUrl = url(asset('images/8.png'));

  // Map internal values to human-friendly labels
  $goalLabels = [
    'credibility' => 'Credibility',
    'leads' => 'Leads',
    'bookings' => 'Bookings',
    'ecommerce' => 'Ecommerce',
    'not_sure' => 'Not sure',
  ];

  $budgetLabels = [
    'under_5k' => 'Under R5k',
    '5_8k' => 'R5–8k',
    '8_15k' => 'R8–15k',
    '15k_plus' => 'R15k+',
  ];

  $operatingLabels = [
    'yes' => 'Yes (Operating)',
    'pre-launch' => 'Pre-launch',
    'no' => 'Not operating yet',
  ];

  $paymentLabels = [
    'allocated' => 'Budget already allocated',
    'owner_funded' => 'Owner funded',
    'website_must_generate_money' => 'Website must generate money first',
  ];

  $yesNo = fn ($v) => ($v === null ? '—' : ((bool)$v ? 'Yes' : 'No'));

  $goal = $goalLabels[$intake->primary_goal] ?? ($intake->primary_goal ?? '—');
  $budget = $budgetLabels[$intake->budget_range] ?? ($intake->budget_range ?? '—');
  $operating = $operatingLabels[$intake->operating_status] ?? ($intake->operating_status ?? '—');
  $payment = $paymentLabels[$intake->payment_readiness] ?? ($intake->payment_readiness ?? '—');

  // WhatsApp / email quick actions (keep consistent with lead-received)
  $whatsappNumber = '27844551871'; // TODO: move to config later
  $whatsappMessage = urlencode("Hi Blackpeach team, I'm {$lead->name}. I've completed the project intake and would like to discuss next steps.");
  $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$whatsappMessage}";
  $contactEmail = 'hello@blackpeach.co.za'; // TODO: move to config later

  // App link (optional)
  $websiteUrl = config('app.url');
@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="x-apple-disable-message-reformatting">
  <title>Intake received — Blackpeach</title>
  <style>
    @media only screen and (max-width: 600px) {
      .container { width: 100% !important; }
      .mobile-padding { padding: 16px !important; }
      .stack { display:block !important; width:100% !important; }
      .btn { display:block !important; width:100% !important; }
    }
  </style>
</head>

<body style="margin:0; padding:0; background:{{ $brand['soft'] }}; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:{{ $brand['soft'] }};">
    <tr>
      <td align="center" style="padding:28px 16px;">
        <!-- Container -->
        <table role="presentation" class="container" width="600" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:600px;">

          <!-- Header -->
          <tr>
            <td style="background:{{ $brand['bg'] }}; padding:24px; border-radius:16px 16px 0 0;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td align="left" style="color:#fff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:12px;">
                      <tr>
                        <td style="padding-right:12px; vertical-align:middle;">
                          <img src="{{ $logoUrl }}" alt="Blackpeach" width="44" height="44" style="display:block; border:0;">
                        </td>
                        <td style="vertical-align:middle;">
                          <div style="font-size:20px; font-weight:800; letter-spacing:-.01em;">Blackpeach</div>
                          <div style="font-size:12px; opacity:.75; margin-top:2px;">Systems. Clarity. Growth.</div>
                        </td>
                      </tr>
                    </table>

                    <div style="font-size:24px; font-weight:800; letter-spacing:-.01em;">Project intake received</div>
                    <div style="margin-top:8px; font-size:13px; opacity:.8;">
                      We’ll review and respond within 24 hours on business days.
                    </div>
                  </td>
                  <td align="right" style="color:#fff; opacity:.75; font-size:13px; vertical-align:top;">
                    {{ now()->format('d M Y') }}
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="mobile-padding" style="background:{{ $brand['card'] }}; padding:32px; border:1px solid {{ $brand['line'] }}; border-top:0;">
              <div style="font-size:16px; line-height:1.65;">
                <p style="margin:0 0 16px 0; font-size:18px; font-weight:700;">Hi {{ $lead->name }},</p>

                <p style="margin:0 0 18px 0; color:{{ $brand['text'] }};">
                  Thanks — we’ve received your intake details. If anything changes, reply to this email and we’ll update your brief.
                </p>

                <!-- What happens next -->
                <div style="margin:0 0 22px 0; padding:16px; background:{{ $brand['soft'] }}; border-left:4px solid {{ $brand['accent'] }}; border-radius:10px;">
                  <div style="font-size:13px; color:{{ $brand['muted'] }}; letter-spacing:.08em; text-transform:uppercase; margin-bottom:8px;">
                    What happens next
                  </div>
                  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:14px;">
                    <tr>
                      <td style="padding:6px 0; color:{{ $brand['text'] }};"><strong>1)</strong> We review your readiness + goals.</td>
                    </tr>
                    <tr>
                      <td style="padding:6px 0; color:{{ $brand['text'] }};"><strong>2)</strong> We reply with recommended scope + next step.</td>
                    </tr>
                    <tr>
                      <td style="padding:6px 0; color:{{ $brand['text'] }};"><strong>3)</strong> If it’s a fit, we schedule a short call.</td>
                    </tr>
                  </table>
                </div>

                <!-- Summary -->
                <div style="padding:18px; background:#fff; border:1px solid {{ $brand['line'] }}; border-radius:14px;">
                  <div style="font-size:12px; letter-spacing:.08em; text-transform:uppercase; color:{{ $brand['muted'] }}; margin-bottom:12px;">
                    Summary submitted
                  </div>

                  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:14px;">
                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }};">Primary goal</td>
                      <td style="padding:8px 0; text-align:right; font-weight:700;">{{ $goal }}</td>
                    </tr>

                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Budget range</td>
                      <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $budget }}</td>
                    </tr>

                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Operating status</td>
                      <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $operating }}</td>
                    </tr>

                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Decision maker</td>
                      <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $yesNo($intake->is_decision_maker) }}</td>
                    </tr>

                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Paying customers</td>
                      <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $yesNo($intake->has_paying_customers) }}</td>
                    </tr>

                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Payment plan</td>
                      <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $payment }}</td>
                    </tr>

                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Professional email</td>
                      <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">
                        {{ $intake->needs_professional_email_setup ? 'Yes' : 'No' }}
                        @if($intake->needs_professional_email_setup && $intake->email_accounts_needed)
                          <span style="font-weight:600; color:{{ $brand['muted'] }};">({{ $intake->email_accounts_needed }})</span>
                        @endif
                      </td>
                    </tr>
                  </table>
                </div>

                <!-- Contact Options -->
                <div style="margin:22px 0 0 0; padding:18px; background:{{ $brand['soft'] }}; border:1px solid {{ $brand['line'] }}; border-radius:14px;">
                  <div style="font-size:14px; font-weight:700; color:{{ $brand['text'] }}; margin-bottom:12px;">
                    Prefer to chat directly?
                  </div>

                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td class="stack" style="padding-right:8px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td bgcolor="{{ $brand['green'] }}" style="border-radius:10px; text-align:center;">
                              <a class="btn" href="{{ $whatsappUrl }}"
                                 style="display:block; padding:12px 16px; color:#fff; text-decoration:none; font-weight:800; font-size:13px;">
                                💬 WhatsApp Us
                              </a>
                            </td>
                          </tr>
                        </table>
                      </td>

                      <td class="stack" style="padding-left:8px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td bgcolor="{{ $brand['text'] }}" style="border-radius:10px; text-align:center;">
                              <a class="btn" href="mailto:{{ $contactEmail }}"
                                 style="display:block; padding:12px 16px; color:#fff; text-decoration:none; font-weight:800; font-size:13px;">
                                ✉️ Email Us
                              </a>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>

                  <div style="margin-top:12px; font-size:12px; color:{{ $brand['muted'] }}; line-height:1.6;">
                    If this is just a quick question (not a project), WhatsApp is fastest.
                  </div>
                </div>

                <p style="margin:18px 0 0 0; font-size:12px; color:{{ $brand['muted'] }}; line-height:1.6; padding-top:16px; border-top:1px solid {{ $brand['line'] }};">
                  Note: a website supports your business systems; it doesn’t guarantee revenue. We’ll recommend scope based on your goals and readiness.
                </p>
              </div>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td class="mobile-padding" style="background:{{ $brand['card'] }}; padding:20px 32px; border:1px solid {{ $brand['line'] }}; border-top:0; border-radius:0 0 16px 16px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:10px;">
                <tr>
                  <td align="center">
                    <a href="{{ $websiteUrl }}" style="color:{{ $brand['accent'] }}; text-decoration:none; font-size:13px; font-weight:700; margin:0 12px;">
                      Visit Website
                    </a>
                    <span style="color:{{ $brand['line'] }};">•</span>
                    <a href="mailto:{{ $contactEmail }}" style="color:{{ $brand['accent'] }}; text-decoration:none; font-size:13px; font-weight:700; margin:0 12px;">
                      {{ $contactEmail }}
                    </a>
                  </td>
                </tr>
              </table>

              <div style="font-size:11px; color:{{ $brand['muted'] }}; line-height:1.6; text-align:center;">
                © {{ date('Y') }} Blackpeach Consulting. All rights reserved. • Reply to this email to reach the team.
              </div>
            </td>
          </tr>

          <tr><td style="height:16px;"></td></tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
