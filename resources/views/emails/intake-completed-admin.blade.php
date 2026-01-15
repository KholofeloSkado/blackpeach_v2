{{-- resources/views/emails/intake-completed-admin.blade.php --}}
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
  <title>ADMIN: Intake completed</title>
</head>
<body style="margin:0; padding:0; background:{{ $brand['soft'] }}; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif; color:{{ $brand['text'] }};">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td align="center" style="padding:20px 12px;">
        <table role="presentation" width="680" cellspacing="0" cellpadding="0" border="0" style="width:100%; max-width:680px;">
          <tr>
            <td style="background:{{ $brand['bg'] }}; padding:16px 18px; border-radius:14px 14px 0 0; color:#fff;">
              <div style="font-size:12px; opacity:.8; letter-spacing:.08em; text-transform:uppercase;">Admin</div>
              <div style="font-size:18px; font-weight:700; margin-top:4px;">Intake completed — {{ $lead->name }}</div>
            </td>
          </tr>

          <tr>
            <td style="background:{{ $brand['card'] }}; padding:18px; border:1px solid {{ $brand['line'] }}; border-top:0; border-radius:0 0 14px 14px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:13px;">
                <tr>
                  <td style="color:{{ $brand['muted'] }}; padding:6px 0;">Lead</td>
                  <td style="text-align:right; font-weight:600; padding:6px 0;">{{ $lead->name }}</td>
                </tr>
                <tr>
                  <td style="color:{{ $brand['muted'] }}; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">Email</td>
                  <td style="text-align:right; font-weight:600; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">{{ $lead->email }}</td>
                </tr>
                <tr>
                  <td style="color:{{ $brand['muted'] }}; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">Phone</td>
                  <td style="text-align:right; font-weight:600; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">{{ $lead->phone }}</td>
                </tr>
                <tr>
                  <td style="color:{{ $brand['muted'] }}; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">Business</td>
                  <td style="text-align:right; font-weight:600; padding:6px 0; border-top:1px solid {{ $brand['line'] }};">{{ $lead->business_name ?? '—' }}</td>
                </tr>
              </table>

              <div style="height:14px;"></div>

              <div style="padding:14px; background:{{ $brand['soft'] }}; border:1px solid {{ $brand['line'] }}; border-radius:12px;">
                <div style="font-size:12px; letter-spacing:.08em; text-transform:uppercase; color:{{ $brand['muted'] }}; margin-bottom:10px;">
                  Intake answers
                </div>

                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="font-size:13px;">
                  @php
                    $rows = [
                      ['Decision maker', $intake->is_decision_maker ? 'Yes' : 'No'],
                      ['Operating status', $intake->operating_status],
                      ['Paying customers', $intake->has_paying_customers ? 'Yes' : 'No'],
                      ['Budget range', $intake->budget_range],
                      ['Payment readiness', $intake->payment_readiness],
                      ['Primary goal', $intake->primary_goal],
                      ['Email setup needed', $intake->needs_professional_email_setup ? 'Yes' : 'No'],
                      ['Email accounts needed', $intake->email_accounts_needed ?? '—'],
                    ];
                  @endphp

                  @foreach($rows as $i => [$k, $v])
                    <tr>
                      <td style="padding:8px 0; color:{{ $brand['muted'] }}; {{ $i ? 'border-top:1px solid '.$brand['line'].';' : '' }}">
                        {{ $k }}
                      </td>
                      <td style="padding:8px 0; text-align:right; font-weight:600; {{ $i ? 'border-top:1px solid '.$brand['line'].';' : '' }}">
                        {{ $v }}
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>

              <div style="margin-top:12px; font-size:12px; color:{{ $brand['muted'] }};">
                Lead ID: {{ $lead->id }} • Status: {{ $lead->status }}
              </div>
            </td>
          </tr>

          <tr><td style="height:12px;"></td></tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
