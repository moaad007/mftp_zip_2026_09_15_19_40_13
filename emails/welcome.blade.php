@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_welcome']);
    $heroImageUrl = "https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/hero.webp?v=1.1";
    $emailPreviewText = 'Welcome to Boston English Center! Your journey to English fluency starts here.';
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
    <title>Boston English Center - Welcome</title>
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
        img { display: block; border: 0; outline: none; text-decoration: none; }
        a { text-decoration: none; }
        .container {
            width: 100%;
            max-width: 680px;
            background: #FBFBFF;
        }
        .pad { padding-left: 28px; padding-right: 28px; }
        .purple { color: #7B4DFF !important; -webkit-text-fill-color: #7B4DFF !important; }
        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            background: #7B4DFF;
            color: #ffffff;
            font-size: 18px;
            font-weight: 900;
            text-align: center;
        }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-left: 18px !important; padding-right: 18px !important; }
            .hero-title { font-size: 30px !important; line-height: 36px !important; }
            .step-row td { display: block !important; width: 100% !important; }
            .step-content { padding-left: 0 !important; padding-top: 10px !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; }
            .card { background: #10224C !important; border-color: #29416D !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .step-card { background: #151F4B !important; border-color: #29416D !important; }
            .hero-section { background: #0A1A3A !important; }
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
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td>
                                    <div class="text-dark" style="font-size:22px; font-weight:900; color:#061538; letter-spacing:-0.5px;">BOSTON <span class="purple">ENGLISH</span> CENTER</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- HERO WELCOME -->
                <tr>
                    <td class="pad" style="padding-top:10px; padding-bottom:24px;">
                        <div style="font-size:13px; font-weight:800; color:#7B4DFF; text-transform:uppercase; letter-spacing:1px; margin-bottom:10px;">
                            WELCOME ABOARD
                        </div>
                        <h1 class="hero-title text-dark" style="margin:0 0 14px; font-size:36px; line-height:42px; font-weight:900; color:#061538; letter-spacing:-1px;">
                            Your English journey<br>starts <span class="purple">right now</span>
                        </h1>
                        <p class="text-muted" style="margin:0; font-size:17px; line-height:26px; color:#4E5A73;">
                            Join 25,000+ students from 80+ countries who are already improving their English with us. Here's how to get started in 3 simple steps.
                        </p>
                    </td>
                </tr>

                <!-- HERO IMAGE -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <div style="border-radius:16px; overflow:hidden; border:1px solid #E3E6F2;">
                            <img src="{{ $heroImageUrl }}" width="624" alt="Students practicing English together" style="width:100%; max-width:100%; height:auto; display:block;">
                        </div>
                    </td>
                </tr>

                <!-- STEP 1 -->
                <tr class="step-row">
                    <td class="pad" style="padding-bottom:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="step-card" style="background:#F6F4FF; border:1px solid #E3DBFF; border-radius:16px;">
                            <tr>
                                <td width="80" align="center" valign="top" style="padding:22px 0 22px 20px;">
                                    <span class="step-number">1</span>
                                </td>
                                <td class="step-content" style="padding:20px 22px 20px 10px;">
                                    <div class="text-dark" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:4px;">Take Your Placement Test</div>
                                    <div class="text-muted" style="font-size:14px; line-height:21px; color:#4E5A73;">
                                        Find your level in just 5 minutes. We'll match you with the right classes and materials from day one.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- STEP 2 -->
                <tr class="step-row">
                    <td class="pad" style="padding-bottom:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="step-card" style="background:#F0FAF5; border:1px solid #C8E6D5; border-radius:16px;">
                            <tr>
                                <td width="80" align="center" valign="top" style="padding:22px 0 22px 20px;">
                                    <span class="step-number" style="background:#16A34A;">2</span>
                                </td>
                                <td class="step-content" style="padding:20px 22px 20px 10px;">
                                    <div class="text-dark" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:4px;">Join Your First Conversation</div>
                                    <div class="text-muted" style="font-size:14px; line-height:21px; color:#4E5A73;">
                                        Jump into our conversation room, open 6 days a week. Practice speaking with real people in a supportive environment.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- STEP 3 -->
                <tr class="step-row">
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="step-card" style="background:#FFF8ED; border:1px solid #F0DDB8; border-radius:16px;">
                            <tr>
                                <td width="80" align="center" valign="top" style="padding:22px 0 22px 20px;">
                                    <span class="step-number" style="background:#D97706;">3</span>
                                </td>
                                <td class="step-content" style="padding:20px 22px 20px 10px;">
                                    <div class="text-dark" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:4px;"> Attend Live Sessions</div>
                                    <div class="text-muted" style="font-size:14px; line-height:21px; color:#4E5A73;">
                                        Join 2 live sessions per week with real teachers. Get personalized feedback and watch your confidence grow.
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
                                        Start Learning Now &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            Cancel anytime. No hidden fees.
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
