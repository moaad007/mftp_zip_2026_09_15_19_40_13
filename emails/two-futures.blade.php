@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_two_futures']);
    $emailPreviewText = '6 months from now. Two versions of you. Only one is real.';
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
        img { display:block; border:0; outline:none; text-decoration:none; }
        a { text-decoration:none; }
        .container { width:100%; max-width:680px; background:#FBFBFF; border-radius:20px; }
        .pad { padding-left:28px; padding-right:28px; }
        .purple { color:#7B4DFF !important; -webkit-text-fill-color:#7B4DFF !important; }
        @media only screen and (max-width:600px) {
            .container { width:100% !important; }
            .pad { padding-left:18px !important; padding-right:18px !important; }
            .headline { font-size:30px !important; line-height:36px !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .email-bg { background:#020A1E !important; }
            .container { background:#071636 !important; }
            .future-card-left { background:#3f201f !important; }
            .future-card-right { background:#123c2e !important; }
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

                <tr><td height="5" style="background:#7B4DFF; font-size:0; line-height:0;">&nbsp;</td></tr>

                <tr>
                    <td class="pad" style="padding-top:28px; padding-bottom:8px;">
                        <div style="font-size:22px; font-weight:900; color:#061538;">BOSTON <span class="purple">ENGLISH</span> CENTER</div>
                    </td>
                </tr>

                <tr>
                    <td class="pad" style="padding-top:10px; padding-bottom:24px;">
                        <h1 class="headline" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538; text-align:center;">
                            6 months from now.<br>Two versions of <span class="purple">you.</span>
                        </h1>
                        <p style="margin:0; font-size:17px; line-height:26px; color:#4E5A73; text-align:center;">
                            One of them started. The other kept waiting.
                        </p>
                    </td>
                </tr>

                <!-- VISUAL: TWO PATHS -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-radius:16px; overflow:hidden;">
                            <tr>
                                <td width="50%" style="background:#FEF2F2; padding:24px 16px; text-align:center; vertical-align:top;">
                                    <div style="width:48px; height:48px; border-radius:50%; background:#FECACA; color:#DC2626; font-size:24px; line-height:48px; text-align:center; margin:0 auto 12px;">&#10007;</div>
                                    <div style="font-size:13px; font-weight:800; color:#DC2626; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">Still waiting</div>
                                    <div style="font-size:14px; line-height:20px; color:#7F1D1D;">Same fears.<br>Same excuses.<br>Same results.</div>
                                </td>
                                <td width="50%" style="background:#F0FDF4; padding:24px 16px; text-align:center; vertical-align:top;">
                                    <div style="width:48px; height:48px; border-radius:50%; background:#BBF7D0; color:#16A34A; font-size:24px; line-height:48px; text-align:center; margin:0 auto 12px;">&#10003;</div>
                                    <div style="font-size:13px; font-weight:800; color:#16A34A; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">Started today</div>
                                    <div style="font-size:14px; line-height:20px; color:#14532D;">New confidence.<br>New opportunities.<br>New you.</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FUTURE 1 -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="future-card-left" style="background:#FEF2F2; border-radius:16px;">
                            <tr>
                                <td style="padding:26px 28px;">
                                    <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#DC2626; margin-bottom:12px; letter-spacing:1px;">&#10060; If you do NOT start today</div>
                                    <div style="font-size:16px; line-height:28px; color:#7F1D1D;">
                                        You will still be saying "I'll start next week."<br>
                                        You will still freeze when someone speaks to you in English.<br>
                                        You will watch colleagues with weaker skills get promoted.<br>
                                        You will still be stuck in the same place.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- FUTURE 2 -->
                <tr>
                    <td class="pad" style="padding-bottom:32px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="future-card-right" style="background:#F0FDF4; border-radius:16px;">
                            <tr>
                                <td style="padding:26px 28px;">
                                    <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#16A34A; margin-bottom:12px; letter-spacing:1px;">&#10003; If you start today</div>
                                    <div style="font-size:16px; line-height:28px; color:#14532D;">
                                        You will speak with confidence in meetings.<br>
                                        You will lead conversations, not hide from them.<br>
                                        You will get opportunities others don't.<br>
                                        You will wonder why you waited so long.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td class="pad" style="padding-bottom:8px;">
                        <div style="font-size:22px; line-height:30px; font-weight:900; color:#061538; text-align:center;">
                            Which one will you be?
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="pad" style="padding-bottom:12px; text-align:center;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td bgcolor="#7B4DFF" style="border-radius:14px; padding:18px 24px; text-align:center;">
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:20px; font-weight:900; color:#FFFFFF; text-decoration:none;">
                                        &#128156; Choose your future
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div style="font-size:13px; color:#4E5A73; margin-top:12px; text-align:center;">
                            $35/month &middot; 50% off &middot; Cancel anytime
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <div style="font-size:14px; line-height:22px; color:#4E5A73; text-align:center;">
                            <strong style="color:#061538;">25,000+ students</strong> already chose to start.<br>
                            80+ countries. 4.9/5 rating. 3,237 reviews.
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
