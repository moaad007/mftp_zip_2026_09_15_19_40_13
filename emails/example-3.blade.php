
@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing',['ref'=>'email_career_breakthrough']);
    $emailPreviewText = '💼 Upgrade your business English. Master interviews, meetings, and executive communication.';
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
    <title>Boston English Center - Career Breakthrough</title>
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
            margin:0 !important;
            padding:0 !important;
            width:100% !important;
            background:#F3F5FA;
            font-family: Arial, Helvetica, sans-serif;
            -webkit-text-size-adjust: 100%;
        }
        table { border-collapse: collapse; border-spacing: 0; }
        img { display:block; border:0; }
        a { text-decoration: none; }
        .container {
            width: 100%;
            max-width: 680px;
            background: #FFFFFF;
        }
        .pad { padding-left: 30px; padding-right: 30px; }
        .navy-badge {
            display: inline-block;
            background: #0B1938;
            color: #FFFFFF;
            font-size: 11px;
            font-weight: 800;
            padding: 5px 12px;
            border-radius: 4px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .compare-table td {
            padding: 12px 14px;
            font-size: 14px;
            line-height: 20px;
        }
        @media only screen and (max-width:600px) {
            .container { width:100% !important; }
            .pad { padding-left:18px !important; padding-right:18px !important; }
            .hero-title { font-size: 30px !important; line-height: 36px !important; }
            .stack-cell { display:block !important; width:100% !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #070B19 !important; }
            .container { background: #0E162D !important; }
            .text-dark { color: #F7F9FF !important; }
            .text-muted { color: #9EABCE !important; }
            .card-compare { background: #131E3D !important; border-color: #273663 !important; }
            .testimonial-box { background: #152247 !important; border-color: #2D3E74 !important; }
        }
    </style>
</head>
<body class="body" style="margin:0; padding:0; width:100%; background:#F3F5FA; color:#0B1938;">
<div style="display:none; font-size:1px; line-height:1px; max-height:0; max-width:0; overflow:hidden; opacity:0; color:#F3F5FA;">
    {{ $emailPreviewText }}
</div>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="email-bg" style="background:#F3F5FA;">
    <tr>
        <td align="center" style="padding: 24px 10px 40px;">
            <!--[if mso]><table role="presentation" width="680" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container" style="max-width:680px; background:#FFFFFF; border-radius:16px; overflow:hidden; border:1px solid #DEE2EC;">
                
                <!-- TOP ACCENT BAR -->
                <tr>
                    <td height="5" style="background:#7B4DFF; font-size:0; line-height:0;">&nbsp;</td>
                </tr>

                <!-- LOGO & TRACK -->
                <tr>
                    <td class="pad" style="padding-top:28px; padding-bottom:14px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td>
                                    <div class="text-dark" style="font-size:20px; font-weight:900; color:#0B1938; letter-spacing:-0.5px;">BOSTON ENGLISH <span style="color:#7B4DFF;">PRO</span></div>
                                    <div style="font-size:11px; font-weight:700; color:#707A94; text-transform:uppercase; letter-spacing:0.8px;">Executive & Professional Track</div>
                                </td>
                                <td align="right">
                                    <span class="navy-badge">Career Series</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- HERO -->
                <tr>
                    <td class="pad" style="padding-top:14px; padding-bottom:20px;">
                        <div style="font-size:13px; font-weight:800; color:#7B4DFF; text-transform:uppercase; letter-spacing:0.8px; margin-bottom:8px;">
                            THE LANGUAGE OF PROMOTIONS & OFFERS
                        </div>
                        <h1 class="hero-title text-dark" style="margin:0 0 16px; font-size:38px; line-height:44px; font-weight:900; color:#0B1938; letter-spacing:-1px;">
                            Your skills are world-class.<br>Does your English sound like it?
                        </h1>
                        <p class="text-muted" style="margin:0 0 20px; font-size:17px; line-height:26px; color:#4E5A73;">
                            Most international professionals don’t miss out on senior roles because of technical gaps. They miss out because they hesitate in high-stakes negotiations and board meetings.
                        </p>
                    </td>
                </tr>

                <!-- SAY THIS NOT THAT COMPARISON -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div class="card-compare" style="background:#F9FAFD; border:1px solid #E1E6F3; border-radius:12px; overflow:hidden;">
                            <div style="padding:14px 18px; background:#0B1938; color:#FFFFFF; font-size:14px; font-weight:800; letter-spacing:0.5px;">
                                💡 CORPORATE SOUND CHECK: Casual vs. Executive English
                            </div>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="compare-table">
                                <tr style="border-bottom:1px solid #EAEFF9;">
                                    <td width="50%" style="background:#FFF5F5; color:#A72D2D;">
                                        <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#D33939;">❌ What sounds hesitant</div>
                                        <div style="font-weight:700; margin-top:3px;">"I think maybe we can try doing this later."</div>
                                    </td>
                                    <td width="50%" style="background:#F4FBF7; color:#1C683B;">
                                        <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#218A4E;">✅ High-impact executive</div>
                                        <div style="font-weight:700; margin-top:3px;">"I propose we prioritize this initiative in Q3."</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="background:#FFF5F5; color:#A72D2D;">
                                        <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#D33939;">❌ What sounds uncertain</div>
                                        <div style="font-weight:700; margin-top:3px;">"Sorry to bother, do you have 5 minutes?"</div>
                                    </td>
                                    <td width="50%" style="background:#F4FBF7; color:#1C683B;">
                                        <div style="font-size:11px; font-weight:800; text-transform:uppercase; color:#218A4E;">✅ Direct & professional</div>
                                        <div style="font-weight:700; margin-top:3px;">"Do you have a quick moment to align on this?"</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>

                <!-- CAREER CURRICULUM HIGHLIGHTS -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div class="text-dark" style="font-size:20px; font-weight:900; color:#0B1938; margin-bottom:14px;">
                            What You'll Master in the Business Module:
                        </div>
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="50%" class="stack-cell" style="padding-bottom:10px; padding-right:8px;">
                                    <div style="font-weight:800; font-size:15px; color:#7B4DFF;">✓ Job Interview Drills</div>
                                    <div class="text-muted" style="font-size:13px; color:#5D6880; margin-top:2px;">STAR technique practice with instant speech analysis.</div>
                                </td>
                                <td width="50%" class="stack-cell" style="padding-bottom:10px; padding-left:8px;">
                                    <div style="font-weight:800; font-size:15px; color:#7B4DFF;">✓ Presentation Delivery</div>
                                    <div class="text-muted" style="font-size:13px; color:#5D6880; margin-top:2px;">Captivate stakeholder attention without reading slides.</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" class="stack-cell" style="padding-top:6px; padding-right:8px;">
                                    <div style="font-weight:800; font-size:15px; color:#7B4DFF;">✓ Salary & Contract Negotiation</div>
                                    <div class="text-muted" style="font-size:13px; color:#5D6880; margin-top:2px;">Strategic phrasing to advocate for your market worth.</div>
                                </td>
                                <td width="50%" class="stack-cell" style="padding-top:6px; padding-left:8px;">
                                    <div style="font-weight:800; font-size:15px; color:#7B4DFF;">✓ Executive Email Templates</div>
                                    <div class="text-muted" style="font-size:13px; color:#5D6880; margin-top:2px;">Write concise, assertive messages in minutes.</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- TESTIMONIAL BOX -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <div class="testimonial-box" style="background:#F6F4FF; border-left:4px solid #7B4DFF; padding:18px 20px; border-radius:0 12px 12px 0;">
                            <div class="text-dark" style="font-style:italic; font-size:15px; line-height:23px; color:#221A4B;">
                                "After 4 weeks focusing on the executive drills, I cleared 3 rounds in English and landed a Director role at a US tech firm with a 45% pay bump."
                            </div>
                            <div style="margin-top:10px; font-weight:800; font-size:13px; color:#7B4DFF;">
                                — Marco S., Software Engineering Director & Student
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td class="pad" style="padding-bottom:34px; text-align:center;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td bgcolor="#0B1938" style="border-radius:12px; padding:18px 24px; text-align:center;">
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:18px; font-weight:900; color:#FFFFFF; text-decoration:none;">
                                        Accelerate Your Career English Today →
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            Includes full access to the Business Simulation lab + 1-on-1 interview practice.
                        </div>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td class="pad text-muted" style="padding-top:22px; padding-bottom:30px; border-top:1px solid #ECEFF6; font-size:12px; line-height:18px; color:#8892AA; text-align:center;">
                        <div>© {{ date('Y') }} Boston English Center - Career & Executive Track</div>
                        <div style="margin-top:8px;">
                            <a href="{{ $dashboardUrl }}" style="color:#0B1938; font-weight:700; text-decoration:underline;">Dashboard</a> &nbsp;|&nbsp;
                            <a href="mailto:{{ $supportEmail }}" style="color:#0B1938; font-weight:700; text-decoration:underline;">Career Advisory</a> &nbsp;|&nbsp;
                            <a href="{{ $unsubscribeUrl }}" style="color:#8892AA; text-decoration:underline;">Unsubscribe</a>
                        </div>
                    </td>
                </tr>

            </table>
            <!--[if mso]></td></tr></table><![endif]-->
        </td>
    </tr>
</table>
</body>
</html>