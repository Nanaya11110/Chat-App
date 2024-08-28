@include('Layout.Header')

@if(session('error'))
    <p class="bg-green-500">{{ session('error') }}</p>
@endif
@if(session('Sucess'))
    <p class="bg-green-500">{{ session('Sucess') }}</p>
@endif
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
            <div class="flex justify-center mb-8">
                <img src="Messenger.png" alt="Logo" class="w-30 h-20">
            </div>
            <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Messenger</h1>
            @csrf
            <form action="{{route('Auth')}}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        required>
                    <!--<a href="#" class="block text-right text-xs text-cyan-600 mt-2"> Forgot Password?</a>-->
                </div>
                <button type="submit"
                    class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-black py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mt-4 mb-6">Log
                    in</button>
            </form>
            <div class="text-center">
                <p class="text-sm">Don't have account? <a href="{{route('SignUp')}}" class="">Sign up here</a></p>
            </div>
        </div>
    </div>
</body>

</html>
