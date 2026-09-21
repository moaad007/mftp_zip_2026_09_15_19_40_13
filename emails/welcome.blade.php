@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_gap']);
    $futuresBannerUrl = "https://material-media.s3.us-east-1.amazonaws.com/slider/emails/futures-banner-1.jpeg";
    $futuresBannerMobileUrl = "https://material-media.s3.us-east-1.amazonaws.com/slider/emails/futures-banner-mobile-1.jpeg";
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
    <meta name="description" content="{{ $emailPreviewText }}">
    <title>Boston English Center</title>
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
        .container { width: 100%; max-width: 740px; background: #FBFBFF; border-radius: 20px; }
        .pad { padding-left: 28px; padding-right: 28px; }
        .card { background: #ffffff; border: 1px solid #E3E6F2; border-radius: 16px; overflow: hidden; }
        .purple { color: #7B4DFF !important; -webkit-text-fill-color: #7B4DFF !important; }
        .desktop-img-row { display: table-row; }
        .mobile-img-row { display: none; max-height: 0; overflow: hidden; mso-hide: all; }
        u + .body .gmail-blend-screen { background: #000000; mix-blend-mode: screen; }
        u + .body .gmail-blend-difference { background: #000000; mix-blend-mode: difference; }
        .price-strike { font-size: 22px; font-weight: 800; color: #9CA3AF; text-decoration: line-through; }
        .price-big { font-size: 72px; font-weight: 900; color: #7B4DFF; line-height: 1; letter-spacing: -3px; }
        .price-month { font-size: 26px; font-weight: 900; color: #061538; }
        @media only screen and (max-width: 600px) {
            .container { width: 90% !important; max-width: 370px !important; }
            .pad { padding-left: 0 !important; padding-right: 0 !important; }
            .section { padding-top: 12px !important; }
            .headline { font-size: 30px !important; line-height: 36px !important; letter-spacing: 0 !important; white-space: normal !important; }
            .subhead { font-size: 17px !important; line-height: 24px !important; margin-top: 12px !important; }
            .desktop-img-row { display: none !important; width: 0 !important; max-height: 0 !important; overflow: hidden !important; mso-hide: all !important; }
            .mobile-img-row { display: table-row !important; max-height: none !important; overflow: visible !important; }
            .mobile-img { display: block !important; width: 100% !important; max-width: 100% !important; height: auto !important; }
            .futures-image-card, .futures-image-card img { border-radius: 0 !important; }
            .futures-image-card { border: 0 !important; }
            .cta-link { padding: 16px 18px !important; }
            .cta-text { font-size: 18px !important; line-height: 24px !important; white-space: nowrap !important; }
            .offer-inner { padding: 16px 14px !important; }
            .offer-badge-cell { width: 118px !important; padding-right: 14px !important; text-align: left !important; }
            .offer-badge-img { width: 104px !important; height: 104px !important; margin: 0 !important; }
            .old-price { font-size: 19px !important; line-height: 24px !important; text-align: left !important; }
            .price-big { font-size: 52px !important; }
            .price-month { font-size: 20px !important; }
            .cta-question { font-size: 17px !important; line-height: 23px !important; white-space: normal !important; }
            .button-heart { font-size: 23px !important; line-height: 23px !important; margin-right: 8px !important; }
            .safe-note { font-size: 13px !important; line-height: 19px !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; }
            .card, .offer-card { background: #10224C !important; border-color: #29416D !important; }
            .offer-card { background: #071636 !important; border-color: #071636 !important; }
            .headline, .subhead, .cta-question, .safe-note { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .muted, .old-price { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .purple { color: #C4B5FD !important; -webkit-text-fill-color: #C4B5FD !important; }
            .button-link, .button-link span, .button-text, .button-text * { color: #ffffff !important; -webkit-text-fill-color: #ffffff !important; }
            .price-month { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .email-footer-end, .brand-footer, .help-panel, .contact-card { background: #071636 !important; background-color: #071636 !important; }
            .text-main, .text-main *, .footer-title { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted, .text-muted *, .footer-copy, .contact-value, .contact-value:link, .contact-value:visited, .contact-value span, .contact-value * { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .text-accent, .text-accent *, .footer-accent, .contact-chevron { color: #C4B5FD !important; -webkit-text-fill-color: #C4B5FD !important; }
            .contact-icon { border-color: #29416D !important; }
        }
    </style>
</head>
<body class="body" style="margin:0; padding:0; width:100%; background:#F8F8FC; border:0; outline:0; font-family:Arial, Helvetica, sans-serif; color:#061538;">
<div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; overflow:hidden; opacity:0; color:#F8F8FC; mso-hide:all;">
    {{ $emailPreviewText }}
</div>
<div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; overflow:hidden; opacity:0; color:#F8F8FC; mso-hide:all;">
    &nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;
</div>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="email-bg" style="width:100%; background:#F8F8FC; border:0; border-top:0; border-bottom:0; outline:0; box-shadow:none; border-collapse:collapse; border-spacing:0;">
    <tr>
        <td align="center" style="padding:0; border:0; border-top:0; border-bottom:0; outline:0; box-shadow:none;">
            <!--[if mso]><table role="presentation" width="740" cellpadding="0" cellspacing="0" border="0" style="border:0;border-top:0;border-bottom:0;outline:0;box-shadow:none;border-collapse:collapse;border-spacing:0;"><tr><td style="border:0;border-top:0;border-bottom:0;outline:0;box-shadow:none;"><![endif]-->
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container" style="width:100%; max-width:740px; background:#FBFBFF; border-radius:20px; overflow:hidden; border:0; outline:0; box-shadow:none;">

                <!-- HEADLINE -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:34px;">
                        <div class="headline" style="font-size:44px; line-height:50px; font-weight:900; color:#061538; letter-spacing:-1.5px; text-align:center; white-space:normal;">
                            Stop waiting.<br>Start <span class="purple">speaking.</span>
                        </div>
                        <div class="subhead" style="max-width:610px; margin:16px auto 0; font-size:22px; line-height:30px; font-weight:400; color:#061538; text-align:center;">
                            You already know you need to improve your English.<br>
                            The only question is: <strong>when will you actually start?</strong>
                        </div>
                    </td>
                </tr>

                <!-- HERO IMAGE -->
                <tr>
                    <td class="pad" style="padding-top:6px; padding-bottom:20px;">
                        <div style="border-radius:16px; overflow:hidden;">
                            <img src="https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/hero.webp?v=1.1" width="688" alt="Students practicing English in a live conversation" style="width:100%; max-width:100%; height:auto; display:block;">
                        </div>
                    </td>
                </tr>

                <!-- PAIN POINTS -->
                <tr>
                    <td class="pad section" style="padding-top:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FEF2F2; border:1px solid #FECACA; border-radius:16px;">
                            <tr>
                                <td style="padding:24px 28px;">
                                    <div style="font-size:18px; font-weight:900; color:#DC2626; margin-bottom:14px;">Sound familiar?</div>
                                    <div style="font-size:15px; line-height:28px; color:#7F1D1D;">
                                        &#10007; You know grammar rules but freeze when someone talks to you<br>
                                        &#10007; You keep telling yourself "I'll start next week"<br>
                                        &#10007; You've tried apps and books but nothing sticks<br>
                                        &#10007; You feel embarrassed when you have to speak
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FUTURES IMAGE -->
                <tr>
                    <td class="pad section" style="padding-top:22px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card futures-image-card" style="border-color:#C7B8FF;">
                            <tr class="desktop-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img src="{{ $futuresBannerUrl }}" width="688" alt="Today versus 6 months later English progress comparison" style="width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>
                            <!--[if !mso]><!-->
                            <tr class="mobile-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img class="mobile-img" src="{{ $futuresBannerMobileUrl }}" width="100%" alt="Today versus 6 months later English progress comparison" style="display:none; width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>
                            <!--<![endif]-->
                        </table>
                    </td>
                </tr>

                <!-- SOCIAL PROOF LINE -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:24px;">
                        <div style="font-size:16px; line-height:24px; color:#4E5A73; text-align:center;">
                            <strong style="color:#061538;">25,000+ students</strong> from 80+ countries already made the switch.<br>
                            They stopped studying alone. Now they <strong class="purple">speak with confidence.</strong>
                        </div>
                    </td>
                </tr>

                <!-- OFFER -->
                <tr>
                    <td class="pad section" style="padding-top:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card offer-card" style="background:#ffffff; border-color:#D8DDEB; border-radius:16px;">
                            <tr>
                                <td class="offer-inner" style="padding:28px 20px 22px;">
                                    <div class="cta-question" style="margin-bottom:16px; font-size:22px; line-height:28px; font-weight:900; color:#061538; text-align:center; white-space:normal;">
                                        Which version of yourself do you want to become?
                                    </div>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td align="center" style="padding-bottom:18px;">
                                                <div class="price-strike muted" style="text-decoration-color:#E23245;">$70/month</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0;">
                                                    <tr>
                                                        <td valign="baseline" class="price-big purple">$35</td>
                                                        <td valign="baseline" class="price-month" style="padding-left:10px;">/month</td>
                                                    </tr>
                                                </table>
                                                <div style="font-size:14px; color:#16A34A; font-weight:800; margin-top:6px;">SAVE 50% - Limited Time</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                                                                            <td bgcolor="#7B4DFF" style="background:#7B4DFF; border-radius:14px;">
                                                <a href="{{ $dashboardUrl }}" class="button-link cta-link" style="display:block; padding:18px 22px; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; text-decoration:none !important; border-radius:14px; text-align:center; white-space:nowrap;">
                                                    <span class="button-heart" style="display:inline-block; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; font-size:25px; line-height:25px; text-align:center; vertical-align:middle; margin-right:10px;">&#128156;</span>
                                                    <span class="gmail-blend-screen" style="display:inline-block; vertical-align:middle;"><span class="gmail-blend-difference" style="display:inline-block;"><span class="cta-text" style="display:inline-block; font-size:22px; line-height:28px; font-weight:900; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important;">Start Your Journey Now</span></span></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="safe-note" style="margin-top:14px; font-size:13px; line-height:19px; color:#4E5A73; text-align:center;">
                                        Cancel anytime &middot; No hidden fees &middot; Start speaking this week
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- URGENCY -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:12px; padding-bottom:20px;">
                        <div style="font-size:14px; line-height:20px; color:#DC2626; font-weight:800; text-align:center;">
                            &#9200; This 50% offer won't last forever. The price goes back to $70/month soon.
                        </div>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td class="email-footer-end" style="padding:0; background:#FBFBFF;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <!-- Need Help -->
                            <tr>
                                <td class="help-panel" style="padding:28px 18px 24px; background:#FBFBFF;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="top" style="padding:0 18px 12px 0;">
                                                <div class="text-main help-title" style="font-size:30px; line-height:34px; font-weight:900; color:#071A44; letter-spacing:-0.8px;">Need Help?</div>
                                                <div class="text-muted help-copy" style="padding-top:8px; font-size:16px; line-height:23px; font-weight:600; color:#405273;">We're here to help you on your English learning journey.</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top:6px;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border-radius:14px; background:#F3F4F8;">
                                                    <tr>
                                                        <td width="52" align="center" valign="middle" class="contact-icon-cell" style="width:52px; padding:14px 0 14px 10px;">
                                                            <div class="contact-icon" style="width:42px; height:42px; border-radius:50%; background:#EFF6FF; color:#3385F2; font-size:18px; line-height:42px; font-weight:900; text-align:center;">TEL</div>
                                                        </td>
                                                        <td valign="middle" class="contact-copy-cell" style="padding:14px 10px;">
                                                            <div class="text-main contact-label" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44;">Call Us</div>
                                                            <a href="tel:16178482317" class="text-muted contact-value" style="display:block; padding-top:2px; font-size:15px; line-height:21px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none;">+1 (617) 848-2317</a>
                                                        </td>
                                                        <td width="28" align="center" valign="middle" class="contact-chevron" style="width:28px; padding-right:14px; color:#4024D6; font-size:22px; line-height:22px; font-weight:900;">&#8250;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top:12px;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border-radius:14px; background:#F3F4F8;">
                                                    <tr>
                                                        <td width="52" align="center" valign="middle" class="contact-icon-cell" style="width:52px; padding:14px 0 14px 10px;">
                                                            <div class="contact-icon" style="width:42px; height:42px; border-radius:50%; background:#F5F3FF; color:#6F2AE8; font-size:14px; line-height:42px; font-weight:900; text-align:center;">@</div>
                                                        </td>
                                                        <td valign="middle" class="contact-copy-cell" style="padding:14px 10px;">
                                                            <div class="text-main contact-label" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44;">Email Us</div>
                                                            <a href="mailto:{{ $supportEmail }}" class="text-muted contact-value" style="display:block; padding-top:2px; font-size:16px; line-height:22px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none; word-break:break-word;">{{ $supportEmail }}</a>
                                                        </td>
                                                        <td width="28" align="center" valign="middle" class="contact-chevron" style="width:28px; padding-right:14px; color:#4024D6; font-size:22px; line-height:22px; font-weight:900;">&#8250;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <!-- Brand Footer -->
                            <tr>
                                <td class="brand-footer" style="padding:22px 0 26px; background:#FBFBFF;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td align="center">
                                                <div class="text-main footer-title" style="font-size:23px; line-height:24px; font-weight:900; color:#071A44; letter-spacing:-0.6px;">Boston</div>
                                                <div class="text-accent footer-accent" style="font-size:15px; line-height:18px; font-weight:900; color:#1357E8;">English Center</div>
                                                <div class="text-muted footer-copy" style="margin:14px 0 0; font-size:13px; line-height:20px; font-weight:600; color:#64748B; text-align:center;">
                                                    &copy; {{ date('Y') }} Boston English Center<br>All Rights Reserved.
                                                </div>
                                                <div style="margin-top:10px; font-size:12px; text-align:center;">
                                                    <a href="{{ $unsubscribeUrl }}" style="color:#64748B; text-decoration:underline;">Unsubscribe</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
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
