@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';

    $futuresBannerUrl = $futuresBannerUrl ?? "https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/slider/emails/arabic-struggle.png?v=1";
    $futuresBannerMobileUrl = $futuresBannerMobileUrl ?? $futuresBannerUrl;

    // Same square 50% badge used in the previous newsletter. Recommended: #7B4DFF background, white text, 192×192 PNG.
    $offerBadgeImageUrl = "https://s3.us-east-1.amazonaws.com/bostenenglishcenter.com-bucket/slider/emails/offer-badge-square.png";
    $emailPreviewText = 'لا يهم إذا كنت مبتدئاً أو لديك مستوى متقدم. سنساعدك على البدء من المستوى المناسب لك.';

    $dashboardUrl=route('landing');
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

        html,
        body,
        .body,
        .email-bg,
        .email-bg > tbody > tr > td,
        .container,
        .container > tbody > tr:first-child > td,
        .container > tbody > tr:last-child > td,
        .email-footer-end,
        .email-footer-end table,
        .email-footer-end td {
            border-top:0 !important;
            border-bottom:0 !important;
            outline:0 !important;
            box-shadow:none !important;
        }

        body {
            margin:0 !important;
            padding:0 !important;
            width:100% !important;
            background:#F8F8FC;
            border:0 !important;
            outline:0 !important;
            font-family:Arial, Helvetica, sans-serif;
            -webkit-text-size-adjust:100%;
            -ms-text-size-adjust:100%;
        }

        table {
            border-collapse:collapse;
            border-spacing:0;
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }

        img {
            display:block;
            border:0;
            outline:none;
            text-decoration:none;
            -ms-interpolation-mode:bicubic;
        }

        a {
            text-decoration:none;
        }

        .container {
            width:100%;
            max-width:740px;
            background:#FBFBFF;
        }

        .pad {
            padding-left:26px;
            padding-right:26px;
        }

        .card {
            background:#ffffff;
            border:1px solid #E3E6F2;
            border-radius:22px;
            overflow:hidden;
        }

        .purple {
            color:#7B4DFF !important;
            -webkit-text-fill-color:#7B4DFF !important;
        }

        .desktop-img-row {
            display:table-row;
        }

        .mobile-img-row {
            display:none;
            max-height:0;
            overflow:hidden;
            mso-hide:all;
        }

        u + .body .gmail-blend-screen {
            background:#000000;
            mix-blend-mode:screen;
        }

        u + .body .gmail-blend-difference {
            background:#000000;
            mix-blend-mode:difference;
        }

        @media only screen and (max-width:600px) {
            .container {
                width:100% !important;
                max-width:100% !important;
            }

            .pad {
                padding-left:0 !important;
                padding-right:0 !important;
            }

            .section {
                padding-top:12px !important;
            }

            .header-left,
            .header-right {
                display:block !important;
                width:100% !important;
                text-align:center !important;
            }

            .header-right {
                padding-top:10px !important;
            }

            .header-left table,
            .header-right table {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .brand-logo {
                width:42px !important;
                height:42px !important;
            }

            .brand-boston {
                font-size:18px !important;
                line-height:20px !important;
            }

            .brand-center {
                font-size:13px !important;
                line-height:16px !important;
            }

            .top-badge td {
                padding-top:9px !important;
                padding-bottom:9px !important;
            }

            .top-badge-text {
                font-size:12px !important;
                line-height:16px !important;
            }

            .top-badge-script {
                font-size:12px !important;
                line-height:16px !important;
            }

            .headline {
                padding:16px 24px !important;
                box-sizing:border-box !important;
                font-size:27px !important;
                line-height:37px !important;
                letter-spacing:0 !important;
                white-space:normal !important;
            }

            .arabic-message-body {
                padding-left:14px !important;
                padding-right:14px !important;
            }

            .futures-image-card,
            .futures-image-card img,
            .arabic-message-card {
                border-radius:0 !important;
            }

            .futures-image-card,
            .arabic-message-card {
                border:0 !important;
            }

            .headline-secondary {
                font-size:22px !important;
                line-height:28px !important;
            }

            .subhead {
                font-size:17px !important;
                line-height:24px !important;
                margin-top:12px !important;
            }

            .desktop-img-row {
                display:none !important;
                width:0 !important;
                max-height:0 !important;
                overflow:hidden !important;
                mso-hide:all !important;
            }

            .mobile-img-row {
                display:table-row !important;
                max-height:none !important;
                overflow:visible !important;
            }

            .mobile-img {
                display:block !important;
                width:100% !important;
                max-width:100% !important;
                height:auto !important;
            }

            .decision-text {
                font-size:17px !important;
                line-height:23px !important;
            }

            .truth-col {
                display:block !important;
                width:100% !important;
                box-sizing:border-box !important;
                border-right:0 !important;
                border-bottom:1px solid #E3DBFF !important;
                padding:14px 12px !important;
            }

            .truth-col:last-child {
                border-bottom:0 !important;
            }

            .truth-icon {
                font-size:26px !important;
                line-height:26px !important;
            }

            .truth-copy {
                font-size:13px !important;
                line-height:19px !important;
            }

            .offer-inner {
                padding:16px 14px !important;
            }

            .offer-left {
                display:block !important;
                width:100% !important;
                text-align:center !important;
                padding:0 !important;
            }

            .offer-left table,
            .price-table {
                margin-left:auto !important;
                margin-right:auto !important;
            }

            .offer-price-cell .price-table {
                margin-left:0 !important;
                margin-right:0 !important;
            }

            .offer-price-wrap {
                width:100% !important;
                max-width:100% !important;
                margin-left:0 !important;
                margin-right:0 !important;
            }

            .offer-badge-cell {
                width:118px !important;
                padding-right:14px !important;
                text-align:left !important;
            }

            .offer-badge-img {
                width:104px !important;
                height:104px !important;
                margin:0 !important;
            }

            .old-price {
                font-size:19px !important;
                line-height:24px !important;
                text-align:left !important;
            }

            .price {
                font-size:58px !important;
                line-height:62px !important;
                letter-spacing:-2px !important;
            }

            .month {
                font-size:20px !important;
                line-height:26px !important;
            }


            .cta-link {
                padding:16px 18px !important;
            }

            .button-heart {
                font-size:23px !important;
                line-height:23px !important;
                margin-right:8px !important;
            }

            .cta-copy {
                max-width:245px !important;
            }

            .cta-question {
                font-size:17px !important;
                line-height:23px !important;
                white-space:normal !important;
            }

            .cta-text {
                font-size:18px !important;
                line-height:24px !important;
                white-space:nowrap !important;
            }

            .safe-note {
                font-size:13px !important;
                line-height:19px !important;
            }

            .footer-script {
                font-size:19px !important;
                line-height:27px !important;
            }

            .legal-text {
                font-size:10px !important;
                line-height:16px !important;
            }

            .install-panel {
                padding:30px 18px 28px !important;
            }

            .install-title {
                font-size:25px !important;
                line-height:32px !important;
            }

            .install-copy,
            .install-note {
                font-size:16px !important;
                line-height:23px !important;
            }

            .install-button-table {
                width:100% !important;
                max-width:100% !important;
            }

            .install-button-link {
                display:block !important;
                padding:16px 18px !important;
                font-size:18px !important;
                line-height:24px !important;
            }

            .help-panel {
                padding:22px 10px 22px !important;
            }

            .help-title {
                font-size:28px !important;
                line-height:32px !important;
            }

            .help-copy {
                font-size:15px !important;
                line-height:22px !important;
            }

            .contact-icon-cell {
                width:46px !important;
                padding:11px 0 11px 7px !important;
            }

            .contact-icon {
                width:36px !important;
                height:36px !important;
                line-height:36px !important;
                font-size:14px !important;
            }

            .contact-copy-cell {
                padding:11px 6px 11px 8px !important;
            }

            .contact-label {
                font-size:16px !important;
                line-height:20px !important;
            }

            .contact-value {
                font-size:14px !important;
                line-height:20px !important;
            }

            .footer-title {
                font-size:23px !important;
                line-height:24px !important;
            }

            .footer-accent {
                font-size:15px !important;
                line-height:18px !important;
            }

            .footer-copy {
                font-size:13px !important;
                line-height:20px !important;
            }
        }

        @media (prefers-color-scheme: dark) {
            body,
            .email-bg {
                background:#020A1E !important;
            }

            .container {
                background:#071636 !important;
            }

            .card,
            .truth-card,
            .top-badge {
                background:#10224C !important;
                border-color:#29416D !important;
            }

            .arabic-message-card,
            .arabic-message-card .arabic-message-body {
                background:transparent !important;
                background-color:transparent !important;
                border-color:transparent !important;
            }

            .offer-card {
                background:#071636 !important;
                background-color:#071636 !important;
                border-color:#071636 !important;
            }

            .decision-card {
                background:#10224C !important;
                border-color:transparent !important;
            }

            .truth-card {
                background:#151F4B !important;
            }

            .headline,
            .subhead,
            .text,
            .brand-boston,
            .decision-text,
            .truth-copy,
            .month,
            .safe-note,
            .footer-script,
            .top-badge-text,
            .cta-question {
                color:#F7F9FF !important;
                -webkit-text-fill-color:#F7F9FF !important;
            }

            .arabic-message-body,
            .arabic-message-body p,
            .arabic-message-body div {
                color:#F7F9FF !important;
                -webkit-text-fill-color:#F7F9FF !important;
            }

            .arabic-message-body .checkmark {
                color:#16A34A !important;
                -webkit-text-fill-color:#16A34A !important;
            }

            .muted,
            .old-price {
                color:#AAB7D6 !important;
                -webkit-text-fill-color:#AAB7D6 !important;
            }

            .purple {
                color:#C4B5FD !important;
                -webkit-text-fill-color:#C4B5FD !important;
            }

            .feature-check,
            .lock-icon {
                background:#7B4DFF !important;
                color:#ffffff !important;
                -webkit-text-fill-color:#ffffff !important;
            }

            .button-link,
            .button-link span,
            .button-text,
            .button-text * {
                color:#ffffff !important;
                -webkit-text-fill-color:#ffffff !important;
            }

            .email-footer-end,
            .install-panel,
            .help-panel,
            .contact-card,
            .brand-footer {
                background:#071636 !important;
                background-color:#071636 !important;
            }

            .install-title,
            .install-title *,
            .text-main,
            .text-main *,
            .footer-title {
                color:#F7F9FF !important;
                -webkit-text-fill-color:#F7F9FF !important;
            }

            .install-copy,
            .install-note,
            .text-muted,
            .text-muted *,
            .footer-copy,
            .contact-value,
            .contact-value:link,
            .contact-value:visited,
            .contact-value span,
            .contact-value * {
                color:#AAB7D6 !important;
                -webkit-text-fill-color:#AAB7D6 !important;
            }

            .text-accent,
            .text-accent *,
            .footer-accent,
            .contact-chevron {
                color:#C4B5FD !important;
                -webkit-text-fill-color:#C4B5FD !important;
            }

            .install-icon {
                color:#6EA8FF !important;
                border-color:#6EA8FF !important;
            }
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

            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="container" style="width:100%; max-width:740px; background:#FBFBFF; border:0; border-top:0; border-bottom:0; outline:0; box-shadow:none; border-collapse:collapse; border-spacing:0;">

                <!-- HEADLINE -->
                <tr>
                    <td align="center" class="pad section" style="padding-top:34px;">
                        <div class="headline" dir="rtl" lang="ar" style="font-size:36px; line-height:68px; font-weight:900; color:#061538; letter-spacing:0; text-align:center; white-space:normal; font-family:Arial, Tahoma, sans-serif;">
                            هل تفهم الإنجليزية، لكن عندما يحين  <span class="headline-highlight" style="display:inline; padding:0 5px; background:#FFE56B; color:#061538; -webkit-text-fill-color:#061538; border-radius:6px; box-decoration-break:clone; -webkit-box-decoration-break:clone;">وقت التحدث تجد صعوبة؟</span>
                        </div>
                    </td>
                </tr>

                <!-- FUTURES IMAGE -->
                <tr>
                    <td class="pad section" style="padding-top:22px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card futures-image-card" style="border-color:#C7B8FF;">
                            <tr class="desktop-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img src="{{ $futuresBannerUrl }}" width="688" alt="Arabic-speaking English learner struggling to express himself" style="width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>

                            <!--[if !mso]><!-->
                            <tr class="mobile-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img class="mobile-img" src="{{ $futuresBannerMobileUrl }}" width="100%" alt="Arabic-speaking English learner struggling to express himself" style="display:none; width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>
                            <!--<![endif]-->
                        </table>
                    </td>
                </tr>

                <!-- ARABIC MESSAGE -->
                <tr>
                    <td class="pad section" style="padding-top:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card arabic-message-card" dir="rtl" lang="ar" style="background:#ffffff; border-color:#D8DDEB; border-radius:18px;">
                            <tr>
                                <td class="arabic-message-body" style="padding:28px 26px; color:#061538; font-family:Arial, Tahoma, sans-serif; font-size:21px; line-height:35px; text-align:right;">
                                    <p style="margin:0;">
                                        مع مركز بوسطن لتعلم اللغة الإنجليزية، لن تكتفي بدراسة الإنجليزية فقط — بل ستستخدمها وتتحدث بها بشكل منتظم.
                                    </p>

                                    <p style="margin:20px 0 8px; font-weight:900;">
                                        ابتداءً من 35$ شهرياً يمكنك:
                                    </p>

                                    <div style="margin-top:7px;"><span class="checkmark" style="color:#16A34A !important; -webkit-text-fill-color:#16A34A !important; font-weight:900;">✓</span> الانضمام إلى حصص مباشرة مع مدرسين</div>
                                    <div style="margin-top:7px;"><span class="checkmark" style="color:#16A34A !important; -webkit-text-fill-color:#16A34A !important; font-weight:900;">✓</span> التدرب على المحادثة مع طلاب و مدرسين</div>
                                    <div style="margin-top:7px;"><span class="checkmark" style="color:#16A34A !important; -webkit-text-fill-color:#16A34A !important; font-weight:900;">✓</span> اتباع برنامج مصمم للاستعمالات اليومية</div>
                                    <div style="margin-top:7px;"><span class="checkmark" style="color:#16A34A !important; -webkit-text-fill-color:#16A34A !important; font-weight:900;">✓</span> تحميل التطبيق على هاتفك و الانضمام من اي مكان</div>

                                    <p style="margin:20px 0 0;">
                                        لا يهم إذا كنت مبتدئاً أو لديك مستوى متقدم. ابدأ باختبار تحديد المستوى، وسنساعدك على البدء من المستوى المناسب لك.
                                    </p>

                                    <p class="closing-price" style="margin:20px 0 0; font-weight:900; text-align:center;">
                                        ابدأ اليوم ابتداءً من 35$ شهرياً.
                                    </p>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:14px; width:100%; border-collapse:collapse; border-spacing:0;">
                                        <tr>
                                            <td align="center" style="padding-bottom:44px;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="width:100%; max-width:420px; border-collapse:collapse; border-spacing:0;">
                                                    <tr>
                                                        <td bgcolor="#7B4DFF" style="background:#7B4DFF; border-radius:13px;">
                                                            <a href="https://bostonenglishcenter.com/ar#payment-title?ref=xfw33683" class="button-link arabic-level-cta" dir="rtl" lang="ar" style="display:block; padding:16px 22px; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; font-size:21px; line-height:28px; font-weight:900; text-align:center; text-decoration:none !important; border-radius:13px;">
                                                                <span class="button-text" style="color:#ffffff !important; -webkit-text-fill-color:#ffffff !important;">ابدأ اختبار تحديد المستوى</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- EMAIL FOOTER SECTIONS -->
                <tr>
                    <td class="email-footer-end" style="padding:0; background:#FBFBFF; border:0; border-top:0; border-bottom:0; outline:0; box-shadow:none;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; border:0; border-top:0; border-bottom:0; outline:0; box-shadow:none; border-collapse:collapse; border-spacing:0;">
                            <tr>
                                <td class="help-panel" style="padding:28px 18px 24px; background:#FBFBFF; background-color:#FBFBFF;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td valign="top" style="padding:0 18px 12px 0;">
                                                <div class="text-main help-title" style="font-size:30px; line-height:34px; font-weight:900; color:#071A44; letter-spacing:-0.8px; mso-line-height-rule:exactly;">Need Help?</div>
                                                <div class="text-muted help-copy" style="padding-top:8px; font-size:16px; line-height:23px; font-weight:600; color:#405273; mso-line-height-rule:exactly;">We're here to help you on your English learning journey.</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top:6px;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border:0; border-radius:16px; background:#FBFBFF; background-color:#FBFBFF;">
                                                    <tr>
                                                        <td width="52" align="center" valign="middle" class="contact-icon-cell" style="width:52px; padding:14px 0 14px 10px;">
                                                            <div class="contact-icon" style="width:42px; height:42px; border-radius:50%; background:#EFF6FF; color:#3385F2; font-size:18px; line-height:42px; font-weight:900; text-align:center; mso-line-height-rule:exactly;">TEL</div>
                                                        </td>
                                                        <td valign="middle" class="contact-copy-cell" style="padding:14px 10px 14px 10px;">
                                                            <div class="text-main contact-label" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44; mso-line-height-rule:exactly;">Call Us</div>
                                                            <a href="tel:16178482317" class="text-muted contact-value" style="display:block; padding-top:2px; font-size:15px; line-height:21px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none; mso-line-height-rule:exactly;"><span class="contact-value-text" style="color:inherit; -webkit-text-fill-color:inherit; text-decoration:none;">+1 (617) 848-2317</span></a>
                                                        </td>
                                                        <td width="28" align="center" valign="middle" class="contact-chevron" style="width:28px; padding-right:14px; color:#4024D6; font-size:22px; line-height:22px; font-weight:900;">&#8250;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top:12px;">
                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="contact-card" style="width:100%; border:0; border-radius:16px; background:#FBFBFF; background-color:#FBFBFF;">
                                                    <tr>
                                                        <td width="52" align="center" valign="middle" class="contact-icon-cell" style="width:52px; padding:14px 0 14px 10px;">
                                                            <div class="contact-icon" style="width:42px; height:42px; border-radius:50%; background:#F5F3FF; color:#6F2AE8; font-size:14px; line-height:42px; font-weight:900; text-align:center; mso-line-height-rule:exactly;">@</div>
                                                        </td>
                                                        <td valign="middle" class="contact-copy-cell" style="padding:14px 10px 14px 10px;">
                                                            <div class="text-main contact-label" style="font-size:17px; line-height:22px; font-weight:900; color:#071A44; mso-line-height-rule:exactly;">Email Us</div>
                                                            <a href="mailto:{{ $supportEmail ?? 'support@bostonenglishcenter.com' }}" class="text-muted contact-value" style="display:block; padding-top:2px; font-size:16px; line-height:22px; font-weight:600; color:#405273; -webkit-text-fill-color:#405273; text-decoration:none; word-break:break-word; mso-line-height-rule:exactly;"><span class="contact-value-text" style="color:inherit; -webkit-text-fill-color:inherit; text-decoration:none;">{{ $supportEmail ?? 'support@bostonenglishcenter.com' }}</span></a>
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
                                <td class="brand-footer" style="padding:22px 0 26px; background:#FBFBFF; background-color:#FBFBFF; border:0; border-top:0; border-bottom:0; outline:0; box-shadow:none;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border:0; border-top:0; border-bottom:0; outline:0; box-shadow:none; border-collapse:collapse; border-spacing:0;">
                                        <tr>
                                            <td align="center">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center">
                                                    <tr>
                                                        <td valign="middle" align="center">
                                                            <div class="text-main footer-title" style="font-size:23px; line-height:24px; font-weight:900; color:#071A44; letter-spacing:-0.6px; mso-line-height-rule:exactly;">Boston</div>
                                                            <div class="text-accent footer-accent" style="font-size:15px; line-height:18px; font-weight:900; color:#1357E8; mso-line-height-rule:exactly;">English Center</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <p class="text-muted footer-copy" style="margin:14px 0 0; font-size:13px; line-height:20px; font-weight:600; color:#64748B; text-align:center; mso-line-height-rule:exactly;">&copy; 2024 Boston English Center<br>All Rights Reserved.</p>
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
