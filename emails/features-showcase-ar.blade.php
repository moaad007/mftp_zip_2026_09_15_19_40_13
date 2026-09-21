@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_alone_ar']);
    $emailPreviewText = 'أنت تدرس الإنجليزية منذ سنوات. لماذا لا تزال لا تستطيع التحدث؟ هذا ما ينقصك.';
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
    <title>Boston English Center - هذا ما ينقصك</title>
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
        .price-strike { font-size: 22px; font-weight: 800; color: #9CA3AF; text-decoration: line-through; }
        .price-big { font-size: 56px; font-weight: 900; color: #7B4DFF; line-height: 1; }
        .price-month { font-size: 22px; font-weight: 900; color: #061538; }
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; }
            .pad { padding-right: 18px !important; padding-left: 18px !important; }
            .hero-title { font-size: 28px !important; line-height: 34px !important; }
            .price-big { font-size: 48px !important; }
        }
        @media (prefers-color-scheme: dark) {
            body, .email-bg { background: #020A1E !important; }
            .container { background: #071636 !important; border-color: #071636 !important; }
            .pain-card { background: #3f201f !important; }
            .solution-card { background: #123c2e !important; }
            .pricing-card { background: #10224C !important; }
            .urgent-box { background: #3f201f !important; }
            .text-dark { color: #F7F9FF !important; -webkit-text-fill-color: #F7F9FF !important; }
            .text-muted { color: #AAB7D6 !important; -webkit-text-fill-color: #AAB7D6 !important; }
            .pain-text { color: #FCA5A5 !important; -webkit-text-fill-color: #FCA5A5 !important; }
            .solution-text { color: #86EFAC !important; -webkit-text-fill-color: #86EFAC !important; }
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

                <!-- TOP BAR -->
                <tr>
                    <td height="5" style="background:#DC2626; font-size:0; line-height:0;">&nbsp;</td>
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
                        <h1 class="hero-title text-dark" style="margin:0 0 14px; font-size:34px; line-height:40px; font-weight:900; color:#061538;">
                            أنت تدرس الإنجليزية منذ سنوات.<br>لماذا لا تزال <span style="color:#DC2626;">لا تستطيع التحدث؟</span>
                        </h1>
                        <p class="text-muted" style="margin:0; font-size:17px; line-height:26px; color:#4E5A73;">
                            هذا ما ينقصك. وكيف تصلحه قبل أن ينتهي هذا العرض.
                        </p>
                    </td>
                </tr>

                <!-- HERO IMAGE -->
                <tr>
                    <td class="pad" style="padding-bottom:6px;">
                        <div style="border-radius:16px; overflow:hidden;">
                            <img src="https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/struggle.webp?v=20260601" width="624" alt="طالب محبط يدرس الإنجليزية بمفرده" style="width:100%; max-width:100%; height:auto; display:block;">
                        </div>
                    </td>
                </tr>

                <!-- PAIN POINT: ALONE -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pain-card" style="background:#FEF2F2; border-radius:16px;">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="pain-text" style="font-size:18px; font-weight:900; color:#DC2626; margin-bottom:8px;">&#10060; الدراسة بمفردها لا تعمل</div>
                                    <div style="font-size:15px; line-height:23px; color:#7F1D1D;">
                                        يمكنك قراءة كتب grammar لمدة 10 سنوات. لكن إذا لم تمارس التحدث مع أشخاص حقيقيين أبداً، لن تتقن الإنجليزية أبداً. المعرفة ليست مهارة.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- PAIN POINT: APPS -->
                <tr>
                    <td class="pad" style="padding-bottom:16px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pain-card" style="background:#FEF2F2; border-radius:16px;">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="pain-text" style="font-size:18px; font-weight:900; color:#DC2626; margin-bottom:8px;">&#10060; التطبيقات تسلّيك، لا تجعلك تتقن</div>
                                    <div style="font-size:15px; line-height:23px; color:#7F1D1D;">
                                        Duolingo ممتع. لكنه لن يجهّزك أبداً لمحادثة حقيقية مع زميل أو صديق أو غريب. أنت بحاجة لممارسة حقيقية، ليست ألعاب.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- PAIN POINT: FEAR -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pain-card" style="background:#FEF2F2; border-radius:16px;">
                            <tr>
                                <td style="padding:22px 24px;">
                                    <div class="pain-text" style="font-size:18px; font-weight:900; color:#DC2626; margin-bottom:8px;">&#10060; الخوف يصمتك</div>
                                    <div style="font-size:15px; line-height:23px; color:#7F1D1D;">
                                        أنت خائف من ارتكاب أخطاء. لذلك تبقى صامتاً. لكن الطريقة الوحيدة لتحسين التحدث هي التحدث فعلياً. كل يوم. مع أشخاص حقيقيين.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- SOLUTION -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="solution-card" style="background:#F0FDF4; border-radius:16px;">
                            <tr>
                                <td style="padding:24px;">
                                    <div class="solution-text" style="font-size:20px; font-weight:900; color:#16A34A; margin-bottom:10px;">&#10003; هذا ما ينقصك:</div>
                                    <div style="font-size:15px; line-height:26px; color:#14532D;">
                                        <strong>أشخاص حقيقيون للممارسة معهم.</strong> ليست AI. ليست تطبيقات. محادثات حقيقية، مع طلاب ومعلمين حقيقيين، 6 أيام في الأسبوع. هكذا تنتقل من معرفة الإنجليزية إلى <strong>تحدث</strong> الإنجليزية.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- WHAT YOU GET -->
                <tr>
                    <td class="pad" style="padding-bottom:12px;">
                        <div class="text-dark" style="font-size:18px; font-weight:900; color:#061538; margin-bottom:10px;">ما تحصل عليه بـ $35 شهرياً:</div>
                    </td>
                </tr>
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <div style="font-size:15px; line-height:28px; color:#061538;">
                            &#10003; غرفة محادثة 6 أيام في الأسبوع<br>
                            &#10003; جلستان مباشرة مع معلمين حقيقيين<br>
                            &#10003; جميع المواد التعليمية مشمولة<br>
                            &#10003; مجتمع داعم<br>
                            &#10003; إلغاء في أي وقت، لا رسوم خفية
                        </div>
                    </td>
                </tr>

                <!-- OFFER -->
                <tr>
                    <td class="pad" style="padding-bottom:24px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="pricing-card" style="background:#F6F4FF; border-radius:20px;">
                            <tr>
                                <td align="center" style="padding:24px;">
                                    <div class="price-strike">$70/شهرياً</div>
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:4px auto;">
                                        <tr>
                                            <td valign="baseline" class="price-big">$35</td>
                                            <td valign="baseline" class="price-month" style="padding-right:8px;">/شهرياً</td>
                                        </tr>
                                    </table>
                                    <div style="font-size:14px; color:#16A34A; font-weight:800; margin-top:6px;">وفّر 50% - لفترة محدودة</div>
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
                                    <a href="{{ $dashboardUrl }}" style="display:inline-block; font-size:18px; font-weight:900; color:#FFFFFF; text-decoration:none; direction:ltr;">
                                        توقف عن الدراسة بمفردك. ابدأ التحدث. &larr;
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <div class="text-muted" style="font-size:12px; color:#7B849A; margin-top:10px;">
                            ابدأ التحدث هذا الأسبوع. إلغاء في أي وقت.
                        </div>
                    </td>
                </tr>

                <!-- URGENCY -->
                <tr>
                    <td class="pad" style="padding-bottom:28px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="urgent-box" style="background:#FEF2F2; border-radius:16px;">
                            <tr>
                                <td align="center" style="padding:16px 20px;">
                                    <div style="font-size:15px; font-weight:900; color:#DC2626;">
                                        &#9200; خصم 50% ينتهي قريباً.
                                    </div>
                                    <div style="font-size:14px; color:#7F1D1D; margin-top:4px;">
                                        كل يوم تنتظره هو يوم آخر تبقى فيه عالقاً. السعر سيعود إلى $70/شهرياً.
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
