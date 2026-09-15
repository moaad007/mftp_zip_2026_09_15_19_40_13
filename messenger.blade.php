@extends("layouts.simple")
@section("content")
    <div>

        <div class="flex flex-wrap">
            <div class="max-w-[320px] bg-gray-100 flex-1">

                <div class="py-10">

                </div>
                @foreach($users as $user)
                    <a href="{{route('admin.waba.chat.show',['wabaUserId'=>$user->id])}}" class="flex px-3 border-b-[1px]  pb-6 mb-6 items-center space-x-3 ">
                        <div class="flex   gap-2 items-center ">
                            <div>
                                <h5 class="mb-1 text-xl font-medium text-gray-900 ">{{$user->name}}</h5>
                                <span class="text-sm text-gray-500 opacity-80">+{{$user->phone}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="min-w-screesn-sm flex-1">
                <div class="flex items-center border bg-gray-100 p-4 justify-center">
                    <a href="{{route('landing')}}" class="flex items-center space-x-3 ">
                        <img src="{{asset("img/LogoBlack.webp")}}" class=" w-[148px] h-auto"
                             alt="Boston English Center">
                    </a>
                </div>
                <div class="min-h-[80vh] p-10">
                    @foreach($discussion as $message)
                        @if($message->from_id)
                            <div class=" rounded-lg bg-gray-100 p-3 max-w-[260px]">
                                {{$message->body}}
                            </div>
                        @else
                            <div class=" rounded-lg ms-auto bg-green-300 p-3 max-w-[260px]">
                                {{$message->body}}
                            </div>
                        @endif
                    @endforeach
                </div>

                <form action="{{route('admin.waba.chat.store',['wabaUserId'=>$wabaUserId])}}" method="post" class="p-0 px-10 w-full m-0">
                    @csrf
                    <div class="relative w-full">
                        <button type="submit" title="search"
                                class="absolute z-10 inset-y-0 text-blue-500 left-auto right-4  cursor-pointer start-0 flex items-center ps-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M2.01 21L23 12L2.01 3L2 10l15 2l-15 2z"/>
                            </svg>
                        </button>
                        <input type="text" name="body"
                               class="block w-full p-3.5  ps-10 text-sm text-gray-900 border-[1px] border-gray-300 outline-none focus:border-0 focus:outline-0 rounded-full bg-gray-100  focus:border-blue-400   "
                               required="">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
