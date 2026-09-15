<div id="formSendMessage" class="p-0 px-5  m-0 right-3 fixed bottom-4 w-[calc(100%-375px)] ">
    <div class="mb-4 inline-flex items-center gap-2">
        <select
            name="type"
            id="typeInput"
            class="h-11 min-w-[230px] cursor-pointer rounded-full border border-slate-200 bg-white px-4 pr-10 text-sm font-medium text-slate-700 shadow-sm outline-none transition hover:border-slate-300 focus:border-emerald-400 focus:ring-0 focus:ring-emerald-100"
        >
            <option value="whatsapp">WhatsApp</option>
            <option value="whatsapp student support">WhatsApp Student Support</option>
            <option value="email">Email</option>
            <option value="sms">SMS</option>
        </select>

        <button
            type="button"
            id="sendGreetingBtn"
            aria-label="Send greeting"
            class="inline-flex h-11 w-11 shrink-0 cursor-pointer items-center justify-center rounded-full bg-emerald-500 text-white shadow-xl shadow-emerald-500/30 ring-1 ring-white/20 transition hover:bg-emerald-600 focus:outline-none focus:ring-0 focus:ring-emerald-300"
        >
            <iconify-icon
                icon="ph:hand-waving-duotone"
                width="24"
                height="24"
                class="animate-[waveGreeting_1.8s_ease-in-out_infinite]"
            ></iconify-icon>
        </button>
    </div>

    <style>
        @keyframes waveGreeting {
            0%, 100% {
                transform: translateX(0) rotate(0deg);
            }
            25% {
                transform: translateX(-3px) rotate(-10deg);
            }
            50% {
                transform: translateX(3px) rotate(10deg);
            }
            75% {
                transform: translateX(-2px) rotate(-6deg);
            }
        }
    </style>
    {{--        <input type="hidden" name="type" value="whatsapp" id="typeInput">--}}
    <div class="relative w-full">
        <!--    box  on record     -->
        <div class="box_recorder flex border items-center justify-center rounded-lg z-20 absolute hidden">
            <div class="box_start">
                             <span id="removeRecordBtn">
                                    <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M5 21V6H4V4h5V3h6v1h5v2h-1v15H5Zm2-2h10V6H7v13Zm2-2h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"></path>
                                    </svg>
                            </span>
                <div class="box_start_recorder">
                    <span class="effect_recorder "></span>
                    <span class="timer_recorder">
                                        <span class="minute_recorder">00</span>
                                        <span>:</span>
                                        <span class="second_recorder">00</span>
                                    </span>
                    <span class="text_recorder">............</span>
                </div>

                <span id="sendRecordBtn" class="cursor-pointer">
                                   <svg class="text-blue-500 ms-3" xmlns="http://www.w3.org/2000/svg" width="30"
                                        height="30" viewBox="0 0 24 24">
                                      <path fill="currentColor" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/>
                                   </svg>
                            </span>
            </div>
        </div>

        <a id="btnRecordeAudio" type="button"
           class="absolute z-10 max-w-max ms-auto inset-y-0 text-blue-500 left-auto right-4  cursor-pointer start-0 flex items-center ps-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 36 36">
                <path fill="currentColor"
                      d="M18 24c3.9 0 7-3.1 7-7V9c0-3.9-3.1-7-7-7s-7 3.1-7 7v8c0 3.9 3.1 7 7 7"
                      class="clr-i-solid clr-i-solid-path-1"/>
                <path fill="currentColor"
                      d="M30 17h-2c0 5.5-4.5 10-10 10S8 22.5 8 17H6c0 6.3 4.8 11.4 11 11.9V32h-3c-.6 0-1 .4-1 1s.4 1 1 1h8c.6 0 1-.4 1-1s-.4-1-1-1h-3v-3.1c6.2-.5 11-5.6 11-11.9"
                      class="clr-i-solid clr-i-solid-path-2"/>
                <path fill="none" d="M0 0h36v36H0z"/>
            </svg>
        </a>


        <!--                    left btn           -->
        <label for="fileInput" id="fileInputLabel"
               class="absolute z-10 max-w-max  py-3  bottom-1 text-gray-600 cursor-pointer start-0 flex items-center ps-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 1024 1024">
                <path fill="currentColor"
                      d="M544 864V672h128L512 480L352 672h128v192H320v-1.6c-5.376.32-10.496 1.6-16 1.6A240 240 0 0 1 64 624c0-123.136 93.12-223.488 212.608-237.248A239.808 239.808 0 0 1 512 192a239.872 239.872 0 0 1 235.456 194.752c119.488 13.76 212.48 114.112 212.48 237.248a240 240 0 0 1-240 240c-5.376 0-10.56-1.28-16-1.6v1.6z"/>
            </svg>
        </label>


        <button id="btnEmoji"
               class="absolute z-10 max-w-max  py-3  bottom-1 text-gray-600 cursor-pointer  flex items-center ms-12">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10s10-4.486 10-10S17.514 2 12 2m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8s8 3.589 8 8s-3.589 8-8 8"/><path fill="currentColor" d="M14.829 14.828a4.055 4.055 0 0 1-1.272.858a4.002 4.002 0 0 1-4.875-1.45l-1.658 1.119a6.063 6.063 0 0 0 1.621 1.62a5.963 5.963 0 0 0 2.148.903a6.042 6.042 0 0 0 2.415 0a5.972 5.972 0 0 0 2.148-.903c.313-.212.612-.458.886-.731c.272-.271.52-.571.734-.889l-1.658-1.119a4.017 4.017 0 0 1-.489.592"/><circle cx="8.5" cy="10.5" r="1.5" fill="currentColor"/><circle cx="15.493" cy="10.493" r="1.493" fill="currentColor"/></svg>
        </button>


        <div id="boxFile"
             class="hidden absolute top-[100%] rounded-lg z-20 h-[300px] w-full bg-gray-100 translate-y-[-95%]">



            <div class="h-[238px]  flex items-center justify-center">
                <div class="boxFileUpload rounded-lg border-2  overflow-hidden  w-[300px] h-[220px] ">

                </div>
            </div>

            <div class="relative px-3">


            <span id="closeBoxFile"
                class="absolute z-10 max-w-max  py-1   bottom-1 text-gray-600 cursor-pointer start-0 flex items-center ps-6">
           <svg class="bg-white rounded-full" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20"><path fill="rgb(248 113 113)" d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M11.4 10l2.83-2.83l-1.41-1.41L10 8.59L7.17 5.76L5.76 7.17L8.59 10l-2.83 2.83l1.41 1.41L10 11.41l2.83 2.83l1.41-1.41L11.41 10z"/></svg>
            </span>

                <button id="sendMessageFile" type="submit"
                        class="absolute z-10 max-w-max ms-auto bottom-2 text-blue-500 left-auto right-4 me-3 cursor-pointer start-0 flex items-center ps-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/>
                    </svg>
                </button>
                <input disabled id="messageFile" type="text" name="message"
                       class="block w-full p-3  pe-16 text-sm text-gray-900 border-[1px] border-gray-300 outline-none  focus:outline-0 rounded-full bg-gray-100  focus:border-blue-400   "
                       placeholder="Type  a message"
                       required=""/>
            </div>

        </div>

        <input id="fileInput" type="file" name="fileInput" class="hidden"/>
            <button id="sendMessage" type="button"
                    class="hidden absolute z-10 bottom-4 h-auto max-w-max ms-auto  text-blue-500 left-auto right-4  cursor-pointer start-0 flex items-center ps-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/>
                </svg>
            </button>

            <textarea dir="auto" id="messageInput" type="text" name="message"
                   class="block w-full p-3.5  px-16 ps-24 resize-none text-sm text-gray-900 border-[1px] border-gray-300 outline-none  focus:outline-0 rounded-lg bg-gray-100  focus:border-blue-400   "
                   placeholder="Type  a message"
                   ></textarea>

    </div>
</div>
