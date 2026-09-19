<button class="contact-item" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-phone="+{{ $user->phone }}" data-email="{{ $user->email }}" data-is-blocked="{{ $user->is_blocked }}" type="button" role="option" aria-selected="false">
    <span class="avatar-wrap">
        @if($user->assistant)
            <span class="avatar contact-avatar" aria-hidden="true" style="background-image: url('{{ $user->assistant->getFirstMediaUrl('avatars','thumb') }}'); background-size: cover; background-position: center;"></span>
        @else
            <span class="avatar contact-avatar" aria-hidden="true">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
        @endif
        <span class="presence-dot {{ !empty($user->active_status) ? 'online' : '' }}" aria-label="{{ !empty($user->active_status) ? 'Online' : 'Offline' }}"></span>
    </span>
    <span class="contact-body">
        <span class="contact-row-top">
            <span class="contact-name">
                @if($user->phone)
                    {{ \Illuminate\Support\Str::limit($user->phone, 6) }}
                @else
                    {{ \Illuminate\Support\Str::limit($user->email, 10) }}
                @endif
                {{ $user->name }}
            </span>
            @if($user->latest_message_created_at)
                <span class="contact-time">{{ \Carbon\Carbon::parse($user->latest_message_created_at)->diffForHumans() }}</span>
            @endif
        </span>
        <span class="contact-preview-row">
            <span class="contact-preview">
                @if($user->last_message)
                    @if($user->last_message->body)
                        {{ \Illuminate\Support\Str::limit($user->last_message->body, 40) }}
                    @elseif($user->last_message->hasMedia('video'))
                        Video
                    @elseif($user->last_message->hasMedia('document'))
                        Document
                    @elseif($user->last_message->hasMedia('image'))
                        Image
                    @elseif($user->last_message->hasMedia('audio'))
                        Audio
                    @endif
                @else
                    No messages yet
                @endif
            </span>
            @if($user->unanswered_count)
                <span class="unread-badge">{{ $user->unanswered_count }}</span>
            @endif
        </span>
        @if($user->unanswered_count)
            <span class="contact-meta"><span class="status-label">Needs reply</span></span>
        @endif
    </span>
</button>
