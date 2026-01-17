{{-- resources/views/emails/lead-received-admin.blade.php --}}
@php
  $brand = [
    'bg' => '#0a0a0f',
    'card' => '#ffffff',
    'soft' => '#f9fafb',
    'text' => '#111827',
    'muted' => '#6b7280',
    'line' => '#e5e7eb',
    'accent' => '#B10000',
    'accent_hover' => '#8a0000',
  ];

  // If you have admin routes, use them. If not, keep null and we’ll hide the button.
  // Common resource route would be admin.leads.show (since you have Route::resource('leads', ...) under admin.)
  $adminLeadUrl = null;
  try {
      if (\Illuminate\Support\Facades\Route::has('admin.leads.show')) {
          $adminLeadUrl = route('admin.leads.show', $lead);
      }
  } catch (\Throwable $e) {
      $adminLeadUrl = null;
  }

  // Make logo absolute-ish (email-safe)
  $logoUrl = url(asset('images/8.png'));
@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="x-apple-disable-message-reformatting">
  <title>ADMIN: New lead captured</title>
  <style>
    @media only screen and (max-width: 640px) {
      .container { width: 100% !important; }
      .p { padding: 16px !important; }
      .stack { display: block !important; width: 100% !important; }
      .btn { display:block !important; width:100% !important; }
    }
  </style>
</head>

<body style="margin:0; padding:0; background:{{ $brand['soft'] }}; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:{{ $brand['soft'] }};">
    <tr>
      <td align="center" style="padding:28px 16px;">
        <table role="presentation" class="container" width="680" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:680px;">

          {{-- Header --}}
          <tr>
            <td style="background:{{ $brand['bg'] }}; padding:20px 22px; border-radius:16px 16px 0 0;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td class="stack" align="left" style="vertical-align:middle;">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td style="padding-right:12px; vertical-align:middle;">
                          <img src="{{ $logoUrl }}" alt="Blackpeach" width="40" height="40" style="display:block; border:0; outline:none;">
                        </td>
                        <td style="vertical-align:middle; color:#fff;">
                          <div style="font-size:12px; letter-spacing:.08em; text-transform:uppercase; opacity:.75;">Admin alert</div>
                          <div style="font-size:18px; font-weight:800; letter-spacing:-.01em; margin-top:4px;">
                            New lead captured
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td class="stack" align="right" style="vertical-align:middle; color:#fff; opacity:.75; font-size:13px;">
                    {{ now()->format('d M Y, H:i') }}
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- Body --}}
          <tr>
            <td class="p" style="background:{{ $brand['card'] }}; padding:26px 28px; border:1px solid {{ $brand['line'] }}; border-top:0;">

              {{-- Key info block --}}
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
                     style="border:1px solid {{ $brand['line'] }}; border-radius:14px; overflow:hidden;">
                <tr>
                  <td style="padding:16px 16px; background:#fff;">
                    <div style="font-size:13px; color:{{ $brand['muted'] }};">Lead</div>
                    <div style="font-size:18px; font-weight:800; letter-spacing:-.01em; margin-top:4px;">
                      {{ $lead->name }}
                    </div>
                    <div style="font-size:13px; color:{{ $brand['muted'] }}; margin-top:6px;">
                      {{ $lead->email }} • {{ $lead->phone }}
                    </div>
                  </td>
                </tr>

                <tr>
                  <td style="padding:14px 16px; background:{{ $brand['soft'] }}; border-top:1px solid {{ $brand['line'] }};">
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:13px;">
                      <tr>
                        <td style="color:{{ $brand['muted'] }}; padding:6px 0;">Business</td>
                        <td style="text-align:right; font-weight:700; padding:6px 0;">{{ $lead->business_name ?? '—' }}</td>
                      </tr>
                      <tr>
                        <td style="color:{{ $brand['muted'] }}; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">Website</td>
                        <td style="text-align:right; font-weight:700; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">
                          {{ $lead->current_website ?? '—' }}
                        </td>
                      </tr>
                      <tr>
                        <td style="color:{{ $brand['muted'] }}; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">Status</td>
                        <td style="text-align:right; font-weight:700; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">
                          {{ $lead->status }}
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                @if(!empty($lead->message))
                  <tr>
                    <td style="padding:16px; background:#fff; border-top:1px solid {{ $brand['line'] }};">
                      <div style="font-size:12px; color:{{ $brand['muted'] }}; margin-bottom:8px;">Message</div>
                      <div style="font-size:13px; line-height:1.6; color:{{ $brand['text'] }};">
                        {{ $lead->message }}
                      </div>
                    </td>
                  </tr>
                @endif
              </table>

              {{-- Actions --}}
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:18px;">
                <tr>
                  @if($adminLeadUrl)
                    <td class="stack" style="padding-right:8px;">
                      <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tr>
                          <td bgcolor="{{ $brand['text'] }}" style="border-radius:10px; text-align:center;">
                            <a class="btn" href="{{ $adminLeadUrl }}"
                               style="display:inline-block; padding:12px 16px; color:#fff; text-decoration:none; font-weight:800; font-size:13px; width:100%;">
                              Open in Admin →
                            </a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  @endif

                  <td class="stack" style="{{ $adminLeadUrl ? 'padding-left:8px;' : '' }}">
                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td bgcolor="{{ $brand['accent'] }}" style="border-radius:10px; text-align:center;">
                          <a class="btn" href="{{ $confirmUrl }}"
                             style="display:inline-block; padding:12px 16px; color:#fff; text-decoration:none; font-weight:800; font-size:13px; width:100%;">
                            Open Confirm Link →
                          </a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

              {{-- Confirm link fallback --}}
              <div style="margin-top:14px; font-size:12px; color:{{ $brand['muted'] }}; line-height:1.6;">
                If buttons don’t work, use this link:<br>
                <a href="{{ $confirmUrl }}" style="color:{{ $brand['accent'] }}; text-decoration:underline; word-break:break-all;">{{ $confirmUrl }}</a>
              </div>

              <div style="margin-top:10px; font-size:12px; color:{{ $brand['muted'] }};">
                Lead ID: {{ $lead->id }}
              </div>

            </td>
          </tr>

          {{-- Footer --}}
          <tr>
            <td class="p" style="background:{{ $brand['card'] }}; padding:18px 28px; border:1px solid {{ $brand['line'] }}; border-top:0; border-radius:0 0 16px 16px;">
              <div style="font-size:11px; color:{{ $brand['muted'] }}; line-height:1.6; text-align:center;">
                Internal notification • Blackpeach
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
