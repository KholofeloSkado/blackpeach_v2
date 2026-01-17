{{-- resources/views/emails/intake-completed-admin.blade.php --}}
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
  ];

  // Use absolute URL for email clients
  $logoUrl = url(asset('images/8.png'));

  // Human labels (avoid raw enums in admin emails too)
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

  // Optional URLs (won’t break if routes not present)
  $confirmUrl = isset($confirmUrl)
    ? $confirmUrl
    : (isset($lead) ? route('public.confirm', ['token' => $lead->public_token]) : null);

  // If you have an admin route, swap here (safe fallback)
  $adminLeadUrl = null;
  // Example if you have it:
  // $adminLeadUrl = route('admin.leads.show', $lead);

@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="x-apple-disable-message-reformatting">
  <title>ADMIN: Intake completed</title>
  <style>
    @media only screen and (max-width: 600px) {
      .container { width: 100% !important; }
      .mobile-padding { padding: 16px !important; }
      .stack { display:block !important; width:100% !important; }
      .right { text-align:left !important; }
    }
  </style>
</head>

<body style="margin:0; padding:0; background:{{ $brand['soft'] }}; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:{{ $brand['soft'] }};">
    <tr>
      <td align="center" style="padding:28px 16px;">
        <!-- Container -->
        <table role="presentation" class="container" width="680" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:680px;">

          <!-- Header -->
          <tr>
            <td style="background:{{ $brand['bg'] }}; padding:22px 24px; border-radius:16px 16px 0 0;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td align="left" style="color:#fff;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin-bottom:10px;">
                      <tr>
                        <td style="padding-right:12px; vertical-align:middle;">
                          <img src="{{ $logoUrl }}" alt="Blackpeach" width="44" height="44" style="display:block; border:0;">
                        </td>
                        <td style="vertical-align:middle;">
                          <div style="font-size:12px; letter-spacing:.10em; text-transform:uppercase; opacity:.75;">Admin</div>
                          <div style="font-size:20px; font-weight:800; letter-spacing:-.01em; margin-top:2px;">Intake completed</div>
                        </td>
                      </tr>
                    </table>

                    <div style="font-size:14px; opacity:.85;">
                      {{ $lead->name }} • {{ $lead->email }}
                    </div>
                  </td>

                  <td align="right" class="right" style="color:#fff; opacity:.75; font-size:13px; vertical-align:top;">
                    {{ now()->format('d M Y') }}<br>
                    <span style="font-size:12px;">Lead #{{ $lead->id }}</span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="mobile-padding" style="background:{{ $brand['card'] }}; padding:28px; border:1px solid {{ $brand['line'] }}; border-top:0;">

              <!-- Lead card -->
              <div style="padding:16px; border:1px solid {{ $brand['line'] }}; border-radius:14px; background:#fff;">
                <div style="font-size:12px; letter-spacing:.08em; text-transform:uppercase; color:{{ $brand['muted'] }}; margin-bottom:10px;">
                  Lead details
                </div>

                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:13px;">
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }};">Name</td>
                    <td style="padding:8px 0; text-align:right; font-weight:700;">{{ $lead->name }}</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Email</td>
                    <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $lead->email }}</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Phone</td>
                    <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $lead->phone }}</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Business</td>
                    <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $lead->business_name ?? '—' }}</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 0; color:{{ $brand['muted'] }}; border-top:1px solid {{ $brand['line'] }};">Status</td>
                    <td style="padding:8px 0; text-align:right; font-weight:700; border-top:1px solid {{ $brand['line'] }};">{{ $lead->status }}</td>
                  </tr>
                </table>

                @if(!empty($lead->message))
                  <div style="margin-top:12px; padding:12px; background:{{ $brand['soft'] }}; border:1px solid {{ $brand['line'] }}; border-radius:12px;">
                    <div style="font-size:12px; color:{{ $brand['muted'] }}; letter-spacing:.08em; text-transform:uppercase; margin-bottom:8px;">
                      Message
                    </div>
                    <div style="font-size:13px; line-height:1.6; color:{{ $brand['text'] }};">
                      {{ $lead->message }}
                    </div>
                  </div>
                @endif
              </div>

              <div style="height:16px;"></div>

              <!-- Intake card -->
              <div style="padding:16px; background:#fff; border:1px solid {{ $brand['line'] }}; border-radius:14px;">
                <div style="font-size:12px; letter-spacing:.08em; text-transform:uppercase; color:{{ $brand['muted'] }}; margin-bottom:10px;">
                  Intake answers
                </div>

                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:13px;">
                  @php
                    $rows = [
                      ['Decision maker', $yesNo($intake->is_decision_maker)],
                      ['Operating status', $operating],
                      ['Paying customers', $yesNo($intake->has_paying_customers)],
                      ['Budget range', $budget],
                      ['Payment readiness', $payment],
                      ['Primary goal', $goal],
                      ['Email setup needed', $intake->needs_professional_email_setup ? 'Yes' : 'No'],
                      ['Email accounts needed', $intake->email_accounts_needed ?? '—'],
                    ];
                  @endphp

                  @foreach($rows as $i => [$k, $v])
                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; {{ $i ? 'border-top:1px solid '.$brand['line'].';' : '' }}">
                        {{ $k }}
                      </td>
                      <td style="padding:8px 0; text-align:right; font-weight:700; {{ $i ? 'border-top:1px solid '.$brand['line'].';' : '' }}">
                        {{ $v }}
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>

              <!-- Actions -->
              <div style="margin-top:16px; padding:14px; background:{{ $brand['soft'] }}; border:1px solid {{ $brand['line'] }}; border-radius:14px;">
                <div style="font-size:12px; letter-spacing:.08em; text-transform:uppercase; color:{{ $brand['muted'] }}; margin-bottom:10px;">
                  Actions
                </div>

                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tr>
                    <td class="stack" style="padding-right:8px;">
                      @if(!empty($confirmUrl))
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td bgcolor="{{ $brand['accent'] }}" style="border-radius:10px; text-align:center;">
                              <a href="{{ $confirmUrl }}"
                                 style="display:block; padding:12px 14px; color:#fff; text-decoration:none; font-weight:800; font-size:13px;">
                                Open confirm link →
                              </a>
                            </td>
                          </tr>
                        </table>
                      @else
                        <div style="font-size:12px; color:{{ $brand['muted'] }};">Confirm link not available.</div>
                      @endif
                    </td>

                    <td class="stack" style="padding-left:8px;">
                      @if(!empty($adminLeadUrl))
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td bgcolor="{{ $brand['text'] }}" style="border-radius:10px; text-align:center;">
                              <a href="{{ $adminLeadUrl }}"
                                 style="display:block; padding:12px 14px; color:#fff; text-decoration:none; font-weight:800; font-size:13px;">
                                View in admin →
                              </a>
                            </td>
                          </tr>
                        </table>
                      @else
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td bgcolor="{{ $brand['text'] }}" style="border-radius:10px; text-align:center;">
                              <a href="mailto:{{ $lead->email }}"
                                 style="display:block; padding:12px 14px; color:#fff; text-decoration:none; font-weight:800; font-size:13px;">
                                Reply to lead →
                              </a>
                            </td>
                          </tr>
                        </table>
                      @endif
                    </td>
                  </tr>
                </table>

                @if(!empty($confirmUrl))
                  <div style="margin-top:10px; font-size:12px; color:{{ $brand['muted'] }};">
                    Fallback: <a href="{{ $confirmUrl }}" style="color:{{ $brand['accent'] }}; text-decoration:underline; word-break:break-all;">{{ $confirmUrl }}</a>
                  </div>
                @endif
              </div>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td class="mobile-padding" style="background:{{ $brand['card'] }}; padding:18px 24px; border:1px solid {{ $brand['line'] }}; border-top:0; border-radius:0 0 16px 16px;">
              <div style="font-size:11px; color:{{ $brand['muted'] }}; line-height:1.6; text-align:center;">
                ADMIN notification • Blackpeach Consulting • © {{ date('Y') }}
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
