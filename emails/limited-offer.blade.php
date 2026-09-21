@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_limited_offer']);
    $offerBadgeImageUrl = "https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/slider/emails/offer-badge-square.png";
    $emailPreviewText = '50% OFF for a limited time! Start speaking English from just $35/month.';
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
    <title>Boston English Center - Limited Offer</title>
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
        .urgency-badge {
            display: inline-block;
            background: #DC2626;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: 900;
            padding: 6px 16px;
            border-radius: 999px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .check-item {
            padding: 8px 0;
            font-size: 15px;
            line-height: 22px;
            color: #061538;
        }
        .check-mark {
            color: #16A34A;
            font-weight: 900;
            margin-right: 8px;
        }
        .price-strike {
            font-size: 22px;
            font-weight: 800;
            color: #9CA3AF;
            text-decoration: line-through;
        }
        .price-big {
            font-size: 56px;
            font-weight: 900;
            color: #7B4DFF;
            line-height: 1;
            letter-spacing: -2px;
        }
        .price-month {
            font-size: 22px;
            font-weight: 900;
            color: #061538;
        }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-left: 18px !important; padding-right: 18px !important; }
            .hero-title { font-size: 30px !important; line-height: 36px !important; }
            .price-big { font-size: 48px !important; }
            .price-month { font-size: 20px !important; }
            .feature-stack { display: block !important; width: 100% !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; }
            .offer-card { background: #10224C !important; border-color: #29416D !important; }
            .feature-card { background: #151F4B !important; border-color: #29416D !important; }
            .pricing-card { background: #10224C !important; border-color: #7B4DFF !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .check-item { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
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

                <!-- URGENCY TOP BAR -->
                <tr>
                    <td height="5" style="background:#DC2626; font-size:0; line-height:0;">&nbsp;</td>
                </tr>

                <!-- LOGO + BADGE -->
                <tr>
                    <td class="pad" style="padding-top:24px; padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td>
                                    <div class="text-dark" style="font-size:22px; font-weight:900; color:#061538; letter-spacing:-0.5px;">BOSTON <span class="purple">ENGLISH</span> CENTER</div>
                                </td>
                                <td align="right">
                                    <span class="urgency-badge">Limited Time</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- HEADLINE -->
                <tr>
                    <td class="pad" style="padding-top:6px; padding-bottom:24px;">
                        <h1 class="hero-title text-dark" style="margin:0 0 12px; font-size:38px; line-height:44px; font-weight:900; color:#061538; letter-spacing:-1px;">
                            <span style="color:#DC2626;">50% OFF</span><br>Your English membership
                        </h1>
                        <p class="text-muted" style="margin:0; font-size:17px; line-height:26px; color:#4E5A73;">
                            This offer won't last long. Start speaking English with real people today at half the price.
                        </p>
                    </td>
                </tr>

                <!-- PRICING CARD -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pricing-card" style="background:#F6F4FF; border:2px solid #7B4DFF; border-radius:20px; overflow:hidden;">
                            <tr>
                                <td align="center" style="padding:28px 24px 20px;">
                                    <div style="margin-bottom:16px;">
                                        <img src="{{ $offerBadgeImageUrl }}" width="100" height="100" alt="50% OFF" style="width:100px; height:100px; display:inline-block;">
                                    </div>
                                    <div class="price-strike">$70/month</div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:4px auto;">
                                        <tr>
                                            <td valign="baseline" class="price-big">$35</td>
                                            <td valign="baseline" class="price-month" style="padding-left:8px;">/month</td>
                                        </tr>
                                    </table>
                                    <div style="font-size:13px; color:#4E5A73; margin-top:8px;">Save $35 every month</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- WHAT YOU GET -->
                <tr>
                    <td class="pad" style="padding-bottom:12px;">
                        <div class="text-dark" style="font-size:20px; font-weight:900; color:#061538; margin-bottom:12px;">
                            What you get:
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div class="check-item"><span class="check-mark">&#10003;</span> Conversation room 6 days a week</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> 2 live sessions per week with a teacher</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> Access to all learning materials &amp; vocabulary</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> Supportive community of English learners</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> Free placement test to find your level</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> Cancel anytime, no hidden fees</div>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td class="pad" style="padding-bottom:12px; text-align:center;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td bgcolor="#DC2626" style="border-radius:14px; padding:18px 24px; text-align:center;">
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:18px; font-weight:900; color:#FFFFFF; text-decoration:none;">
                                        Claim 50% OFF Now &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            Offer expires soon. Don't miss out.
                        </div>
                    </td>
                </tr>

                <!-- URGENCY REMINDER -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FEF2F2; border:1px solid #FECACA; border-radius:12px;">
                            <tr>
                                <td align="center" style="padding:16px 20px;">
                                    <div style="font-size:14px; font-weight:800; color:#DC2626;">
                                        &#9200; This 50% discount is available for a limited time only.
                                    </div>
                                    <div style="font-size:13px; color:#7F1D1D; margin-top:4px;">
                                        After the promotion ends, the price returns to $70/month.
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
