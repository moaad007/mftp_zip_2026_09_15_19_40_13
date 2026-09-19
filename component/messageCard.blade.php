@if(isset($firstUnseen) && $firstUnseen)
    <div class="date-separator" id="firstUnseen"><span>Unread messages</span></div>
@endif
<article class="message-row {{ $message->from_id ? 'incoming' : 'outgoing' }}" data-id="{{ $message->id }}">
    @if($message->from_id)
        <span class="message-avatar" aria-hidden="true">{{ strtoupper(substr($message->assistant_name ?? $message->assistant->name ?? 'U', 0, 1)) }}</span>
    @endif
    <div class="message-stack">
        @if($message->is_ai)
            <div class="message-sender">{{ $message->assistant_name ? $message->assistant_name : 'AI' }} &middot; {{ $message->type }}</div>
        @elseif($message->to_id)
            <div class="message-sender">{{ $message->assistant ? $message->assistant->name : ($message->is_from_webhook ? 'WhatsApp' : 'Remtoo') }} &middot; {{ $message->type }}</div>
        @else
            <div class="message-sender">{{ $message->type }}</div>
        @endif

        @if($message->reply_to)
            @php
                $repliedMessage = \App\Models\WabaMessage::where('waba_message_id', $message->reply_to)->first();
            @endphp
            @if($repliedMessage)
                <div class="message-bubble bubble-reply" data-reply-to="{{ $repliedMessage->id }}">
                    <small>Reply</small>
                    <span>{{ \Illuminate\Support\Str::of($repliedMessage->body)->limit(50) }}</span>
                </div>
            @endif
        @endif

        <div class="message-bubble">
            @if($message->hasMedia('audio'))
                <div class="main_audio message-attachment audio-card" data-audio="">
                    <span class="Pause_Play cursor-pointer audio-play" aria-label="Play"><svg class="icon"><use href="#i-play"/></svg></span>
                    <audio preload>
                        <source src="{{ $message->getFirstMediaUrl('audio') }}">
                    </audio>
                    <div class="audio-track"><div class="audio-waveform"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div></div>
                </div>
            @endif

            @if($message->hasMedia('image'))
                <div class="message-attachment image-card">
                    <img src="{{ $message->getFirstMediaUrl('image') }}" alt="image">
                </div>
            @endif

            @if($message->hasMedia('document'))
                <a class="message-attachment document-card" href="{{ $message->getFirstMediaUrl('document') }}" target="_blank">
                    <span class="document-card-icon"><svg class="icon"><use href="#i-file"/></svg></span>
                    <span class="document-card-copy"><strong>Document</strong></span>
                </a>
            @endif

            @if($message->hasMedia('video'))
                <a class="message-attachment video-card" href="{{ $message->getFirstMediaUrl('video') }}" target="_blank">
                    <span class="document-card-icon"><svg class="icon"><use href="#i-image"/></svg></span>
                    <span class="document-card-copy"><strong>Video</strong></span>
                </a>
            @endif

            <p dir="auto" style="word-break: break-word">{!! nl2br(strip_tags($message->body)) !!}</p>

            <div class="message-meta">
                @if($message->reaction)
                    <span class="message-reaction">{{ $message->reaction }}</span>
                @endif
                <time datetime="{{ $message->created_at }}">{{ \Carbon\Carbon::parse($message->created_at)->format("H:i") }}</time>
                @if(!$message->from_id)
                    @if($message->status)
                        <span class="delivery {{ $message->status }}">
                            @if($message->status == "sent")
                                <svg class="icon"><use href="#i-check"/></svg>
                            @elseif($message->status == "delivered")
                                <svg class="icon"><use href="#i-check"/></svg><svg class="icon"><use href="#i-check"/></svg>
                            @elseif($message->status == "read")
                                <svg class="icon is-read"><use href="#i-check"/></svg><svg class="icon is-read"><use href="#i-check"/></svg>
                            @else
                                {{ $message->status }}
                            @endif
                        </span>
                    @endif
                @endif
            </div>

            <div class="flex gap-2 justify-around mt-1">
                <div class="relative group translationContainer">
                    <button class="translate-btn flex items-center gap-1 text-emerald-600 cursor-pointer hover:underline text-[11px] font-semibold" onclick="translateMessage(this, {{ $message->id }}, 'english')" data-id="{{ $message->id }}" data-lang="english" data-translation="{{ e($message->english_translation) }}">
                        <span class="translate-icon iconify" data-icon="material-symbols:g-translate"></span>
                        <span class="btn-text">English</span>
                    </button>
                    <div class="translation-box hidden absolute z-50 bottom-full mb-2 {{ $message->from_id ? 'left-0' : 'left-1/2 -translate-x-1/2' }} w-56 shadow-lg overflow-hidden rounded-lg text-sm flex-col p-3 bg-white border border-slate-200">
                        {{ $message->english_translation ?: 'Click to translate' }}
                    </div>
                </div>
                <div class="relative group translationContainer">
                    <button class="translate-btn flex items-center gap-1 text-emerald-600 cursor-pointer hover:underline text-[11px] font-semibold" onclick="translateMessage(this, {{ $message->id }}, 'arabic')" data-id="{{ $message->id }}" data-lang="arabic" data-translation="{{ e($message->arabic_translation) }}">
                        <span class="translate-icon iconify" data-icon="material-symbols:g-translate"></span>
                        <span class="btn-text">Arabic</span>
                    </button>
                    <div class="translation-box hidden absolute z-50 bottom-full mb-2 {{ $message->from_id ? 'left-1/2 -translate-x-1/2' : 'right-0' }} w-56 shadow-lg text-right overflow-hidden rounded-lg text-sm flex-col p-3 bg-white border border-slate-200">
                        {{ $message->arabic_translation ?: 'اضغط للترجمة' }}
                    </div>
                </div>
            </div>

            @if($message->from_id)
                <button class="reply" data-id="{{ $message->id }}" data-type="{{ $message->type }}" data-message="{{ nl2br($message->body) }}">
                    <svg class="icon"><use href="#i-reply"/></svg>
                    <span>Reply</span>
                </button>
            @endif
        </div>
    </div>
</article>
