@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_conversation']);
    $emailPreviewText = 'This is what happens in our conversation rooms at 7 PM every Tuesday.';
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
        .chat-bubble { border-radius:16px; max-width:85%; }
        .chat-left { border-bottom-left-radius:4px; }
        .chat-right { border-bottom-right-radius:4px; }
        @media only screen and (max-width:600px) {
            .container { width:100% !important; }
            .pad { padding-left:18px !important; padding-right:18px !important; }
            .headline { font-size:30px !important; line-height:36px !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .email-bg { background:#020A1E !important; }
            .container { background:#071636 !important; }
            .chat-left { background:#151F4B !important; }
            .chat-right { background:#7B4DFF !important; }
            .chat-time { color:#6B7280 !important; }
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
                    <td class="pad" style="padding-top:10px; padding-bottom:8px;">
                        <h1 class="headline" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538; text-align:center;">
                            This is what you're <span class="purple">missing.</span>
                        </h1>
                        <p style="margin:0; font-size:17px; line-height:26px; color:#4E5A73; text-align:center;">
                            A real conversation from our Tuesday room. Messy. Real. Fluency-building.
                        </p>
                    </td>
                </tr>

                <!-- VISUAL: CHAT PREVIEW -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <img src="{{ asset('img/read-this-conversation.webp.jpg') }}?v=1.1" alt="Live group chat preview" width="520" style="display:block; width:100%; max-width:520px; height:auto; border-radius:16px; border:0;">
                    </td>
                </tr>

                <!-- CHAT TRANSCRIPT -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#F8F8FC; border-radius:16px;">
                            <tr>
                                <td style="padding:20px 18px;">
                                    <!-- Visual: Participants -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:16px;">
                                        <tr>
                                            <td align="center">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center">
                                                    <tr>
                                                        <td style="padding:0 4px;">
                                                            <div style="width:36px; height:36px; border-radius:50%; background:#7B4DFF; color:#FFFFFF; font-size:14px; font-weight:900; line-height:36px; text-align:center;">A</div>
                                                        </td>
                                                        <td style="padding:0 4px;">
                                                            <div style="width:36px; height:36px; border-radius:50%; background:#16A34A; color:#FFFFFF; font-size:14px; font-weight:900; line-height:36px; text-align:center;">M</div>
                                                        </td>
                                                        <td style="padding:0 4px;">
                                                            <div style="width:36px; height:36px; border-radius:50%; background:#F59E0B; color:#FFFFFF; font-size:14px; font-weight:900; line-height:36px; text-align:center;">K</div>
                                                        </td>
                                                        <td style="padding:0 4px;">
                                                            <div style="width:36px; height:36px; border-radius:50%; background:#DC2626; color:#FFFFFF; font-size:14px; font-weight:900; line-height:36px; text-align:center;">S</div>
                                                        </td>
                                                        <td style="padding:0 8px 0 4px;">
                                                            <div style="font-size:12px; color:#64748B;">+5 more</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- Header -->
                                    <div style="font-size:12px; font-weight:700; color:#64748B; margin-bottom:16px; text-align:center;">Conversation Room &middot; Tuesday 7:00 PM &middot; Topic: Travel</div>

                                    <!-- Message 1 -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding-bottom:12px;">
                                                <div style="font-size:11px; font-weight:700; color:#7B4DFF; margin-bottom:4px;">Ahmed (Egypt)</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td class="chat-bubble chat-left" style="background:#EFF6FF; padding:12px 16px;">
                                                            <div style="font-size:15px; line-height:22px; color:#061538;">Where did you go on your last vacation?</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="chat-time" style="font-size:11px; color:#9CA3AF; margin-top:4px;">7:02 PM</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Message 2 -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding-bottom:12px;">
                                                <div style="font-size:11px; font-weight:700; color:#16A34A; margin-bottom:4px; text-align:right;">Maria (Brazil)</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="right">
                                                    <tr>
                                                        <td class="chat-bubble chat-right" style="background:#7B4DFF; padding:12px 16px;">
                                                            <div style="font-size:15px; line-height:22px; color:#FFFFFF;">I went to Turkey! It was amazing. The food was incredible.</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div style="font-size:11px; color:#9CA3AF; margin-top:4px; text-align:right;">7:03 PM</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Message 3 -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding-bottom:12px;">
                                                <div style="font-size:11px; font-weight:700; color:#7B4DFF; margin-bottom:4px;">Ahmed (Egypt)</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td class="chat-bubble chat-left" style="background:#EFF6FF; padding:12px 16px;">
                                                            <div style="font-size:15px; line-height:22px; color:#061538;">Nice! What was the best food you try there?</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div style="font-size:11px; color:#9CA3AF; margin-top:4px;">7:03 PM</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Message 4 -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding-bottom:12px;">
                                                <div style="font-size:11px; font-weight:700; color:#16A34A; margin-bottom:4px; text-align:right;">Maria (Brazil)</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="right">
                                                    <tr>
                                                        <td class="chat-bubble chat-right" style="background:#7B4DFF; padding:12px 16px;">
                                                            <div style="font-size:15px; line-height:22px; color:#FFFFFF;">Kebab! But also... I don't know the name. It was like bread with meat inside?</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div style="font-size:11px; color:#9CA3AF; margin-top:4px; text-align:right;">7:04 PM</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Message 5 -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="padding-bottom:12px;">
                                                <div style="font-size:11px; font-weight:700; color:#DC2626; margin-bottom:4px;">Teacher Sarah</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td class="chat-bubble chat-left" style="background:#FEF2F2; padding:12px 16px;">
                                                            <div style="font-size:15px; line-height:22px; color:#061538;">That's called a "durum"! Great job describing it, Maria. This is exactly how real conversations work &mdash; you don't need perfect words, you need confidence to try.</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div style="font-size:11px; color:#9CA3AF; margin-top:4px;">7:05 PM</div>
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Message 6 -->
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td>
                                                <div style="font-size:11px; font-weight:700; color:#F59E0B; margin-bottom:4px;">Kenji (Japan)</div>
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td class="chat-bubble chat-left" style="background:#FFFBEB; padding:12px 16px;">
                                                            <div style="font-size:15px; line-height:22px; color:#061538;">I want to go Turkey too! How was the weather?</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div style="font-size:11px; color:#9CA3AF; margin-top:4px;">7:05 PM</div>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- COMMENTARY -->
                <tr>
                    <td class="pad" style="padding-bottom:8px;">
                        <div style="font-size:17px; line-height:27px; color:#061538; text-align:center;">
                            Notice what happened there?<br><br>
                            Maria didn't know the word. She <strong>described it anyway.</strong><br>
                            Ahmed asked a follow-up. Kenji jumped in.<br><br>
                            <strong>This is how fluency is built. Not in a textbook. In real conversations.</strong>
                        </div>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td class="pad" style="padding-top:20px; padding-bottom:12px; text-align:center;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td bgcolor="#7B4DFF" style="border-radius:14px; padding:18px 24px; text-align:center;">
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:20px; font-weight:900; color:#FFFFFF; text-decoration:none;">
                                        Join the conversation &rarr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div style="font-size:13px; color:#4E5A73; margin-top:12px; text-align:center;">
                            $35/month &middot; 50% off &middot; 6 days a week
                        </div>
                    </td>
                </tr>

                <!-- SOCIAL PROOF -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <div style="font-size:14px; line-height:22px; color:#4E5A73; text-align:center;">
                            <strong style="color:#061538;">25,000+ students</strong> from 80+ countries.<br>
                            Conversation rooms open <strong>6 days a week.</strong>
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
