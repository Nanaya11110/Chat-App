<div>
    <!--SEARCH BAR-->
    <div class="flex flex-1 items-center justify-center p-6">
        <div class="w-full max-w-lg">
            <form class="mt-5 sm:flex sm:items-center">
                <input id="q" name="q" wire:model.live="search"
                    class="inline w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-3 leading-5 placeholder-gray-500 focus:border-indigo-500 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                    placeholder="Enter the name" type="search" autofocus="" value=""><button type="submit"
                    class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Search</button>
            </form>
        </div>
    </div>
    <!--LIST-->
    <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2   mt-10">
        @foreach ($UserList as $user)
        <div class="p-4 max-w-sm">
            <div class="flex rounded-lg w-80 h-32 from-gray-500 to-blue-400 bg-gradient-to-r p-2">
                <img class="w-1/3 h-full p-2 rounded-full object-cover" src="{{$user->avatar_url}}">
                <div class=" p-2 w-2/3 h-full" >
                    <h2 class=" font-bold mb-5 text-white">{{$user->name}}</h2>
                   <button wire:click="AddConversation({{$user}})" class="px-8 py-4 bg-blue-500 text-white font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">
                    Add
                  </button>
                </div>
            </div>
        </div>

        @endforeach
        
       
    </div>
</div>
