@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_social_proof']);
    $emailPreviewText = '4.9 out of 5 stars. 3,237 reviews. See why students love Boston English Center.';
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
    <title>Boston English Center - Student Stories</title>
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
        .stars { color: #F59E0B; font-size: 20px; letter-spacing: 2px; }
        .testimonial-card {
            background: #FFFFFF;
            border: 1px solid #E3E6F2;
            border-radius: 16px;
            overflow: hidden;
        }
        .stat-box {
            background: #F6F4FF;
            border: 1px solid #E3DBFF;
            border-radius: 12px;
            text-align: center;
            padding: 18px 10px;
        }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-left: 18px !important; padding-right: 18px !important; }
            .hero-title { font-size: 28px !important; line-height: 34px !important; }
            .stat-grid td { display: block !important; width: 100% !important; padding-bottom: 10px !important; }
            .testimonial-stack { display: block !important; width: 100% !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; }
            .testimonial-card { background: #10224C !important; border-color: #29416D !important; }
            .stat-box { background: #151F4B !important; border-color: #29416D !important; }
            .quote-box { background: #151F4B !important; border-color: #29416D !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .review-text { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .footer-section { background: #071636 !important; }
            .rating-bar { background: #151F4B !important; }
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
                    <td class="pad" style="padding-top:10px; padding-bottom:20px;">
                        <div style="font-size:13px; font-weight:800; color:#7B4DFF; text-transform:uppercase; letter-spacing:1px; margin-bottom:10px;">
                            STUDENT SUCCESS STORIES
                        </div>
                        <h1 class="hero-title text-dark" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538; letter-spacing:-1px;">
                            Don't take our word for it.<br>Hear from <span class="purple">our students</span>.
                        </h1>
                    </td>
                </tr>

                <!-- RATING SUMMARY -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#F6F4FF; border:1px solid #E3DBFF; border-radius:16px;">
                            <tr>
                                <td align="center" style="padding:24px 20px;">
                                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <div class="text-dark" style="font-size:42px; font-weight:900; color:#061538; margin:6px 0 2px;">4.9</div>
                                    <div class="text-muted" style="font-size:14px; color:#4E5A73;">out of 5 &middot; 3,237 verified reviews</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- STATS ROW -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr class="stat-grid">
                                <td width="33%" class="stat-box" style="padding:16px 8px;">
                                    <div class="text-dark" style="font-size:28px; font-weight:900; color:#061538;">25K+</div>
                                    <div class="text-muted" style="font-size:12px; color:#4E5A73; margin-top:2px;">Students improved</div>
                                </td>
                                <td width="4%"></td>
                                <td width="29%" class="stat-box" style="padding:16px 8px;">
                                    <div class="text-dark" style="font-size:28px; font-weight:900; color:#061538;">80+</div>
                                    <div class="text-muted" style="font-size:12px; color:#4E5A73; margin-top:2px;">Countries</div>
                                </td>
                                <td width="4%"></td>
                                <td width="30%" class="stat-box" style="padding:16px 8px;">
                                    <div class="text-dark" style="font-size:28px; font-weight:900; color:#061538;">6</div>
                                    <div class="text-muted" style="font-size:12px; color:#4E5A73; margin-top:2px;">Days a week</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- TESTIMONIAL 1 -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="testimonial-card">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="stars" style="margin-bottom:10px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <div class="review-text" style="font-size:15px; line-height:23px; color:#221A4B; font-style:italic;">
                                        "I used to be afraid of making mistakes. After 3 months at Boston English Center, I speak with confidence in meetings and with friends. The conversation rooms changed everything for me."
                                    </div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin-top:14px;">
                                        <tr>
                                            <td valign="middle">
                                                <div style="width:40px; height:40px; border-radius:50%; background:#E8F5E9; color:#16A34A; font-size:14px; font-weight:900; text-align:center; line-height:40px;">S</div>
                                            </td>
                                            <td valign="middle" style="padding-left:12px;">
                                                <div class="text-dark" style="font-size:14px; font-weight:800; color:#061538;">Sara from Canada</div>
                                                <div class="text-muted" style="font-size:12px; color:#4E5A73;">Student for 1 year+</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- TESTIMONIAL 2 -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="testimonial-card">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="stars" style="margin-bottom:10px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <div class="review-text" style="font-size:15px; line-height:23px; color:#221A4B; font-style:italic;">
                                        "I knew English grammar, but I couldn't hold a conversation. Now I can talk to anyone. The teachers are amazing and the community is so welcoming."
                                    </div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin-top:14px;">
                                        <tr>
                                            <td valign="middle">
                                                <div style="width:40px; height:40px; border-radius:50%; background:#E3F2FD; color:#1976D2; font-size:14px; font-weight:900; text-align:center; line-height:40px;">N</div>
                                            </td>
                                            <td valign="middle" style="padding-left:12px;">
                                                <div class="text-dark" style="font-size:14px; font-weight:800; color:#061538;">Nada from USA</div>
                                                <div class="text-muted" style="font-size:12px; color:#4E5A73;">Student for 9 months+</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- TESTIMONIAL 3 -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="testimonial-card">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="stars" style="margin-bottom:10px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <div class="review-text" style="font-size:15px; line-height:23px; color:#221A4B; font-style:italic;">
                                        "I always got nervous when speaking English. Now I enjoy talking. The practice groups helped me remember what I learned and build real confidence."
                                    </div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin-top:14px;">
                                        <tr>
                                            <td valign="middle">
                                                <div style="width:40px; height:40px; border-radius:50%; background:#FFF3E0; color:#E65100; font-size:14px; font-weight:900; text-align:center; line-height:40px;">M</div>
                                            </td>
                                            <td valign="middle" style="padding-left:12px;">
                                                <div class="text-dark" style="font-size:14px; font-weight:800; color:#061538;">Mohamed from Turkey</div>
                                                <div class="text-muted" style="font-size:12px; color:#4E5A73;">Student for 6 months+</div>
                                            </td>
                                        </tr>
                                    </table>
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
                                        Join 25,000+ Happy Students &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            Starting from $35/month. Cancel anytime.
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
