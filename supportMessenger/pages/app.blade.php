@php
    use Illuminate\Support\Str;

    app()->setLocale(auth()->user()->lang??'en');

    $currentLang = app()->getLocale();
    $t = function (string $key, string $fallback) {
        $value = __($key);
        return $value === $key ? $fallback : $value;
    };

    $initialConversationId = trim((string) ($id ?? ''));
    $chatUserId = $chatUserId ?? 20611;
    $hasInitialConversation = filled($initialConversationId) && !in_array(strtolower($initialConversationId), ['0', 'null', 'undefined', 'false', 'select a conversation'], true);
    $isGroupConversation = Str::of((string) ($id ?? ''))->contains('-');
    $authAvatar = auth()->user()->getFirstMediaUrl('avatars','thumb');
    $conversationAvatarStyle = (!$hasInitialConversation || $isGroupConversation) ? 'background-image: none;' : "background-image: url('{$authAvatar}');";
@endphp
    <!doctype html>
<html lang="{{ str_replace('_', '-', $currentLang) }}" dir="{{ $currentLang === 'ar' ? 'rtl' : 'ltr' }}" class="h-full">
<head>
    <title>{{ config('chatify.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="id" content="{{ $id }}">
    {{--  This code make connections to groups and courses use only if we will add them back  --}}
    <meta name="groups" content="[]">
    <meta name="courses" content="[]">
    {{--    <meta name="groups" content="{{ $groups }}">--}}
    {{--    <meta name="courses" content="{{ $courses }}">--}}
    <meta name="messenger-color" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ route('admin.support-chat.index') }}" data-user="{{ $chatUserId }}">

    <meta name="user_id" content="{{ $chatUserId }}">
    <link rel="manifest" href="/manifest.webmanifest?v=7">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="live-practice-pusher-key" content="{{ config('chatify.pusher.key') }}">
    <meta name="live-practice-pusher-cluster" content="{{ config('chatify.pusher.options.cluster') }}">
    <meta name="live-practice-pusher-auth-endpoint" content="{{ route('admin.support-chat.pusher.auth') }}">
    <meta name="live-practice-presence-channel" content="presence-live-practice">
    <script>
        (function () {
            const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', systemPrefersDark);
        })();
    </script>
    <style>
        @keyframes pageLoadingPulse {
            0%, 100% {
                opacity: 0.9;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.06);
            }
        }

        .page-loading-mark {
            animation: pageLoadingPulse 1.15s ease-in-out infinite;
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import "@fortawesome/fontawesome-free/css/all.min.css";
        body {
            font-family: Manrope, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        html,
        body {
            width: 100%;
            height: 100%;
            min-height: 100%;
            overflow: hidden;
            overflow-x: clip;
            overscroll-behavior: none;
        }

        body {
            touch-action: manipulation;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        :root {
            --bec-chat-app-height: 100dvh;
            --bec-chat-visible-height: 100dvh;
            --bec-chat-viewport-top: 0px;
            --bec-chat-keyboard-gutter: 0px;
            --bec-chat-bottom-nav: 72px;
            --bec-chat-sidebar: 340px;
            color-scheme: light;
        }

        @media (min-width: 421px) and (max-width: 1279px) {
            :root {
                --bec-chat-bottom-nav: 96px;
            }
        }

        @media (min-width: 1280px) {
            :root {
                --bec-chat-bottom-nav: 0px;
            }
        }

        html.dark {
            color-scheme: dark;
        }

        html.bec-chat-conversation-open {
            --bec-chat-bottom-nav: 0px;
        }

        html.bec-chat-conversation-open .bec-chat-shell-menu {
            display: none !important;
        }

        html.bec-chat-keyboard-open {
            --bec-chat-keyboard-gutter: 12px;
        }

        .bec-chat-shell-menu,
        .bec-chat-shell-menu > nav {
            max-width: 100%;
            overflow-x: hidden;
        }

        .bec-chat-page,
        .bec-chat-page .messenger,
        .bec-chat-page .messenger-messagingView,
        .bec-chat-page .messenger-listView,
        .bec-chat-page .messenger-tab,
        .bec-chat-page .users-tab,
        .bec-chat-page .search-tab,
        .bec-chat-page .m-body,
        .bec-chat-page .contacts-container,
        .bec-chat-page .messages-inner,
        .bec-chat-page .messages,
        .bec-chat-page .message-card,
        .bec-chat-page .message-card-content,
        .bec-chat-page .card_container,
        .bec-chat-page .message_content,
        .bec-chat-page .messenger-sendCard,
        .bec-chat-page #message-form,
        .bec-chat-page .composer-input {
            max-width: 100%;
            overflow-x: hidden;
        }

        .bec-chat-page .messenger-listView,
        .bec-chat-page .messenger-messagingView,
        .bec-chat-page .messenger-tab,
        .bec-chat-page .m-header-messaging nav,
        .bec-chat-page .show-infoSide,
        .bec-chat-page .internet-connection,
        .bec-chat-page .listOfContacts,
        .bec-chat-page .messenger-admins,
        .bec-chat-page .search-records,
        .bec-chat-page #message-form,
        .bec-chat-page .composer-input,
        .bec-chat-page .box_recorder,
        .bec-chat-page .box_start {
            min-width: 0;
        }

        .bec-chat-page .internet-connection > span {
            min-width: 0;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .bec-chat-page .internet-connection {
            display: none !important;
        }

        .d-none { display: none !important; }
        .d-flex, .chatify-d-flex { display: flex !important; }
        .chatify-justify-content-between { justify-content: space-between !important; }
        .chatify-align-items-center { align-items: center !important; }

        .composer-input.is-recording .m-send,
        .composer-input.is-recording .send-button,
        .composer-input.is-recording #startRecordingBtn {
            display: none !important;
        }

        .composer-input.is-recording .box_recorder {
            display: flex !important;
            width: 100%;
        }

        .bec-chat-page .box_start {
            align-items: center;
            gap: .85rem;
        }

        .bec-chat-page #removeRecordBtn,
        .bec-chat-page #sendRecordBtn {
            width: 2.35rem;
            height: 2.35rem;
        }

        .bec-chat-page .box_start_recorder {
            align-items: center;
            justify-content: center;
            gap: .7rem;
            min-width: 0;
            height: 2.35rem;
        }

        .bec-chat-page .effect_recorder {
            position: relative;
            width: .62rem;
            height: .62rem;
            overflow: visible;
            box-shadow: 0 0 0 .28rem rgba(239, 68, 68, .08);
            animation: recorderPulse 1.25s ease-in-out infinite;
        }

        .bec-chat-page .timer_recorder {
            min-width: 3.55rem;
            color: #475569;
            font-size: 1.08rem;
            font-weight: 800;
            font-variant-numeric: tabular-nums;
            line-height: 1;
            letter-spacing: .01em;
            text-align: center;
        }

        .bec-chat-page .recording-wave {
            display: inline-flex;
            flex: 1 1 auto;
            min-width: 4.25rem;
            max-width: 8.5rem;
            height: 1.4rem;
            align-items: center;
            justify-content: center;
            gap: .22rem;
            color: #64748b;
        }

        .bec-chat-page .recording-wave span {
            width: .24rem;
            height: .24rem;
            border-radius: 999px;
            background: currentColor;
            opacity: .72;
            animation: recorderWave 1.05s ease-in-out infinite;
        }

        .bec-chat-page .recording-wave span:nth-child(2) { animation-delay: .08s; }
        .bec-chat-page .recording-wave span:nth-child(3) { animation-delay: .16s; }
        .bec-chat-page .recording-wave span:nth-child(4) { animation-delay: .24s; }
        .bec-chat-page .recording-wave span:nth-child(5) { animation-delay: .32s; }
        .bec-chat-page .recording-wave span:nth-child(6) { animation-delay: .40s; }
        .bec-chat-page .recording-wave span:nth-child(7) { animation-delay: .48s; }
        .bec-chat-page .recording-wave span:nth-child(8) { animation-delay: .56s; }

        @keyframes recorderPulse {
            0%, 100% { transform: scale(.9); opacity: .88; }
            50% { transform: scale(1.08); opacity: 1; }
        }

        @keyframes recorderWave {
            0%, 100% {
                height: .24rem;
                opacity: .48;
            }
            50% {
                height: 1.12rem;
                opacity: .9;
            }
        }

        .dark .bec-chat-page .timer_recorder,
        .dark .bec-chat-page .recording-wave {
            color: #cbd5e1;
        }

        .bec-chat-page .m-send {
            min-height: 1.625rem;
            max-height: 7.5rem;
            overflow-y: auto;
            overflow-x: hidden;
            line-height: 1.5rem;
            scrollbar-width: none;
        }

        .bec-chat-page .m-send::-webkit-scrollbar {
            display: none;
        }

        .chat-audio-player .audio-progress::-webkit-slider-runnable-track {
            height: .375rem;
            border-radius: 999px;
            background: currentColor;
            opacity: .22;
        }

        .chat-audio-player .audio-progress::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            height: .875rem;
            width: .875rem;
            margin-top: -.25rem;
            border-radius: 999px;
            background: currentColor;
        }

        .chat-audio-player .audio-progress::-moz-range-track {
            height: .375rem;
            border-radius: 999px;
            background: currentColor;
            opacity: .22;
        }

        .chat-audio-player .audio-progress::-moz-range-thumb {
            height: .875rem;
            width: .875rem;
            border: 0;
            border-radius: 999px;
            background: currentColor;
        }

        .Pause_Play .chat-audio-icon {
            display: block;
            flex: 0 0 auto;
        }

        .Pause_Play .chat-audio-icon[hidden] {
            display: none !important;
        }

        .Pause_Play .chat-audio-icon-play {
            width: 0;
            height: 0;
            margin-left: .125rem;
            border-top: .38rem solid transparent;
            border-bottom: .38rem solid transparent;
            border-left: .56rem solid currentColor;
        }

        .Pause_Play .chat-audio-icon-pause {
            position: relative;
            width: .62rem;
            height: .78rem;
        }

        .Pause_Play .chat-audio-icon-pause::before,
        .Pause_Play .chat-audio-icon-pause::after {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            width: .22rem;
            border-radius: 999px;
            background: currentColor;
        }

        .Pause_Play .chat-audio-icon-pause::before {
            left: 0;
        }

        .Pause_Play .chat-audio-icon-pause::after {
            right: 0;
        }

        .shared-photos-list:empty::before {
            content: "Nothing shared yet";
            grid-column: 1 / -1;
            display: grid;
            min-height: 5.5rem;
            place-items: center;
            border-radius: 1rem;
            background: #f8f8ff;
            color: #64748b;
            font-size: .875rem;
            font-weight: 500;
            text-align: center;
        }

        html.dark .shared-photos-list:empty::before {
            background: #080d19;
            color: #94a3b8;
        }

        .bec-chat-page .messages:has(> .message-hint:only-child) {
            display: grid;
            min-height: 16rem;
            place-items: center;
            padding: 2rem 1rem;
        }

        .bec-chat-page .messages > .message-hint {
            display: inline-flex;
            max-width: min(20rem, 100%);
            flex-direction: column;
            align-items: center;
            gap: .85rem;
            border: 1px solid rgba(91, 63, 234, .12);
            border-radius: 1.4rem;
            background: rgba(255, 255, 255, .86);
            padding: 1.35rem 1.45rem;
            color: #475569;
            font-size: .95rem;
            font-weight: 600;
            line-height: 1.45;
            text-align: center;
        }

        .bec-chat-page .messages > .message-hint::before {
            content: "\f4ad";
            display: grid;
            height: 2.75rem;
            width: 2.75rem;
            place-items: center;
            border-radius: 999px;
            background:
                linear-gradient(135deg, rgba(109, 76, 255, .95), rgba(79, 53, 216, .95)),
                radial-gradient(circle at 36% 36%, rgba(255, 255, 255, .9), transparent 42%);
            color: #fff;
            font-family: "Font Awesome 6 Free";
            font-size: 1.05rem;
            font-weight: 900;
            -webkit-mask: radial-gradient(circle at 50% 50%, #000 99%, transparent 100%);
            mask: radial-gradient(circle at 50% 50%, #000 99%, transparent 100%);
        }

        html.dark .bec-chat-page .messages > .message-hint {
            border-color: rgba(255, 255, 255, .08);
            background: rgba(15, 23, 42, .86);
            color: #cbd5e1;
        }

        .bec-chat-page .messages > .new-messages {
            display: inline-flex;
            width: fit-content;
            max-width: min(92%, 26rem);
            align-items: center;
            justify-content: center;
            gap: .55rem;
            margin: .75rem auto;
            border: 1px solid rgba(91, 63, 234, .14);
            border-radius: 999px;
            background: rgba(255, 255, 255, .86);
            padding: .55rem .95rem;
            color: #4f35d8;
            font-size: .86rem;
            font-weight: 800;
            line-height: 1.25;
            text-align: center;
            box-shadow: 0 12px 28px rgba(91, 63, 234, .10);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .bec-chat-page .messages > .new-messages::before {
            content: "";
            width: .5rem;
            height: .5rem;
            flex: 0 0 auto;
            border-radius: 999px;
            background: #5b3fea;
            box-shadow: 0 0 0 .28rem rgba(91, 63, 234, .12);
        }

        html.dark .bec-chat-page .messages > .new-messages {
            border-color: rgba(167, 139, 250, .18);
            background: rgba(15, 23, 42, .88);
            color: #c4b5fd;
            box-shadow: 0 14px 30px rgba(0, 0, 0, .22);
        }

        html.dark .bec-chat-page .messages > .new-messages::before {
            background: #a78bfa;
            box-shadow: 0 0 0 .28rem rgba(167, 139, 250, .14);
        }

        /*
         * Hide the empty conversation card on all screen sizes.
         * This prevents the center-to-left jump during navigation/state changes.
         */
        .bec-chat-page .messages > .message-hint[data-empty-state="1"] {
            display: none !important;
        }

        /* Prevent old Chatify .center-el positioning from fighting with the new grid centering. */
        .bec-chat-page .messages > .message-hint[data-empty-state="1"] {
            position: relative !important;
            inset: auto !important;
            top: auto !important;
            right: auto !important;
            bottom: auto !important;
            left: auto !important;
            transform: none !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }


        .bec-chat-page .chat-bg {
            background-color: #FAFAFF;
            background-image: url("https://i.ibb.co/T5YCq6V/bg.webp");
            background-repeat: repeat;
            background-size: 512px 512px;
            background-position: top left;
        }

        html.dark .bec-chat-page .chat-bg {
            background-color: #070B16;
            background-image: url("https://i.ibb.co/XfCL5F5t/bg-dark.webp");
            background-repeat: repeat;
            background-size: 512px 512px;
            background-position: top left;
        }


        /* Keep the language-learning pattern visible when no chat is selected. */
        .bec-chat-page .messenger.no-active-conversation .messenger-messagingView,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .messenger-messagingView,
        .bec-chat-page .messenger:not(.has-active-conversation) .messenger-messagingView {
            background-color: #FAFAFF !important;
            background-image: url("https://i.ibb.co/T5YCq6V/bg.webp") !important;
            background-repeat: repeat !important;
            background-size: 512px 512px !important;
            background-position: top left !important;
        }

        html.dark .bec-chat-page .messenger.no-active-conversation .messenger-messagingView,
        html.dark .bec-chat-page .messenger[data-has-active-conversation="0"] .messenger-messagingView,
        html.dark .bec-chat-page .messenger:not(.has-active-conversation) .messenger-messagingView {
            background-color: #070B16 !important;
            background-image: url("https://i.ibb.co/XfCL5F5t/bg-dark.webp") !important;
        }

        .bec-chat-page .messenger.no-active-conversation .messages-container,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .messages-container,
        .bec-chat-page .messenger:not(.has-active-conversation) .messages-container {
            background: transparent !important;
        }

        .bec-chat-page .messenger-listView,
        .bec-chat-page .messenger-tab,
        .bec-chat-page .users-tab,
        .bec-chat-page .search-tab {
            background:
                radial-gradient(circle at 100% 0%, rgba(91, 63, 234, .09), transparent 240px),
                radial-gradient(circle at 0% 18%, rgba(109, 76, 255, .05), transparent 180px),
                #FAFAFF;
        }

        html.dark .bec-chat-page .messenger-listView,
        html.dark .bec-chat-page .messenger-tab,
        html.dark .bec-chat-page .users-tab,
        html.dark .bec-chat-page .search-tab {
            background:
                radial-gradient(circle at 100% 0%, rgba(91, 63, 234, .14), transparent 260px),
                radial-gradient(circle at 0% 18%, rgba(109, 76, 255, .08), transparent 200px),
                #070B16;
        }

        .app-scroll,
        .app-scroll-hidden,
        .bec-chat-scroll,
        .messages-container,
        .messenger-admins,
        .listOfContacts,
        .search-records {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .app-scroll::-webkit-scrollbar,
        .app-scroll-hidden::-webkit-scrollbar,
        .bec-chat-scroll::-webkit-scrollbar,
        .messages-container::-webkit-scrollbar,
        .messenger-admins::-webkit-scrollbar,
        .listOfContacts::-webkit-scrollbar,
        .search-records::-webkit-scrollbar {
            display: none;
        }

        /* Keep the main chat scroll positions visible while leaving secondary scrollers hidden. */
        .bec-chat-page .users-tab,
        .bec-chat-page .listOfContacts,
        .bec-chat-page .messages-container {
            scrollbar-width: thin;
            scrollbar-color: rgba(91, 63, 234, .5) transparent;
        }

        .bec-chat-page .users-tab::-webkit-scrollbar,
        .bec-chat-page .listOfContacts::-webkit-scrollbar,
        .bec-chat-page .messages-container::-webkit-scrollbar {
            display: block;
            width: 6px;
            height: 6px;
        }

        .bec-chat-page .users-tab::-webkit-scrollbar-track,
        .bec-chat-page .listOfContacts::-webkit-scrollbar-track,
        .bec-chat-page .messages-container::-webkit-scrollbar-track {
            background: transparent;
        }

        .bec-chat-page .users-tab::-webkit-scrollbar-thumb,
        .bec-chat-page .listOfContacts::-webkit-scrollbar-thumb,
        .bec-chat-page .messages-container::-webkit-scrollbar-thumb {
            min-height: 32px;
            border: 1px solid transparent;
            border-radius: 999px;
            background: rgba(91, 63, 234, .5);
            background-clip: padding-box;
        }

        .bec-chat-page .users-tab::-webkit-scrollbar-thumb:hover,
        .bec-chat-page .listOfContacts::-webkit-scrollbar-thumb:hover,
        .bec-chat-page .messages-container::-webkit-scrollbar-thumb:hover {
            background: rgba(79, 53, 216, .72);
            background-clip: padding-box;
        }

        html.dark .bec-chat-page .users-tab,
        html.dark .bec-chat-page .listOfContacts,
        html.dark .bec-chat-page .messages-container {
            scrollbar-color: rgba(167, 139, 250, .58) transparent;
        }

        html.dark .bec-chat-page .users-tab::-webkit-scrollbar-thumb,
        html.dark .bec-chat-page .listOfContacts::-webkit-scrollbar-thumb,
        html.dark .bec-chat-page .messages-container::-webkit-scrollbar-thumb {
            background: rgba(167, 139, 250, .58);
            background-clip: padding-box;
        }

        /* Contact list cards need inner spacing so rounded corners and soft shadows do not get clipped. */
        .bec-chat-page .listOfContacts {
            padding: .5rem .5rem 1rem !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
        }

        .bec-chat-page .listOfContacts .messenger-list-item {
            margin: 0 !important;
        }

        .bec-chat-page .listOfContacts .messenger-list-item > tbody > tr {
            box-shadow: 0 8px 18px rgba(15, 23, 42, .035) !important;
        }

        .bec-chat-page .listOfContacts .messenger-list-item.active > tbody > tr,
        .bec-chat-page .listOfContacts .messenger-list-item.m-list-active > tbody > tr {
            box-shadow: 0 10px 22px rgba(91, 63, 234, .07) !important;
        }

        .bec-chat-page .messenger-tab:not(.show) { display: none !important; }
        .bec-chat-page .messenger-tab.show { display: flex !important; }
        .bec-chat-page .search-tab.show { display: block !important; }

        .app-modal,
        .imageModal,
        .videoModal,
        .pdfModal {
            display: none !important;
        }

        .app-modal[style*="display: block"],
        .app-modal[style*="display:block"],
        .app-modal[style*="display: flex"],
        .app-modal[style*="display:flex"],
        .imageModal[style*="display: block"],
        .imageModal[style*="display:block"],
        .imageModal[style*="display: flex"],
        .imageModal[style*="display:flex"],
        .videoModal[style*="display: block"],
        .videoModal[style*="display:block"],
        .videoModal[style*="display: flex"],
        .videoModal[style*="display:flex"],
        .pdfModal[style*="display: block"],
        .pdfModal[style*="display:block"],
        .pdfModal[style*="display: flex"],
        .pdfModal[style*="display:flex"] {
            display: flex !important;
        }

        .videoModal,
        .pdfModal {
            align-items: center;
            justify-content: center;
        }

        .videoModal-content {
            width: min(92vw, 960px);
            max-height: 82dvh;
            object-fit: contain;
        }

        .pdfModal-content {
            width: min(94vw, 1024px);
            height: min(86dvh, 900px);
            border: 0;
            background: #fff;
        }

        @media (max-width: 767px) {
            .videoModal,
            .pdfModal {
                padding: 0 !important;
                align-items: stretch;
                justify-content: stretch;
            }

            .videoModal-content {
                width: 100vw !important;
                height: 100dvh !important;
                max-width: none !important;
                max-height: none !important;
                border-radius: 0 !important;
                object-fit: contain;
            }

            .pdfModal-content {
                width: 100vw !important;
                height: 100dvh !important;
                max-width: none !important;
                max-height: none !important;
                border-radius: 0 !important;
            }

            .videoModal-close {
                top: max(.85rem, env(safe-area-inset-top)) !important;
                right: .85rem !important;
                background: rgba(255, 255, 255, .88) !important;
            }

            .pdfModal-toolbar {
                left: .85rem !important;
                right: .85rem !important;
                top: max(.85rem, env(safe-area-inset-top)) !important;
            }
        }

        .bec-chat-page .messenger-infoView { display: none !important; }

        .bec-chat-page .messenger-infoView.show,
        .bec-chat-page .messenger.show-infoSide .messenger-infoView {
            display: flex !important;
            flex-direction: column !important;
        }

        .bec-chat-page a:focus-visible,
        .bec-chat-page button:focus-visible,
        .bec-chat-page input:focus-visible,
        .bec-chat-page label:focus-visible,
        .bec-chat-page [tabindex]:not([tabindex="-1"]):focus-visible {
            outline: 0 !important;
            box-shadow: 0 0 0 4px rgba(91, 63, 234, .18) !important;
        }

        .bec-chat-page .messenger-search:focus-visible,
        .bec-chat-page .m-send:focus-visible,
        .bec-chat-page .messenger-search:focus,
        .bec-chat-page .m-send:focus,
        .bec-chat-page textarea:focus-visible {
            outline: 0 !important;
            box-shadow: none !important;
        }

        .bec-chat-page {
            overscroll-behavior: none;
        }

        .bec-chat-page .messenger,
        .bec-chat-page .messenger-listView,
        .bec-chat-page .messenger-messagingView,
        .bec-chat-page .messenger-infoView {
            min-height: 0;
            max-height: 100%;
        }

        .bec-chat-page .messenger-messagingView {
            grid-template-rows: auto minmax(0, 1fr) auto;
            overflow: hidden;
        }

        .bec-chat-page .messages-container {
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: contain;
            overflow-anchor: none;
            overflow-x: hidden;
        }

        .bec-chat-page .messenger-admins {
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            overflow-y: hidden !important;
            padding-bottom: .35rem;
        }

        .bec-chat-page .messenger-admins > * {
            flex: 0 0 auto;
        }

        .bec-chat-page .messenger-list-item .contact-item-time {
            max-width: 5.75rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: right;
        }

        .bec-chat-page .messenger.no-active-conversation .m-header-messaging,
        .bec-chat-page .messenger.no-active-conversation .messenger-sendCard,
        .bec-chat-page .messenger.no-active-conversation .m-header-right,
        .bec-chat-page .messenger.no-active-conversation .typing-indicator,
        .bec-chat-page .messenger.no-active-conversation .conversation-day-divider {
            display: none !important;
        }

        .bec-chat-page .messenger[data-has-active-conversation="0"] .m-header-messaging,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .messenger-sendCard,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .m-header-right,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .typing-indicator,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .conversation-day-divider,
        .bec-chat-page .messenger:not(.has-active-conversation) .m-header-messaging,
        .bec-chat-page .messenger:not(.has-active-conversation) .messenger-sendCard,
        .bec-chat-page .messenger:not(.has-active-conversation) .m-header-right,
        .bec-chat-page .messenger:not(.has-active-conversation) .typing-indicator,
        .bec-chat-page .messenger:not(.has-active-conversation) .conversation-day-divider {
            display: none !important;
        }

        .bec-chat-page .messenger.no-active-conversation .messages-inner,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .messages-inner,
        .bec-chat-page .messenger:not(.has-active-conversation) .messages-inner {
            display: none !important;
        }

        .bec-chat-page .messenger.no-active-conversation .messages-container,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .messages-container,
        .bec-chat-page .messenger:not(.has-active-conversation) .messages-container {
            display: block !important;
            height: 100% !important;
            min-height: 100% !important;
            padding: 0 !important;
        }

        .bec-chat-page .messenger.no-active-conversation .messenger-messagingView,
        .bec-chat-page .messenger[data-has-active-conversation="0"] .messenger-messagingView,
        .bec-chat-page .messenger:not(.has-active-conversation) .messenger-messagingView {
            background-color: #FAFAFF !important;
        }

        html.dark .bec-chat-page .messenger.no-active-conversation .messenger-messagingView,
        html.dark .bec-chat-page .messenger[data-has-active-conversation="0"] .messenger-messagingView,
        html.dark .bec-chat-page .messenger:not(.has-active-conversation) .messenger-messagingView {
            background-color: #070B16 !important;
        }

        .bec-chat-page .messenger.no-active-conversation .messages-container {
            display: grid;
            align-items: center;
            justify-items: center;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .bec-chat-page .messenger.no-active-conversation .messages-inner,
        .bec-chat-page .messenger.no-active-conversation .messages {
            width: 100%;
            max-width: 100%;
        }

        .bec-chat-page .messenger.no-active-conversation .messages {
            display: grid;
            min-height: min(28rem, calc(var(--bec-chat-app-height) - 8rem));
            place-items: center;
            padding: 1rem;
        }

        .bec-chat-page .messenger.no-active-conversation .message-hint {
            max-width: min(23rem, 92vw);
        }

        .bec-chat-page .messenger.no-active-conversation .messenger-list-item.active > tbody > tr,
        .bec-chat-page .messenger.no-active-conversation .messenger-list-item.m-list-active > tbody > tr,
        .bec-chat-page .messenger.no-active-conversation .messenger-list-item tr.active {
            border-color: rgb(226 232 240) !important;
            background: #fff !important;
        }

        html.dark .bec-chat-page .messenger.no-active-conversation .messenger-list-item.active > tbody > tr,
        html.dark .bec-chat-page .messenger.no-active-conversation .messenger-list-item.m-list-active > tbody > tr,
        html.dark .bec-chat-page .messenger.no-active-conversation .messenger-list-item tr.active {
            border-color: rgba(255, 255, 255, .15) !important;
            background: rgb(15 23 42) !important;
        }

        .bec-chat-page .messenger-sendCard[aria-disabled="true"] {
            pointer-events: none;
            opacity: .62;
        }

        .bec-chat-page .bec-chat-list-back {
            display: flex !important;
        }

        @media (min-width: 981px) {
            .bec-chat-page .bec-chat-list-back {
                display: none !important;
            }
        }

        @media (hover: none), (pointer: coarse) {
            .bec-chat-page .message-card .actions {
                display: flex !important;
                opacity: 1 !important;
                pointer-events: auto !important;
                visibility: visible !important;
            }

            .bec-chat-page .message-card .actions .delete-btn {
                pointer-events: auto !important;
            }
        }

        .bec-chat-page .composer-input textarea,
        .bec-chat-page .composer-input input,
        .bec-chat-page .messenger-search {
            font-size: 16px;
        }

        @media (min-width: 768px) {
            .bec-chat-page .composer-input textarea,
            .bec-chat-page .composer-input input,
            .bec-chat-page .messenger-search {
                font-size: .95rem;
            }
        }

        @media (max-width: 767px) {
            html.bec-chat-conversation-open,
            html.bec-chat-conversation-open body {
                height: 100%;
                overflow: hidden !important;
                overscroll-behavior: none;
            }

            .bec-chat-page .messenger {
                display: block;
            }

            .bec-chat-page .messenger-listView {
                position: absolute;
                inset: 0;
                width: 100%;
                max-width: 100%;
            }

            .bec-chat-page .messenger-messagingView {
                position: fixed;
                left: 0;
                right: 0;
                top: var(--bec-chat-viewport-top);
                bottom: auto;
                z-index: 40;
                display: grid !important;
                width: 100%;
                max-width: 100%;
                height: var(--bec-chat-visible-height);
                max-height: var(--bec-chat-visible-height);
                min-height: 0;
                grid-template-rows: auto minmax(0, 1fr) auto;
                overflow: hidden !important;
                overscroll-behavior: none;
                visibility: hidden;
                transform: translateX(100%);
                transition: transform .18s ease, visibility .18s ease;
                will-change: transform;
            }

            html.bec-chat-keyboard-open .bec-chat-page .messenger-messagingView {
                transition: none;
            }

            .bec-chat-page .messenger-sendCard {
                min-height: 0;
                border-top-color: transparent;
                background: #FAFAFF;
                backdrop-filter: none;
                overflow: visible;
                padding-top: .45rem;
                padding-bottom: calc(max(.55rem, env(safe-area-inset-bottom, 0px)) + var(--bec-chat-keyboard-gutter));
            }

            html.bec-chat-keyboard-open .bec-chat-page .messenger-sendCard {
                padding-top: .45rem;
                padding-bottom: calc(.55rem + var(--bec-chat-keyboard-gutter));
            }

            html.dark .bec-chat-page .messenger-sendCard {
                background: #070B16;
            }

            .bec-chat-page #message-form {
                margin-bottom: 0;
            }

            .bec-chat-page .m-header-messaging {
                min-height: 0;
                flex-shrink: 0;
            }

            .bec-chat-page .messages-container {
                min-height: 0;
                height: auto;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                overscroll-behavior: contain;
                padding-bottom: 1rem;
                touch-action: pan-y;
            }

            .bec-chat-page .messenger.conversation-open .messenger-listView,
            .bec-chat-page .messenger-listView.conversation-active {
                display: none !important;
            }

            .bec-chat-page .messenger.conversation-open .messenger-messagingView,
            .bec-chat-page .messenger-listView.conversation-active + .messenger-messagingView {
                display: grid !important;
                visibility: visible;
                transform: translateX(0);
            }

            .bec-chat-page .messenger.no-active-conversation .messenger-messagingView,
            .bec-chat-page .messenger[data-has-active-conversation="0"] .messenger-messagingView,
            .bec-chat-page .messenger:not(.has-active-conversation) .messenger-messagingView {
                display: grid !important;
                visibility: visible !important;
                transform: none !important;
                transition: none !important;
                pointer-events: none !important;
                z-index: 0;
            }

            .bec-chat-page .messenger.no-active-conversation .messenger-listView,
            .bec-chat-page .messenger[data-has-active-conversation="0"] .messenger-listView,
            .bec-chat-page .messenger:not(.has-active-conversation) .messenger-listView {
                z-index: 20;
            }

            .bec-chat-page .messenger.no-active-conversation .messenger-listView {
                display: flex !important;
                visibility: visible !important;
                transform: none !important;
            }

            /*
             * Mobile fix:
             * The empty conversation card is useful on desktop, but on mobile it lives inside
             * the sliding conversation panel. Hiding it on mobile prevents the center-to-left
             * jump during navigation and Chatify state changes.
             */
            .bec-chat-page .messages > .message-hint[data-empty-state="1"] {
                display: none !important;
            }

        }


        .bec-chat-page .message-card.chatify-pending-message {
            display: flex !important;
            width: 100%;
            align-items: flex-end;
            background: transparent !important;
            justify-content: flex-end !important;
        }

        .bec-chat-page .message-card.chatify-pending-message .message-card-content {
            margin-left: auto !important;
            margin-right: 0 !important;
            min-width: 0;
            max-width: min(86%, 24rem);
        }

        .bec-chat-page .message-card.chatify-pending-message .message-card-content > .message,
        .bec-chat-page .message-card.chatify-pending-message .card_container > .message,
        .bec-chat-page .message-card.chatify-pending-message > .message {
            display: inline-flex !important;
            align-items: center;
            justify-content: flex-start;
            gap: .38rem;
            max-width: 100%;
            min-width: 0;
            border-radius: 1.45rem;
            border-bottom-right-radius: .5rem;
            background: linear-gradient(135deg, #6D4CFF 0%, #4F35D8 100%);
            padding: .75rem 1rem;
            text-align: left;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .bec-chat-page .message-card.chatify-pending-message > .message {
            margin-left: auto;
        }

        .bec-chat-page .message-card.chatify-pending-message .message_content {
            border-radius: 1.45rem !important;
            border-bottom-right-radius: .5rem !important;
            background: linear-gradient(135deg, #6D4CFF 0%, #4F35D8 100%) !important;
            color: #fff !important;
        }

        .bec-chat-page .message-card.chatify-pending-message .fa-clock,
        .bec-chat-page .message-card.chatify-pending-message .far.fa-clock,
        .bec-chat-page .message-card.chatify-pending-message .fas.fa-clock {
            flex: 0 0 auto;
            color: currentColor !important;
            font-size: .78rem;
            opacity: .82;
        }


        /* Simple WhatsApp-like attachment preview popup.
           The default inline Chatify file preview is hidden so the bottom composer stays clean. */
        .bec-chat-page .attachment-preview {
            display: none !important;
        }

        .bec-attachment-popup {
            display: none;
            background: #050505;
            color: #fff;
        }

        .bec-attachment-popup.is-open {
            display: flex;
        }

        html.bec-attachment-popup-open,
        html.bec-attachment-popup-open body {
            overflow: hidden !important;
        }

        .bec-attachment-popup-close {
            background: rgba(255, 255, 255, .12);
            color: #fff;
            backdrop-filter: blur(14px);
        }

        .bec-attachment-popup-stage {
            min-height: 0;
            flex: 1 1 auto;
        }

        .bec-attachment-popup-preview {
            width: 100%;
            height: 100%;
        }

        .bec-attachment-popup-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .bec-attachment-popup-preview video {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #050505;
        }

        .bec-attachment-popup-file {
            max-width: min(32rem, calc(100vw - 2rem));
            border: 1px solid rgba(255, 255, 255, .12);
            background: rgba(255, 255, 255, .08);
            color: #fff;
            backdrop-filter: blur(18px);
        }

        .bec-attachment-popup-footer {
            flex: 0 0 auto;
            background: linear-gradient(180deg, rgba(5, 5, 5, 0) 0%, rgba(5, 5, 5, .88) 34%, #050505 100%);
        }

        .bec-attachment-popup-caption-wrap {
            border: 1px solid rgba(255, 255, 255, .16);
            background: rgba(12, 12, 12, .86);
            box-shadow: 0 12px 34px rgba(0, 0, 0, .28);
        }

        .bec-attachment-popup-caption {
            scrollbar-width: none;
        }

        .bec-attachment-popup-caption::-webkit-scrollbar {
            display: none;
        }

        .bec-attachment-popup-send {
            box-shadow: 0 16px 34px rgba(34, 197, 94, .24);
        }

        @media (max-width: 767px) {
            .bec-attachment-popup-stage {
                padding-top: max(4.25rem, env(safe-area-inset-top));
                padding-bottom: 11.75rem;
            }

            .bec-attachment-popup-footer {
                padding-bottom: max(1rem, env(safe-area-inset-bottom));
            }
        }

        @media (min-width: 1280px) {
            .bec-chat-page[data-sidebar-side="left"] {
                left: var(--bec-chat-sidebar) !important;
                right: 0 !important;
                width: auto !important;
            }

            .bec-chat-page[data-sidebar-side="right"] {
                left: 0 !important;
                right: var(--bec-chat-sidebar) !important;
                width: auto !important;
            }
        }

    </style>

    <script src="{{ asset('template/core/jquery.min.js') }}"></script>
    <script src="{{ asset('template/chatify/js/autosize.min.js') }}"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">

</head>
<body dir="ltr" class="relative h-full overflow-hidden bg-[#FAFAFF] font-sans text-slate-950 antialiased transition-colors duration-300 dark:bg-[#070B16] dark:text-slate-100">

<div id="page-loading-overlay"
     class="{{ $hasInitialConversation ? 'grid' : 'hidden' }} fixed inset-0 z-[9999] place-items-center bg-white px-6 dark:bg-[#090f1c]"
     role="status"
     aria-live="polite"
     aria-hidden="{{ $hasInitialConversation ? 'false' : 'true' }}">
    <img class="page-loading-mark w-[24vw] max-w-[11rem] min-w-[5.5rem]"
         src="{{ asset('favicon.svg') }}"
         alt=""
         aria-hidden="true">
</div>

<div class="bec-chat-shell-menu">
    @if(auth()->check())
        @if(auth()->user()->role_id==4)
            @include("student.app.dashboard.menu", ["active" => "support"])
        @elseif(in_array(auth()->user()->role_id,[1,2]))
            @include("admin.layout.app-menu", ["active" => "support"])
        @elseif(in_array(auth()->user()->role_id,[3,5]))
            @include("tutor.layout.app-menu", ["active" => "support"])
        @elseif(auth()->user()->role_id==6)
            @include("volunteer.dashboard.menu", ["active" => "support"])
        @endif
    @endif
</div>

<main class="bec-chat-page fixed inset-x-0 top-0 bottom-[calc(var(--bec-chat-bottom-nav)+env(safe-area-inset-bottom,0px))] z-[1] min-h-0 overflow-hidden p-0 xl:bottom-0"
      data-sidebar-side="{{ $currentLang === 'ar' ? 'right' : 'left' }}"
      aria-label="{{ $t('chatify.BostonMessenger', 'Boston English Center messenger') }}">
    <section class="messenger {{ !!$id ? 'conversation-open has-active-conversation' : 'no-active-conversation' }} relative h-full min-h-0 w-full overflow-hidden md:flex md:gap-0" dir="ltr" data-has-active-conversation="{{ !!$id ? '1' : '0' }}">
        <aside class="messenger-listView {{ !!$id ? 'conversation-active' : '' }} absolute inset-0 z-20 flex h-full min-w-0 flex-col overflow-hidden bg-[#FAFAFF] px-4 py-4 sm:px-6 md:relative md:inset-auto md:z-auto md:w-[300px] md:shrink-0 md:border-r md:border-slate-900/5 md:px-4 md:py-3 lg:w-[340px] xl:w-[380px] dark:border-white/[.07] dark:bg-[#080D19]">
            <input type="text" class="messenger-search hidden" aria-hidden="true" tabindex="-1">

            <div class="m-body contacts-container min-h-0 flex-1 overflow-hidden">
                <div class="show messenger-tab users-tab bec-chat-scroll flex h-full min-h-0 flex-col overflow-y-auto" data-view="users" role="list" aria-label="{{ $t('chatify.Chats', 'Chats') }}">
                    <div class="admins-section shrink-0">
                        <p class="messenger-title px-1 pb-2 pt-1 text-xs font-semibold text-slate-500 dark:text-slate-400"><span>{{ $t('chatify.AllContacts', 'All contacts') }}</span></p>
                        <div class="messenger-admins bec-chat-scroll mb-4 flex flex-wrap gap-2 overflow-hidden px-0 pb-1"></div>
                    </div>

                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-semibold text-slate-500 dark:text-slate-400"><span>{{ $t('chatify.AllMessages', 'All messages') }}</span></p>
                    <div class="listOfContacts mx-0 space-y-2.5 overflow-y-auto overflow-x-hidden px-2 pb-4 pt-2"></div>
                </div>

                <div class="messenger-tab search-tab bec-chat-scroll h-full min-h-0 overflow-y-auto" data-view="search">
                    <p class="messenger-title px-1 pb-2 pt-1 text-xs font-semibold text-slate-500 dark:text-slate-400"><span>{{ $t('chatify.Search', 'Search') }}</span></p>
                    <div class="search-records mx-0 space-y-3 px-0 pb-0 pt-1">
                        <p class="message-hint center-el relative inset-auto mx-auto transform-none rounded-[1.5rem] bg-white px-5 py-8 text-center text-sm font-medium text-slate-500 shadow-[0_14px_40px_rgba(15,23,42,0.04)] transition-colors duration-300 dark:bg-slate-900 dark:text-slate-400 dark:shadow-[0_14px_40px_rgba(0,0,0,0.24)]"><span>{{ $t('chatify.TypeToSearch', 'Type to search...') }}</span></p>
                    </div>
                </div>
            </div>
        </aside>

        <section class="messenger-messagingView relative z-[1] grid h-full min-h-0 max-h-full w-full grid-rows-[auto_minmax(0,1fr)_auto] overflow-hidden bg-[#FAFAFF] md:min-w-0 md:flex-1 dark:bg-[#070B16]" role="region" aria-label="{{ $t('chatify.Conversation', 'Conversation') }}">
            <div class="m-header m-header-messaging shrink-0 border-b border-slate-900/5 bg-[#FAFAFF]/95 px-3 pb-2 pt-3 backdrop-blur transition-colors duration-300 sm:px-4 md:px-6 md:py-3 xl:px-7 dark:border-white/10 dark:bg-[#070B16]/95">
                <nav class="flex items-center gap-2 sm:gap-3">
                    <a href="#" class="show-listView bec-chat-list-back h-9 w-7 shrink-0 items-center justify-center text-[#5B3FEA] transition active:scale-95 dark:text-violet-300" aria-label="{{ $t('chatify.BackToChats', 'Back to chats') }}">
                        <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7"><path d="M15 5 8 12l7 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>

                    <a href="#" class="show-infoSide conversation-profile-trigger flex min-w-0 flex-1 items-center gap-3 text-left no-underline" aria-label="{{ $t('chatify.OpenConversationDetails', 'Open conversation details') }}">
                        <div class="avatar av-s header-avatar {{ $isGroupConversation ? 'is-group-avatar' : '' }} relative flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#F2EEFF] bg-cover bg-center text-[#5B3FEA] ring-2 ring-white xl:h-12 xl:w-12 dark:bg-violet-500/15 dark:text-violet-300 dark:ring-slate-900" style="{{ $conversationAvatarStyle }}">
{{--                            <i class="group-avatar-icon fa-solid fa-user-group {{ $isGroupConversation ? 'inline-block' : 'hidden' }} text-lg"></i>--}}
                            <span class="conversation-presence-dot hidden absolute bottom-[1px] right-[-1px] h-3.5 w-3.5 rounded-full border-[3px] border-white bg-slate-300 dark:border-slate-900 dark:bg-slate-500" aria-label="{{ $t('chatify.Offline', 'Offline') }}"></span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="user-name block truncate text-lg font-semibold leading-tight tracking-[-0.01em] text-slate-950 sm:text-[22px] md:text-lg xl:text-xl dark:text-white">{{ !!$id ? auth()->user()->name : 'Select a conversation' }}</span>
                            <span class="internet-connection mt-1 flex min-w-0 items-center gap-2 text-sm font-medium text-slate-500 dark:text-slate-400">
                                <span class="ic-connected">{{ $t('chatify.Connected', 'Connected') }}</span>
                                <span class="ic-connecting">{{ $t('chatify.Connecting...', 'Connecting...') }}</span>
                                <span class="ic-noInternet">{{ $t('chatify.No internet access', 'No internet access') }}</span>
                            </span>
                        </div>
                    </a>

                    <div class="m-header-right ml-auto flex shrink-0 items-center gap-2 text-[#5B3FEA] dark:text-violet-300">
                        <button
                            type="button"
                            class="hidden inline-flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-white shadow-xl shadow-slate-950/25 ring-1 ring-white/20 transition hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-cyan-300"
                            id="btnGetStudentsDetails"
                            aria-label="Open student overview"
                        >
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M3 9.25 12 5l9 4.25L12 13.5 3 9.25Z" fill="currentColor" fill-opacity=".28"/>
                                <path d="M7 11.25v4.1c0 1.45 2.24 2.65 5 2.65s5-1.2 5-2.65v-4.1M21 9.25V15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3 9.25 12 5l9 4.25L12 13.5 3 9.25Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        {{--<a href="#" class="show-infoSide flex h-9 w-9 items-center justify-center rounded-full transition hover:bg-[#F2EEFF] active:scale-95 dark:hover:bg-white/10" aria-label="{{ $t('chatify.ConversationDetails', 'Conversation details') }}">
                            <svg viewBox="0 0 24 24" fill="none" class="h-7 w-7 md:h-6 md:w-6 xl:h-7 xl:w-7"><path d="M12 6.5h.01M12 12h.01M12 17.5h.01" stroke="currentColor" stroke-width="4" stroke-linecap="round"/></svg>
                        </a>--}}
                    </div>
                </nav>
            </div>

            <div class="m-body messages-container chat-bg bec-chat-scroll min-h-0 flex-1 overflow-y-auto px-4 py-3 sm:px-5 md:px-7 md:py-4 xl:px-8" aria-live="polite" aria-relevant="additions text">
                <div class="messages-inner mx-auto w-full max-w-[1120px] px-1 py-1 md:px-2 xl:max-w-[1180px]">
                    <div class="conversation-day-divider mb-4 text-center">
                        <span class="text-sm font-semibold text-slate-700 xl:text-base dark:text-slate-300">Today</span>
                    </div>

                    <div class="messages mx-auto w-full max-w-[1120px] space-y-4 px-1 pb-2 xl:max-w-[1180px]" role="log" aria-label="{{ $t('chatify.Messages', 'Messages') }}">
                        <p class="message-hint relative inset-auto mx-auto transform-none rounded-[1.5rem] bg-white px-5 py-8 text-center text-sm font-medium text-slate-500 shadow-[0_14px_40px_rgba(15,23,42,0.04)] transition-colors duration-300 dark:bg-slate-900 dark:text-slate-400 dark:shadow-[0_14px_40px_rgba(0,0,0,0.24)]" data-empty-state="1">
                            <span class="empty-conversation-title block text-base font-extrabold text-slate-950 dark:text-white">Select a conversation</span>
                            <span class="empty-conversation-description mt-1 block text-sm font-semibold text-slate-500 dark:text-slate-400">Choose a student, teacher, or group to start messaging.</span>
                        </p>
                    </div>

                    <div class="typing-indicator d-none mt-3 w-full" role="status" aria-live="polite">
                        <div class="message-card typing flex w-full items-end bg-transparent">
                            <div class="message">
                                <span class="typing-dots inline-flex items-center gap-1 rounded-full bg-white px-4 py-3 transition-colors duration-300 dark:bg-slate-900">
                                    <span class="dot dot-1 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                    <span class="dot dot-2 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                    <span class="dot dot-3 h-2 w-2 rounded-full bg-[#5B3FEA]/50"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="messenger-sendCard shrink-0 border-t border-slate-900/5 bg-[#FAFAFF]/95 px-4 py-3 backdrop-blur transition-colors duration-300 dark:border-white/[.06] dark:bg-[#070B16]/95" aria-disabled="{{ !!$id ? 'false' : 'true' }}">
                <form id="message-form" method="POST" action="{{ route('admin.support-chat.send.message') }}" enctype="multipart/form-data" aria-label="{{ $t('chatify.SendMessage', 'Send a message') }}" class="relative mx-auto flex w-full max-w-full items-center gap-3 overflow-visible border-0 bg-transparent shadow-none outline-none">
                    @csrf

                    <label class="attachment-button inline-flex h-10 w-10 shrink-0 cursor-pointer items-center justify-center rounded-full border-0 bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white active:scale-95" aria-label="{{ $t('chatify.AddAttachment', 'Add attachment') }}" tabindex="0">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.2rem] w-[1.2rem]">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"></path>
                        </svg>
                        <input disabled="disabled" type="file" class="upload-attachment hidden" name="file" accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, .{{ implode(', .', config('chatify.attachments.allowed_files')) }}" />
                    </label>

                    <div class="composer-input flex min-h-12 min-w-0 flex-1 items-center gap-3 overflow-hidden rounded-[1.5rem] border border-slate-900/5 bg-white px-5 py-3 shadow-none transition-colors duration-300 dark:border-white/[.08] dark:bg-[#101827] dark:shadow-none">
                        <textarea readonly="readonly" name="message" rows="1" class="m-send app-scroll block min-w-0 flex-1 resize-none border-0 bg-transparent px-0 py-[1px] text-[16px] font-medium leading-6 text-slate-900 shadow-none outline-none placeholder:text-slate-400 md:text-[.95rem] dark:text-slate-100 dark:placeholder:text-slate-500" placeholder="Type a message..." aria-label="{{ $t('chatify.MessageText', 'Message text') }}"></textarea>

                        <button type="submit" disabled="disabled" class="send-button d-none h-7 w-7 shrink-0 items-center justify-center border-0 bg-transparent p-0 text-[#5B3FEA] outline-none transition active:scale-95 dark:text-violet-300" aria-label="{{ $t('chatify.SendMessage', 'Send message') }}">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.65rem] w-[1.65rem]">
                                <path d="M5 12 3.5 5.5 21 12 3.5 18.5 5 12Zm0 0h8" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>

                        <span id="startRecordingBtn" class="inline-flex h-7 w-7 shrink-0 cursor-pointer items-center justify-center border-0 bg-transparent p-0 text-[#5B3FEA] outline-none transition active:scale-95 dark:text-violet-300" aria-label="{{ $t('chatify.RecordVoiceMessage', 'Record voice message') }}">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-[1.65rem] w-[1.65rem]">
                                <path d="M12 14.5a3.3 3.3 0 0 0 3.3-3.3V6.3a3.3 3.3 0 0 0-6.6 0v4.9a3.3 3.3 0 0 0 3.3 3.3Z" stroke="currentColor" stroke-width="2.1"></path>
                                <path d="M5.5 11.5a6.5 6.5 0 0 0 13 0M12 18v3M8.5 21h7" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"></path>
                            </svg>
                        </span>

                        <div class="box_recorder d-none min-w-0 flex-1 items-center">
                            <div class="box_start flex w-full min-w-0 items-center justify-between gap-3">
                                <span id="removeRecordBtn" class="inline-flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full bg-red-50 text-red-500 dark:bg-red-500/15 dark:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-[1.15rem] w-[1.15rem]">
                                        <path fill="currentColor" d="M5 21V6H4V4h5V3h6v1h5v2h-1v15H5Zm2-2h10V6H7v13Zm2-2h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/>
                                    </svg>
                                </span>

                                <div class="box_start_recorder flex min-w-0 flex-1 items-center text-slate-500 dark:text-slate-400">
                                    <span class="effect_recorder h-2.5 w-2.5 shrink-0 rounded-full bg-red-500"></span>
                                    <span class="timer_recorder shrink-0">
                                        <span class="minute_recorder">00</span><span>:</span><span class="second_recorder">00</span>
                                    </span>
                                    <span class="text_recorder recording-wave" aria-hidden="true">
                                        <span></span><span></span><span></span><span></span>
                                        <span></span><span></span><span></span><span></span>
                                    </span>
                                </div>

                                <span id="sendRecordBtn" class="inline-flex h-9 w-9 shrink-0 cursor-pointer items-center justify-center rounded-full bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] text-white">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[1.15rem] w-[1.15rem]">
                                        <path fill="currentColor" d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </footer>
        </section>

        {{--<aside class="messenger-infoView bec-chat-scroll fixed inset-[.6rem] bottom-[calc(var(--bec-chat-bottom-nav)+env(safe-area-inset-bottom,0px)+.6rem)] z-[60] h-auto w-auto shrink-0 overflow-y-auto rounded-[1.6rem] border border-white/80 bg-[#FAFAFF] p-4 shadow-[0_24px_70px_rgba(79,53,216,0.12)] transition-colors duration-300 md:relative md:inset-auto md:z-[1] md:h-full md:w-[320px] md:flex-[0_0_320px] md:rounded-none md:border-y-0 md:border-r-0 md:shadow-none dark:border-white/[.07] dark:bg-[#080D19] dark:shadow-none" aria-label="{{ $t('chatify.ConversationDetails', 'Conversation details') }}">
            <nav class="mb-4 flex items-center justify-between gap-3">
                <p class="text-base font-bold tracking-[-.02em] text-slate-950 dark:text-white">{{ $t('chatify.UserDetails', 'User details') }}</p>
                <a href="#" class="messenger-infoView-close flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-500 shadow-[0_8px_28px_rgba(15,23,42,0.035)] transition hover:bg-[#F2EEFF] hover:text-[#5B3FEA] dark:bg-slate-900 dark:text-slate-400 dark:shadow-[0_8px_28px_rgba(0,0,0,0.24)] dark:hover:bg-white/10 dark:hover:text-violet-300" aria-label="{{ $t('chatify.CloseDetails', 'Close details') }}"><i class="fas fa-times"></i></a>
            </nav>
            <div class="mb-4 overflow-hidden rounded-[1.6rem] border border-white/80 bg-white p-5 text-center shadow-[0_18px_48px_rgba(91,63,234,0.08)] transition-colors duration-300 dark:border-white/10 dark:bg-slate-900 dark:shadow-[0_18px_48px_rgba(0,0,0,0.24)]">
                <div class="mx-auto mb-4 flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-[#F2EEFF] to-white shadow-[0_18px_34px_rgba(91,63,234,0.12)] ring-4 ring-white dark:from-violet-500/15 dark:to-slate-900 dark:ring-slate-950">
                    <div class="avatar av-l info-avatar chatify-d-flex {{ $isGroupConversation ? 'is-group-avatar' : '' }} relative h-20 w-20 items-center justify-center rounded-full bg-[#F2EEFF] bg-cover bg-center text-[#5B3FEA] dark:bg-violet-500/15 dark:text-violet-300" style="{{ $conversationAvatarStyle }}">
                        <i class="group-avatar-icon fa-solid fa-user-group {{ $isGroupConversation ? 'inline-block' : 'hidden' }} text-2xl"></i>
                        <span class="conversation-presence-dot hidden absolute bottom-[2px] right-[-2px] h-4 w-4 rounded-full border-[3px] border-white bg-slate-300 dark:border-slate-900 dark:bg-slate-500" aria-label="{{ $t('chatify.Offline', 'Offline') }}"></span>
                    </div>
                </div>
                <p class="info-name truncate text-xl font-extrabold tracking-[-.03em] text-slate-950 dark:text-white">{{ !!$id ? auth()->user()->name : 'Select a conversation' }}</p>
                <p class="mt-1 text-sm font-semibold text-slate-500 dark:text-slate-400">{{ $t('chatify.ConversationProfile', 'Conversation profile') }}</p>
            </div>

            <p class="collapsed messenger-infoView-collapse cursor-pointer d-none mb-3 rounded-[1.25rem] border border-[#DED8FF] bg-[#F8F6FF] px-4 py-3 text-sm font-bold text-[#5B3FEA] dark:border-violet-300/15 dark:bg-violet-500/10 dark:text-violet-300">
                <span class="flex items-center justify-between gap-3">
                    {{ $t('chatify.ManageGroup', 'Manage group') }}
                    <i class="arrow_right fas fa-plus text-sm" aria-hidden="true"></i>
                </span>
            </p>

            <div class="messenger-infoView-btns mb-4 space-y-2">
                <a href="#" class="danger delete-conversation d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ $t('chatify.DeleteConversation', 'Delete conversation') }}</a>
                <a href="#" class="danger block-user d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ $t('chatify.BlockUser', 'Block user') }}</a>
                <a href="#" class="danger block-users-from-group d-none flex w-full items-center justify-center rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-600 no-underline">{{ $t('chatify.BlockUsers', 'Block users') }}</a>
            </div>

            <div class="messenger-infoView-shared rounded-[1.6rem] border border-white/80 bg-white p-4 shadow-[0_18px_48px_rgba(15,23,42,0.045)] transition-colors duration-300 dark:border-white/10 dark:bg-slate-900 dark:shadow-[0_18px_48px_rgba(0,0,0,0.24)]" aria-label="{{ $t('chatify.SharedPhotos', 'Shared photos') }}">
                <p class="mb-4">
                    <span class="block text-base font-extrabold tracking-[-.02em] text-slate-950 dark:text-white">{{ $t('chatify.SharedPhotos', 'Shared photos') }}</span>
                    <span class="mt-1 block text-xs font-bold text-slate-400 dark:text-slate-500">{{ $t('chatify.ImagesFromConversation', 'Images from this conversation') }}</span>
                </p>
                <div class="shared-photos-list grid min-h-[6rem] grid-cols-3 gap-2 rounded-[1.2rem] bg-[#FAFAFF] p-2 dark:border dark:border-white/[.04] dark:bg-[#080D19]"></div>
            </div>
        </aside>--}}
        <div class="bec-chat-backdrop hidden fixed inset-0 z-50 bg-slate-950/30 backdrop-blur-sm md:hidden" aria-hidden="true"></div>
    </section>
</main>

<div id="overviewSection"></div>

<div id="imageModalBox" class="imageModal fixed inset-0 z-[9999] items-center justify-center bg-slate-950/80 p-4 backdrop-blur-sm" style="display: none;">
    <button type="button" class="imageModal-close absolute right-5 top-5 flex h-11 w-11 items-center justify-center rounded-full bg-white text-2xl font-bold text-slate-700 shadow-[0_12px_34px_rgba(0,0,0,.18)] transition hover:bg-slate-100 dark:border dark:border-white/10 dark:bg-slate-900 dark:text-slate-200">&times;</button>
    <img class="imageModal-content max-h-[88dvh] max-w-[92vw] rounded-[1.35rem] object-contain shadow-[0_24px_70px_rgba(0,0,0,.35)]" id="imageModalBoxSrc">
</div>

<div id="videoModalBox" class="videoModal fixed inset-0 z-[9999] items-center justify-center bg-slate-950/90 p-4 backdrop-blur-sm" style="display: none;">
    <button type="button" class="videoModal-close absolute right-5 top-5 z-[2] flex h-11 w-11 items-center justify-center rounded-full bg-white text-2xl font-bold text-slate-700 shadow-[0_12px_34px_rgba(0,0,0,.18)] transition hover:bg-slate-100 dark:border dark:border-white/10 dark:bg-slate-900 dark:text-slate-200">&times;</button>
    <video id="videoModalBoxSrc" class="videoModal-content max-h-[88dvh] max-w-[92vw] rounded-[1.35rem] bg-black shadow-[0_24px_70px_rgba(0,0,0,.35)]" controls playsinline preload="metadata"></video>
</div>

<div id="pdfModalBox" class="pdfModal fixed inset-0 z-[9999] items-center justify-center bg-slate-950/90 p-4 backdrop-blur-sm" style="display: none;">
    <div class="pdfModal-toolbar absolute right-5 top-5 z-[2] flex items-center justify-end gap-2">
        <a id="pdfModalOpenLink" href="#" target="_blank" rel="noopener" class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-white text-base text-slate-700 no-underline shadow-[0_12px_34px_rgba(0,0,0,.18)] transition hover:bg-slate-100 dark:border dark:border-white/10 dark:bg-slate-900 dark:text-slate-200" aria-label="{{ $t('chatify.OpenPDF', 'Open PDF') }}">
            <i class="fas fa-arrow-up-right-from-square"></i>
        </a>
        <button type="button" class="pdfModal-close flex h-11 w-11 items-center justify-center rounded-full bg-white text-2xl font-bold text-slate-700 shadow-[0_12px_34px_rgba(0,0,0,.18)] transition hover:bg-slate-100 dark:border dark:border-white/10 dark:bg-slate-900 dark:text-slate-200" aria-label="{{ $t('chatify.Close', 'Close') }}">&times;</button>
    </div>
    <iframe id="pdfModalBoxSrc" class="pdfModal-content rounded-[1.35rem] shadow-[0_24px_70px_rgba(0,0,0,.35)]" title="{{ $t('chatify.PDFDocument', 'PDF document') }}"></iframe>
</div>


<div id="becAttachmentPopup" class="bec-attachment-popup fixed inset-0 z-[9997] flex-col overflow-hidden" aria-hidden="true">
    <button type="button" class="bec-attachment-popup-close absolute left-4 top-4 z-[2] inline-flex h-12 w-12 items-center justify-center rounded-full border-0 p-0 text-xl transition hover:bg-white/18 active:scale-95" aria-label="{{ $t('chatify.Cancel', 'Cancel') }}">
        <i class="fas fa-times"></i>
    </button>

    <div class="bec-attachment-popup-stage flex w-full items-center justify-center px-0 py-16 sm:px-8">
        <div class="bec-attachment-popup-preview flex h-full w-full items-center justify-center">
            <img class="bec-attachment-popup-image hidden" alt="{{ $t('chatify.AttachmentPreview', 'Attachment preview') }}">
            <video class="bec-attachment-popup-video hidden" controls playsinline preload="metadata"></video>

            <div class="bec-attachment-popup-file flex items-center gap-4 rounded-[1.5rem] p-5">
                <span class="bec-attachment-popup-icon inline-flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-white/12 text-white">
                    <i class="fas fa-file text-xl"></i>
                </span>
                <span class="min-w-0 flex-1">
                    <span class="bec-attachment-popup-name block truncate text-base font-extrabold text-white"></span>
                    <span class="bec-attachment-popup-meta mt-1 block truncate text-xs font-bold text-white/60"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="bec-attachment-popup-footer absolute inset-x-0 bottom-0 z-[2] px-4 pb-4 pt-12">
        <div class="mx-auto flex w-full max-w-[34rem] items-center gap-3">
            <label class="bec-attachment-popup-caption-wrap flex min-h-12 min-w-0 flex-1 items-center rounded-full px-4 py-2">
                <textarea class="bec-attachment-popup-caption block max-h-24 min-h-8 min-w-0 flex-1 resize-none border-0 bg-transparent px-0 py-1 text-[16px] font-medium leading-6 text-white outline-none placeholder:text-white/75" rows="1" placeholder="{{ $t('chatify.AddACaption', 'Add a caption...') }}"></textarea>
            </label>
        </div>

        <div class="mx-auto mt-4 flex w-full max-w-[34rem] items-center justify-between gap-3">
            <span class="bec-attachment-popup-recipient min-w-0 max-w-[70%] truncate rounded-xl bg-white/12 px-3 py-2 text-sm font-bold text-white shadow-[0_10px_24px_rgba(0,0,0,.22)]"></span>
            <button type="button" class="bec-attachment-popup-send inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-full border-0 bg-[#22C55E] p-0 text-xl text-black transition hover:bg-[#34D36A] active:scale-95" aria-label="{{ $t('chatify.Send', 'Send') }}">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<div class="app-modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="delete" style="display: none;">
    <div class="app-modal-container w-full max-w-[28rem]">
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 text-center shadow-[0_24px_70px_rgba(15,23,42,.16)] dark:border-white/10 dark:bg-slate-900 dark:text-slate-100 dark:shadow-[0_24px_70px_rgba(0,0,0,.35)]" data-name="delete" data-modal="0">
            <div class="app-modal-header text-xl font-bold tracking-[-.02em] text-slate-950 dark:text-slate-50">{{ $t('chatify.Are you sure you want to delete this?', 'Are you sure you want to delete this?') }}</div>
            <div class="app-modal-body mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">{{ $t('chatify.You can not undo this action', 'You can not undo this action') }}</div>
            <div class="app-modal-footer mt-6 flex justify-center gap-3">
                <a href="javascript:void(0)" class="app-btn cancel inline-flex h-11 min-w-28 items-center justify-center rounded-2xl border border-slate-900/10 bg-white px-5 text-sm font-bold text-slate-700 no-underline transition hover:bg-slate-50 dark:border-white/10 dark:bg-slate-900 dark:text-slate-200">{{ $t('chatify.Cancel', 'Cancel') }}</a>
                <a href="javascript:void(0)" class="app-btn delete inline-flex h-11 min-w-28 items-center justify-center rounded-2xl bg-red-500 px-5 text-sm font-bold text-white no-underline shadow-[0_12px_24px_rgba(239,68,68,.22)] transition hover:bg-red-600">{{ $t('chatify.Delete', 'Delete') }}</a>
            </div>
        </div>
    </div>
</div>

<div class="app-modal modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="block" style="display: none;">
    <div class="app-modal-container relative w-full max-w-[32rem]">
        <button class="close_alert absolute -right-3 -top-3 flex h-10 w-10 items-center justify-center rounded-full bg-white text-slate-600 shadow-[0_12px_28px_rgba(0,0,0,.18)] dark:border dark:border-white/10 dark:bg-slate-900 dark:text-slate-200" type="button">
            <i class="fas fa-times" aria-hidden="true"></i>
        </button>
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 shadow-[0_24px_70px_rgba(15,23,42,.16)] dark:border-white/10 dark:bg-slate-900 dark:text-slate-100 dark:shadow-[0_24px_70px_rgba(0,0,0,.35)]" data-name="block" data-modal="0">
            <div class="app-modal-header block_header mb-4 text-lg font-bold tracking-[-.02em] text-slate-950 dark:text-slate-50">
                {{ $t('chatify.Please check users you want to block', 'Please check users you want to block') }}
            </div>
            <div class="app-modal-body">
                <form>
                    <div id="blockUsersFromGroup">
                        <div class="user_list space-y-2"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="app-modal fixed inset-0 z-[9998] items-center justify-center bg-slate-950/45 p-4 backdrop-blur-sm" data-name="alert" style="display: none;">
    <div class="app-modal-container w-full max-w-[28rem]">
        <div class="app-modal-card rounded-[1.75rem] border border-slate-900/5 bg-white p-6 text-center shadow-[0_24px_70px_rgba(15,23,42,.16)] dark:border-white/10 dark:bg-slate-900 dark:text-slate-100 dark:shadow-[0_24px_70px_rgba(0,0,0,.35)]" data-name="alert" data-modal="0">
            <div class="app-modal-header text-xl font-bold tracking-[-.02em] text-slate-950 dark:text-slate-50"></div>
            <div class="app-modal-body mt-2 text-sm font-medium text-slate-500 dark:text-slate-400"></div>
            <div class="app-modal-footer mt-6 flex justify-center">
                <a href="javascript:void(0)" class="app-btn cancel inline-flex h-11 min-w-28 items-center justify-center rounded-2xl bg-gradient-to-br from-[#6D4CFF] to-[#4F35D8] px-5 text-sm font-bold text-white no-underline shadow-[0_12px_24px_rgba(91,63,234,.24)]">{{ $t('chatify.Cancel', 'Cancel') }}</a>
            </div>
        </div>
    </div>
</div>

<script src="https://js.pusher.com/8.3.0/pusher.min.js"></script>

<script id="chatify-dynamic-config">
    window.chatify = {
        sounds: {!! json_encode(config('chatify.sounds')) !!},
        allowedImages: {!! json_encode(config('chatify.attachments.allowed_images')) !!},
        allowedFiles: {!! json_encode(config('chatify.attachments.allowed_files')) !!},
        maxUploadSize: {{ Chatify::getMaxUploadSize() }},
        pusher: {!! json_encode(config('chatify.pusher')) !!},
        pusherAuthEndpoint: '{{ route("admin.support-chat.pusher.auth") }}',
        studentDashboardUrl: @json(route('student.dashboard'))
    };
    window.chatify.allAllowedExtensions = chatify.allowedImages.concat(chatify.allowedFiles);
    window.chatifyLabels = {
        online: @json($t('chatify.Online', 'Online')),
        offline: @json($t('chatify.Offline', 'Offline')),
        playAudio: @json($t('chatify.PlayAudio', 'Play audio')),
        pauseAudio: @json($t('chatify.PauseAudio', 'Pause audio')),
        recipient: @json($t('chatify.Recipient', 'Recipient')),
        attachments: {
            image: @json($t('chatify.Image', 'Image')),
            video: @json($t('chatify.Video', 'Video')),
            audio: @json($t('chatify.Audio', 'Audio')),
            pdf: @json($t('chatify.PDF', 'PDF')),
            document: @json($t('chatify.Document', 'Document')),
            spreadsheet: @json($t('chatify.Spreadsheet', 'Spreadsheet')),
            file: @json($t('chatify.File', 'File')),
        },
    };
</script>
<script>
    /**
     * changes date string to time ago string.
     * @param dateString - The date string to convert to a time ago string.
     * @returns A string that tells the user how long ago the date was.
     */
    function dateStringToTimeAgo(dateString) {
        const now = new Date();
        const date = new Date(dateString);
        const seconds = Math.floor((now - date) / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        const days = Math.floor(hours / 24);
        const weeks = Math.floor(days / 7);
        if (seconds < 60) {
            return "just now";
        } else if (minutes < 60) {
            return `${minutes}m ago`;
        } else if (hours < 24) {
            return `${hours}h ago`;
        } else if (days < 7) {
            return `${days}d ago`;
        } else {
            return `${weeks}w ago`;
        }
    }
    /**
     * It returns a function that, when invoked, will wait for a specified amount of time before executing
     * the original function.
     * @param callback - The function to be executed after the delay.
     * @param delay - The amount of time to wait before calling the callback.
     * @returns A function that will call the callback function after a delay.
     */
    function debounce(callback, delay) {
        let timerId;
        return function (...args) {
            clearTimeout(timerId);
            timerId = setTimeout(() => {
                callback.apply(this, args);
            }, delay);
        };
    }
    /**
     *-------------------------------------------------------------
     * Global variables
     *-------------------------------------------------------------
     */
    var messenger,
        typingTimeout,
        typingNow = 0,
        temporaryMsgId = 0,
        messages_page = 1;

    const messagesContainer = $(".messenger-messagingView .m-body"),
        messengerTitleDefault = $(".messenger-headTitle").text(),
        messageInput = $("#message-form .m-send"),
        messageForm = $("#message-form"),
        startRecordingBtn = document.getElementById('startRecordingBtn'),
        sendButton = document.querySelector(".send-button"),
        auth_id = $("meta[name=url]").attr("data-user"),
        url = $("meta[name=url]").attr("content"),
        studentDashboardUrl = window.chatify?.studentDashboardUrl || "",
        csrfToken = $('meta[name="csrf-token"]').attr("content"),
        body=$("body "),
        deleteConversationButton=$(".messenger-infoView-btns .delete-conversation" ),
        blockUserButton=$(".messenger-infoView-btns .block-user" ),
        blockUsersFromGroupButton=$(".messenger-infoView-btns .block-users-from-group" );

    const btnGetStudentsDetails = document.getElementById("btnGetStudentsDetails");
    const overviewSection = document.getElementById("overviewSection");

    const getMessengerId = () => $("meta[name=id]").attr("content");
    const setMessengerId = (id) => $("meta[name=id]").attr("content", id);

    function getStudentDetails(userId) {
        if (!userId || !overviewSection) return;

        btnGetStudentsDetails?.setAttribute("disabled", "disabled");

        fetch(`/admin/student/studentDetails/${encodeURIComponent(userId)}`)
            .then((response) => {
                if (!response.ok) throw new Error("Network response was not ok");
                return response.text();
            })
            .then((data) => {
                overviewSection.innerHTML = data;
            })
            .catch((error) => {
                console.error("Error loading student overview:", error);
            })
            .finally(() => {
                btnGetStudentsDetails?.removeAttribute("disabled");
            });
    }

    btnGetStudentsDetails?.addEventListener("click", function () {
        getStudentDetails(this.dataset.userId);
    });

    function hidePageLoadingOverlay() {
        const overlay = document.getElementById("page-loading-overlay");

        if (!overlay) return;

        overlay.classList.add("hidden");
        overlay.classList.remove("grid");
        overlay.setAttribute("aria-hidden", "true");
    }

    /**
     *-------------------------------------------------------------
     * Pusher initialization
     *-------------------------------------------------------------
     */
    Pusher.logToConsole = chatify.pusher.debug;
    const pusher = window.chatifyPusher || new Pusher(chatify.pusher.key, {
        encrypted: chatify.pusher.options.encrypted,
        cluster: chatify.pusher.options.cluster,
        wsHost: chatify.pusher.options.host,
        wsPort: chatify.pusher.options.port,
        wssPort: chatify.pusher.options.port,
        forceTLS: chatify.pusher.options.useTLS,
        authEndpoint: chatify.pusherAuthEndpoint,
        auth: {
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        },
    });
    window.chatifyPusher = pusher;
    /**
     *-------------------------------------------------------------
     * Re-usable methods
     *-------------------------------------------------------------
     */
    const escapeHtml = (unsafe) => {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;");
    };
    const messageUrlRegex = /\b(?:https?|ftp):\/\/[-A-Z0-9+&@#/%?=~_|!:,.;]*[-A-Z0-9+&@#/%=~_|]/gi;
    const linkifyMessageText = (message) => {
        messageUrlRegex.lastIndex = 0;

        return escapeHtml(String(message || "").trim())
            .replace(messageUrlRegex, (url) => `<a href="${url}" target="_blank" rel="noopener noreferrer">${url}</a>`)
            .replace(/\n/g, "<br>");
    };
    function createMessageLink(url) {
        const link = document.createElement("a");

        link.href = url;
        link.textContent = url;
        link.target = "_blank";
        link.rel = "noopener noreferrer";

        return link;
    }
    function setMessageLinkTarget(link) {
        link.target = "_blank";
        link.rel = "noopener noreferrer";
    }
    function linkifyMessageElement(element) {
        if (!element) return;

        element.querySelectorAll("a").forEach(setMessageLinkTarget);

        const textNodes = [];
        const walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, {
            acceptNode(node) {
                if (!node.nodeValue || node.parentElement?.closest("a, script, style, textarea")) {
                    return NodeFilter.FILTER_REJECT;
                }

                messageUrlRegex.lastIndex = 0;

                return messageUrlRegex.test(node.nodeValue)
                    ? NodeFilter.FILTER_ACCEPT
                    : NodeFilter.FILTER_REJECT;
            },
        });
        let node = walker.nextNode();

        while (node) {
            textNodes.push(node);
            node = walker.nextNode();
        }

        textNodes.forEach((textNode) => {
            const text = textNode.nodeValue;
            const fragment = document.createDocumentFragment();
            let lastIndex = 0;

            messageUrlRegex.lastIndex = 0;
            text.replace(messageUrlRegex, (url, offset) => {
                if (offset > lastIndex) {
                    fragment.append(document.createTextNode(text.slice(lastIndex, offset)));
                }

                fragment.append(createMessageLink(url));
                lastIndex = offset + url.length;

                return url;
            });

            if (lastIndex < text.length) {
                fragment.append(document.createTextNode(text.slice(lastIndex)));
            }

            textNode.parentNode.replaceChild(fragment, textNode);
        });
    }
    function applyLinkifiedMessages(root = document) {
        if (root.matches?.(".message_content")) {
            linkifyMessageElement(root);
        }

        root.querySelectorAll?.(".message_content").forEach(linkifyMessageElement);
    }
    function actionOnScroll(selector, callback, topScroll = false) {
        $(selector).on("scroll", function () {
            let element = $(this).get(0);
            const condition = topScroll
                ? element.scrollTop <= 1
                : element.scrollTop + element.clientHeight >= element.scrollHeight - 2;
            if (condition) {
                callback();
            }
        });
    }
    function routerPush(title, url) {
        $("meta[name=url]").attr("content", url);
        return window.history.pushState({}, title || document.title, url);
    }
    function conversationListCount() {
        return $(".listOfContacts").find(".messenger-list-item").length;
    }
    function shouldReturnToStudentDashboard() {
        return Boolean(studentDashboardUrl) && conversationListCount() <= 1;
    }
    function returnToStudentDashboard() {
        window.location.assign(studentDashboardUrl);
    }
    function updateSelectedContact(user_id) {
        $(document).find(".messenger-list-item").removeClass("m-list-active");
        getConversationListItem(user_id || getMessengerId()).addClass("m-list-active");
    }
    function getConversationListItem(user_id = getMessengerId()) {
        const contactId = user_id || getMessengerId();

        return $(".messenger-list-item").filter(function () {
            return String($(this).attr("data-contact")) === String(contactId);
        });
    }
    function clearConversationUnreadCounter(user_id = getMessengerId()) {
        if (!user_id) {
            return;
        }

        getConversationListItem(user_id).find("b").remove();
    }
    /**
     *-------------------------------------------------------------
     * Global Templates
     *-------------------------------------------------------------
     */
// Loading svg
    function loadingSVG(size = "25px", className = "", style = "") {
        return `
<svg style="${style}" class="loadingSVG ${className}" xmlns="http://www.w3.org/2000/svg" width="${size}" height="${size}" viewBox="0 0 40 40" stroke="#ffffff">
<g fill="none" fill-rule="evenodd">
<g transform="translate(2 2)" stroke-width="3">
<circle stroke-opacity=".1" cx="18" cy="18" r="18"></circle>
<path d="M36 18c0-9.94-8.06-18-18-18" transform="rotate(349.311 18 18)">
<animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur=".8s" repeatCount="indefinite"></animateTransform>
</path>
</g>
</g>
</svg>
`;
    }
    function loadingWithContainer(className) {
        return `<div class="${className}" style="text-align:center;padding:15px">${loadingSVG(
            "25px",
            "",
            "margin:auto"
        )}</div>`;
    }

    // loading placeholder for users list item
    function listItemLoading(items) {
        let template = "";
        for (let i = 0; i < items; i++) {
            template += `
<div class="loadingPlaceholder">
<div class="loadingPlaceholder-wrapper">
<div class="loadingPlaceholder-body">
<table class="loadingPlaceholder-header">
<tr>
<td style="width: 45px;"><div class="loadingPlaceholder-avatar"></div></td>
<td>
<div class="loadingPlaceholder-name"></div>
<div class="loadingPlaceholder-date"></div>
</td>
</tr>
</table>
</div>
</div>
</div>
`;
        }
        return template;
    }

    // loading placeholder for avatars
    function avatarLoading(items) {
        let template = "";
        for (let i = 0; i < items; i++) {
            template += `
<div class="loadingPlaceholder">
<div class="loadingPlaceholder-wrapper">
<div class="loadingPlaceholder-body">
<table class="loadingPlaceholder-header">
<tr>
<td style="width: 45px;">
<div class="loadingPlaceholder-avatar" style="margin: 2px;"></div>
</td>
</tr>
</table>
</div>
</div>
</div>
`;
        }
        return template;
    }

    // While sending a message, show this temporary message card.
    function sendTempMessageCard(message, id, extraHtml = "") {
        const messageHtml = linkifyMessageText(message);

        return `
 <div class="message-card mc-sender" data-id="${id}">
     <div class="message-card-content">
         <div class="message">
             ${messageHtml}
             ${extraHtml}
             <sub>
                 <span class="far fa-clock"></span>
             </sub>
         </div>
     </div>
 </div>
`;
    }
    // upload image preview card.
    function attachmentTemplate(fileType, fileName, imgURL = null) {
        if (fileType != "image") {
            return (
                `
 <div class="attachment-preview">
     <span class="fas fa-times cancel"></span>
     <p style="padding:0px 30px;"><span class="fas fa-file"></span> ` +
                escapeHtml(fileName) +
                `</p>
 </div>
`
            );
        } else {
            return (
                `
<div class="attachment-preview">
 <span class="fas fa-times cancel"></span>
 <div class="image-file chat-image" style="background-image: url('${ imgURL}');"></div>
 <p><span class="fas fa-file-image"></span> ` +
                escapeHtml(fileName) +
                `</p>
</div>
`
            );
        }
    }

    // Active Status Circle
    function activeStatusCircle() {
        return `<span class="activeStatus"></span>`;
    }

    /**
     *-------------------------------------------------------------
     * Css Media Queries [For responsive design]
     *-------------------------------------------------------------
     */
    $(window).resize(function () {
        cssMediaQueries();
    });
    function cssMediaQueries() {
        if (window.matchMedia("(min-width: 980px)").matches) {
            $(".messenger-listView").removeAttr("style");
        }
        if (window.matchMedia("(max-width: 980px)").matches) {
            body.find(".messenger-list-item")
                .find("tr[data-action]")
                .attr("data-action", "1");

            body.find(".admin-list-item").find("div").attr("data-action", "1");
        } else {
            body
                .find(".messenger-list-item")
                .find("tr[data-action]")
                .attr("data-action", "0");

            body.find(".admin-list-item").find("div").attr("data-action", "0");
        }
    }

    /**
     *-------------------------------------------------------------
     * App Modal
     *-------------------------------------------------------------
     */
    let app_modal = function ({
                                  show = true,
                                  name,
                                  data = 0,
                                  buttons = true,
                                  header = null,
                                  body = null,
                              }) {
        const modal = $(".app-modal[data-name=" + name + "]");
        // header
        if(header){
            modal.find(".app-modal-header").html(header)
        }
        // header ? modal.find(".app-modal-header").html(header) : "";

        // body
        if(body){
            modal.find(".app-modal-body").html(body)
        }
        // body ? modal.find(".app-modal-body").html(body) : "";

        // buttons
        buttons == true
            ? modal.find(".app-modal-footer").show()
            : modal.find(".app-modal-footer").hide();

        // show / hide
        if (show == true) {
            modal.show();
            $(".app-modal-card[data-name=" + name + "]").addClass("app-show-modal");
            $(".app-modal-card[data-name=" + name + "]").attr("data-modal", data);
        } else {
            modal.hide();
            $(".app-modal-card[data-name=" + name + "]").removeClass("app-show-modal");
            $(".app-modal-card[data-name=" + name + "]").attr("data-modal", data);
        }
    };

    /**
     *-------------------------------------------------------------
     * Slide to bottom on [action] - e.g. [message received, sent, loaded]
     *-------------------------------------------------------------
     */
    function scrollToBottom(container) {
        $(container)
            .stop()
            .animate({
                scrollTop: $(container)[0].scrollHeight,
            });
    }

    /**
     *-------------------------------------------------------------
     * click and drag to scroll - function
     *-------------------------------------------------------------
     */
    function hScroller(scroller) {
        const slider = document.querySelector(scroller);
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener("mousedown", (e) => {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener("mouseleave", () => {
            isDown = false;
        });
        slider.addEventListener("mouseup", () => {
            isDown = false;
        });
        slider.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1;
            slider.scrollLeft = scrollLeft - walk;
        });
    }

    /**
     *-------------------------------------------------------------
     * Disable/enable message form fields, messaging container...
     * on load info or if needed elsewhere.
     *
     * Default : true
     *-------------------------------------------------------------
     */
    function disableOnLoad(disable = true) {
        if (disable) {
            // hide send card
            $(".messenger-sendCard").hide();
            // add loading opacity to messages container
            messagesContainer.css("opacity", ".5");
            // disable message form fields
            messageInput.attr("readonly", "readonly");
            $("#message-form button").attr("disabled", "disabled");
            $(".upload-attachment").attr("disabled", "disabled");
        } else {

            // show send card
            $(".messenger-sendCard").show();
            // remove loading opacity to messages container
            messagesContainer.css("opacity", "1");
            // enable message form fields
            messageInput.removeAttr("readonly");
            $("#message-form button").removeAttr("disabled");
            $(".upload-attachment").removeAttr("disabled");
        }
    }

    /**
     *-------------------------------------------------------------
     * Error message card
     *-------------------------------------------------------------
     */
    function errorMessageCard(id) {
        messagesContainer
            .find(".message-card[data-id=" + id + "]")
            .addClass("mc-error");
        messagesContainer
            .find(".message-card[data-id=" + id + "]")
            .find("svg.loadingSVG")
            .remove();
        messagesContainer
            .find(".message-card[data-id=" + id + "] p")
            .prepend('<span class="fas fa-exclamation-triangle"></span>');
    }

    /**
     *-------------------------------------------------------------
     * Fetch id data (user/group) and update the view
     *-------------------------------------------------------------
     */
    function IDinfo(id) {
        // clear temporary message id
        temporaryMsgId = 0;
        // clear typing now
        typingNow = 0;
        // show loading bar
        NProgress.start();
        // disable message form
        disableOnLoad();
        if (messenger != 0) {
            // get shared photos
            getSharedPhotos(id);
            // Get info
            $.ajax({
                url: url + "/idInfo",
                method: "POST",
                data: { _token: csrfToken, id },
                dataType: "JSON",
                success: (data) => {
                    if (!data?.fetch) {
                        hidePageLoadingOverlay();
                        NProgress.done();
                        NProgress.remove();
                        return;
                    }
                    // avatar photo
                    $(".messenger-infoView")
                        .find(".avatar")
                        .css("background-image", 'url("' + data.user_avatar + '")');
                    $(".header-avatar").css(
                        "background-image",
                        'url("' + data.user_avatar + '")'
                    );
                    // Show shared and actions
                    const studentUserId = !String(id).includes("-") ? data.fetch.id : "";
                    if (btnGetStudentsDetails) {
                        btnGetStudentsDetails.dataset.userId = studentUserId || "";
                        btnGetStudentsDetails.classList.toggle("hidden", !studentUserId);
                    }
                    if (overviewSection) overviewSection.innerHTML = "";

                    if(data.canBlock||data.canDelete){
                        $(".messenger-infoView-collapse").removeClass("d-none");
                    }else{
                        $(".messenger-infoView-collapse").addClass("d-none");
                    }

                    if(data.canDelete) {
                        deleteConversationButton.removeClass("d-none");
                    }else{
                        deleteConversationButton.addClass("d-none");
                    }
                    blockUserButton.addClass("d-none");
                    blockUsersFromGroupButton.addClass("d-none");
                    if(data.canBlock ){
                        if(getMessengerId().includes("-")){
                            blockUsersFromGroupButton.removeClass("d-none");
                        }else{
                            blockUserButton.removeClass("d-none");
                        }
                    }
                    if(data.cantTalk){
                        messageForm.hide();
                    }else{
                        messageForm.show()
                    }
                    blockUserButton.html(data.message)
                    $(".messenger-infoView-shared").show();
                    // fetch messages
                    fetchMessages(id, true);
                    // focus on messaging input
                    messageInput.focus();
                    // update info in view
                    $(".messenger-infoView .info-name").text(data.fetch.name);
                    $(".m-header-messaging .user-name").text(data.fetch.name);
                    hidePageLoadingOverlay();

                    // form reset and focus
                    messageForm.trigger("reset");
                    cancelAttachment();
                    messageInput.focus();
                },
                error: () => {
                    console.error("Couldn't fetch user data!");
                    hidePageLoadingOverlay();
                    // remove loading bar
                    NProgress.done();
                    NProgress.remove();
                },
            });
        } else {
            hidePageLoadingOverlay();
            // remove loading bar
            NProgress.done();
            NProgress.remove();
        }
    }

    /**
     *-------------------------------------------------------------
     * Send message function
     *-------------------------------------------------------------
     */
    function sendMessage(audio=null) {
        temporaryMsgId += 1;
        let tempID = `temp_${temporaryMsgId}`;
        let hasFile = !!$(".upload-attachment").val();
        const inputValue = $.trim(messageInput.val());
        if (inputValue.length > 0 || hasFile || audio) {
            const formData = new FormData(messageForm[0]);
            formData.append("id", getMessengerId());
            formData.append("temporaryMsgId", tempID);
            formData.append("_token", csrfToken);
            formData.append("audio", audio);
            $.ajax({
                url: messageForm.attr("action"),
                method: "POST",
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                beforeSend: () => {
                    // remove message hint
                    $(".messages").find(".message-hint").hide();
                    // append a temporary message card
                    if (hasFile) {
                        messagesContainer
                            .find(".messages")
                            .append(
                                sendTempMessageCard(
                                    inputValue,
                                    tempID,
                                    loadingSVG("28px")
                                )
                            );
                    } else {
                        messagesContainer
                            .find(".messages")
                            .append(sendTempMessageCard(inputValue, tempID));
                    }
                    // scroll to bottom
                    scrollToBottom(messagesContainer);
                    messageInput.css({ height: "42px" });
                    // form reset and focus
                    messageForm.trigger("reset");
                    cancelAttachment();
                    messageInput.focus();
                },
                success: (data) => {
                    if (data.error > 0) {
                        // message card error status
                        errorMessageCard(tempID);
                    } else {
                        // update contact item
                        updateContactItem(getMessengerId());
                        // temporary message card
                        const tempMsgCardElement = messagesContainer.find(
                            `.message-card[data-id=${data.tempID}]`
                        );
                        const sentMessageElement = $(data.message);
                        sentMessageElement.each(function () {
                            applyLinkifiedMessages(this);
                        });
                        const registeredMessageExists = Boolean(data.message_id) &&
                            messagesContainer.find(".message-card").filter(function () {
                                return String($(this).attr("data-id")) === String(data.message_id);
                            }).length > 0;

                        // Pusher can deliver the saved message before this request finishes.
                        // Only insert the response card when that message is not already shown.
                        if (!registeredMessageExists) {
                            tempMsgCardElement.before(sentMessageElement);
                        }
                        // then, remove the temporary message card
                        tempMsgCardElement.remove();
                        // scroll to bottom
                        scrollToBottom(messagesContainer);
                        // send contact item updates
                        sendContactItemUpdates(true);


                        //new change
                        startRecordingBtn.classList.remove("d-none");
                        sendButton.classList.add("d-none");
                    }
                },
                error: () => {
                    // message card error status
                    errorMessageCard(tempID);
                    // error log
                    console.error(
                        "Failed sending the message! Please, check your server response."
                    );
                },
            });
        }
        return false;
    }

    /**
     *-------------------------------------------------------------
     * Fetch messages from database
     *-------------------------------------------------------------
     */
    let messagesPage = 1;
    let noMoreMessages = false;
    let messagesLoading = false;
    function setMessagesLoading(loading = false) {
        if (!loading) {
            messagesContainer.find(".messages").find(".loading-messages").remove();
            NProgress.done();
            NProgress.remove();
        } else {
            messagesContainer
                .find(".messages")
                .prepend(loadingWithContainer("loading-messages"));
        }
        messagesLoading = loading;
    }
    function fetchMessages(id, newFetch = false) {
        if (newFetch) {
            messagesPage = 1;
            noMoreMessages = false;
        }
        if (messenger != 0 && !noMoreMessages && !messagesLoading) {
            const messagesElement = messagesContainer.find(".messages");
            setMessagesLoading(true);
            $.ajax({
                url: url + "/fetchMessages",
                method: "POST",
                data: {
                    _token: csrfToken,
                    id: id,
                    page: messagesPage,
                },
                dataType: "JSON",
                success: (data) => {
                    setMessagesLoading(false);
                    if (messagesPage == 1) {
                        messagesElement.html(data.messages);
                        applyLinkifiedMessages(messagesElement.get(0));
                        let unseenMessages=document.querySelectorAll('.message-card.seen-0');
                        if(unseenMessages.length){
                            const newMessagesDiv = document.createElement('div');

                            messagesContainer.scrollTop=unseenMessages[0].top;
                            unseenMessages.forEach(card => {
                                card.classList.remove('seen-0');
                            });


                            newMessagesDiv.className = 'new-messages';
                            newMessagesDiv.textContent = data.newMessages;
                            unseenMessages[0].parentNode.insertBefore(newMessagesDiv, unseenMessages[0]);
                            setTimeout(() => {
                                newMessagesDiv.remove();
                            }, 3000);
                        }else{
                            scrollToBottom(messagesContainer);
                        }
                    } else {
                        const lastMsg = messagesElement.find(
                            messagesElement.find(".message-card")[0]
                        );
                        const curOffset =
                            lastMsg.offset().top - messagesContainer.scrollTop();
                        messagesElement.prepend(data.messages);
                        applyLinkifiedMessages(messagesElement.get(0));
                        messagesContainer.scrollTop(lastMsg.offset().top - curOffset);
                    }
                    // trigger seen event
                    makeSeen(true);
                    // Pagination lock & messages page
                    noMoreMessages = messagesPage >= data?.last_page;
                    if (!noMoreMessages) messagesPage += 1;
                    // Enable message form if messenger not = 0; means if data is valid
                    if (messenger != 0) {
                        disableOnLoad(false);
                    }
                },
                error: (error) => {
                    setMessagesLoading(false);
                    console.error(error);
                },
            });
        }
    }

    /**
     *-------------------------------------------------------------
     * Cancel file attached in the message.
     *-------------------------------------------------------------
     */
    function cancelAttachment() {
        $(".messenger-sendCard").find(".attachment-preview").remove();
        $(".upload-attachment").replaceWith(
            $(".upload-attachment").val("").clone(true)
        );
    }

    /**
     *-------------------------------------------------------------
     * Pusher channels and event listening..
     *-------------------------------------------------------------
     */

        // subscribe to the channel
    const channelName = "private-chatify";
    var channel = pusher.subscribe(`${channelName}.${auth_id}`),
        clientSendChannel,
        clientListenChannel,groupListenChannel,groupSendChannel;
    if(getMessengerId()&&getMessengerId().includes("-")) {
        groupSendChannel = pusher.subscribe(`${channelName}.${getMessengerId()}`);
        if(groupSendChannel){
            groupSendChannel.bind("client-typing", clientTypingEvent);
            groupSendChannel.bind("client-deleteConversation", deleteConversationEvent);
            groupSendChannel.bind("messaging", messagingEvent);
            groupSendChannel.bind("client-seen", clientSeenEvent);
            groupSendChannel.bind("client-messageDelete", deleteMessageEvent);
            groupSendChannel.bind("client-blockUser", blockUserEvent);
        }
    }

    function initClientChannel() {
        if (getMessengerId()) {
            clientSendChannel = pusher.subscribe(`${channelName}.${getMessengerId()}`);
            clientListenChannel = pusher.subscribe(`${channelName}.${auth_id}`);
            /*if(getMessengerId().includes("-")){
              groupSendChannel = pusher.subscribe(`${channelName}.${getMessengerId()}`);
              if(groupSendChannel){
                groupSendChannel.bind("client-typing", clientTypingEvent);
                groupSendChannel.bind("client-deleteConversation", deleteConversationEvent);
                groupSendChannel.bind("messaging", messagingEvent);
                groupSendChannel.bind("client-seen", clientSeenEvent);
                groupSendChannel.bind("client-messageDelete", deleteMessageEvent);
                groupSendChannel.bind("client-blockUser", blockUserEvent);
              }
            }*/

        }
        const groups=JSON.parse($("meta[name=groups]").attr("content"));
        const courses=JSON.parse($("meta[name=courses]").attr("content"));
        for(let i=0;i<groups.length; i++ ){
            groupListenChannel = pusher.subscribe(`${channelName}.group-${groups[i]}`);
            groupListenChannel.bind("client-contactItem", clientUpdateContactItem);
        }
        for(let j=0;j<courses.length; j++ ){
            groupListenChannel = pusher.subscribe(`${channelName}.course-${courses[j]}`);
            groupListenChannel.bind("client-contactItem", clientUpdateContactItem);
        }
    }
    initClientChannel();

    // Listen to messages, and append if data received
    function messagingEvent(data) {
        if ((data.from_id == getMessengerId() && data.to_id == auth_id)||
            (data.model_type==getMessengerId().substring(0,getMessengerId().lastIndexOf('-'))&&
                data.model_id==getMessengerId().slice(getMessengerId().lastIndexOf('-') + 1) &&
                data.from_id != auth_id)
        ) {
            const incomingMessage = $(data.message);
            incomingMessage.each(function () {
                applyLinkifiedMessages(this);
            });

            $(".messages").find(".message-hint").remove();
            messagesContainer.find(".messages").append(incomingMessage);
            scrollToBottom(messagesContainer);
            makeSeen(true);
            clearConversationUnreadCounter();
            playNotificationSound("new_message",true);
        }

    }
    channel.bind("messaging", messagingEvent);

    function supportSentMessageEvent(data) {
        if (
            data.from_id == auth_id &&
            data.to_id == getMessengerId() &&
            !messagesContainer.find(`.message-card[data-id=${data.message_id}]`).length
        ) {
            const sentMessage = $(data.message);
            sentMessage.each(function () {
                applyLinkifiedMessages(this);
            });

            $(".messages").find(".message-hint").remove();
            messagesContainer.find(".messages").append(sentMessage);
            scrollToBottom(messagesContainer);
            updateContactItem(getMessengerId());
        }
    }
    channel.bind("support-sent-message", supportSentMessageEvent);

    // listen to typing indicator
    function clientTypingEvent (data) {
        if ((data.from_id == getMessengerId() && data.to_id == auth_id)||
            (data.to_id.includes("-") && data.to_id ==getMessengerId())) {
            data.typing == true
                ? messagesContainer.find(".typing-indicator").show()
                : messagesContainer.find(".typing-indicator").hide();
        }
        // scroll to bottom
        scrollToBottom(messagesContainer);
    }
    clientListenChannel.bind("client-typing", clientTypingEvent);
    // listen to contact item updates event
    function clientUpdateContactItem (data) {
        // let modelId=data.to.slice(data.to.lastIndexOf('-') + 1)??null;
        // let modelType=data.to.substring(0,data.to.lastIndexOf('-'))??null;
        if(data.to.includes('-')){
            updateContactItem(data.to);
        }
        //user is receiver or is in group
        if (data.to == auth_id ) {
            if (data.update) {
                updateContactItem(data.from);
            } else {
                console.error("Can not update contact item!");
            }
        }
    }
    clientListenChannel.bind("client-contactItem", clientUpdateContactItem);

    // listen to seen event
    function clientSeenEvent(data) {
        if ((data.from_id == getMessengerId() && data.to_id == auth_id)||
            (data.to_id.includes("-") && data.to_id==getMessengerId())) {
            if (data.seen == true) {
                $(".message-time")
                    .find(".fa-check")
                    .before('<span class="fas fa-check-double seen"></span> ');
                $(".message-time").find(".fa-check").remove();
            }
        }
    }
    clientListenChannel.bind("client-seen", clientSeenEvent);



    // listen on message delete event
    function deleteMessageEvent(data) {
        body.find(`.message-card[data-id=${data.id}]`).remove();
    }
    clientListenChannel.bind("client-messageDelete", deleteMessageEvent);

    // listen on delete conversation event
    function deleteConversationEvent(data) {
        if (data.from == getMessengerId() && data.to == auth_id) {
            body.find(`.messages`).html("");
            $(".messages").find(".message-hint").show();
        }
    }
    function blockUserEvent(data) {
        IDinfo(data.from_id);
    }
    clientListenChannel.bind("client-deleteConversation", deleteConversationEvent);

    clientListenChannel.bind("client-blockUser", blockUserEvent);

    // -------------------------------------
    // presence channel [User Active Status]
    var activeStatusChannel = pusher.subscribe("presence-activeStatus");

    // Joined
    activeStatusChannel.bind("pusher:member_added", function (member) {
        setActiveStatus(1);
        $(".messenger-list-item[data-contact=" + member.id + "]")
            .find(".activeStatus")
            .remove();
        $(".messenger-list-item[data-contact=" + member.id + "]")
            .find(".avatar")
            .before(activeStatusCircle());
    });

    // Leaved
    activeStatusChannel.bind("pusher:member_removed", function (member) {
        setActiveStatus(0);
        $(".messenger-list-item[data-contact=" + member.id + "]")
            .find(".activeStatus")
            .remove();
    });

    function handleVisibilityChange() {
        if (!document.hidden) {
            makeSeen(true);
        }
    }

    document.addEventListener("visibilitychange", handleVisibilityChange, false);

    /**
     *-------------------------------------------------------------
     * Trigger typing event
     *-------------------------------------------------------------
     */
    function isTyping(status) {
        return clientSendChannel.trigger("client-typing", {
            from_id: auth_id, // Me
            to_id: getMessengerId(), // Messenger
            typing: status,
        });
    }
    function isTypingToGroup(status) {
        return groupSendChannel.trigger("client-typing", {
            from_id: auth_id, // Me
            to_id: getMessengerId(), // Messenger
            typing: status,
        });
    }

    /**
     *-------------------------------------------------------------
     * Trigger seen event
     *-------------------------------------------------------------
     */
    function makeSeen(status) {
        if (document?.hidden) {
            return;
        }
        clearConversationUnreadCounter();
        // seen
        $.ajax({
            url: url + "/makeSeen",
            method: "POST",
            data: { _token: csrfToken, id: getMessengerId() },
            dataType: "JSON",
        });
        return clientSendChannel.trigger("client-seen", {
            from_id: auth_id, // Me
            to_id: getMessengerId(), // Messenger
            seen: status,
        });
    }

    /**
     *-------------------------------------------------------------
     * Trigger contact item updates
     *-------------------------------------------------------------
     */
    function sendContactItemUpdates(status) {
        return clientSendChannel.trigger("client-contactItem", {
            from: auth_id, // Me
            to: getMessengerId(), // Messenger
            update: status,
        });
    }

    /**
     *-------------------------------------------------------------
     * Trigger message delete
     *-------------------------------------------------------------
     */
    function sendMessageDeleteEvent(messageId) {
        return clientSendChannel.trigger("client-messageDelete", {
            id: messageId,
        });
    }
    /**
     *-------------------------------------------------------------
     * Trigger delete conversation
     *-------------------------------------------------------------
     */
    function sendDeleteConversationEvent() {
        return clientSendChannel.trigger("client-deleteConversation", {
            from: auth_id,
            to: getMessengerId(),
        });
    }
    function sendBlockUserEvent(from_id) {
        return clientSendChannel.trigger("client-blockUser", {
            from_id: from_id,
        });
    }

    /**
     *-------------------------------------------------------------
     * Check internet connection using pusher states
     *-------------------------------------------------------------
     */
    function checkInternet(state, selector) {
        let net_errs = 0;
        const messengerTitle = $(".messenger-headTitle");
        switch (state) {
            case "connected":
                if (net_errs < 1) {
                    messengerTitle.text(messengerTitleDefault);
                    selector.addClass("successBG-rgba");
                    selector.find("span").hide();
                    selector.slideDown("fast", function () {
                        selector.find(".ic-connected").show();
                    });
                    setTimeout(function () {
                        $(".internet-connection").slideUp("fast");
                    }, 3000);
                }
                break;
            case "connecting":
                messengerTitle.text($(".ic-connecting").text());
                selector.removeClass("successBG-rgba");
                selector.find("span").hide();
                selector.slideDown("fast", function () {
                    selector.find(".ic-connecting").show();
                });
                net_errs = 1;
                break;
            // Not connected
            default:
                messengerTitle.text($(".ic-noInternet").text());
                selector.removeClass("successBG-rgba");
                selector.find("span").hide();
                selector.slideDown("fast", function () {
                    selector.find(".ic-noInternet").show();
                });
                net_errs = 1;
                break;
        }
    }

    /**
     *-------------------------------------------------------------
     * Get contacts
     *-------------------------------------------------------------
     */
    let contactsPage = 1;
    let contactsLoading = false;
    let noMoreContacts = false;
    function setContactsLoading(loading = false) {
        if (!loading) {
            $(".listOfContacts").find(".loading-contacts").remove();
        } else {
            $(".listOfContacts").append(
                `<div class="loading-contacts">${listItemLoading(4)}</div>`
            );
        }
        contactsLoading = loading;
    }
    function getContacts() {
        if (!contactsLoading && !noMoreContacts) {
            setContactsLoading(true);
            $.ajax({
                url: url + "/getContacts",
                method: "GET",
                data: { _token: csrfToken, page: contactsPage },
                dataType: "JSON",
                success: (data) => {
                    setContactsLoading(false);
                    if (contactsPage < 2) {
                        $(".listOfContacts").html(data.contacts);
                    } else {
                        $(".listOfContacts").append(data.contacts);
                    }
                    updateSelectedContact();
                    clearConversationUnreadCounter();
                    // update data-action required with [responsive design]
                    cssMediaQueries();
                    // Pagination lock & messages page
                    noMoreContacts = contactsPage >= data?.last_page;
                    if (!noMoreContacts) contactsPage += 1;
                },
                error: (error) => {
                    setContactsLoading(false);
                    console.error(error);
                },
            });
        }
    }

    /**
     *-------------------------------------------------------------
     * Update contact item
     *-------------------------------------------------------------
     */
    function updateContactItem(user_id) {
        if (user_id != auth_id) {
            $.ajax({
                url: url + "/updateContacts",
                method: "POST",
                data: {
                    _token: csrfToken,
                    user_id,
                },
                dataType: "JSON",
                success: (data) => {
                    getConversationListItem(user_id).remove();
                    if (data.contactItem) $(".listOfContacts").prepend(data.contactItem);
                    if (user_id == getMessengerId()) {
                        updateSelectedContact(user_id);
                        clearConversationUnreadCounter(user_id);
                    }
                    // show/hide message hint (empty state message)
                    const totalContacts =
                        $(".listOfContacts").find(".messenger-list-item")?.length || 0;
                    if (totalContacts > 0) {
                        $(".listOfContacts").find(".message-hint").hide();
                    } else {
                        $(".listOfContacts").find(".message-hint").show();
                    }
                    // update data-action required with [responsive design]
                    cssMediaQueries();
                },
                error: (error) => {
                    console.error(error);
                },
            });
        }
    }




    /**
     *-------------------------------------------------------------
     * Get admins list
     *-------------------------------------------------------------
     */
    function getAdminsList() {
        $(".messenger-admins").html(avatarLoading(4));
        $.ajax({
            url: url + "/favorites",
            method: "POST",
            data: { _token: csrfToken },
            dataType: "JSON",
            success: (data) => {
                if (data.count > 0) {
                    $(".admins-section").show();
                    $(".messenger-admins").html(data.admins);
                } else {
                    $(".admins-section").hide();
                }
                // update data-action required with [responsive design]
                cssMediaQueries();
            },
            error: () => {
                console.error("Server error, check your response");
            },
        });
    }


    /**
     *-------------------------------------------------------------
     * Get shared photos
     *-------------------------------------------------------------
     */
    function getSharedPhotos(user_id) {
        $.ajax({
            url: url + "/shared",
            method: "POST",
            data: { _token: csrfToken, user_id: user_id },
            dataType: "JSON",
            success: (data) => {
                $(".shared-photos-list").html(data.shared);
            },
            error: () => {
                console.error("Server error, check your response");
            },
        });
    }

    /**
     *-------------------------------------------------------------
     * Search in messenger
     *-------------------------------------------------------------
     */
    let searchPage = 1;
    let noMoreDataSearch = false;
    let searchLoading = false;
    let searchTempVal = "";
    function setSearchLoading(loading = false) {
        if (!loading) {
            $(".search-records").find(".loading-search").remove();
        } else {
            $(".search-records").append(
                `<div class="loading-search">${listItemLoading(4)}</div>`
            );
        }
        searchLoading = loading;
    }
    function messengerSearch(input) {
        if (input != searchTempVal) {
            searchPage = 1;
            noMoreDataSearch = false;
            searchLoading = false;
        }
        searchTempVal = input;
        if (!searchLoading && !noMoreDataSearch) {
            if (searchPage < 2) {
                $(".search-records").html("");
            }
            setSearchLoading(true);
            $.ajax({
                url: url + "/search",
                method: "GET",
                data: { _token: csrfToken, input: input, page: searchPage },
                dataType: "JSON",
                success: (data) => {
                    setSearchLoading(false);
                    if (searchPage < 2) {
                        $(".search-records").html(data.records);
                    } else {
                        $(".search-records").append(data.records);
                    }
                    // update data-action required with [responsive design]
                    cssMediaQueries();
                    // Pagination lock & messages page
                    noMoreDataSearch = searchPage >= data?.last_page;
                    if (!noMoreDataSearch) searchPage += 1;
                },
                error: (error) => {
                    setSearchLoading(false);
                    console.error(error);
                },
            });
        }
    }

    /**
     *-------------------------------------------------------------
     * Delete Conversation
     *-------------------------------------------------------------
     */
    function deleteConversation(id) {
        $.ajax({
            url: url + "/deleteConversation",
            method: "POST",
            data: { _token: csrfToken, id: id },
            dataType: "JSON",
            beforeSend: () => {
                // hide delete modal
                app_modal({
                    show: false,
                    name: "delete",
                });
                // Show waiting alert modal
                app_modal({
                    show: true,
                    name: "alert",
                    buttons: false,
                    body: loadingSVG("32px", null, "margin:auto"),
                });
            },
            success: (data) => {
                // delete contact from the list
                $(".listOfContacts")
                    .find(".messenger-list-item[data-contact=" + id + "]")
                    .remove();
                // refresh info
                IDinfo(id);

                if (!data.deleted)
                    return alert("Error occurred, messages can not be deleted!");

                // Hide waiting alert modal
                app_modal({
                    show: false,
                    name: "alert",
                    buttons: true,
                    body: "",
                });

                sendDeleteConversationEvent();

                // update contact list item
                sendContactItemUpdates(true);
            },
            error: () => {
                console.error("Server error, check your response");
            },
        });
    }
    function blockUser(id,from_id=null) {
        $.ajax({
            url: url + "/blockUser",
            method: "POST",
            data: { _token: csrfToken, user_id: id,from_id: from_id },
            dataType: "JSON",
            beforeSend: () => {
                // Show waiting alert modal
                app_modal({
                    show: true,
                    name: "alert",
                    buttons: false,
                    body: loadingSVG("32px", null, "margin:auto"),
                });
            },
            success: (data) => {
                IDinfo(from_id??id);
                blockUserButton.html(data.message);
                /*if (!data.blocked)
                  return alert("Error occurred, user can not be blocked!");
          */
                sendBlockUserEvent(from_id??auth_id);
                // Hide waiting alert modal
                app_modal({
                    show: false,
                    name: "alert",
                    buttons: true,
                    body: "",
                });
            },
            error: () => {
                console.error("Server error, check your response");
            },
        });
    }

    /**
     *-------------------------------------------------------------
     * Delete Message By ID
     *-------------------------------------------------------------
     */
    function deleteMessage(id) {
        $.ajax({
            url: url + "/deleteMessage",
            method: "POST",
            data: { _token: csrfToken, id: id },
            dataType: "JSON",
            beforeSend: () => {
                // hide delete modal
                app_modal({
                    show: false,
                    name: "delete",
                });
                // Show waiting alert modal
                app_modal({
                    show: true,
                    name: "alert",
                    buttons: false,
                    body: loadingSVG("32px", null, "margin:auto"),
                });
            },
            success: (data) => {
                $(".messages").find(`.message-card[data-id=${id}]`).remove();
                if (!data.deleted)
                    console.error("Error occurred, message can not be deleted!");

                sendMessageDeleteEvent(id);

                // Hide waiting alert modal
                app_modal({
                    show: false,
                    name: "alert",
                    buttons: true,
                    body: "",
                });
            },
            error: () => {
                console.error("Server error, check your response");
            },
        });
    }

    /**
     *-------------------------------------------------------------
     * Set Active status
     *-------------------------------------------------------------
     */
    function setActiveStatus(status) {
        $.ajax({
            url: url + "/setActiveStatus",
            method: "POST",
            data: { _token: csrfToken, status: status },
            dataType: "JSON",
            success: (data) => {
                // Nothing to do
            },
            error: () => {
                console.error("Server error, check your response");
            },
        });
    }

    /**
     *-------------------------------------------------------------
     * On DOM ready
     *-------------------------------------------------------------
     */
    $(document).ready(function () {
        // get contacts list
        getContacts();

        // get contacts list
        getAdminsList();

        // Clear typing timeout
        clearTimeout(typingTimeout);

        // NProgress configurations
        NProgress.configure({ showSpinner: false, minimum: 0.7, speed: 500 });

        // make message input autosize.
        autosize($(".m-send"));

        // check if pusher has access to the channel [Internet status]
        pusher.connection.bind("state_change", function (states) {
            let selector = $(".internet-connection");
            checkInternet(states.current, selector);
            // listening for pusher:subscription_succeeded
            channel.bind("pusher:subscription_succeeded", function () {
                // On connection state change [Updating] and get [info & msgs]
                if (getMessengerId() != 0) {
                    if (
                        $(".messenger-list-item")
                            .find("tr[data-action]")
                            .attr("data-action") == "1"
                    ) {
                        $(".messenger-listView").hide();
                    }
                    IDinfo(getMessengerId());
                }
            });
        });

        // set item active on click
        body.on("click", ".messenger-list-item", function () {
            $(".messenger-list-item").removeClass("m-list-active");
            $(this).addClass("m-list-active");
            const userID = $(this).attr("data-contact");
            routerPush(document.title, `${url}/${userID}`);
            updateSelectedContact(userID);
            clearConversationUnreadCounter(userID);
        });

        // show info side button
        $(".messenger-infoView nav a , .show-infoSide").on("click", function () {
            $(".messenger-infoView").toggle();
        });

        // make admins card dragable on click to slide.
        hScroller(".messenger-admins");

        // click action for list item [user/group]
        body.on("click", ".messenger-list-item", function () {
            if ($(this).find("tr[data-action]").attr("data-action") == "1") {
                $(".messenger-listView").hide();
            }
            const dataId = $(this).find("p[data-id]").attr("data-id");
            setMessengerId(dataId);
            IDinfo(dataId);
            clearConversationUnreadCounter(dataId);
        });

        // click action for admin button
        body.on("click", ".admin-list-item", function () {
            if ($(this).find("div").attr("data-action") == "1") {
                $(".messenger-listView").hide();
            }
            const uid = $(this).find("div.avatar").attr("data-id");
            setMessengerId(uid);
            IDinfo(uid);
            updateSelectedContact(uid);
            routerPush(document.title, `${url}/${uid}`);
        });
        body.on("click", ".message-sender-name", function () {
            const uid=$(this).attr("data-id");
            setMessengerId(uid);
            IDinfo(uid);
            routerPush(document.title, `${url}/${uid}`);
        });

        // list view buttons
        $(".listView-x").on("click", function () {
            $(".messenger-listView").hide();
        });
        $(".show-listView").on("click", function (event) {
            event.preventDefault();
            if (shouldReturnToStudentDashboard()) {
                event.stopImmediatePropagation();
                returnToStudentDashboard();
                return;
            }
            routerPush(document.title, `${url}/`);
            $(".messenger-listView").show();
        });



        // calling Css Media Queries
        cssMediaQueries();

        // message form on submit.
        messageForm.on("submit", (e) => {
            e.preventDefault();
            sendMessage();
        });

        // message input on keyup [Enter to send, Enter+Shift for new line]
        messageInput.on("keyup", (e) => {
            if (event.key === "Enter" && !event.ctrlKey) {
                triggered = isTyping(false);
                isTypingToGroup(false);
                sendMessage();
            }
            // Check if Ctrl + Enter is pressed
            if (event.key === "Enter" && event.ctrlKey) {
                insertAtCursor(this, '\n');
            }

        });

        // On [upload attachment] input change, show a preview of the image/file.
        body.on("change", ".upload-attachment", (e) => {
            let file = e.target.files[0];
            if (!attachmentValidate(file)) return false;
            let reader = new FileReader();
            let sendCard = $(".messenger-sendCard");
            reader.readAsDataURL(file);
            reader.addEventListener("loadstart", (e) => {
                messageForm.before(loadingSVG());
            });
            reader.addEventListener("load", (e) => {
                $(".messenger-sendCard").find(".loadingSVG").remove();
                if (!file.type.match("image.*")) {
                    // if the file not image
                    sendCard.find(".attachment-preview").remove(); // older one
                    sendCard.prepend(attachmentTemplate("file", file.name));
                } else {
                    // if the file is an image
                    sendCard.find(".attachment-preview").remove(); // older one
                    sendCard.prepend(
                        attachmentTemplate("image", file.name, e.target.result)
                    );
                }
            });
        });















        //upload audio
        let mediaRecorder;
        let chunks = [];
        let isRecording = false;
        let blob;
        let activeRecordingStream = null;
        let pendingAudioSendTimer = null;
        let audioSendCancelled = false;
        let timer_interval = null;
        let i=0;

        const sendRecordBtn = document.getElementById('sendRecordBtn');
        const removeRecordBtn = document.getElementById('removeRecordBtn');

        const box_start_recorder = document.querySelector(".box_start_recorder");
        const second_recorder = document.querySelector(".second_recorder");
        const box_recorder = document.querySelector(".box_recorder");
        const minute_recorder = document.querySelector(".minute_recorder");
        const message_form = document.querySelector("#message-form textarea");

        async function startRecording() {
            audioSendCancelled = false;
            blob = null;
            chunks = [];

            if (pendingAudioSendTimer) {
                clearTimeout(pendingAudioSendTimer);
                pendingAudioSendTimer = null;
            }

            box_start_recorder.classList.remove("d-none");
            box_recorder.classList.remove("d-none");
            const stream = await navigator.mediaDevices.getUserMedia({
                audio: true
            });
            activeRecordingStream = stream;

            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = (event) => {
                if (event.data.size > 0) {
                    chunks.push(event.data);
                }
            };
            mediaRecorder.onstop = () => {
                if (!audioSendCancelled) {
                    blob = new Blob(chunks, {
                        type: 'audio/wav'
                    });
                } else {
                    blob = null;
                }

                stream.getTracks().forEach((track) => {
                    track.stop();
                });
                if (activeRecordingStream === stream) {
                    activeRecordingStream = null;
                }
                chunks=[];
            };
            mediaRecorder.start();
            isRecording = true;
            i=1;
            second_recorder.innerHTML="01";
            minute_recorder.innerHTML="00";
            timer_interval = setInterval(calculateRecordingTime, 1000);
        }
        startRecordingBtn.addEventListener('click', startRecording);
        function resetRecorderForm() {
            clearInterval(timer_interval);
            i = 0;
            blob = null;
            chunks = [];
            audioSendCancelled = true;

            if (pendingAudioSendTimer) {
                clearTimeout(pendingAudioSendTimer);
                pendingAudioSendTimer = null;
            }

            if (isRecording && mediaRecorder && mediaRecorder.state !== "inactive") {
                mediaRecorder.stop();
            }

            isRecording = false;
            activeRecordingStream?.getTracks().forEach((track) => track.stop());
            activeRecordingStream = null;
            second_recorder.innerHTML = "00";
            minute_recorder.innerHTML = "00";
            box_recorder.classList.add("d-none");
            sendRecordBtn.classList.remove("pointer-events-none", "opacity-60");
            startRecordingBtn.classList.toggle("d-none", Boolean(message_form.value));
            sendButton.classList.toggle("d-none", !message_form.value);
            syncRecorderLayout();
        }

        function stopRecording({ cancelSend = false, hideRecorder = true } = {}){
            if (cancelSend) {
                resetRecorderForm();
                return;
            }

            if (isRecording) {
                mediaRecorder.stop();
                isRecording = false;
            }
            clearInterval(timer_interval);
            if (hideRecorder) {
                box_recorder.classList.add("d-none");
            }
        }
        function sendAudio() {
            audioSendCancelled = false;
            stopRecording({ hideRecorder: false });
            sendRecordBtn.classList.add("pointer-events-none", "opacity-60");
            pendingAudioSendTimer = setTimeout(function (){
                pendingAudioSendTimer = null;
                sendRecordBtn.classList.remove("pointer-events-none", "opacity-60");
                if (audioSendCancelled || !blob) {
                    audioSendCancelled = false;
                    box_recorder.classList.add("d-none");
                    return;
                }

                const file = new File([blob], 'audio-recording.wav', {
                    type: 'audio/wav',
                });
                // const url = URL.createObjectURL(blob);
                blob = null;
                box_recorder.classList.add("d-none");
                sendMessage(file);
            },1000);
        }
        sendRecordBtn.addEventListener("click", sendAudio);
        removeRecordBtn.addEventListener("click", (event) => {
            event.preventDefault();
            event.stopPropagation();
            stopRecording({ cancelSend: true });
        });

        message_form.addEventListener("input", function () {
            startRecordingBtn.classList.toggle("d-none", this.value);
            sendButton.classList.toggle("d-none", !this.value);
        });

        // let i = Number(second_recorder.innerHTML);
        function calculateRecordingTime() {
            if(isRecording){
                if (i === 59) {
                    i = 0;

                    if (+minute_recorder.innerHTML + 1 < 10) {
                        minute_recorder.innerHTML = `0${+minute_recorder.innerHTML + 1}`;
                    } else {
                        minute_recorder.innerHTML = +minute_recorder.innerHTML + 1;
                    }
                    // Number(minute_recorder.innerHTML);
                }
                if (i < 10) {
                    second_recorder.innerHTML = `0${i}`;
                } else {
                    second_recorder.innerHTML = i;
                }
                i++;
            }
        }








        function attachmentValidate(file) {
            const fileElement = $(".upload-attachment");
            const { name: fileName, size: fileSize } = file;
            const fileExtension = fileName.split(".").pop();
            if (
                !chatify.allAllowedExtensions.includes(
                    fileExtension.toString().toLowerCase()
                )
            ) {
                alert("file type not allowed");
                fileElement.val("");
                return false;
            }
            // Validate file size.
            if (fileSize > chatify.maxUploadSize) {
                alert("File is too large!");
                return false;
            }
            sendButton.classList.remove("d-none");
            return true;
        }

        // Attachment preview cancel button.
        body.on("click", ".attachment-preview .cancel", () => {
            cancelAttachment();
        });

        // typing indicator on [input] keyDown
        messageInput.on("keydown", () => {
            if (typingNow < 1) {
                isTyping(true);
                isTypingToGroup(true);
                typingNow = 1;
            }
            clearTimeout(typingTimeout);
            typingTimeout = setTimeout(function () {
                isTyping(false);
                isTypingToGroup(false);
                typingNow = 0;
            }, 1000);
        });

        // Image modal
        body.on("click", ".chat-image", function (event) {
            event.preventDefault();
            event.stopPropagation();

            let src = this.dataset?.src || this.getAttribute("href") || this.querySelector?.("img")?.getAttribute("src");
            if (!src) {
                const backgroundImage = $(this).css("background-image");
                src = backgroundImage && backgroundImage !== "none" ? backgroundImage.split(/"/)[1] : "";
            }

            if (!src) return;
            $("#imageModalBox").show();
            $("#imageModalBoxSrc").attr("src", src);
        });
        function closeImageModal() {
            $("#imageModalBox").hide();
            $("#imageModalBoxSrc").removeAttr("src");
        }

        $(".imageModal-close").on("click", closeImageModal);
        $("#imageModalBox").on("click", function (event) {
            if (event.target === this) closeImageModal();
        });
        $("#imageModalBoxSrc").on("click", function (event) {
            event.stopPropagation();
        });

        body.on("click", ".chat-video-trigger", function (event) {
            event.preventDefault();
            event.stopPropagation();

            const src = this.dataset?.src;
            const type = this.dataset?.type || "video/mp4";
            if (!src) return;

            const video = document.getElementById("videoModalBoxSrc");
            if (!video) return;

            video.innerHTML = "";
            const source = document.createElement("source");
            source.src = src;
            source.type = type;
            video.appendChild(source);
            video.load();
            $("#videoModalBox").show();
        });

        function closeVideoModal() {
            const video = document.getElementById("videoModalBoxSrc");
            if (video) {
                video.pause();
                video.removeAttribute("src");
                video.innerHTML = "";
                video.load();
            }
            $("#videoModalBox").hide();
        }

        $(".videoModal-close").on("click", closeVideoModal);
        $("#videoModalBox").on("click", function (event) {
            if (event.target === this) closeVideoModal();
        });
        $("#videoModalBoxSrc").on("click", function (event) {
            event.stopPropagation();
        });

        body.on("click", ".chat-pdf-trigger", function (event) {
            event.preventDefault();
            event.stopPropagation();

            const src = this.dataset?.src;
            const name = this.dataset?.name || "PDF document";
            if (!src) return;

            $("#pdfModalBoxSrc").attr("src", src).attr("title", name);
            $("#pdfModalOpenLink").attr("href", src);
            $("#pdfModalBox").show();
        });

        function closePdfModal() {
            $("#pdfModalBox").hide();
            $("#pdfModalBoxSrc").removeAttr("src");
            $("#pdfModalOpenLink").attr("href", "#");
        }

        $(".pdfModal-close").on("click", closePdfModal);
        $("#pdfModalBox").on("click", function (event) {
            if (event.target === this) closePdfModal();
        });
        $("#pdfModalBoxSrc").on("click", function (event) {
            event.stopPropagation();
        });

        // Search input on focus
        $(".messenger-search").on("focus", function () {
            $(".messenger-tab").hide();
            $('.messenger-tab[data-view="search"]').show();
        });
        $(".messenger-search").on("blur", function () {
            setTimeout(function () {
                $(".messenger-tab").hide();
                $('.messenger-tab[data-view="users"]').show();
            }, 200);
        });
        // Search action on keyup
        const debouncedSearch = debounce(function () {
            const value = $(".messenger-search").val();
            messengerSearch(value);
        }, 500);
        $(".messenger-search").on("keyup", function (e) {
            const value = $(this).val();
            if ($.trim(value).length > 0) {
                $(".messenger-search").trigger("focus");
                debouncedSearch();
            } else {
                $(".messenger-tab").hide();
                $('.messenger-tab[data-view="users"]').show();
            }
        });

        // Delete Conversation button
        deleteConversationButton.on("click", function () {
            app_modal({
                name: "delete",
            });
        });
        blockUsersFromGroupButton.on("click", function () {
            $.ajax({
                url: url + "/getGroupUsers",
                method: "POST",
                data: { _token: csrfToken, id: getMessengerId() },
                dataType: "JSON",
                success: (data) => {
                    $("#blockUsersFromGroup .user_list").html(data.usersList);
                },
                error: () => {
                    console.error("Server error, check your response");
                },
            });
            app_modal({
                name: "block",
            });
        });
        //block user
        blockUserButton.on("click", function () {
            blockUser(getMessengerId())
        });
        // Delete Message Button
        body.on("click", ".message-card .actions .delete-btn", function (event) {
            event.preventDefault();
            event.stopPropagation();

            app_modal({
                name: "delete",
                data: $(this).data("id"),
            });
        });
        // Delete modal [on delete button click]
        $(".app-modal[data-name=delete]")
            .find(".app-modal-footer .delete")
            .on("click", function () {
                const id = body
                    .find(".app-modal[data-name=delete]")
                    .find(".app-modal-card")
                    .attr("data-modal");
                if (id == 0) {
                    deleteConversation(getMessengerId());
                } else {
                    deleteMessage(id);
                }
                app_modal({
                    show: false,
                    name: "delete",
                });
            });
        $("#blockUsersFromGroup").on("change","input[type=checkbox]",function (){
            blockUser($(this).val(),getMessengerId());
        })

        // delete modal [cancel button]
        $(".app-modal[data-name=delete]")
            .find(".app-modal-footer .cancel")
            .on("click", function () {
                app_modal({
                    show: false,
                    name: "delete",
                });
            });
        $(".app-modal[data-name=block]")
            .find(".close_alert")
            .on("click", function () {
                app_modal({
                    show: false,
                    name: "block",
                });
            });

        //Messages pagination
        actionOnScroll(
            ".m-body.messages-container",
            function () {
                fetchMessages(getMessengerId());
            },
            true
        );
        //Contacts pagination
        actionOnScroll(".messenger-tab.users-tab, .listOfContacts", function () {
            getContacts();
        });
        //Search pagination
        actionOnScroll(".messenger-tab.search-tab", function () {
            messengerSearch($(".messenger-search").val());
        });
    });

    /**
     *-------------------------------------------------------------
     * Observer on DOM changes
     *-------------------------------------------------------------
     */
    let previousMessengerId = getMessengerId();
    const observer = new MutationObserver(function (mutations) {
        if (getMessengerId() !== previousMessengerId) {
            previousMessengerId = getMessengerId();
            initClientChannel();
        }
    });
    const config = { subtree: true, childList: true };

    // start listening to changes
    observer.observe(document, config);

    // stop listening to changes
    // observer.disconnect();

    $(".messenger-infoView .collapsed").on("click", function() {
        $(this).toggleClass("show");
    })

    /**
     *-------------------------------------------------------------
     * Notification sounds
     *-------------------------------------------------------------
     */
    function playNotificationSound(soundName, condition = false) {
        if ((document.hidden || condition) && chatify.sounds.enabled) {
            const sound = new Audio(
                `/${chatify.sounds.public_path}/${chatify.sounds[soundName]}`
            );
            sound.play();
        }
    }
    /**
     *-------------------------------------------------------------
     * Update and format dates to time ago.
     *-------------------------------------------------------------
     */
    function updateElementsDateToTimeAgo() {
        $(".message-time").each(function () {
            const time = $(this).attr("data-time");
            $(this).find(".time").text(dateStringToTimeAgo(time));
        });
        $(".contact-item-time").each(function () {
            const time = $(this).attr("data-time");
            $(this).text(dateStringToTimeAgo(time));
        });
    }
    setInterval(() => {
        updateElementsDateToTimeAgo();
    }, 60000);
    function insertAtCursor(myField, myValue) {
        //IE support
        if (document.selection) {
            myField.focus();
            let sel = document.selection.createRange();
            sel.text = myValue;
        }
        // Mozilla and Webkit support
        else if (myField.selectionStart || myField.selectionStart == '0') {
            let startPos = myField.selectionStart;
            let endPos = myField.selectionEnd;
            myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
            myField.selectionStart = startPos + myValue.length;
            myField.selectionEnd = startPos + myValue.length;
        } else {
            myField.value += myValue;
        }
    }

    window.addEventListener('DOMContentLoaded', function () {
        const root = document.querySelector('.messenger');
        const listView = document.querySelector('.messenger-listView');
        const messagingView = document.querySelector('.messenger-messagingView');
        const infoView = document.querySelector('.messenger-infoView');
        const backdrop = document.querySelector('.bec-chat-backdrop');
        const messagesContainer = document.querySelector('.messages-container');
        const messageInput = document.querySelector('.m-send');
        const sendCard = document.querySelector('.messenger-sendCard');
        const messageForm = document.querySelector('#message-form');
        const attachmentInput = document.querySelector('.upload-attachment');
        const sendButton = document.querySelector('.send-button');
        const recordButton = document.querySelector('#startRecordingBtn');
        const systemThemeQuery = window.matchMedia('(prefers-color-scheme: dark)');
        const isMobile = () => window.matchMedia('(max-width: 767px)').matches;
        const isCompactChat = () => window.matchMedia('(max-width: 980px)').matches;
        const isIosSafari = (() => {
            const userAgent = navigator.userAgent || '';
            const isIos = /iP(ad|hone|od)/.test(userAgent)
                || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
            return isIos && /WebKit/.test(userAgent) && !/CriOS|FxiOS|EdgiOS/.test(userAgent);
        })();
        const metaConversation = document.querySelector('meta[name="id"]');
        const chatLabels = window.chatifyLabels || {};
        let userOpenedConversation = false;
        let hasActiveConversation = false;

        function normalizeConversationId(value) {
            const id = String(value || '').trim();
            if (!id) return '';
            if (['0', 'null', 'undefined', 'false', 'select a conversation'].includes(id.toLowerCase())) return '';
            return id;
        }

        let selectedConversationId = normalizeConversationId(metaConversation?.content);
        let lastTouchY = 0;
        let adaptFrame = 0;
        let suppressIosComposerFocusUntil = 0;

        function scrollMessagesToBottom(force = false) {
            if (!messagesContainer) return;
            const behavior = force ? 'auto' : 'smooth';
            try {
                messagesContainer.scrollTo({ top: messagesContainer.scrollHeight, behavior });
            } catch (error) {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        }

        function setAppHeight() {
            const viewport = window.visualViewport;
            const composerFocused = document.activeElement === messageInput
                || document.documentElement.classList.contains('bec-chat-input-focused');
            const keyboardOpen = Boolean(
                isMobile() &&
                viewport &&
                composerFocused &&
                window.innerHeight - viewport.height > 120
            );
            const height = keyboardOpen && viewport ? viewport.height : window.innerHeight;
            const offsetTop = keyboardOpen && viewport ? viewport.offsetTop : 0;
            const safeHeight = Math.max(320, Math.round(height || window.innerHeight || 0));
            const safeTop = Math.max(0, Math.round(offsetTop || 0));

            document.documentElement.style.setProperty('--bec-chat-app-height', `${safeHeight}px`);
            document.documentElement.style.setProperty('--bec-chat-visible-height', `${safeHeight}px`);
            document.documentElement.style.setProperty('--bec-chat-viewport-top', `${safeTop}px`);

            document.documentElement.classList.toggle('bec-chat-keyboard-open', keyboardOpen);

            if (!keyboardOpen) {
                document.body.classList.remove('openKeyboard');
                messagingView?.style.removeProperty('height');
                messagingView?.style.removeProperty('top');
            }
        }

        function lockDocumentScroll() {
            if (!isMobile()) return;
            if (window.scrollY !== 0) window.scrollTo(0, 0);
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;
        }

        function shouldSuppressIosComposerFocus() {
            return isIosSafari && Date.now() < suppressIosComposerFocusUntil;
        }

        function closeIosKeyboardAfterSend() {
            if (!isIosSafari) return;
            suppressIosComposerFocusUntil = Date.now() + 1400;
            const activeElement = document.activeElement;

            if (activeElement?.matches?.('textarea, input, [contenteditable="true"]')) {
                activeElement.blur();
            }

            messageInput?.blur();
            document.documentElement.classList.remove('bec-chat-input-focused');
            window.setTimeout(() => messageInput?.blur(), 0);
            window.setTimeout(() => messageInput?.blur(), 160);
            window.setTimeout(() => messageInput?.blur(), 420);
        }

        window.closeChatifyIosKeyboardAfterSend = closeIosKeyboardAfterSend;

        function submitComposerFromIosPointer(event) {
            if (!isIosSafari || !messageForm || !sendButton || sendButton.disabled || !hasActiveConversation) return;

            const hasDraft = (messageInput?.value || '').trim().length > 0 || Boolean(attachmentInput?.files?.length);
            if (!hasDraft) return;

            event.preventDefault();
            event.stopPropagation();

            if (typeof messageForm.requestSubmit === 'function') {
                messageForm.requestSubmit(sendButton);
                return;
            }

            closeIosKeyboardAfterSend();
            window.jQuery?.(messageForm).triggerHandler('submit');
        }

        function isConversationScrollLocked() {
            return Boolean(isMobile() && root?.classList.contains('conversation-open'));
        }

        function canScrollMessages(deltaY) {
            if (!messagesContainer) return false;

            const hasScrollableMessages = messagesContainer.scrollHeight > messagesContainer.clientHeight;
            if (!hasScrollableMessages) return false;

            const atTop = messagesContainer.scrollTop <= 0;
            const atBottom = Math.ceil(messagesContainer.scrollTop + messagesContainer.clientHeight) >= messagesContainer.scrollHeight;

            if (deltaY < 0 && atTop) return false;
            if (deltaY > 0 && atBottom) return false;

            return true;
        }

        function syncComposerHeight() {
            if (!messageInput) return;

            messageInput.style.height = 'auto';
            const minHeight = 26;
            const maxHeight = 120;
            const nextHeight = Math.min(maxHeight, Math.max(minHeight, messageInput.scrollHeight + 2));

            messageInput.style.height = `${nextHeight}px`;
            messageInput.style.overflowY = messageInput.scrollHeight > maxHeight ? 'auto' : 'hidden';
        }

        function syncComposerDraftState() {
            if (!messageInput) return;

            if (!hasActiveConversation) {
                sendButton?.classList.add('d-none');
                sendButton?.classList.remove('inline-flex');
                if (sendButton) sendButton.disabled = true;
                recordButton?.classList.remove('d-none');
                recordButton?.classList.add('inline-flex');
                return;
            }

            const hasText = messageInput.value.trim().length > 0;
            const hasAttachment = Boolean(attachmentInput?.files?.length);
            const canSendDraft = hasText || hasAttachment;

            sendButton?.classList.toggle('d-none', !canSendDraft);
            sendButton?.classList.toggle('inline-flex', canSendDraft);
            if (sendButton) sendButton.disabled = !canSendDraft;

            recordButton?.classList.toggle('d-none', canSendDraft);
            recordButton?.classList.toggle('inline-flex', !canSendDraft);
        }

        function syncComposer() {
            syncComposerHeight();
            syncComposerDraftState();
        }

        function setComposerEnabled(enabled) {
            sendCard?.setAttribute('aria-disabled', enabled ? 'false' : 'true');
            messageForm?.querySelectorAll('textarea, input[type="file"], button').forEach((control) => {
                if (control.matches('textarea')) {
                    control.readOnly = !enabled;
                    control.setAttribute('aria-disabled', enabled ? 'false' : 'true');
                    if (!enabled) control.value = '';
                    return;
                }

                control.disabled = !enabled;
            });

            syncComposer();
        }

        function getRouteConversationId() {
            return normalizeConversationId(metaConversation?.content);
        }

        function getClickedConversationId(trigger) {
            if (!trigger) return '';

            const item = trigger.closest?.('.messenger-list-item') || trigger.closest?.('[data-contact]');
            const dataId = trigger.dataset?.id || trigger.closest?.('[data-id]')?.dataset?.id || '';
            return (item?.dataset?.contact || dataId || '').trim();
        }

        function resolveActiveConversationState() {
            return userOpenedConversation || Boolean(getRouteConversationId());
        }

        function setActiveConversationState(enabled, options = {}) {
            hasActiveConversation = Boolean(enabled);
            root?.classList.toggle('has-active-conversation', hasActiveConversation);
            root?.classList.toggle('no-active-conversation', !hasActiveConversation);
            root?.setAttribute('data-has-active-conversation', hasActiveConversation ? '1' : '0');
            setComposerEnabled(hasActiveConversation);

            if (!hasActiveConversation) {
                root?.classList.remove('conversation-open');
                listView?.classList.remove('conversation-active');
                document.documentElement.classList.remove('bec-chat-conversation-open');
                messagingView?.style.removeProperty('display');
                listView?.style.removeProperty('display');
            }

            if (!hasActiveConversation && options.clearActive !== false) {
                document.querySelectorAll('.messenger-list-item.active, .messenger-list-item.m-list-active, .messenger-list-item tr.active, .messenger-list-item tr.m-list-active').forEach((item) => {
                    item.classList.remove('active', 'm-list-active');
                });
                closeInfoView();
            }
        }

        function syncSystemTheme() {
            document.documentElement.classList.toggle('dark', systemThemeQuery.matches);
        }

        syncSystemTheme();
        systemThemeQuery.addEventListener?.('change', syncSystemTheme);

        document.querySelectorAll('.app-modal, .imageModal').forEach((modal) => {
            if (!modal.dataset.forceOpen) modal.style.display = 'none';
        });

        function closeInfoView() {
            infoView?.classList.add('hidden');
            infoView?.classList.remove('show');
            root?.classList.remove('show-infoSide');
            backdrop?.classList.add('hidden');
        }

        function openInfoView() {
            if (!hasActiveConversation) return;
            infoView?.classList.remove('hidden');
            infoView?.classList.add('show');
            root?.classList.add('show-infoSide');
            if (isMobile()) {
                backdrop?.classList.remove('hidden');
            }
        }

        function showConversationList() {
            userOpenedConversation = false;
            selectedConversationId = getRouteConversationId();
            setActiveConversationState(Boolean(selectedConversationId), { clearActive: !selectedConversationId });
            root?.classList.remove('conversation-open');
            listView?.classList.remove('conversation-active');
            document.documentElement.classList.remove('bec-chat-conversation-open');
            listView?.style.removeProperty('display');
            messagingView?.style.removeProperty('display');
            closeInfoView();
        }

        function showConversationPane() {
            setActiveConversationState(true, { clearActive: false });
            if (!isCompactChat()) return;
            setAppHeight();
            root?.classList.add('conversation-open');
            listView?.classList.add('conversation-active');
            document.documentElement.classList.add('bec-chat-conversation-open');
            listView?.style.removeProperty('display');
            messagingView?.style.removeProperty('display');
            lockDocumentScroll();
        }

        function syncConversationAvatarFallback() {
            if (!hasActiveConversation) return;
            const activeNode = document.querySelector('.messenger-list-item.active, .messenger-list-item.m-list-active, .messenger-list-item tr.active');
            const activeItem = activeNode?.matches('.messenger-list-item') ? activeNode : activeNode?.closest('.messenger-list-item');
            const contactId = activeItem?.dataset.contact || document.querySelector('meta[name="id"]')?.content || '';
            const isGroup = contactId.includes('-');
            const presenceState = activeItem?.dataset.presence || '';
            const presenceLabel = activeItem?.dataset.presenceLabel || (presenceState === 'online' ? chatLabels.online : chatLabels.offline);
            const activeAvatar = activeItem?.querySelector('.avatar');
            const activeAvatarImage = activeAvatar?.style?.backgroundImage || '';

            document.querySelectorAll('.header-avatar, .info-avatar').forEach((avatar) => {
                const icon = avatar.querySelector('.group-avatar-icon');
                const presenceDot = avatar.querySelector('.conversation-presence-dot');
                avatar.classList.toggle('is-group-avatar', isGroup);
                icon?.classList.toggle('hidden', !isGroup);
                icon?.classList.toggle('inline-block', isGroup);

                if (isGroup) {
                    if (avatar.style.backgroundImage !== 'none') avatar.style.backgroundImage = 'none';
                    presenceDot?.classList.add('hidden');
                    return;
                }

                if (activeAvatarImage && activeAvatarImage !== 'none' && avatar.style.backgroundImage !== activeAvatarImage) {
                    avatar.style.backgroundImage = activeAvatarImage;
                }

                if (!presenceDot) return;
                presenceDot.classList.toggle('hidden', !presenceState);
                presenceDot.classList.toggle('bg-[#52c41a]', presenceState === 'online');
                presenceDot.classList.toggle('bg-slate-300', presenceState !== 'online');
                presenceDot.classList.toggle('dark:bg-slate-500', presenceState !== 'online');
                presenceDot.setAttribute('aria-label', presenceLabel);
            });
        }

        function syncRecorderLayout() {
            const composer = document.querySelector('.composer-input');
            const recorder = document.querySelector('.box_recorder');
            if (!composer || !recorder) return;

            const recorderIsVisible = !recorder.classList.contains('d-none') && window.getComputedStyle(recorder).display !== 'none';
            composer.classList.toggle('is-recording', recorderIsVisible);
        }

        function formatAudioTime(value) {
            const seconds = Number.isFinite(value) ? Math.max(0, Math.floor(value)) : 0;
            const minutes = Math.floor(seconds / 60);
            const remainder = String(seconds % 60).padStart(2, '0');
            return `${minutes}:${remainder}`;
        }

        function pauseOtherAudioPlayers(currentAudio) {
            document.querySelectorAll('.chat-audio-source').forEach((audio) => {
                if (audio !== currentAudio) audio.pause();
            });
        }

        function initChatAudioPlayers() {
            document.querySelectorAll('.chat-audio-player').forEach((player) => {
                if (player.dataset.audioReady) return;

                const audio = player.querySelector('.chat-audio-source');
                const button = player.querySelector('.Pause_Play');
                let playIcon = button?.querySelector('.chat-audio-icon-play');
                let pauseIcon = button?.querySelector('.chat-audio-icon-pause');
                const progress = player.querySelector('.audio-progress');
                const currentTime = player.querySelector('.audio-current-time');
                const duration = player.querySelector('.audio-duration');

                if (!audio || !button || !progress) return;

                if (!playIcon || !pauseIcon) {
                    button.innerHTML = '<span class="chat-audio-icon chat-audio-icon-play" aria-hidden="true"></span><span class="chat-audio-icon chat-audio-icon-pause" aria-hidden="true" hidden></span>';
                    playIcon = button.querySelector('.chat-audio-icon-play');
                    pauseIcon = button.querySelector('.chat-audio-icon-pause');
                }

                function syncDuration() {
                    duration && (duration.textContent = formatAudioTime(audio.duration));
                }

                function syncProgress() {
                    currentTime && (currentTime.textContent = formatAudioTime(audio.currentTime));
                    progress.value = audio.duration ? String((audio.currentTime / audio.duration) * 100) : '0';
                }

                function setPlaying(isPlaying) {
                    button.setAttribute('aria-label', isPlaying ? chatLabels.pauseAudio : chatLabels.playAudio);
                    button.setAttribute('aria-pressed', isPlaying ? 'true' : 'false');
                    button.classList.toggle('pause_mode', isPlaying);
                    player.classList.toggle('is-playing', isPlaying);

                    if (playIcon) playIcon.hidden = isPlaying;
                    if (pauseIcon) pauseIcon.hidden = !isPlaying;
                }

                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    if (audio.paused) {
                        pauseOtherAudioPlayers(audio);
                        setPlaying(true);
                        audio.play().catch(() => setPlaying(false));
                    } else {
                        setPlaying(false);
                        audio.pause();
                    }
                });

                progress.addEventListener('input', function () {
                    if (!audio.duration) return;
                    audio.currentTime = (Number(progress.value) / 100) * audio.duration;
                    syncProgress();
                });

                audio.addEventListener('loadedmetadata', syncDuration);
                audio.addEventListener('durationchange', syncDuration);
                audio.addEventListener('timeupdate', syncProgress);
                audio.addEventListener('play', () => setPlaying(true));
                audio.addEventListener('pause', () => setPlaying(false));
                audio.addEventListener('ended', function () {
                    setPlaying(false);
                    syncProgress();
                });

                syncDuration();
                syncProgress();
                setPlaying(!audio.paused && !audio.ended);
                player.dataset.audioReady = 'true';
            });
        }

        function adaptDynamicNodes() {
            root?.classList.add('chatify-adapter-ready');

            document.querySelectorAll('.messenger-list-item').forEach((item) => {
                item.setAttribute('role', 'listitem');
            });

            document.querySelectorAll('.message-card').forEach((card) => {
                card.setAttribute('role', 'article');
                const cardId = String(card.getAttribute('data-id') || '').toLowerCase();
                const hasPendingClock = Boolean(card.querySelector('.fa-clock, .far.fa-clock, .fas.fa-clock'));
                const isPendingMessage = (cardId.includes('temp') || cardId.includes('temporary') || hasPendingClock)
                    && !card.querySelector('.message-time[data-time] .seen, .message-time .seen, .message_content .seen');

                if (isPendingMessage) card.classList.add('mc-sender');
                card.classList.toggle('chatify-pending-message', isPendingMessage);
                card.classList.toggle('chatify-sent-message', card.classList.contains('mc-sender'));
                card.classList.toggle('chatify-received-message', !card.classList.contains('mc-sender'));
            });

            if (messagesContainer) {
                messagesContainer.setAttribute('aria-live', 'polite');
                messagesContainer.setAttribute('aria-relevant', 'additions text');
            }

            const actualActiveState = resolveActiveConversationState();
            if (actualActiveState !== hasActiveConversation) {
                setActiveConversationState(actualActiveState, { clearActive: !actualActiveState });
            }

            if (isCompactChat() && hasActiveConversation && listView?.classList.contains('conversation-active')) {
                root?.classList.add('conversation-open');
                document.documentElement.classList.add('bec-chat-conversation-open');
            } else if (!isCompactChat()) {
                root?.classList.remove('conversation-open');
                document.documentElement.classList.remove('bec-chat-conversation-open');
            } else if (!hasActiveConversation) {
                root?.classList.remove('conversation-open');
                listView?.classList.remove('conversation-active');
                document.documentElement.classList.remove('bec-chat-conversation-open');
            }

            syncConversationAvatarFallback();
            syncRecorderLayout();
            syncComposer();
            initChatAudioPlayers();
        }

        document.addEventListener('click', function (event) {
            const closeTrigger = event.target.closest('.messenger-infoView-close, .bec-chat-backdrop');
            if (closeTrigger) {
                event.preventDefault();
                closeInfoView();
                return;
            }

            const backTrigger = event.target.closest('a.show-listView');
            if (backTrigger) {
                if (shouldReturnToStudentDashboard()) {
                    event.preventDefault();
                    returnToStudentDashboard();
                    return;
                }
                window.setTimeout(showConversationList, 0);
                return;
            }

            const detailsTrigger = event.target.closest('a.show-infoSide');
            if (detailsTrigger) {
                if (!hasActiveConversation) {
                    event.preventDefault();
                    return;
                }
                window.setTimeout(openInfoView, 0);
                return;
            }

            const chatTrigger = event.target.closest('.messenger-list-item, .admin-list-item, .messenger-admins [data-id]');
            if (chatTrigger && listView) {
                selectedConversationId = getClickedConversationId(chatTrigger) || selectedConversationId || getRouteConversationId();
                userOpenedConversation = true;
                setActiveConversationState(true, { clearActive: false });
                window.setTimeout(() => {
                    if (isCompactChat()) showConversationPane();
                    scrollMessagesToBottom(true);
                }, 0);
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeInfoView();
        });

        messageForm?.addEventListener('submit', function (event) {
            if (!hasActiveConversation) {
                event.preventDefault();
                event.stopPropagation();
                return;
            }

            closeIosKeyboardAfterSend();
            window.setTimeout(syncComposer, 0);
        }, true);

        sendButton?.addEventListener('pointerdown', submitComposerFromIosPointer, { passive: false });

        messageInput?.addEventListener('focus', function () {
            if (shouldSuppressIosComposerFocus()) {
                window.setTimeout(() => messageInput.blur(), 0);
                return;
            }

            document.documentElement.classList.add('bec-chat-input-focused');
            setAppHeight();
            syncComposer();
            window.requestAnimationFrame(lockDocumentScroll);
        });

        messageInput?.addEventListener('blur', function () {
            [0, 120, 320, 700].forEach((delay) => window.setTimeout(() => {
                document.documentElement.classList.remove('bec-chat-input-focused');
                setAppHeight();
            }, delay));
        });

        messageInput?.addEventListener('input', syncComposer);
        messageInput?.addEventListener('change', syncComposer);
        attachmentInput?.addEventListener('change', syncComposer);

        document.addEventListener('touchstart', function (event) {
            if (!isConversationScrollLocked()) return;
            lastTouchY = event.touches?.[0]?.clientY || 0;
        }, { passive: true });

        document.addEventListener('touchmove', function (event) {
            if (!isConversationScrollLocked()) return;

            const target = event.target;
            const insideMessages = Boolean(target?.closest?.('.messages-container'));
            const currentY = event.touches?.[0]?.clientY || lastTouchY;
            const deltaY = lastTouchY - currentY;
            lastTouchY = currentY;

            if (!insideMessages || !canScrollMessages(deltaY)) {
                event.preventDefault();
            }
        }, { passive: false });

        window.addEventListener('resize', setAppHeight, { passive: true });
        window.addEventListener('orientationchange', function () {
            window.setTimeout(setAppHeight, 160);
            window.setTimeout(() => scrollMessagesToBottom(true), 260);
        }, { passive: true });

        if (window.visualViewport) {
            window.visualViewport.addEventListener('resize', setAppHeight, { passive: true });
            window.visualViewport.addEventListener('scroll', setAppHeight, { passive: true });
        }

        setAppHeight();
        const initialConversationState = resolveActiveConversationState();
        setActiveConversationState(initialConversationState, { clearActive: !initialConversationState });
        adaptDynamicNodes();

        if (root) {
            const observer = new MutationObserver(() => {
                if (adaptFrame) return;
                adaptFrame = window.requestAnimationFrame(() => {
                    adaptFrame = 0;
                    adaptDynamicNodes();
                });
            });

            observer.observe(root, {
                childList: true,
                subtree: true,
            });
        }
    });
    (function () {
        if (window.becAttachmentPopupReady) return;
        window.becAttachmentPopupReady = true;

        function whenReady(callback) {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', callback, { once: true });
            } else {
                callback();
            }
        }

        whenReady(function () {
            const modal = document.getElementById('becAttachmentPopup');
            if (!modal) return;

            const imagePreview = modal.querySelector('.bec-attachment-popup-image');
            const videoPreview = modal.querySelector('.bec-attachment-popup-video');
            const fileCard = modal.querySelector('.bec-attachment-popup-file');
            const icon = modal.querySelector('.bec-attachment-popup-icon i');
            const fileName = modal.querySelector('.bec-attachment-popup-name');
            const fileMeta = modal.querySelector('.bec-attachment-popup-meta');
            const caption = modal.querySelector('.bec-attachment-popup-caption');
            const cancelButtons = modal.querySelectorAll('.bec-attachment-popup-close');
            const sendButton = modal.querySelector('.bec-attachment-popup-send');
            const recipient = modal.querySelector('.bec-attachment-popup-recipient');

            let activeInput = null;
            let previewUrl = '';

            const labels = window.chatifyLabels?.attachments || {};

            function formatSize(bytes) {
                if (!Number.isFinite(bytes) || bytes <= 0) return '';
                if (bytes < 1024) return `${bytes} B`;
                if (bytes < 1024 * 1024) return `${(bytes / 1024).toFixed(bytes < 1024 * 10 ? 1 : 0)} KB`;
                return `${(bytes / (1024 * 1024)).toFixed(1)} MB`;
            }

            function fileExtension(file) {
                const name = file?.name || '';
                const ext = name.includes('.') ? name.split('.').pop().toUpperCase() : '';
                return ext || (file?.type ? file.type.split('/').pop().toUpperCase() : labels.file);
            }

            function fileKind(file) {
                const type = file?.type || '';
                const ext = (file?.name || '').split('.').pop().toLowerCase();

                if (type.startsWith('image/')) return 'image';
                if (type.startsWith('video/')) return 'video';
                if (type.startsWith('audio/')) return 'audio';
                if (type === 'application/pdf' || ext === 'pdf') return 'pdf';
                if (['doc', 'docx', 'txt', 'rtf'].includes(ext)) return 'document';
                if (['xls', 'xlsx', 'csv'].includes(ext)) return 'spreadsheet';
                return 'file';
            }

            function setIcon(kind) {
                if (!icon) return;
                const icons = {
                    image: 'fas fa-image text-xl',
                    video: 'fas fa-video text-xl',
                    audio: 'fas fa-music text-xl',
                    pdf: 'fas fa-file-pdf text-xl',
                    document: 'fas fa-file-lines text-xl',
                    spreadsheet: 'fas fa-file-excel text-xl',
                    file: 'fas fa-file text-xl',
                };
                icon.className = icons[kind] || icons.file;
            }

            function closePopup(clearFile) {
                modal.classList.remove('is-open');
                modal.setAttribute('aria-hidden', 'true');
                document.documentElement.classList.remove('bec-attachment-popup-open');

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                    previewUrl = '';
                }

                if (imagePreview) {
                    imagePreview.removeAttribute('src');
                    imagePreview.classList.add('hidden');
                }

                if (videoPreview) {
                    videoPreview.pause();
                    videoPreview.removeAttribute('src');
                    videoPreview.load();
                    videoPreview.classList.add('hidden');
                }

                fileCard?.classList.remove('hidden');

                if (clearFile && activeInput) {
                    activeInput.value = '';
                    activeInput.dispatchEvent(new Event('input', { bubbles: true }));
                    activeInput.dispatchEvent(new Event('change', { bubbles: true }));
                }

                if (clearFile && caption) caption.value = '';
                if (clearFile) activeInput = null;
            }

            function openPopup(input) {
                const file = input?.files?.[0];
                if (!file) return;

                activeInput = input;
                const form = input.closest('form') || document.querySelector('#message-form');
                const mainInput = form?.querySelector('.m-send') || document.querySelector('.m-send');
                const conversationName = document.querySelector('.m-header-messaging .user-name')?.textContent?.trim()
                    || document.querySelector('.conversation-profile-trigger .user-name')?.textContent?.trim()
                    || window.chatifyLabels?.recipient
                    || 'Recipient';
                const kind = fileKind(file);
                const extension = fileExtension(file);
                const size = formatSize(file.size);

                if (fileName) fileName.textContent = file.name;
                if (fileMeta) fileMeta.textContent = [labels[kind] || labels.file, extension, size].filter(Boolean).join(' · ');
                if (caption && mainInput) caption.value = mainInput.value || '';
                if (recipient) recipient.textContent = conversationName;

                setIcon(kind);

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                    previewUrl = '';
                }

                if (kind === 'image' && imagePreview) {
                    previewUrl = URL.createObjectURL(file);
                    imagePreview.src = previewUrl;
                    imagePreview.classList.remove('hidden');
                    videoPreview?.classList.add('hidden');
                    if (videoPreview) {
                        videoPreview.pause();
                        videoPreview.removeAttribute('src');
                        videoPreview.load();
                    }
                    fileCard?.classList.add('hidden');
                } else if (kind === 'video' && videoPreview) {
                    previewUrl = URL.createObjectURL(file);
                    videoPreview.src = previewUrl;
                    videoPreview.classList.remove('hidden');
                    imagePreview?.classList.add('hidden');
                    if (imagePreview) imagePreview.removeAttribute('src');
                    fileCard?.classList.add('hidden');
                } else {
                    if (imagePreview) {
                        imagePreview.removeAttribute('src');
                        imagePreview.classList.add('hidden');
                    }
                    if (videoPreview) {
                        videoPreview.pause();
                        videoPreview.removeAttribute('src');
                        videoPreview.load();
                        videoPreview.classList.add('hidden');
                    }
                    fileCard?.classList.remove('hidden');
                }

                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                document.documentElement.classList.add('bec-attachment-popup-open');
                setTimeout(() => caption?.focus({ preventScroll: true }), 60);
            }

            // Delegated listener: works even when Chatify enables/replaces the file input later.
            document.addEventListener('change', function (event) {
                const input = event.target?.closest?.('.upload-attachment');
                if (!input || !input.files || !input.files.length) return;
                openPopup(input);
            }, true);

            cancelButtons.forEach((button) => {
                button.addEventListener('click', function () {
                    closePopup(true);
                });
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) closePopup(true);
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal.classList.contains('is-open')) {
                    closePopup(true);
                }
            });

            caption?.addEventListener('input', function () {
                const form = activeInput?.closest('form') || document.querySelector('#message-form');
                const mainInput = form?.querySelector('.m-send') || document.querySelector('.m-send');
                if (!mainInput) return;
                mainInput.value = caption.value;
                mainInput.dispatchEvent(new Event('input', { bubbles: true }));
            });

            sendButton?.addEventListener('click', function () {
                const form = activeInput?.closest('form') || document.querySelector('#message-form');
                const mainInput = form?.querySelector('.m-send') || document.querySelector('.m-send');
                const realSendButton = form?.querySelector('.send-button') || document.querySelector('.send-button');
                window.closeChatifyIosKeyboardAfterSend?.();

                if (mainInput && caption) {
                    mainInput.value = caption.value;
                    mainInput.dispatchEvent(new Event('input', { bubbles: true }));
                    mainInput.dispatchEvent(new Event('change', { bubbles: true }));
                }

                closePopup(false);

                if (realSendButton) {
                    realSendButton.disabled = false;
                    realSendButton.removeAttribute('disabled');
                    realSendButton.classList.remove('d-none');
                    realSendButton.classList.add('d-flex', 'inline-flex');
                    setTimeout(() => realSendButton.click(), 0);
                    return;
                }

                if (form) {
                    if (typeof form.requestSubmit === 'function') {
                        form.requestSubmit();
                    } else {
                        form.submit();
                    }
                }
            });
        });
    })();

</script>
@include('student.app.speaking.incomingInvitePopout')

@include('student.app.common.flash-message')
</body>
</html>
