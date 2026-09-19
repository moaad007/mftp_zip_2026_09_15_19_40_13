@if(isset($firstUnseen)&&$firstUnseen)
    <div class="flex items-center justify-center my-4">
        <div class="flex-grow border-t border-gray-300"></div>

        <span id="firstUnseen" class="mx-4 px-3 py-1 text-xs text-gray-600 bg-gray-100 rounded-full">
            Unread messages
        </span>

        <div class="flex-grow border-t border-gray-300"></div>
    </div>
@endif
<div dir="ltr" class="w-[360px] {{($message->from_id) ?  "flex" : "ms-auto" }} message-container" data-id="{{$message->id}}">
    <div class="mr-3">
        @if($message->is_ai)
            <div dir="auto" class="w-full text-[11px] font-semibold text-gray-500">{{  ($message->assistant_name)?nl2br($message->assistant_name):'Ai'}} - {{$message->type}} </div>
        @elseif($message->to_id)
            <div dir="auto" class="w-full text-[11px] font-semibold text-gray-500">{{  ($message->assistant)?nl2br($message->assistant->name):($message->is_from_webhook?'whatsapp application':'Remtoo')}} - {{$message->type}}
            </div>
        @else
            <div dir="auto" class="w-full text-[11px] font-semibold text-gray-500">{{$message->type}}
            </div>
        @endif
            @php
                $typeColors = [
                    'email' => 'bg-blue-200',
                    'sms' => 'bg-yellow-200',
                    'text' => 'bg-gray-200',
                    'whatsapp' => 'bg-green-300',
                    'whatsapp student support' => 'bg-emerald-200',
                ];

                $color = $typeColors[strtolower(trim($message->type))] ?? 'bg-gray-100';
            @endphp
        <div  class="{{($message->hasMedia('image') || $message->hasMedia('document') || $message->hasMedia('video')) ? 'flex-wrap gap-0 text-end justify-end' : 'gap-1 justify-between'}}  overflow-hidden relative rounded-lg text-sm flex items-end  flex-col p-3  {{($message->from_id&&$message->type=="whatsapp")?"bg-gray-100":$color}}">
            @if($message->reply_to)
                <?php
                    $repliedMessage=\App\Models\WabaMessage::where('waba_message_id',$message->reply_to)->first();
                ?>
                @if($repliedMessage)
                    <div class="{{ ($message->from_id) ? 'bg-gray-200' : 'bg-green-200' }} rounded-lg p-2 border-l-4 border-green-500 w-full cursor-pointer reply-container" data-reply-to="{{$repliedMessage->id}}">
                        <p class="text-xs text-gray-700 dark:text-gray-200 truncate">
                            {{\Illuminate\Support\Str::of($repliedMessage->body)->limit(50)}}
                        </p>
                    </div>
                @endif

            @endif
            @if($message->hasMedia('audio'))
                <div class="main_audio">
                    <span data-audio="" class="Pause_Play cursor-pointer"></span>
                    <audio preload class="hidden">
                        <source src="{{$message->getFirstMediaUrl('audio')}}">
                    </audio>

                    <div class="container_listening">
                        <div class="progress_box">
                            <div class="audio_listening">
                            </div>
                        </div>
                    </div>
                </div>

            @endif
            @if($message->hasMedia('image'))
                <img src="{{$message->getFirstMediaUrl('image')}}" alt="image">
            @endif
            @if($message->hasMedia('document'))
                <a class="flex  items-center justify-center w-full" href="{{$message->getFirstMediaUrl('document')}}"
                   target="_blank">
                    <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="178" height="178" viewBox="0 0 20 20">
                        <path fill="currentColor"
                              d="M17.924 7.154h-.514l.027-1.89a.464.464 0 0 0-.12-.298L12.901.134A.393.393 0 0 0 12.618 0h-9.24a.8.8 0 0 0-.787.784v6.37h-.515c-.285 0-.56.118-.76.328A1.14 1.14 0 0 0 1 8.275v5.83c0 .618.482 1.12 1.076 1.12h.515v3.99A.8.8 0 0 0 3.38 20h13.278c.415 0 .78-.352.78-.784v-3.99h.487c.594 0 1.076-.503 1.076-1.122v-5.83c0-.296-.113-.582-.315-.792a1.054 1.054 0 0 0-.76-.328M3.95 1.378h6.956v4.577a.4.4 0 0 0 .11.277a.37.37 0 0 0 .267.115h4.759v.807H3.95zm0 17.244v-3.397h12.092v3.397zM12.291 1.52l.385.434l2.58 2.853l.143.173h-2.637c-.2 0-.325-.033-.378-.1c-.053-.065-.084-.17-.093-.313zM3 14.232v-6h1.918c.726 0 1.2.03 1.42.09c.34.09.624.286.853.588c.228.301.343.69.343 1.168c0 .368-.066.678-.198.93c-.132.25-.3.447-.503.59a1.72 1.72 0 0 1-.62.285c-.285.057-.698.086-1.239.086h-.779v2.263zm1.195-4.985v1.703h.654c.471 0 .786-.032.945-.094a.786.786 0 0 0 .508-.762a.781.781 0 0 0-.19-.54a.823.823 0 0 0-.48-.266c-.142-.027-.429-.04-.86-.04zm4.04-1.015h2.184c.493 0 .868.038 1.127.115c.347.103.644.288.892.552c.247.265.436.589.565.972c.13.384.194.856.194 1.418c0 .494-.06.92-.182 1.277c-.148.437-.36.79-.634 1.06c-.207.205-.487.365-.84.48c-.263.084-.616.126-1.057.126H8.235zM9.43 9.247v3.974h.892c.334 0 .575-.019.723-.057c.194-.05.355-.132.482-.25c.128-.117.233-.31.313-.579c.081-.269.121-.635.121-1.099c0-.464-.04-.82-.12-1.068a1.377 1.377 0 0 0-.34-.581a1.132 1.132 0 0 0-.553-.283c-.167-.038-.494-.057-.98-.057zm4.513 4.985v-6H18v1.015h-2.862v1.42h2.47v1.015h-2.47v2.55z"/>
                    </svg>
                </a>
            @endif
            @if($message->hasMedia('video'))
                <a class="flex items-center justify-center w-full" href="{{$message->getFirstMediaUrl('video')}}"
                   target="_blank">
                    <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="178" height="178" viewBox="0 0 16 16">
                        <path fill="currentColor"
                              d="M6.5 5.82v4.36c0 .25.274.403.487.273l3.259-1.992a.54.54 0 0 0 0-.922l-3.26-1.991a.32.32 0 0 0-.486.273M4.5 3A2.5 2.5 0 0 0 2 5.5v5A2.5 2.5 0 0 0 4.5 13h7a2.5 2.5 0 0 0 2.5-2.5v-5A2.5 2.5 0 0 0 11.5 3zM3 5.5A1.5 1.5 0 0 1 4.5 4h7A1.5 1.5 0 0 1 13 5.5v5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 10.5z"/>
                    </svg>
                </a>
            @endif
            <div dir="auto" style="word-break: break-word" class="flex-1 w-full">{!!  nl2br(strip_tags($message->body))!!}   </div>
            <div class="flex flex-end gap-2">
                <span class="text-[9px] text-gray-600 -mb-2">{{\Carbon\Carbon::parse($message->created_at)->format("Y-m-d H:i")}}</span>

                @if($message->status)
                    @if($message->status=="sent")
                        <span class="text-gray-400 text-sm select-none">✓</span>
                    @elseif($message->status=="delivered")
                        <span class="text-gray-400 text-sm select-none">✓✓</span>
                    @elseif($message->status=="read")
                        <span class="text-blue-500 text-sm select-none">✓✓</span>
                    @else
                        <span class="text-red-600 text-sm select-none">{{$message->status}}</span>
                    @endif
                @endif
            </div>

        </div>
            <div class="flex gap-2 justify-around">
                @if($message->reaction)
                    <div class="">
                        Reaction: {{$message->reaction}}
                    </div>
                @endif
                <div class="relative group translationContainer">
                    <button
                        class="translate-btn flex content-center items-center gap-1 text-primary cursor-pointer hover:underline"
                        onclick="translateMessage(this, {{ $message->id }}, 'english')"
                        data-id="{{ $message->id }}"
                        data-lang="english"
                        data-translation="{{ e($message->english_translation) }}"
                    >
                        <span class="translate-icon iconify" data-icon="material-symbols:g-translate"></span>
                        <span class="btn-text">English</span>
                    </button>

                    <div class="translation-box hidden absolute z-50 bottom-full mb-2 {{$message->from_id?'left-0':'left-1/2 -translate-x-1/2'}} w-64  shadow-lg overflow-hidden  rounded-lg text-sm  items-end  flex-col p-3  bg-gray-100">
                        {{ $message->english_translation ?: 'Click to translate' }}
                    </div>
                </div>

                <div class="relative group translationContainer">
                    <button
                        class="translate-btn flex content-center items-center gap-1 text-primary cursor-pointer hover:underline"
                        onclick="translateMessage(this, {{ $message->id }}, 'arabic')"
                        data-id="{{ $message->id }}"
                        data-lang="arabic"
                        data-translation="{{ e($message->arabic_translation) }}"
                    >
                        <span class="translate-icon iconify" data-icon="material-symbols:g-translate"></span>
                        <span class="btn-text">Arabic</span>
                    </button>

                    <div class="translation-box hidden absolute z-50 bottom-full mb-2 {{$message->from_id?'left-1/2 -translate-x-1/2':'right-0'}} w-64  shadow-lg text-right
                            overflow-hidden  rounded-lg text-sm  items-end  flex-col p-3  bg-gray-100
                        ">
                        {{ $message->arabic_translation ?: 'اضغط للترجمة' }}
                    </div>
                </div>

            </div>

    </div>
    @if($message->from_id)
        <button class="reply flex content-center items-center gap-1" data-id="{{$message->id}}" data-type="{{$message->type}}" data-message="{{nl2br($message->body)}}">
            <span class="iconify" data-icon="quill:reply-all"></span>
            Reply
        </button>

    @endif

</div>
