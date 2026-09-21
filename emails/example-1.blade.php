@php
    $supportEmail = $supportEmail ?? 'support@bostonenglishcenter.com';
    $unsubscribeUrl = $unsubscribeUrl ?? '#';

    $futuresBannerUrl = "https://material-media.s3.us-east-1.amazonaws.com/slider/emails/futures-banner-1.jpeg";
    $futuresBannerMobileUrl = "https://material-media.s3.us-east-1.amazonaws.com/slider/emails/futures-banner-mobile-1.jpeg";

    // Same square 50% badge used in the previous newsletter. Recommended: #7B4DFF background, white text, 192×192 PNG.
    $offerBadgeImageUrl = "https://material-media.s3.us-east-1.amazonaws.com/slider/emails/offer-badge-square.png";
    $emailPreviewText = '🧠 Practice English daily with interactive lessons and daily practice.';

    $dashboardUrl=route('landing',['ref'=>'1k332684']);
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
                width:90% !important;
                max-width:370px !important;
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
                font-size:32px !important;
                line-height:38px !important;
                letter-spacing:0 !important;
                white-space:normal !important;
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
                        <div class="headline" style="font-size:46px; line-height:52px; font-weight:900; color:#061538; letter-spacing:-1.5px; text-align:center; white-space:normal;">
                            Two Futures.<br>
                            One decision <span class="purple">Today.</span>
                        </div>
                        <div class="subhead" style="max-width:610px; margin:16px auto 0; font-size:28px; line-height:36px; font-weight:400; color:#061538; text-align:center;">
                            The next <span class="purple" style="font-weight:900;">6 months</span> will pass anyway.<br>
                            Choose which future you want.
                        </div>
                    </td>
                </tr>

                <!-- FUTURES IMAGE -->
                <tr>
                    <td class="pad section" style="padding-top:22px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card" style="border-color:#C7B8FF;">
                            <tr class="desktop-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img src="{{ $futuresBannerUrl }}" width="688" alt="Today versus 6 months later English progress comparison" style="width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>

                            <!--[if !mso]><!-->
                            <tr class="mobile-img-row">
                                <td style="font-size:0; line-height:0;">
                                    <img class="mobile-img" src="{{ $futuresBannerMobileUrl }}" width="100%" alt="Today versus 6 months later English progress comparison" style="display:none; width:100%; max-width:100%; height:auto;">
                                </td>
                            </tr>
                            <!--<![endif]-->
                        </table>
                    </td>
                </tr>

                <!-- OFFER -->
                <tr>
                    <td class="pad section" style="padding-top:20px;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" class="card offer-card" style="background:#ffffff; border-color:#D8DDEB; border-radius:18px;">
                            <tr>
                                <td class="offer-inner" style="padding:28px 20px 22px;">
                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td width="100%" align="center" valign="middle" class="offer-left" style="width:100%; padding:0;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" class="offer-price-wrap" style="width:100%; max-width:520px;">
                                                    <tr>
                                                        <td width="160" align="left" valign="middle" class="offer-badge-cell" style="width:160px; padding-right:28px;">
                                                            <img src="{{ $offerBadgeImageUrl }}" width="138" height="138" alt="50% OFF" class="offer-badge-img" style="width:138px; height:138px;">
                                                        </td>
                                                        <td align="left" valign="middle" class="offer-price-cell">
                                                            <div class="old-price muted" style="font-size:26px; line-height:32px; font-weight:800; color:#70727A; text-decoration:line-through; text-decoration-color:#E23245;">$70/month</div>
                                                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="left" class="price-table" style="margin:0;">
                                                                <tr>
                                                                    <td valign="baseline" class="price purple" style="font-size:88px; line-height:92px; font-weight:900; letter-spacing:-3.6px;">$35</td>
                                                                    <td valign="baseline" class="month" style="padding-left:10px; font-size:31px; line-height:37px; font-weight:900; color:#061538;">/month</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="cta-question" style="margin-top:22px; margin-bottom:12px; font-size:22px; line-height:28px; font-weight:900; color:#061538; text-align:center; white-space:normal;">
                                        Which version of yourself do you want to become?
                                    </div>

                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td bgcolor="#7B4DFF" style="background:#7B4DFF; border-radius:13px;">
                                                <a href="{{ $dashboardUrl }}" class="button-link cta-link" style="display:block; padding:18px 22px; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; text-decoration:none !important; border-radius:13px; text-align:center; white-space:nowrap;">
                                                    <span class="button-heart" style="display:inline-block; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important; font-size:25px; line-height:25px; text-align:center; vertical-align:middle; margin-right:10px;">&#128156;</span>
                                                    <span class="gmail-blend-screen" style="display:inline-block; vertical-align:middle;"><span class="gmail-blend-difference" style="display:inline-block;"><span class="cta-text" style="display:inline-block; font-size:24px; line-height:30px; font-weight:900; color:#ffffff !important; -webkit-text-fill-color:#ffffff !important;">Complete Your Registration Now</span></span></span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                @include('emails.includes.footer',['dashboardUrl'=>$dashboardUrl])

            </table>

            <!--[if mso]></td></tr></table><![endif]-->
        </td>
    </tr>
</table>
</body>
</html>
