<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dinas Luar|KPU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <!-- https://play.tailwindcss.com/MIwj5Sp9pw -->
    <div class="py-16">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
                <div class="hidden lg:block lg:w-1/2 bg-cover"
                    style="background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfr3QT3gw0Sv-54TewKGwFyz-7pDS88YS1rg&s')">
                </div>
                <div class="w-full p-8 lg:w-1/2">
                    <h2 class="text-2xl font-semibold text-gray-700 text-center">Surat Dinas Luar</h2>
                    <p class="text-xl text-gray-600 text-center">KPU KOTA BATU</p>
                    <a href="#"
                        class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-100">

                    </a>
                    @if (session('error'))
                        @include('alerts.error')
                    @endif
                    <div class="mt-4 flex items-center justify-between">
                        <span class="border-b w-1/5 lg:w-1/4"></span>
                        <a href="#" class="text-xs text-center text-gray-500 uppercase">Login</a>
                        <span class="border-b w-1/5 lg:w-1/4"></span>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                        <input name="username"
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="text" />
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        </div>
                        <input name="password"
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="password" />
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="bg-blue-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-blue-600">Login</button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="border-b w-1/5 md:w-1/4"></span>
                        <a href="#" class="text-xs text-gray-500 uppercase">or sign up</a>
                        <span class="border-b w-1/5 md:w-1/4"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
