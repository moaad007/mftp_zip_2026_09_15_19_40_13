<div class="headerChat flex justify-between gap-4 items-center border sticky top-0 z-20 px-4  py-3" id="active-user">
    <div class="flex   gap-2 items-center ">
        <div class="relative border-2   rounded-full">
            <span class="w-9 h-9 text-xl p-3  inline-flex items-center justify-center rounded-full shadow-lg"  id="active-user-avatar"></span>
        </div>
        <div>
            <h5 class="mb-1 text-base font-bold text-gray-900 " id="active-user-name"></h5>
            Email:
            <iconify-icon class="clipboard_icon"
                          id="active-user-email"
                          data-content=""
                          icon="line-md:clipboard-arrow-twotone"></iconify-icon>

            Phone:
            <iconify-icon class="clipboard_icon"
                          id="active-user-phone"
                          data-content=""
                          icon="line-md:clipboard-arrow-twotone"></iconify-icon>
        </div>
    </div>

   <div class="{{auth()->user()->role_id==1?"flex":"hidden"}}">
       <button id="btnBlockUser" class="flex text-white font-semibold text-sm bg-red-400 py-2 px-3 rounded-lg gap-1 items-center">
           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="#fff" d="M11.5 4a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7M6 7.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0m12 7a3.5 3.5 0 0 0-3.08 5.165l4.745-4.744A3.483 3.483 0 0 0 18 14.5m3.08 1.835l-4.745 4.744a3.5 3.5 0 0 0 4.745-4.745M12.5 18a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0M8 16a4 4 0 0 0-4 4h7.05v2H2v-2a6 6 0 0 1 6-6h3v2z"/></svg>
           Block
       </button>

       <button id="btnUnBlockUser" class="hidden flex text-white font-semibold text-sm bg-green-400 py-2 px-3 rounded-lg gap-1 items-center">
           <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="white" d="M16 14a5 5 0 0 1 4.995 4.783L21 19v1a2 2 0 0 1-1.85 1.995L19 22H5a2 2 0 0 1-1.995-1.85L3 20v-1a5 5 0 0 1 4.783-4.995L8 14zm0 2H8a3 3 0 0 0-2.995 2.824L5 19v1h14v-1a3 3 0 0 0-2.824-2.995zM12 2a5 5 0 1 1 0 10a5 5 0 0 1 0-10m0 2a3 3 0 1 0 0 6a3 3 0 0 0 0-6"/></g></svg>
           Unblock
       </button>
   </div>
    <button id="btnMarkAnswered" class="{{auth()->user()->role_id==1?"flex":"hidden"}} text-white font-semibold text-sm bg-red-400 py-2 px-3 rounded-lg gap-1 items-center">
        Mark answered
    </button>
    <button
        type="button"
        class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-slate-950 text-white shadow-xl shadow-slate-950/25 ring-1 ring-white/20 transition hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-cyan-300"
        id="btnGetStudentsDetails"
        aria-label="Open student overview"
    >
        <iconify-icon icon="ph:student-duotone" width="24" height="24"></iconify-icon>
    </button>
</div>
