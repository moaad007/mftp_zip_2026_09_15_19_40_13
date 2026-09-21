@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_features']);
    $emailPreviewText = 'Everything you need to speak English with confidence - conversation rooms, live sessions, materials, and community.';
@endphp
<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <meta name="description" content="{{ $emailPreviewText }}">
    <title>Boston English Center - Features</title>
    <!--[if mso]>
    <style>
        * { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
    <style>
        :root {
            color-scheme: light dark;
            supported-color-schemes: light dark;
        }
        body, .body, .email-bg {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            background: #F8F8FC;
            font-family: Arial, Helvetica, sans-serif;
            -webkit-text-size-adjust: 100%;
        }
        table { border-collapse: collapse; border-spacing: 0; }
        img { display: block; border: 0; }
        a { text-decoration: none; }
        .container {
            width: 100%;
            max-width: 680px;
            background: #FBFBFF;
        }
        .pad { padding-left: 28px; padding-right: 28px; }
        .purple { color: #7B4DFF !important; -webkit-text-fill-color: #7B4DFF !important; }
        .feature-icon {
            display: inline-block;
            width: 52px;
            height: 52px;
            line-height: 52px;
            border-radius: 14px;
            font-size: 24px;
            text-align: center;
        }
        .feature-card {
            background: #FFFFFF;
            border: 1px solid #E3E6F2;
            border-radius: 16px;
            overflow: hidden;
        }
        .comparison-header {
            background: #0B1938;
            color: #FFFFFF;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 12px 18px;
            border-radius: 12px 12px 0 0;
        }
        .comparison-row {
            border-bottom: 1px solid #EAEFF9;
        }
        .comparison-row:last-child {
            border-bottom: 0;
        }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-left: 18px !important; padding-right: 18px !important; }
            .hero-title { font-size: 30px !important; line-height: 36px !important; }
            .feature-grid td { display: block !important; width: 100% !important; padding-bottom: 14px !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; }
            .feature-card { background: #10224C !important; border-color: #29416D !important; }
            .quote-card { background: #151F4B !important; border-color: #29416D !important; }
            .comparison-header { background: #10224C !important; }
            .comparison-row { border-color: #29416D !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .feature-title { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .footer-section { background: #071636 !important; }
        }
    </style>
</head>
<body class="body" style="margin:0; padding:0; width:100%; background:#F8F8FC; color:#061538;">
<div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; overflow:hidden; opacity:0; color:#F8F8FC;">
    {{ $emailPreviewText }}
</div>
<div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; overflow:hidden; opacity:0; color:#F8F8FC;">
    &nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;
</div>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="email-bg" style="width:100%; background:#F8F8FC;">
    <tr>
        <td align="center" style="padding: 24px 10px 40px;">
            <!--[if mso]><table role="presentation" width="680" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container" style="max-width:680px; background:#FBFBFF; border-radius:20px; overflow:hidden; border:1px solid #E3E6F2;">

                <!-- TOP ACCENT BAR -->
                <tr>
                    <td height="5" style="background:#7B4DFF; font-size:0; line-height:0;">&nbsp;</td>
                </tr>

                <!-- LOGO -->
                <tr>
                    <td class="pad" style="padding-top:28px; padding-bottom:8px;">
                        <div class="text-dark" style="font-size:22px; font-weight:900; color:#061538; letter-spacing:-0.5px;">BOSTON <span class="purple">ENGLISH</span> CENTER</div>
                    </td>
                </tr>

                <!-- HEADLINE -->
                <tr>
                    <td class="pad" style="padding-top:10px; padding-bottom:28px;">
                        <div style="font-size:13px; font-weight:800; color:#7B4DFF; text-transform:uppercase; letter-spacing:1px; margin-bottom:10px;">
                            EVERYTHING YOU NEED
                        </div>
                        <h1 class="hero-title text-dark" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538; letter-spacing:-1px;">
                            Speak English<br>with <span class="purple">confidence</span>
                        </h1>
                        <p class="text-muted" style="margin:0; font-size:17px; line-height:26px; color:#4E5A73;">
                            All the tools, practice, and support you need in one place. No textbooks. No boring grammar drills. Just real practice with real people.
                        </p>
                    </td>
                </tr>

                <!-- FEATURE 1 -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="feature-card">
                            <tr>
                                <td style="padding:24px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="top">
                                                <span class="feature-icon" style="background:#EDE9FE; color:#7B4DFF;">&#128172;</span>
                                            </td>
                                            <td valign="top" style="padding-left:16px;">
                                                <div class="feature-title" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:6px;">Conversation Room 6 Days a Week</div>
                                                <div class="text-muted" style="font-size:14px; line-height:22px; color:#4E5A73;">
                                                    Practice speaking in real conversations with students from around the world. Build your confidence in a safe, supportive environment. Open Monday through Saturday.
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FEATURE 2 -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="feature-card">
                            <tr>
                                <td style="padding:24px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="top">
                                                <span class="feature-icon" style="background:#DCFCE7; color:#16A34A;">&#127891;</span>
                                            </td>
                                            <td valign="top" style="padding-left:16px;">
                                                <div class="feature-title" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:6px;">2 Live Sessions Per Week</div>
                                                <div class="text-muted" style="font-size:14px; line-height:22px; color:#4E5A73;">
                                                    Join small group classes with real teachers. Get personalized feedback, ask questions, and improve faster with expert guidance.
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FEATURE 3 -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="feature-card">
                            <tr>
                                <td style="padding:24px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="top">
                                                <span class="feature-icon" style="background:#FEF3C7; color:#D97706;">&#128218;</span>
                                            </td>
                                            <td valign="top" style="padding-left:16px;">
                                                <div class="feature-title" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:6px;">Access to All Learning Materials</div>
                                                <div class="text-muted" style="font-size:14px; line-height:22px; color:#4E5A73;">
                                                    Review lessons, practice exercises, and learn vocabulary anytime. Study at your own pace, wherever you are.
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FEATURE 4 -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="feature-card">
                            <tr>
                                <td style="padding:24px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="top">
                                                <span class="feature-icon" style="background:#E0F2FE; color:#0284C7;">&#129309;</span>
                                            </td>
                                            <td valign="top" style="padding-left:16px;">
                                                <div class="feature-title" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:6px;">Supportive Community</div>
                                                <div class="text-muted" style="font-size:14px; line-height:22px; color:#4E5A73;">
                                                    Connect with students who share the same goal. Share progress, make friends, and grow together on your English learning journey.
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- COMPARISON TABLE -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <div class="comparison-header">&#128161; Self-study vs. Boston English Center</div>
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #EAEFF9; border-top:0; border-radius:0 0 12px 12px; overflow:hidden;">
                            <tr class="comparison-row" style="border-bottom:1px solid #EAEFF9;">
                                <td width="50%" style="background:#FFF5F5; padding:14px 16px; font-size:14px; color:#6B2121;">
                                    <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#DC2626; margin-bottom:3px;">&#10060; Studying alone</div>
                                    <div style="font-weight:700;">No one to practice speaking with</div>
                                </td>
                                <td width="50%" style="background:#F0FDF4; padding:14px 16px; font-size:14px; color:#14532D;">
                                    <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#16A34A; margin-bottom:3px;">&#10003; Boston English Center</div>
                                    <div style="font-weight:700;">Real people to practice with daily</div>
                                </td>
                            </tr>
                            <tr class="comparison-row" style="border-bottom:1px solid #EAEFF9;">
                                <td width="50%" style="background:#FFF5F5; padding:14px 16px; font-size:14px; color:#6B2121;">
                                    <div style="font-weight:700;">Grammar-focused, not speaking-focused</div>
                                </td>
                                <td width="50%" style="background:#F0FDF4; padding:14px 16px; font-size:14px; color:#14532D;">
                                    <div style="font-weight:700;">Speaking-first approach with real feedback</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="background:#FFF5F5; padding:14px 16px; font-size:14px; color:#6B2121;">
                                    <div style="font-weight:700;">Easy to lose motivation</div>
                                </td>
                                <td width="50%" style="background:#F0FDF4; padding:14px 16px; font-size:14px; color:#14532D;">
                                    <div style="font-weight:700;">Community keeps you accountable</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- QUOTE -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="quote-card" style="background:#F6F4FF; border-left:4px solid #7B4DFF; border-radius:0 12px 12px 0;">
                            <tr>
                                <td style="padding:20px 22px;">
                                    <div style="font-size:15px; line-height:23px; color:#221A4B; font-style:italic;">
                                        "I had nobody to practice with. Now I speak English every week and my confidence has grown so much."
                                    </div>
                                    <div style="margin-top:10px; font-size:13px; font-weight:800; color:#7B4DFF;">
                                        &mdash; Abir from Qatar
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td class="pad" style="padding-bottom:32px; text-align:center;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td bgcolor="#7B4DFF" style="border-radius:14px; padding:18px 24px; text-align:center;">
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:18px; font-weight:900; color:#FFFFFF; text-decoration:none;">
                                        Start Speaking Today &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            From $35/month. Cancel anytime. No hidden fees.
                        </div>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td class="footer-section" style="padding:24px 28px 30px; border-top:1px solid #ECEFF6; background:#FBFBFF;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center">
                                    <div class="text-dark" style="font-size:20px; font-weight:900; color:#061538; letter-spacing:-0.5px;">Boston <span class="purple">English</span> Center</div>
                                    <div class="text-muted" style="font-size:13px; line-height:20px; color:#64748B; margin-top:8px; text-align:center;">
                                        Need help? Contact us at<br>
                                        <a href="tel:16178482317" style="color:#7B4DFF; font-weight:700;">+1 (617) 848-2317</a> or
                                        <a href="mailto:{{ $supportEmail }}" style="color:#7B4DFF; font-weight:700;">{{ $supportEmail }}</a>
                                    </div>
                                    <div class="text-muted" style="font-size:11px; line-height:18px; color:#9CA3AF; margin-top:14px; text-align:center;">
                                        &copy; {{ date('Y') }} Boston English Center. All Rights Reserved.<br>
                                        <a href="{{ $unsubscribeUrl }}" style="color:#9CA3AF; text-decoration:underline;">Unsubscribe</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
            <!--[if mso]></td></tr></table><![endif]-->
        </td>
    </tr>
</table>
</body>
</html>
