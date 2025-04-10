<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('asset.css')
</head>

<body>
    @include('partials.header')

    <main>
        <div class="container sm:container md:container lg:container xl:container 2xl:container mx-auto p-4">
            <!-- enctype="multipart/form-data": mới gửi được file -->
            <form action="/sent-upload-file" method="POST" enctype="multipart/form-data">
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
                        <label for="city" class="block text-gray-700 text-sm font-bold">Thành Phố</label>
                        <input type="text" id="city" name="city" placeholder="Nhập Thành Phố" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" require />
                    </div>

                    <!-- Select field -->
                    <div class="mb-2">
                        <label for="upload" class="block text-gray-700 text-sm font-bold">Upload File</label>
                        <input type="file" id="upload" name="upload" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
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

    @include('partials.footer')
</body>

@include('asset.script')

</html>
