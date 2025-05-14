@extends('lectureExt.view-lecture-ext')
@section('valid-lecture')
    <div class="container sm:container md:container lg:container xl:container 2xl:container mx-auto p-4">
        <!-- enctype="multipart/form-data": mới gửi được file -->
        <form action="/valid-ext" method="POST" enctype="multipart/form-data">
            <!-- Ghi đè phương thức -->
            @method('POST')

            <!-- Chống tấn công xss -->
            @csrf

            <div class="grid gap-2 mb-4">
                <!-- Input field -->
                <div class="mb-2">
                    <label for="username" class="block text-gray-700 text-sm font-bold">Họ và tên</label>
                    <input type="text" id="username" name="username" placeholder="Nhập họ và tên" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" require />
                </div>
            </div>

            <!-- Submit button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Đăng ký
                </button>
            </div>
        </form>

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
