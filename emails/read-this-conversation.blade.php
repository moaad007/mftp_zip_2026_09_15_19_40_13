@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_gap']);
    $emailPreviewText = 'Listen to what fluency sounds like. A real conversation from our room.';
@endphp
<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>Boston English Center</title>
    <!--[if mso]>
    <style>
        * { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
    <style>
        :root { color-scheme: light dark; supported-color-schemes: light dark; }
        body, .body, .email-bg { margin:0; padding:0; width:100%; background:#F8F8FC; font-family:Arial,Helvetica,sans-serif; -webkit-text-size-adjust:100%; }
        table { border-collapse:collapse; border-spacing:0; }
        img { display:block; border:0; outline:none; text-decoration:none; max-width:100%; height:auto; }
        a { text-decoration:none; }
        .container { width:100%; max-width:580px; }
        .pad { padding:0 24px; }
        .overline { font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:1.5px; color:#7B4DFF; margin:0 0 10px; }
        .headline { font-size:32px; font-weight:900; line-height:38px; color:#061538; letter-spacing:-0.5px; margin:0 0 16px; }
        .accent-bar { width:48px; height:3px; background:#7B4DFF; border-radius:2px; margin:0 0 20px; }
        .body-text { font-size:16px; line-height:26px; color:#4E5A73; margin:0 0 16px; }
        .section-rule { border:none; border-top:1px solid #E3E6F2; margin:28px 0; }
        .left-accent { border-left:4px solid #7B4DFF; padding:16px 20px; background:#F6F4FF; border-radius:0 8px 8px 0; margin:0 0 20px; }
        .chat-bubble { max-width:80%; border-radius:14px; padding:12px 16px; margin-bottom:10px; font-size:14px; line-height:20px; }
        .chat-left { background:#EFF6FF; color:#061538; border-bottom-left-radius:4px; }
        .chat-right { background:#7B4DFF; color:#FFFFFF; border-bottom-right-radius:4px; margin-left:auto; }
        .chat-time { font-size:11px; color:#9CA3AF; margin-top:4px; }
        .cta-card { background:#061538; border-radius:12px; padding:32px 28px; text-align:center; margin:0 0 20px; }
        .cta-link { display:inline-block; background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; }
        .footer-brand { font-size:20px; font-weight:900; color:#061538; margin:0 0 4px; }
        .footer-brand span { color:#7B4DFF; }
        .footer-copy { font-size:12px; color:#9CA3AF; margin:0; }
        .footer-links { font-size:12px; color:#9CA3AF; margin:8px 0 0; }
        .footer-links a { color:#7B4DFF; text-decoration:underline; }
        @media only screen and (max-width:600px) {
            .container { max-width:100% !important; }
            .pad { padding:0 18px !important; }
            .headline { font-size:26px !important; line-height:32px !important; }
            .chat-bubble { max-width:90% !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .body, .email-bg { background:#020A1E !important; }
            .container { background:#020A1E !important; }
            .headline, .footer-brand { color:#F7F9FF !important; }
            .body-text { color:#AAB7D6 !important; }
            .left-accent { background:#10224C !important; border-left-color:#C4B5FD !important; }
            .chat-bubble.chat-left { background:#151F4B !important; color:#F7F9FF !important; }
            .chat-time { color:#6B7280 !important; }
            .section-rule { border-top-color:#1E2A4A !important; }
            .cta-card { background:#071636 !important; }
            .footer-brand { color:#F7F9FF !important; }
            .footer-brand span { color:#C4B5FD !important; }
            .footer-copy, .footer-links { color:#6B7280 !important; }
            .footer-links a { color:#C4B5FD !important; }
        }
    </style>
</head>
<body class="body" style="margin:0; padding:0; width:100%; background:#F8F8FC; -webkit-text-size-adjust:100%;">
    <div style="display:none; max-height:0; overflow:hidden;">
        {{ $emailPreviewText }}
        @for($i = 0; $i < 40; $i++)&#8204;@endfor
    </div>
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#F8F8FC;">
        <tr>
            <td align="center" style="padding:32px 12px;">
                <table role="presentation" class="container" cellpadding="0" cellspacing="0" border="0" width="580" style="max-width:580px; background:#FBFBFF; border-radius:16px;">
                    {{-- TOP BAR --}}
                    <tr><td height="4" style="background:#7B4DFF; font-size:0; line-height:0;">&nbsp;</td></tr>

                    {{-- LOGO --}}
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div style="font-size:18px; font-weight:900; color:#061538; letter-spacing:0.5px;">BOSTON <span style="color:#7B4DFF;">ENGLISH</span> CENTER</div>
                        </td>
                    </tr>

                    {{-- HEADLINE --}}
                    <tr>
                        <td class="pad" style="padding-top:24px;">
                            <div class="overline">A real moment</div>
                            <h1 class="headline">This is what fluency<br>sounds like</h1>
                            <div class="accent-bar"></div>
                            <p class="body-text">
                                A real conversation from our Tuesday room. No scripts. No preparation. Just people practicing — and getting better because of it.
                            </p>
                        </td>
                    </tr>

                    <hr class="section-rule" style="margin:0 24px;">

                    {{-- CHAT --}}
                    <tr>
                        <td class="pad" style="padding-top:28px; padding-bottom:28px;">
                            <div style="background:#F8F8FC; border-radius:12px; padding:20px;">
                                <div style="font-size:12px; font-weight:700; color:#6B7280; text-align:center; margin-bottom:16px;">Conversation Room &middot; Tuesday 7:00 PM &middot; Topic: Travel</div>

                                {{-- Ahmed --}}
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td width="32" valign="top">
                                            <div style="width:28px; height:28px; border-radius:50%; background:#7B4DFF; color:#FFF; font-size:11px; font-weight:900; line-height:28px; text-align:center;">A</div>
                                        </td>
                                        <td style="padding-left:8px;" valign="top">
                                            <div style="font-size:11px; font-weight:700; color:#7B4DFF;">Ahmed, Egypt</div>
                                            <div class="chat-bubble chat-left">I went to London last year and I was so nervous to speak</div>
                                            <div class="chat-time">7:02 PM</div>
                                        </td>
                                    </tr>
                                </table>

                                {{-- Maria --}}
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td width="32" valign="top">
                                            <div style="width:28px; height:28px; border-radius:50%; background:#16A34A; color:#FFF; font-size:11px; font-weight:900; line-height:28px; text-align:center;">M</div>
                                        </td>
                                        <td style="padding-left:8px;" valign="top">
                                            <div style="font-size:11px; font-weight:700; color:#16A34A;">Maria, Brazil</div>
                                            <div class="chat-bubble chat-left">I understand! When I first came here I could barely order food. I didn't know the word for... you know... the soup? The one in the bread?</div>
                                            <div class="chat-time">7:04 PM</div>
                                        </td>
                                    </tr>
                                </table>

                                {{-- Teacher --}}
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td width="32" valign="top">
                                            <div style="width:28px; height:28px; border-radius:50%; background:#DC2626; color:#FFF; font-size:11px; font-weight:900; line-height:28px; text-align:center;">S</div>
                                        </td>
                                        <td style="padding-left:8px;" valign="top">
                                            <div style="font-size:11px; font-weight:700; color:#DC2626;">Teacher Sarah</div>
                                            <div class="chat-bubble" style="background:#FEF2F2; color:#7F1D1D;">You mean "bread bowl"? That's a great description, Maria! See? You communicated the idea perfectly.</div>
                                            <div class="chat-time">7:05 PM</div>
                                        </td>
                                    </tr>
                                </table>

                                {{-- Kenji --}}
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td width="32" valign="top">
                                            <div style="width:28px; height:28px; border-radius:50%; background:#F59E0B; color:#FFF; font-size:11px; font-weight:900; line-height:28px; text-align:center;">K</div>
                                        </td>
                                        <td style="padding-left:8px;" valign="top">
                                            <div style="font-size:11px; font-weight:700; color:#F59E0B;">Kenji, Japan</div>
                                            <div class="chat-bubble chat-left">Ha! I did the same thing in Paris. I pointed at the menu and smiled</div>
                                            <div class="chat-time">7:06 PM</div>
                                        </td>
                                    </tr>
                                </table>

                                {{-- Ahmed again --}}
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td width="32" valign="top">
                                            <div style="width:28px; height:28px; border-radius:50%; background:#7B4DFF; color:#FFF; font-size:11px; font-weight:900; line-height:28px; text-align:center;">A</div>
                                        </td>
                                        <td style="padding-left:8px;" valign="top">
                                            <div class="chat-bubble chat-left" style="margin-top:8px;">This makes me feel better. I thought it was only me!</div>
                                            <div class="chat-time">7:07 PM</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>

                    <hr class="section-rule" style="margin:0 24px;">

                    {{-- LESSON --}}
                    <tr>
                        <td class="pad" style="padding-top:28px; padding-bottom:28px;">
                            <div class="left-accent">
                                <p style="font-size:15px; line-height:24px; color:#061538; margin:0;">
                                    <strong>Maria didn't know the word.</strong> She described it anyway. That's fluency — not perfection. It's the ability to communicate even when you don't have the exact word. And that's exactly what we practice in every room.
                                </p>
                            </div>
                        </td>
                    </tr>

                    {{-- CTA --}}
                    <tr>
                        <td class="pad" style="padding-bottom:32px;">
                            <div class="cta-card">
                                <p style="font-size:15px; line-height:24px; color:#AAB7D6; margin:0 0 16px;">
                                    Join the conversation. 25,000+ students are already speaking.
                                </p>
                                <a href="{{ $dashboardUrl }}" class="cta-link" style="background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; display:inline-block;">
                                    Start Speaking Now &rarr;
                                </a>
                                <p style="font-size:12px; color:#6B7280; margin:12px 0 0;">
                                    Conversation rooms open 6 days a week &middot; $35/month &middot; Cancel anytime
                                </p>
                            </div>
                        </td>
                    </tr>

                    {{-- FOOTER --}}
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <hr class="section-rule" style="margin:0 0 20px;">
                            <div style="text-align:center;">
                                <div class="footer-brand">Boston <span>English</span> Center</div>
                                <p class="footer-copy">&copy; {{ date('Y') }} Boston English Center. All rights reserved.</p>
                                <p class="footer-links">
                                    <a href="{{ $dashboardUrl }}">Dashboard</a> &nbsp;|&nbsp;
                                    <a href="mailto:{{ $supportEmail }}">Support</a> &nbsp;|&nbsp;
                                    <a href="{{ $unsubscribeUrl }}">Unsubscribe</a>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
