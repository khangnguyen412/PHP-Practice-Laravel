<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="build/assets/app-BaVMVknW.css">
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

                    <!-- Primary Nav -->
                    <ul class="hidden md:flex items-center space-x-1">
                        <li class="py-5 px-3 text-gray-700 hover:text-gray-900">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="py-5 px-3 text-gray-700 hover:text-gray-900">
                            <a href="/about">Giới thiệu</a>
                        </li>
                        <li class="py-5 px-3 text-gray-700 hover:text-gray-900">
                            <a href="/services">Dịch vụ</a>
                        </li>
                        <li class="py-5 px-3 text-gray-700 hover:text-gray-900">
                            <a href="/contact">Liên hệ</a>
                        </li>
                    </ul>

                    <!-- Mobile Button -->
                    <div class="md:hidden flex items-center">
                        <button class="mobile-menu-button p-2 bg-white rounded-lg shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </nav>
        <div class="md:hidden sidebar fixed left-0 top-0 h-full w-64 bg-white shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-40">
            <div class="p-4">
                <!-- Logo -->
                <div class="mb-8">
                    <a href="/" class="flex items-center text-blue-600">
                        <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        <span class="font-bold text-xl">Logo</span>
                    </a>
                </div>

                <!-- Navigation Menu -->
                <nav>
                    <ul class="space-y-2">
                        <li class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <a href="/"> Trang chủ </a>
                        </li>
                        <li class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <a href="/"> Trang chủ </a>
                        </li>
                        <li class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg">
                            <a href="/"> Trang chủ </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container sm:container md:container lg:container xl:container 2xl:container mx-auto p-4">
            <form action="/video-38-submit" method="POST">
                <!-- Input field -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Họ và tên</label>
                    <input type="text" id="username" name="username" placeholder="Nhập họ và tên" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>

                <!-- Email field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>

                <!-- Password field -->
                <div class="mb-4">
                    <label for="city" class="block text-gray-700 text-sm font-bold mb-2">Thành Phố</label>
                    <input type="texy" id="city" name="city" placeholder="Nhập Thành Phố" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                </div>

                <!-- Submit button -->
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Đăng ký
                </button>
            </form>
        </div>

        <% JSON.stringify(data) %>
        <div class="container sm:container md:container lg:container xl:container 2xl:container mx-auto p-4">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">City</th>
                            <th scope="col" class="px-6 py-3">Column 5</th>
                            <th scope="col" class="px-6 py-3">Column 6</th>
                        </tr>
                    </thead>
                    <tbody>
                        <% data.forEach(item => { %>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                <%= item.id %>
                            </td>
                            <td class="px-6 py-4">
                                <%= item.username %>
                            </td>
                            <td class="px-6 py-4">
                                <%= item.email %>
                            </td>
                            <td class="px-6 py-4">
                                <%= item.city %>
                            </td>
                            <td class="px-6 py-4">
                                <a class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                    Update
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <% }); %>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="build/assets/app-But0Grfk.js"></script>
<script src="build/assets/main.js"></script>
<script src="build/assets/sidebar.js"></script>

</html>