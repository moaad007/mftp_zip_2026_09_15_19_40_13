@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_gap']);
    $heroUrl = 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/struggle.webp?v=1.1';
    $emailPreviewText = 'There\'s a reason you\'re still stuck. And it\'s not what you think.';
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
        .left-accent p { font-size:15px; line-height:24px; color:#061538; margin:0; }
        .pain-card { border-left:4px solid #DC2626; padding:14px 18px; background:#FEF2F2; border-radius:0 8px 8px 0; margin:0 0 12px; }
        .pain-title { font-size:14px; font-weight:800; color:#DC2626; margin-bottom:4px; }
        .pain-text { font-size:14px; line-height:20px; color:#7F1D1D; margin:0; }
        .solution-card { border-left:4px solid #16A34A; padding:18px 20px; background:#F0FDF4; border-radius:0 8px 8px 0; margin:0 0 20px; }
        .solution-title { font-size:14px; font-weight:800; color:#16A34A; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:8px; }
        .solution-text { font-size:15px; line-height:24px; color:#14532D; margin:0; }
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
        }
        @media (prefers-color-scheme:dark) {
            body, .body, .email-bg { background:#020A1E !important; }
            .container { background:#020A1E !important; }
            .headline { color:#F7F9FF !important; }
            .body-text { color:#AAB7D6 !important; }
            .left-accent { background:#10224C !important; border-left-color:#C4B5FD !important; }
            .left-accent p { color:#D1D5DB !important; }
            .pain-card { background:#3f201f !important; border-left-color:#FCA5A5 !important; }
            .pain-title { color:#FCA5A5 !important; }
            .pain-text { color:#FCA5A5 !important; }
            .solution-card { background:#123c2e !important; border-left-color:#86EFAC !important; }
            .solution-text { color:#86EFAC !important; }
            .logo-text { color:#F7F9FF !important; }
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
    <table role="presentation" class="email-bg" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td align="center" style="padding:32px 12px;">
                <table role="presentation" class="container" cellpadding="0" cellspacing="0" border="0" width="580" style="max-width:580px; background:#FBFBFF; border-radius:16px;">
                    <tr><td height="4" style="background:#7B4DFF; font-size:0; line-height:0;">&nbsp;</td></tr>
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div class="logo-text" style="display:flex; align-items:center; gap:12px; color:#061538;">
                                <svg width="44" height="44" viewBox="0 0 48 48" fill="none" style="flex-shrink:0;">
                                    <circle cx="24" cy="22" r="15" stroke="#7B4DFF" stroke-width="6"/>
                                    <path d="M16 34 10 40l10-2" stroke="#7B4DFF" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span style="line-height:1.1;">
                                    <span style="display:block; font-size:22px; font-weight:800;">Boston</span>
                                    <span style="display:block; font-size:14px; font-weight:800; color:#7B4DFF; white-space:nowrap;">English Center</span>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-top:24px;">
                            <div class="overline">The real problem</div>
                            <h1 class="headline">There's a reason<br>you're still stuck</h1>
                            <div class="accent-bar"></div>
                            <p class="body-text">
                                It's not laziness. It's not lack of talent. It's that nobody told you the truth about how English fluency actually works.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <img src="{{ $heroUrl }}" alt="The struggle is real" width="532" style="width:100%; max-width:532px; height:auto; border-radius:10px;">
                        </td>
                    </tr>
                    <hr class="section-rule" style="margin:0 24px;">
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div class="pain-card">
                                <div class="pain-title">You study alone</div>
                                <p class="pain-text">Books and apps teach you words. But words alone don't make you fluent. You need to use them — out loud, with real people, in real time.</p>
                            </div>
                            <div class="pain-card">
                                <div class="pain-title">Apps keep you entertained, not fluent</div>
                                <p class="pain-text">Duolingo is fun. But fun doesn't prepare you for a job interview. Gamification is not education.</p>
                            </div>
                            <div class="pain-card">
                                <div class="pain-title">Fear keeps you silent</div>
                                <p class="pain-text">You know the words. You just can't bring yourself to say them. Because every time you tried, someone corrected you — and it felt awful.</p>
                            </div>
                        </td>
                    </tr>
                    <hr class="section-rule" style="margin:0 24px;">
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div class="solution-card">
                                <div class="solution-title">The insight</div>
                                <p class="solution-text">
                                    Fluency doesn't come from memorizing. It comes from <strong>doing</strong>. Real conversations with real people. That's the only method that works. And it's exactly what we built.
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <div class="left-accent">
                                <div style="font-size:13px; font-weight:800; color:#7B4DFF; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">How it works</div>
                                <p>Join a live conversation room. Practice with real people from 80+ countries. Get feedback from native speakers. Repeat. That's it. No apps. No books. Just speaking.</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:32px;">
                            <div class="cta-card">
                                <p style="font-size:15px; line-height:24px; color:#AAB7D6; margin:0 0 16px;">
                                    Stop studying alone. Start speaking.
                                </p>
                                <a href="{{ $dashboardUrl }}" class="cta-link" style="background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; display:inline-block;">
                                    Try It Free &rarr;
                                </a>
                                <p style="font-size:12px; color:#6B7280; margin:12px 0 0;">
                                    50% off for a limited time &middot; $35/month &middot; Cancel anytime
                                </p>
                            </div>
                        </td>
                    </tr>
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
