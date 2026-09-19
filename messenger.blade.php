@extends("layouts.simple")
@section("content")
<div class="wa-app">

    {{-- Conversations Pane --}}
    <div class="wa-conversations" style="width:320px;">
        <div class="wa-inbox-header">
            <div class="wa-workspace-name">Admin Area</div>
            <div class="wa-inbox-title">Messages</div>
        </div>

        <div class="wa-contact-scroll">
            <div class="wa-contact-list">
                @foreach($users as $user)
                    <a href="{{route('admin.waba.chat.show',['wabaUserId'=>$user->id])}}" class="wa-contact-item">
                        <div class="wa-avatar-wrap">
                            <div class="avatar bg-emerald-100 text-emerald-700">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        </div>
                        <div class="body">
                            <div class="top">
                                <span class="name">{{ $user->name }}</span>
                            </div>
                            <div class="preview-row">
                                <span class="preview">+{{ $user->phone }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Chat Pane --}}
    <div class="wa-chat">
        <div class="wa-chat-header">
            <button class="back-btn wa-icon-btn" onclick="history.back()" aria-label="Go back">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <div class="profile-btn">
                <span class="wa-chat-header profile-avatar bg-emerald-100 text-emerald-700">
                    {{ strtoupper(substr($users->firstWhere('id', $wabaUserId)->name ?? 'U', 0, 2)) }}
                </span>
                <div>
                    <div class="wa-chat-header profile-name">{{ $users->firstWhere('id', $wabaUserId)->name ?? '' }}</div>
                </div>
            </div>
        </div>

        <div class="wa-messages">
            <div class="wa-messages-inner">
                @foreach($discussion as $message)
                    <div class="wa-msg {{ $message->from_id ? 'received' : 'sent' }}">
                        <div class="wa-bubble">
                            <div dir="auto" style="word-break: break-word" class="text-[14px] leading-relaxed">
                                {!! nl2br(e($message->body)) !!}
                            </div>
                            <div class="meta">
                                <span class="time">{{ \Carbon\Carbon::parse($message->created_at)->format("Y-m-d H:i") }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="wa-composer">
            <form action="{{route('admin.waba.chat.store',['wabaUserId'=>$wabaUserId])}}" method="post">
                @csrf
                <div class="wa-composer-inner relative">
                    <textarea dir="auto" name="body" rows="1" class="flex-1 min-h-[40px] max-h-[120px] px-4 py-2.5 rounded-xl border-0 bg-slate-100 text-sm text-slate-900 resize-none outline-none focus:bg-slate-50 transition" placeholder="Type a message" required></textarea>
                    <button type="submit" class="wa-send-btn absolute right-3 bottom-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
