@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';
    $dashboardUrl = $dashboardUrl ?? route('landing', ['ref' => 'email_sales_gap_ar']);
    $heroUrl = 'https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/landing-page/img/imagine.webp?v=1.1';
    $emailPreviewText = 'هم أيضاً لم يصدقوا. حتى جربوا.';
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>Boston English Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <!--[if mso]>
    <style>
        * { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
    <style>
        :root { color-scheme: light dark; supported-color-schemes: light dark; }
        body, .body, .email-bg { margin:0; padding:0; width:100%; background:#F8F8FC; font-family:'Cairo',Arial,Helvetica,sans-serif; -webkit-text-size-adjust:100%; }
        table { border-collapse:collapse; border-spacing:0; }
        img { display:block; border:0; outline:none; text-decoration:none; max-width:100%; height:auto; }
        a { text-decoration:none; }
        .container { width:100%; max-width:580px; }
        .pad { padding:0 24px; }
        .overline { font-size:12px; font-weight:800; text-transform:uppercase; letter-spacing:1.5px; color:#7B4DFF; margin:0 0 10px; }
        .headline { font-size:32px; font-weight:900; line-height:40px; color:#061538; letter-spacing:-0.5px; margin:0 0 16px; }
        .accent-bar { width:48px; height:3px; background:#7B4DFF; border-radius:2px; margin:0 0 20px; }
        .body-text { font-size:16px; line-height:26px; color:#4E5A73; margin:0 0 16px; }
        .section-rule { border:none; border-top:1px solid #E3E6F2; margin:28px 0; }
        .left-accent { border-right:4px solid #7B4DFF; border-left:none; padding:16px 20px; background:#F6F4FF; border-radius:8px 0 0 8px; margin:0 0 20px; }
        .story-card { background:#F6F4FF; border-radius:10px; padding:24px; margin:0 0 20px; }
        .stat-row { text-align:center; padding:12px 0; }
        .stat-num { font-size:28px; font-weight:900; color:#061538; }
        .stat-label { font-size:12px; color:#6B7280; text-transform:uppercase; letter-spacing:0.5px; margin-top:2px; }
        .cta-card { background:#061538; border-radius:12px; padding:32px 28px; text-align:center; margin:0 0 20px; }
        .cta-link { display:inline-block; background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; }
        .footer-brand { font-size:20px; font-weight:900; color:#061538; margin:0 0 4px; }
        .footer-brand span { color:#7B4DFF; }
        .footer-copy { font-size:12px; color:#9CA3AF; margin:0; }
        .footer-links { font-size:12px; color:#9CA3AF; margin:8px 0 0; }
        .footer-links a { color:#7B4DFF; text-decoration:underline; }
        .price-num { direction:ltr; unicode-bidi:embed; }
        @media only screen and (max-width:600px) {
            .container { max-width:100% !important; }
            .pad { padding:0 18px !important; }
            .headline { font-size:26px !important; line-height:34px !important; }
            .stat-num { font-size:22px !important; }
        }
        @media (prefers-color-scheme:dark) {
            body, .body, .email-bg { background:#020A1E !important; }
            .container { background:#020A1E !important; }
            .headline, .footer-brand { color:#F7F9FF !important; }
            .body-text { color:#AAB7D6 !important; }
            .left-accent { background:#10224C !important; border-right-color:#C4B5FD !important; }
            .story-card { background:#10224C !important; }
            .stat-num { color:#F7F9FF !important; }
            .stat-label { color:#6B7280 !important; }
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
                    <tr><td height="4" style="background:#7B4DFF; font-size:0; line-height:0;">&nbsp;</td></tr>
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div style="font-size:18px; font-weight:900; color:#061538; letter-spacing:0.5px;">BOSTON <span style="color:#7B4DFF;">ENGLISH</span> CENTER</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-top:24px;">
                            <div class="overline">طلاب حقيقيون. نتائج حقيقية.</div>
                            <h1 class="headline">هم أيضاً لم يصدقوا<br>إلى أن جربوا</h1>
                            <div class="accent-bar"></div>
                            <p class="body-text">
                                سارة من كندا قضت سنوات تتعلم وحدها. تطبيقات، كتب، يوتيوب — لم ينجح أي شيء. ثم جربت غرفة محادثة واحدة. كان ذلك قبل 8 أشهر. لم تتوقف منذ ذلك الحين.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <img src="{{ $heroUrl }}" alt="تخيل أن تتحدث بثقة" width="532" style="width:100%; max-width:532px; height:auto; border-radius:10px;">
                        </td>
                    </tr>
                    <hr class="section-rule" style="margin:0 24px;">
                    <tr>
                        <td class="pad" style="padding-top:28px;">
                            <div class="story-card">
                                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                        <td style="vertical-align:top;">
                                            <div style="width:40px; height:40px; border-radius:50%; background:#E8F5E9; color:#16A34A; font-size:16px; font-weight:900; line-height:40px; text-align:center;">س</div>
                                        </td>
                                        <td style="padding-right:12px; padding-left:0; vertical-align:top;">
                                            <div style="font-size:14px; font-weight:800; color:#061538;">سارة، كندا</div>
                                            <div style="font-size:12px; color:#6B7280; margin-top:2px;">طالبة منذ 8 أشهر</div>
                                        </td>
                                    </tr>
                                </table>
                                <p style="font-size:15px; line-height:24px; color:#061538; margin:16px 0 0; font-style:italic;">
                                    "كنت أتجمد كل مرة يتحدث إلي أحد بالإنجليزية. الآن أقود الاجتماعات بالإنجليزية. التغيير لم يكن تدريجياً — حدث في اللحظة التي بدأت فيها فعلياً التحدث."
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="48%" style="vertical-align:top; background:#FEF2F2; border-radius:8px; padding:14px 16px;">
                                        <div style="font-size:11px; font-weight:800; color:#DC2626; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:6px;">قبل</div>
                                        <div style="font-size:13px; color:#7F1D1D; line-height:18px;">تجنبت محادثات الإنجليزية. تجمدت في الاجتماعات. شاهدت الآخرين يحصلون على ترقيات.</div>
                                    </td>
                                    <td width="4%"></td>
                                    <td width="48%" style="vertical-align:top; background:#F0FDF4; border-radius:8px; padding:14px 16px;">
                                        <div style="font-size:11px; font-weight:800; color:#16A34A; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:6px;">بعد</div>
                                        <div style="font-size:13px; color:#14532D; line-height:18px;">أقود الاجتماعات. أتحدث بثقة. حصلت على ترقية خلال 6 أشهر.</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <hr class="section-rule" style="margin:0 24px;">
                    <tr>
                        <td class="pad" style="padding-top:28px; padding-bottom:28px;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td class="stat-row" width="33%">
                                        <div class="stat-num"><span class="price-num">+25,000</span></div>
                                        <div class="stat-label">طالب</div>
                                    </td>
                                    <td class="stat-row" width="33%">
                                        <div class="stat-num">4.9/5</div>
                                        <div class="stat-label">التقييم</div>
                                    </td>
                                    <td class="stat-row" width="33%">
                                        <div class="stat-num"><span class="price-num">+80</span></div>
                                        <div class="stat-label">دولة</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:32px;">
                            <div class="cta-card">
                                <p style="font-size:15px; line-height:24px; color:#AAB7D6; margin:0 0 16px;">
                                    قصتك يمكن أن تكون التالي. الفرق الوحيد بينك وبينهم هو أنهم بدؤوا.
                                </p>
                                <a href="{{ $dashboardUrl }}" class="cta-link" style="background:#7B4DFF; color:#FFFFFF; font-size:16px; font-weight:800; padding:14px 32px; border-radius:8px; text-decoration:none; display:inline-block;">
                                    ابدأ التحدث بثقة &larr;
                                </a>
                                <p style="font-size:12px; color:#6B7280; margin:12px 0 0;">
                                    خصم 50% لفترة محدودة &middot; <span class="price-num">$35</span>/شهر &middot; إلغاء في أي وقت
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pad" style="padding-bottom:28px;">
                            <hr class="section-rule" style="margin:0 0 20px;">
                            <div style="text-align:center;">
                                <div class="footer-brand">بوسطن <span>سنتر الإنجليزية</span></div>
                                <p class="footer-copy">&copy; {{ date('Y') }} بوسطن سنتر الإنجليزية. جميع الحقوق محفوظة.</p>
                                <p class="footer-links">
                                    <a href="{{ $dashboardUrl }}">لوحة التحكم</a> &nbsp;|&nbsp;
                                    <a href="mailto:{{ $supportEmail }}">الدعم</a> &nbsp;|&nbsp;
                                    <a href="{{ $unsubscribeUrl }}">إلغاء الاشتراك</a>
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
