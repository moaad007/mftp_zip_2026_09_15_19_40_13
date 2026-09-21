@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_limited_offer_ar']);
    $offerBadgeImageUrl = "https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/slider/emails/offer-badge-square.png";
    $emailPreviewText = 'خصم 50% لفترة محدودة! ابدأ التحدث بالإنجليزية بـ $35 فقط شهرياً.';
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <meta name="description" content="{{ $emailPreviewText }}">
    <title>Boston English Center - عرض محدود</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
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
            background: #020A1E;
            font-family: 'Cairo', Arial, Helvetica, sans-serif;
            -webkit-text-size-adjust: 100%;
        }
        table { border-collapse: collapse; border-spacing: 0; }
        img { display: block; border: 0; }
        a { text-decoration: none; }
        .container { width: 100%; max-width: 680px; background: #FBFBFF; border-radius: 20px; }
        .pad { padding-right: 28px; padding-left: 28px; }
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
            margin-left: 8px;
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
        }
        .price-month {
            font-size: 22px;
            font-weight: 900;
            color: #061538;
        }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-right: 18px !important; padding-left: 18px !important; }
            .hero-title { font-size: 30px !important; line-height: 36px !important; }
            .price-big { font-size: 48px !important; }
            .price-month { font-size: 20px !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; border-color: #071636 !important; }
            .pricing-card { background: #10224C !important; }
            .urgent-box { background: #3f201f !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .check-item { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .price-month { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .email-footer-end, .brand-footer, .help-panel, .contact-card { background: #071636 !important; background-color: #071636 !important; }
            .text-main, .text-main *, .footer-title { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted, .text-muted *, .footer-copy, .contact-value, .contact-value:link, .contact-value:visited, .contact-value span, .contact-value * { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .text-accent, .text-accent *, .footer-accent, .contact-chevron { color: #C4B5FD !important; -webkit-text-fill-color: #C4B5FD !important; }
        }
    </style>
</head>
<body class="body" style="margin:0; padding:0; width:100%; background:#020A1E; color:#061538; direction:rtl;">
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
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container" style="max-width:680px; background:#FBFBFF; border-radius:20px; overflow:hidden;">

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
                                <td align="left">
                                    <span class="urgency-badge">لفترة محدودة</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- HEADLINE -->
                <tr>
                    <td class="pad" style="padding-top:6px; padding-bottom:24px;">
                        <h1 class="hero-title text-dark" style="margin:0 0 12px; font-size:38px; line-height:44px; font-weight:900; color:#061538;">
                            <span style="color:#DC2626;">خصم 50%</span><br>على عضويتك في الإنجليزية
                        </h1>
                        <p class="text-muted" style="margin:0; font-size:17px; line-height:26px; color:#4E5A73;">
                            هذا العرض لن berlangsung طويلاً. ابدأ التحدث بالإنجليزية مع أشخاص حقيقيين اليوم بسعر النصف.
                        </p>
                    </td>
                </tr>

                <!-- HERO IMAGE -->
                <tr>
                    <td class="pad" style="padding-bottom:20px;">
                        <div style="border-radius:16px; overflow:hidden;">
                            <img src="https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/signup.webp?v=1.1" width="624" alt="طالب يتعلم الإنجليزية أونلاين مع معلم" style="width:100%; max-width:100%; height:auto; display:block;">
                        </div>
                    </td>
                </tr>

                <!-- PRICING CARD -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pricing-card" style="background:#F6F4FF; border-radius:20px; overflow:hidden;">
                            <tr>
                                <td align="center" style="padding:28px 24px 20px;">
                                    <div style="margin-bottom:16px;">
                                        <img src="{{ $offerBadgeImageUrl }}" width="100" height="100" alt="خصم 50%" style="width:100px; height:100px; display:inline-block;">
                                    </div>
                                    <div class="price-strike">$70/شهرياً</div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:4px auto;">
                                        <tr>
                                            <td valign="baseline" class="price-big">$35</td>
                                            <td valign="baseline" class="price-month" style="padding-right:8px;">/شهرياً</td>
                                        </tr>
                                    </table>
                                    <div style="font-size:13px; color:#4E5A73; margin-top:8px;">وفّر $35 كل شهر</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- WHAT YOU GET -->
                <tr>
                    <td class="pad" style="padding-bottom:12px;">
                        <div class="text-dark" style="font-size:20px; font-weight:900; color:#061538; margin-bottom:12px;">
                            ما تحصل عليه:
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div class="check-item"><span class="check-mark">&#10003;</span> غرفة محادثة 6 أيام في الأسبوع</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> جلستان مباشرة أسبوعياً مع معلم</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> الوصول لجميع المواد التعليمية والمسرد</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> مجتمع داعم من متعلمي الإنجليزية</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> اختبار تحديد مستوى مجاني</div>
                        <div class="check-item"><span class="check-mark">&#10003;</span> إلغاء في أي وقت، لا رسوم خفية</div>
                    </td>
                </tr>

                <!-- CTA -->
                <tr>
                    <td class="pad" style="padding-bottom:12px; text-align:center;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
                            <tr>
                                <td bgcolor="#DC2626" style="border-radius:14px; padding:18px 24px; text-align:center;">
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:18px; font-weight:900; color:#FFFFFF; text-decoration:none; direction:ltr;">
                                        احصل على خصم 50% الآن &larr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            العرض ينتهي قريباً. لا تفوّته.
                        </div>
                    </td>
                </tr>

                <!-- URGENCY REMINDER -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="urgent-box" style="background:#FEF2F2; border-radius:16px;">
                            <tr>
                                <td align="center" style="padding:16px 20px;">
                                    <div style="font-size:14px; font-weight:800; color:#DC2626;">
                                        &#9200; خصم 50% هذا متاح لفترة محدودة فقط.
                                    </div>
                                    <div style="font-size:13px; color:#7F1D1D; margin-top:4px;">
                                        بعد انتهاء العرض، يعود السعر إلى $70/شهرياً.
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
                                                <div class="text-main help-title" style="font-size:30px; line-height:34px; font-weight:900; color:#071A44;">هل تحتاج مساعدة؟</div>
                                                <div class="text-muted help-copy" style="padding-top:8px; font-size:16px; line-height:23px; font-weight:600; color:#405273;">نحن هنا لمساعدتك في رحلة تعلم الإنجليزية.</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top:6px;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border-radius:14px; background:#F3F4F8;">
                                                    <tr>
                                                        <td width="52" align="center" valign="middle" class="contact-icon-cell" style="width:52px; padding:14px 10px 14px 0;">
                                                            <div class="contact-icon" style="width:42px; height:42px; border-radius:50%; background:#EFF6FF; color:#3385F2; font-size:18px; line-height:42px; font-weight:900; text-align:center;">TEL</div>
                                                        </td>
                                                        <td valign="middle" class="contact-copy-cell" style="padding:14px 10px;">
                                                            <div class="text-main contact-label" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44;">اتصل بنا</div>
                                                            <a href="tel:16178482317" class="text-muted contact-value" style="display:block; padding-top:2px; font-size:15px; line-height:21px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none; direction:ltr; unicode-bidi:embed;">+1 (617) 848-2317</a>
                                                        </td>
                                                        <td width="28" align="center" valign="middle" class="contact-chevron" style="width:28px; padding-left:14px; color:#4024D6; font-size:22px; line-height:22px; font-weight:900;">&#8249;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top:12px;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border-radius:14px; background:#F3F4F8;">
                                                    <tr>
                                                        <td width="52" align="center" valign="middle" class="contact-icon-cell" style="width:52px; padding:14px 10px 14px 0;">
                                                            <div class="contact-icon" style="width:42px; height:42px; border-radius:50%; background:#F5F3FF; color:#6F2AE8; font-size:14px; line-height:42px; font-weight:900; text-align:center;">@</div>
                                                        </td>
                                                        <td valign="middle" class="contact-copy-cell" style="padding:14px 10px;">
                                                            <div class="text-main contact-label" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44;">راسلنا</div>
                                                            <a href="mailto:{{ $supportEmail }}" class="text-muted contact-value" style="display:block; padding-top:2px; font-size:16px; line-height:22px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none; word-break:break-word;">{{ $supportEmail }}</a>
                                                        </td>
                                                        <td width="28" align="center" valign="middle" class="contact-chevron" style="width:28px; padding-left:14px; color:#4024D6; font-size:22px; line-height:22px; font-weight:900;">&#8249;</td>
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
                                                <div class="text-main footer-title" style="font-size:23px; line-height:24px; font-weight:900; color:#071A44;">بوسطن</div>
                                                <div class="text-accent footer-accent" style="font-size:15px; line-height:18px; font-weight:900; color:#1357E8;">سنتر الإنجليزية</div>
                                                <div class="text-muted footer-copy" style="margin:14px 0 0; font-size:13px; line-height:20px; font-weight:600; color:#64748B; text-align:center;">
                                                    &copy; {{ date('Y') }} Boston English Center<br>جميع الحقوق محفوظة.
                                                </div>
                                                <div style="margin-top:10px; font-size:12px; text-align:center;">
                                                    <a href="{{ $unsubscribeUrl }}" style="color:#64748B; text-decoration:underline;">إلغاء الاشتراك</a>
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
