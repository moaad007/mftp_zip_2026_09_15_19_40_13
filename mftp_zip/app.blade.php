<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="route_prefix" content="{{request()->segment(2)}}">
    <meta name="waba-pusher-key" content="{{ config('chatify.pusher.key') }}">
    <meta name="waba-pusher-cluster" content="{{ config('chatify.pusher.options.cluster') }}">
    <meta name="waba-pusher-auth-endpoint" content="{{ route('admin.waba.chat.pusher.auth') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import "https://fonts.googleapis.com/css2?family=Niconne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap";

        body, html {
            font-family: Poppins, Roboto, sans-serif;
            scroll-behavior: smooth;
        }

        .boxNoMessages.boxMessages {
            position: relative;
        }



        .boxNoMessages.boxMessages::after {
            content: " ";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background-color: #f3f4f6;

        }

        .contact-item.active {
            background-color: #2f445b;
            color: #ffffff;
        }

        .contact-item.active h5 {
            color: #ffffff;
        }

        #startRecordingBtn, #removeRecordBtn {
            display: inline-block;
            cursor: pointer;
        }


        #message-form {
            position: relative;
        }

        .box_recorder {
            position: absolute;
            z-index: 30;
            width: 100%;
            max-width: 100%;
            height: 100%;
            background: #d3d3d3;
            border-top: 1px solid #dbdada;
        }

        .box_start {
            max-width: 370px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .effect_recorder {
            width: 9px;
            height: 9px;
            background-color: red;
            display: inline-block;
            border-radius: 50%;
            animation: effect_recorder infinite 2.5s;
        }

        .timer_recorder {
            margin-left: 10px;
            color: #fff;
        }

        .text_recorder {
            color: #a5a5a5;
            height: 34px;
            letter-spacing: 3px;
            font-size: 17px;
        }

        .box_start_recorder {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        @keyframes effect_recorder {
            0%, 50%, 100% {
                opacity: 1;
            }

            25%, 75% {
                opacity: 0;
            }
        }

        .box_pause_recorder {
            width: 200px;
            position: relative;
        }

        #playPauseButton {
            position: absolute;
            left: -4px;
            z-index: 2;
            top: -5px;
        }

        #playPauseButton svg {
            margin: 0;
            padding: 5px;
            border-radius: 4px;
        }

        .main_audio {
            display: inline-block;
            position: relative;
        }

        .main_audio audio {
            height: 25px;
            width: 200px;
            border-radius: 10px;
            z-index: -1;
            display: block !important;
        }

        .progress_box {
            width: 100%;
            min-width: 278px;
            height: 30px;
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" viewBox="0 0 21 21"%3E%3Cpath fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M6.5 8.5v4m2-6v9m2-6v2m2-4v6.814m2-9.814v12"%2F%3E%3C%2Fsvg%3E');
            display: flex;
            align-items: center;
        }

        .main_audio .progress_box {
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" color="rgb(232,229,229)" viewBox="0 0 26 26"%3E%3Cpath fill="currentColor" d="M18.813 2.031a.95.95 0 0 0-.75.969v19a.95.95 0 1 0 1.875 0V3a.95.95 0 0 0-1.032-.969a.95.95 0 0 0-.093 0zm-12 1a.95.95 0 0 0-.75.969v17a.95.95 0 1 0 1.875 0V4a.95.95 0 0 0-1.032-.969a.95.95 0 0 0-.093 0zm9 3a.95.95 0 0 0-.75.969v11a.95.95 0 1 0 1.874 0V7a.95.95 0 0 0-1.03-.969a.95.95 0 0 0-.095 0zm-12 1a.95.95 0 0 0-.75.969v9a.95.95 0 1 0 1.874 0V8a.95.95 0 0 0-1.03-.969a.95.95 0 0 0-.095 0zm6 1a.95.95 0 0 0-.75.969v7a.95.95 0 1 0 1.874 0V9a.95.95 0 0 0-1.03-.969a.95.95 0 0 0-.095 0zm12 0a.95.95 0 0 0-.75.969v7a.95.95 0 1 0 1.875 0V9a.95.95 0 0 0-1.032-.969a.95.95 0 0 0-.093 0zm-21 2a.95.95 0 0 0-.75.969v3a.95.95 0 1 0 1.875 0v-3a.95.95 0 0 0-1.032-.969a.95.95 0 0 0-.094 0zm12 0a.95.95 0 0 0-.75.969v3a.95.95 0 1 0 1.874 0v-3a.95.95 0 0 0-1.03-.969a.95.95 0 0 0-.095 0zm12 0a.95.95 0 0 0-.75.969v3a.95.95 0 1 0 1.875 0v-3a.95.95 0 0 0-1.032-.969a.95.95 0 0 0-.093 0z"%2F%3E%3C%2Fsvg%3E');
        }

        .audio_listening {
            position: relative;
            height: 100%;
            width: 0;
            border-radius: 10px;
            background: #1b1d21bf;
        }

        .audio_listening[style="width: 100%;"]::after {
            display: none !important;
        }

        .audio_listening::after {
            content: " ";
            position: absolute;
            right: 0;
            width: 3px;
            height: 130%;
            top: -15%;
        }

        .main_audio {
            min-width: 225px;
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 5px;
            border-radius: 20px;
        }

        .Pause_Play {
            color: red;
            width: 30px;
            min-width: 29px;
            height: 28px;
            display: inline-block;
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" color = "rgb(88,166,255)" width="20" height="20" viewBox="0 0 24 24"%3E%3Cpath fill="currentColor" d="M21.409 9.353a2.998 2.998 0 0 1 0 5.294L8.597 21.614C6.534 22.737 4 21.277 4 18.968V5.033c0-2.31 2.534-3.769 4.597-2.648l12.812 6.968Z"%2F%3E%3C%2Fsvg%3E');
            background-size: 18px;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 5px;
        }

        .Pause_Play.pause_mode {
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" color = "rgb(88,166,255)" width="24" height="24" viewBox="0 0 24 24"%3E%3Cpath fill="currentColor" d="M14 18V6h3.5v12H14Zm-7.5 0V6H10v12H6.5Z"%2F%3E%3C%2Fsvg%3E');
        }


        .main_audio .progress_box {
            background-position-x: -7px;
        }

        .box_recorder {
            background: #d3d3d3;
            border-top: 1px solid #dbdada;
        }

        .main_audio.active .progress_box {
            animation: audio_listening 100000s infinite;
        }

        @keyframes audio_listening {
            0%, 50%, 100% {
                background-position-x: 0;
            }
            49.999%,
            99.999% {
                background-position-x: -3000000px;
            }
        }

        #btnTutor {
            background-color: #f5f9ed;
        }

        #btnClients {
            background-color: #fdf1f0;
        }

        #btnStudents {
            background-color: #f3f4f6;
        }

        body {
            background-size: cover;
            background-attachment: fixed;

        }




        #tutorDashboard .headerChat {
            background: #e4e1db;
        }

        #clientsDashboard .headerChat {
            background: #e6dcd1;
        }

        #studentsDashboard .headerChat {
            background: #ffffff;
        }

        #tutorDashboard .leftSlide, #clientsDashboard .leftSlide {
            background-color: #0a152014;
        }

        #clientsDashboard #contactsContainer button:not(.active) .text-gray-500 {
            color: rgb(66, 66, 66);
        }

        #tutorDashboard #messages-container .bg-gray-100, #clientsDashboard #messages-container .bg-gray-100 {
            background-color: rgb(214 214 214);
        }

        #tutorDashboard .after\:bg-gray-50:after {
            background-color: rgb(214 214 214);
        }

        #tutorDashboard *, #clientsDashboard * {
            border-color: #b6b6b6;
        }
        #boxMessageContent.BlockedUser {
            opacity: .7;
            padding-bottom: 20px !important;
        }
        #boxMessageContent.BlockedUser + #formSendMessage{
            visibility: hidden;
            pointer-events: none;
        }

        .boxEmoji {
            position: fixed !important;
            transform: none !important;
            inset: auto auto 77px 375px !important;
            max-width: 600px;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('template/libs/audio/player.min.css')}}?v=3"/>

    <style>
        #replyContainer{
            bottom:100px;
        }
        .clipboard_icon {
            font-size: 20px;
            cursor: pointer;
        }

        .clipboard_box {
            background-color: #fff;
            padding: 5px 10px;
            border-radius: 9px;
        }
    </style>
    <title>Whatsapp</title>
</head>
<body id="clientsDashboard">
@if($canManageAssistants)
    <audio id="notificationTutors" src="{{asset("sounds/2.mp3")}}"  preload="auto"></audio>
@endif
<audio id="notificationClients" src="{{asset("sounds/1.mp3")}}"   preload="auto"></audio>
<audio id="notificationStudents" src="{{asset("sounds/3.mp3")}}"  preload="auto"></audio>

<div>
    <div class="flex flex-wrap">
        <div id="leftSideSection" class="max-w-[370px] leftSlide border-r-[1px] flex-1">
            <div class="flex items-center border  p-4 justify-center">
                <a href="{{route('landing')}}" class="flex  items-center space-x-3 ">
                    <img src="{{asset("img/LogoBlack.webp")}}" class=" w-[148px] h-auto"
                         alt="Boston English Center">
                </a>
            </div>
            <div class="relative w-full mt-2 px-2 mb-0">
                    <span
                        class="absolute z-10 mt-1 inset-y-0 ms-auto max-w-max text-blue-500 left-auto right-3   cursor-pointer start-0  ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14"/>
                        </svg>
                    </span>
                <input id="searchInput" name="search"
                       class="block w-full px-3 py-2.5 text-sm  py rounded-lg  pe-10  text-gray-900 border-[1px] border-gray-500 outline-none  focus:outline-0  bg-white  focus:border-blue-500"
                       placeholder="search">
            </div>
            <div id="searchContainer" class="hidden">
                <div class="h-[77vh] overflow-y-auto">
                    <div class=" flex flex-col " id="searchList">
                    </div>
                </div>
            </div>
            <div id="contactsContainer">
                <div id="typeDashboard" style="font-size: 12px" class=" flex justify-between border-b-[1px] after:bg-gray-50 p-1 py-2 relative text-center">
                    <div class="w-full">
                        @if(request()->segment(2)=='chat')
                            @if($canManageAssistants)
                                <button id="btnTutor"
                                        class="cursor-pointer font-bold mx-auto inline-block  px-3 py-2  rounded-lg  relative z-10 ">
                                <span id="tutorUnseenMessages"
                                      class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 hidden"></span>
                                    Tutor
                                </button>
                                <button id="btnClients"
                                        class="cursor-pointer font-bold mx-auto inline-block   px-3 py-2 rounded-lg  relative z-10 ">
                                    <span id="clientUnseenMessages"
                                          class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 hidden"></span>
                                    Clients
                                </button>
                                <button id="btnStudents"
                                        class="cursor-pointer  font-bold mx-auto inline-block  px-3 py-2 rounded-lg  relative z-10 ">
                                    <span id="studentUnseenMessages"
                                          class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 hidden"></span>
                                    Students
                                </button>
                            @else
                                <button id="btnClients"
                                        class="cursor-pointer font-bold mx-auto inline-block   px-3 py-2 rounded-lg  relative z-10">
                                    <span id="clientUnseenMessages"
                                          class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 hidden"></span>
                                    Clients
                                </button>
                                <button id="btnStudents"
                                        class="cursor-pointer  font-bold mx-auto inline-block  px-3 py-2 rounded-lg  relative z-10 ">
                                    <span id="studentUnseenMessages"
                                          class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 hidden"></span>
                                    Students
                                </button>
                            @endif
                        @else

                            <button id="btnClients"
                                    class="cursor-pointer font-bold mx-auto inline-block   px-3 py-2 rounded-lg  relative z-10">
                                    <span id="clientUnseenMessages"
                                          class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 hidden"></span>
                                Active
                            </button>
                            <button id="btnStudents"
                                    class="cursor-pointer  font-bold mx-auto inline-block  px-3 py-2 rounded-lg  relative z-10 ">
                                    <span id="studentUnseenMessages"
                                          class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900 hidden"></span>
                                Canceled
                            </button>
                        @endif
                    </div>

                    <form class="position-relative ms-2 z-20 pb-0 mb-0">
                        <select id="filterContactSelector" class=" p-2 w-[110px] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="newest" selected>Newest </option>
                            <option value="unanswered">Unanswered</option>
                            <option value="unread">Unread</option>
                            @if(auth()->user()->role_id!=2 || auth()->user()->assistant->have_all_whatsapp_access)
                                <option value="ai">Ai</option>
                                <option value="trial_booking_agent">Trial Booking Assistant</option>
                                <option value="trial_attending_agent">Trial Attending Assistant</option>
                                <option value="trial_subscribing_agent">Subscription Assistant</option>
                            @endif
                        </select>
                    </form>

                    <span class="absolute left-0 z-[0] h-[1px] w-full bg-gray-200 top-[50%]"></span>
                </div>
                {{--     Contact list   h-[70vh]    --}}
                {{--     Contact list   h-[500px]    --}}
                <div id="boxContactList" class="h-[80vh]  overflow-y-auto">
                    <div class=" flex flex-col " id="contact-list">
                    </div>
                </div>
            </div>

        </div>

        <div id="rightSideSection" class="min-w-screesn-sm flex-1">
            <div class=" boxMessages invisible ">
                <div id="boxMessagesScroll" style="overflow: scroll !important;" class="relative h-[99vh]  overflow-y-auto">
                    @include("mouad.component.activeUser")
                    <div id="boxMessageContent" class="pb-[116px]">
                        <div class=" flex flex-col gap-y-3 py-10 px-5" id="messages-container">


                        </div>
                    </div>
                    <div class="px-5  m-0 ">
                        <div>
                            <div class="boxEmoji w-full px-3 hidden  z-40 mb-5 ">
                                <emoji-picker class="w-full mb-4 z-20"></emoji-picker>
                            </div>
                        </div>

                    </div>
                    {{--                    <div id="newPlace" class="p-0 px-5 m-0 right-3 fixed bottom-12 w-100 "></div>--}}
                    {{--                    <div id="replyContainer"></div>--}}
                    @include("mouad.component.sendForm")
                </div>
            </div>
        </div>
        <div  id="overviewSection" ></div>
    </div>
</div>
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



    let noUserChose = document.querySelector(".boxMessages");

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
    let messageInput = document.getElementById("messageInput");
    let typeInput = document.getElementById('typeInput');
    let sendGreetingBtn = document.getElementById("sendGreetingBtn");

    let boxMessageContent = document.getElementById("boxMessageContent");

    let notificationStudents = document.getElementById("notificationStudents");
    let notificationClients = document.getElementById("notificationClients");
    let notificationTutors = document.getElementById("notificationTutors");
    let closeBoxFile = document.getElementById("closeBoxFile");


    //upload audio
    let mediaRecorder;
    let chunks = [];
    let isRecording = false;
    let blob;
    let i = 0;

    const sendRecordBtn = document.getElementById('sendRecordBtn');
    const removeRecordBtn = document.getElementById('removeRecordBtn');
    const second_recorder = document.querySelector(".second_recorder");
    const box_recorder = document.querySelector(".box_recorder");
    const minute_recorder = document.querySelector(".minute_recorder");

    let timer_interval;

    const fileInput = document.getElementById('fileInput');
    const formSendMessage = document.getElementById('formSendMessage');
    const boxFileUpload = document.getElementById("boxFileUpload");
    const boxFile = document.querySelector('#boxFile');
    const sendMessageFile = document.getElementById('sendMessageFile')

    let main_audio = document.querySelectorAll(".main_audio .Pause_Play")


    /**
     *-------------------------------------------------------------
     * Global functions
     *-------------------------------------------------------------
     */

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
                    noUserChose.classList.add("invisible");
                } else if (dashboard.id === "btnClients") {
                    contacts = "clients";
                    document.body.id = "clientsDashboard";
                    noUserChose.classList.add("invisible");
                } else {
                    contacts = "students";
                    document.body.id = "studentsDashboard";
                    noUserChose.classList.add("invisible");
                }
                noMoreContacts = false;
                contactsCurrentPage = 1;
                getContacts();
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
                // Parse the JSON response
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
                    // Parse the JSON response
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
                // Parse the JSON response
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
        typeInput.value="whatsapp";
        document.getElementById('replyContainer')?.remove();
        if(messageInput.value.trim().length === 0){
            sendMessageBtn.classList.add("hidden")
            btnRecordeAudio.classList.remove("hidden")
            document.getElementById("fileInputLabel").classList.remove('hidden');
        }
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
    }
    function setActiveUser(event) {
        let clickedElement = event.target;
        let btn = clickedElement.closest('.contact-item');
        if (btn) {
            userId = btn.getAttribute('data-id')
            changeActiveUser(userId,btn)
        }

        if (noUserChose) {
            noUserChose.classList.remove("invisible")
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
            if (noUserChose) {
                noUserChose.classList.remove("invisible");
                getContact(userId);
            }
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
    function calculateRecordingTime() {
        if (isRecording) {
            if (i === 59) {
                i = 0;

                if (+minute_recorder.innerHTML + 1 < 10) {
                    minute_recorder.innerHTML = `0${+minute_recorder.innerHTML + 1}`;
                } else {
                    minute_recorder.innerHTML = +minute_recorder.innerHTML + 1;
                }
            }
            if (i < 10) {
                second_recorder.innerHTML = `0${i}`;
            } else {
                second_recorder.innerHTML = i;
            }
            i++;
        }
    }

    async function startRecording() {
        box_recorder.classList.remove("hidden");
        const stream = await navigator.mediaDevices.getUserMedia({
            audio: true
        });

        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = (event) => {
            if (event.data.size > 0) {
                chunks.push(event.data);
            }
        };
        mediaRecorder.onstop = () => {
            blob = new Blob(chunks, {
                type: 'audio/wav'
            });

            stream.getTracks().forEach((track) => {
                track.stop();
            });
            chunks = [];
        };
        mediaRecorder.start();
        isRecording = true;
        i = 1;
        second_recorder.innerHTML = "01";
        minute_recorder.innerHTML = "00";
        timer_interval = setInterval(calculateRecordingTime, 1000);
    }

    function stopRecording() {
        if (isRecording) {
            mediaRecorder.stop();
            isRecording = false;
        }
        clearInterval(timer_interval);
        box_recorder.classList.add("hidden");
    }

    function sendAudio() {

        stopRecording();
        setTimeout(function () {
            const file = new File([blob], 'audio-recording', {
                type: 'wav',
            });
            const url = URL.createObjectURL(file);
            storeAudio(file);
        }, 1000);
    }

    btnRecordeAudio.addEventListener('click', startRecording);
    sendRecordBtn.addEventListener("click", sendAudio);
    removeRecordBtn.addEventListener("click", stopRecording);


    /**
     *-------------------------------------------------------------
     * Send messages functions
     *-------------------------------------------------------------
     */
    function sendMessage() {
        let userId = document.getElementById("active-user").getAttribute("data-id");
        sendMessageBtn.classList.add("pointer-events-none")
        messageInput.disabled = true;
        fetch(`/admin/chat/sendMessage/${userId}`, {
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
                btnRecordeAudio.classList.remove("hidden")
                document.getElementById("fileInputLabel").classList.remove('hidden');
                sendMessageBtn.classList.add("hidden")
                sendMessageBtn.classList.remove("pointer-events-none")
                scrollToBottom(boxMessageContent, false)
                messageInput.style.height = 58 + 'px';
                boxMessageContent.style.paddingBottom = 68 + 'px';
                messageInput.disabled = false;
                document.getElementById('replyContainer')?.remove();
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove()
            })
            .catch(error => {
                console.error('Error:', error);
                displayError(error.message)
                messageInput.disabled = false;

            });
    }
    function sendGreeting() {
        let userId = document.getElementById("active-user").getAttribute("data-id");
        sendGreetingBtn.classList.add("pointer-events-none")
        messageInput.disabled = true;
        fetch(`/admin/chat/sendGreeting/${userId}`, {
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
                sendGreetingBtn.classList.remove("pointer-events-none")
                scrollToBottom(boxMessageContent, false)
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove()
            })
            .catch(error => {
                console.error('Error:', error);
                displayError(error.message)
                messageInput.disabled = false;

            });
    }

    sendMessageBtn.addEventListener("click", sendMessage)
    sendGreetingBtn.addEventListener("click", sendGreeting)

    messageInput.addEventListener('keydown', function (event) {
        if (event.key === "Enter" && !event.ctrlKey) {
            event.preventDefault();
            sendMessage();
        }
        // Check if Ctrl + Enter is pressed
        if (event.key === "Enter" && event.ctrlKey) {
            insertAtCursor(this, '\n');
        }
    });


    function storeAudio(audio) {
        let userId = document.getElementById("active-user").getAttribute("data-id");
        const formData = new FormData();
        formData.append('audio', audio)
        formData.append('type', typeInput.value)
        fetch(`/admin/chat/sendAudio/${userId}`, {
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
            });
    }

    function sendFile() {
        let userId = document.getElementById("active-user").getAttribute("data-id");
        let file = fileInput.files[0];
        const formData = new FormData();
        formData.append('file', file)
        formData.append('type', typeInput.value)
        boxFile.classList.add("pointer-events-none")
        btnRecordeAudio.classList.add("hidden")
        fetch(`/admin/chat/sendFile/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData,
        }).then(response => response.text())
            .then(data => {
                fileInput.value = ""
                messagesContainer.innerHTML += data;
                boxFile.classList.add('hidden');
                boxFile.classList.remove("pointer-events-none")
                btnRecordeAudio.classList.remove("hidden")
                setTimeout(() => {
                    scrollToBottom(boxMessageContent, false)
                }, 2000)
                document.querySelector(".contact-item.active")?.querySelector(".unseen_messages")?.remove()

            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    fileInput.addEventListener('change', checkFileType);
    sendMessageFile.addEventListener("click", sendFile);

    closeBoxFile.addEventListener("click" , function (){
        fileInput.value = "";
        boxFile.classList.add('hidden');
    })
    /**
     *-------------------------------------------------------------
     * messages additional functions
     *-------------------------------------------------------------
     */

    function checkFileType() {
        const file = fileInput.files[0];

        if (file) {
            const boxFileUpload = document.querySelector('#boxFile .boxFileUpload');
            const fileType = file.type;
            boxFile.classList.remove('hidden');
            const reader = new FileReader();
            reader.onload = function (e) {
                const fileData = e.target.result;
                let createElementType;
                if (fileType.includes("image")) {
                    createElementType = document.createElement('img');
                    createElementType.classList = "w-full";
                } else if (fileType.includes("application")) {
                    createElementType = document.createElement('embed');
                    createElementType.type = 'application/pdf';
                } else if (fileType.includes("video")) {
                    createElementType = document.createElement('video');
                    createElementType.controls = true;
                }
                createElementType.src = fileData;
                boxFileUpload.innerHTML = '';
                boxFileUpload.appendChild(createElementType);
            };
            reader.readAsDataURL(file);

        }
    }


    messageInput.addEventListener("input", function () {
        messageInput.style.height = 'auto';
        if (messageInput.scrollHeight < 310) {
            messageInput.style.height = (messageInput.scrollHeight) + 10 + 'px';
            boxMessageContent.style.paddingBottom = (messageInput.scrollHeight) + 10 + 'px';
        } else {
            messageInput.style.height = 310 + 'px';
            boxMessageContent.style.paddingBottom = 310 + 'px';
        }

        if (messageInput.value.trim().length === 0 ) {
            btnRecordeAudio.classList.remove("hidden")
            sendMessageBtn.classList.add("hidden")
        } else {
            sendMessageBtn.classList.remove("hidden")
            btnRecordeAudio.classList.add("hidden")
        }
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
        btnBlockUser.classList.add("hidden")
        btnUnBlockUser.classList.remove("hidden")
        boxMessageContent.classList.add("BlockedUser")
        formSendMessage.classList.add("hidden")
    }


    function unBlockUser() {
        btnUnBlockUser.classList.add("hidden")
        btnBlockUser.classList.remove("hidden")
        boxMessageContent.classList.remove("BlockedUser")
        formSendMessage.classList.remove("hidden")

    }

    btnBlockUser.addEventListener("click", changeBlock)
    btnUnBlockUser.addEventListener("click", changeBlock)
    btnMarkAnswered.addEventListener("click", markAnswered)
    // btnGetStudentsDetails.addEventListener("click", getStudentsDetails)
    btnGetStudentsDetails.addEventListener("click", function () {
        getStudentsDetails(activeUserPhone.getAttribute('data-content'), 0);
    });
    filterContactSelector.addEventListener("change", function (event) {
        filterContacts = event.target.value;
        noMoreContacts = false;
        contactsCurrentPage = 1;
        getContacts()
    })
    messagesContainer.addEventListener('click', function (e) {
        const button = e.target.closest('.reply');

        if (e.target.classList.contains('reply')) {

            const messageId = button.dataset.id;
            const messageType = button.dataset.type;
            const messageBody = button.dataset.message;

            typeInput.value = messageType;
            if(!messageType.includes("whatsapp")){
                sendMessageBtn.classList.remove("hidden")
                btnRecordeAudio.classList.add("hidden")
                document.getElementById("fileInputLabel").classList.add('hidden');
            }else if(messageInput.value.trim().length === 0){
                sendMessageBtn.classList.add("hidden")
                btnRecordeAudio.classList.remove("hidden")
                document.getElementById("fileInputLabel").classList.remove('hidden');
            }

            // Remove existing replyContainer if any
            const existing = document.getElementById('replyContainer');
            if (existing) existing.remove();

            // Create replyContainer
            const replyContainer = document.createElement('div');
            replyContainer.id = 'replyContainer';
            replyContainer.className = 'p-2 px-5 m-5 w-[calc(100%-415px)] border rounded bg-gray-100 flex items-center justify-between right-3 fixed bottom-20';

            // Fill it with content from button data
            replyContainer.innerHTML = `
        <div>
          <p class="font-semibold">Replying to ${messageType}</p>
          <p class="text-sm">${messageBody}</p>
        </div>
        <button id="cancelReply" class="ml-4 text-red-500 font-bold">×</button>
      `;

            // Insert replyContainer before the form
            const form = document.getElementById('formSendMessage');
            form.parentNode.insertBefore(replyContainer, form);

            // Optional: add cancel button functionality
            document.getElementById('cancelReply').addEventListener('click', () => {
                typeInput.value="whatsapp";
                replyContainer.remove();
                if(messageInput.value.trim().length === 0){
                    sendMessageBtn.classList.add("hidden")
                    btnRecordeAudio.classList.remove("hidden")
                    document.getElementById("fileInputLabel").classList.remove('hidden');
                }
            });
        }

        const replyPreview = e.target.closest('.reply-container');
        console.log(replyPreview)

        // Click on reply preview -> scroll to original message
        if (replyPreview) {
            const replyToId = replyPreview.dataset.replyTo;
            const targetMessage = document.querySelector(`.message-container[data-id="${replyToId}"]`);

            if (targetMessage) {
                targetMessage.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                targetMessage.classList.add('bg-yellow-100');
                setTimeout(() => {
                    targetMessage.classList.remove('bg-yellow-100');
                }, 1500);
            }

        }

        /*
        *
        * Translate messages tooltip
        *
        * */
        function translateMessage(button, messageId, lang = "english") {
            const existingTranslation = button.dataset.translation;

            const wrapper = button.closest(".translationContainer");
            const translationBox = wrapper.querySelector(".translation-box");

            if (existingTranslation && existingTranslation.trim() !== "") {
                translationBox.textContent = existingTranslation;
                translationBox.classList.remove("hidden");
                return;
            }

            if (button.dataset.loading === "true") {
                return;
            }

            const icon = button.querySelector(".translate-icon");
            const text = button.querySelector(".btn-text");

            const originalText = text.textContent;

            button.dataset.loading = "true";
            button.disabled = true;
            button.classList.add("opacity-60", "cursor-not-allowed");
            button.classList.remove("cursor-pointer");

            // icon.setAttribute("data-icon", "eos-icons:loading");
            text.textContent = "...";

            if (translationBox) {
                translationBox.textContent = "Translating...";
                translationBox.classList.remove("hidden");
            }

            fetch(`/admin/chat/translateMessage/${messageId}/${lang}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.head.querySelector('meta[name=csrf_token]').content
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }

                    return response.json();
                })
                .then(data => {
                    if (data.status === "success" && data.translation) {
                        button.dataset.translation = data.translation;

                        if (translationBox) {
                            translationBox.textContent = data.translation;
                            translationBox.classList.remove("hidden");
                        }
                    } else {
                        if (translationBox) {
                            translationBox.textContent = "Translation failed";
                        }
                    }
                })
                .catch(error => {
                    console.error("Error:", error);

                    if (translationBox) {
                        translationBox.textContent = "Translation failed";
                    }
                })
                .finally(() => {
                    button.dataset.loading = "false";
                    button.disabled = false;

                    button.classList.remove("opacity-60", "cursor-not-allowed");
                    button.classList.add("cursor-pointer");

                    // icon.setAttribute("data-icon", "material-symbols:g-translate");
                    text.textContent = originalText;
                });
        }
        window.translateMessage=translateMessage;

        document.addEventListener("mouseover", function (e) {
            const wrapper = e.target.closest(".translationContainer");

            if (!wrapper) return;

            const button = wrapper.querySelector(".translate-btn");
            const box = wrapper.querySelector(".translation-box");

            if (!button || !box) return;

            box.classList.remove("hidden");
        });

        document.addEventListener("mouseout", function (e) {
            const wrapper = e.target.closest(".translationContainer");

            if (!wrapper) return;

            const box = wrapper.querySelector(".translation-box");

            if (!box) return;

            box.classList.add("hidden");
        });
    });

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
    }    document.body.addEventListener("click", function (e) {
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
<script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>
<script type="module">
    import * as Popper from 'https://cdn.jsdelivr.net/npm/@popperjs/core@^2/dist/esm/index.js'
    const btnEmoji = document.getElementById('btnEmoji');
    const boxEmoji = document.querySelector('.boxEmoji');
    Popper.createPopper(btnEmoji, boxEmoji)

    btnEmoji.onclick = () => {
        boxEmoji.classList.toggle('hidden')
    }

    document.querySelector('emoji-picker')
        .addEventListener('emoji-click', event => {
            messageInput.value += event.detail.unicode
            document.getElementById("sendMessage").classList.remove("hidden");
            document.getElementById("btnRecordeAudio").classList.add("hidden");
        });

    boxEmoji.addEventListener("mouseleave" , ()=>{
        boxEmoji.classList.add('hidden');
    } )

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
