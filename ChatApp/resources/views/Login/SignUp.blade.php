@include('Layout.Header')
<!-- component -->
<div class="flex h-screen">
    <!-- Left Pane -->
    <div class="hidden lg:flex items-center justify-center flex-1 bg-white text-black">
        <img src="Messenger.png" class="w-1/2 h-1/2 object-cover">
    </div>
    <!-- Right Pane -->
    <div class="w-full bg-gray-100 lg:w-1/2 flex items-center justify-center">
        <div class="max-w-md w-full p-6">
            <h1 class="text-3xl font-semibold mb-6 text-black text-center">Sign Up</h1>
            <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center">Join to Our Community with all time access
                and free </h1>


            <form action="{{ route('SignUpStore') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @if ($errors->has('name'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <span class="font-medium">{{ $errors->first('name') }}</span>
                        </div>
                    @endif
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" name="email"
                        class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @if ($errors->has('email'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <span class="font-medium">{{ $errors->first('email') }}</span>
                        </div>
                    @endif
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                    @if ($errors->has('password'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <span class="font-medium">{{ $errors->first('password') }}</span>
                        </div>
                    @endif
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-black text-white p-2 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-black focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">Sign
                        Up</button>
                </div>
            </form>
            <div class="mt-4 text-sm text-gray-600 text-center">
                <p>Already have an account? <a href="{{ route('Login') }}" class="text-black hover:underline">Login
                        here</a>
                </p>
            </div>
        </div>
    </div>


</div>
