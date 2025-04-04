<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('build/assets/styles.css') }}" rel="stylesheet">
</head>

<body>
    <header class="bg-white">
        <nav class="bg-white shadow-lg">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between">
                    <!-- Logo -->
                    <div class="flex space-x-4">
                        <a href="/" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                            <svg class="h-6 w-6 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            <span class="font-bold">MyWebsite</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container sm:container md:container lg:container xl:container 2xl:container mx-auto p-4">
            <!-- enctype="multipart/form-data": mới gửi được file -->
            <form action="/sent-valid" method="POST" enctype="multipart/form-data">
                <!-- Ghi đè phương thức -->
                @method('POST')

                <!-- Chống tấn công xss -->
                @csrf

                <div class="grid grid-cols-2 gap-2 mb-4">
                    <!-- Input field -->
                    <div class="mb-2">
                        <label for="username" class="block text-gray-700 text-sm font-bold">Họ và tên</label>
                        <input type="text" id="username" name="username" placeholder="Nhập họ và tên" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" require />
                    </div>

                    <!-- Email field -->
                    <div class="mb-2">
                        <label for="email" class="block text-gray-700 text-sm font-bold">Email</label>
                        <input type="email" id="email" name="email" placeholder="Nhập email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" require />
                    </div>

                    <!-- City field -->
                    <div class="mb-2">
                        <label for="city" class="block text-gray-700 text-sm font-bold">Số Điện Thoại</label>
                        <input type="tel" id="phone" name="phone" placeholder="Nhập Số Điện Thoại" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" require />
                    </div>
                    
                    <!-- City field -->
                    <div class="mb-2">
                        <label for="city" class="block text-gray-700 text-sm font-bold">Thành Phố</label>
                        <input type="text" id="city" name="city" placeholder="Nhập Thành Phố" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" require />
                    </div>
                </div>

                <!-- Submit button -->
                <div class="flex justify-end mt-4">
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Đăng ký
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('build/assets/app.js') }}"></script>
<script src="{{ asset('build/assets/main.js') }}"></script>

</html>