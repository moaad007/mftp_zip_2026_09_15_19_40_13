<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="route_prefix" content="{{request()->segment(2)}}">
    <meta name="waba-pusher-key" content="{{ config('chatify.pusher.key') }}">
    <meta name="waba-pusher-cluster" content="{{ config('chatify.pusher.options.cluster') }}">
    <meta name="waba-pusher-auth-endpoint" content="{{ route('admin.waba.chat.pusher.auth') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{asset('template/libs/audio/player.min.css')}}?v=3"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            navy: { DEFAULT: '#1e3a5f', deep: '#0b1f3a' },
            accent: { DEFAULT: '#2563eb', strong: '#1d4ed8', soft: '#dbeafe', pale: '#eff6ff' },
            success: { DEFAULT: '#168a5b', strong: '#107348', soft: '#e6f5ed', border: '#9fd4ba' },
            whatsapp: { DEFAULT: '#128c5a', soft: '#e5f7ed' },
            amber: '#a85e00',
            red: { DEFAULT: '#b3261e', soft: '#fce8e6' },
            ink: '#172033',
            muted: { DEFAULT: '#667085', strong: '#475569' },
            canvas: '#f3f7fc',
            surface: { DEFAULT: '#ffffff', raised: '#ffffff', subtle: '#f7faff' },
            line: { DEFAULT: '#d9e3f0', strong: '#c7d4e5' },
            bubble: { 'in': '#ffffff', 'out': '#dceaff' },
            'message-text': { DEFAULT: '#0f1d33', out: '#0b2b57' },
          },
          borderRadius: { xs: '6px', sm: '8px', md: '12px', lg: '16px' },
          fontFamily: { sans: ['Aptos', '"Segoe UI Variable"', '"Segoe UI"', 'system-ui', 'sans-serif'] },
        },
      },
    }
    </script>
    <style>
:root {
  color-scheme: light;
  --navy: #1e3a5f;
  --navy-deep: #0b1f3a;
  --accent: #2563eb;
  --accent-strong: #1d4ed8;
  --accent-soft: #dbeafe;
  --accent-pale: #eff6ff;
  --success: #168a5b;
  --success-strong: #107348;
  --success-soft: #e6f5ed;
  --success-border: #9fd4ba;
  --whatsapp: #128c5a;
  --whatsapp-soft: #e5f7ed;
  --green: var(--accent);
  --green-strong: var(--accent-strong);
  --green-soft: var(--accent-soft);
  --green-pale: var(--accent-pale);
  --amber: #a85e00;
  --red: #b3261e;
  --red-soft: #fce8e6;
  --ink: #172033;
  --muted: #667085;
  --muted-strong: #475569;
  --canvas: #f3f7fc;
  --surface: #ffffff;
  --surface-raised: #ffffff;
  --surface-subtle: #f7faff;
  --line: #d9e3f0;
  --line-strong: #c7d4e5;
  --bubble-in: #ffffff;
  --bubble-out: #dceaff;
  --message-text: #0f1d33;
  --message-text-out: #0b2b57;
  --focus: #2563eb;
  --shadow-panel: 0 14px 45px rgba(30, 58, 95, .13);
  --shadow-float: 0 18px 55px rgba(11, 31, 58, .18);
  --radius-xs: 6px;
  --radius-sm: 8px;
  --radius-md: 12px;
  --radius-lg: 16px;
  --rail-width: 72px;
  --inbox-width: 368px;
  --drawer-width: 344px;
  font-family: Aptos, "Segoe UI Variable", "Segoe UI", system-ui, sans-serif;
}
* { box-sizing: border-box; }
html, body { width: 100%; height: 100%; margin: 0; }
body { overflow: hidden; background: var(--canvas); color: var(--ink); font-size: 14px; line-height: 1.45; }
button, input, textarea, select { font: inherit; color: inherit; }
button { cursor: pointer; }
button:disabled { cursor: not-allowed; opacity: .45; }
a { color: inherit; }
[hidden] { display: none !important; }
.svg-sprite { position: fixed; width: 0; height: 0; overflow: hidden; }
.icon { width: 20px; height: 20px; flex: none; fill: none; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.sr-only { position: absolute !important; width: 1px !important; height: 1px !important; padding: 0 !important; margin: -1px !important; overflow: hidden !important; clip: rect(0,0,0,0) !important; white-space: nowrap !important; border: 0 !important; }
:focus-visible { outline: 3px solid color-mix(in srgb, var(--focus) 40%, transparent); outline-offset: 2px; }
::selection { background: #cfe0ff; color: #0b1f3a; }
.app-shell {
  position: relative;
  display: grid;
  grid-template-columns: var(--rail-width) var(--inbox-width) minmax(0, 1fr);
  width: 100%;
  height: 100vh;
  height: 100dvh;
  min-height: 0;
  overflow: hidden;
  background: var(--canvas);
}
.utility-rail {
  z-index: 30;
  display: flex;
  min-height: 0;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  padding: 16px 10px 12px;
  background: var(--navy-deep);
  color: #e6eef9;
}
[data-tooltip]::after {
  position: absolute;
  z-index: 100;
  top: 50%;
  left: calc(100% + 10px);
  padding: 6px 8px;
  border-radius: 6px;
  background: var(--navy-deep);
  color: #fff;
  content: attr(data-tooltip);
  font-size: 11px;
  font-weight: 650;
  line-height: 1;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transform: translate(-4px,-50%);
  transition: opacity .14s ease, transform .14s ease;
}
[data-tooltip]:hover::after, [data-tooltip]:focus-visible::after { opacity: 1; transform: translate(0,-50%); }
.theme-icon-sun { display: none; }
.conversations-pane {
  z-index: 10;
  display: flex;
  min-width: 0;
  min-height: 0;
  flex-direction: column;
  border-right: 1px solid var(--line);
  background: var(--surface);
}
.inbox-header { padding: 22px 20px 12px; }
.mobile-brand { display: none; align-items: center; gap: 8px; margin-bottom: 18px; color: var(--navy); font-weight: 750; }
.brand-mini { display: grid; width: 30px; height: 30px; place-items: center; border-radius: 8px; background: var(--navy-deep); color: white; font-family: Georgia,serif; font-size: 18px; }
.inbox-title-row { display: flex; align-items: center; justify-content: space-between; gap: 16px; }
.workspace-name { margin: 0 0 2px; color: var(--green-strong); font-size: 12px; font-weight: 700; }
.inbox-title-row h1 { display: flex; align-items: center; gap: 8px; margin: 0; font-size: 25px; line-height: 1.15; letter-spacing: -.03em; }
.title-count { display: inline-grid; min-width: 24px; height: 24px; place-items: center; padding: 0 6px; border-radius: 999px; background: var(--surface-subtle); color: var(--muted); font-size: 11px; letter-spacing: 0; }
.button-icon {
  display: inline-grid;
  width: 40px;
  height: 40px;
  flex: none;
  place-items: center;
  border: 1px solid transparent;
  border-radius: 10px;
  background: transparent;
  color: var(--muted-strong);
}
.button-icon:hover { border-color: var(--line); background: var(--surface-subtle); color: var(--ink); }
.search-field {
  display: grid;
  grid-template-columns: auto minmax(0,1fr) auto;
  align-items: center;
  gap: 9px;
  height: 44px;
  margin-top: 18px;
  padding: 0 10px 0 12px;
  border: 1px solid var(--line);
  border-radius: var(--radius-md);
  background: var(--surface-subtle);
  color: var(--muted);
}
.search-field:focus-within { border-color: var(--accent); background: var(--surface); box-shadow: 0 0 0 3px color-mix(in srgb,var(--accent) 12%,transparent); }
.search-field .icon { width: 18px; height: 18px; }
.search-field input { min-width: 0; border: 0; outline: 0; background: transparent; font-size: 13px; }


.search-field input:not(:placeholder-shown) ~ kbd { display: none; }
.search-field input::placeholder { color: #7b8798; }
.search-field kbd, .shortcut-list kbd { min-width: 23px; padding: 2px 5px; border: 1px solid var(--line-strong); border-bottom-width: 2px; border-radius: 5px; background: var(--surface); color: var(--muted); font: 600 10px/1.4 inherit; text-align: center; }
.search-field button { display: grid; width: 28px; height: 28px; place-items: center; border: 0; border-radius: 6px; background: transparent; color: var(--muted); }
.search-field button .icon { width: 16px; height: 16px; }
.category-switch {
  display: grid;
  grid-template-columns: repeat(3,minmax(0,1fr));
  gap: 4px;
  margin: 0 20px;
  padding: 4px;
  border-radius: 10px;
  background: var(--surface-subtle);
}
.category-switch button {
  min-width: 0;
  min-height: 36px;
  border: 0;
  border-radius: 8px;
  background: transparent;
  color: var(--muted);
  font-size: 12px;
  font-weight: 700;
}
.category-switch button span { margin-left: 3px; color: #7b8798; font-size: 10px; }
.category-switch button[aria-pressed="true"] { background: var(--surface); color: var(--ink); box-shadow: 0 1px 4px rgba(30,58,95,.09); }
.category-switch button[aria-pressed="true"] span { color: var(--green-strong); }
.status-filters {
  display: flex;
  flex: none;
  gap: 6px;
  overflow-x: auto;
  padding: 14px 20px 11px;
  scrollbar-width: none;
}
.status-filters::-webkit-scrollbar { display: none; }
.status-filters button {
  min-height: 32px;
  flex: none;
  padding: 0 11px;
  border: 1px solid var(--line);
  border-radius: 999px;
  background: var(--surface);
  color: var(--muted);
  font-size: 11px;
  font-weight: 700;
}
.status-filters button[aria-pressed="true"] { border-color: var(--navy); background: var(--navy); color: white; }
.connection-banner { display: flex; align-items: center; gap: 9px; margin: 0 12px 8px; padding: 9px 12px; border-radius: 9px; background: #fff5df; color: #6f4300; }
.connection-banner > span { width: 8px; height: 8px; border-radius: 50%; background: #cc7900; }
.connection-banner div { display: flex; min-width: 0; flex-direction: column; }
.connection-banner strong { font-size: 11px; }
.connection-banner small { font-size: 10px; }
.contact-scroll { min-height: 0; flex: 1; overflow-y: auto; padding: 0 8px 12px; scrollbar-color: var(--line-strong) transparent; scrollbar-width: thin; }
#contact-list { display: grid; gap: 3px; }
.contact-item {
  position: relative;
  display: grid;
  grid-template-columns: auto minmax(0,1fr);
  width: 100%;
  min-height: 76px;
  align-items: center;
  gap: 11px;
  padding: 10px 11px;
  border: 0;
  border-radius: var(--radius-md);
  background: transparent;
  color: var(--ink);
  text-align: left;
}
.contact-item::before { position: absolute; top: 13px; bottom: 13px; left: 0; width: 3px; border-radius: 3px; background: var(--green); content: ""; opacity: 0; }
.contact-item:hover { background: var(--surface-subtle); }
.contact-item[aria-selected="true"] { background: var(--green-pale); }
.contact-item[aria-selected="true"]::before { opacity: 1; }
.avatar-wrap { position: relative; flex: none; }
.avatar {
  display: grid;
  flex: none;
  place-items: center;
  border-radius: 50%;
  background: var(--accent-soft);
  color: var(--navy);
  font-weight: 800;
  letter-spacing: -.03em;
}
.contact-avatar { width: 44px; height: 44px; font-size: 13px; }
.avatar-lg { width: 42px; height: 42px; font-size: 13px; }

.presence-dot { position: absolute; right: -1px; bottom: -1px; width: 12px; height: 12px; border: 2px solid var(--surface); border-radius: 50%; background: #b7c3bc; }
.presence-dot.online { background: var(--success); }
.contact-body { min-width: 0; }
.contact-row-top, .contact-preview-row, .contact-meta { display: flex; align-items: center; gap: 7px; }
.contact-row-top { margin-bottom: 3px; }
.contact-name { min-width: 0; flex: 1; overflow: hidden; color: var(--ink); font-size: 13px; font-weight: 750; text-overflow: ellipsis; white-space: nowrap; }
.contact-time { flex: none; color: var(--muted); font-size: 10px; }
.contact-preview-row { min-width: 0; }
.contact-preview { min-width: 0; flex: 1; overflow: hidden; color: var(--muted); font-size: 11px; text-overflow: ellipsis; white-space: nowrap; }
.contact-preview .you { color: var(--muted-strong); font-weight: 650; }
.unread-badge { display: grid; min-width: 19px; height: 19px; flex: none; place-items: center; padding: 0 5px; border-radius: 999px; background: var(--green); color: white; font-size: 10px; font-weight: 800; }
.contact-meta { min-height: 16px; margin-top: 5px; }
.status-label { display: inline-flex; align-items: center; gap: 4px; color: var(--muted); font-size: 9px; font-weight: 750; }
.status-label { padding: 2px 5px; border-radius: 4px; background: #fff1dc; color: #825000; }
.status-label.ai { background: #e9edf8; color: #425a8c; }
.inbox-footer { display: flex; min-height: 42px; align-items: center; gap: 6px; padding: 0 17px; border-top: 1px solid var(--line); color: var(--muted); font-size: 10px; }
.inbox-footer .status-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--success); }
.inbox-footer button { border: 0; background: transparent; color: var(--green-strong); font-size: 10px; font-weight: 700; }
.empty-state { text-align: center; }
.empty-state.compact { padding: 42px 24px; }
.empty-symbol { display: grid; width: 46px; height: 46px; margin: auto; place-items: center; border-radius: 50%; background: var(--surface-subtle); color: var(--muted); font-size: 24px; }
.empty-state h2 { margin: 13px 0 4px; font-size: 14px; }
.empty-state p { margin: 0 0 14px; color: var(--muted); font-size: 12px; }
.conversation-pane { min-width: 0; min-height: 0; background: var(--canvas); }
.chat-view { position: relative; display: flex; height: 100%; min-height: 0; flex-direction: column; }
.chat-header {
  position: relative;
  z-index: 20;
  display: flex;
  min-height: 70px;
  align-items: center;
  gap: 10px;
  padding: 10px 16px;
  border-bottom: 1px solid var(--line);
  background: color-mix(in srgb, var(--surface) 96%, transparent);
}
.mobile-back { display: none; }
.active-contact { display: flex; min-width: 0; flex: 1; align-items: center; gap: 10px; padding: 2px; border: 0; border-radius: 8px; background: transparent; text-align: left; }
.active-contact:hover .active-copy strong { color: var(--green-strong); }
.active-copy { display: flex; min-width: 0; flex-direction: column; }
.active-copy strong { overflow: hidden; color: var(--ink); font-size: 14px; font-weight: 760; text-overflow: ellipsis; white-space: nowrap; }
.active-copy small { overflow: hidden; color: var(--muted); font-size: 11px; text-overflow: ellipsis; white-space: nowrap; }
.chat-actions { display: flex; flex: none; align-items: center; gap: 4px; }
.button-resolve {
  display: inline-flex;
  min-height: 40px;
  align-items: center;
  gap: 7px;
  padding: 0 12px;
  border: 1px solid color-mix(in srgb,var(--accent) 34%,var(--line));
  border-radius: 10px;
  background: var(--accent-soft);
  color: var(--accent-strong);
  font-size: 11px;
  font-weight: 750;
}
.button-resolve .icon { width: 17px; height: 17px; }

.floating-panel {
  z-index: 80;
  border: 1px solid var(--line);
  border-radius: var(--radius-md);
  background: var(--surface-raised);
  box-shadow: var(--shadow-float);
}
.header-menu { position: absolute; top: 58px; right: 12px; width: 220px; padding: 7px; }
.menu-panel button {
  display: flex;
  width: 100%;
  min-height: 39px;
  align-items: center;
  gap: 10px;
  padding: 0 10px;
  border: 0;
  border-radius: 7px;
  background: transparent;
  color: var(--ink);
  font-size: 12px;
  text-align: left;
}
.menu-panel button:hover, .menu-panel button:focus-visible { background: var(--surface-subtle); }
.menu-panel .icon { width: 17px; height: 17px; color: var(--muted); }
.menu-panel hr { height: 1px; margin: 6px 3px; border: 0; background: var(--line); }
.menu-panel .danger-menu { color: var(--red); }
.menu-panel .danger-menu .icon { color: var(--red); }
.menu-panel .mobile-menu-only { display: none; }
.menu-panel .mobile-menu-only .icon { color: var(--green-strong); }
.menu-glyph { width: 17px; color: var(--green); text-align: center; }
.conversation-search {
  z-index: 15;
  display: grid;
  grid-template-columns: auto minmax(0,1fr) auto auto;
  min-height: 48px;
  align-items: center;
  gap: 9px;
  padding: 6px 16px;
  border-bottom: 1px solid var(--line);
  background: var(--surface);
  color: var(--muted);
}
.conversation-search > .icon { width: 18px; height: 18px; }
.conversation-search input { min-width: 0; height: 36px; border: 0; outline: 0; background: transparent; }
.conversation-search span { font-size: 10px; white-space: nowrap; }
.blocked-banner {
  display: flex;
  min-height: 52px;
  align-items: center;
  gap: 10px;
  padding: 8px 16px;
  border-bottom: 1px solid #f1cac6;
  background: var(--red-soft);
  color: #70201a;
}
.blocked-banner > .icon { width: 19px; height: 19px; }
.blocked-banner div { display: flex; min-width: 0; flex: 1; flex-direction: column; }
.blocked-banner strong { font-size: 11px; }
.blocked-banner span { font-size: 10px; }
.blocked-banner button { min-height: 32px; padding: 0 10px; border: 1px solid #c67770; border-radius: 7px; background: transparent; color: #70201a; font-size: 10px; font-weight: 750; }
.message-scroll {
  position: relative;
  flex: 1;
  min-height: 0;
  overflow-y: auto;
  padding: 24px 0 18px;
  background-color: #f4f8fc;
  background-image: url("./edu-chat-pattern.svg");
  background-repeat: repeat;
  background-size: 560px 380px;
  background-position: 0 0;
  background-blend-mode: normal;
  overscroll-behavior: contain;
  scrollbar-color: var(--line-strong) transparent;
  scrollbar-width: thin;
}
.thread { display: flex; width: 100%; min-height: 100%; margin: 0; flex-direction: column; justify-content: flex-end; gap: 5px; }
.date-separator { display: flex; align-items: center; gap: 12px; margin: 14px 0 18px; color: var(--muted); font-size: 10px; font-weight: 700; }
.date-separator::before, .date-separator::after { height: 1px; flex: 1; background: var(--line); content: ""; }
.date-separator span { padding: 5px 9px; border: 1px solid var(--line); border-radius: 999px; background: color-mix(in srgb, var(--surface) 88%, transparent); }
.thread-empty { display: grid; flex: 1; place-items: center; align-content: center; padding: 40px 20px; text-align: center; }
.thread-empty span { display: grid; width: 56px; height: 56px; place-items: center; border-radius: 50%; background: var(--green-soft); color: var(--green-strong); font-size: 25px; }
.thread-empty h2 { margin: 14px 0 5px; font-size: 16px; }
.thread-empty p { max-width: 340px; margin: 0; color: var(--muted); font-size: 12px; }
.message-row { display: flex; max-width: min(76%, 600px); align-items: flex-end; gap: 7px; }
.message-row.incoming { align-self: flex-start; margin-left: clamp(8px,1vw,14px); }
.message-row.outgoing { align-self: flex-end; margin-right: clamp(8px,1vw,14px); flex-direction: row-reverse; }
.message-stack { min-width: 0; }
.message-sender { margin: 0 0 3px 3px; color: var(--muted); font-size: 10px; font-weight: 650; }
.message-bubble {
  position: relative;
  min-width: 92px;
  padding: 9px 11px 6px;
  border: 1px solid var(--line);
  border-radius: 4px 13px 13px 13px;
  background: var(--bubble-in);
  box-shadow: 0 2px 6px rgba(30,58,95,.045);
}
.outgoing .message-bubble { border-color: #b8cff1; border-radius: 13px 4px 13px 13px; background: var(--bubble-out); }
.message-bubble p { margin: 0; overflow-wrap: anywhere; color: var(--message-text); font-size: 14px; font-weight: 600; letter-spacing: -.006em; line-height: 1.52; text-wrap: pretty; white-space: pre-wrap; }
.outgoing .message-bubble p { color: var(--message-text-out); }
.message-bubble mark { border-radius: 2px; background: #ffe693; color: inherit; }
.message-meta { display: flex; align-items: center; justify-content: flex-end; gap: 5px; margin-top: 4px; color: var(--muted); font-size: 9px; }
.delivery { color: var(--muted); font-weight: 800; letter-spacing: -.12em; }
.delivery.read { color: #1571b8; }
.delivery.failed { color: var(--red); letter-spacing: 0; }
.message-channel { color: var(--muted); font-size: 9px; font-weight: 650; }
.message-avatar { display: grid; width: 26px; height: 26px; flex: none; place-items: center; border-radius: 50%; background: var(--accent-soft); color: var(--navy); font-size: 8px; font-weight: 800; }


.bubble-reply { margin-bottom: 7px; padding: 6px 8px; border-left: 3px solid var(--accent); border-radius: 5px; background: color-mix(in srgb,var(--accent) 8%,transparent); }
.bubble-reply small { display: block; margin-bottom: 2px; color: var(--green-strong); font-size: 9px; font-weight: 750; }
.bubble-reply span { display: block; overflow: hidden; color: var(--muted-strong); font-size: 10px; text-overflow: ellipsis; white-space: nowrap; }
.message-attachment { min-width: 210px; margin-bottom: 7px; overflow: hidden; border-radius: 8px; }
.message-attachment.image { cursor: zoom-in; }
.message-attachment img { display: block; width: 100%; max-height: 260px; object-fit: cover; }
.file-card { display: flex; align-items: center; gap: 9px; padding: 9px; background: rgba(255,255,255,.62); }
.file-card .file-mark { display: grid; width: 34px; height: 38px; place-items: center; border-radius: 6px; background: var(--surface); color: var(--navy); }
.file-card div { min-width: 0; }
.file-card strong, .file-card small { display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.file-card strong { font-size: 10px; }
.file-card small { color: var(--muted); font-size: 9px; }
.scroll-latest {
  position: sticky;
  bottom: 8px;
  left: 50%;
  display: inline-flex;
  min-height: 36px;
  align-items: center;
  gap: 7px;
  padding: 0 12px;
  border: 1px solid var(--line);
  border-radius: 999px;
  background: var(--surface);
  color: var(--ink);
  box-shadow: var(--shadow-panel);
  font-size: 10px;
  font-weight: 750;
  transform: translateX(-50%);
}
.scroll-latest .icon { width: 14px; height: 14px; }
.composer-shell { position: relative; z-index: 18; border-top: 1px solid var(--line); background: var(--surface); }
.composer-inner { width: min(100%, 940px); margin: auto; padding: 10px 16px 8px; }
.reply-preview, .attachment-preview {
  display: flex;
  min-height: 48px;
  align-items: center;
  gap: 10px;
  margin-bottom: 8px;
  padding: 7px 9px 7px 11px;
  border: 1px solid var(--line);
  border-left: 3px solid var(--green);
  border-radius: 9px;
  background: var(--surface-subtle);
}
.reply-preview > .icon { width: 17px; height: 17px; color: var(--green-strong); }
.reply-preview div, .attachment-preview div { min-width: 0; flex: 1; }
.reply-preview small, .reply-preview strong, .attachment-preview strong, .attachment-preview small { display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.reply-preview small, .attachment-preview small { color: var(--muted); font-size: 9px; }
.reply-preview strong, .attachment-preview strong { font-size: 11px; }
.reply-preview .button-icon, .attachment-preview .button-icon { width: 32px; height: 32px; }
.attachment-preview { border-left-color: var(--navy); }
.attachment-preview-icon { display: grid; width: 34px; height: 34px; place-items: center; border-radius: 7px; background: #e6edf3; color: var(--navy); }
.composer-entry-row { display: flex; min-width: 0; align-items: flex-end; gap: 7px; }
.composer-speed-dial { position: relative; display: flex; flex: none; align-items: center; padding-bottom: 6px; }
.speed-dial-trigger {
  display: grid;
  width: 40px;
  height: 40px;
  place-items: center;
  border: 1px solid color-mix(in srgb,var(--accent) 34%,var(--line));
  border-radius: 12px;
  background: var(--green-pale);
  color: var(--green-strong);
  box-shadow: 0 1px 3px rgba(30,58,95,.09);
  transition: border-color .15s ease, background .15s ease, color .15s ease, transform .15s ease;
}
.speed-dial-trigger:hover,
.speed-dial-trigger[aria-expanded="true"] { border-color: var(--green); background: var(--green-soft); }
.speed-dial-trigger:active { transform: scale(.96); }
.speed-dial-trigger:focus-visible { outline: 2px solid var(--focus); outline-offset: 2px; }
.speed-dial-trigger:disabled { cursor: not-allowed; opacity: .45; }
.speed-dial-trigger .icon { width: 18px; height: 18px; transition: transform .16s ease; }
.speed-dial-trigger[aria-expanded="true"] .icon { transform: rotate(45deg); }
.speed-dial-menu {
  position: absolute;
  z-index: 95;
  bottom: calc(100% + 8px);
  left: 0;
  display: grid;
  width: min(236px,calc(100vw - 24px));
  gap: 3px;
  padding: 6px;
  transform-origin: bottom left;
}
.speed-dial-menu:not([hidden]) { animation: speed-dial-in .14s ease-out; }
@keyframes speed-dial-in {
  from { opacity: 0; transform: translateY(5px) scale(.97); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}
.speed-dial-action {
  display: grid;
  width: 100%;
  min-height: 48px;
  grid-template-columns: 36px minmax(0,1fr) 16px;
  align-items: center;
  gap: 9px;
  padding: 5px 8px;
  border: 0;
  border-radius: 9px;
  background: transparent;
  color: var(--ink);
  text-align: left;
}
.speed-dial-action:hover,
.speed-dial-action:focus-visible,
.speed-dial-action[aria-expanded="true"] { background: var(--surface-subtle); }
.speed-dial-action:focus-visible { outline: 2px solid var(--focus); outline-offset: -2px; }
.speed-dial-action:disabled { cursor: not-allowed; opacity: .42; }
.speed-dial-action-icon {
  display: grid;
  width: 36px;
  height: 36px;
  place-items: center;
  border-radius: 10px;
  background: var(--green-soft);
  color: var(--green-strong);
}
.speed-dial-action-icon .icon { width: 17px; height: 17px; }
.speed-dial-greeting { background: #fff1d9; font-size: 17px; }
.speed-dial-action-copy { min-width: 0; }
.speed-dial-action-copy strong,
.speed-dial-action-copy small { display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.speed-dial-action-copy strong { font-size: 11px; line-height: 1.25; }
.speed-dial-action-copy small { margin-top: 2px; color: var(--muted); font-size: 9px; line-height: 1.3; }
.speed-dial-chevron { width: 14px; height: 14px; color: var(--muted); transform: rotate(-90deg); }
.channel-trigger[data-channel="whatsapp"] .speed-dial-action-icon { background: var(--whatsapp-soft); color: var(--whatsapp); }
.channel-trigger[data-channel="support"] .speed-dial-action-icon { background: #e0f2fe; color: #0369a1; }
.channel-trigger[data-channel="email"] .speed-dial-action-icon { background: #e7eef9; color: #356ab2; }
.channel-trigger[data-channel="sms"] .speed-dial-action-icon { background: #fff0d9; color: var(--amber); }
.composer-form { display: grid; min-width: 0; flex: 1; grid-template-columns: auto auto minmax(0,1fr) auto; align-items: end; gap: 2px; padding: 5px; border: 1px solid var(--line-strong); border-radius: var(--radius-md); background: var(--surface-subtle); }
.composer-form:focus-within { border-color: var(--accent); box-shadow: 0 0 0 3px color-mix(in srgb,var(--accent) 12%,transparent); }
.composer-button { display: grid; width: 40px; height: 40px; place-items: center; border: 0; border-radius: 8px; background: transparent; color: var(--muted); }
.composer-button:hover, .composer-button[aria-expanded="true"] { background: var(--surface); color: var(--green-strong); }
.composer-form textarea { width: 100%; min-height: 40px; max-height: 132px; resize: none; padding: 9px 8px 7px; overflow-y: auto; border: 0; outline: 0; background: transparent; font-size: 13px; line-height: 1.5; }
.composer-form textarea::placeholder { color: #7b8798; }
.send-button { display: grid; width: 40px; height: 40px; place-items: center; border: 0; border-radius: 9px; background: var(--green); color: white; }
.send-button:not(:disabled):hover { background: var(--green-strong); }
.send-button .icon { width: 18px; height: 18px; }
.composer-foot { display: flex; justify-content: space-between; gap: 12px; min-height: 18px; padding: 5px 4px 0; color: var(--muted); font-size: 9px; }
.composer-popup { position: absolute; bottom: calc(100% - 4px); left: max(16px, calc(50% - 450px)); }
.channel-menu { width: 292px; padding: 10px; }
.channel-menu-heading { margin: 0 2px 8px; }
.channel-menu-heading .button-icon { width: 32px; height: 32px; }
.channel-options { display: grid; gap: 4px; }
.channel-option {
  position: relative;
  display: grid;
  width: 100%;
  min-height: 50px;
  grid-template-columns: 38px minmax(0,1fr) 18px;
  align-items: center;
  gap: 10px;
  padding: 7px 9px;
  border: 1px solid transparent;
  border-radius: 10px;
  background: transparent;
  color: var(--ink);
  text-align: left;
}
.channel-option:hover,
.channel-option:focus-visible { background: var(--surface-subtle); }
.channel-option:focus-visible { outline: 2px solid var(--focus); outline-offset: -2px; }
.channel-option[aria-checked="true"] { border-color: color-mix(in srgb,var(--green) 28%,var(--line)); background: var(--green-pale); }
.channel-option-icon {
  display: grid;
  width: 38px;
  height: 38px;
  place-items: center;
  border-radius: 11px;
  background: var(--green-soft);
  color: var(--green-strong);
}
.channel-option-icon .icon { width: 19px; height: 19px; }
.channel-option-icon.whatsapp { background: var(--whatsapp-soft); color: var(--whatsapp); }
.channel-option-icon.support { background: #e0f2fe; color: #0369a1; }
.channel-option-icon.email { background: #e7eef9; color: #356ab2; }
.channel-option-icon.sms { background: #fff0d9; color: var(--amber); }
.channel-option-copy { min-width: 0; }
.channel-option-copy strong,
.channel-option-copy small { display: block; }
.channel-option-copy strong { font-size: 11px; line-height: 1.25; }
.channel-option-copy small { margin-top: 2px; color: var(--muted); font-size: 9px; line-height: 1.3; }
.channel-option-check { display: grid; width: 18px; height: 18px; place-items: center; border-radius: 50%; color: var(--green-strong); opacity: 0; }
.channel-option-check .icon { width: 14px; height: 14px; }
.channel-option[aria-checked="true"] .channel-option-check { opacity: 1; }
.action-panel { width: 270px; padding: 9px; }
.action-panel > p { margin: 2px 6px 7px; color: var(--muted); font-size: 10px; font-weight: 700; }
.action-panel > button { display: flex; width: 100%; align-items: center; gap: 10px; padding: 8px; border: 0; border-radius: 8px; background: transparent; text-align: left; }
.action-panel > button:hover { background: var(--surface-subtle); }
.action-panel button > span:last-child { min-width: 0; }
.action-panel strong, .action-panel small { display: block; }
.action-panel strong { font-size: 11px; }
.action-panel small { margin-top: 2px; color: var(--muted); font-size: 9px; }
.action-icon { display: grid; width: 38px; height: 38px; flex: none; place-items: center; border-radius: 10px; }
.action-icon.image { background: #e0e7ff; color: #4338ca; }
.action-icon.document { background: #e7edf5; color: #31597e; }
.emoji-panel { width: 304px; padding: 12px; }
.panel-heading { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 10px; }
.panel-heading strong, .panel-heading small { display: block; }
.panel-heading strong { font-size: 12px; }
.panel-heading small { margin-top: 2px; color: var(--muted); font-size: 9px; }
.panel-heading .button-icon { width: 32px; height: 32px; }
.emoji-grid { display: grid; grid-template-columns: repeat(8,1fr); gap: 3px; }
.emoji-grid button { display: grid; aspect-ratio: 1; place-items: center; border: 0; border-radius: 6px; background: transparent; font-size: 20px; }
.emoji-grid button:hover, .emoji-grid button:focus-visible { background: var(--surface-subtle); }
.template-panel { width: 340px; padding: 12px; }
.mini-search { display: flex; height: 36px; align-items: center; gap: 7px; padding: 0 9px; border: 1px solid var(--line); border-radius: 8px; background: var(--surface-subtle); }
.mini-search .icon { width: 16px; height: 16px; color: var(--muted); }
.mini-search input { min-width: 0; flex: 1; border: 0; outline: 0; background: transparent; font-size: 11px; }
.template-list { display: grid; max-height: 260px; gap: 4px; margin-top: 8px; overflow-y: auto; }
.template-item { width: 100%; padding: 9px 10px; border: 0; border-radius: 8px; background: transparent; text-align: left; }
.template-item:hover { background: var(--surface-subtle); }
.template-item strong { display: block; margin-bottom: 3px; font-size: 11px; }
.template-item span { display: -webkit-box; overflow: hidden; color: var(--muted); font-size: 10px; -webkit-box-orient: vertical; -webkit-line-clamp: 2; }
.empty-conversation { display: grid; height: 100%; place-items: center; align-content: center; padding: 32px; text-align: center; }
.empty-conversation-mark { display: grid; width: 74px; height: 74px; place-items: center; border: 1px solid color-mix(in srgb,var(--accent) 28%,var(--line)); border-radius: 50%; background: var(--accent-soft); color: var(--accent-strong); }
.empty-conversation-mark .icon { width: 34px; height: 34px; }
.empty-conversation h2 { margin: 18px 0 7px; font-size: 21px; letter-spacing: -.025em; }
.empty-conversation p { max-width: 410px; margin: 0 0 20px; color: var(--muted); font-size: 12px; }
.button-primary, .button-secondary, .button-danger {
  display: inline-flex;
  min-height: 40px;
  align-items: center;
  justify-content: center;
  gap: 7px;
  padding: 0 14px;
  border-radius: 9px;
  font-size: 11px;
  font-weight: 750;
}
.button-secondary { border: 1px solid var(--line-strong); background: var(--surface); color: var(--muted-strong); }
.button-secondary:hover { background: var(--surface-subtle); color: var(--ink); }
.button-danger { border: 1px solid #c7564d; background: var(--red); color: white; }
.button-danger:hover { background: #922019; }
.button-secondary .icon, .button-danger .icon { width: 17px; height: 17px; }
.contact-drawer {
  z-index: 35;
  display: none;
  min-width: 0;
  min-height: 0;
  flex-direction: column;
  border-left: 1px solid var(--line);
  background: var(--surface);
}
.app-shell.details-open { grid-template-columns: var(--rail-width) var(--inbox-width) minmax(0,1fr) var(--drawer-width); }
.app-shell.details-open .contact-drawer { display: flex; }
.drawer-backdrop { display: none; }
.drawer-body { min-height: 0; flex: 1; overflow-y: auto; padding: 20px 18px; }
.tag-list { display: flex; flex-wrap: wrap; justify-content: center; gap: 5px; margin-top: 11px; }
.tag { padding: 4px 7px; border-radius: 999px; background: var(--surface-subtle); color: var(--muted-strong); font-size: 9px; font-weight: 700; }
.detail-section { margin-top: 22px; }
.detail-section > h3 { margin: 0 0 9px; color: var(--ink); font-size: 11px; font-weight: 750; }
.detail-section dl { margin: 0; border: 1px solid var(--line); border-radius: 10px; overflow: hidden; }
.detail-section dl div { display: grid; grid-template-columns: 80px minmax(0,1fr); gap: 10px; padding: 9px 11px; border-bottom: 1px solid var(--line); }
.detail-section dl div:last-child { border-bottom: 0; }
.detail-section dt { color: var(--muted); font-size: 10px; }
.detail-section dd { margin: 0; overflow-wrap: anywhere; color: var(--ink); font-size: 10px; font-weight: 650; }
.detail-section textarea { width: 100%; resize: vertical; padding: 9px 10px; border: 1px solid var(--line); border-radius: 9px; outline: 0; background: var(--surface-subtle); font-size: 11px; line-height: 1.5; }
.detail-section textarea:focus { border-color: var(--accent); box-shadow: 0 0 0 3px color-mix(in srgb,var(--accent) 11%,transparent); }
.metric-row { display: grid; grid-template-columns: repeat(2,1fr); gap: 8px; }
.metric-row div { padding: 10px; border: 1px solid var(--line); border-radius: 9px; background: var(--surface-subtle); }
.metric-row strong, .metric-row span { display: block; }
.metric-row strong { overflow: hidden; font-size: 14px; text-overflow: ellipsis; white-space: nowrap; }
.metric-row span { margin-top: 2px; color: var(--muted); font-size: 9px; }
.drawer-footer { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; padding: 12px 14px max(12px,env(safe-area-inset-bottom)); border-top: 1px solid var(--line); }
dialog {
  max-width: calc(100vw - 32px);
  padding: 0;
  overflow: hidden;
  border: 1px solid var(--line);
  border-radius: 14px;
  background: var(--surface);
  color: var(--ink);
  box-shadow: var(--shadow-float);
}
dialog::backdrop { background: rgba(7,17,31,.55); backdrop-filter: blur(2px); }
.modal-dialog { width: min(460px,calc(100vw - 32px)); }
.modal-header { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 17px 18px; border-bottom: 1px solid var(--line); }
.confirm-dialog { width: min(390px,calc(100vw - 32px)); padding: 24px; text-align: center; }
.confirm-mark { display: grid; width: 48px; height: 48px; margin: 0 auto 13px; place-items: center; border-radius: 50%; background: var(--red-soft); color: var(--red); }
.confirm-dialog h2 { margin: 0 0 7px; font-size: 18px; }
.confirm-dialog p { margin: 0; color: var(--muted); font-size: 12px; line-height: 1.55; }
.confirm-actions { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-top: 20px; }
.shortcuts-dialog { width: min(410px,calc(100vw - 32px)); }
.shortcut-list { display: grid; padding: 9px 18px 18px; }
.shortcut-list > div { display: flex; min-height: 46px; align-items: center; justify-content: space-between; gap: 16px; border-bottom: 1px solid var(--line); color: var(--muted-strong); font-size: 11px; }
.shortcut-list > div:last-child { border-bottom: 0; }
.toast-stack { position: fixed; z-index: 200; right: 18px; bottom: 18px; display: grid; width: min(340px,calc(100vw - 32px)); gap: 8px; pointer-events: none; }
.toast { display: flex; align-items: flex-start; gap: 10px; padding: 11px 12px; border: 1px solid var(--line); border-radius: 10px; background: var(--surface-raised); box-shadow: var(--shadow-float); color: var(--ink); pointer-events: auto; }
.toast-mark { display: grid; width: 24px; height: 24px; flex: none; place-items: center; border-radius: 50%; background: var(--green-soft); color: var(--green-strong); font-size: 12px; font-weight: 800; }
.toast.error .toast-mark { background: var(--red-soft); color: var(--red); }
.toast-copy { min-width: 0; flex: 1; }
.toast-copy strong, .toast-copy span { display: block; }
.toast-copy strong { font-size: 11px; }
.toast-copy span { margin-top: 2px; color: var(--muted); font-size: 10px; }
.toast button { border: 0; background: transparent; color: var(--green-strong); font-size: 10px; font-weight: 750; }
body.dark {
  color-scheme: dark;
  --navy: #9ec5ef;
  --navy-deep: #07172b;
  --accent: #60a5fa;
  --accent-strong: #93c5fd;
  --accent-soft: #132b4c;
  --accent-pale: #0f2340;
  --success: #34d399;
  --success-strong: #6ee7b7;
  --success-soft: #123c2e;
  --success-border: #2e6d54;
  --whatsapp: #25d366;
  --whatsapp-soft: #123c2e;
  --green: var(--accent);
  --green-strong: var(--accent-strong);
  --green-soft: var(--accent-soft);
  --green-pale: var(--accent-pale);
  --amber: #e9a646;
  --red: #e36c63;
  --red-soft: #3f201f;
  --ink: #eff6ff;
  --muted: #9eadc2;
  --muted-strong: #c9d5e5;
  --canvas: #07111f;
  --surface: #0d1b2e;
  --surface-raised: #12233a;
  --surface-subtle: #132137;
  --line: #243652;
  --line-strong: #334966;
  --bubble-in: #12223a;
  --bubble-out: #173a70;
  --message-text: #f4f7ff;
  --message-text-out: #ffffff;
  --focus: #60a5fa;
  --shadow-panel: 0 14px 45px rgba(0,0,0,.26);
  --shadow-float: 0 18px 55px rgba(0,0,0,.4);
}
body.dark .message-scroll {
  background-color: #081523;
  background-image: url("./edu-chat-pattern.svg");
  background-size: 560px 380px;
  background-position: 0 0;
  background-blend-mode: screen;
}
body.dark .theme-icon-moon { display: none; }
body.dark .theme-icon-sun { display: block; }
body.dark .rail-brand { background: #dbeafe; }
body.dark .presence-dot { border-color: var(--surface); }
body.dark .status-label { background: #3a2c19; color: #edb567; }
body.dark .status-label.ai { background: #232d44; color: #a8bfea; }
body.dark .blocked-banner { border-color: #5c2c28; }
body.dark .file-card { background: rgba(0,0,0,.13); }
@media (max-width: 1319px) {
  :root { --rail-width: 64px; --inbox-width: 334px; }
  .utility-rail { padding-inline: 8px; }
  .rail-button, .profile-chip, .rail-brand { width: 42px; height: 42px; }
  .app-shell.details-open { grid-template-columns: var(--rail-width) var(--inbox-width) minmax(0,1fr); }
  .contact-drawer {
    position: fixed;
    z-index: 120;
    top: 0;
    right: 0;
    bottom: 0;
    display: flex;
    width: min(var(--drawer-width),calc(100vw - 32px));
    box-shadow: var(--shadow-float);
    transform: translateX(102%);
    transition: transform .18s ease;
  }
  .app-shell.details-open .contact-drawer { transform: translateX(0); }
  .drawer-backdrop { position: fixed; z-index: 110; inset: 0; display: block; border: 0; background: rgba(7,17,31,.38); }
}
@media (max-width: 959px) {
  :root { --inbox-width: 320px; }
  .app-shell { grid-template-columns: var(--inbox-width) minmax(0,1fr); }
  .utility-rail { display: none; }
  .mobile-brand { display: flex; }
  .inbox-header { padding-top: 16px; }
  .workspace-name { display: none; }
  [data-tooltip]::after { display: none; }
  .button-resolve { width: 40px; height: 40px; justify-content: center; padding: 0; }
  .button-resolve span { display: none; }
  .composer-inner { padding-inline: 12px; }
  .message-scroll { padding-inline: 0; }
  .message-row.has-media,
  .message-row.has-audio { max-width: calc(100% - 24px); }
  .message-row.has-media .message-stack,
  .message-row.has-audio .message-stack,
  .message-row.has-media .message-bubble,
  .message-row.has-audio .message-bubble { max-width: 100%; }
  .message-attachment.media-card,
  .message-attachment.audio-card,
  .message-attachment.audio-card.is-voice {
    width: min(390px,100%);
    min-width: 0;
    max-width: 100%;
  }
}
@media (max-width: 759px) {
  body { overscroll-behavior: none; }
  .app-shell { display: block; position: relative; }
  .conversations-pane, .conversation-pane { position: absolute; inset: 0; width: 100%; height: 100%; }
  .conversation-pane { display: none; }
  .app-shell.conversation-open .conversations-pane { display: none; }
  .app-shell.conversation-open .conversation-pane { display: block; }
  .mobile-back { display: inline-grid; }
  .chat-view { height: 100%; }
  .chat-header { min-height: 62px; padding: 8px 9px; padding-top: max(8px,env(safe-area-inset-top)); }
  .avatar-lg { width: 38px; height: 38px; }
  .button-resolve { display: none; }
  .menu-panel .mobile-menu-only { display: flex; }
  .header-menu button { min-height: 44px; }
  .chat-actions { gap: 1px; }
  .hide-small { display: none; }
  .message-scroll { padding: 17px 0 12px; }
  .thread { width: 100%; }
  .message-row { max-width: 88%; }
  .composer-inner { padding: 8px 8px max(6px,env(safe-area-inset-bottom)); }

  .speed-dial-trigger { width: 44px; height: 44px; }
  .speed-dial-menu {
    width: min(244px,calc(100vw - 16px));
    max-height: calc(100dvh - 88px);
    overflow-y: auto;
  }
  .speed-dial-action { min-height: 52px; }
  .composer-foot { display: none; }
  .composer-popup {
    position: fixed;
    z-index: 150;
    right: 8px;
    bottom: max(8px,env(safe-area-inset-bottom));
    left: 8px;
    width: auto;
    max-height: min(430px,70vh);
    border-radius: 14px;
  }
  .channel-menu {
    max-height: min(360px,calc(100dvh - 16px));
    padding: 14px 12px max(14px,env(safe-area-inset-bottom));
    overflow-y: auto;
    border-radius: 18px;
  }
  .channel-menu-heading { margin-bottom: 10px; }
  .channel-option { min-height: 58px; padding: 8px 10px; }
  .channel-option-copy strong { font-size: 13px; }
  .channel-option-copy small { font-size: 11px; }
  .template-panel { padding-bottom: max(12px,env(safe-area-inset-bottom)); }
  .emoji-grid { grid-template-columns: repeat(8,1fr); }
  .drawer-backdrop { background: rgba(7,17,31,.48); }
  .contact-drawer { width: 100%; max-width: 100%; }
  .toast-stack { right: 10px; bottom: max(10px,env(safe-area-inset-bottom)); left: 10px; width: auto; }
  .inbox-footer { padding-bottom: env(safe-area-inset-bottom); }
  dialog { margin-bottom: max(16px,env(safe-area-inset-bottom)); }
}
@media (max-width: 399px) {
  .inbox-header { padding-inline: 14px; }
  .category-switch { margin-inline: 14px; }
  .status-filters { padding-inline: 14px; }
  .active-copy small { max-width: 150px; }
  .message-row { max-width: 93%; }
  .composer-button { width: 36px; }
  .send-button { width: 38px; }
  .composer-form textarea { padding-inline: 4px; }

  .emoji-grid { grid-template-columns: repeat(6,1fr); }
}
@media (max-height: 560px) and (orientation: landscape) {
  .inbox-header { padding-top: 10px; }
  .mobile-brand { display: none; }

  .composer-inner { padding-top: 5px; }
  .chat-header { min-height: 56px; }
}
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; }
}
@media (forced-colors: active) {
  .contact-item[aria-selected="true"], .status-filters button[aria-pressed="true"], .category-switch button[aria-pressed="true"] { outline: 2px solid Highlight; }
  .presence-dot, .status-dot { border: 1px solid CanvasText; }
  .speed-dial-trigger, .speed-dial-menu, .speed-dial-action, .channel-menu, .channel-option { border: 1px solid CanvasText; }
}

/* Readability and touch-target refinement */
.contact-name { font-size: 14px; }
.contact-preview { font-size: 12px; }
.contact-time, .status-label { font-size: 10px; }
.message-sender { font-size: 11px; }
.message-bubble p { font-size: 14px; }
.message-meta, .message-channel { font-size: 10px; }
.composer-foot, .inbox-footer, .inbox-footer button { font-size: 10px; }
.tag, .detail-section dt, .detail-section dd, .detail-section textarea { font-size: 10px; }

@media (max-width: 759px) {
  .button-icon, .button-resolve { width: 44px; height: 44px; min-height: 44px; }
  .category-switch button, .status-filters button { min-height: 44px; }
  .composer-button, .send-button { width: 44px; height: 44px; }
}

/* Voice messages and comprehensive emoji picker */
.composer-form {
  grid-template-columns: auto auto minmax(0,1fr) auto auto;
}
.composer-form .send-button { display: none; }
.composer-form.has-sendable-content .record-button { display: none; }
.composer-form.has-sendable-content .send-button,
.composer-form.audio-disabled .send-button { display: grid; }
.record-button { color: var(--green-strong); }
.record-button:disabled::after { display: none; }
.record-button::after {
  content: "";
  position: absolute;
  width: 6px;
  height: 6px;
  margin: -26px 0 0 24px;
  border: 2px solid var(--surface-subtle);
  border-radius: 50%;
  background: #e5484d;
}
.composer-button { position: relative; }
.composer-shell.is-recording .composer-entry-row,
.composer-shell.is-recording .composer-foot,
.composer-shell.is-recording .reply-preview,
.composer-shell.is-recording .attachment-preview { display: none; }

.voice-recorder {
  display: grid;
  min-height: 64px;
  grid-template-columns: minmax(174px,auto) minmax(90px,1fr) auto auto;
  align-items: center;
  gap: 14px;
  padding: 8px 10px;
  border: 1px solid rgba(198,52,58,.22);
  border-radius: 12px;
  background: linear-gradient(135deg,rgba(229,72,77,.08),rgba(37,99,235,.05));
}
.recording-identity {
  display: flex;
  min-width: 0;
  align-items: center;
  gap: 9px;
}
.recording-identity > .icon { width: 18px; height: 18px; color: #d6383e; }
.recording-identity div { min-width: 0; }
.recording-identity strong,
.recording-identity span { display: block; }
.recording-identity strong { font-size: 11px; }
.recording-identity span { margin-top: 2px; color: var(--muted); font-size: 9px; white-space: nowrap; }
.recording-pulse {
  width: 9px;
  height: 9px;
  flex: none;
  border-radius: 50%;
  background: #e5484d;
  box-shadow: 0 0 0 0 rgba(229,72,77,.3);
  animation: recording-pulse 1.45s ease-out infinite;
}
.voice-recorder.is-paused .recording-pulse { animation: none; background: #d59c28; box-shadow: none; }
.voice-waveform {
  display: flex;
  height: 32px;
  align-items: center;
  justify-content: center;
  gap: 3px;
  overflow: hidden;
}
.voice-waveform span {
  width: 3px;
  height: 7px;
  border-radius: 999px;
  background: var(--green);
  animation: voice-bar .86s ease-in-out infinite alternate;
}
.voice-waveform span:nth-child(2n) { animation-delay: -.34s; }
.voice-waveform span:nth-child(3n) { animation-delay: -.58s; }
.voice-waveform span:nth-child(4n) { animation-delay: -.18s; }
.voice-recorder.is-paused .voice-waveform span { animation-play-state: paused; opacity: .45; }
#voiceRecorderTime {
  min-width: 38px;
  color: var(--ink);
  font-variant-numeric: tabular-nums;
  font-size: 12px;
  font-weight: 760;
}
.voice-recorder-actions { display: flex; align-items: center; gap: 6px; }
.voice-recorder-actions .button-icon { width: 38px; height: 38px; }
.voice-cancel, .voice-stop { min-height: 38px; padding-inline: 11px; }
.voice-stop .icon { width: 14px; height: 14px; }
.attachment-preview.is-audio { border-left-color: #9b5de5; }
.attachment-preview.is-audio .attachment-preview-icon { background: #f0e9fb; color: #7143b1; }
.attachment-preview-copy { min-width: 0; }
.attachment-audio-preview {
  width: min(100%,360px);
  height: 34px;
  margin-top: 6px;
  vertical-align: middle;
}
.action-icon.audio { background: #f0e9fb; color: #7143b1; }

.message-attachment.audio-card {
  width: min(330px,72vw);
  min-width: 250px;
  padding: 10px;
  background: rgba(255,255,255,.62);
}
.audio-card-heading {
  display: flex;
  align-items: center;
  gap: 9px;
  margin-bottom: 8px;
}
.audio-card-mark {
  display: grid;
  width: 35px;
  height: 35px;
  flex: none;
  place-items: center;
  border-radius: 50%;
  background: var(--green);
  color: #fff;
}
.audio-card-mark .icon { width: 17px; height: 17px; }
.audio-card-copy { min-width: 0; flex: 1; }
.audio-card-copy strong,
.audio-card-copy small { display: block; }
.audio-card-copy strong { font-size: 11px; }
.audio-card-copy small { margin-top: 2px; color: var(--muted); font-size: 9px; }
.audio-card audio { width: 100%; height: 36px; }
.audio-unavailable {
  display: flex;
  align-items: center;
  gap: 7px;
  padding: 8px;
  border-radius: 7px;
  background: rgba(122,133,128,.1);
  color: var(--muted);
  font-size: 10px;
}

.emoji-panel {
  display: flex;
  width: 410px;
  max-height: min(590px,calc(100vh - 130px));
  flex-direction: column;
  padding: 13px;
  overflow: hidden;
}
.emoji-search { flex: none; }
.emoji-search button {
  display: grid;
  width: 30px;
  height: 30px;
  flex: none;
  place-items: center;
  border: 0;
  border-radius: 7px;
  background: transparent;
  color: var(--muted);
}
.emoji-search button:hover { background: var(--surface); color: var(--ink); }
.emoji-search button .icon { width: 14px; height: 14px; }
.emoji-tone-picker {
  display: flex;
  min-height: 38px;
  align-items: center;
  gap: 3px;
  margin-top: 8px;
}
.emoji-tone-picker > span {
  margin-right: auto;
  color: var(--muted);
  font-size: 9px;
  font-weight: 700;
}
.emoji-tone-picker button {
  display: grid;
  width: 31px;
  height: 31px;
  place-items: center;
  border: 1px solid transparent;
  border-radius: 8px;
  background: transparent;
  font-family: "Segoe UI Emoji","Apple Color Emoji","Noto Color Emoji",sans-serif;
  font-size: 18px;
}
.emoji-tone-picker button:hover,
.emoji-tone-picker button[aria-pressed="true"] {
  border-color: var(--line-strong);
  background: var(--surface-subtle);
}
.emoji-categories {
  display: flex;
  flex: none;
  gap: 2px;
  padding: 5px 0 7px;
  overflow-x: auto;
  scrollbar-width: thin;
  border-bottom: 1px solid var(--line);
}
.emoji-categories button {
  display: grid;
  min-width: 38px;
  height: 36px;
  flex: 1 0 38px;
  place-items: center;
  border: 0;
  border-radius: 8px;
  background: transparent;
  font-family: "Segoe UI Emoji","Apple Color Emoji","Noto Color Emoji",sans-serif;
  font-size: 17px;
}
.emoji-categories button:hover { background: var(--surface-subtle); }
.emoji-categories button[aria-selected="true"] {
  background: var(--green-soft);
  color: var(--green-strong);
  box-shadow: inset 0 -2px 0 var(--green);
}
.emoji-results-bar {
  display: flex;
  min-height: 34px;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
  color: var(--muted);
  font-size: 9px;
}
.emoji-results-bar strong { color: var(--muted-strong); font-size: 10px; }
.emoji-grid {
  display: grid;
  min-height: 180px;
  max-height: 300px;
  grid-template-columns: repeat(8,minmax(0,1fr));
  align-content: start;
  gap: 2px;
  overflow-y: auto;
  overscroll-behavior: contain;
  scrollbar-width: thin;
}
.emoji-grid button {
  display: grid;
  width: 100%;
  min-width: 0;
  aspect-ratio: 1;
  place-items: center;
  border: 1px solid transparent;
  border-radius: 8px;
  background: transparent;
  font-family: "Segoe UI Emoji","Apple Color Emoji","Noto Color Emoji",sans-serif;
  font-size: 22px;
  line-height: 1;
}
.emoji-grid button:hover,
.emoji-grid button:focus-visible {
  border-color: var(--line);
  background: var(--surface-subtle);
  transform: scale(1.08);
}
.emoji-empty {
  display: grid;
  min-height: 180px;
  place-items: center;
  align-content: center;
  gap: 4px;
  color: var(--muted);
  text-align: center;
}
.emoji-empty > span { font-size: 28px; }
.emoji-empty strong { color: var(--ink); font-size: 12px; }
.emoji-empty small { font-size: 9px; }

@keyframes recording-pulse {
  70% { box-shadow: 0 0 0 8px rgba(229,72,77,0); }
  100% { box-shadow: 0 0 0 0 rgba(229,72,77,0); }
}
@keyframes voice-bar {
  from { height: 6px; opacity: .55; }
  to { height: 27px; opacity: 1; }
}

body.dark .attachment-preview.is-audio .attachment-preview-icon,
body.dark .action-icon.audio { background: #352847; color: #c7a8f3; }
body.dark .message-attachment.audio-card { background: rgba(8,24,48,.34); }
body.dark audio { color-scheme: dark; }

@media (max-width: 759px) {
  .voice-recorder {
    min-height: 72px;
    grid-template-columns: minmax(110px,1fr) auto auto;
    gap: 8px;
  }
  .voice-waveform { display: none; }
  .recording-identity span { max-width: 120px; overflow: hidden; text-overflow: ellipsis; }
  .voice-recorder-actions { gap: 3px; }
  .voice-cancel { min-width: 44px; padding-inline: 9px; }
  .voice-stop { min-width: 44px; padding-inline: 10px; }
  .emoji-panel {
    width: auto;
    max-height: min(620px,72svh);
    padding: 13px 12px max(13px,env(safe-area-inset-bottom));
  }
  .emoji-grid {
    max-height: min(330px,38svh);
    grid-template-columns: repeat(7,minmax(0,1fr));
  }
  .emoji-grid button { min-height: 44px; aspect-ratio: 1; }
  .emoji-categories button,
  .emoji-tone-picker button { min-width: 44px; height: 44px; }
}
@media (max-width: 399px) {
  .composer-form { grid-template-columns: auto auto minmax(0,1fr) auto auto; }
  .voice-recorder {
    grid-template-columns: minmax(90px,1fr) auto;
  }
  .voice-recorder > time { display: none; }
  .recording-identity > .icon { display: none; }
  .voice-recorder-actions .button-icon { width: 34px; }
  .voice-cancel { font-size: 0; }
  .voice-cancel::after { content: "Cancel"; font-size: 10px; }
  .emoji-grid { grid-template-columns: repeat(6,minmax(0,1fr)); }
  .emoji-tone-picker > span { display: none; }
}
@media (forced-colors: active) {
  .recording-pulse,
  .voice-waveform span { forced-color-adjust: none; }
  .emoji-categories button[aria-selected="true"],
  .emoji-tone-picker button[aria-pressed="true"] { outline: 2px solid Highlight; }
}
@media (prefers-reduced-motion: reduce) {
  .recording-pulse,
  .voice-waveform span,
  .speed-dial-menu { animation: none; }
  .speed-dial-trigger .icon { transition: none; }
}


/* Modern conversation filtering, surfaced chat cards, and rich media */
.status-filter-bar {
  position: relative;
  flex: none;
  padding: 12px 14px 11px;
}
.status-filter-trigger {
  display: grid;
  width: 100%;
  min-height: 52px;
  grid-template-columns: 34px minmax(0,1fr) 18px;
  align-items: center;
  gap: 10px;
  padding: 7px 10px;
  border: 1px solid var(--line);
  border-radius: 12px;
  background: linear-gradient(135deg,var(--surface),var(--surface-subtle));
  color: var(--ink);
  text-align: left;
  box-shadow: 0 4px 14px rgba(30,58,95,.055);
  transition: border-color .16s ease, box-shadow .16s ease, transform .16s ease;
}
.status-filter-trigger:hover,
.status-filter-trigger[aria-expanded="true"] {
  border-color: color-mix(in srgb,var(--green) 48%,var(--line));
  box-shadow: 0 7px 20px rgba(30,58,95,.1);
}
.status-filter-trigger:active { transform: translateY(1px); }
.filter-icon {
  position: relative;
  display: grid;
  width: 34px;
  height: 34px;
  place-items: center;
  border-radius: 10px;
  background: var(--green-soft);
  color: var(--green-strong);
}
.filter-icon .icon { width: 17px; height: 17px; }
.filter-active-mark {
  position: absolute;
  top: -2px;
  right: -2px;
  width: 9px;
  height: 9px;
  border: 2px solid var(--surface);
  border-radius: 50%;
  background: #2b9de2;
}
.filter-trigger-copy { min-width: 0; }
.filter-trigger-copy small,
.filter-trigger-copy strong {
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.filter-trigger-copy small {
  color: var(--muted);
  font-size: 9px;
  font-weight: 650;
  letter-spacing: .02em;
}
.filter-trigger-copy strong {
  margin-top: 1px;
  font-size: 12px;
  font-weight: 780;
}
.filter-chevron {
  width: 15px;
  height: 15px;
  color: var(--muted);
  transition: transform .16s ease;
}
.status-filter-trigger[aria-expanded="true"] .filter-chevron { transform: rotate(180deg); }
.status-filter-menu {
  position: absolute;
  z-index: 95;
  top: calc(100% - 5px);
  right: 14px;
  left: 14px;
  padding: 7px;
  overflow: hidden;
}
.filter-menu-heading {
  padding: 9px 10px 8px;
  border-bottom: 1px solid var(--line);
}
.filter-menu-heading strong,
.filter-menu-heading small { display: block; }
.filter-menu-heading strong { font-size: 12px; }
.filter-menu-heading small { margin-top: 2px; color: var(--muted); font-size: 9px; }
.status-filter-menu button {
  display: grid;
  width: 100%;
  min-height: 51px;
  grid-template-columns: minmax(0,1fr) auto 19px;
  align-items: center;
  gap: 9px;
  margin-top: 3px;
  padding: 7px 9px 7px 10px;
  border: 0;
  border-radius: 9px;
  background: transparent;
  color: var(--ink);
  text-align: left;
}
.status-filter-menu button:hover,
.status-filter-menu button:focus-visible { background: var(--surface-subtle); }
.status-filter-menu button[aria-checked="true"] {
  background: var(--green-pale);
  color: var(--green-strong);
}
.status-filter-menu button > span:first-child { min-width: 0; }
.status-filter-menu button strong,
.status-filter-menu button small { display: block; }
.status-filter-menu button strong { font-size: 11px; }
.status-filter-menu button small {
  margin-top: 2px;
  overflow: hidden;
  color: var(--muted);
  font-size: 9px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.filter-choice-count {
  display: grid;
  min-width: 25px;
  height: 23px;
  place-items: center;
  padding: 0 6px;
  border-radius: 999px;
  background: var(--surface-subtle);
  color: var(--muted-strong);
  font-size: 9px;
  font-weight: 800;
}
.status-filter-menu button[aria-checked="true"] .filter-choice-count {
  background: color-mix(in srgb,var(--green) 15%,var(--surface));
  color: var(--green-strong);
}
.filter-check { width: 17px; height: 17px; opacity: 0; }
.status-filter-menu button[aria-checked="true"] .filter-check { opacity: 1; }

.contact-scroll { padding: 2px 11px 14px; }
#contact-list { gap: 8px; }
.contact-item {
  min-height: 82px;
  padding: 10px 11px;
  border: 1px solid var(--line);
  border-radius: 14px;
  background: var(--surface);
  box-shadow: 0 3px 12px rgba(30,58,95,.05);
  transition: border-color .16s ease, background .16s ease, box-shadow .16s ease, transform .16s ease;
}
.contact-item::before {
  top: 11px;
  bottom: 11px;
  left: -1px;
  width: 4px;
  background: linear-gradient(180deg,var(--accent),#60a5fa);
}
.contact-item:hover {
  border-color: color-mix(in srgb,var(--green) 28%,var(--line));
  background: var(--surface-raised);
  box-shadow: 0 7px 19px rgba(30,58,95,.1);
  transform: translateY(-1px);
}
.contact-item[aria-selected="true"] {
  border-color: color-mix(in srgb,var(--green) 62%,var(--line));
  background: linear-gradient(135deg,var(--green-pale),var(--surface));
  box-shadow: 0 8px 22px rgba(37,99,235,.14), inset 0 0 0 1px color-mix(in srgb,var(--accent) 11%,transparent);
}
.contact-item[aria-selected="true"]::before { opacity: 1; }
.contact-item.is-unread:not([aria-selected="true"]) {
  border-color: color-mix(in srgb,var(--green) 30%,var(--line));
  background: color-mix(in srgb,var(--green-pale) 48%,var(--surface));
}
.contact-item.is-unread .contact-name,
.contact-item.is-unread .contact-time { color: var(--ink); font-weight: 820; }
.contact-item.is-unread .contact-preview { color: var(--muted-strong); font-weight: 650; }
.contact-item.needs-reply:not([aria-selected="true"])::after {
  position: absolute;
  top: 10px;
  right: 10px;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: #d18518;
  content: "";
}
.contact-item[aria-selected="true"] .contact-avatar {
  box-shadow: 0 0 0 3px var(--surface),0 0 0 5px color-mix(in srgb,var(--green) 60%,transparent);
}
.contact-item .unread-badge {
  box-shadow: 0 2px 6px rgba(37,99,235,.25);
}
.contact-item .contact-time { transition: color .16s ease; }

/* Persistent image, video, audio, and document presentation */
.message-row.has-media { max-width: min(82%,680px); }
.message-row.has-audio { max-width: min(82%,620px); }
.has-media .message-bubble { padding: 5px 5px 4px; }
.has-audio .message-bubble { padding: 8px 9px 5px; }
.message-attachment.media-card {
  position: relative;
  width: min(390px,58vw);
  min-width: 250px;
  margin-bottom: 3px;
  overflow: hidden;
  border: 0;
  border-radius: 10px;
  background: color-mix(in srgb,var(--surface-subtle) 82%,var(--canvas));
  color: var(--ink);
  text-align: left;
}
.image-card {
  display: block;
  min-height: 168px;
  padding: 0;
  cursor: zoom-in;
}
.media-card img,
.media-card video {
  display: block;
  width: 100%;
  max-height: min(440px,58vh);
  border: 0;
  background: #081221;
  object-fit: contain;
}
.image-card img { min-height: 168px; object-fit: cover; }
.video-card video { min-height: 178px; }
.media-card.is-loading::before {
  position: absolute;
  z-index: 1;
  inset: 0;
  background: linear-gradient(100deg,transparent 20%,rgba(255,255,255,.28) 42%,transparent 64%);
  content: "";
  transform: translateX(-100%);
  animation: media-shimmer 1.25s ease-in-out infinite;
  pointer-events: none;
}
.media-card-caption {
  position: absolute;
  z-index: 2;
  right: 7px;
  bottom: 7px;
  left: 7px;
  display: flex;
  min-width: 0;
  min-height: 28px;
  align-items: center;
  gap: 6px;
  padding: 5px 8px;
  overflow: hidden;
  border: 1px solid rgba(255,255,255,.18);
  border-radius: 8px;
  background: rgba(7,18,35,.72);
  color: #f7fbff;
  font-size: 9px;
  font-weight: 700;
  text-overflow: ellipsis;
  white-space: nowrap;
  backdrop-filter: blur(9px);
}
.media-card-caption .icon { width: 14px; height: 14px; }
.media-expand {
  position: absolute;
  z-index: 3;
  top: 8px;
  right: 8px;
  display: grid;
  width: 34px;
  height: 34px;
  place-items: center;
  border: 1px solid rgba(255,255,255,.25);
  border-radius: 9px;
  background: rgba(7,18,35,.68);
  color: white;
  backdrop-filter: blur(8px);
}
.media-expand:hover { background: rgba(7,18,35,.86); }
.media-expand .icon { width: 16px; height: 16px; }
.media-card-unavailable {
  display: grid;
  min-height: 150px;
  place-items: center;
  padding: 22px;
  color: var(--muted);
  font-size: 11px;
  text-align: center;
}
.file-card {
  min-width: min(310px,62vw);
  padding: 10px;
  border: 1px solid color-mix(in srgb,var(--line) 80%,transparent);
  border-radius: 10px;
}
.file-card > div { flex: 1; }
.file-download {
  display: grid;
  width: 34px;
  height: 34px;
  flex: none;
  place-items: center;
  border: 1px solid var(--line);
  border-radius: 9px;
  background: var(--surface);
  color: var(--green-strong);
  text-decoration: none;
}
.file-download:hover { border-color: var(--green); background: var(--green-pale); }
.file-download .icon { width: 16px; height: 16px; }

.media-dialog {
  width: min(940px,calc(100vw - 24px));
  max-height: calc(100dvh - 24px);
  background: #061225;
  color: #f3f7ff;
}
.media-dialog header {
  display: flex;
  min-height: 58px;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding: 9px 12px 9px 16px;
  border-bottom: 1px solid rgba(255,255,255,.12);
  background: #0a1830;
}
.media-dialog header > div { min-width: 0; }
.media-dialog h2,
.media-dialog small {
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.media-dialog h2 { margin: 0; font-size: 13px; }
.media-dialog small { margin-top: 2px; color: #a6b4c8; font-size: 9px; }
.media-dialog .button-icon { color: white; }
.media-preview-stage {
  display: grid;
  min-height: min(72vh,610px);
  max-height: calc(100dvh - 84px);
  place-items: center;
  overflow: hidden;
  background:
    radial-gradient(circle at 50% 46%,rgba(59,130,246,.22),transparent 46%),
    #061225;
}
.media-preview-stage img,
.media-preview-stage video {
  display: block;
  width: 100%;
  max-width: 100%;
  height: 100%;
  max-height: calc(100dvh - 84px);
  object-fit: contain;
}

/* WhatsApp-style voice-note player */
.message-attachment.audio-card {
  width: min(390px,64vw);
  min-width: min(300px,64vw);
  margin-bottom: 2px;
  padding: 10px;
  overflow: visible;
  border: 1px solid color-mix(in srgb,var(--line) 74%,transparent);
  border-radius: 12px;
  background: color-mix(in srgb,var(--surface) 72%,transparent);
}
.message-attachment.audio-card.is-voice {
  width: min(390px,65vw);
  padding: 2px 0 0;
  border: 0;
  border-radius: 0;
  background: transparent;
}
.audio-card-heading {
  display: flex;
  min-width: 0;
  align-items: center;
  gap: 9px;
  margin: 0 0 10px;
}
.audio-card-mark {
  width: 36px;
  height: 36px;
  background: linear-gradient(145deg,#60a5fa,#2563eb);
  box-shadow: 0 5px 12px rgba(37,99,235,.22);
}
.audio-card-kicker {
  display: block;
  color: var(--green-strong);
  font-size: 8px;
  font-weight: 850;
  letter-spacing: .08em;
  text-transform: uppercase;
}
.audio-card-copy strong,
.audio-card-copy small { display: block; }
.audio-card-copy strong {
  max-width: 210px;
  overflow: hidden;
  font-size: 11px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.audio-card-copy small { margin-top: 2px; color: var(--muted); font-size: 9px; }
.audio-controls {
  display: grid;
  min-width: 0;
  grid-template-columns: 38px minmax(150px,1fr);
  align-items: center;
  gap: 8px;
}
.audio-card.is-voice .audio-controls {
  grid-template-columns: 48px 36px minmax(160px,1fr);
  gap: 8px;
}
.audio-avatar {
  position: relative;
  display: grid;
  width: 48px;
  height: 48px;
  place-items: center;
  border: 2px solid color-mix(in srgb,var(--surface) 78%,transparent);
  border-radius: 50%;
  background: linear-gradient(145deg,#ffe2d5,#f3bca9);
  color: #9d432c;
  box-shadow: 0 4px 12px rgba(85,52,38,.12);
  font-size: 12px;
  font-weight: 850;
  letter-spacing: -.03em;
}
.audio-avatar-mic {
  position: absolute;
  right: -2px;
  bottom: -1px;
  display: grid;
  width: 19px;
  height: 19px;
  place-items: center;
  border: 2px solid var(--bubble-out);
  border-radius: 50%;
  background: var(--accent);
  color: white;
}
.incoming .audio-avatar-mic { border-color: var(--bubble-in); }
.audio-avatar-mic .icon { width: 10px; height: 10px; stroke-width: 2.2; }
.audio-play {
  display: grid;
  width: 36px;
  height: 36px;
  place-items: center;
  border: 0;
  border-radius: 50%;
  background: transparent;
  color: var(--ink);
}
.audio-play:hover { background: color-mix(in srgb,var(--green) 12%,transparent); }
.audio-play .icon {
  width: 20px;
  height: 20px;
  fill: currentColor;
  stroke: currentColor;
}
.audio-play:disabled { opacity: .4; }
.audio-track { min-width: 0; }
.audio-waveform {
  position: relative;
  display: block;
  width: 100%;
  height: 32px;
}
.audio-waveform-layer {
  position: absolute;
  inset: 3px 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2px;
  pointer-events: none;
}
.audio-waveform-layer i {
  width: 3px;
  min-width: 3px;
  height: 16%;
  flex: 0 0 3px;
  border-radius: 3px;
  background: color-mix(in srgb,var(--muted) 48%,transparent);
  transition: background-color .12s ease;
}
.audio-waveform-layer i.is-played { background: #249ee3; }
.audio-seek {
  position: absolute;
  z-index: 2;
  inset: 0;
  width: 100%;
  height: 30px;
  margin: 0;
  appearance: none;
  cursor: pointer;
  background: transparent;
}
.audio-seek::-webkit-slider-runnable-track { height: 30px; background: transparent; }
.audio-seek::-moz-range-track { height: 30px; background: transparent; }
.audio-seek::-webkit-slider-thumb {
  width: 12px;
  height: 12px;
  margin-top: 9px;
  appearance: none;
  border: 2px solid color-mix(in srgb,#249ee3 30%,white);
  border-radius: 50%;
  background: #249ee3;
  box-shadow: 0 2px 7px rgba(20,119,179,.35);
}
.audio-seek::-moz-range-thumb {
  width: 9px;
  height: 9px;
  border: 2px solid color-mix(in srgb,#249ee3 30%,white);
  border-radius: 50%;
  background: #249ee3;
  box-shadow: 0 2px 7px rgba(20,119,179,.35);
}
.audio-seek:focus-visible { outline-offset: 1px; }
.audio-seek:disabled { cursor: progress; opacity: .55; }
.audio-timing {
  display: flex;
  min-height: 15px;
  align-items: center;
  gap: 6px;
  margin-top: -1px;
  color: var(--muted);
  font-size: 9px;
  font-variant-numeric: tabular-nums;
}
.audio-timing span { height: 1px; flex: 1; background: color-mix(in srgb,var(--muted) 22%,transparent); }
.audio-speed {
  min-width: 34px;
  height: 28px;
  padding: 0 7px;
  border: 1px solid var(--line);
  border-radius: 999px;
  background: var(--surface);
  color: var(--muted-strong);
  font-size: 9px;
  font-weight: 800;
}
.audio-speed:hover { border-color: var(--green); color: var(--green-strong); }
.audio-engine { display: none; }
.audio-unavailable {
  min-height: 42px;
  justify-content: center;
  border: 1px dashed var(--line-strong);
}
.audio-card.is-playing .audio-avatar { box-shadow: 0 0 0 4px color-mix(in srgb,#249ee3 16%,transparent),0 4px 12px rgba(85,52,38,.12); }

@keyframes media-shimmer {
  to { transform: translateX(100%); }
}

body.dark .status-filter-trigger { background: linear-gradient(135deg,var(--surface-raised),var(--surface-subtle)); }
body.dark .contact-item { box-shadow: 0 3px 14px rgba(0,0,0,.18); }
body.dark .contact-item:hover { box-shadow: 0 8px 22px rgba(0,0,0,.28); }
body.dark .contact-item[aria-selected="true"] {
  background: linear-gradient(135deg,var(--green-pale),var(--surface-raised));
  box-shadow: 0 8px 24px rgba(0,0,0,.3),inset 0 0 0 1px color-mix(in srgb,var(--green) 15%,transparent);
}
body.dark .media-card.is-loading::before { background: linear-gradient(100deg,transparent 20%,rgba(255,255,255,.08) 42%,transparent 64%); }
body.dark .message-attachment.audio-card:not(.is-voice) { background: rgba(7,20,42,.3); }
body.dark .audio-avatar { border-color: rgba(255,255,255,.16); }
body.dark .audio-seek::-webkit-slider-thumb { border-color: #b8e8ff; }
body.dark .audio-seek::-moz-range-thumb { border-color: #b8e8ff; }

@media (max-width: 759px) {
  .status-filter-bar { padding: 10px 14px; }
  .status-filter-trigger { min-height: 50px; }
  .status-filter-menu {
    position: fixed;
    z-index: 170;
    top: auto;
    right: 10px;
    bottom: max(10px,env(safe-area-inset-bottom));
    left: 10px;
    max-height: min(430px,calc(100dvh - 20px));
    overflow-y: auto;
    border-radius: 16px;
    box-shadow: 0 24px 70px rgba(5,17,38,.32);
  }
  .status-filter-menu button { min-height: 56px; }
  .contact-scroll { padding-inline: 10px; }
  #contact-list { gap: 7px; }
  .contact-item { min-height: 80px; }
  .message-row.has-media,
  .message-row.has-audio { max-width: 94%; }
  .message-attachment.media-card {
    width: min(370px,78vw);
    min-width: min(250px,78vw);
  }
  .message-attachment.audio-card,
  .message-attachment.audio-card.is-voice {
    width: min(380px,82vw);
    min-width: min(278px,82vw);
  }
  .audio-card.is-voice .audio-controls {
    grid-template-columns: 46px 34px minmax(128px,1fr);
    gap: 5px;
  }
  .audio-avatar { width: 44px; height: 44px; }
  .media-dialog {
    width: calc(100vw - 12px);
    max-width: none;
    max-height: calc(100dvh - 12px);
    margin: auto;
  }
  .media-preview-stage { min-height: min(74vh,600px); }
}
@media (max-width: 399px) {
  .status-filter-bar { padding-inline: 12px; }
  .status-filter-menu { right: 6px; bottom: max(6px,env(safe-area-inset-bottom)); left: 6px; }
  .contact-scroll { padding-inline: 8px; }
  .contact-item { padding-inline: 10px; }
  .message-row.has-media,
  .message-row.has-audio { max-width: 97%; }
  .message-attachment.media-card {
    width: 78vw;
    min-width: 224px;
  }
  .message-attachment.audio-card,
  .message-attachment.audio-card.is-voice {
    width: 82vw;
    min-width: 244px;
  }
  .audio-card.is-voice .audio-controls {
    grid-template-columns: 43px 31px minmax(112px,1fr);
    gap: 4px;
  }
  .audio-avatar { width: 41px; height: 41px; font-size: 11px; }
  .audio-avatar-mic { width: 18px; height: 18px; }
  .audio-play { width: 31px; height: 31px; }
  .audio-play .icon { width: 18px; height: 18px; }
  .audio-waveform-layer { gap: 1.5px; }
  .media-card-caption { right: 5px; bottom: 5px; left: 5px; }
  .file-card { min-width: 228px; }
}
@media (forced-colors: active) {
  .status-filter-trigger,
  .status-filter-menu,
  .contact-item,
  .message-attachment.audio-card,
  .message-attachment.media-card { border: 1px solid CanvasText; }
  .status-filter-menu button[aria-checked="true"],
  .contact-item[aria-selected="true"] { outline: 2px solid Highlight; }
  .filter-check,
  .media-expand,
  .audio-seek { forced-color-adjust: none; }
  .audio-waveform-layer i.is-played { background: Highlight; }
}
@media (prefers-reduced-motion: reduce) {
  .media-card.is-loading::before { animation: none; }
  .contact-item,
  .status-filter-trigger,
  .filter-chevron,
  .audio-waveform-layer i { transition: none; }
}


/* Final voice-note and unavailable-media refinements */
.message-row.has-audio > .message-avatar { display: none; }
.message-row.has-audio .message-stack,
.message-row.has-audio .message-bubble { max-width: 100%; }
.message-attachment.audio-card.is-voice,
body.dark .message-attachment.audio-card.is-voice { background: transparent; }
.incoming .audio-avatar {
  background: linear-gradient(145deg,#e0ebfb,#bed4ef);
  color: #315e87;
}
.audio-card.is-voice .audio-timing { justify-content: flex-start; }
.audio-card.is-voice .audio-timing time:first-child,
.audio-card.is-voice .audio-timing > span { display: none; }
.file-card.is-unavailable .file-mark { color: var(--red); }
.file-card.is-unavailable small { color: var(--red); }
.media-expand:disabled { cursor: progress; opacity: .62; }

/* Media control and conversation metadata collision fixes */
.contact-item.needs-reply:not([aria-selected="true"])::after { content: none; }
.video-card .media-card-caption {
  position: static;
  min-height: 32px;
  border: 0;
  border-radius: 0;
  background: color-mix(in srgb,var(--surface) 92%,transparent);
  color: var(--muted-strong);
  backdrop-filter: none;
}
.video-card .media-card-caption .icon { color: var(--green-strong); }

/* Compact category row with a separate funnel dropdown */
.conversation-control-row {
  position: relative;
  display: flex;
  flex: none;
  align-items: center;
  gap: 8px;
  margin: 0 20px;
}
.conversation-control-row .category-switch {
  min-width: 0;
  flex: 1;
  margin: 0;
}
.conversation-control-row .status-filter-bar {
  position: relative;
  flex: none;
  padding: 0;
}
.conversation-control-row .status-filter-trigger {
  display: grid;
  width: 44px;
  height: 44px;
  min-height: 44px;
  grid-template-columns: 1fr;
  place-items: center;
  padding: 4px;
  border-radius: 11px;
  background: var(--surface);
  box-shadow: 0 2px 8px rgba(30,58,95,.05);
}
.conversation-control-row .status-filter-trigger:hover,
.conversation-control-row .status-filter-trigger[aria-expanded="true"] {
  border-color: color-mix(in srgb,var(--green) 52%,var(--line));
  background: var(--green-pale);
  box-shadow: 0 0 0 3px color-mix(in srgb,var(--green) 10%,transparent);
}
.conversation-control-row .status-filter-trigger.is-active {
  border-color: color-mix(in srgb,var(--green) 54%,var(--line));
  color: var(--green-strong);
}
.conversation-control-row .filter-icon {
  width: 34px;
  height: 34px;
  background: transparent;
}
.conversation-control-row .filter-active-mark {
  top: 0;
  right: 0;
  border-color: var(--surface);
}
.conversation-control-row .status-filter-menu {
  position: absolute;
  z-index: 110;
  top: calc(100% + 7px);
  right: 0;
  bottom: auto;
  left: auto;
  width: min(270px,calc(100vw - 24px));
  max-height: min(360px,calc(100dvh - 190px));
  padding: 5px;
  overflow-y: auto;
  border-radius: 12px;
}
.conversation-control-row .status-filter-menu button {
  display: grid;
  min-height: 40px;
  grid-template-columns: minmax(0,1fr) 18px;
  gap: 10px;
  margin: 0;
  padding: 7px 10px;
  border-radius: 8px;
}
.conversation-control-row .status-filter-menu button + button { margin-top: 2px; }
.conversation-control-row .status-filter-menu button[aria-checked="true"] {
  background: color-mix(in srgb,var(--green) 15%,var(--surface-subtle));
  color: var(--ink);
}
.filter-option-label {
  overflow: hidden;
  font-size: 12px;
  font-weight: 600;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.conversation-control-row .status-filter-menu button[aria-checked="true"] .filter-option-label {
  color: var(--green-strong);
  font-weight: 800;
}
.conversation-control-row .filter-check { justify-self: end; }

@media (max-width: 759px) {
  .conversation-control-row { margin-inline: 14px; }
  .conversation-control-row .status-filter-menu {
    position: absolute;
    top: calc(100% + 7px);
    right: 0;
    bottom: auto;
    left: auto;
    max-height: min(350px,calc(100dvh - 180px));
  }
}
@media (max-width: 399px) {
  .conversation-control-row { gap: 6px; margin-inline: 14px; }
  .conversation-control-row .category-switch button { padding-inline: 4px; }
  .conversation-control-row .status-filter-trigger { width: 42px; height: 42px; min-height: 42px; }
  .conversation-control-row .status-filter-menu {
    width: min(270px,calc(100vw - 28px));
  }
}


/* Minimal video playback: one play/pause toggle */
.video-card video { cursor: pointer; }
.video-play,
.media-preview-play {
  position: absolute;
  z-index: 4;
  display: grid;
  place-items: center;
  border: 1px solid rgba(255,255,255,.34);
  border-radius: 50%;
  background: rgba(6,18,36,.76);
  color: white;
  box-shadow: 0 7px 22px rgba(0,0,0,.28);
  backdrop-filter: blur(9px);
  transition: background .15s ease, transform .15s ease, opacity .15s ease;
}
.video-play {
  top: calc(50% - 16px);
  left: 50%;
  width: 48px;
  height: 48px;
  transform: translate(-50%,-50%);
}
.media-preview-play {
  top: 50%;
  left: 50%;
  width: 58px;
  height: 58px;
  transform: translate(-50%,-50%);
}
.video-play:hover:not(:disabled),
.media-preview-play:hover:not(:disabled) {
  background: rgba(6,18,36,.92);
  transform: translate(-50%,-50%) scale(1.06);
}
.video-play:active:not(:disabled),
.media-preview-play:active:not(:disabled) { transform: translate(-50%,-50%) scale(.96); }
.video-play .icon,
.media-preview-play .icon {
  width: 22px;
  height: 22px;
  fill: currentColor;
  stroke: currentColor;
}
.media-preview-play .icon { width: 25px; height: 25px; }
.video-play:disabled,
.media-preview-play:disabled { cursor: progress; opacity: .55; }
.video-play.is-playing,
.media-preview-play.is-playing { background: rgba(6,18,36,.68); }
.media-preview-stage { position: relative; }
.media-preview-stage video { cursor: pointer; }

@media (max-width: 399px) {
  .video-play { width: 44px; height: 44px; }
  .media-preview-play { width: 52px; height: 52px; }
}
@media (forced-colors: active) {
  .video-play,
  .media-preview-play {
    forced-color-adjust: auto;
    border: 2px solid ButtonText;
    background: ButtonFace;
    color: ButtonText;
  }
}


/* Live microphone recorder */
.voice-recorder {
  --recording-red: #e5484d;
  --recording-red-deep: #bd2630;
  --recording-amber: #d49120;
  --recording-glow: 3px;
  position: relative;
  isolation: isolate;
  display: grid;
  min-height: 78px;
  grid-template-areas: "identity wave timer actions";
  grid-template-columns: minmax(190px,auto) minmax(150px,1fr) auto auto;
  align-items: center;
  gap: 12px;
  padding: 10px 12px;
  overflow: hidden;
  border: 1px solid color-mix(in srgb,var(--recording-red) 34%,var(--line));
  border-radius: 16px;
  background:
    radial-gradient(circle at 12% 20%,rgba(229,72,77,.12),transparent 34%),
    linear-gradient(120deg,color-mix(in srgb,var(--surface) 94%,var(--recording-red)),color-mix(in srgb,var(--surface) 96%,var(--green)));
  box-shadow: 0 8px 25px rgba(30,58,95,.09),inset 0 1px 0 rgba(255,255,255,.4);
  transition: border-color .2s ease,background .2s ease,box-shadow .2s ease;
}
.voice-recorder::before {
  position: absolute;
  z-index: -1;
  inset: 0;
  background: linear-gradient(105deg,transparent 25%,rgba(255,255,255,.28) 47%,transparent 68%);
  content: "";
  opacity: .42;
  transform: translateX(-110%);
  animation: recorder-surface-sweep 5.2s ease-in-out infinite;
  pointer-events: none;
}
.voice-recorder > * { position: relative; z-index: 1; }
.recording-identity {
  grid-area: identity;
  gap: 11px;
}
.recording-identity > div { min-width: 0; }
.recording-identity > div > strong {
  font-size: 12px;
  font-weight: 820;
  letter-spacing: -.01em;
}
.recording-identity > div > span {
  display: block;
  max-width: 190px;
  margin-top: 2px;
  overflow: hidden;
  color: var(--muted);
  font-size: 9px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.recording-orb {
  position: relative;
  display: grid !important;
  width: 44px;
  height: 44px;
  flex: none;
  place-items: center;
  margin: 0 !important;
  border: 1px solid rgba(255,255,255,.5);
  border-radius: 50%;
  background: linear-gradient(145deg,#fa6970,var(--recording-red-deep));
  color: white !important;
  box-shadow:
    0 6px 15px rgba(190,38,48,.24),
    0 0 0 var(--recording-glow) color-mix(in srgb,var(--recording-red) 13%,transparent);
  animation: recorder-orb-breathe 1.65s ease-in-out infinite;
}
.recording-orb .icon {
  z-index: 2;
  width: 20px;
  height: 20px;
  color: white;
  stroke-width: 2;
  animation: recorder-mic-float 1.65s ease-in-out infinite;
}
.recording-pulse {
  position: absolute;
  inset: -1px;
  width: auto;
  height: auto;
  margin: 0 !important;
  border: 1px solid rgba(229,72,77,.52);
  border-radius: 50%;
  background: transparent;
  box-shadow: none;
  animation: recorder-ring 1.65s cubic-bezier(.2,.65,.35,1) infinite;
}
.recording-orb::after {
  position: absolute;
  inset: -1px;
  border: 1px solid rgba(229,72,77,.38);
  border-radius: 50%;
  content: "";
  animation: recorder-ring 1.65s .74s cubic-bezier(.2,.65,.35,1) infinite;
}

.voice-waveform {
  position: relative;
  grid-area: wave;
  display: flex;
  width: 100%;
  height: 42px;
  align-items: center;
  justify-content: space-between;
  gap: 3px;
  padding: 5px 10px;
  overflow: hidden;
  border: 1px solid color-mix(in srgb,var(--line) 76%,transparent);
  border-radius: 999px;
  background: color-mix(in srgb,var(--surface) 68%,transparent);
  box-shadow: inset 0 1px 4px rgba(30,58,95,.05);
}
.voice-waveform::before {
  position: absolute;
  right: 9px;
  left: 9px;
  height: 1px;
  background: color-mix(in srgb,var(--green) 17%,transparent);
  content: "";
}
.voice-waveform span {
  --bar-height: 24px;
  --wave-duration: .76s;
  --wave-delay: -.2s;
  --level: .36;
  position: relative;
  z-index: 1;
  display: block;
  width: 3px;
  height: var(--bar-height);
  min-height: 3px;
  flex: 1 1 3px;
  margin: 0;
  border-radius: 999px;
  background: linear-gradient(180deg,#93c5fd,var(--accent));
  box-shadow: 0 1px 4px color-mix(in srgb,var(--green) 18%,transparent);
  transform: scaleY(var(--level));
  transform-origin: center;
  will-change: transform;
  animation: recorder-wave var(--wave-duration) var(--wave-delay) ease-in-out infinite alternate;
}
.voice-waveform span:nth-child(5n+1) { --bar-height: 17px; --wave-duration: .68s; --wave-delay: -.46s; }
.voice-waveform span:nth-child(5n+2) { --bar-height: 29px; --wave-duration: .91s; --wave-delay: -.12s; }
.voice-waveform span:nth-child(5n+3) { --bar-height: 21px; --wave-duration: .73s; --wave-delay: -.61s; }
.voice-waveform span:nth-child(5n+4) { --bar-height: 32px; --wave-duration: 1.02s; --wave-delay: -.28s; }
.voice-waveform span:nth-child(4n) { background: linear-gradient(180deg,#bfdbfe,#3b82f6); }
.voice-recorder.has-live-levels .voice-waveform span {
  animation: none;
  transition: transform 80ms linear;
}

.voice-timer {
  grid-area: timer;
  display: flex;
  min-height: 36px;
  align-items: center;
  gap: 6px;
  padding: 0 9px;
  border: 1px solid color-mix(in srgb,var(--recording-red) 20%,var(--line));
  border-radius: 999px;
  background: color-mix(in srgb,var(--surface) 82%,transparent);
  font-variant-numeric: tabular-nums;
  white-space: nowrap;
}
.recording-live-dot {
  width: 7px;
  height: 7px;
  margin: 0 !important;
  border-radius: 50%;
  background: var(--recording-red);
  box-shadow: 0 0 0 0 rgba(229,72,77,.28);
  animation: recorder-live-dot 1.2s ease-out infinite;
}
#voiceRecorderTime {
  min-width: 34px;
  color: var(--ink);
  font-size: 13px;
  font-weight: 850;
  letter-spacing: -.02em;
}
.voice-timer small {
  color: var(--muted);
  font-size: 8px;
  font-weight: 650;
}
.voice-recorder-actions {
  grid-area: actions;
  gap: 7px;
}
.voice-recorder-actions .button-icon {
  width: 42px;
  height: 42px;
  border-color: var(--line);
  border-radius: 50%;
  background: var(--surface);
  box-shadow: 0 3px 10px rgba(30,58,95,.09);
}
#pauseVoiceBtn {
  color: var(--recording-red-deep);
}
#pauseVoiceBtn:hover {
  border-color: color-mix(in srgb,var(--recording-red) 44%,var(--line));
  background: color-mix(in srgb,var(--recording-red) 8%,var(--surface));
}
.voice-cancel,
.voice-stop {
  min-height: 42px;
  border-radius: 11px;
}
.voice-stop {
  background: linear-gradient(145deg,var(--green),var(--green-strong));
  box-shadow: 0 5px 14px rgba(37,99,235,.2);
}

/* Connecting, paused, and sending each get a deliberate state. */
.voice-recorder.is-requesting {
  border-color: color-mix(in srgb,var(--navy) 30%,var(--line));
}
.voice-recorder.is-requesting .recording-orb {
  background: linear-gradient(145deg,#72a8c9,#446f8a);
  animation: none;
}
.voice-recorder.is-requesting .recording-orb::before {
  position: absolute;
  inset: -5px;
  border: 2px solid transparent;
  border-top-color: #72a8c9;
  border-radius: 50%;
  content: "";
  animation: recorder-spin .9s linear infinite;
}
.voice-recorder.is-requesting .recording-pulse,
.voice-recorder.is-requesting .recording-orb::after { display: none; }
.voice-recorder.is-requesting .voice-waveform span {
  animation: recorder-requesting-wave 1.15s ease-in-out infinite alternate;
  opacity: .55;
}

.voice-recorder.is-paused {
  border-color: color-mix(in srgb,var(--recording-amber) 42%,var(--line));
  background:
    radial-gradient(circle at 12% 20%,rgba(212,145,32,.12),transparent 34%),
    linear-gradient(120deg,color-mix(in srgb,var(--surface) 95%,var(--recording-amber)),var(--surface));
}
.voice-recorder.is-paused .recording-orb {
  background: linear-gradient(145deg,#ebb04a,#b87916);
  box-shadow: 0 6px 15px rgba(159,104,18,.19);
  animation: none;
}
.voice-recorder.is-paused .recording-pulse,
.voice-recorder.is-paused .recording-orb::after,
.voice-recorder.is-paused .recording-live-dot { animation: none; }
.voice-recorder.is-paused .recording-pulse,
.voice-recorder.is-paused .recording-orb::after { display: none; }
.voice-recorder.is-paused .recording-live-dot {
  background: var(--recording-amber);
  box-shadow: none;
}
.voice-recorder.is-paused .voice-waveform span {
  animation: none;
  opacity: .62;
  transform: scaleY(.2);
}
.voice-recorder.is-paused #pauseVoiceBtn {
  border-color: color-mix(in srgb,var(--recording-amber) 48%,var(--line));
  background: color-mix(in srgb,var(--recording-amber) 13%,var(--surface));
  color: #9a6008;
}

.voice-recorder.is-stopping .recording-pulse,
.voice-recorder.is-stopping .recording-orb::after,
.voice-recorder.is-stopping .recording-live-dot { display: none; }
.voice-recorder.is-stopping .recording-orb {
  animation: recorder-stopping 1s ease-in-out infinite;
}
.voice-recorder.is-stopping .voice-waveform span {
  animation: none;
  transform: scaleY(.14);
  opacity: .45;
}
.voice-recorder.is-stopping::before {
  opacity: .72;
  animation: recorder-surface-sweep 1.15s ease-in-out infinite;
}

body.dark .voice-recorder {
  background:
    radial-gradient(circle at 12% 20%,rgba(229,72,77,.14),transparent 34%),
    linear-gradient(120deg,rgba(37,29,27,.94),rgba(15,32,57,.96));
  box-shadow: 0 8px 28px rgba(0,0,0,.24),inset 0 1px 0 rgba(255,255,255,.04);
}
body.dark .voice-waveform,
body.dark .voice-timer { background: rgba(5,17,36,.34); }
body.dark .voice-recorder-actions .button-icon { background: var(--surface-raised); }

@keyframes recorder-ring {
  0% { opacity: .62; transform: scale(.92); }
  76%,100% { opacity: 0; transform: scale(1.58); }
}
@keyframes recorder-orb-breathe {
  0%,100% { transform: scale(.98); }
  50% { transform: scale(1.035); }
}
@keyframes recorder-mic-float {
  0%,100% { transform: translateY(0); }
  50% { transform: translateY(-1px); }
}
@keyframes recorder-live-dot {
  70% { box-shadow: 0 0 0 7px rgba(229,72,77,0); }
  100% { box-shadow: 0 0 0 0 rgba(229,72,77,0); }
}
@keyframes recorder-wave {
  from { transform: scaleY(.22); }
  to { transform: scaleY(1); }
}
@keyframes recorder-requesting-wave {
  from { transform: scaleY(.16); }
  to { transform: scaleY(.36); }
}
@keyframes recorder-surface-sweep {
  0%,42% { transform: translateX(-110%); }
  70%,100% { transform: translateX(110%); }
}
@keyframes recorder-spin { to { transform: rotate(360deg); } }
@keyframes recorder-stopping {
  0%,100% { transform: scale(.96); opacity: .72; }
  50% { transform: scale(1.03); opacity: 1; }
}

@media (max-width: 759px) {
  .voice-recorder {
    min-height: 130px;
    grid-template-areas:
      "identity timer"
      "wave wave"
      "actions actions";
    grid-template-columns: minmax(0,1fr) auto;
    gap: 8px 10px;
    padding: 10px;
  }
  .voice-waveform {
    display: flex;
    height: 34px;
  }
  .voice-recorder-actions {
    display: flex;
    width: 100%;
    justify-content: flex-end;
  }
  .recording-identity > div > span { max-width: 210px; }
}
@media (max-width: 399px) {
  .voice-recorder {
    min-height: 126px;
    grid-template-columns: minmax(0,1fr) auto;
    padding: 9px;
  }
  .recording-orb { width: 40px; height: 40px; }
  .recording-orb .icon { width: 18px; height: 18px; }
  .recording-identity { gap: 8px; }
  .recording-identity > div > span { display: none; }
  .voice-timer small { display: none; }
  .voice-waveform { padding-inline: 8px; gap: 2px; }
  .voice-waveform span:nth-child(n+16) { display: none; }
  .voice-recorder-actions { justify-content: space-between; }
  .voice-recorder-actions .button-icon { width: 40px; height: 40px; }
  .voice-cancel,
  .voice-stop { min-height: 40px; }
}
@media (forced-colors: active) {
  .voice-recorder { border: 2px solid CanvasText; background: Canvas; }
  .recording-orb { border: 2px solid Highlight; background: Highlight; color: HighlightText !important; }
  .recording-orb .icon { color: HighlightText; }
  .recording-pulse,
  .recording-orb::after { display: none; }
  .voice-waveform { border: 1px solid CanvasText; background: Canvas; }
  .voice-waveform span { forced-color-adjust: none; background: Highlight; }
  .recording-live-dot { forced-color-adjust: none; background: Highlight; }
}
@media (prefers-reduced-motion: reduce) {
  .voice-recorder,
  .voice-recorder::before,
  .recording-orb,
  .recording-orb::before,
  .recording-orb::after,
  .recording-pulse,
  .recording-live-dot,
  .recording-orb .icon,
  .voice-waveform span {
    animation: none !important;
    transition: none !important;
  }
  .recording-pulse,
  .recording-orb::after { display: none; }
  .voice-waveform span { transform: scaleY(.42) !important; }
  .voice-waveform span:nth-child(3n) { transform: scaleY(.7) !important; }
  .voice-waveform span:nth-child(4n) { transform: scaleY(.26) !important; }
}



/* Rich contact overview */
:root { --drawer-width: 42rem; }

.app-shell.details-open {
  grid-template-columns: var(--rail-width) var(--inbox-width) minmax(0,1fr);
}

.drawer-backdrop {
  position: fixed;
  z-index: 110;
  inset: 0;
  display: block;
  border: 0;
  background: rgba(5,16,32,.54);
  backdrop-filter: blur(3px);
  cursor: default;
}
.drawer-backdrop[hidden] { display: none !important; }

.contact-drawer {
  position: fixed;
  z-index: 120;
  top: auto;
  right: max(20px,env(safe-area-inset-right));
  bottom: max(20px,env(safe-area-inset-bottom));
  left: auto;
  display: flex;
  width: min(var(--drawer-width),calc(100vw - 40px));
  max-width: var(--drawer-width);
  max-height: min(88dvh,calc(100dvh - 40px));
  min-width: 0;
  min-height: 0;
  flex-direction: column;
  overflow: hidden;
  border: 1px solid var(--line);
  border-radius: 18px;
  background: var(--surface);
  color: var(--ink);
  box-shadow: 0 28px 90px rgba(3,12,28,.34);
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  transform: translateY(14px) scale(.985);
  transform-origin: bottom right;
  transition: opacity .18s ease, transform .18s ease, visibility 0s linear .18s;
}
.contact-drawer[inert] { visibility: hidden; }
.app-shell.details-open .contact-drawer {
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
  transform: none;
  transition-delay: 0s;
}

.drawer-hero {
  position: relative;
  flex: none;
  padding: 18px;
  overflow: hidden;
  background:
    radial-gradient(circle at 88% 0,rgba(96,165,250,.28),transparent 36%),
    linear-gradient(135deg,#071a35 0%,#0d2f5f 58%,#174a8c 100%);
  color: #fff;
}
.drawer-hero::after {
  position: absolute;
  right: -52px;
  bottom: -82px;
  width: 190px;
  height: 190px;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 50%;
  content: "";
}
.drawer-heading-row,
.drawer-identity,
.overview-card-heading,
.overview-card-heading > div,
.overview-list-row,
.overview-alert,
.cycle-heading,
.schedule-action {
  display: flex;
  align-items: center;
}
.drawer-heading-row {
  position: relative;
  z-index: 1;
  justify-content: space-between;
  gap: 16px;
}
.drawer-identity {
  min-width: 0;
  gap: 11px;
}
.drawer-identity .avatar {
  flex: none;
  box-shadow: 0 0 0 3px rgba(255,255,255,.13);
}
.drawer-heading-copy { min-width: 0; }
.drawer-heading-copy p {
  margin: 0 0 2px;
  color: #bfdbfe;
  font-size: 10px;
  font-weight: 760;
  letter-spacing: .04em;
  text-transform: uppercase;
}
.drawer-heading-copy h2 {
  margin: 0;
  overflow: hidden;
  color: #fff;
  font-size: 18px;
  letter-spacing: -.02em;
  text-overflow: ellipsis;
  white-space: nowrap;
}
#drawerPresence {
  display: block;
  margin-top: 2px;
  color: rgba(226,238,255,.7);
  font-size: 10px;
}
.drawer-close {
  flex: none;
  border-color: rgba(255,255,255,.14);
  background: rgba(255,255,255,.08);
  color: #fff;
}
.drawer-close:hover { background: rgba(255,255,255,.16); color: #fff; }

.drawer-summary {
  position: relative;
  z-index: 1;
  display: grid;
  grid-template-columns: repeat(3,minmax(0,1fr));
  gap: 8px;
  margin-top: 16px;
}
.drawer-summary > div {
  min-width: 0;
  padding: 10px 8px;
  border: 1px solid rgba(255,255,255,.09);
  border-radius: 11px;
  background: rgba(255,255,255,.075);
  text-align: center;
}
.drawer-summary strong,
.drawer-summary span { display: block; }
.drawer-summary strong {
  overflow: hidden;
  color: #fff;
  font-size: 15px;
  line-height: 1.2;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.drawer-summary span {
  margin-top: 4px;
  color: rgba(226,238,255,.66);
  font-size: 8px;
  font-weight: 720;
  letter-spacing: .035em;
  line-height: 1.25;
  text-transform: uppercase;
}

.contact-drawer .drawer-body {
  display: grid;
  min-height: 0;
  flex: 1;
  gap: 12px;
  overflow-y: auto;
  overscroll-behavior: contain;
  scrollbar-gutter: stable;
  padding: 15px;
  background:
    linear-gradient(180deg,color-mix(in srgb,var(--surface-subtle) 78%,var(--surface)),var(--surface-subtle));
}
.overview-card {
  min-width: 0;
  padding: 14px;
  border: 1px solid var(--line);
  border-radius: 13px;
  background: var(--surface);
  box-shadow: 0 1px 0 rgba(255,255,255,.32);
}
.overview-card-heading {
  gap: 8px;
  margin-bottom: 11px;
}
.overview-card-heading h3 {
  margin: 0;
  color: var(--ink);
  font-size: 12px;
  font-weight: 780;
  letter-spacing: -.01em;
}
.overview-card-heading.split {
  justify-content: space-between;
  gap: 12px;
}
.overview-card-heading.split > div { gap: 8px; }
.overview-card-heading.split > span {
  color: var(--muted);
  font-size: 9px;
}
.overview-card-icon {
  display: grid;
  width: 27px;
  height: 27px;
  flex: none;
  place-items: center;
  border-radius: 8px;
  background: var(--green-soft);
  color: var(--green-strong);
}
.overview-card-icon .icon { width: 16px; height: 16px; }

.profile-details { margin: 0; }
.profile-details > div {
  display: grid;
  grid-template-columns: 132px minmax(0,1fr);
  align-items: center;
  gap: 12px;
  min-height: 39px;
  padding: 6px 0;
  border-bottom: 1px solid var(--line);
}
.profile-details > div:last-child { border-bottom: 0; }
.profile-details dt {
  color: var(--muted);
  font-size: 9px;
  font-weight: 700;
  letter-spacing: .035em;
  text-transform: uppercase;
}
.profile-details dd {
  min-width: 0;
  margin: 0;
  overflow-wrap: anywhere;
  color: var(--ink);
  font-size: 11px;
  font-weight: 680;
  text-align: right;
}
.copy-pill {
  display: inline-flex;
  min-height: 31px;
  align-items: center;
  justify-content: center;
  gap: 5px;
  padding: 5px 10px;
  border: 1px solid color-mix(in srgb,var(--green) 74%,var(--line));
  border-radius: 999px;
  background: var(--green);
  color: #fff;
  font-size: 9px;
  font-weight: 760;
  white-space: nowrap;
  transition: background .16s ease, transform .16s ease, box-shadow .16s ease;
}
.copy-pill:hover { background: var(--accent-strong); box-shadow: 0 5px 14px rgba(37,99,235,.2); transform: translateY(-1px); }
.copy-pill:disabled { border-color: var(--line); background: var(--surface-subtle); color: var(--muted); box-shadow: none; cursor: not-allowed; transform: none; }
.copy-pill.is-copied { background: var(--success); }
.copy-pill.compact { min-height: 29px; flex: none; padding-inline: 9px; }
.copy-pill .icon { width: 13px; height: 13px; }
.state-pill,
.schedule-action-state {
  display: inline-flex;
  min-height: 24px;
  align-items: center;
  justify-content: center;
  padding: 3px 8px;
  border-radius: 999px;
  background: var(--success-soft);
  color: var(--success-strong);
  font-size: 8px;
  font-weight: 780;
  white-space: nowrap;
}
.state-pill.attention { background: #fff1d7; color: #8c5708; }
.state-pill.blocked { background: var(--red-soft); color: var(--red); }
.overview-tags {
  justify-content: flex-start;
  margin-top: 11px;
  padding-top: 10px;
  border-top: 1px solid var(--line);
}
.overview-tags .tag { padding: 4px 8px; }

.overview-alert-list,
.overview-list {
  display: grid;
  gap: 8px;
}
.overview-alert {
  align-items: flex-start;
  gap: 10px;
  padding: 12px;
  border: 1px solid #dfc06b;
  border-radius: 12px;
  background: #fff8e3;
  color: #684500;
}
.overview-alert.info {
  border-color: #acd6e8;
  background: #edf8fc;
  color: #184e64;
}
.overview-alert.danger {
  border-color: #e8aba5;
  background: #fff0ef;
  color: #832d27;
}
.overview-alert-icon {
  display: grid;
  width: 27px;
  height: 27px;
  flex: none;
  place-items: center;
  border-radius: 8px;
  background: rgba(255,255,255,.66);
}
.overview-alert-icon .icon { width: 16px; height: 16px; }
.overview-alert strong { display: block; font-size: 10px; }
.overview-alert p { margin: 3px 0 0; font-size: 9px; line-height: 1.45; }

.overview-list-row {
  min-width: 0;
  justify-content: space-between;
  gap: 12px;
  padding: 10px;
  border: 1px solid var(--line);
  border-radius: 10px;
  background: var(--surface-subtle);
}
.overview-list-copy { min-width: 0; }
.overview-list-copy strong,
.overview-list-copy span { display: block; }
.overview-list-copy strong {
  color: var(--ink);
  font-size: 10px;
  line-height: 1.35;
}
.overview-list-copy span {
  margin-top: 2px;
  color: var(--muted);
  font-size: 8px;
  line-height: 1.35;
}
.overview-empty {
  margin: 0;
  padding: 10px;
  border: 1px dashed var(--line-strong);
  border-radius: 10px;
  background: var(--surface-subtle);
  color: var(--muted);
  font-size: 9px;
  line-height: 1.45;
}

.attendance-metrics,
.cycle-metrics {
  display: grid;
  grid-template-columns: repeat(4,minmax(0,1fr));
  gap: 7px;
}
.attendance-metrics > div,
.cycle-metrics > div,
.learning-summary > div,
.metric-row > div {
  min-width: 0;
  padding: 9px 7px;
  border: 1px solid var(--line);
  border-radius: 10px;
  background: var(--surface-subtle);
  text-align: center;
}
.attendance-metrics strong,
.attendance-metrics span,
.cycle-metrics strong,
.cycle-metrics span,
.learning-summary strong,
.learning-summary span {
  display: block;
}
.attendance-metrics strong,
.cycle-metrics strong,
.learning-summary strong {
  overflow: hidden;
  color: var(--ink);
  font-size: 14px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.attendance-metrics span,
.cycle-metrics span,
.learning-summary span {
  margin-top: 3px;
  color: var(--muted);
  font-size: 8px;
}
.attendance-metrics .positive strong,
.cycle-metrics > div:nth-child(2) strong { color: var(--success-strong); }
.attendance-metrics .negative strong,
.cycle-metrics > div:nth-child(3) strong { color: var(--red); }
.attendance-metrics .practice strong,
.cycle-metrics > div:nth-child(4) strong { color: #3c72c9; }

.attendance-history {
  display: flex;
  flex-wrap: wrap;
  gap: 4px;
  margin-top: 10px;
  padding: 9px;
  overflow: visible;
  border-radius: 10px;
  background: var(--surface-subtle);
}
.attendance-history.compact { background: rgba(255,255,255,.45); }
.attendance-history.compact[data-cycle-note]::before {
  flex: 1 0 100%;
  margin-bottom: 3px;
  color: var(--muted);
  content: attr(data-cycle-note);
  font-size: 8px;
}
.attendance-history > .overview-empty { width: 100%; }
.attendance-dot {
  position: relative;
  display: grid;
  width: 22px;
  height: 22px;
  flex: none;
  place-items: center;
  border: 0;
  border-radius: 6px;
  outline: 0;
}
.attendance-dot::before {
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: var(--success);
  box-shadow: 0 0 0 2px color-mix(in srgb,var(--success) 15%,transparent);
  content: "";
}
.attendance-dot.absent::before { background: var(--red); box-shadow: 0 0 0 2px color-mix(in srgb,var(--red) 15%,transparent); }
.attendance-dot.practice::before { background: #4d7ed0; box-shadow: 0 0 0 2px rgba(77,126,208,.14); }
.attendance-dot::after {
  position: absolute;
  z-index: 3;
  bottom: calc(100% + 5px);
  left: 50%;
  width: max-content;
  max-width: 210px;
  padding: 6px 8px;
  border-radius: 7px;
  background: #07172b;
  color: #fff;
  content: attr(data-tooltip);
  font-size: 8px;
  line-height: 1.35;
  opacity: 0;
  pointer-events: none;
  transform: translate(-50%,3px);
  transition: opacity .12s ease,transform .12s ease;
}
.attendance-dot:hover::after,
.attendance-dot:focus-visible::after { opacity: 1; transform: translate(-50%,0); }
.attendance-dot:focus-visible { box-shadow: 0 0 0 2px var(--surface),0 0 0 4px var(--focus); }
.attendance-legend {
  display: flex;
  flex: 1 0 100%;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 5px;
  padding-top: 7px;
  border-top: 1px solid var(--line);
}
.attendance-legend span {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  color: var(--muted);
  font-size: 8px;
}
.attendance-legend i {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--success);
}
.attendance-legend i.absent { background: var(--red); }
.attendance-legend i.practice { background: #4d7ed0; }

.cycle-card {
  margin-top: 10px;
  padding: 12px;
  border: 1px solid color-mix(in srgb,var(--green) 24%,var(--line));
  border-radius: 12px;
  background: color-mix(in srgb,var(--green-soft) 58%,var(--surface));
}
.cycle-heading {
  justify-content: space-between;
  gap: 12px;
  margin-bottom: 9px;
}
.cycle-heading h4 { margin: 0; color: var(--ink); font-size: 10px; }
.cycle-heading span { color: var(--green-strong); font-size: 8px; font-weight: 700; }

.schedule-action-grid {
  display: grid;
  grid-template-columns: repeat(2,minmax(0,1fr));
  gap: 8px;
  margin-top: 10px;
}
.schedule-action {
  position: relative;
  min-width: 0;
  align-items: flex-start;
  gap: 9px;
  padding: 11px;
  border: 1px solid #bad4e8;
  border-radius: 11px;
  background: #f1f8fd;
  color: #173e58;
}
.schedule-action.is-disabled {
  border-color: #e9c4bf;
  background: #fff3f1;
  color: #71342e;
}
.schedule-action-icon {
  display: grid;
  width: 26px;
  height: 26px;
  flex: none;
  place-items: center;
  border-radius: 8px;
  background: rgba(255,255,255,.72);
}
.schedule-action-icon .icon { width: 15px; height: 15px; }
.schedule-action > div { min-width: 0; padding-right: 2px; }
.schedule-action h4 { margin: 0; font-size: 9px; line-height: 1.35; }
.schedule-action p { margin: 3px 0 0; font-size: 8px; line-height: 1.4; opacity: .8; }
.schedule-action-state {
  position: absolute;
  top: 8px;
  right: 8px;
  min-height: 18px;
  padding-inline: 6px;
  background: rgba(255,255,255,.75);
  color: currentColor;
  font-size: 7px;
}
.schedule-action h4 { padding-right: 54px; }

.overview-subsection {
  display: grid;
  gap: 7px;
  margin-top: 13px;
}
.overview-subsection > h4 {
  margin: 0;
  color: var(--muted);
  font-size: 8px;
  font-weight: 760;
  letter-spacing: .05em;
  text-transform: uppercase;
}
.learning-summary {
  display: grid;
  grid-template-columns: repeat(2,minmax(0,1fr));
  gap: 8px;
}
.learning-summary .exam { border-color: #ecd99d; background: #fff9e9; }
.learning-summary .certificate { border-color: #bedbec; background: #f0f8fc; }
.learning-summary .exam strong { color: #8a5b08; }
.learning-summary .certificate strong { color: #2c6888; }
.overview-bottom-grid {
  display: grid;
  grid-template-columns: minmax(0,1.25fr) minmax(180px,.75fr);
  gap: 12px;
}
.overview-card textarea {
  width: 100%;
  min-height: 92px;
  resize: vertical;
  padding: 10px;
  border: 1px solid var(--line-strong);
  border-radius: 10px;
  outline: 0;
  background: var(--surface-subtle);
  color: var(--ink);
  font-size: 10px;
  line-height: 1.5;
}
.overview-card textarea:focus { border-color: var(--accent); box-shadow: 0 0 0 3px color-mix(in srgb,var(--accent) 12%,transparent); }
.overview-bottom-grid .metric-row { grid-template-columns: 1fr; }

.contact-drawer .drawer-footer {
  display: grid;
  min-height: 64px;
  flex: none;
  grid-template-columns: 1fr 1fr;
  gap: 8px;
  padding: 11px 14px max(11px,env(safe-area-inset-bottom));
  border-top: 1px solid var(--line);
  background: var(--surface);
}
.contact-drawer .drawer-footer button { min-height: 40px; }

body.dark .overview-card { box-shadow: none; }
body.dark .overview-alert { border-color: #705323; background: #302715; color: #f2cf85; }
body.dark .overview-alert.info { border-color: #28566a; background: #142d37; color: #a9d8ec; }
body.dark .overview-alert.danger { border-color: #6b3430; background: #321c1a; color: #efaaa4; }
body.dark .state-pill.attention { background: #3a2c19; color: #edb567; }
body.dark .attendance-history.compact { background: rgba(0,0,0,.12); }
body.dark .schedule-action { border-color: #294c5d; background: #142b34; color: #b8dced; }
body.dark .schedule-action.is-disabled { border-color: #63342f; background: #2e1d1a; color: #eab0aa; }
body.dark .learning-summary .exam { border-color: #5e4a20; background: #2c2516; }
body.dark .learning-summary .certificate { border-color: #294a5b; background: #142932; }
body.dark .learning-summary .exam strong { color: #e2bd6e; }
body.dark .learning-summary .certificate strong { color: #84c0df; }

@media (max-width: 959px) {
  .app-shell.details-open { grid-template-columns: var(--inbox-width) minmax(0,1fr); }
}

@media (max-width: 759px) {
  .app-shell.details-open { display: block; }
  .contact-drawer {
    top: max(8px,env(safe-area-inset-top));
    right: 8px;
    bottom: max(8px,env(safe-area-inset-bottom));
    left: 8px;
    width: auto;
    max-width: none;
    max-height: none;
    border-radius: 16px;
    transform-origin: bottom center;
  }
  .drawer-hero { padding: 14px; }
  .drawer-summary { margin-top: 13px; }
  .contact-drawer .drawer-body { gap: 10px; padding: 11px; }
  .overview-card { padding: 12px; }
  .profile-details > div { grid-template-columns: 104px minmax(0,1fr); }
  .overview-bottom-grid,
  .schedule-action-grid { grid-template-columns: 1fr; }
  .contact-drawer .drawer-footer { min-height: 60px; padding-inline: 11px; }
}

@media (max-width: 419px) {
  .drawer-identity .avatar { width: 36px; height: 36px; }
  .drawer-heading-copy h2 { font-size: 15px; }
  .drawer-summary { gap: 5px; }
  .drawer-summary > div { padding: 8px 5px; }
  .drawer-summary strong { font-size: 12px; }
  .drawer-summary span { font-size: 7px; }
  .attendance-metrics,
  .cycle-metrics { grid-template-columns: repeat(2,minmax(0,1fr)); }
  .profile-details > div { grid-template-columns: 84px minmax(0,1fr); gap: 8px; }
  .profile-details dt { font-size: 8px; }
  .copy-pill { min-height: 29px; padding-inline: 8px; }
  .contact-drawer .drawer-footer { padding-inline: 9px; }
}

@media (max-height: 620px) and (orientation: landscape) {
  .contact-drawer {
    top: 6px;
    bottom: 6px;
    max-height: calc(100dvh - 12px);
  }
  .drawer-hero { padding-block: 10px; }
  .drawer-summary { margin-top: 9px; }
  .drawer-summary > div { padding-block: 7px; }
}

@media (forced-colors: active) {
  .contact-drawer { border: 2px solid CanvasText; }
  .drawer-hero { background: Canvas; color: CanvasText; }
  .drawer-heading-copy h2,
  .drawer-heading-copy p,
  #drawerPresence,
  .drawer-summary strong,
  .drawer-summary span { color: CanvasText; }
  .drawer-summary > div,
  .overview-card,
  .overview-list-row,
  .overview-alert,
  .schedule-action { border: 1px solid CanvasText; }
  .attendance-dot::before,
  .attendance-legend i { forced-color-adjust: none; }
}

@media (prefers-reduced-motion: reduce) {
  .contact-drawer { transform: none; }
  .attendance-dot::after { transition: none; }
}
/* Voice-note-style recorder */
.voice-recorder {
  min-height: 58px;
  width: 100%;
  max-width: none;
  margin-inline: 0;
  grid-template-areas: "timer wave actions";
  grid-template-columns: auto minmax(120px,1fr) auto;
  gap: 8px;
  padding: 8px 10px;
  overflow: visible;
  border: 1px solid #7da3d6;
  border-radius: 18px 18px 6px 18px;
  background: #d5e7ff;
  box-shadow:
    0 1px 2px rgba(11,31,58,.08),
    0 5px 14px rgba(37,99,235,.12);
}
.voice-recorder::before,
.recording-identity { display: none !important; }
.voice-timer {
  min-width: 54px;
  min-height: 34px;
  gap: 6px;
  padding: 0;
  border: 0;
  border-radius: 0;
  background: transparent;
}
.recording-live-dot {
  width: 7px;
  height: 7px;
}
#voiceRecorderTime {
  min-width: 34px;
  font-size: 12px;
  font-weight: 800;
}
.voice-timer small { display: none; }
.voice-waveform {
  height: 34px;
  min-width: 0;
  align-items: center;
  justify-content: space-between;
  gap: 2px;
  padding: 0;
  border: 0;
  border-radius: 0;
  background: transparent;
  box-shadow: none;
}
.voice-waveform::before { display: none; }
.voice-waveform span {
  width: 3px;
  min-width: 3px;
  flex: 0 0 3px;
  border-radius: 3px;
  background: var(--accent);
  box-shadow: none;
  opacity: .78;
}
.voice-recorder.has-live-levels .voice-waveform span { opacity: 1; }
.voice-recorder-actions {
  gap: 4px;
}
.voice-recorder-actions .button-icon,
.voice-cancel,
.voice-stop {
  width: 34px;
  height: 34px;
  min-width: 34px;
  min-height: 34px;
  padding: 0;
  border-radius: 50%;
  font-size: 0;
  box-shadow: none;
}
.voice-recorder-actions .icon,
.voice-stop .icon {
  width: 14px;
  height: 14px;
}
#pauseVoiceBtn {
  border: 1px solid #9bb7dc;
  background: rgba(255,255,255,.72);
  color: var(--accent-strong);
}
#pauseVoiceBtn:hover {
  border-color: var(--accent);
  background: #fff;
  color: var(--accent-strong);
}
.voice-cancel {
  border: 1px solid #aebfd3;
  background: rgba(255,255,255,.62);
  color: #52647c;
}
.voice-cancel::after,
.voice-stop::after {
  display: none !important;
  content: "" !important;
}
.voice-cancel:hover {
  border-color: color-mix(in srgb,var(--red) 48%,#aebfd3);
  background: var(--red-soft);
  color: var(--red);
}
#stopVoiceBtn {
  border: 1px solid var(--accent);
  background: var(--accent);
  color: #fff;
  box-shadow: 0 3px 9px rgba(37,99,235,.22);
}
#stopVoiceBtn:hover {
  border-color: var(--accent-strong);
  background: var(--accent-strong);
  color: #fff;
}
.voice-recorder.is-requesting {
  min-height: 58px;
  border-color: #9bb7dc;
  background: #edf4ff;
}
.voice-recorder.is-requesting .recording-live-dot {
  background: #7b90aa;
  box-shadow: none;
  animation: none;
}
.voice-recorder.is-requesting .voice-waveform span {
  background: #7b90aa;
}
.voice-recorder.is-paused {
  min-height: 58px;
  border-color: #d7a74d;
  background: #fff2d8;
}
.voice-recorder.is-paused .recording-live-dot,
.voice-recorder.is-paused .voice-waveform span {
  background: var(--recording-amber);
}
.voice-recorder.is-paused #pauseVoiceBtn {
  border-color: #c98a22;
  background: #c98a22;
  color: #fff;
}
.voice-recorder.is-stopping {
  min-height: 58px;
  opacity: .78;
}
body.dark .voice-recorder {
  border-color: #4777b4;
  background: var(--bubble-out);
  box-shadow:
    0 1px 2px rgba(0,0,0,.18),
    0 5px 16px rgba(0,0,0,.22);
}
body.dark .voice-waveform,
body.dark .voice-timer {
  background: transparent;
}
body.dark #pauseVoiceBtn,
body.dark .voice-cancel {
  border-color: #5c7799;
  background: rgba(8,25,48,.48);
  color: #dbeafe;
}
body.dark #stopVoiceBtn {
  border-color: var(--accent);
  background: var(--accent);
  color: #07172b;
}
body.dark .voice-recorder.is-requesting {
  border-color: #416d9e;
  background: #132c4f;
}
body.dark .voice-recorder.is-paused {
  border-color: #98722d;
  background: #3b301e;
}

@media (min-width: 760px) {
  .composer-shell.is-recording .composer-inner {
    width: 100%;
    max-width: none;
  }
}

@media (max-width: 759px) {
  .voice-recorder {
    min-height: 56px;
    width: 100%;
    max-width: none;
    grid-template-areas: "timer wave actions";
    grid-template-columns: auto minmax(82px,1fr) auto;
    gap: 6px;
    padding: 7px 8px;
  }
  .voice-waveform {
    display: flex;
    height: 32px;
  }
  .voice-recorder-actions {
    width: auto;
    justify-content: flex-end;
  }
}
@media (max-width: 399px) {
  .voice-recorder {
    min-height: 54px;
    grid-template-columns: auto minmax(72px,1fr) auto;
    gap: 4px;
    padding: 6px;
  }
  .voice-timer {
    min-width: 48px;
    gap: 4px;
  }
  #voiceRecorderTime {
    min-width: 30px;
    font-size: 11px;
  }
  .recording-live-dot {
    width: 6px;
    height: 6px;
  }
  .voice-waveform {
    gap: 1px;
  }
  .voice-waveform span,
  .voice-waveform span:nth-child(n+16) {
    display: block;
    width: 2px;
    min-width: 2px;
    flex: 0 0 2px;
  }
  .voice-recorder-actions {
    gap: 2px;
  }
  .voice-recorder-actions .button-icon,
  .voice-cancel,
  .voice-stop {
    width: 32px;
    height: 32px;
    min-width: 32px;
    min-height: 32px;
  }
}
@media (forced-colors: active) {
  .voice-recorder,
  .voice-recorder.is-requesting,
  .voice-recorder.is-paused {
    border: 2px solid CanvasText;
    background: Canvas;
    color: CanvasText;
    box-shadow: none;
  }
  .voice-waveform span,
  .recording-live-dot {
    forced-color-adjust: none;
    background: Highlight;
  }
  #pauseVoiceBtn,
  .voice-cancel,
  #stopVoiceBtn {
    forced-color-adjust: auto;
    border: 2px solid ButtonText;
    background: ButtonFace;
    color: ButtonText;
  }
}
/* Mobile-first message actions and selection */
.message-row {
  position: relative;
}
.message-stack {
  max-width: 100%;
}
.message-menu-trigger {
  position: absolute;
  z-index: 7;
  top: 0;
  inset-inline-end: 0;
  display: grid;
  width: 44px;
  height: 44px;
  place-items: center;
  padding: 0;
  border: 0;
  border-radius: 10px;
  outline: 0;
  background: transparent;
  color: var(--muted-strong);
  touch-action: manipulation;
}
.message-menu-trigger::before {
  position: absolute;
  width: 28px;
  height: 28px;
  border: 1px solid color-mix(in srgb,var(--line) 82%,transparent);
  border-radius: 8px;
  background: color-mix(in srgb,var(--surface) 88%,transparent);
  box-shadow: 0 3px 10px rgba(30,58,95,.1);
  content: "";
  backdrop-filter: blur(8px);
}
.message-menu-trigger .icon {
  position: relative;
  z-index: 1;
  width: 14px;
  height: 14px;
  transition: transform .15s ease;
}
.message-menu-trigger[aria-expanded="true"] {
  color: var(--green-strong);
}
.message-menu-trigger[aria-expanded="true"]::before {
  border-color: color-mix(in srgb,var(--green) 42%,var(--line));
  background: color-mix(in srgb,var(--green-pale) 86%,var(--surface));
}
.message-menu-trigger[aria-expanded="true"] .icon {
  transform: rotate(180deg);
}
.message-menu-trigger:focus-visible {
  outline: 3px solid color-mix(in srgb,var(--focus) 58%,transparent);
  outline-offset: -3px;
}
.message-bubble > p {
  padding-inline-end: 34px;
}
.message-bubble > .bubble-reply {
  margin-inline-end: 34px;
}
.message-row.has-file .message-bubble,
.message-row.has-audio .message-bubble {
  padding-inline-end: 44px;
}
.message-row.has-media .media-expand {
  right: 50px;
}
.message-pin-mark {
  display: inline-flex;
  align-items: center;
  gap: 3px;
  margin-inline-end: auto;
  color: var(--green-strong);
  font-size: 8px;
  font-weight: 800;
}
.message-pin-mark .icon {
  width: 10px;
  height: 10px;
}
.message-row.is-selected .message-bubble {
  outline: 3px solid color-mix(in srgb,var(--green) 48%,transparent);
  outline-offset: 2px;
  box-shadow: 0 7px 20px color-mix(in srgb,var(--green) 12%,transparent);
}
.message-selection-toggle {
  position: relative;
  display: grid;
  width: 44px;
  height: 44px;
  flex: none;
  place-items: center;
  padding: 0;
  border: 0;
  border-radius: 50%;
  outline: 0;
  background: transparent;
  color: var(--muted);
  touch-action: manipulation;
}
.message-selection-toggle::before {
  position: absolute;
  width: 30px;
  height: 30px;
  border: 2px solid var(--line-strong);
  border-radius: 50%;
  background: var(--surface);
  content: "";
}
.message-selection-toggle .icon {
  position: relative;
  z-index: 1;
  width: 15px;
  height: 15px;
}
.message-selection-toggle[aria-pressed="true"] {
  color: #fff;
}
.message-selection-toggle[aria-pressed="true"]::before {
  border-color: var(--green);
  background: var(--green);
}
.message-selection-toggle:focus-visible {
  outline: 3px solid color-mix(in srgb,var(--focus) 55%,transparent);
  outline-offset: -2px;
}
.thread.is-selection-mode .message-menu-trigger {
  visibility: hidden;
  pointer-events: none;
}

.message-action-backdrop {
  display: none !important;
}
.message-action-menu {
  position: fixed !important;
  z-index: 210;
  top: auto;
  right: auto;
  bottom: auto;
  left: auto;
  width: min(224px,calc(100vw - 16px));
  max-height: min(430px,calc(100dvh - 16px));
  padding: 6px;
  overflow-y: auto;
  border-radius: 13px;
  box-shadow: 0 18px 48px rgba(5,17,38,.32);
}.message-action-heading {
  display: flex;
  min-width: 0;
  align-items: flex-start;
  justify-content: space-between;
  gap: 10px;
  padding: 7px 7px 8px 9px;
  border-bottom: 1px solid var(--line);
}
.message-action-heading > div {
  min-width: 0;
  padding-top: 2px;
}
.message-action-heading strong,
.message-action-heading small {
  display: block;
}
.message-action-heading strong {
  color: var(--ink);
  font-size: 11px;
}
.message-action-heading small {
  max-width: min(156px,calc(100vw - 76px));
  margin-top: 3px;
  overflow: hidden;
  color: var(--muted);
  font-size: 9px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.message-action-heading .button-icon {
  width: 32px;
  height: 32px;
  flex: none;
}
.message-action-list {
  display: grid;
  gap: 3px;
  padding-top: 5px;
}
.message-action-list button {
  display: flex;
  width: 100%;
  min-height: 44px;
  align-items: center;
  gap: 9px;
  padding: 6px 9px;
  border: 0;
  border-radius: 9px;
  background: transparent;
  color: var(--ink);
  font-size: 11px;
  font-weight: 700;
  text-align: start;
  touch-action: manipulation;
}
.message-action-list button:hover,
.message-action-list button:focus-visible {
  outline: 0;
  background: var(--surface-subtle);
}
.message-action-list button:focus-visible {
  box-shadow: inset 0 0 0 2px color-mix(in srgb,var(--focus) 58%,transparent);
}
.message-action-list button.danger {
  color: var(--red);
}
.message-action-list button.danger:hover,
.message-action-list button.danger:focus-visible {
  background: var(--red-soft);
}
.message-action-icon {
  display: grid;
  width: 28px;
  height: 28px;
  flex: none;
  place-items: center;
  border-radius: 8px;
  background: color-mix(in srgb,var(--green-pale) 74%,var(--surface));
  color: var(--green-strong);
}
.message-action-icon .icon {
  width: 14px;
  height: 14px;
}
.message-action-list button.danger .message-action-icon {
  background: var(--red-soft);
  color: var(--red);
}

.message-selection-bar {
  width: 100%;
  min-height: 62px;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
  padding: 8px 8px max(8px,env(safe-area-inset-bottom));
  background: color-mix(in srgb,var(--surface) 94%,var(--green-pale));
}
.message-selection-bar:not([hidden]) {
  display: flex;
}
.message-selection-summary {
  display: flex;
  min-width: 0;
  align-items: center;
  gap: 7px;
}
.selection-summary-icon {
  display: grid;
  width: 30px;
  height: 30px;
  flex: none;
  place-items: center;
  border-radius: 9px;
  background: var(--green-pale);
  color: var(--green-strong);
}
.selection-summary-icon .icon {
  width: 15px;
  height: 15px;
}
.message-selection-summary strong {
  overflow: hidden;
  color: var(--ink);
  font-size: 11px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.message-selection-actions {
  display: flex;
  flex: none;
  align-items: center;
  gap: 3px;
}
.message-selection-actions .button-icon {
  width: 44px;
  height: 44px;
  min-height: 44px;
  border-radius: 11px;
}
.message-selection-actions .button-icon:hover,
.message-selection-actions .button-icon:focus-visible {
  background: var(--surface);
}
.message-selection-actions .button-icon.danger {
  color: var(--red);
}
.message-selection-actions .button-icon.danger:hover,
.message-selection-actions .button-icon.danger:focus-visible {
  background: var(--red-soft);
}
.composer-shell.has-message-selection {
  background: color-mix(in srgb,var(--surface) 94%,var(--green-pale));
}

@media (max-width: 759px) {
  .message-menu-trigger {
    width: 1px;
    height: 1px;
    overflow: hidden;
    clip-path: inset(50%);
    opacity: 0;
    pointer-events: none;
    white-space: nowrap;
  }
  .message-menu-trigger::before {
    width: 1px;
    height: 1px;
    border: 0;
    box-shadow: none;
  }
  .message-menu-trigger .icon {
    width: 1px;
    height: 1px;
  }
  .message-menu-trigger:focus-visible {
    width: 44px;
    height: 44px;
    overflow: visible;
    clip-path: none;
    opacity: 1;
    pointer-events: auto;
    white-space: normal;
  }
  .message-menu-trigger:focus-visible::before {
    width: 28px;
    height: 28px;
    border: 1px solid color-mix(in srgb,var(--line) 82%,transparent);
    border-radius: 8px;
    background: var(--bubble-in);
  }
  .outgoing .message-menu-trigger:focus-visible::before {
    background: var(--bubble-out);
  }
  .message-menu-trigger:focus-visible .icon {
    width: 14px;
    height: 14px;
  }
  .message-bubble {
    -webkit-touch-callout: none;
    user-select: none;
    transition: box-shadow .12s ease,transform .12s ease;
  }
  .message-bubble.is-long-pressing {
    transform: scale(.992);
    box-shadow: 0 0 0 3px color-mix(in srgb,var(--accent) 24%,transparent),0 2px 6px rgba(30,58,95,.08);
  }
  .message-bubble > p {
    padding-inline-end: 0;
  }
  .message-bubble > .bubble-reply {
    margin-inline-end: 0;
  }
  .message-row.has-file .message-bubble {
    padding-inline-end: 11px;
  }
  .message-row.has-audio .message-bubble {
    padding-inline-end: 9px;
  }
  .message-row.has-media .media-expand {
    right: 8px;
  }
  .thread.is-selection-mode .message-row,
  .thread.is-selection-mode .message-row.has-media,
  .thread.is-selection-mode .message-row.has-audio {
    max-width: calc(100% - 8px);
  }
  .thread.is-selection-mode .message-stack {
    min-width: 0;
    max-width: calc(100% - 51px);
  }
  .thread.is-selection-mode .message-row.has-media .message-attachment.media-card {
    width: min(330px,calc(100vw - 118px));
    min-width: 0;
  }
  .thread.is-selection-mode .message-row.has-audio .message-attachment.audio-card,
  .thread.is-selection-mode .message-row.has-audio .message-attachment.audio-card.is-voice {
    width: min(330px,calc(100vw - 112px));
    min-width: 0;
  }
  .thread.is-selection-mode .message-row.has-file .file-card {
    min-width: min(228px,calc(100vw - 122px));
  }
}
@media (max-width: 359px) {
  .message-selection-bar {
    gap: 4px;
    padding-inline: 5px;
  }
  .selection-summary-icon {
    width: 28px;
    height: 28px;
  }
  .message-selection-summary {
    gap: 4px;
  }
  .message-selection-actions {
    gap: 1px;
  }
  .message-selection-actions .button-icon {
    width: 42px;
    height: 42px;
  }
}

@media (min-width: 760px) {
  .message-menu-trigger {
    top: 2px;
    width: 32px;
    height: 32px;
    opacity: 0;
    color: color-mix(in srgb,var(--message-text) 68%,transparent);
    transition: color .14s ease,opacity .14s ease;
  }
  .outgoing .message-menu-trigger {
    color: color-mix(in srgb,var(--message-text-out) 72%,transparent);
  }
  .message-menu-trigger::before {
    width: 26px;
    height: 26px;
    border-color: transparent;
    border-radius: 7px;
    background: transparent;
    box-shadow: none;
    backdrop-filter: none;
  }
  .outgoing .message-menu-trigger::before {
    background: transparent;
  }
  .message-menu-trigger:hover,
  .message-menu-trigger[aria-expanded="true"] {
    color: var(--accent-strong);
  }
  .message-menu-trigger:hover::before,
  .message-menu-trigger[aria-expanded="true"]::before {
    border-color: transparent;
    background: color-mix(in srgb,var(--accent) 9%,transparent);
  }
  .outgoing .message-menu-trigger:hover::before,
  .outgoing .message-menu-trigger[aria-expanded="true"]::before {
    background: color-mix(in srgb,var(--accent) 10%,transparent);
  }
  .message-row:hover .message-menu-trigger,
  .message-row:focus-within .message-menu-trigger,
  .message-menu-trigger[aria-expanded="true"] {
    opacity: 1;
  }
  .message-bubble > p {
    padding-inline-end: 24px;
  }
  .message-bubble > .bubble-reply {
    margin-inline-end: 26px;
  }
  .message-row.has-file .message-bubble,
  .message-row.has-audio .message-bubble {
    padding-inline-end: 36px;
  }
  .message-row.has-media .media-expand {
    right: 42px;
  }
  .message-action-backdrop {
    display: none !important;
  }
  .message-action-menu {
    right: auto;
    bottom: auto;
    left: auto;
    width: 224px;
    max-height: min(430px,calc(100vh - 16px));
    padding: 6px;
    border-radius: 13px;
  }
  .message-action-heading {
    padding: 7px 7px 8px 9px;
  }
  .message-action-heading strong {
    font-size: 11px;
  }
  .message-action-heading small {
    max-width: 156px;
    font-size: 9px;
  }
  .message-action-heading .button-icon {
    width: 32px;
    height: 32px;
  }
  .message-action-list button {
    min-height: 42px;
    gap: 9px;
    padding: 6px 9px;
    border-radius: 9px;
    font-size: 11px;
  }
  .message-action-icon {
    width: 28px;
    height: 28px;
    border-radius: 8px;
  }
  .message-action-icon .icon {
    width: 14px;
    height: 14px;
  }
  .message-selection-bar {
    width: min(100%,940px);
    min-height: 58px;
    margin: auto;
    padding: 7px 16px;
  }
  .message-selection-actions .button-icon {
    width: 38px;
    height: 38px;
    min-height: 38px;
  }
  .message-selection-toggle {
    width: 38px;
    height: 38px;
  }
  .message-selection-toggle::before {
    width: 28px;
    height: 28px;
  }
}

@media (forced-colors: active) {
  .message-menu-trigger::before,
  .message-selection-toggle::before,
  .message-action-menu,
  .message-selection-bar {
    border: 1px solid CanvasText;
  }
  .message-menu-trigger:focus-visible,
  .message-selection-toggle:focus-visible,
  .message-action-list button:focus-visible {
    outline: 2px solid Highlight;
  }
  .message-selection-toggle[aria-pressed="true"]::before {
    background: Highlight;
    color: HighlightText;
    forced-color-adjust: none;
  }
}
@media (prefers-reduced-motion: reduce) {
  .message-menu-trigger,
  .message-menu-trigger .icon {
    transition: none;
  }
}


/* Reference-matched Boston English Center sidebar */
:root {
  --rail-width: clamp(252px,17vw,330px);
}
.utility-rail.admin-sidebar {
  --sidebar-blue: #1757e8;
  --sidebar-ink: #344158;
  --sidebar-muted: #66738a;
  z-index: 30;
  display: flex;
  min-width: 0;
  min-height: 0;
  align-items: stretch;
  gap: 0;
  padding: 0 20px 14px;
  overflow: hidden;
  border-right: 1px solid #dfe5ef;
  background: #fff;
  color: var(--sidebar-ink);
}
.sidebar-mobile-close,
.mobile-nav-toggle,
.mobile-nav-backdrop {
  display: none;
}
.mobile-brand-copy {
  display: flex;
  min-width: 0;
  align-items: center;
  gap: 8px;
}
.mobile-nav-toggle,
.sidebar-mobile-close {
  width: 38px;
  height: 38px;
  flex: none;
  place-items: center;
  border: 1px solid #dbe3ee;
  border-radius: 11px;
  background: #fff;
  color: #344158;
  cursor: pointer;
}
.mobile-nav-toggle {
  margin-left: auto;
}
.mobile-nav-toggle .icon,
.sidebar-mobile-close .icon {
  width: 20px;
  height: 20px;
  stroke-width: 2;
}
.mobile-nav-toggle:hover,
.mobile-nav-toggle:focus-visible,
.sidebar-mobile-close:hover,
.sidebar-mobile-close:focus-visible {
  border-color: #9eb8ee;
  background: #f3f6ff;
  color: var(--sidebar-blue);
}
.sidebar-brand {
  display: flex;
  min-height: 126px;
  flex: none;
  align-items: center;
  gap: 13px;
  padding: 0 26px;
  border-bottom: 1px solid #e5e9f1;
  color: #111d33;
  text-decoration: none;
}
.sidebar-brand-mark {
  width: 41px;
  height: 41px;
  flex: none;
  fill: none;
  stroke: var(--sidebar-blue);
  stroke-width: 3.2;
  stroke-linecap: round;
  stroke-linejoin: round;
}
.sidebar-brand-copy {
  min-width: 0;
}
.sidebar-brand-copy strong,
.sidebar-brand-copy span {
  display: block;
  line-height: 1.03;
  white-space: nowrap;
}
.sidebar-brand-copy strong {
  font-size: 22px;
  font-weight: 850;
  letter-spacing: -.025em;
}
.sidebar-brand-copy span {
  margin-top: 4px;
  color: var(--sidebar-blue);
  font-size: 13px;
  font-weight: 850;
  letter-spacing: .01em;
}
.sidebar-brand:hover .sidebar-brand-copy strong {
  color: var(--sidebar-blue);
}
.sidebar-nav-scroll {
  min-height: 0;
  flex: 1;
  padding: 30px 13px 22px;
  overflow-x: hidden;
  overflow-y: auto;
  scrollbar-color: #ccd4e3 transparent;
  scrollbar-width: thin;
}
.sidebar-nav-group {
  margin: 0 0 23px;
}
.sidebar-nav-group:last-child {
  margin-bottom: 0;
}
.sidebar-nav-group h2 {
  margin: 0 0 8px;
  padding: 0 12px;
  color: var(--sidebar-muted);
  font-size: 10px;
  font-weight: 850;
  letter-spacing: .045em;
  text-transform: uppercase;
}
.sidebar-nav-item {
  position: relative;
  display: flex;
  min-height: 49px;
  align-items: center;
  gap: 14px;
  padding: 0 12px;
  border-radius: 11px;
  color: var(--sidebar-ink);
  font-size: 14px;
  font-weight: 720;
  line-height: 1.25;
  text-decoration: none;
  transition: background-color .14s ease,color .14s ease,transform .14s ease;
}
.sidebar-nav-item + .sidebar-nav-item {
  margin-top: 2px;
}
.sidebar-nav-item .icon {
  width: 24px;
  height: 24px;
  flex: none;
  stroke-width: 1.85;
}
.sidebar-nav-item:hover,
.sidebar-nav-item:focus-visible {
  background: #f3f6fb;
  color: #17243a;
  transform: translateX(2px);
}
.sidebar-nav-item.is-active {
  background: transparent;
  color: var(--sidebar-ink);
}
.sidebar-nav-item.is-active::before {
  display: none;
}
.sidebar-footer {
  flex: none;
  padding: 16px 0 0;
  border-top: 1px solid #e5e9f1;
}
.sidebar-profile {
  display: flex;
  min-height: 82px;
  align-items: center;
  gap: 13px;
  padding: 12px 15px;
  border-radius: 17px;
  background: #f5f4ff;
}
.sidebar-avatar {
  display: grid;
  width: 48px;
  height: 48px;
  flex: none;
  place-items: center;
  overflow: hidden;
  border: 3px solid #fff;
  border-radius: 50%;
  background: #fff;
  box-shadow: 0 3px 12px rgba(39,54,91,.08);
}
.sidebar-avatar-art {
  display: block;
  width: 100%;
  height: 100%;
}
.sidebar-profile-copy {
  min-width: 0;
}
.sidebar-profile-copy strong,
.sidebar-profile-copy small {
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.sidebar-profile-copy strong {
  color: #111d33;
  font-size: 16px;
  font-weight: 850;
}
.sidebar-profile-copy small {
  margin-top: 3px;
  color: #62708a;
  font-size: 12px;
  font-weight: 650;
}
.sidebar-logout {
  display: flex;
  min-height: 55px;
  align-items: center;
  gap: 14px;
  margin-top: 4px;
  padding: 0 18px;
  border-radius: 11px;
  color: #27364e;
  font-size: 14px;
  font-weight: 720;
  text-decoration: none;
}
.sidebar-logout:hover,
.sidebar-logout:focus-visible {
  background: #f6f8fb;
  color: #b3261e;
}
.sidebar-logout .icon {
  width: 24px;
  height: 24px;
  stroke-width: 1.9;
}

body.dark .utility-rail.admin-sidebar {
  --sidebar-ink: #d7e2f0;
  --sidebar-muted: #8fa1b8;
  border-color: #243652;
  background: #0b1628;
}
body.dark .sidebar-brand {
  border-color: #243652;
  color: #eef5ff;
}
body.dark .sidebar-nav-item {
  color: var(--sidebar-ink);
}
body.dark .sidebar-nav-item:hover,
body.dark .sidebar-nav-item:focus-visible {
  background: #14233a;
  color: #fff;
}
body.dark .sidebar-nav-item.is-active {
  background: #162a49;
  color: #b9d2ff;
}
body.dark .sidebar-footer {
  border-color: #243652;
}
body.dark .sidebar-profile {
  background: #16243a;
}
body.dark .sidebar-avatar {
  border-color: #2a3e5c;
  background: #2a3e5c;
}
body.dark .sidebar-profile-copy strong {
  color: #fff;
}
body.dark .sidebar-profile-copy small {
  color: #9eacc0;
}
body.dark .sidebar-logout {
  color: #d4deed;
}
body.dark .sidebar-logout:hover,
body.dark .sidebar-logout:focus-visible {
  background: #14233a;
  color: #ffaaa4;
}
body.dark .mobile-nav-toggle,
body.dark .sidebar-mobile-close {
  border-color: #334966;
  background: #102039;
  color: #d8e3f1;
}
body.dark .mobile-nav-toggle:hover,
body.dark .mobile-nav-toggle:focus-visible,
body.dark .sidebar-mobile-close:hover,
body.dark .sidebar-mobile-close:focus-visible {
  border-color: #5273a2;
  background: #172b49;
  color: #fff;
}

@media (max-width: 1179px) {
  .utility-rail.admin-sidebar {
    position: fixed;
    z-index: 100;
    inset: 0 auto 0 0;
    display: flex;
    width: min(330px,calc(100vw - 44px));
    height: 100dvh;
    max-height: none;
    padding-bottom: max(14px,env(safe-area-inset-bottom));
    visibility: hidden;
    pointer-events: none;
    box-shadow: 18px 0 48px rgba(13,25,48,.18);
    transform: translateX(calc(-100% - 18px));
    transition: transform .22s ease,visibility 0s linear .22s;
  }
  .utility-rail.admin-sidebar.is-open {
    visibility: visible;
    pointer-events: auto;
    transform: translateX(0);
    transition-delay: 0s;
  }
  .sidebar-mobile-close {
    position: absolute;
    z-index: 2;
    top: max(14px,env(safe-area-inset-top));
    right: 12px;
    display: grid;
  }
  .mobile-nav-backdrop:not([hidden]) {
    position: fixed;
    z-index: 90;
    inset: 0;
    display: block;
    width: 100%;
    height: 100%;
    border: 0;
    background: rgba(15,23,42,.42);
    cursor: default;
    -webkit-tap-highlight-color: transparent;
  }
  body.sidebar-nav-open {
    overflow: hidden;
  }
  .app-shell,
  .app-shell.details-open {
    grid-template-columns: var(--inbox-width) minmax(0,1fr);
  }
  .mobile-brand {
    display: flex;
  }
  .mobile-nav-toggle {
    display: grid;
  }
  .workspace-name {
    display: none;
  }
}
@media (max-height: 560px) and (orientation: landscape) and (max-width: 1179px) {
  .mobile-brand {
    display: flex;
    margin-bottom: 8px;
  }
  .mobile-brand-copy > span:last-child {
    display: none;
  }
}
@media (forced-colors: active) {
  .utility-rail.admin-sidebar,
  .sidebar-brand,
  .sidebar-footer {
    border-color: CanvasText;
  }
  .sidebar-nav-item.is-active {
    outline: 2px solid Highlight;
  }
  .sidebar-nav-item.is-active::before {
    background: Highlight;
    forced-color-adjust: none;
  }
}
@media (prefers-reduced-motion: reduce) {
  .sidebar-nav-item,
  .utility-rail.admin-sidebar {
    transition: none;
  }
}
/* Phone navigation follows the conversation-list screen */
.mobile-bottom-nav {
  display: none;
}
@media (max-width: 759px) {
  .mobile-nav-toggle {
    display: none;
  }
  .inbox-footer {
    display: none;
  }
  .mobile-bottom-nav {
    position: relative;
    z-index: 25;
    display: grid;
    min-height: 68px;
    flex: none;
    grid-template-columns: repeat(6,minmax(0,1fr));
    align-items: stretch;
    padding: 6px 3px max(6px,env(safe-area-inset-bottom));
    border-top: 1px solid var(--line-strong);
    background: var(--surface);
    box-shadow: 0 -9px 28px rgba(30,58,95,.11);
  }
  .mobile-bottom-nav a {
    display: flex;
    min-width: 0;
    min-height: 54px;
    align-items: center;
    justify-content: center;
    gap: 3px;
    padding: 4px 1px;
    border-radius: 9px;
    color: var(--muted-strong);
    text-align: center;
    text-decoration: none;
    flex-direction: column;
    -webkit-tap-highlight-color: transparent;
  }
  .mobile-bottom-nav a:hover,
  .mobile-bottom-nav a:focus-visible {
    background: var(--surface-subtle);
    color: var(--ink);
  }
  .mobile-bottom-nav a.is-active {
    background: var(--green-pale);
    color: var(--green-strong);
  }
  .mobile-bottom-nav a.is-active .icon {
    color: var(--green-strong);
  }
  body.dark .mobile-bottom-nav {
    border-color: #34445a;
    background: #0c1525;
    box-shadow: 0 -9px 28px rgba(3,10,22,.28);
  }
  body.dark .mobile-bottom-nav a {
    color: #c5cfdd;
  }
  body.dark .mobile-bottom-nav a:hover,
  body.dark .mobile-bottom-nav a:focus-visible {
    background: rgba(255,255,255,.08);
    color: #fff;
  }
  body.dark .mobile-bottom-nav a.is-active {
    background: rgba(130,168,255,.12);
    color: #fff;
  }
  body.dark .mobile-bottom-nav a.is-active .icon {
    color: #82a8ff;
  }
  .mobile-bottom-nav .icon {
    width: 23px;
    height: 23px;
    flex: none;
    stroke-width: 1.8;
  }
  .mobile-bottom-nav span {
    display: block;
    max-width: 100%;
    color: inherit;
    font-size: clamp(7.5px,2.25vw,9.5px);
    font-weight: 720;
    line-height: 1.08;
    overflow-wrap: normal;
  }
}
@media (max-width: 359px) {
  .mobile-bottom-nav {
    min-height: 65px;
    padding-inline: 1px;
  }
  .mobile-bottom-nav a {
    min-height: 51px;
    padding-inline: 0;
  }
  .mobile-bottom-nav .icon {
    width: 22px;
    height: 22px;
  }
}
@media (forced-colors: active) and (max-width: 759px) {
  .mobile-bottom-nav {
    border-color: CanvasText;
    background: Canvas;
  }
  .mobile-bottom-nav a {
    color: CanvasText;
  }
  .mobile-bottom-nav a.is-active {
    outline: 2px solid Highlight;
    outline-offset: -2px;
  }
}

/* Light-mode message surfaces stay legible over the illustrated chat canvas. */
body:not(.dark) .message-bubble {
  border-color: #aebfd3;
  background: #fff;
  box-shadow:
    0 1px 2px rgba(11,31,58,.08),
    0 5px 14px rgba(30,58,95,.1);
}
body:not(.dark) .outgoing .message-bubble {
  border-color: #7da3d6;
  background: #d5e7ff;
  box-shadow:
    0 1px 2px rgba(11,31,58,.08),
    0 5px 14px rgba(37,99,235,.12);
}
body:not(.dark) .message-sender {
  color: #3f5068;
  font-weight: 750;
}
body:not(.dark) .message-meta,
body:not(.dark) .message-channel {
  color: #52647c;
}

body:not(.dark) .message-attachment.audio-card:not(.is-voice) {
  padding: 10px;
  border: 1px solid #b8cbe3;
  border-radius: 12px;
  background: #f8fbff;
  box-shadow:
    inset 0 1px 0 #fff,
    0 2px 8px rgba(30,58,95,.09);
}
body:not(.dark) .outgoing .message-attachment.audio-card:not(.is-voice) {
  border-color: #96b5dd;
  background: rgba(255,255,255,.78);
}
body:not(.dark) .message-attachment.audio-card.is-voice {
  padding: 2px 0 0;
  border: 0;
  border-radius: 0;
  background: transparent;
  box-shadow: none;
}
body:not(.dark) .message-row.has-audio .message-bubble {
  border-radius: 18px 18px 18px 6px;
}
body:not(.dark) .message-row.outgoing.has-audio .message-bubble {
  border-radius: 18px 18px 6px 18px;
}
body:not(.dark) .audio-play {
  background: var(--accent);
  color: #fff;
  box-shadow: 0 4px 10px rgba(37,99,235,.24);
}
body:not(.dark) .audio-play:hover {
  background: var(--accent-strong);
  color: #fff;
}
body:not(.dark) .audio-card:not(.is-voice) .audio-track {
  padding: 4px 7px 3px;
  border: 1px solid #cfdaea;
  border-radius: 10px;
  background: #eaf1fa;
}
body:not(.dark) .outgoing .audio-card:not(.is-voice) .audio-track {
  border-color: #bfd0e8;
  background: #edf4ff;
}
body:not(.dark) .audio-card.is-voice .audio-track {
  padding: 0;
  border: 0;
  border-radius: 0;
  background: transparent;
  box-shadow: none;
}
body:not(.dark) .audio-waveform-layer i {
  background: #647a97;
}
body:not(.dark) .audio-waveform-layer i.is-played {
  background: var(--accent);
}
body:not(.dark) .audio-timing {
  color: #4f6076;
}
body:not(.dark) .audio-speed {
  border-color: #b8c8dc;
  background: #fff;
  color: #33455d;
}
body:not(.dark) .audio-play:focus-visible {
  outline: 3px solid rgba(37,99,235,.32);
  outline-offset: 2px;
}
body:not(.dark) .audio-seek:focus-visible {
  border-radius: 9px;
  outline: 3px solid rgba(37,99,235,.3);
  outline-offset: 1px;
}
body:not(.dark) .audio-seek::-webkit-slider-thumb {
  border-color: #fff;
  background: var(--accent);
  box-shadow: 0 2px 7px rgba(37,99,235,.3);
}
body:not(.dark) .audio-seek::-moz-range-thumb {
  border-color: #fff;
  background: var(--accent);
  box-shadow: 0 2px 7px rgba(37,99,235,.3);
}

@media (max-width: 399px) {
  body:not(.dark) .audio-card.is-voice .audio-controls {
    grid-template-columns: 42px 32px minmax(0,1fr);
    gap: 4px;
  }
  .audio-waveform-layer i {
    width: 2px;
    min-width: 2px;
    flex-basis: 2px;
  }
}

@media (forced-colors: active) {
  body:not(.dark) .message-bubble,
  body:not(.dark) .outgoing .message-bubble,
  body:not(.dark) .message-attachment.audio-card,
  body:not(.dark) .message-attachment.audio-card.is-voice,
  body:not(.dark) .audio-track,
  body:not(.dark) .audio-speed {
    border-color: CanvasText;
    background: Canvas;
    color: CanvasText;
    box-shadow: none;
  }
  body:not(.dark) .audio-play {
    border: 2px solid ButtonText;
    background: ButtonFace;
    color: ButtonText;
  }
}


    </style>
    <title>WhatsApp</title>
</head>
<body id="clientsDashboard">
  <svg class="svg-sprite" aria-hidden="true">
    <symbol id="i-chat" viewBox="0 0 24 24"><path d="M7 18.5 3.5 21l1.1-4.2A8.5 8.5 0 1 1 7 18.5Z"/><path d="M8 9.5h8M8 13h5"/></symbol>
    <symbol id="i-support" viewBox="0 0 24 24"><path d="M5 13v-2a7 7 0 0 1 14 0v2"/><path d="M5 12H3.5A1.5 1.5 0 0 0 2 13.5v2A1.5 1.5 0 0 0 3.5 17H6v-5H5ZM19 12h1.5a1.5 1.5 0 0 1 1.5 1.5v2a1.5 1.5 0 0 1-1.5 1.5H18v-5h1ZM18 17c-.8 2-2.6 3-5.5 3"/><circle cx="11" cy="20" r="1"/></symbol>
    <symbol id="i-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></symbol>
    <symbol id="i-sms" viewBox="0 0 24 24"><path d="M5 18.5 2.8 21l.8-3.7A8.5 8.5 0 1 1 5 18.5Z"/><path d="M7.5 9.5h9M7.5 13h6"/></symbol>
    <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4 4"/></symbol>
    <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>
    <symbol id="i-inbox" viewBox="0 0 24 24"><path d="M4 5.5h16v13H4z"/><path d="M4 14h4l1.5 2h5l1.5-2h4"/></symbol>
    <symbol id="i-template" viewBox="0 0 24 24"><path d="M7 3.5h10a2 2 0 0 1 2 2v15l-7-3-7 3v-15a2 2 0 0 1 2-2Z"/><path d="M8.5 8h7M8.5 11.5h5"/></symbol>
    <symbol id="i-moon" viewBox="0 0 24 24"><path d="M20 15.5A8 8 0 0 1 8.5 4 8.5 8.5 0 1 0 20 15.5Z"/></symbol>
    <symbol id="i-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></symbol>
    <symbol id="i-back" viewBox="0 0 24 24"><path d="m15 18-6-6 6-6"/></symbol>
    <symbol id="i-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></symbol>
    <symbol id="i-more" viewBox="0 0 24 24"><circle cx="5" cy="12" r="1"/><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/></symbol>
    <symbol id="i-check" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></symbol>
    <symbol id="i-paperclip" viewBox="0 0 24 24"><path d="m9 12.5 5.4-5.4a3 3 0 0 1 4.2 4.2l-7.1 7.1a5 5 0 0 1-7.1-7.1l7.2-7.2"/></symbol>
    <symbol id="i-smile" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 10h.01M15.5 10h.01M8 14c1 1.5 2.3 2.2 4 2.2s3-.7 4-2.2"/></symbol>
    <symbol id="i-send" viewBox="0 0 24 24"><path d="m4 4 17 8-17 8 3-8-3-8Z"/><path d="M7 12h14"/></symbol>
    <symbol id="i-close" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18"/></symbol>
    <symbol id="i-image" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="9" cy="9" r="1.5"/><path d="m4 17 5-5 4 4 2-2 5 4"/></symbol>
    <symbol id="i-file" viewBox="0 0 24 24"><path d="M6 3.5h8l4 4V21H6z"/><path d="M14 3.5V8h4M9 13h6M9 16.5h6"/></symbol>
    <symbol id="i-reply" viewBox="0 0 24 24"><path d="m9 8-5 4 5 4v-3h4.5c3 0 5 1.4 6.5 4.5-.2-5.4-2.5-8.5-7-8.5H9V8Z"/></symbol>
    <symbol id="i-download" viewBox="0 0 24 24"><path d="M12 3v12M7 10l5 5 5-5M5 20h14"/></symbol>
    <symbol id="i-trash" viewBox="0 0 24 24"><path d="M4 7h16M9 7V4h6v3M7 7l1 13h8l1-13M10 11v5M14 11v5"/></symbol>
    <symbol id="i-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
    <symbol id="i-chevron" viewBox="0 0 24 24"><path d="m8 10 4 4 4-4"/></symbol>
    <symbol id="i-mic" viewBox="0 0 24 24"><rect x="8" y="3" width="8" height="12" rx="4"/><path d="M5 11a7 7 0 0 0 14 0M12 18v3M8.5 21h7"/></symbol>
    <symbol id="i-stop" viewBox="0 0 24 24"><rect x="6" y="6" width="12" height="12" rx="2"/></symbol>
    <symbol id="i-pause" viewBox="0 0 24 24"><path d="M8 5v14M16 5v14"/></symbol>
    <symbol id="i-play" viewBox="0 0 24 24"><path d="m8 5 11 7-11 7Z"/></symbol>
    <symbol id="i-audio" viewBox="0 0 24 24"><path d="M9 18V6l10-2v12"/><circle cx="6" cy="18" r="3"/><circle cx="16" cy="16" r="3"/></symbol>
    <symbol id="i-filter" viewBox="0 0 24 24"><path d="M4 6h16M7 12h10M10 18h4"/><circle cx="7" cy="6" r="1"/><circle cx="15" cy="12" r="1"/><circle cx="12" cy="18" r="1"/></symbol>
    <symbol id="i-video" viewBox="0 0 24 24"><rect x="3" y="5" width="14" height="14" rx="2"/><path d="m17 10 4-2v8l-4-2"/></symbol>
    <symbol id="i-expand" viewBox="0 0 24 24"><path d="M8 3H3v5M16 3h5v5M21 16v5h-5M3 16v5h5"/></symbol>
    <symbol id="i-id-card" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="8" cy="11" r="2"/><path d="M5.5 16c.6-1.5 1.4-2.2 2.5-2.2s1.9.7 2.5 2.2M13 9h5M13 12h5M13 15h3"/></symbol>
    <symbol id="i-card" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 9h18M7 15h4"/></symbol>
    <symbol id="i-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M7 3v4M17 3v4M3 10h18M7 14h3M14 14h3M7 17h3"/></symbol>
    <symbol id="i-books" viewBox="0 0 24 24"><path d="M5 4h4v16H5zM10 4h4v16h-4zM16 5l3.5-1 3 14-3.5 1z"/></symbol>
    <symbol id="i-copy" viewBox="0 0 24 24"><rect x="8" y="8" width="11" height="11" rx="2"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2"/></symbol>
    <symbol id="i-pin" viewBox="0 0 24 24"><path d="m9 4 6 0-.8 4.2 3.3 3.3v2H6.5v-2l3.3-3.3L9 4Z"/><path d="M12 13.5V21"/></symbol>
    <symbol id="i-select" viewBox="0 0 24 24"><rect x="3.5" y="3.5" width="17" height="17" rx="3"/><path d="m7.5 12 3 3 6-7"/></symbol>
    <symbol id="i-brand-logo" viewBox="0 0 32 32"><circle cx="16" cy="14" r="9"/><path d="M10.2 21.2 7 24l1.4-5.2"/></symbol>
    <symbol id="i-dashboard" viewBox="0 0 24 24"><rect x="3.5" y="3.5" width="6.5" height="6.5" rx="1.3"/><rect x="14" y="3.5" width="6.5" height="6.5" rx="1.3"/><rect x="3.5" y="14" width="6.5" height="6.5" rx="1.3"/><rect x="14" y="14" width="6.5" height="6.5" rx="1.3"/></symbol>
    <symbol id="i-nav-chat" viewBox="0 0 24 24"><path d="M4 5.5h16v11H8l-4 3v-14Z"/><path d="M8 9h8M8 12.5h6"/></symbol>
    <symbol id="i-help-circle" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M9.7 9a2.5 2.5 0 1 1 3.7 2.2c-1 .6-1.4 1-1.4 2.1M12 16.8h.01"/></symbol>
    <symbol id="i-board" viewBox="0 0 24 24"><rect x="3" y="4.5" width="18" height="12" rx="1.8"/><path d="M9 20h6M12 16.5V20"/></symbol>
    <symbol id="i-logout" viewBox="0 0 24 24"><path d="M10 4H5v16h5M14 8l4 4-4 4M8 12h10"/></symbol>
    <symbol id="i-menu" viewBox="0 0 24 24"><path d="M4 6.5h16M4 12h16M4 17.5h16"/></symbol>
    <symbol id="i-warning" viewBox="0 0 24 24"><path d="M12 3 2.8 19h18.4L12 3Z"/><path d="M12 9v4M12 16.5h.01"/></symbol>
  </svg>
  <div class="app-shell" id="appShell">
    <nav class="utility-rail admin-sidebar" id="appMainNavigation" aria-label="Main navigation">
      <a class="sidebar-brand" href="{{route('landing')}}" aria-label="Boston English Center dashboard">
        <svg class="sidebar-brand-mark" aria-hidden="true"><use href="#i-brand-logo"/></svg>
        <span class="sidebar-brand-copy"><strong>Boston</strong><span>English Center</span></span>
      </a>
      <button id="mobileNavClose" class="sidebar-mobile-close" type="button" aria-label="Close navigation"><svg class="icon" aria-hidden="true"><use href="#i-close"/></svg></button>
      <div class="sidebar-nav-scroll">
        @if(auth()->check())
          @if(auth()->user()->role_id==4)
            @include("student.app.dashboard.menu", ["active" => "whatsapp"])
          @elseif(in_array(auth()->user()->role_id,[1,2]))
            @include("admin.layout.app-menu", ["active" => "whatsapp"])
          @elseif(in_array(auth()->user()->role_id,[3,5]))
            @include("tutor.layout.app-menu", ["active" => "whatsapp"])
          @elseif(auth()->user()->role_id==6)
            @include("volunteer.dashboard.menu", ["active" => "whatsapp"])
          @endif
        @endif
      </div>
      <div class="sidebar-footer">
        <div class="sidebar-profile" role="group">
          <span class="sidebar-avatar" aria-hidden="true"><svg class="sidebar-avatar-art" viewBox="0 0 48 48"><circle cx="24" cy="24" r="23" fill="#fffdf7"/><path d="M13 45c.8-9 4.7-13.2 11-13.2S34.2 36 35 45" fill="#dce7f9"/><path d="M17.5 45v-9.2l6.5 4.8 6.5-4.8V45" fill="#344158"/><path d="m21.2 32 2.8 8.6 2.8-8.6" fill="#fff"/><path d="M24 6.5c-6.1 0-10.2 4.4-10.2 10.7 0 7 4.4 13.4 10.2 13.4s10.2-6.4 10.2-13.4C34.2 10.9 30.1 6.5 24 6.5Z" fill="#d9a56f"/><path d="M14 17.5c.1-7.4 4.2-12 10.2-12 6.3 0 10 4.6 10 11.9-2.8-1-5.1-3.1-6.4-6.2-3 3.2-7.3 5.2-13.8 6.3Z" fill="#6a4a2e"/><circle cx="20" cy="19.6" r="1" fill="#26364e"/><circle cx="28" cy="19.6" r="1" fill="#26364e"/><path d="M21 25c2 1.4 4 1.4 6 0" fill="none" stroke="#8c4d3f" stroke-linecap="round"/><path d="M14 20.2h-2.2v5.2H15M34 20.2h2.2v5.2H33" fill="none" stroke="#1757e8" stroke-width="1.7"/><path d="M12 20.2c.5-4.4 4.6-7.8 12-7.8s11.5 3.4 12 7.8" fill="none" stroke="#1757e8" stroke-width="1.7"/></svg></span>
          <span class="sidebar-profile-copy"><strong>{{auth()->user()->name}}</strong><small>{{auth()->user()->role->name ?? 'User'}}</small></span>
        </div>
        <a class="sidebar-logout" href="{{ route('logout') }}"><svg class="icon" aria-hidden="true"><use href="#i-logout"/></svg><span>Log out</span></a>
      </div>
      <button id="railTemplatesBtn" type="button" hidden aria-hidden="true" tabindex="-1"></button>
      <button id="themeToggle" type="button" hidden aria-label="Use dark theme" aria-pressed="false"><svg class="theme-icon-moon"><use href="#i-moon"/></svg><svg class="theme-icon-sun"><use href="#i-sun"/></svg></button>
    </nav>
    <button id="mobileNavBackdrop" class="mobile-nav-backdrop" type="button" aria-label="Close navigation" hidden></button>

    <aside class="conversations-pane" id="leftSideSection" aria-label="Conversations">
      <header class="inbox-header">
        <div class="mobile-brand">
          <span class="mobile-brand-copy"><span class="brand-mini">B</span><span>Boston English</span></span>
          <button id="mobileNavToggle" class="mobile-nav-toggle" type="button" aria-label="Open navigation" aria-controls="appMainNavigation" aria-expanded="false"><svg class="icon" aria-hidden="true"><use href="#i-menu"/></svg></button>
        </div>
        <div class="inbox-title-row"><div><p class="workspace-name">Boston English Center</p><h1>Conversations <span id="conversationCount" class="title-count">0</span></h1></div></div>
        <label class="search-field" for="searchInput"><svg class="icon"><use href="#i-search"/></svg><input id="searchInput" type="text" role="searchbox" inputmode="search" aria-label="Search conversations" placeholder="Search name, phone or message" autocomplete="off"><kbd>/</kbd><button id="clearSearchBtn" type="button" aria-label="Clear search" hidden><svg class="icon"><use href="#i-close"/></svg></button></label>
      </header>
      <div class="conversation-control-row">
        <div class="category-switch" id="typeDashboard" aria-label="Contact type">
          @if(request()->segment(2)=='chat')
            @if($canManageAssistants)
              <button type="button" id="btnTutor" data-category="tutors" aria-pressed="false">Tutors <span data-count="tutors" id="tutorUnseenMessages" class="hidden"></span></button>
              <button type="button" id="btnClients" data-category="clients" aria-pressed="true">Clients <span data-count="clients" id="clientUnseenMessages" class="hidden"></span></button>
              <button type="button" id="btnStudents" data-category="students" aria-pressed="false">Students <span data-count="students" id="studentUnseenMessages" class="hidden"></span></button>
            @else
              <button type="button" id="btnClients" data-category="clients" aria-pressed="true">Clients <span data-count="clients" id="clientUnseenMessages" class="hidden"></span></button>
              <button type="button" id="btnStudents" data-category="students" aria-pressed="false">Students <span data-count="students" id="studentUnseenMessages" class="hidden"></span></button>
            @endif
          @else
            <button type="button" id="btnClients" data-category="clients" aria-pressed="true">Active <span data-count="clients" id="clientUnseenMessages" class="hidden"></span></button>
            <button type="button" id="btnStudents" data-category="students" aria-pressed="false">Canceled <span data-count="students" id="studentUnseenMessages" class="hidden"></span></button>
          @endif
        </div>
        <div class="status-filter-bar">
          <button id="statusFilterBtn" class="status-filter-trigger" type="button" aria-label="Filter conversations: Newest" title="Filter conversations" aria-haspopup="menu" aria-expanded="false" aria-controls="statusFilterMenu">
            <span class="filter-icon"><svg class="icon"><use href="#i-filter"/></svg><span id="statusFilterActive" class="filter-active-mark" hidden></span></span>
            <span id="statusFilterLabel" class="sr-only">Newest</span>
          </button>
          <div>
            <select id="filterContactSelector" class="hidden">
              <option value="newest" selected>Newest</option>
              <option value="unanswered">Unanswered</option>
              <option value="unread">Unread</option>
              @if(auth()->user()->role_id!=2 || auth()->user()->assistant->have_all_whatsapp_access)
                <option value="ai">Ai</option>
                <option value="trial_booking_agent">Trial Booking Assistant</option>
                <option value="trial_attending_agent">Trial Attending Assistant</option>
                <option value="trial_subscribing_agent">Subscription Assistant</option>
              @endif
            </select>
          </div>
          <div id="statusFilterMenu" class="floating-panel status-filter-menu" role="menu" aria-label="Filter conversations" hidden>
            <button type="button" role="menuitemradio" data-filter="newest" aria-checked="true"><span class="filter-option-label">Newest</span><svg class="icon filter-check"><use href="#i-check"/></svg></button>
            <button type="button" role="menuitemradio" data-filter="unanswered" aria-checked="false"><span class="filter-option-label">Unanswered</span><svg class="icon filter-check"><use href="#i-check"/></svg></button>
            <button type="button" role="menuitemradio" data-filter="unread" aria-checked="false"><span class="filter-option-label">Unread</span><svg class="icon filter-check"><use href="#i-check"/></svg></button>
            @if(auth()->user()->role_id!=2 || auth()->user()->assistant->have_all_whatsapp_access)
            <button type="button" role="menuitemradio" data-filter="ai" aria-checked="false"><span class="filter-option-label">AI</span><svg class="icon filter-check"><use href="#i-check"/></svg></button>
            <button type="button" role="menuitemradio" data-filter="trial-booking" aria-checked="false"><span class="filter-option-label">Trial Booking Assistant</span><svg class="icon filter-check"><use href="#i-check"/></svg></button>
            <button type="button" role="menuitemradio" data-filter="trial-attending" aria-checked="false"><span class="filter-option-label">Trial Attending Assistant</span><svg class="icon filter-check"><use href="#i-check"/></svg></button>
            <button type="button" role="menuitemradio" data-filter="subscription" aria-checked="false"><span class="filter-option-label">Subscription Assistant</span><svg class="icon filter-check"><use href="#i-check"/></svg></button>
            @endif
          </div>
        </div>
      </div>
      <div id="connectionBanner" class="connection-banner" role="status" hidden><span></span><div><strong>You're offline</strong><small>Changes will stay in this preview.</small></div></div>
      <div id="contactsContainer">
      <div id="searchContainer" class="hidden">
        <div id="searchList"></div>
      </div>
      <div id="boxContactList" class="contact-scroll">
        <div id="contact-list" role="listbox" aria-label="Conversation list"></div>
        <div id="emptyContacts" class="empty-state compact" hidden><span class="empty-symbol">&#8981;</span><h2>No conversations found</h2><p>Try another search or clear the filters.</p><button id="clearFiltersBtn" type="button" class="button-secondary">Clear filters</button></div>
      </div>
      </div>
      <footer class="inbox-footer"><span class="status-dot"></span><span>Local preview</span><span>&middot;</span><button id="shortcutsBtn" type="button">Shortcuts</button></footer>
      <nav class="mobile-bottom-nav" aria-label="Primary navigation">
        <a href="{{route('landing')}}"><svg class="icon" aria-hidden="true"><use href="#i-dashboard"/></svg><span>Dashboard</span></a>
        <a class="is-active" href="#" aria-current="page"><svg class="icon" aria-hidden="true"><use href="#i-nav-chat"/></svg><span>Whatsapp</span></a>
      </nav>
    </aside>

    <main id="rightSideSection" class="conversation-pane">
      <section id="chatEmpty" class="empty-conversation">
        <div class="empty-conversation-mark"><svg class="icon"><use href="#i-chat"/></svg></div>
        <h2>Open a conversation</h2>
        <p>Pick a conversation from the list to start chatting. Messages in this preview stay on your device.</p>
      </section>
      <section id="chatView" class="chat-view" aria-label="Active conversation" style="display:none;">
        <header class="chat-header" id="active-user">
          <button id="mobileBack" type="button" class="button-icon mobile-back" aria-label="Back to conversations"><svg class="icon"><use href="#i-back"/></svg></button>
          <button id="btnCloseConversation" class="button-icon hide-small" type="button" aria-label="Close conversation" data-tooltip="Close conversation"><svg class="icon"><use href="#i-back"/></svg></button>
          <button class="active-contact" id="activeContactButton" type="button" aria-label="Open contact details">
            <span class="avatar avatar-lg" id="active-user-avatar" aria-hidden="true"></span>
            <span class="active-copy"><strong id="active-user-name"></strong><small id="active-user-status"></small></span>
            <iconify-icon class="clipboard_icon" id="active-user-email" data-content="" icon="line-md:clipboard-arrow-twotone" width="16" height="16" style="display:none"></iconify-icon>
            <iconify-icon class="clipboard_icon" id="active-user-phone" data-content="" icon="line-md:clipboard-arrow-twotone" width="16" height="16" style="display:none"></iconify-icon>
          </button>
          <div class="chat-actions">
            <button id="conversationSearchBtn" class="button-icon hide-small" type="button" aria-label="Search this conversation" data-tooltip="Search"><svg class="icon"><use href="#i-search"/></svg></button>
            <button id="btnMarkAnswered" class="button-resolve" type="button" aria-label="Mark answered"><svg class="icon"><use href="#i-check"/></svg><span>Mark answered</span></button>
            <button id="btnGetStudentsDetails" class="button-icon hide-small" type="button" aria-label="Open contact details" data-tooltip="Contact details"><svg class="icon"><use href="#i-info"/></svg></button>
            <button id="conversationMenuBtn" class="button-icon" type="button" aria-label="More conversation actions" aria-expanded="false" aria-controls="conversationMenu"><svg class="icon"><use href="#i-more"/></svg></button>
          </div>
          <div id="conversationMenu" class="floating-panel menu-panel header-menu" role="menu" hidden>
            <button id="mobileMarkAnsweredBtn" class="mobile-menu-only" type="button" role="menuitem" data-menu-action="resolve" hidden><svg class="icon"><use href="#i-check"/></svg>Mark answered</button>
            <button type="button" role="menuitem" data-menu-action="details"><svg class="icon"><use href="#i-info"/></svg>Contact details</button>
            <button type="button" role="menuitem" data-menu-action="search"><svg class="icon"><use href="#i-search"/></svg>Search messages</button>
            <button type="button" role="menuitem" data-menu-action="unread"><span class="menu-glyph">&#9679;</span>Mark as unread</button>
            <button type="button" role="menuitem" data-menu-action="export"><svg class="icon"><use href="#i-download"/></svg>Export transcript</button>
            <button type="button" role="menuitem" data-menu-action="close"><svg class="icon"><use href="#i-back"/></svg>Close conversation</button>
            <hr>
            <button type="button" role="menuitem" data-menu-action="block" class="danger-menu"><svg class="icon"><use href="#i-lock"/></svg><span id="blockMenuLabel">Block contact</span></button>
            <button type="button" role="menuitem" data-menu-action="clear" class="danger-menu"><svg class="icon"><use href="#i-trash"/></svg>Clear conversation</button>
          </div>
        </header>
        <div id="conversationSearch" class="conversation-search" hidden>
          <svg class="icon"><use href="#i-search"/></svg><label class="sr-only" for="messageSearchInput">Search this conversation</label><input id="messageSearchInput" type="search" placeholder="Search in this conversation"><span id="searchResultsCount">0 results</span><button id="closeMessageSearch" class="button-icon" type="button" aria-label="Close conversation search"><svg class="icon"><use href="#i-close"/></svg></button>
        </div>
        <div id="blockedBanner" class="blocked-banner" hidden><svg class="icon"><use href="#i-lock"/></svg><div><strong>This contact is blocked</strong><span>Unblock them to send a message.</span></div><button id="unblockBannerBtn" type="button">Unblock</button></div>
        <div id="boxMessagesScroll" class="message-scroll">
          <div id="boxMessageContent">
            <div class="thread" id="messages-container" role="log" aria-live="polite" aria-relevant="additions" aria-label="Messages"></div>
          </div>
          <button id="scrollLatestBtn" class="scroll-latest" type="button" hidden><span>New messages</span><svg class="icon"><use href="#i-chevron"/></svg></button>
        </div>
        <footer id="formSendMessage" class="composer-shell">
          <div id="messageSelectionBar" class="message-selection-bar" role="toolbar" aria-label="Selected message actions" hidden>
            <div class="message-selection-summary"><span class="selection-summary-icon"><svg class="icon"><use href="#i-select"/></svg></span><strong id="messageSelectionCount">0 selected</strong></div>
            <div class="message-selection-actions">
              <button id="copySelectedMessages" class="button-icon" type="button" aria-label="Copy selected messages"><svg class="icon"><use href="#i-copy"/></svg></button>
              <button id="pinSelectedMessages" class="button-icon" type="button" aria-label="Pin selected messages"><svg class="icon"><use href="#i-pin"/></svg></button>
              <button id="deleteSelectedMessages" class="button-icon danger" type="button" aria-label="Delete selected messages"><svg class="icon"><use href="#i-trash"/></svg></button>
              <button id="clearMessageSelection" class="button-icon" type="button" aria-label="Cancel message selection"><svg class="icon"><use href="#i-close"/></svg></button>
            </div>
          </div>
          <div class="composer-inner">
            <div id="replyPreview" class="reply-preview" hidden><svg class="icon"><use href="#i-reply"/></svg><div><small>Replying to</small><strong id="replyText"></strong></div><button id="cancelReplyBtn" class="button-icon" type="button" aria-label="Cancel reply"><svg class="icon"><use href="#i-close"/></svg></button></div>
            <div id="attachmentPreview" class="attachment-preview" hidden><span id="attachmentPreviewIcon" class="attachment-preview-icon"></span><div class="attachment-preview-copy"><strong id="attachmentName"></strong><small id="attachmentMeta"></small><audio id="attachmentAudioPreview" class="attachment-audio-preview" controls preload="metadata" hidden></audio></div><button id="removeAttachmentBtn" class="button-icon" type="button" aria-label="Remove attachment"><svg class="icon"><use href="#i-close"/></svg></button></div>
            <div id="voiceRecorder" class="voice-recorder" data-phase="idle" role="group" aria-label="Voice recorder" hidden>
              <div class="voice-timer" aria-hidden="true"><span class="recording-live-dot"></span><time id="voiceRecorderTime" datetime="PT0S">0:00</time></div>
              <div class="voice-waveform" aria-hidden="true"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>
              <div class="voice-recorder-actions">
                <button id="pauseVoiceBtn" class="button-icon" type="button" aria-label="Pause voice recording" aria-pressed="false"><svg class="icon"><use href="#i-pause"/></svg></button>
                <button id="cancelVoiceBtn" class="button-icon voice-cancel" type="button" aria-label="Cancel voice recording"><svg class="icon"><use href="#i-close"/></svg></button>
                <button id="stopVoiceBtn" class="button-icon voice-stop" type="button" aria-label="Send voice message"><svg class="icon"><use href="#i-send"/></svg></button>
              </div>
            </div>
            <span id="voiceRecorderAnnouncement" class="sr-only" role="status" aria-live="polite"></span>
            <div class="composer-entry-row">
              <div class="composer-speed-dial">
                <button id="composerSpeedDialBtn" class="speed-dial-trigger" type="button" aria-label="Open message tools" aria-haspopup="menu" aria-expanded="false" aria-controls="composerSpeedDial">
                  <svg class="icon" aria-hidden="true"><use href="#i-plus"/></svg>
                </button>
                <div id="composerSpeedDial" class="floating-panel speed-dial-menu" role="menu" aria-label="Message tools" hidden>
                  <button id="typeInput" class="speed-dial-action channel-trigger" type="button" role="menuitem" value="WhatsApp" data-channel="whatsapp" aria-label="Message channel: WhatsApp" aria-haspopup="menu" aria-expanded="false" aria-controls="channelMenu">
                    <span class="speed-dial-action-icon"><svg class="icon" aria-hidden="true"><use id="channelTriggerIconUse" href="#i-chat"/></svg></span>
                    <span class="speed-dial-action-copy"><small>Send with</small><strong id="channelTriggerValue">WhatsApp</strong></span>
                    <svg class="icon speed-dial-chevron" aria-hidden="true"><use href="#i-chevron"/></svg>
                  </button>
                  <button id="quickRepliesBtn" type="button" class="speed-dial-action" role="menuitem" aria-expanded="false" aria-controls="templatePanel">
                    <span class="speed-dial-action-icon"><svg class="icon" aria-hidden="true"><use href="#i-template"/></svg></span>
                    <span class="speed-dial-action-copy"><strong>Quick replies</strong><small>Insert a saved response</small></span>
                  </button>
                  <button id="sendGreetingBtn" type="button" class="speed-dial-action" role="menuitem" aria-label="Insert greeting">
                    <span class="speed-dial-action-icon speed-dial-greeting" aria-hidden="true">&#x1F44B;</span>
                    <span class="speed-dial-action-copy"><strong>Greeting</strong><small>Add the welcome message</small></span>
                  </button>
                </div>
              </div>
              <form id="message-form" class="composer-form">
                <button id="attachmentBtn" class="composer-button" type="button" aria-label="Add attachment" aria-expanded="false" aria-controls="attachmentMenu"><svg class="icon"><use href="#i-paperclip"/></svg></button>
                <button id="btnEmoji" class="composer-button" type="button" aria-label="Choose emoji" aria-expanded="false" aria-controls="emojiPanel"><svg class="icon"><use href="#i-smile"/></svg></button>
                <label class="sr-only" for="messageInput">Message</label>
                <textarea dir="auto" id="messageInput" rows="1" maxlength="2000" placeholder="Write a message" aria-describedby="composerHint"></textarea>
                <button id="btnRecordeAudio" class="composer-button record-button" type="button" aria-label="Record a voice message" aria-pressed="false" aria-controls="voiceRecorder"><svg class="icon"><use href="#i-mic"/></svg></button>
                <button id="sendMessage" type="submit" class="send-button" aria-label="Send message" disabled><svg class="icon"><use href="#i-send"/></svg></button>
              </form>
            </div>
            <div class="composer-foot"><span id="composerHint">Enter to send &middot; Shift + Enter for a new line</span><span id="draftCount">0 / 2000</span></div>
          </div>
          <div id="attachmentMenu" class="floating-panel action-panel composer-popup" role="menu" hidden>
            <p>Add to message</p>
            <button type="button" role="menuitem" data-attachment="image"><span class="action-icon image"><svg class="icon"><use href="#i-image"/></svg></span><span><strong>Photo or video</strong><small>JPG, PNG, GIF, MP4 &middot; sends instantly</small></span></button>
            <button type="button" role="menuitem" data-attachment="document"><span class="action-icon document"><svg class="icon"><use href="#i-file"/></svg></span><span><strong>Document</strong><small>PDF, DOCX, ZIP and more &middot; sends instantly</small></span></button>
            <button type="button" role="menuitem" data-attachment="audio"><span class="action-icon audio"><svg class="icon"><use href="#i-audio"/></svg></span><span><strong>Audio file</strong><small>MP3, M4A, WAV, OGG &middot; sends instantly</small></span></button>
          </div>
          <div id="channelMenu" class="floating-panel channel-menu composer-popup" role="menu" aria-labelledby="channelMenuTitle" hidden>
            <div class="panel-heading channel-menu-heading"><div><strong id="channelMenuTitle">Send with</strong><small>Choose a message channel</small></div><button id="channelMenuClose" class="button-icon" type="button" aria-label="Close message channel menu"><svg class="icon"><use href="#i-close"/></svg></button></div>
            <div class="channel-options">
              <button type="button" class="channel-option" role="menuitemradio" aria-checked="true" data-channel-value="WhatsApp" data-channel-key="whatsapp">
                <span class="channel-option-icon whatsapp"><svg class="icon"><use href="#i-chat"/></svg></span><span class="channel-option-copy"><strong>WhatsApp</strong><small>Direct conversation</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
              </button>
              <button type="button" class="channel-option" role="menuitemradio" aria-checked="false" data-channel-value="WhatsApp Student Support" data-channel-key="support">
                <span class="channel-option-icon support"><svg class="icon"><use href="#i-support"/></svg></span><span class="channel-option-copy"><strong>Student Support</strong><small>WhatsApp support line</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
              </button>
              <button type="button" class="channel-option" role="menuitemradio" aria-checked="false" data-channel-value="Email" data-channel-key="email">
                <span class="channel-option-icon email"><svg class="icon"><use href="#i-mail"/></svg></span><span class="channel-option-copy"><strong>Email</strong><small>Send as email</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
              </button>
              <button type="button" class="channel-option" role="menuitemradio" aria-checked="false" data-channel-value="SMS" data-channel-key="sms">
                <span class="channel-option-icon sms"><svg class="icon"><use href="#i-sms"/></svg></span><span class="channel-option-copy"><strong>SMS</strong><small>Send as text message</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
              </button>
            </div>
          </div>
          <div id="emojiPanel" class="floating-panel emoji-panel composer-popup" role="dialog" aria-modal="false" aria-labelledby="emojiPanelTitle" hidden>
            <div class="panel-heading"><div><strong id="emojiPanelTitle">Emoji library</strong><small>Unicode Emoji 17.0 &middot; 3,944 RGI sequences</small></div><button class="button-icon popup-close" type="button" aria-label="Close emoji picker"><svg class="icon"><use href="#i-close"/></svg></button></div>
            <label class="mini-search emoji-search" for="emojiSearchInput"><svg class="icon"><use href="#i-search"/></svg><input id="emojiSearchInput" type="search" placeholder="Search emoji" autocomplete="off"><button id="clearEmojiSearch" type="button" aria-label="Clear emoji search" hidden><svg class="icon"><use href="#i-close"/></svg></button></label>
            <div id="emojiTonePicker" class="emoji-tone-picker" aria-label="Skin tone"><span>Skin tone</span></div>
            <div id="emojiCategories" class="emoji-categories" role="tablist" aria-label="Emoji categories"></div>
            <div class="emoji-results-bar"><strong id="emojiCategoryLabel">Smileys &amp; emotion</strong><span id="emojiResultCount" role="status" aria-live="polite">0 emoji</span></div>
            <div id="emojiGrid" class="emoji-grid" role="group" aria-label="Emoji choices"></div>
            <div id="emojiEmpty" class="emoji-empty" hidden><span>?</span><strong>No emoji found</strong><small>Try another word or category.</small></div>
          </div>
          <div id="templatePanel" class="floating-panel template-panel composer-popup" hidden>
            <div class="panel-heading"><div><strong>Quick replies</strong><small>Insert and edit before sending</small></div><button class="button-icon popup-close" type="button" aria-label="Close quick replies"><svg class="icon"><use href="#i-close"/></svg></button></div>
            <label class="mini-search"><svg class="icon"><use href="#i-search"/></svg><input id="templateSearchInput" type="search" placeholder="Search replies" aria-label="Search quick replies"></label>
            <div id="templateList" class="template-list"></div>
          </div>
        </footer>
      </section>
    </main>

    <button id="messageActionBackdrop" class="message-action-backdrop" type="button" tabindex="-1" aria-label="Close message actions" hidden></button>
    <div id="messageActionMenu" class="floating-panel message-action-menu" role="menu" aria-labelledby="messageActionTitle" hidden>
      <div class="message-action-heading">
        <div><strong id="messageActionTitle">Message actions</strong><small id="messageActionPreview"></small></div>
        <button id="messageActionClose" class="button-icon" type="button" aria-label="Close message actions"><svg class="icon"><use href="#i-close"/></svg></button>
      </div>
      <div class="message-action-list">
        <button type="button" role="menuitem" data-message-action="reply"><span class="message-action-icon"><svg class="icon"><use href="#i-reply"/></svg></span><span data-message-action-label>Reply</span></button>
        <button type="button" role="menuitem" data-message-action="copy"><span class="message-action-icon"><svg class="icon"><use href="#i-copy"/></svg></span><span data-message-action-label>Copy</span></button>
        <button type="button" role="menuitem" data-message-action="pin"><span class="message-action-icon"><svg class="icon"><use href="#i-pin"/></svg></span><span data-message-action-label>Pin message</span></button>
        <button type="button" role="menuitem" data-message-action="select"><span class="message-action-icon"><svg class="icon"><use href="#i-select"/></svg></span><span data-message-action-label>Select message</span></button>
        <button type="button" class="danger" role="menuitem" data-message-action="delete"><span class="message-action-icon"><svg class="icon"><use href="#i-trash"/></svg></span><span data-message-action-label>Delete message</span></button>
      </div>
    </div>
    <span id="messageActionAnnouncement" class="sr-only" role="status" aria-live="polite"></span>

    <button id="drawerBackdrop" class="drawer-backdrop" type="button" tabindex="-1" aria-label="Close contact overview" hidden></button>
    <aside id="contactDrawer" class="contact-drawer" role="dialog" aria-modal="false" aria-labelledby="drawerTitle" aria-describedby="drawerPresence" aria-hidden="true" inert>
      <header class="drawer-hero">
        <div class="drawer-heading-row">
          <div class="drawer-identity">
            <span id="drawerAvatar" class="avatar avatar-lg" aria-hidden="true"></span>
            <div class="drawer-heading-copy"><p id="drawerEyebrow">Contact overview</p><h2 id="drawerTitle">Details</h2><span id="drawerPresence"></span></div>
          </div>
          <button id="closeOverview" type="button" class="button-icon drawer-close" aria-label="Close contact overview"><svg class="icon"><use href="#i-close"/></svg></button>
        </div>
        <div class="drawer-summary" aria-label="Contact summary">
          <div><strong id="drawerSummaryOne">&mdash;</strong><span id="drawerSummaryLabelOne">Group</span></div>
          <div><strong id="drawerSummaryTwo">0</strong><span id="drawerSummaryLabelTwo">Remaining sessions</span></div>
          <div><strong id="drawerSummaryThree">&mdash;</strong><span id="drawerSummaryLabelThree">Attendance</span></div>
        </div>
      </header>
      <div class="drawer-body">
        <section class="overview-card" aria-labelledby="profileSectionTitle">
          <div class="overview-card-heading"><span class="overview-card-icon"><svg class="icon"><use href="#i-id-card"/></svg></span><h3 id="profileSectionTitle">Profile</h3></div>
          <dl class="profile-details">
            <div><dt>Name</dt><dd id="drawerName"></dd></div>
            <div><dt>Email</dt><dd><button id="drawerEmail" type="button" class="copy-pill" data-copy-value=""><svg class="icon"><use href="#i-copy"/></svg><span data-copy-label>Copy email</span></button></dd></div>
            <div><dt>Phone</dt><dd><button id="drawerPhone" type="button" class="copy-pill" data-copy-value=""><svg class="icon"><use href="#i-copy"/></svg><span data-copy-label>Copy phone</span></button></dd></div>
            <div><dt>Course</dt><dd id="drawerCourse">&mdash;</dd></div>
            <div><dt>Level</dt><dd id="drawerLevel">&mdash;</dd></div>
            <div><dt>Dashboard state</dt><dd><span id="drawerDashboardState" class="state-pill">Active</span></dd></div>
            <div><dt>Local time</dt><dd id="drawerTime">&mdash;</dd></div>
          </dl>
          <div id="drawerTags" class="tag-list overview-tags" aria-label="Contact tags"></div>
        </section>
        <div id="drawerAlerts" class="overview-alert-list" aria-label="Account notices"></div>
        <section class="overview-card" aria-labelledby="subscriptionSectionTitle">
          <div class="overview-card-heading"><span class="overview-card-icon"><svg class="icon"><use href="#i-card"/></svg></span><h3 id="subscriptionSectionTitle">Subscription</h3></div>
          <div id="drawerSubscriptions" class="overview-list"></div>
        </section>
        <section class="overview-card" aria-labelledby="attendanceSectionTitle">
          <div class="overview-card-heading"><span class="overview-card-icon"><svg class="icon"><use href="#i-calendar"/></svg></span><h3 id="attendanceSectionTitle">Classes and attendance</h3></div>
          <div class="attendance-metrics" aria-label="Attendance totals">
            <div><strong id="drawerHours">0</strong><span>Hours</span></div>
            <div class="positive"><strong id="drawerPresent">0</strong><span>Present</span></div>
            <div class="negative"><strong id="drawerAbsent">0</strong><span>Absent</span></div>
            <div class="practice"><strong id="drawerPractice">0</strong><span>Practice</span></div>
          </div>
          <div id="drawerAttendanceDots" class="attendance-history" aria-label="Recent attendance history"></div>
          <div class="cycle-card">
            <div class="cycle-heading"><h4>Current cycle attendance</h4><span id="drawerCycleLabel">Current cycle</span></div>
            <div class="cycle-metrics">
              <div><strong id="drawerCycleHours">0</strong><span>Hours</span></div>
              <div><strong id="drawerCyclePresent">0</strong><span>Present</span></div>
              <div><strong id="drawerCycleAbsent">0</strong><span>Absent</span></div>
              <div><strong id="drawerCyclePractice">0</strong><span>Practice</span></div>
            </div>
            <div id="drawerCycleDots" class="attendance-history compact" aria-label="Current cycle attendance history"></div>
          </div>
          <div id="drawerScheduleActions" class="schedule-action-grid"></div>
          <div class="overview-subsection"><h4>Classes</h4><div id="drawerClasses" class="overview-list"></div></div>
        </section>
        <section class="overview-card" aria-labelledby="learningSectionTitle">
          <div class="overview-card-heading"><span class="overview-card-icon"><svg class="icon"><use href="#i-books"/></svg></span><h3 id="learningSectionTitle">Learning</h3></div>
          <div class="learning-summary">
            <div class="exam"><strong id="drawerExamEligibility">&mdash;</strong><span>Can take exam</span></div>
            <div class="certificate"><strong id="drawerCertificateCount">0</strong><span>Certificates</span></div>
          </div>
          <div class="overview-subsection"><h4>Courses &amp; materials</h4><div id="drawerMaterials" class="overview-list"></div></div>
          <div class="overview-subsection"><h4>Certificates</h4><div id="drawerCertificates" class="overview-list"></div></div>
          <div class="overview-subsection"><h4>Tests taken</h4><div id="drawerTests" class="overview-list"></div></div>
        </section>
        <div class="overview-bottom-grid">
          <section class="overview-card" aria-labelledby="notesSectionTitle">
            <div class="overview-card-heading split"><div><span class="overview-card-icon"><svg class="icon"><use href="#i-file"/></svg></span><h3 id="notesSectionTitle">Notes</h3></div><span>Saved locally</span></div>
            <label class="sr-only" for="contactNotes">Contact notes</label><textarea id="contactNotes" rows="4" placeholder="Add context for the next agent..."></textarea>
          </section>
          <section class="overview-card" aria-labelledby="conversationSectionTitle">
            <div class="overview-card-heading"><span class="overview-card-icon"><svg class="icon"><use href="#i-chat"/></svg></span><h3 id="conversationSectionTitle">Conversation</h3></div>
            <div class="metric-row"><div><strong id="drawerMessageCount">0</strong><span>Messages</span></div><div><strong id="drawerChannel">&mdash;</strong><span>Last channel</span></div></div>
          </section>
        </div>
      </div>
      <footer class="drawer-footer"><button id="drawerResolveBtn" type="button" class="button-secondary"><svg class="icon"><use href="#i-check"/></svg>Resolve</button><button id="btnBlockUser" type="button" class="button-danger"><svg class="icon"><use href="#i-lock"/></svg><span>Block contact</span></button><button id="btnUnBlockUser" type="button" class="button-danger" style="display:none"><svg class="icon"><use href="#i-lock"/></svg><span>Unblock contact</span></button></footer>
    </aside>
  </div>

  <div id="overviewSection"></div>

  @if($canManageAssistants)
    <audio id="notificationTutors" src="{{asset('sounds/2.mp3')}}" preload="auto"></audio>
  @endif
  <audio id="notificationClients" src="{{asset('sounds/1.mp3')}}" preload="auto"></audio>
  <audio id="notificationStudents" src="{{asset('sounds/3.mp3')}}" preload="auto"></audio>

  <input id="fileInput" type="file" hidden accept="image/*,video/*,audio/*,.pdf,.doc,.docx,.zip,.txt">

  <dialog id="confirmDialog" class="confirm-dialog" aria-labelledby="confirmTitle" aria-describedby="confirmDescription">
    <div class="confirm-mark" id="confirmIcon"><svg class="icon"><use href="#i-lock"/></svg></div><h2 id="confirmTitle">Confirm action</h2><p id="confirmDescription"></p><div class="confirm-actions"><button id="confirmCancel" type="button" class="button-secondary">Cancel</button><button id="confirmAccept" type="button" class="button-danger">Confirm</button></div>
  </dialog>

  <dialog id="shortcutsDialog" class="modal-dialog shortcuts-dialog" aria-labelledby="shortcutsTitle">
    <header class="modal-header"><div><p>Keyboard</p><h2 id="shortcutsTitle">Shortcuts</h2></div><button type="button" class="button-icon dialog-close" aria-label="Close"><svg class="icon"><use href="#i-close"/></svg></button></header>
    <div class="shortcut-list"><div><span>Focus conversation search</span><kbd>/</kbd></div><div><span>Send message</span><kbd>Enter</kbd></div><div><span>New line</span><span><kbd>Shift</kbd> + <kbd>Enter</kbd></span></div><div><span>Close a panel</span><kbd>Esc</kbd></div></div>
  </dialog>

  <dialog id="mediaPreviewDialog" class="media-dialog" aria-labelledby="mediaPreviewTitle" aria-describedby="mediaPreviewMeta">
    <header><div><h2 id="mediaPreviewTitle">Media preview</h2><small id="mediaPreviewMeta"></small></div><button type="button" class="button-icon dialog-close" aria-label="Close media preview"><svg class="icon"><use href="#i-close"/></svg></button></header>
    <div class="media-preview-stage"><img id="mediaPreviewImage" alt="" hidden><video id="mediaPreviewVideo" playsinline preload="metadata" hidden></video><button id="mediaPreviewPlay" class="media-preview-play" type="button" aria-label="Play video preview" hidden disabled><svg class="icon"><use href="#i-play"/></svg></button></div>
  </dialog>
  <div id="toastStack" class="toast-stack" aria-live="polite" aria-atomic="true"></div>
<script src="{{asset('template/core/icons/iconify-icon.min.js')}}"></script>
<script src="https://js.pusher.com/8.3.0/pusher.min.js"></script>
<script>
    /**
     *-------------------------------------------------------------
     * Global variables
     *-------------------------------------------------------------
     */
    const csrfToken= document.head.querySelector('meta[name=csrf_token]').content;
    const routePrefix= document.head.querySelector('meta[name=route_prefix]').content;

    let contactList = document.getElementById("contact-list");
    let messagesContainer = document.getElementById("messages-container");

    let contacts = "clients";
    const filterContactSelector = document.getElementById("filterContactSelector");
    let filterContacts = "newest";
    let typesDashboard = document.querySelectorAll("#typeDashboard div > button")
    const tutorUnseenMessagesElement = document.getElementById("tutorUnseenMessages");
    const clientUnseenMessagesElement = document.getElementById("clientUnseenMessages");
    const studentUnseenMessagesElement = document.getElementById("studentUnseenMessages");

    let noUserChose = document.getElementById("chatView") || document.querySelector(".boxMessages");
    let chatEmpty = document.getElementById("chatEmpty");
    let chatView = document.getElementById("chatView");

    let tutorUnseenMessages = 0;
    let clientUnseenMessages = 0;
    let studentUnseenMessages = 0;

    let contactsCurrentPage = 1;
    let noMoreContacts = false;

    let messagesCurrentPage = 1;
    let noMoreMessages = false;
    let isLoadingMessages = false;
    const TOP_LOAD_THRESHOLD = 80;
    const BOTTOM_STICK_THRESHOLD = 120;

    let userId = 0
    const activeUserName = document.getElementById("active-user-name");
    const activeUserPhone = document.getElementById("active-user-phone");
    const activeUserEmail = document.getElementById("active-user-email");
    const activeUserAvatar = document.getElementById("active-user-avatar");
    const activeUser = document.getElementById("active-user");
    const btnBlockUser = document.getElementById("btnBlockUser");
    const btnUnBlockUser = document.getElementById("btnUnBlockUser");
    const btnMarkAnswered = document.getElementById("btnMarkAnswered");
    const btnGetStudentsDetails = document.getElementById("btnGetStudentsDetails");
    const btnCloseConversation = document.getElementById("btnCloseConversation");

    const searchInput = document.getElementById('searchInput');
    const searchContainer = document.getElementById('searchContainer');
    const searchList = document.getElementById('searchList');
    const leftSideSection = document.getElementById('leftSideSection');
    const rightSideSection = document.getElementById('rightSideSection');
    const overviewSection = document.getElementById('overviewSection');
    const boxMessagesScroll = document.getElementById('boxMessagesScroll');
    const boxContactList = document.getElementById('boxContactList');

    const contactsContainer = document.getElementById('contactsContainer');

    let sendMessageBtn = document.getElementById("sendMessage");
    let btnRecordeAudio = document.getElementById("btnRecordeAudio");
    let recordAudioBtn = btnRecordeAudio;
    let messageInput = document.getElementById("messageInput");
    let typeInput = document.getElementById('typeInput');
    let sendGreetingBtn = document.getElementById("sendGreetingBtn");

    let boxMessageContent = document.getElementById("boxMessageContent");

    let notificationStudents = document.getElementById("notificationStudents");
    let notificationClients = document.getElementById("notificationClients");
    let notificationTutors = document.getElementById("notificationTutors");

    let mediaRecorder;
    let chunks = [];
    let isRecording = false;
    let blob;
    let i = 0;
    let sendInProgress = false;
    let recordingSeconds = 0;

    let timer_interval;

    const fileInput = document.getElementById('fileInput');
    const formSendMessage = document.getElementById('formSendMessage');


    /**
     *-------------------------------------------------------------
     * Global functions
     *-------------------------------------------------------------
     */

    function showToast(title, message, type) {
        const toast = document.createElement("div");
        toast.className = "toast" + (type === "error" ? " error" : "");
        toast.setAttribute("role", "status");
        toast.innerHTML = '<span class="toast-mark">' + (type === "error" ? "!" : "✓") + '</span><div class="toast-copy"><strong>' + title + '</strong><span>' + (message || "") + '</span></div>';
        const stack = document.getElementById("toastStack");
        if (stack) stack.append(toast);
        setTimeout(function () { if (toast.isConnected) toast.remove(); }, 4000);
    }

    function displayError(message) { showToast("Error", message || "Something went wrong.", "error"); }

    function closePanels(except) {
        ["conversationMenu", "attachmentMenu", "composerSpeedDial", "channelMenu", "statusFilterMenu"].forEach(function (id) {
            if (id === except) return;
            const el = document.getElementById(id);
            if (el) el.hidden = true;
        });
        const btnMap = { conversationMenu: "conversationMenuBtn", attachmentMenu: "attachmentBtn", composerSpeedDial: "composerSpeedDialBtn", channelMenu: "typeInput", statusFilterMenu: "statusFilterBtn" };
        Object.keys(btnMap).forEach(function (panelId) {
            const btn = document.getElementById(btnMap[panelId]);
            if (btn) btn.setAttribute("aria-expanded", String(except === panelId));
        });
    }

    function togglePanel(id, trigger) {
        const panel = document.getElementById(id);
        if (!panel || !trigger) return;
        const willOpen = panel.hidden;
        closePanels(willOpen ? id : null);
        panel.hidden = !willOpen;
        trigger.setAttribute("aria-expanded", String(willOpen));
    }

    function autoResizeComposer() {
        if (!messageInput) return;
        messageInput.style.height = "auto";
        messageInput.style.height = Math.min(messageInput.scrollHeight, 132) + "px";
        updateComposer();
    }

    function updateComposer() {
        const value = messageInput ? messageInput.value : "";
        const hasContent = Boolean(value.trim());
        const canSend = Boolean(userId && hasContent && !sendInProgress);
        if (sendMessageBtn) {
            sendMessageBtn.disabled = !canSend;
            sendMessageBtn.hidden = !canSend;
        }
        if (recordAudioBtn) {
            recordAudioBtn.hidden = hasContent || sendInProgress;
        }
        if (messageInput) messageInput.readOnly = sendInProgress;
        const dc = document.getElementById("draftCount");
        if (dc) dc.textContent = value.length + " / 2000";
    }

    function syncChannelPicker() {
        const val = typeInput ? typeInput.value : "WhatsApp";
        const iconMap = { "WhatsApp": "i-chat", "WhatsApp Student Support": "i-support", "Email": "i-mail", "SMS": "i-sms" };
        const tv = document.getElementById("channelTriggerValue");
        if (tv) tv.textContent = val;
        const ti = document.getElementById("channelTriggerIconUse");
        if (ti) ti.setAttribute("href", "#" + (iconMap[val] || "i-chat"));
        document.querySelectorAll("#channelMenu [data-channel-value]").forEach(function (opt) {
            opt.setAttribute("aria-checked", String(opt.dataset.channelValue === val));
        });
    }

    let stateNotification = true;
    document.body.addEventListener("click" , function (){

        if(stateNotification){
            if(notificationStudents){
                notificationStudents.play().then(() => {
                    notificationStudents.pause();
                    notificationStudents.currentTime = 0;
                }).catch(() => {
                    console.error("Audio playback was not allowed!");
                });
            }
            if(notificationTutors){
                notificationTutors.play().then(() => {
                    notificationTutors.pause();
                    notificationTutors.currentTime = 0;
                }).catch(() => {
                    console.error("Audio playback was not allowed!");
                });
            }
            notificationClients.play().then(() => {
                notificationClients.pause();
                notificationClients.currentTime = 0;
            }).catch(() => {
                console.error("Audio playback was not allowed!");
            });

            stateNotification = false;
        }
    })
    function scrollToBottom(el, top) {
        if (!el || !el.parentNode) return;
        const scroller = el.parentNode;
        scroller.scrollTop = top ? 0 : scroller.scrollHeight;
    }

    function isNearBottom(scroller) {
        if (!scroller) return true;
        return (scroller.scrollHeight - (scroller.scrollTop + scroller.clientHeight)) <= BOTTOM_STICK_THRESHOLD;
    }

    function showEmptyState() {
        if (chatEmpty) chatEmpty.hidden = false;
        if (chatView) chatView.hidden = true;
        if (noUserChose && !chatView) noUserChose.classList.add('hidden');
        document.querySelector(".contact-item.active")?.classList.remove("active");
        userId = 0;
    }

    function showChatPane() {
        if (chatEmpty) chatEmpty.hidden = true;
        if (chatView) chatView.hidden = false;
        if (noUserChose && !chatView) noUserChose.classList.remove('hidden');
    }

    if(btnCloseConversation){
        btnCloseConversation.addEventListener("click", function(){
            showEmptyState();
        });
    }

    function readAllAudio() {
        let main_audio = document.querySelectorAll(".main_audio .Pause_Play")
        main_audio.forEach((item, index) => {
            item.addEventListener('click', function (e) {
                let audioActive = document.querySelector(".main_audio.active");
                if (audioActive) {
                    audioActive.classList.remove('active');
                }
                item.parentNode.classList.add("active");
                let audio = document.querySelector(".main_audio.active audio");
                if (audio.paused) {
                    audio.play();
                    item.classList.add("pause_mode");

                } else {
                    audio.pause();
                    item.classList.remove("pause_mode")
                    item.parentNode.classList.remove("active")
                }
                audio.onpause = function () {
                    item.parentNode.classList.remove("active");
                    item.classList.remove("pause_mode");
                    item.parentNode.classList.remove("active");
                }
            })
        })
    }

    if(typesDashboard){
        typesDashboard.forEach((dashboard) => {
            dashboard.addEventListener("click", () => {
                if (dashboard.id === "btnTutor") {
                    contacts = "tutors";
                    document.body.id = "tutorDashboard";
                } else if (dashboard.id === "btnClients") {
                    contacts = "clients";
                    document.body.id = "clientsDashboard";
                } else {
                    contacts = "students";
                    document.body.id = "studentsDashboard";
                }
                noMoreContacts = false;
                contactsCurrentPage = 1;
                getContacts();
                showEmptyState();
            })
        })
    }

    /**
     *-------------------------------------------------------------
     * Fetch Data functions
     *-------------------------------------------------------------
     */

    function refetchContacts() {
        let oldClientUnseenMessagesElement = clientUnseenMessagesElement?clientUnseenMessagesElement.innerHTML || 0 : 0 ;
        let oldTutorUnseenMessagesElement = tutorUnseenMessagesElement?tutorUnseenMessagesElement.innerHTML || 0:0;
        let oldStudentUnseenMessagesElement = studentUnseenMessagesElement?studentUnseenMessagesElement.innerHTML || 0:0;
        fetch(`/admin/${routePrefix}/refetchContacts/${userId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if(clientUnseenMessagesElement){

                    if (data.client_unseen_messages !== clientUnseenMessages) {
                        clientUnseenMessagesElement.innerHTML = data.client_unseen_messages;
                        clientUnseenMessagesElement.classList.remove("hidden")
                        clientUnseenMessages = data.client_unseen_messages;
                        if (oldClientUnseenMessagesElement < data.client_unseen_messages) {
                            notificationClients.play();
                            notificationClients.volume = 0.98;
                        }
                    }
                    if (!data.client_unseen_messages) {
                        clientUnseenMessagesElement.classList.add("hidden")
                    }

                }
                if(tutorUnseenMessagesElement){

                    if (data.tutor_unseen_messages !== tutorUnseenMessages) {
                        tutorUnseenMessagesElement.innerHTML = data.tutor_unseen_messages;
                        tutorUnseenMessagesElement.classList.remove("hidden")
                        tutorUnseenMessages = data.tutor_unseen_messages;
                        if (oldTutorUnseenMessagesElement < data.tutor_unseen_messages) {
                            notificationTutors.play();
                            notificationTutors.volume = 0.98;
                        }
                    }
                    if (!data.tutor_unseen_messages) {
                        tutorUnseenMessagesElement.classList.add("hidden")
                    }
                }
                if(studentUnseenMessagesElement){

                    if (data.student_unseen_messages !== studentUnseenMessages) {
                        studentUnseenMessagesElement.innerHTML = data.student_unseen_messages;
                        studentUnseenMessagesElement.classList.remove("hidden")
                        studentUnseenMessages = data.student_unseen_messages;
                        if (oldStudentUnseenMessagesElement < data.student_unseen_messages) {
                            notificationStudents.play();
                            notificationStudents.volume = 0.98;

                        }

                    }

                    if (!data.student_unseen_messages) {
                        studentUnseenMessagesElement.classList.add("hidden")
                    }
                }


            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function getContacts() {
        if (!noMoreContacts) {
            fetch(`/admin/${routePrefix}/getContacts?contacts=${contacts}&filter=${filterContacts}&page=${contactsCurrentPage}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (contactsCurrentPage === 1) {
                        contactList.innerHTML = "";
                    }
                    contactList.innerHTML += data.contacts;
                    if (data.last_page <= contactsCurrentPage) {
                        noMoreContacts = true;
                    }

                    contactsCurrentPage++;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    }
    function getContact(userId, options = {}) {
        const {
            activate = true,
            refresh = false,
        } = options;
        const query = new URLSearchParams();

        if (refresh) {
            query.set("refresh", "1");
            query.set("contacts", contacts);
            query.set("filter", filterContacts);
        }

        const queryString = query.toString();
        const url = `/admin/chat/getContact/${userId}${queryString ? `?${queryString}` : ""}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const selector = `button.contact-item[data-id="${userId}"]`;
                const existingContact = contactList.querySelector(selector);
                const wasActive = existingContact?.classList.contains("active") || false;

                existingContact?.remove();

                if (!data.matches_view || !data.contact) {
                    return;
                }

                contactList.insertAdjacentHTML("afterbegin", data.contact);

                const updatedContact = contactList.querySelector(selector);

                if (activate) {
                    changeActiveUser(userId, updatedContact);
                } else if (wasActive) {
                    updatedContact?.classList.add("active");
                }

            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function getMessages(userId, options = {}) {
        const {
            reset = false,
            preservePosition = false,
            forceBottom = false,
            markSeen = false
        } = options;

        if (!userId || isLoadingMessages) return;
        if (reset) {
            messagesCurrentPage = 1;
            noMoreMessages = false;
        }
        if (noMoreMessages) return;

        const requestedPage = messagesCurrentPage;
        const previousScrollHeight = boxMessagesScroll.scrollHeight;
        const previousScrollTop = boxMessagesScroll.scrollTop;
        const wasNearBottom = isNearBottom(boxMessagesScroll);
        const query = new URLSearchParams({
            page: requestedPage,
        });

        if (markSeen && requestedPage === 1) {
            query.set("mark_seen", "1");
        }

        isLoadingMessages = true;
        fetch(`/admin/chat/getMessages/${userId}?${query.toString()}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (requestedPage === 1) {
                    messagesContainer.innerHTML = data.conversation;
                } else {
                    messagesContainer.innerHTML = data.conversation + messagesContainer.innerHTML;
                }

                if (data.last_page <= requestedPage) {
                    noMoreMessages = true;
                } else {
                    messagesCurrentPage = requestedPage + 1;
                }

                readAllAudio();

                if (requestedPage === 1) {
                    if (forceBottom || wasNearBottom) {
                        scrollToBottom(boxMessageContent, false);
                    }
                    return;
                }

                if (preservePosition) {
                    const newScrollHeight = boxMessagesScroll.scrollHeight;
                    boxMessagesScroll.scrollTop = previousScrollTop + (newScrollHeight - previousScrollHeight);
                    return;
                }

                scrollToBottom(boxMessageContent, false);
            })
            .catch(error => {
                console.error('Error:', error);
            })
            .finally(() => {
                isLoadingMessages = false;
            });
    }

    boxMessagesScroll.addEventListener("scroll", function () {
        if (boxMessagesScroll.scrollTop <= TOP_LOAD_THRESHOLD) {
            getMessages(userId, { preservePosition: true });
        }
    })


    function changeBlock() {
        btnBlockUser.disabled = true;
        btnUnBlockUser.disabled = true;
        fetch(`/admin/chat/changeBlock/${userId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {

                btnBlockUser.disabled = false;
                btnUnBlockUser.disabled = false;
                if(data=="blocked"){
                    blockUser()
                }else{
                    unBlockUser()
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    function markAnswered() {
        fetch(`/admin/chat/markAnswered/${userId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove()
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    function getStudentsDetails(phone,key=0) {
        fetch(`/admin/student/getStudentsDetails/${phone}/${key}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {

                overviewSection.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    window.getStudentsDetails=getStudentsDetails;

    function changeActiveUser(userId,btn){
        messagesContainer.innerHTML = ""
        messagesCurrentPage = 1;
        noMoreMessages = false;
        typeInput.value="WhatsApp";
        syncChannelPicker();
        const existing = document.getElementById('replyContainer');
        if (existing) existing.remove();
        const replyPreview = document.getElementById("replyPreview");
        if (replyPreview) replyPreview.hidden = true;
        showChatPane();
        getMessages(userId, {
            reset: true,
            forceBottom: true,
            markSeen: true,
        })
        document.querySelector(".contact-item.active")?.classList.remove("active");
        btn.classList.add("active");
        activeUserName.innerHTML = btn.getAttribute('data-name');
        activeUserAvatar.innerHTML = btn.getAttribute('data-name').slice(0, 2);
        activeUser.setAttribute("data-id", userId);
        activeUserPhone.setAttribute('data-content',btn.getAttribute('data-phone'));
        activeUserEmail.setAttribute('data-content',btn.getAttribute('data-email'));
        document.title = btn.getAttribute('data-name');
        if(btn.getAttribute('data-is-blocked')==1){
            blockUser()
        }else{
            unBlockUser()
        }
        autoResizeComposer();

        const drawerName = document.getElementById("drawerName");
        const drawerEmail = document.getElementById("drawerEmail");
        const drawerPhone = document.getElementById("drawerPhone");
        if (drawerName) drawerName.textContent = btn.getAttribute('data-name') || "";
        if (drawerEmail) { drawerEmail.dataset.copyValue = btn.getAttribute('data-email') || ""; drawerEmail.textContent = btn.getAttribute('data-email') || ""; }
        if (drawerPhone) drawerPhone.textContent = btn.getAttribute('data-phone') || "";
    }
    function setActiveUser(event) {
        let clickedElement = event.target;
        let btn = clickedElement.closest('.contact-item');
        if (btn) {
            userId = btn.getAttribute('data-id')
            changeActiveUser(userId,btn)
        }
    }

    function searchUsers(search) {
        fetch(`/admin/${routePrefix}/searchUsers?search=${search}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                searchList.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }


    let StateboxContactList = true;
    boxContactList.addEventListener("scroll", function () {
        if (boxContactList.scrollTop >= boxContactList.scrollHeight - boxContactList.clientHeight - 50) {
            if (StateboxContactList) {
                getContacts();
                StateboxContactList = false;
            }

        } else {
            StateboxContactList = true;
        }
    })


    let wabaRealtimeRefreshTimer = null;
    const wabaContactRefreshTimers = new Map();

    function scheduleWabaRealtimeRefresh() {
        window.clearTimeout(wabaRealtimeRefreshTimer);

        wabaRealtimeRefreshTimer = window.setTimeout(() => {
            refetchContacts();
        }, 150);
    }

    function scheduleWabaContactRefresh(wabaUserId) {
        const contactId = String(wabaUserId);
        const existingTimer = wabaContactRefreshTimers.get(contactId);

        window.clearTimeout(existingTimer);

        const timer = window.setTimeout(() => {
            wabaContactRefreshTimers.delete(contactId);
            getContact(contactId, {
                activate: false,
                refresh: true,
            });
        }, 150);

        wabaContactRefreshTimers.set(contactId, timer);
    }

    function initializeWabaRealtime() {
        const key = document.querySelector('meta[name="waba-pusher-key"]')?.getAttribute("content");
        const cluster = document.querySelector('meta[name="waba-pusher-cluster"]')?.getAttribute("content");
        const authEndpoint = document.querySelector('meta[name="waba-pusher-auth-endpoint"]')?.getAttribute("content");

        if (!key || !authEndpoint || typeof window.Pusher === "undefined") {
            console.error("WABA realtime configuration is missing.");
            return;
        }

        const pusher = new window.Pusher(key, {
            cluster,
            forceTLS: true,
            authEndpoint,
            auth: {
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "X-Requested-With": "XMLHttpRequest",
                    "Accept": "application/json",
                },
            },
        });

        const channel = pusher.subscribe("private-waba-admins");

        channel.bind("waba.message.created", (data) => {
            if (!data?.waba_user_id) {
                return;
            }

            const isActiveConversation =
                Number(data.waba_user_id) === Number(userId);

            if (isActiveConversation) {
                const shouldAutoScroll = isNearBottom(boxMessagesScroll);

                getMessages(userId, {
                    reset: true,
                    forceBottom: shouldAutoScroll,
                    markSeen: shouldAutoScroll,
                });
            }

            scheduleWabaContactRefresh(data.waba_user_id);
            scheduleWabaRealtimeRefresh();
        });

        // One initial/reconnection sync covers events missed while disconnected.
        channel.bind("pusher:subscription_succeeded", () => {
            if (userId) {
                const shouldAutoScroll = isNearBottom(boxMessagesScroll);

                getMessages(userId, {
                    reset: true,
                    forceBottom: shouldAutoScroll,
                    markSeen: shouldAutoScroll,
                });
            }

            refetchContacts();
        });

        channel.bind("pusher:subscription_error", (error) => {
            console.error("WABA realtime subscription failed:", error);
        });

        window.wabaPusher = pusher;
    }

    contactList.addEventListener('click', setActiveUser);

    searchList.addEventListener('click', setActiveUser);

    let searchTimer = null;

    searchInput.addEventListener('input', function (event) {
        window.clearTimeout(searchTimer);

        searchTimer = window.setTimeout(() => {
            searchUsers(event.target.value);
        }, 300);
    });
    window.addEventListener("DOMContentLoaded", function () {
        getContacts();
        scrollToBottom(contactList, true)
        const url = new URL(window.location.href);
        const queryParams = new URLSearchParams(url.search);
        userId = queryParams.get("user");

        if(userId){
            getContact(userId);
        } else {
            showEmptyState();
        }
        initializeWabaRealtime();
    });
    /*check here */
    searchInput.addEventListener('input', function (event) {
        searchContainer.classList.remove("hidden");
        contactsContainer.classList.add("hidden");
    });
    rightSideSection.addEventListener('mouseenter', function (event) {
        setTimeout(function () {
            contactsContainer.classList.remove("hidden");
            searchContainer.classList.add("hidden");
        }, 300)
    });

    /**
     *-------------------------------------------------------------
     * recording functions
     *-------------------------------------------------------------
     */
    const voiceRecorderPanel = document.getElementById("voiceRecorder");
    const voiceRecorderTime = document.getElementById("voiceRecorderTime");
    const pauseVoiceBtn = document.getElementById("pauseVoiceBtn");
    const cancelVoiceBtn = document.getElementById("cancelVoiceBtn");
    const stopVoiceBtn = document.getElementById("stopVoiceBtn");

    function formatDuration(totalSeconds) {
        const v = Math.max(0, Math.round(Number(totalSeconds) || 0));
        return Math.floor(v / 60) + ":" + String(v % 60).padStart(2, "0");
    }

    function renderVoiceRecorder() {
        if (!voiceRecorderPanel) return;
        if (!isRecording) {
            voiceRecorderPanel.hidden = true;
            voiceRecorderPanel.classList.remove("is-paused");
            if (formSendMessage) formSendMessage.classList.remove("is-recording");
            if (recordAudioBtn) { recordAudioBtn.setAttribute("aria-pressed", "false"); recordAudioBtn.classList.remove("is-requesting"); }
            return;
        }
        voiceRecorderPanel.hidden = false;
        if (mediaRecorder && mediaRecorder.state === "paused") {
            voiceRecorderPanel.classList.add("is-paused");
            voiceRecorderPanel.dataset.phase = "paused";
        } else {
            voiceRecorderPanel.classList.remove("is-paused");
            voiceRecorderPanel.dataset.phase = "recording";
        }
        if (formSendMessage) formSendMessage.classList.add("is-recording");
        if (recordAudioBtn) recordAudioBtn.setAttribute("aria-pressed", "true");
        if (voiceRecorderTime) voiceRecorderTime.textContent = formatDuration(recordingSeconds);
    }

    async function startRecording() {
        if (sendInProgress) return;
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ audio: { echoCancellation: true, noiseSuppression: true, autoGainControl: true } });
            const candidates = ["audio/webm;codecs=opus", "audio/webm", "audio/mp4"];
            const mimeType = candidates.find(function (c) { return MediaRecorder.isTypeSupported && MediaRecorder.isTypeSupported(c); });
            mediaRecorder = mimeType ? new MediaRecorder(stream, { mimeType: mimeType }) : new MediaRecorder(stream);
            chunks = [];
            mediaRecorder.ondataavailable = function (e) { if (e.data && e.data.size) chunks.push(e.data); };
            mediaRecorder.onstop = function () {
                blob = new Blob(chunks, { type: mediaRecorder.mimeType || "audio/webm" });
                stream.getTracks().forEach(function (t) { t.stop(); });
                chunks = [];
            };
            mediaRecorder.start(250);
            isRecording = true;
            recordingSeconds = 1;
            renderVoiceRecorder();
            timer_interval = setInterval(function () {
                recordingSeconds++;
                if (voiceRecorderTime) voiceRecorderTime.textContent = formatDuration(recordingSeconds);
            }, 1000);
        } catch (err) {
            displayError("Microphone permission denied. Allow microphone access and try again.");
        }
    }

    function stopRecording() {
        if (isRecording && mediaRecorder && mediaRecorder.state !== "inactive") {
            mediaRecorder.stop();
            isRecording = false;
        }
        clearInterval(timer_interval);
        renderVoiceRecorder();
    }

    function cancelRecording() {
        stopRecording();
        blob = null;
        showToast("Recording discarded", "The voice message was not sent.");
    }

    function sendVoiceMessage() {
        stopRecording();
        setTimeout(function () {
            if (!blob || !blob.size) return;
            const file = new File([blob], "voice-message." + (blob.type.indexOf("mp4") >= 0 ? "m4a" : blob.type.indexOf("ogg") >= 0 ? "ogg" : "webm"), { type: blob.type });
            storeAudio(file);
            blob = null;
        }, 500);
    }

    if (recordAudioBtn) recordAudioBtn.addEventListener("click", startRecording);
    if (pauseVoiceBtn) pauseVoiceBtn.addEventListener("click", function () {
        if (!mediaRecorder) return;
        try {
            if (mediaRecorder.state === "recording") {
                mediaRecorder.pause();
                clearInterval(timer_interval);
                renderVoiceRecorder();
            } else if (mediaRecorder.state === "paused") {
                mediaRecorder.resume();
                timer_interval = setInterval(function(){
                    recordingSeconds++;
                    if (voiceRecorderTime) voiceRecorderTime.textContent = formatDuration(recordingSeconds);
                }, 1000);
                renderVoiceRecorder();
            }
        } catch (e) { console.warn(e); }
    });
    if (cancelVoiceBtn) cancelVoiceBtn.addEventListener("click", cancelRecording);
    if (stopVoiceBtn) stopVoiceBtn.addEventListener("click", sendVoiceMessage);

    /**
     *-------------------------------------------------------------
     * Send messages functions
     *-------------------------------------------------------------
     */
    function sendMessage() {
        let currentUserId = activeUser ? activeUser.getAttribute("data-id") : userId;
        if (!currentUserId) return;
        sendInProgress = true;
        updateComposer();
        fetch(`/admin/chat/sendMessage/${currentUserId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                body: messageInput.value,
                type: typeInput.value
            }),
        }).then(response => response.text())
            .then(data => {
                messagesContainer.innerHTML += data;
                messageInput.value = "";
                autoResizeComposer();
                updateComposer();
                closePanels();
                scrollToBottom(boxMessageContent, false);
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove();
                if (formSendMessage) formSendMessage.classList.remove("has-message-selection");
            })
            .catch(error => {
                console.error('Error:', error);
                displayError(error.message);
            })
            .finally(() => {
                sendInProgress = false;
                updateComposer();
            });
    }
    function sendGreeting() {
        let currentUserId = activeUser ? activeUser.getAttribute("data-id") : userId;
        if (!currentUserId) return;
        sendInProgress = true;
        updateComposer();
        fetch(`/admin/chat/sendGreeting/${currentUserId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                type: typeInput.value
            }),
        }).then(response => response.text())
            .then(data => {
                messagesContainer.innerHTML += data;
                messageInput.value = "";
                closePanels();
                scrollToBottom(boxMessageContent, false);
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove();
            })
            .catch(error => {
                console.error('Error:', error);
                displayError(error.message);
            })
            .finally(() => {
                sendInProgress = false;
                updateComposer();
            });
    }

    if (sendMessageBtn) sendMessageBtn.addEventListener("click", function(e) { e.preventDefault(); sendMessage(); });
    if (sendGreetingBtn) sendGreetingBtn.addEventListener("click", sendGreeting);

    const messageForm = document.getElementById("message-form");
    if (messageForm) {
        messageForm.addEventListener("submit", function(e) { e.preventDefault(); sendMessage(); });
    }

    messageInput.addEventListener('keydown', function (event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault();
            sendMessage();
        }
    });


    function storeAudio(audio) {
        let currentUserId = activeUser ? activeUser.getAttribute("data-id") : userId;
        if (!currentUserId) return;
        const formData = new FormData();
        formData.append('audio', audio)
        formData.append('type', typeInput.value)
        fetch(`/admin/chat/sendAudio/${currentUserId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData,
        }).then(response => response.text())
            .then(data => {
                messagesContainer.innerHTML += data;
                readAllAudio()
                scrollToBottom(boxMessageContent, false)
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove()
            })
            .catch(error => {
                console.error('Error:', error);
                displayError("Could not send voice message.");
            });
    }

    function sendFile() {
        let currentUserId = activeUser ? activeUser.getAttribute("data-id") : userId;
        if (!currentUserId || !fileInput.files[0]) return;
        let file = fileInput.files[0];
        const formData = new FormData();
        formData.append('file', file)
        formData.append('type', typeInput.value)
        sendInProgress = true;
        updateComposer();
        closePanels();
        fetch(`/admin/chat/sendFile/${currentUserId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData,
        }).then(response => response.text())
            .then(data => {
                fileInput.value = "";
                messagesContainer.innerHTML += data;
                readAllAudio();
                setTimeout(function () { scrollToBottom(boxMessageContent, false); }, 300);
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove();
            })
            .catch(error => {
                console.error('Error:', error);
                displayError("Could not send file.");
            })
            .finally(() => {
                sendInProgress = false;
                updateComposer();
            });
    }

    fileInput.addEventListener('change', function() {
        if (!fileInput.files[0]) return;
        if (!userId) { fileInput.value = ""; displayError("Select a conversation first."); return; }
        sendFile();
    });

    /**
     *-------------------------------------------------------------
     * messages additional functions
     *-------------------------------------------------------------
     */

    function checkFileType() {
        const file = fileInput.files[0];
        if (file) {
            if (!userId) { fileInput.value = ""; displayError("Select a conversation first."); return; }
            sendFile();
        }
    }


    messageInput.addEventListener("input", function () {
        autoResizeComposer();
    })


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



    function blockUser() {
        if (btnBlockUser) btnBlockUser.classList.add("hidden");
        const btnUnBlockUser = document.getElementById("btnUnBlockUser");
        if (btnUnBlockUser) btnUnBlockUser.classList.remove("hidden");
        if (boxMessageContent) boxMessageContent.classList.add("BlockedUser");
        if (formSendMessage) formSendMessage.classList.add("is-blocked");
        if (messageInput) messageInput.disabled = true;
    }


    function unBlockUser() {
        const btnUnBlockUser = document.getElementById("btnUnBlockUser");
        if (btnUnBlockUser) btnUnBlockUser.classList.add("hidden");
        if (btnBlockUser) btnBlockUser.classList.remove("hidden");
        if (boxMessageContent) boxMessageContent.classList.remove("BlockedUser");
        if (formSendMessage) formSendMessage.classList.remove("is-blocked");
        if (messageInput) messageInput.disabled = false;
    }

    if (btnBlockUser) btnBlockUser.addEventListener("click", changeBlock);
    if (btnMarkAnswered) btnMarkAnswered.addEventListener("click", markAnswered);
    if (btnGetStudentsDetails) btnGetStudentsDetails.addEventListener("click", function () {
        getStudentsDetails(activeUserPhone.getAttribute('data-content'), 0);
    });
    filterContactSelector.addEventListener("change", function (event) {
        filterContacts = event.target.value;
        noMoreContacts = false;
        contactsCurrentPage = 1;
        getContacts()
    })
    messagesContainer.addEventListener('click', function (e) {
        const replyBtn = e.target.closest('.reply');

        if (replyBtn) {
            const messageId = replyBtn.dataset.id;
            const messageType = replyBtn.dataset.type;
            const messageBody = replyBtn.dataset.message;

            typeInput.value = messageType;
            syncChannelPicker();
            updateComposer();

            const replyPreview = document.getElementById("replyPreview");
            const replyText = document.getElementById("replyText");
            if (replyPreview && replyText) {
                replyText.textContent = messageBody;
                replyPreview.hidden = false;
                replyPreview.dataset.replyId = messageId;
            }
        }

        const cancelReplyBtn = e.target.closest('#cancelReplyBtn');
        if (cancelReplyBtn) {
            typeInput.value = "WhatsApp";
            syncChannelPicker();
            const replyPreview = document.getElementById("replyPreview");
            if (replyPreview) replyPreview.hidden = true;
            updateComposer();
        }

        const scrollTarget = e.target.closest('.message-row');
        if (scrollTarget && scrollTarget.dataset.replyTo) {
            const targetMessage = messagesContainer.querySelector('.message-row[data-id="' + scrollTarget.dataset.replyTo + '"]');
            if (targetMessage) {
                targetMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
                targetMessage.classList.add('highlight-pulse');
                setTimeout(function(){ targetMessage.classList.remove('highlight-pulse'); }, 1500);
            }
        }
    });

    function translateMessage(button, messageId, lang) {
        lang = lang || "english";
        const existingTranslation = button.dataset.translation;
        const wrapper = button.closest(".translationContainer");
        const translationBox = wrapper ? wrapper.querySelector(".translation-box") : null;

        if (existingTranslation && existingTranslation.trim() !== "") {
            if (translationBox) { translationBox.textContent = existingTranslation; translationBox.classList.remove("hidden"); }
            return;
        }
        if (button.dataset.loading === "true") return;

        const text = button.querySelector(".btn-text");
        const originalText = text ? text.textContent : "";
        button.dataset.loading = "true";
        button.disabled = true;
        if (text) text.textContent = "...";
        if (translationBox) { translationBox.textContent = "Translating..."; translationBox.classList.remove("hidden"); }

        fetch("/admin/chat/translateMessage/" + messageId + "/" + lang, {
            method: "POST",
            headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrfToken }
        })
        .then(function(r){ if(!r.ok) throw new Error("Network error"); return r.json(); })
        .then(function(data){
            if (data.status === "success" && data.translation) {
                button.dataset.translation = data.translation;
                if (translationBox) { translationBox.textContent = data.translation; translationBox.classList.remove("hidden"); }
            } else {
                if (translationBox) translationBox.textContent = "Translation failed";
            }
        })
        .catch(function(){
            if (translationBox) translationBox.textContent = "Translation failed";
        })
        .finally(function(){
            button.dataset.loading = "false";
            button.disabled = false;
            if (text) text.textContent = originalText;
        });
    }
    window.translateMessage = translateMessage;

    document.addEventListener("mouseover", function (e) {
        const wrapper = e.target.closest(".translationContainer");
        if (!wrapper) return;
        const box = wrapper.querySelector(".translation-box");
        if (box) box.classList.remove("hidden");
    });

    document.addEventListener("mouseout", function (e) {
        const wrapper = e.target.closest(".translationContainer");
        if (!wrapper) return;
        const box = wrapper.querySelector(".translation-box");
        if (box) box.classList.add("hidden");
    });

    /**
     *-------------------------------------------------------------
     * Panel management - wire up new UI elements
     *-------------------------------------------------------------
     */
    const composerSpeedDialBtn = document.getElementById("composerSpeedDialBtn");
    const attachmentBtn = document.getElementById("attachmentBtn");
    const channelMenuClose = document.getElementById("channelMenuClose");
    const statusFilterBtn = document.getElementById("statusFilterBtn");

    if (composerSpeedDialBtn) {
        composerSpeedDialBtn.addEventListener("click", function () {
            togglePanel("composerSpeedDial", composerSpeedDialBtn);
        });
    }

    if (attachmentBtn) {
        attachmentBtn.addEventListener("click", function () {
            togglePanel("attachmentMenu", attachmentBtn);
        });
    }

    // Type input (channel trigger) opens channel menu
    if (typeInput) {
        typeInput.addEventListener("click", function (e) {
            e.stopPropagation();
            togglePanel("channelMenu", typeInput);
        });
    }

    // Channel option selection
    document.querySelectorAll("#channelMenu [data-channel-value]").forEach(function (btn) {
        btn.addEventListener("click", function () {
            typeInput.value = btn.dataset.channelValue;
            syncChannelPicker();
            closePanels();
        });
    });

    if (channelMenuClose) {
        channelMenuClose.addEventListener("click", function () { closePanels(); });
    }

    // Status filter
    if (statusFilterBtn) {
        statusFilterBtn.addEventListener("click", function () {
            togglePanel("statusFilterMenu", statusFilterBtn);
        });
    }

    document.querySelectorAll("#statusFilterMenu [data-filter]").forEach(function (btn) {
        btn.addEventListener("click", function () {
            filterContacts = btn.dataset.filter;
            noMoreContacts = false;
            contactsCurrentPage = 1;
            getContacts();
            closePanels();
            const label = document.getElementById("statusFilterLabel");
            if (label) label.textContent = btn.querySelector(".filter-option-label").textContent;
        });
    });

    // Attachment menu - wire file input trigger
    document.querySelectorAll("#attachmentMenu [data-attachment]").forEach(function (btn) {
        btn.addEventListener("click", function () {
            closePanels();
            if (btn.dataset.attachment === "image") {
                fileInput.accept = "image/*,video/*";
            } else if (btn.dataset.attachment === "audio") {
                fileInput.accept = "audio/*";
            } else {
                fileInput.accept = ".pdf,.doc,.docx,.zip,.txt,.xls,.xlsx,.ppt,.pptx";
            }
            fileInput.click();
        });
    });

    // Quick replies button
    const quickRepliesBtn = document.getElementById("quickRepliesBtn");
    const templatePanel = document.getElementById("templatePanel");
    const templateSearchInput = document.getElementById("templateSearchInput");

    const quickReplies = [
        { title: "Warm welcome", body: "Hello! Welcome to Boston English Center. How can I help you today?" },
        { title: "Trial confirmation", body: "Your trial lesson is confirmed. I will send the meeting link and teacher details shortly." },
        { title: "Availability request", body: "Please share two days and times that work for you, and I will check the available teachers." },
        { title: "Course information", body: "I can help you choose the right course. What is your current English level and main goal?" },
        { title: "Follow-up", body: "Hi! I am checking in to see if you still need help with your English course." }
    ];

    function renderTemplates(query) {
        const list = document.getElementById("templateList");
        if (!list) return;
        const value = (query || "").trim().toLowerCase();
        list.replaceChildren();
        quickReplies.filter(function (item) {
            return !value || (item.title + " " + item.body).toLowerCase().indexOf(value) >= 0;
        }).forEach(function (item) {
            const button = document.createElement("button");
            button.type = "button";
            button.className = "template-item";
            button.innerHTML = "<strong>" + item.title + "</strong><span>" + item.body + "</span>";
            button.addEventListener("click", function () {
                messageInput.value = item.body;
                autoResizeComposer();
                closePanels();
            });
            list.append(button);
        });
    }

    if (quickRepliesBtn) {
        quickRepliesBtn.addEventListener("click", function () {
            togglePanel("templatePanel", quickRepliesBtn);
            renderTemplates("");
            if (templateSearchInput) templateSearchInput.value = "";
        });
    }

    if (templateSearchInput) {
        templateSearchInput.addEventListener("input", function () {
            renderTemplates(templateSearchInput.value);
        });
    }

    // Sync channel picker on load
    syncChannelPicker();
    updateComposer();

    // Close panels on click outside
    document.addEventListener("pointerdown", function (e) {
        if (e.target.closest(".floating-panel") || e.target.closest(".speed-dial-trigger") || e.target.closest(".button-icon")) return;
        closePanels();
    });

    // Keyboard shortcuts
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") closePanels();
    });

    /**
     *-------------------------------------------------------------
     * Contact drawer (overview panel)
     *-------------------------------------------------------------
     */
    const appShell = document.getElementById("appShell");
    const contactDrawer = document.getElementById("contactDrawer");
    const closeOverview = document.getElementById("closeOverview");
    const drawerBackdrop = document.getElementById("drawerBackdrop");
    const activeContactButton = document.getElementById("activeContactButton");

    function openDrawer() {
        if (appShell) appShell.classList.add("details-open");
    }
    function closeDrawer() {
        if (appShell) appShell.classList.remove("details-open");
    }
    if (activeContactButton) activeContactButton.addEventListener("click", openDrawer);
    if (closeOverview) closeOverview.addEventListener("click", closeDrawer);
    if (drawerBackdrop) drawerBackdrop.addEventListener("click", closeDrawer);

    /**
     *-------------------------------------------------------------
     * Dark mode toggle
     *-------------------------------------------------------------
     */
    const themeToggle = document.getElementById("themeToggle");
    if (themeToggle) {
        themeToggle.hidden = false;
        const saved = localStorage.getItem("theme");
        if (saved === "dark" || (!saved && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            document.body.classList.add("dark");
            themeToggle.setAttribute("aria-pressed", "true");
        }
        themeToggle.addEventListener("click", function () {
            const isDark = document.body.classList.toggle("dark");
            themeToggle.setAttribute("aria-pressed", isDark ? "true" : "false");
            localStorage.setItem("theme", isDark ? "dark" : "light");
        });
    }

</script>
<script>
    function displaySuccess(message = "Success") {
        const alert = document.createElement('div');

        alert.className = `
        fixed top-4 right-4 z-[9999]
        bg-green-50 border border-green-200 text-green-800
        px-4 py-3 rounded-xl shadow-lg
        flex items-center gap-3
        min-w-[260px] max-w-[420px]
    `;

        alert.innerHTML = `
        <div class="flex-1 text-sm font-medium">${message}</div>
        <iconify-icon icon="mdi:success-circle-outline" class="text-xl shrink-0"></iconify-icon>
        <button type="button" class="icon_close shrink-0 cursor-pointer text-lg leading-none">&times;</button>
    `;

        document.body.appendChild(alert);

        const removeAlert = () => alert.remove();

        alert.querySelector('.icon_close').addEventListener('click', removeAlert);

        setTimeout(removeAlert, 3000);
    }
    document.body.addEventListener("click", function (e) {
        const target = e.target.closest(".clipboard_icon");
        if (!target) return;

        const data = target.dataset.content;
        navigator.clipboard.writeText(data);

        const csrfToken =
            document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") ||
            document.querySelector('meta[name="csrf_token"]')?.getAttribute("content");

        fetch('/activity/copy', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                data: data,
            }),
        })
            .then(response => response.json())
            .then(response => {
                displaySuccess("Copied");
            });

    });
</script>
<script>
(function(){
    const btnEmoji = document.getElementById('btnEmoji');
    const emojiPanel = document.getElementById('emojiPanel');
    const emojiGrid = document.getElementById('emojiGrid');
    const emojiSearchInput = document.getElementById('emojiSearchInput');
    const clearEmojiSearch = document.getElementById('clearEmojiSearch');
    const emojiCategories = document.getElementById('emojiCategories');
    const emojiCategoryLabel = document.getElementById('emojiCategoryLabel');
    const emojiResultCount = document.getElementById('emojiResultCount');
    const emojiEmpty = document.getElementById('emojiEmpty');
    if (!btnEmoji || !emojiPanel || !emojiGrid) return;

    const CATS = ["Smileys","People","Animals","Food","Activities","Travel","Objects","Symbols"];
    const EMOJI = {
        "Smileys": ["😀","😃","😄","😁","😆","😅","🤣","😂","🙂","🙃","😉","😊","😇","🥰","😍","🤩","😘","😗","😚","😙","🥲","😋","😛","😜","🤪","😝","🤑","🤗","🤭","🤫","🤔","😐","😑","😶","😏","😒","🙄","😬","🤥","😌","😔","😪","🤤","😴","😷","🤒","🤕","🤢","🤮","🥵","🥶","🥴","😵","🤯","🤠","🥳","🥸","😎","🤓","🧐","😕","😟","🙁","☹️","😮","😯","😲","😳","🥺","😦","😧","😨","😰","😥","😢","😭","😱","😖","😣","😞","😓","😩","😫","🥱","😤","😡","😠","🤬","😈","👿","💀","☠️","💩","🤡","👹","👺","👻","👽","👾","🤖"],
        "People": ["👋","🤚","🖐️","✋","🖖","👌","🤌","🤏","✌️","🤞","🤟","🤘","🤙","👈","👉","👆","🖕","👇","👍","👎","✊","👊","🤛","🤜","👏","🙌","👐","🤲","🤝","🙏","💪","🦾","🦿","🦵","🦶","👂","🦻","👃","🧠","🫀","🦷","🦴","👀","👁️","👅","👄"],
        "Animals": ["🐶","🐱","🐭","🐹","🐰","🦊","🐻","🐼","🐨","🐯","🦁","🐮","🐷","🐸","🐵","🙈","🙉","🙊","🐒","🐔","🐧","🐦","🐤","🦆","🦅","🦉","🦇","🐺","🐗","🐴","🦄","🐝","🐛","🦋","🐌","🐞","🐜","🐢","🐍","🦎","🐙","🦑","🦐","🦞","🦀","🐡","🐠","🐟","🐬","🐳","🐋","🦈"],
        "Food": ["🍎","🍐","🍊","🍋","🍌","🍉","🍇","🍓","🫐","🍈","🍒","🍑","🥭","🍍","🥥","🥝","🍅","🥑","🍆","🥔","🥕","🌽","🌶️","🫑","🥒","🥜","🍞","🥐","🥖","🧀","🍖","🍗","🥩","🍔","🍟","🍕","🌭","🥪","🌮","🌯","🥚","🍳","🥘","🍲","🥗","🍿","🧂"],
        "Activities": ["⚽","🏀","🏈","⚾","🎾","🏐","🏉","🎱","🏓","🏸","🏒","⛳","🏹","🎣","🥊","🥋","🎽","🛹","🛼","⛸️","🎿","🎯","🎮","🎲","🧩","🎭","🎨","🧵","🪡","🧶"],
        "Travel": ["🚗","🚕","🚙","🚌","🏎️","🚓","🚑","🚒","🚐","🚚","🚛","🚜","🏍️","🛵","🚲","✈️","🛫","🛬","🚀","🛸","🚁","⛵","🚤","🛳️","🚢","🗼","🏰","🏯","🏟️","🎡","🎢","🎠","⛲","🏖️","🏜️","🌋","⛰️","🏔️","🏕️"],
        "Objects": ["⌚","📱","💻","⌨️","🖥️","🖨️","🖱️","📷","📸","📹","🎥","📞","☎️","📺","📻","🎙️","🧭","⏱️","⏰","⏳","📡","🔋","🔌","💡","🔦","🪔","💸","💵","💰","💳","💎","🔧","🔩","⚙️","🔨","🔗","🔑","🗝️","🚪","🛏️","🛋️","🪑","🧸","🎁","🎈","🎀","🎮","🎯","🎰","🧩"],
        "Symbols": ["❤️","🧡","💛","💚","💙","💜","🖤","🤍","🤎","💔","❣️","💕","💞","💓","💗","💖","💘","💝","💟","☮️","✝️","☪️","🕉️","☸️","✡️","🔯","☯️","♈","♉","♊","♋","♌","♍","♎","♏","♐","♑","♒","♓","🆔","⚛️","🉑","☢️","☣️","📴","📳","🈶","🈚","🈸","🈺","🈷️","🆚","🉐","㊙️","㊗️","🈴","🈵","🈹","🈲","🅰️","🅱️","🆎","🆑","🅾️","🆘","❌","⭕","🛑","⛔","📛","🚫","💯","❗","❕","❓","❔","‼️","⁉️","🔅","🔆","⚠️","✅","🈯","💹","❇️","✳️","❎","🌐","💠","Ⓜ️","🌀","💤","🏧","🚾","♿","🅿️","🛗","🆗","🆙","🆒","🆕","🆓","0️⃣","1️⃣","2️⃣","3️⃣","4️⃣","5️⃣","6️⃣","7️⃣","8️⃣","9️⃣","🔟","🔢","#️⃣","*️⃣","▶️","⏸️","⏹️","⏩","⏪","◀️","➡️","⬅️","⬆️","⬇️","↗️","↘️","↙️","↖️","↕️","↔️","🔄","🔀"]
    };

    let activeSkin = "";
    let activeCat = CATS[0];

    function renderCategories(){
        emojiCategories.innerHTML = "";
        CATS.forEach(function(c){
            const b = document.createElement("button");
            b.type = "button";
            b.textContent = EMOJI[c][0];
            b.setAttribute("role","tab");
            b.setAttribute("aria-selected", c === activeCat ? "true" : "false");
            b.addEventListener("click", function(){ activeCat = c; renderCategories(); renderEmojis(""); });
            emojiCategories.appendChild(b);
        });
    }

    function renderEmojis(query){
        emojiGrid.innerHTML = "";
        let emojis = EMOJI[activeCat] || [];
        if(query){
            const q = query.toLowerCase();
            emojis = [];
            CATS.forEach(function(c){
                EMOJI[c].forEach(function(e){ if(!emojis.includes(e)) emojis.push(e); });
            });
        }
        let count = 0;
        emojis.forEach(function(e){
            const b = document.createElement("button");
            b.type = "button";
            b.textContent = activeSkin ? e.replace(/\uFE0F?$/, "") : e;
            b.className = "emoji-btn";
            b.addEventListener("click", function(){
                messageInput.value += e;
                autoResizeComposer();
                emojiPanel.hidden = true;
                btnEmoji.setAttribute("aria-expanded","false");
            });
            emojiGrid.appendChild(b);
            count++;
        });
        if(emojiCategoryLabel) emojiCategoryLabel.textContent = activeCat;
        if(emojiResultCount) emojiResultCount.textContent = count + " emoji";
        emojiEmpty.hidden = count > 0;
    }

    btnEmoji.addEventListener("click", function(e){
        e.stopPropagation();
        const open = !emojiPanel.hidden;
        emojiPanel.hidden = open;
        btnEmoji.setAttribute("aria-expanded", open ? "false" : "true");
        if(!open){ renderCategories(); renderEmojis(""); }
    });

    const panelClose = emojiPanel.querySelector(".popup-close");
    if(panelClose) panelClose.addEventListener("click", function(){
        emojiPanel.hidden = true;
        btnEmoji.setAttribute("aria-expanded","false");
    });

    if(emojiSearchInput) emojiSearchInput.addEventListener("input", function(){
        renderEmojis(emojiSearchInput.value);
    });

    if(clearEmojiSearch) clearEmojiSearch.addEventListener("click", function(){
        emojiSearchInput.value = "";
        renderEmojis("");
        clearEmojiSearch.hidden = true;
    });

    document.addEventListener("pointerdown", function(e){
        if(!emojiPanel.hidden && !e.target.closest("#emojiPanel") && !e.target.closest("#btnEmoji")){
            emojiPanel.hidden = true;
            btnEmoji.setAttribute("aria-expanded","false");
        }
    });
})();
</script>
<script src="{{asset('template/core/jquery.min.js')}}"></script>
<script src="{{asset('template/libs/audio/player.min.js')}}?v=1"></script>

<script>
    $(document).ready(function () {
        const audioPlayer = document.querySelectorAll('.voice-assistant-item');
        let audios = [];

        if (audioPlayer) {
            audioPlayer.forEach((value, index) => {
                const dataAudio = value.querySelector('.play-button');
                const audio = new Audio(dataAudio.getAttribute("data-audio"));
                audios.push(audio); // store audio reference

                const timeline = value.querySelector('.audio-controls-bar');
                timeline.addEventListener('click', (e) => {
                    const timelineWidth = window.getComputedStyle(timeline).width;
                    let timeToSeek = (e.offsetX / parseInt(timelineWidth)) * audio.duration;
                    audio.currentTime = timeToSeek;
                });

                setInterval(() => {
                    const progressBar = value.querySelector('.audio-controls-bar-current');
                    progressBar.style.width = (audio.currentTime / audio.duration) * 100 + '%';
                    value.querySelector('.audio-controls-time').textContent =
                        getTimeCodeFromNum(audio.currentTime);
                }, 100);

                const playBtn = value.querySelector('.play-button');
                playBtn.addEventListener('click', () => {
                    if (audio.paused) {
                        stopAllAudios();
                        audio.play();
                        updateButtonIcon(playBtn, true);
                    } else {
                        audio.pause();
                        updateButtonIcon(playBtn, false);
                    }
                });

                audio.addEventListener('pause', () => {
                    updateButtonIcon(playBtn, false);
                });

                // Function to format time
                function getTimeCodeFromNum(num) {
                    let seconds = parseInt(num);
                    let minutes = parseInt(seconds / 60);
                    seconds -= minutes * 60;
                    const hours = parseInt(minutes / 60);
                    minutes -= hours * 60;
                    if (hours === 0) return `${minutes}:${String(seconds).padStart(2, '0')}`;
                    return `${String(hours).padStart(2, '0')}:${minutes}:${String(seconds).padStart(2, '0')}`;
                }

                // Function to update icon state
                function updateButtonIcon(button, isPlaying) {
                    const icons = button.querySelectorAll("iconify-icon");
                    icons[0].classList.toggle("d-none", isPlaying);  // play icon
                    icons[1].classList.toggle("d-none", !isPlaying); // pause icon
                }

                // Function to stop all other audios
                function stopAllAudios() {
                    audioPlayer.forEach((item, i) => {
                        const btn = item.querySelector('.play-button');
                        if (audios[i] !== audio) {
                            audios[i].pause();
                            updateButtonIcon(btn, false);
                        }
                    });
                }
            });
        }

        // Stop all audio when #addNotes modal is closed
        $('#addNotes').on('hidden.bs.modal', function () {
            audios.forEach((audio, i) => {
                audio.pause();
                const playBtn = audioPlayer[i].querySelector('.play-button');
                const icons = playBtn.querySelectorAll("iconify-icon");
                icons[0].classList.remove("d-none");
                icons[1].classList.add("d-none");
            });
        });
    });
</script>
</body>
</html>