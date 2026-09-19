    <button class="cursor-pointer  block px-3 border-b-[1px] py-3  contact-item"
            data-id="{{$user->id}}"
            data-name="{{$user->name}}"
            data-phone="+{{$user->phone}}"
            data-email="{{$user->email}}"
            data-is-blocked="{{$user->is_blocked}}">
        <div class="flex gap-2 items-center">
            @if($user->assistant)
               <div class="border-r-[2px] pe-2">
                   <div class="relative border-2 border-green-400 rounded-full">
                       <img class="w-8 h-8 max-w-max rounded-full shadow-lg"
                            src="{{$user->assistant->getFirstMediaUrl('avatars','thumb')}}"
                            alt="{{$user->assistant->name}}"/>
                   </div>
               </div>
            @endif
            <div class="w-full">
                <div class="flex justify-between gap-2 items-center">
                    <h5 class="mb-1 text-start userName text-sm font-bold text-gray-900  overflow-hidden text-ellipsis whitespace-nowrap w-[165px]">
                        @if($user->phone)
                            +{{\Illuminate\Support\Str::limit($user->phone,6)}}
                        @else
                            {{\Illuminate\Support\Str::limit($user->email,10)}}
                        @endif
                        {{$user->name}}
                    </h5>
                    @if($user->unanswered_count)
                        <div class="ms-auto text-[11px] text-center text-white px-2   rounded-full bg-green-400 unseen_messages">
                            {{$user->unanswered_count}}
                        </div>
                    @endif
                </div>
                <div class="flex  justify-between gap-4">
                    <span class="text-start text-sm  inline-block text-gray-500 overflow-hidden text-ellipsis whitespace-nowrap w-[135px]">
                        @if($user->last_message)
                            @if($user->last_message->body)
                                {{$user->last_message->body}}
                            @elseif($user->last_message->hasMedia('video'))
                                video
                            @elseif($user->last_message->hasMedia('document'))
                                document
                            @elseif($user->last_message->hasMedia('image'))
                                image
                            @elseif($user->last_message->hasMedia('audio'))
                                audio
                            @endif
                        @endif
                    </span>
                    <span class="text-sm text-end scale-75 text-gray-500">{{\Carbon\Carbon::parse($user->latest_message_created_at)->diffForHumans()}}</span>
                </div>
            </div>
        </div>
    </button>
