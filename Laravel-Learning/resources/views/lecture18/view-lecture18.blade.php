<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="build/assets/styles.css"> --}}
    @include('asset.css')
</head>

<body>
    @include('partials.header')

    <main>
        <div class="container sm:container md:container lg:container xl:container 2xl:container mx-auto p-4">
            <form action="/sent-request?query-string=khang" method="POST">
                <!-- Ghi đè phương thức -->
                @method('POST')

                <!-- Chống tấn công xss -->
                {{ csrf_field() }}

                <div class="grid grid-cols-2 gap-2 mb-4">
                    <!-- Input field -->
                    <div class="mb-2">
                        <label for="username" class="block text-gray-700 text-sm font-bold">Họ và tên</label>
                        <input type="text" id="username" name="username" placeholder="Nhập họ và tên" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" require />
                        <span class="block text-sm font-bold">{{ old('username') }}</span> {{-- dùng để trả giá trị cũ từ session --}}
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
                        <label for="category" class="block text-gray-700 text-sm font-bold">Danh mục</label>
                        <select id="category" name="category" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="show-all">Show Toàn Bộ Data</option>
                            <option value="show-name">Show Data Tên</option>
                            <option value="show-method">Kiểm Tra Phương Thức Gửi</option>
                            <option value="show-path">Show Đường Dẫn</option>
                            <option value="show-with-only">Show Data Với Only</option>
                            <option value="show-with-input">Show Data Với Input</option>
                            <option value="show-with-collection">Show Data Với Collection</option>
                            <option value="show-ip">Show IP</option>
                            <option value=""> ==== Laravel 8 ====</option>
                            <option value="current-url">Show url hiện tại (bao gồm cả domain)</option>
                            <option value="current-full-url">Show url hiện tại (bao gồm cách tham số sau ?param= )</option>
                            <option value="method">Show phương thức hiện tại</option>
                            <option value="current-header">Show user-agent của reuquest.</option>
                            <option value="query-string">Show query string.</option>
                            <option value="query-string-name">Show query string name.</option>
                            <option value="has-name">Check username.</option>
                            <option value="flash-name">Flash username.</option>
                        </select>
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

{{-- <script src="build/assets/app.js"></script> --}}
{{-- <script src="build/assets/main.js"></script> --}}
@include('asset.script')

</html>
