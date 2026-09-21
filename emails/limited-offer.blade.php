@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_gap']);
    $heroUrl = 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/signup.webp?v=1.1';
    $emailPreviewText = '50% off. Zero excuses. This offer disappears soon.';
@endphp
<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>Boston English Center</title>
    <!--[if mso]>
    <style>
        * { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
    <style>
        :root { color-scheme: light dark; supported-color-schemes: light dark; }
        body, .body, .email-bg { margin:0; padding:0; width:100%; background:#F8F8FC; font-family:Arial,Helvetica,sans-serif; -webkit-text-size-adjust:100%; }
        table { border-collapse:collapse; border-spacing:0; }
        img { display:block; border:0; outline:none; text-decoration:none; max-width:100%; height:auto; }
        a { text-decoration:none; }
        .container { width:100%; max-width:580px; }
        .pad { padding:0 24px; }
        .overline { font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:1.5px; color:#DC2626; margin:0 0 10px; }
        .headline { font-size:32px; font-weight:900; line-height:38px; color:#061538; letter-spacing:-0.5px; margin:0 0 16px; }
        .accent-bar { width:48px; height:3px; background:#DC2626; border-radius:2px; margin:0 0 20px; }
        .body-text { font-size:16px; line-height:26px; color:#4E5A73; margin:0 0 16px; }
        .section-rule { border:none; border-top:1px solid #E3E6F2; margin:28px 0; }
        .price-block { text-align:center; padding:24px 0; }
        .price-old { font-size:22px; font-weight:800; color:#9CA3AF; text-decoration:line-through; }
        .price-new { font-size:56px; font-weight:900; color:#7B4DFF; line-height:1; letter-spacing:-2px; }
        .price-suffix { font-size:18px; font-weight:700; color:#061538; }
        .check-item { padding:8px 0; font-size:15px; line-height:24px; color:#061538; }
        .check-mark { color:#16A34A; font-weight:800; margin-right:8px; }
        .cta-card { background:#061538; border-radius:12px; padding:32px 28px; text-align:center; margin:0 0 20px; }
        .cta-link { display:inline-block; background:#DC2626; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; }
        .urgency-box { background:#FEF2F2; border-radius:8px; padding:16px 20px; text-align:center; margin:0 0 20px; }
        .footer-brand { font-size:20px; font-weight:900; color:#061538; margin:0 0 4px; }
        .footer-brand span { color:#7B4DFF; }
        .footer-copy { font-size:12px; color:#9CA3AF; margin:0; }
        .footer-links { font-size:12px; color:#9CA3AF; margin:8px 0 0; }
        .footer-links a { color:#7B4DFF; text-decoration:underline; }
        @media only screen and (max-width:600px) {
            .container { max-width:100% !important; }
            .pad { padding:0 18px !important; }
            .headline { font-size:26px !important; line-height:32px !important; }
            .price-new { font-size:44px !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .body, .email-bg { background:#020A1E !important; }
            .container { background:#020A1E !important; }
            .headline, .footer-brand { color:#F7F9FF !important; }
            .body-text { color:#AAB7D6 !important; }
            .price-suffix { color:#F7F9FF !important; }
            .check-item { color:#AAB7D6 !important; }
            .urgency-box { background:#3f201f !important; }
            .urgency-box .body-text { color:#FCA5A5 !important; }
            .section-rule { border-top-color:#1E2A4A !important; }
            .cta-card { background:#071636 !important; }
            .footer-brand { color:#F7F9FF !important; }
            .footer-brand span { color:#C4B5FD !important; }
            .footer-copy, .footer-links { color:#6B7280 !important; }
            .footer-links a { color:#C4B5FD !important; }
        }
    </style>
</head>
<body class="body" style="margin:0; padding:0; width:100%; background:#F8F8FC; -webkit-text-size-adjust:100%;">
    <div style="display:none; max-height:0; overflow:hidden;">
        {{ $emailPreviewText }}
        @for($i = 0; $i < 40; $i++)&#8204;@endfor
    </div>
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#F8F8FC;">
        <tr>
            <td align="center" style="padding:32px 12px;">
                <table role="presentation" class="container" cellpadding="0" cellspacing="0" border="0" width="580" style="max-width:580px; background:#FBFBFF; border-radius:16px;">
                    {{-- TOP BAR --}}
                    <tr><td height="4" style="background:#DC2626; font-size:0; line-height:0;">&nbsp;</td></tr>

                    {{-- LOGO --}}
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div style="font-size:18px; font-weight:900; color:#061538; letter-spacing:0.5px;">BOSTON <span style="color:#7B4DFF;">ENGLISH</span> CENTER</div>
                        </td>
                    </tr>

                    {{-- HEADLINE --}}
                    <tr>
                        <td class="pad" style="padding-top:24px;">
                            <div class="overline">Limited time offer</div>
                            <h1 class="headline">50% off.<br>Zero excuses.</h1>
                            <div class="accent-bar"></div>
                            <p class="body-text">
                                This isn't a marketing trick. The price is cut in half because we want you to start now — not "someday." Someday never comes.
                            </p>
                        </td>
                    </tr>

                    {{-- HERO IMAGE --}}
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <img src="{{ $heroUrl }}" alt="Start your English journey today" width="532" style="width:100%; max-width:532px; height:auto; border-radius:10px;">
                        </td>
                    </tr>

                    <hr class="section-rule" style="margin:0 24px;">

                    {{-- PRICE --}}
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div class="price-block">
                                <div class="price-old">$70/month</div>
                                <div class="price-new">$35</div>
                                <div class="price-suffix">/month &middot; 50% off</div>
                            </div>
                        </td>
                    </tr>

                    {{-- WHAT YOU GET --}}
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <div style="font-size:14px; font-weight:800; color:#061538; text-transform:uppercase; letter-spacing:1px; margin-bottom:12px;">What you get</div>
                            <div class="check-item"><span class="check-mark">&#10003;</span> Live conversation rooms with real people</div>
                            <div class="check-item"><span class="check-mark">&#10003;</span> Personalized feedback from native speakers</div>
                            <div class="check-item"><span class="check-mark">&#10003;</span> Structured curriculum that actually works</div>
                            <div class="check-item"><span class="check-mark">&#10003;</span> Access to 80+ countries of practice partners</div>
                            <div class="check-item"><span class="check-mark">&#10003;</span> Cancel anytime — no lock-in contracts</div>
                        </td>
                    </tr>

                    <hr class="section-rule" style="margin:0 24px;">

                    {{-- URGENCY --}}
                    <tr>
                        <td class="pad" style="padding-top:28px; padding-bottom:28px;">
                            <div class="urgency-box">
                                <p class="body-text" style="margin:0; color:#7F1D1D;">
                                    <strong>This offer expires soon.</strong> When it's gone, the price goes back to $70/month.
                                </p>
                            </div>
                        </td>
                    </tr>

                    {{-- CTA --}}
                    <tr>
                        <td class="pad" style="padding-bottom:32px;">
                            <div class="cta-card">
                                <p style="font-size:15px; line-height:24px; color:#AAB7D6; margin:0 0 16px;">
                                    Every day you wait is a day you stay stuck.
                                </p>
                                <a href="{{ $dashboardUrl }}" class="cta-link" style="background:#DC2626; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; display:inline-block;">
                                    Claim 50% OFF Now &rarr;
                                </a>
                                <p style="font-size:12px; color:#6B7280; margin:12px 0 0;">
                                    50% off for a limited time &middot; $35/month &middot; Cancel anytime
                                </p>
                            </div>
                        </td>
                    </tr>

                    {{-- FOOTER --}}
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <hr class="section-rule" style="margin:0 0 20px;">
                            <div style="text-align:center;">
                                <div class="footer-brand">Boston <span>English</span> Center</div>
                                <p class="footer-copy">&copy; {{ date('Y') }} Boston English Center. All rights reserved.</p>
                                <p class="footer-links">
                                    <a href="{{ $dashboardUrl }}">Dashboard</a> &nbsp;|&nbsp;
                                    <a href="mailto:{{ $supportEmail }}">Support</a> &nbsp;|&nbsp;
                                    <a href="{{ $unsubscribeUrl }}">Unsubscribe</a>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
