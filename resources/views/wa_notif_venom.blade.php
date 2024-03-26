<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 p-4">
        @if(Session::has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Kesalahan!</strong>
            <span class="block sm:inline">{{ Session::get('error')}}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">Pesan Anda berhasil dikirim.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </span>
        </div>
        @endif
        <div class="max-w-md mx-auto bg-white rounded p-8 shadow-md">
            <h2 class="text-2xl font-bold mb-4">Kirim Pesan WhatsApp</h2>
            <form action="{{ Route('send_by_venom')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="message" class="block text-sm font-semibold text-gray-600 mb-2">Pesan:</label>
                    <textarea id="message" name="message" rows="4" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-400" placeholder="Masukkan pesan Anda"></textarea>
                </div>
                <div class="mb-4">
                    <label for="number" class="block text-sm font-semibold text-gray-600 mb-2">Nomor WhatsApp:</label>
                    <input type="text" id="number" name="number" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-400" placeholder="Masukkan nomor WhatsApp penerima">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-blue-300">Kirim</button>
                </div>
            </form>
        </div>
    </body>
</html>