<div class="flex-1 bg-gray-100 w-full h-full">
    <div class="main-body container m-auto w-11/12 h-full flex flex-col">
        @livewire('NavBar')
        <div class="main flex-1 flex flex-col">
            <div class="hidden lg:block heading flex-2">
                <h1 class="text-3xl text-gray-700 mb-4">{{$pick}}</h1>
            </div>
          
            {{-- <p class="bg-red-500">{{$pick}}</p> --}}
            <div class="flex h-full ">
                @if ($pick == 'chat')
                    @livewire('ChatList')
                    @livewire('ChatArea')@endif
                @if ( $pick =='Profile') @livewire('profile')@endif
                @if ( $pick =='User List') @livewire('UserList')@endif
                
                
            </div>
        </div>
    </div>
</div>

