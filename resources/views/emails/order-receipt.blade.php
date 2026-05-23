@php
    $formatPeso = fn ($value) => '₱' . number_format((float) $value, 2);
    $paymentLabels = [
        'gcash' => 'GCash',
        'maya' => 'Maya',
        'paypal' => 'PayPal',
        'card' => 'Credit/Debit Card',
        'cod' => 'Cash on Delivery',
        'apple' => 'Apple Pay',
        'google' => 'Google Pay',
    ];
    $paymentMethod = $paymentLabels[$order['paymentMethod']] ?? ucfirst((string) $order['paymentMethod']);
    $emailSafeImage = fn ($value) => is_string($value) && preg_match('/^https?:\\/\\//i', $value);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your iLearn Science order is ready</title>
</head>
<body style="margin:0;padding:0;background:#080b12;color:#e1e2eb;font-family:'Plus Jakarta Sans',Arial,sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:radial-gradient(circle at 18% 10%,rgba(0,212,255,.22),transparent 28%),radial-gradient(circle at 84% 8%,rgba(209,188,255,.18),transparent 32%),linear-gradient(135deg,#080b12 0%,#10131a 58%,#151827 100%);padding:34px 14px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:720px;border:1px solid rgba(168,232,255,.24);border-radius:28px;overflow:hidden;background:rgba(25,28,34,.86);box-shadow:0 0 42px rgba(0,212,255,.18);">
                    <tr>
                        <td style="padding:30px 30px 20px;border-bottom:1px solid rgba(168,232,255,.14);background:linear-gradient(135deg,rgba(0,212,255,.13),rgba(209,188,255,.08));">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td>
                                        <div style="font-family:Sora,Arial,sans-serif;font-size:24px;font-weight:800;color:#a8e8ff;letter-spacing:-.02em;">iLearn Science</div>
                                        <div style="margin-top:6px;font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:#bbc9cf;">Secure Digital Checkout</div>
                                    </td>
                                    <td align="right">
                                        <span style="display:inline-block;border:1px solid rgba(0,212,255,.42);border-radius:999px;background:rgba(0,212,255,.12);padding:9px 13px;font-family:'JetBrains Mono',monospace;font-size:12px;color:#a8e8ff;">{{ $order['orderNumber'] }}</span>
                                    </td>
                                </tr>
                            </table>
                            <h1 style="margin:34px 0 10px;font-family:Sora,Arial,sans-serif;font-size:34px;line-height:1.12;color:#00d4ff;">Mission Accomplished</h1>
                            <p style="margin:0;color:#e1e2eb;font-size:17px;line-height:1.6;">Hi {{ $order['customer']['name'] }}, your science learning resources are ready for instant download.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px 30px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid rgba(116,245,255,.18);border-radius:20px;background:rgba(11,14,20,.52);">
                                <tr>
                                    <td style="padding:18px 20px;">
                                        <div style="font-family:'JetBrains Mono',monospace;font-size:11px;letter-spacing:.13em;text-transform:uppercase;color:#74f5ff;">Digital Delivery</div>
                                        <p style="margin:8px 0 0;color:#bbc9cf;line-height:1.55;">Your downloadable learning materials are connected to this order and will also be available from your iLearn Science dashboard.</p>
                                    </td>
                                </tr>
                            </table>

                            <h2 style="margin:28px 0 14px;font-family:Sora,Arial,sans-serif;font-size:20px;color:#e1e2eb;">Purchased Resources</h2>
                            @foreach ($order['items'] as $item)
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom:12px;border:1px solid rgba(255,255,255,.08);border-radius:18px;background:rgba(39,42,49,.62);">
                                    <tr>
                                        <td style="padding:14px;width:70px;">
                                            @if ($emailSafeImage($item['image']))
                                                <img src="{{ $item['image'] }}" width="58" height="58" alt="" style="display:block;width:58px;height:58px;border-radius:14px;object-fit:cover;border:1px solid rgba(168,232,255,.22);">
                                            @else
                                                <div style="width:58px;height:58px;border-radius:14px;background:#32353c;border:1px solid rgba(168,232,255,.22);"></div>
                                            @endif
                                        </td>
                                        <td style="padding:14px 8px;">
                                            <div style="font-family:Sora,Arial,sans-serif;font-size:16px;font-weight:700;color:#e1e2eb;">{{ $item['title'] }}</div>
                                            <div style="margin-top:6px;color:#bbc9cf;font-size:13px;">{{ $item['meta'] }} • Qty {{ $item['quantity'] }}</div>
                                        </td>
                                        <td align="right" style="padding:14px;color:#a8e8ff;font-family:'JetBrains Mono',monospace;font-size:14px;white-space:nowrap;">{{ $formatPeso($item['price'] * $item['quantity']) }}</td>
                                    </tr>
                                </table>
                            @endforeach

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-top:22px;border-top:1px solid rgba(168,232,255,.13);padding-top:18px;">
                                <tr>
                                    <td style="padding:5px 0;color:#bbc9cf;">Subtotal</td>
                                    <td align="right" style="padding:5px 0;color:#e1e2eb;">{{ $formatPeso($order['totals']['subtotal']) }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 0;color:#bbc9cf;">Discount</td>
                                    <td align="right" style="padding:5px 0;color:#74f5ff;">-{{ $formatPeso($order['totals']['discount']) }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 0;color:#bbc9cf;">Payment Method</td>
                                    <td align="right" style="padding:5px 0;color:#e1e2eb;">{{ $paymentMethod }}</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:15px;font-family:Sora,Arial,sans-serif;font-size:20px;color:#a8e8ff;">Total Paid</td>
                                    <td align="right" style="padding-top:15px;font-family:Sora,Arial,sans-serif;font-size:22px;font-weight:800;color:#00d4ff;">{{ $formatPeso($order['totals']['total']) }}</td>
                                </tr>
                            </table>

                            <div style="text-align:center;margin:30px 0 6px;">
                                <a href="{{ url('/dashboard') }}" style="display:inline-block;text-decoration:none;border-radius:18px;background:#00d4ff;color:#003642;font-family:'JetBrains Mono',monospace;font-size:13px;font-weight:800;letter-spacing:.05em;padding:15px 24px;box-shadow:0 0 24px rgba(0,212,255,.34);">OPEN DOWNLOADS</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:22px 30px;border-top:1px solid rgba(255,255,255,.08);background:rgba(11,14,20,.52);">
                            <p style="margin:0;color:#bbc9cf;font-size:12px;line-height:1.6;">Secure checkout notice: this confirmation was generated by iLearn Science for digital resource delivery. If you did not place this order, please contact support immediately.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
