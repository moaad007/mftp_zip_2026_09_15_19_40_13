@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_50k_gap']);
    $emailPreviewText = 'Fluent English is worth $50,000 more over your career. Here is the math.';
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
        :root { color-scheme: light dark; supported-color-schemes: light dark; }
        body, .body, .email-bg { margin:0 !important; padding:0 !important; width:100% !important; background:#020A1E; font-family:Arial, Helvetica, sans-serif; -webkit-text-size-adjust:100%; }
        table { border-collapse:collapse; border-spacing:0; }
        img { display:block; border:0; }
        a { text-decoration:none; }
        .container { width:100%; max-width:680px; background:#FBFBFF; border-radius:20px; }
        .pad { padding-left:28px; padding-right:28px; }
        .purple { color:#7B4DFF !important; -webkit-text-fill-color:#7B4DFF !important; }
        @media only screen and (max-width:600px) {
            .container { width:100% !important; }
            .pad { padding-left:18px !important; padding-right:18px !important; }
            .headline { font-size:30px !important; line-height:36px !important; }
            .stat-big { font-size:42px !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .email-bg { background:#020A1E !important; }
            .container { background:#071636 !important; }
            .stat-card { background:#10224C !important; }
            .career-card { background:#151F4B !important; }
            .text-dark { color:#F7F9FF !important; -webkit-text-fill-color:#F7F9FF !important; }
            .text-muted { color:#AAB7D6 !important; -webkit-text-fill-color:#AAB7D6 !important; }
            .email-footer-end, .brand-footer, .help-panel, .contact-card { background:#071636 !important; }
            .text-main, .text-main *, .footer-title { color:#F7F9FF !important; -webkit-text-fill-color:#F7F9FF !important; }
            .text-muted, .text-muted *, .footer-copy, .contact-value, .contact-value:link, .contact-value:visited, .contact-value span, .contact-value * { color:#AAB7D6 !important; -webkit-text-fill-color:#AAB7D6 !important; }
            .text-accent, .text-accent *, .footer-accent, .contact-chevron { color:#C4B5FD !important; -webkit-text-fill-color:#C4B5FD !important; }
        }
    </style>
</head>
<body class="body" style="margin:0; padding:0; width:100%; background:#020A1E; font-family:Arial, Helvetica, sans-serif; color:#061538;">
<div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; overflow:hidden; opacity:0; color:#F8F8FC; mso-hide:all;">{{ $emailPreviewText }}</div>
<div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; overflow:hidden; opacity:0; color:#F8F8FC; mso-hide:all;">&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;&nbsp;&#8204;</div>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="email-bg" style="width:100%; background:#F8F8FC;">
    <tr>
        <td align="center" style="padding:24px 10px 40px;">
            <!--[if mso]><table role="presentation" width="680" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container" style="max-width:680px; background:#FBFBFF; border-radius:20px; overflow:hidden;">

                <tr><td height="5" style="background:#DC2626; font-size:0; line-height:0;">&nbsp;</td></tr>

                <tr>
                    <td class="pad" style="padding-top:28px; padding-bottom:8px;">
                        <div style="font-size:22px; font-weight:900; color:#061538;">BOSTON <span class="purple">ENGLISH</span> CENTER</div>
                    </td>
                </tr>

                <tr>
                    <td class="pad" style="padding-top:10px; padding-bottom:28px;">
                        <h1 class="headline" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538; text-align:center;">
                            Your English isn't a hobby.<br>It's a <span class="purple">salary negotiation.</span>
                        </h1>
                    </td>
                </tr>

                <!-- VISUAL: SALARY GAP -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-radius:16px; overflow:hidden;">
                            <tr>
                                <td style="background:#FEF2F2; padding:20px 24px;">
                                    <div style="font-size:11px; font-weight:800; color:#DC2626; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">Without fluent English</div>
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="background:#FECACA; height:24px; border-radius:12px; width:45%;"></td>
                                            <td style="width:55%;"></td>
                                        </tr>
                                    </table>
                                    <div style="font-size:14px; font-weight:700; color:#7F1D1D; margin-top:6px;">$55,000 / year avg.</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background:#F0FDF4; padding:20px 24px;">
                                    <div style="font-size:11px; font-weight:800; color:#16A34A; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">With fluent English</div>
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="background:#86EFAC; height:24px; border-radius:12px; width:85%;"></td>
                                            <td style="width:15%;"></td>
                                        </tr>
                                    </table>
                                    <div style="font-size:14px; font-weight:700; color:#14532D; margin-top:6px;">$105,000+ / year avg.</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- BIG STAT -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="stat-card" style="background:#F6F4FF; border-radius:16px;">
                            <tr>
                                <td align="center" style="padding:32px 24px;">
                                    <div class="stat-big" style="font-size:64px; font-weight:900; color:#7B4DFF; line-height:1;">$50,000</div>
                                    <div style="font-size:17px; font-weight:600; color:#4E5A73; margin-top:12px;">The average career gap between<br>fluent and non-fluent English speakers</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- MATH -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div style="font-size:17px; line-height:27px; color:#061538;">
                            <strong>Here is the math:</strong><br><br>
                            Bilingual professionals earn <strong>5-20% more</strong> than monolingual peers.<br><br>
                            Over a 30-year career, that adds up to <strong>$50,000 or more.</strong><br><br>
                            English fluency doesn't just open doors. It opens <strong>paychecks.</strong>
                        </div>
                    </td>
                </tr>

                <!-- CAREER POINTS -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="career-card" style="background:#EFF6FF; border-radius:16px;">
                            <tr>
                                <td style="padding:24px 26px;">
                                    <div style="font-size:16px; font-weight:800; color:#061538; margin-bottom:12px;">What fluent English gets you:</div>
                                    <div style="font-size:15px; line-height:27px; color:#1E3A5F;">
                                        &#10003; Higher salary negotiations<br>
                                        &#10003; International job opportunities<br>
                                        &#10003; Leadership roles that require English<br>
                                        &#10003; Client meetings and presentations<br>
                                        &#10003; Confidence in every professional situation
                                    </div>
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
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:20px; font-weight:900; color:#FFFFFF; text-decoration:none;">
                                        Invest in your career &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div style="font-size:13px; color:#4E5A73; margin-top:12px; text-align:center;">
                            $35/month &middot; 50% off &middot; Cancel anytime
                        </div>
                    </td>
                </tr>

                <!-- URGENCY -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#FEF2F2; border-radius:16px;">
                            <tr>
                                <td align="center" style="padding:16px 20px;">
                                    <div style="font-size:14px; font-weight:800; color:#DC2626;">
                                        &#9200; Every day you wait is a day someone else gets the promotion you wanted.
                                    </div>
                                </td>
                            </tr>
                        </table>
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
                                                <div class="text-main" style="font-size:30px; line-height:34px; font-weight:900; color:#071A44;">Need Help?</div>
                                                <div class="text-muted" style="padding-top:8px; font-size:16px; line-height:23px; font-weight:600; color:#405273;">We're here to help you on your English learning journey.</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top:6px;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border-radius:14px; background:#F3F4F8;">
                                                    <tr>
                                                        <td width="52" align="center" valign="middle" style="width:52px; padding:14px 0 14px 10px;">
                                                            <div style="width:42px; height:42px; border-radius:50%; background:#EFF6FF; color:#3385F2; font-size:18px; line-height:42px; font-weight:900; text-align:center;">TEL</div>
                                                        </td>
                                                        <td valign="middle" style="padding:14px 10px;">
                                                            <div class="text-main" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44;">Call Us</div>
                                                            <a href="tel:16178482317" class="text-muted" style="display:block; padding-top:2px; font-size:15px; line-height:21px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none;">+1 (617) 848-2317</a>
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
                                                        <td width="52" align="center" valign="middle" style="width:52px; padding:14px 0 14px 10px;">
                                                            <div style="width:42px; height:42px; border-radius:50%; background:#F5F3FF; color:#6F2AE8; font-size:14px; line-height:42px; font-weight:900; text-align:center;">@</div>
                                                        </td>
                                                        <td valign="middle" style="padding:14px 10px;">
                                                            <div class="text-main" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44;">Email Us</div>
                                                            <a href="mailto:{{ $supportEmail }}" class="text-muted" style="display:block; padding-top:2px; font-size:16px; line-height:22px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none; word-break:break-word;">{{ $supportEmail }}</a>
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
                                                <div class="text-main footer-title" style="font-size:23px; line-height:24px; font-weight:900; color:#071A44;">Boston</div>
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
