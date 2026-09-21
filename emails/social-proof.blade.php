@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_story']);
    $offerBadgeImageUrl = "https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/slider/emails/offer-badge-square.png";
    $emailPreviewText = 'Sara was afraid to speak. 3 months later she got promoted. Here is what changed.';
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
    <title>Boston English Center - Real Results</title>
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
        .stars { color: #F59E0B; font-size: 20px; letter-spacing: 2px; }
        .price-strike { font-size: 22px; font-weight: 800; color: #9CA3AF; text-decoration: line-through; }
        .price-big { font-size: 56px; font-weight: 900; color: #7B4DFF; line-height: 1; letter-spacing: -2px; }
        .price-month { font-size: 22px; font-weight: 900; color: #061538; }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-left: 18px !important; padding-right: 18px !important; }
            .hero-title { font-size: 28px !important; line-height: 34px !important; }
            .price-big { font-size: 48px !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; }
            .story-card { background: #10224C !important; border-color: #29416D !important; }
            .pricing-card { background: #10224C !important; border-color: #7B4DFF !important; }
            .urgent-box { background: #3f201f !important; border-color: #5c2c28 !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .story-text { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .before-after-left { background: #151F4B !important; border-color: #29416D !important; }
            .before-after-right { background: #123c2e !important; border-color: #2e6d54 !important; }
            .price-month { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .email-footer-end, .brand-footer, .help-panel, .contact-card { background: #071636 !important; background-color: #071636 !important; }
            .text-main, .text-main *, .footer-title { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted, .text-muted *, .footer-copy, .contact-value, .contact-value:link, .contact-value:visited, .contact-value span, .contact-value * { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .text-accent, .text-accent *, .footer-accent, .contact-chevron { color: #C4B5FD !important; -webkit-text-fill-color: #C4B5FD !important; }
            .contact-icon { border-color: #29416D !important; }
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
                    <td class="pad" style="padding-top:10px; padding-bottom:24px;">
                        <h1 class="hero-title text-dark" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538; letter-spacing:-1px;">
                            She was afraid to speak.<br>3 months later, she got <span class="purple">promoted.</span>
                        </h1>
                    </td>
                </tr>

                <!-- HERO IMAGE -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div style="border-radius:18px; overflow:hidden;">
                            <img src="https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/imagine.webp?v=1.1" width="624" alt="Woman speaking English confidently with friends" style="width:100%; max-width:100%; height:auto; display:block;">
                        </div>
                    </td>
                </tr>

                <!-- STORY CARD -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="story-card" style="background:#F6F4FF; border:1px solid #E3DBFF; border-radius:18px;">
                            <tr>
                                <td style="padding:28px 26px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:16px;">
                                        <tr>
                                            <td valign="middle">
                                                <div style="width:48px; height:48px; border-radius:50%; background:#E8F5E9; color:#16A34A; font-size:16px; font-weight:900; text-align:center; line-height:48px;">S</div>
                                            </td>
                                            <td valign="middle" style="padding-left:14px;">
                                                <div class="text-dark" style="font-size:16px; font-weight:900; color:#061538;">Sara from Canada</div>
                                                <div class="stars" style="font-size:14px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="story-text" style="font-size:16px; line-height:25px; color:#221A4B;">
                                        "I knew English. I had the grammar. But every time I had to speak in a meeting, I <strong>froze.</strong> I watched colleagues with weaker skills get promoted because they could communicate better."
                                    </div>
                                    <div class="story-text" style="font-size:16px; line-height:25px; color:#221A4B; margin-top:14px;">
                                        "Then I joined Boston English Center. The conversation rooms forced me to actually <strong>use</strong> English, not just study it. After 3 months, I led my first presentation in English. Last week I got the promotion I wanted."
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- BEFORE / AFTER -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="48%" class="before-after-left" style="background:#FFF5F5; border:1px solid #FECACA; border-radius:12px; padding:18px 16px;">
                                    <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#DC2626; margin-bottom:8px;">&#10060; Before</div>
                                    <div style="font-size:14px; line-height:21px; color:#7F1D1D;">Afraid to speak in meetings. Watched others get promoted.</div>
                                </td>
                                <td width="4%"></td>
                                <td width="48%" class="before-after-right" style="background:#F0FDF4; border:1px solid #C8E6D5; border-radius:12px; padding:18px 16px;">
                                    <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#16A34A; margin-bottom:8px;">&#10003; After 3 months</div>
                                    <div style="font-size:14px; line-height:21px; color:#14532D;">Led presentations in English. Got promoted.</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- MORE PROOF -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div style="font-size:16px; font-weight:800; color:#061538; margin-bottom:12px;">She is not alone.</div>
                        <div style="font-size:14px; line-height:24px; color:#4E5A73;">
                            <strong style="color:#061538;">25,000+ students</strong> from 80+ countries have already transformed their English.<br>
                            <span class="stars" style="font-size:14px;">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <strong style="color:#061538;">4.9 out of 5</strong> &middot; 3,237 verified reviews
                        </div>
                    </td>
                </tr>

                <!-- URGENCY -->
                <tr>
                    <td class="pad" style="padding-bottom:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FEF2F2; border:1px solid #FECACA; border-radius:14px;">
                            <tr>
                                <td align="center" style="padding:16px 20px;">
                                    <div style="font-size:15px; font-weight:900; color:#DC2626;">
                                        &#9200; Your 50% discount is waiting.
                                    </div>
                                    <div style="font-size:14px; color:#7F1D1D; margin-top:4px;">
                                        But not for long. The price goes back to $70/month soon.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- OFFER -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pricing-card" style="background:#F6F4FF; border:2px solid #7B4DFF; border-radius:20px;">
                            <tr>
                                <td align="center" style="padding:24px;">
                                    <div style="margin-bottom:12px;">
                                        <img src="{{ $offerBadgeImageUrl }}" width="90" height="90" alt="50% OFF" style="width:90px; height:90px; display:inline-block;">
                                    </div>
                                    <div class="price-strike">$70/month</div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:4px auto;">
                                        <tr>
                                            <td valign="baseline" class="price-big">$35</td>
                                            <td valign="baseline" class="price-month" style="padding-left:8px;">/month</td>
                                        </tr>
                                    </table>
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
                                        Start Speaking With Confidence &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            Cancel anytime. No hidden fees. Start speaking this week.
                        </div>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td class="email-footer-end" style="padding:0; background:#FBFBFF;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
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
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border-radius:16px; background:#FBFBFF;">
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
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border-radius:16px; background:#FBFBFF;">
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
                                                    <a href="{{ $unsubscribeUrl }}" style="color:#9CA3AF; text-decoration:underline;">Unsubscribe</a>
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
