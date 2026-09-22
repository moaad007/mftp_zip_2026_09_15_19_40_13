@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_gap']);
    $heroUrl = 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/hero.webp?v=1.1';
    $emailPreviewText = 'The next 6 months will pass anyway. Which version of yourself will you become?';
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
        .card-danger { background:#FEF2F2; border-radius:8px; padding:16px; text-align:center; }
        .card-success { background:#F0FDF4; border-radius:8px; padding:16px; text-align:center; }
        .card-label-danger { font-size:12px; font-weight:800; color:#DC2626; text-transform:uppercase; letter-spacing:0.5px; }
        .card-label-success { font-size:12px; font-weight:800; color:#16A34A; text-transform:uppercase; letter-spacing:0.5px; }
        .card-text-danger { font-size:13px; color:#7F1D1D; margin-top:6px; line-height:18px; }
        .card-text-success { font-size:13px; color:#14532D; margin-top:6px; line-height:18px; }
        .proof-bold { color:#061538; }
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
            .cta-card { padding:24px 20px !important; }
            .col-half { display:block !important; width:100% !important; padding:6px 0 !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .body, .email-bg { background:#020A1E !important; }
            .container { background:#020A1E !important; }
            .headline { color:#F7F9FF !important; }
            .body-text { color:#AAB7D6 !important; }
            .left-accent { background:#10224C !important; border-left-color:#C4B5FD !important; }
            .left-accent p { color:#D1D5DB !important; }
            .card-danger { background:#3f201f !important; }
            .card-success { background:#123c2e !important; }
            .card-text-danger { color:#FCA5A5 !important; }
            .card-text-success { color:#86EFAC !important; }
            .logo-text { color:#F7F9FF !important; }
            .proof-bold { color:#F7F9FF !important; }
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
                            <div class="overline">Welcome</div>
                            <h1 class="headline">This is the email<br>that changes everything</h1>
                            <div class="accent-bar"></div>
                            <p class="body-text">
                                You signed up because something told you: enough waiting. The next 6 months will pass whether you act or not. The only question is who you'll be when they do.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <img src="{{ $heroUrl }}" alt="Your English journey starts now" width="532" style="width:100%; max-width:532px; height:auto; border-radius:10px;">
                        </td>
                    </tr>
                    <hr class="section-rule" style="margin:0 24px;">
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div class="left-accent">
                                <div style="font-size:13px; font-weight:800; color:#7B4DFF; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">What happens next</div>
                                <p>In 6 months, you'll either be speaking English in meetings, interviews, and conversations — or you'll still be saying "I'll start next week." The difference isn't talent. It's the decision you make right now.</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td class="col-half" width="48%" style="vertical-align:top; padding-right:8px;">
                                        <div class="card-danger">
                                            <div style="font-size:24px; margin-bottom:6px;">&#10007;</div>
                                            <div class="card-label-danger">If you wait</div>
                                            <div class="card-text-danger">Same fear. Same silence. Same results.</div>
                                        </div>
                                    </td>
                                    <td width="4%"></td>
                                    <td class="col-half" width="48%" style="vertical-align:top; padding-left:8px;">
                                        <div class="card-success">
                                            <div style="font-size:24px; margin-bottom:6px;">&#10003;</div>
                                            <div class="card-label-success">If you start</div>
                                            <div class="card-text-success">Confidence. Opportunities. A new you.</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <hr class="section-rule" style="margin:0 24px;">
                    <tr>
                        <td class="pad" style="padding-top:28px; padding-bottom:28px;">
                            <p class="body-text" style="text-align:center; margin:0;">
                                <strong class="proof-bold">25,000+</strong> students from <strong class="proof-bold">80+ countries</strong> made this choice. They didn't wait for the perfect moment. They started.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:32px;">
                            <div class="cta-card">
                                <p style="font-size:15px; line-height:24px; color:#AAB7D6; margin:0 0 16px;">
                                    Which version of yourself do you want to become?
                                </p>
                                <a href="{{ $dashboardUrl }}" class="cta-link" style="background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; display:inline-block;">
                                    Start Speaking Now &rarr;
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
