@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_alone']);
    $emailPreviewText = 'You have been studying English for years. Why can you still not speak? Here is what you are missing.';
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
    <title>Boston English Center - This is what you are missing</title>
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
        .container { width: 100%; max-width: 680px; background: #FBFBFF; }
        .pad { padding-left: 28px; padding-right: 28px; }
        .purple { color: #7B4DFF !important; -webkit-text-fill-color: #7B4DFF !important; }
        .price-strike { font-size: 22px; font-weight: 800; color: #9CA3AF; text-decoration: line-through; }
        .price-big { font-size: 56px; font-weight: 900; color: #7B4DFF; line-height: 1; letter-spacing: -2px; }
        .price-month { font-size: 22px; font-weight: 900; color: #061538; }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-left: 18px !important; padding-right: 18px !important; }
            .hero-title { font-size: 28px !important; line-height: 34px !important; }
            .comparison-stack { display: block !important; width: 100% !important; }
            .price-big { font-size: 48px !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; }
            .pain-card { background: #3f201f !important; border-color: #5c2c28 !important; }
            .solution-card { background: #123c2e !important; border-color: #2e6d54 !important; }
            .pricing-card { background: #10224C !important; border-color: #7B4DFF !important; }
            .urgent-box { background: #3f201f !important; border-color: #5c2c28 !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .pain-text { color: #FCA5A5 !important; -webkit-text-fill-color: #FCA5A5 !important; }
            .solution-text { color: #86EFAC !important; -webkit-text-fill-color: #86EFAC !important; }
            .price-month { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
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

                <!-- TOP BAR -->
                <tr>
                    <td height="5" style="background:#DC2626; font-size:0; line-height:0;">&nbsp;</td>
                </tr>

                <!-- LOGO -->
                <tr>
                    <td class="pad" style="padding-top:28px; padding-bottom:8px;">
                        <div class="text-dark" style="font-size:22px; font-weight:900; color:#061538; letter-spacing:-0.5px;">BOSTON <span class="purple">ENGLISH</span> CENTER</div>
                    </td>
                </tr>

                <!-- HEADLINE -->
                <tr>
                    <td class="pad" style="padding-top:10px; padding-bottom:24px;">
                        <h1 class="hero-title text-dark" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538; letter-spacing:-1px;">
                            You have been studying English for years.<br>Why can you still <span style="color:#DC2626;">not speak?</span>
                        </h1>
                        <p class="text-muted" style="margin:0; font-size:17px; line-height:26px; color:#4E5A73;">
                            Here is what you are missing. And how to fix it before this offer ends.
                        </p>
                    </td>
                </tr>

                <!-- PAIN POINT: ALONE -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pain-card" style="background:#FEF2F2; border:1px solid #FECACA; border-radius:16px;">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="pain-text" style="font-size:18px; font-weight:900; color:#DC2626; margin-bottom:8px;">&#10060; Studying alone does not work</div>
                                    <div style="font-size:15px; line-height:23px; color:#7F1D1D;">
                                        You can read grammar books for 10 years. But if you never practice speaking with real people, you will never be fluent. Knowledge is not the same as skill.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- PAIN POINT: APPS -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pain-card" style="background:#FEF2F2; border:1px solid #FECACA; border-radius:16px;">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="pain-text" style="font-size:18px; font-weight:900; color:#DC2626; margin-bottom:8px;">&#10060; Apps keep you entertained, not fluent</div>
                                    <div style="font-size:15px; line-height:23px; color:#7F1D1D;">
                                        Duolingo is fun. But it will never prepare you for a real conversation with a colleague, a friend, or a stranger. You need real practice, not games.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- PAIN POINT: FEAR -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pain-card" style="background:#FEF2F2; border:1px solid #FECACA; border-radius:16px;">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="pain-text" style="font-size:18px; font-weight:900; color:#DC2626; margin-bottom:8px;">&#10060; Fear keeps you silent</div>
                                    <div style="font-size:15px; line-height:23px; color:#7F1D1D;">
                                        You are afraid of making mistakes. So you stay quiet. But the only way to get better at speaking is to actually speak. Every day. With real people.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- SOLUTION -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="solution-card" style="background:#F0FDF4; border:1px solid #C8E6D5; border-radius:16px;">
                            <tr>
                                <td style="padding:24px;">
                                    <div class="solution-text" style="font-size:20px; font-weight:900; color:#16A34A; margin-bottom:10px;">&#10003; This is what you are missing:</div>
                                    <div style="font-size:15px; line-height:26px; color:#14532D;">
                                        <strong>Real people to practice with.</strong> Not AI. Not apps. Real conversations, with real students and teachers, 6 days a week. That is how you go from knowing English to <strong>speaking</strong> English.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- WHAT YOU GET (concise) -->
                <tr>
                    <td class="pad" style="padding-bottom:12px;">
                        <div class="text-dark" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:10px;">What you get for $35/month:</div>
                    </td>
                </tr>
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div style="font-size:15px; line-height:28px; color:#061538;">
                            &#10003; Conversation room 6 days a week<br>
                            &#10003; 2 live sessions with real teachers<br>
                            &#10003; All learning materials included<br>
                            &#10003; Supportive community<br>
                            &#10003; Cancel anytime, no hidden fees
                        </div>
                    </td>
                </tr>

                <!-- OFFER -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pricing-card" style="background:#F6F4FF; border:2px solid #7B4DFF; border-radius:20px;">
                            <tr>
                                <td align="center" style="padding:24px;">
                                    <div class="price-strike">$70/month</div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:4px auto;">
                                        <tr>
                                            <td valign="baseline" class="price-big">$35</td>
                                            <td valign="baseline" class="price-month" style="padding-left:8px;">/month</td>
                                        </tr>
                                    </table>
                                    <div style="font-size:14px; color:#16A34A; font-weight:800; margin-top:6px;">SAVE 50% - Limited Time</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td class="pad" style="padding-bottom:12px; text-align:center;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td bgcolor="#7B4DFF" style="border-radius:14px; padding:18px 24px; text-align:center;">
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:18px; font-weight:900; color:#FFFFFF; text-decoration:none;">
                                        Stop Studying Alone. Start Speaking. &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            Start speaking this week. Cancel anytime.
                        </div>
                    </td>
                </tr>

                <!-- URGENCY -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FEF2F2; border:1px solid #FECACA; border-radius:14px;">
                            <tr>
                                <td align="center" style="padding:16px 20px;">
                                    <div style="font-size:15px; font-weight:900; color:#DC2626;">
                                        &#9200; 50% OFF ends soon.
                                    </div>
                                    <div style="font-size:14px; color:#7F1D1D; margin-top:4px;">
                                        Every day you wait is another day you stay stuck. The price goes back to $70/month.
                                    </div>
                                </td>
                            </tr>
                        </table>
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
