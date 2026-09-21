@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_gap']);
    $heroUrl = 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/imagine.webp?v=1.1';
    $emailPreviewText = 'They didn\'t believe it either. Until they tried.';
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
        .overline { font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:1.5px; color:#7B4DFF; margin:0 0 10px; }
        .headline { font-size:32px; font-weight:900; line-height:38px; color:#061538; letter-spacing:-0.5px; margin:0 0 16px; }
        .accent-bar { width:48px; height:3px; background:#7B4DFF; border-radius:2px; margin:0 0 20px; }
        .body-text { font-size:16px; line-height:26px; color:#4E5A73; margin:0 0 16px; }
        .section-rule { border:none; border-top:1px solid #E3E6F2; margin:28px 0; }
        .left-accent { border-left:4px solid #7B4DFF; padding:16px 20px; background:#F6F4FF; border-radius:0 8px 8px 0; margin:0 0 20px; }
        .story-card { background:#F6F4FF; border-radius:10px; padding:24px; margin:0 0 20px; }
        .stat-row { text-align:center; padding:12px 0; }
        .stat-num { font-size:28px; font-weight:900; color:#061538; }
        .stat-label { font-size:12px; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px; margin-top:2px; }
        .cta-card { background:#061538; border-radius:12px; padding:32px 28px; text-align:center; margin:0 0 20px; }
        .cta-link { display:inline-block; background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; }
        .footer-brand { font-size:20px; font-weight:900; color:#061538; margin:0 0 4px; }
        .footer-brand span { color:#7B4DFF; }
        .footer-copy { font-size:12px; color:#9CA3AF; margin:0; }
        .footer-links { font-size:12px; color:#9CA3AF; margin:8px 0 0; }
        .footer-links a { color:#7B4DFF; text-decoration:underline; }
        @media only screen and (max-width:600px) {
            .container { max-width:100% !important; }
            .pad { padding:0 18px !important; }
            .headline { font-size:26px !important; line-height:32px !important; }
            .stat-num { font-size:22px !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .body, .email-bg { background:#020A1E !important; }
            .container { background:#020A1E !important; }
            .headline, .footer-brand { color:#F7F9FF !important; }
            .body-text { color:#AAB7D6 !important; }
            .left-accent { background:#10224C !important; border-left-color:#C4B5FD !important; }
            .story-card { background:#10224C !important; }
            .stat-num { color:#F7F9FF !important; }
            .stat-label { color:#6B7280 !important; }
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
                    <tr><td height="4" style="background:#7B4DFF; font-size:0; line-height:0;">&nbsp;</td></tr>

                    {{-- LOGO --}}
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div style="font-size:18px; font-weight:900; color:#061538; letter-spacing:0.5px;">BOSTON <span style="color:#7B4DFF;">ENGLISH</span> CENTER</div>
                        </td>
                    </tr>

                    {{-- HEADLINE --}}
                    <tr>
                        <td class="pad" style="padding-top:24px;">
                            <div class="overline">Real students. Real results.</div>
                            <h1 class="headline">They didn't believe<br>it either</h1>
                            <div class="accent-bar"></div>
                            <p class="body-text">
                                Sara from Canada spent years studying alone. Apps, books, YouTube — nothing stuck. Then she tried one conversation room. That was 8 months ago. She hasn't stopped since.
                            </p>
                        </td>
                    </tr>

                    {{-- HERO IMAGE --}}
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <img src="{{ $heroUrl }}" alt="Imagine speaking with confidence" width="532" style="width:100%; max-width:532px; height:auto; border-radius:10px;">
                        </td>
                    </tr>

                    <hr class="section-rule" style="margin:0 24px;">

                    {{-- SARA'S STORY --}}
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div class="story-card">
                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td style="vertical-align:top;">
                                            <div style="width:40px; height:40px; border-radius:50%; background:#E8F5E9; color:#16A34A; font-size:16px; font-weight:900; line-height:40px; text-align:center;">S</div>
                                        </td>
                                        <td style="padding-left:12px; vertical-align:top;">
                                            <div style="font-size:14px; font-weight:800; color:#061538;">Sara, Canada</div>
                                            <div style="font-size:12px; color:#6B7280; margin-top:2px;">Student for 8 months</div>
                                        </td>
                                    </tr>
                                </table>
                                <p style="font-size:15px; line-height:24px; color:#061538; margin:16px 0 0; font-style:italic;">
                                    "I used to freeze every time someone spoke to me in English. Now I lead meetings in English. The change wasn't gradual — it happened the moment I started actually speaking."
                                </p>
                            </div>
                        </td>
                    </tr>

                    {{-- BEFORE / AFTER --}}
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="48%" style="vertical-align:top; background:#FEF2F2; border-radius:8px; padding:14px 16px;">
                                        <div style="font-size:11px; font-weight:800; color:#DC2626; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:6px;">Before</div>
                                        <div style="font-size:13px; color:#7F1D1D; line-height:18px;">Avoided English conversations. Froze in meetings. Watched others get promoted.</div>
                                    </td>
                                    <td width="4%"></td>
                                    <td width="48%" style="vertical-align:top; background:#F0FDF4; border-radius:8px; padding:14px 16px;">
                                        <div style="font-size:11px; font-weight:800; color:#16A34A; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:6px;">After</div>
                                        <div style="font-size:13px; color:#14532D; line-height:18px;">Leads meetings. Speaks with confidence. Got promoted within 6 months.</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <hr class="section-rule" style="margin:0 24px;">

                    {{-- PROOF NUMBERS --}}
                    <tr>
                        <td class="pad" style="padding-top:28px; padding-bottom:28px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td class="stat-row" width="33%">
                                        <div class="stat-num">25,000+</div>
                                        <div class="stat-label">Students</div>
                                    </td>
                                    <td class="stat-row" width="33%">
                                        <div class="stat-num">4.9/5</div>
                                        <div class="stat-label">Rating</div>
                                    </td>
                                    <td class="stat-row" width="33%">
                                        <div class="stat-num">80+</div>
                                        <div class="stat-label">Countries</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- CTA --}}
                    <tr>
                        <td class="pad" style="padding-bottom:32px;">
                            <div class="cta-card">
                                <p style="font-size:15px; line-height:24px; color:#AAB7D6; margin:0 0 16px;">
                                    Your story could be next. The only difference between you and them is they started.
                                </p>
                                <a href="{{ $dashboardUrl }}" class="cta-link" style="background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; display:inline-block;">
                                    Start Speaking With Confidence &rarr;
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
