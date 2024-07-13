<div class="sidebar w-full sm:hidden lg:flex lg:w-1/3 flex-2 flex-col pr-6 " style="height:600px">
    
    <div class="flex-1 h-full overflow-auto px-2">
        @if(isset($user))
        @foreach ($user as $user)
        <div wire:click="conversations({{$user->id}},'{{$user['conversationsId']}}')" wire:key="{{ $user->id }}"
            class="entry cursor-pointer transform @if ($pick == $user->id) bg-green-500  @endif hover:scale-105 duration-150  transition-all bg-white mb-4 rounded p-4 flex shadow-md">
            <div class="flex-2">
                <div class="w-12 h-12 relative">
                    <img class="w-12 h-12 rounded-full mx-auto object-cover" src="{{$user->avatar_url}}" alt="chat-user" />
                    <span
                        class="absolute w-4 h-4 bg-gray-400 rounded-full right-0 bottom-0 border-2 border-white"></span>
                </div>
            </div>
            <div class="flex-1 px-2">
                <div class="truncate w-32"><span class="text-gray-800">{{$user->name}}</span></div>
                <div><small class="text-gray-600">{{$user['latestMessenge']}}</small></div>
            </div>
            <div class="flex-2 text-right">
                <div><small
                        class="text-gray-500 text-xs">{{ $user['latestMessengeTimes'] }}</small>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>NO ONE</p>
        @endif
    </div>
    <p class="bg-red-500">{{$pick}}</p>
</div>





