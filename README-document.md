#  Các tài liệu khác
- Database mẫu: https://openplanning.net/10235/co-so-du-lieu-mysql-mau-de-hoc-sql

#  Video và các hướng dẫn tạo và chạy dự án
- laravel: https://www.youtube.com/watch?v=XjzNR11gvQI&list=PLsVJaIeVT78qJEPWJ9rIwgPCcmuVI-r4k&index=2&t=64s

### Lecture01: giới thiệu về khóa học

### Lecture02: giới thiệu chung

### Lecture03: cài đặt xampp

### Lecture04: cài đặt php storm (chạy trên visual code ko cần cài)

### Lecture05: cài đặt composer (frame work laravel) 
- tham khảo: https://www.youtube.com/watch?v=Osf5WuNs1Bg&list=PLsVJaIeVT78qJEPWJ9rIwgPCcmuVI-r4k&index=5

### Lecture06: cài đặt git

### Lecture07: tạo laravel project
- tạo dự án
```
composer create-project --prefer-dist laravel/laravel tên-dự-án
```
- chạy dự án
```
php artisan serve
```
- hoặc dùng xampp vào thư mục public của dự án
- Lưu ý nếu gặp lỗi khi tạo project: Could not fetch https://api.github.com/.../, please review your configured GitHub OAuth token or enter a new one to access private repos
```
composer config --global --unset github-oauth.github.com
```
- sử dụng lệnh này để gỡ lỗi rồi tạo lại

### Lecture08: virtual host (chạy host trên http://127.0.0.1:8000)

### Lecture09: mở dự án trong PHP storm (chạy trên visual code)


# Tự học laravel qua tài liệu
- link tài liệu laravel 5.3: https://toidicode.com/hoc-laravel
- link tài liệu laravel 8: https://toidicode.com/series/hoc-laravel-8


##  laravel 5.3
### Lecture01: giới thiệu laravel

### Lecture02: cấu trúc thư mục của laravel

### Lecture03: routes 
ghi chú bài học:
- /route/web.php

### Lecture04: routes2 
ghi chú bài học:
- /route/web.php
- /app/Http/Controllers/Lecture04/testResourceRote.php

### Lecture05: routes3
ghi chú bài học:
- /route/web.php

### Lecture06: view
ghi chú bài học:
- /route/web.php
- /app/Providers/AppServiceProvider.php

### Lecture07: blade template
ghi chú bài học:
- /route/web.php
- /resources/views/lecture07/testViewEngine.blade.php

### Lecture08: blade template part2
ghi chú bài học:
- /route/web.php
- /resources/views/lecture08/testViewTemplateInheritance.blade.php
- /resources/views/lecture08/parentTemplate.blade.php

### Lecture09: controller
ghi chú bài học:
- /route/web.php
- /app/Http/Controllers/Lecture09/controllerLecture09

### Lecture10: Query Builder trong Laravel
ghi chú bài học:
- /route/web.php
- /.env

### Lecture11: Model trong Laravel
ghi chú bài học:
- /route/web.php
- /app/Models/lecture11.php

### Lecture12: Eloquent ORM trong Laravel
add database: https://www.fundaofwebit.com/laravel-8/how-to-insert-data-in-laravel-8   
get current url: https://stackoverflow.com/questions/17591181/how-to-get-the-current-url-inside-if-statement-blade-in-laravel-4  
check data exist: https://stackoverflow.com/questions/27095090/laravel-checking-if-a-record-exists  
ghi chú bài học:
- /route/web.php
- /app/Models/lecture11.php
- /app/Http/Controllers/Lecture12/ControllerLecture12.php

### Lecture13: Các mối quan hệ (Relationships) trong Eloquent
ghi chú bài học:
- /route/web.php
- /app/Models/modelLure13.php
- /app/Http/Controllers/Lecture12/ControllerLecture13.php

### Lecture14: Collection trong Laravel
ghi chú bài học:
- /routes/learning/part-7-collection.php
- /app/Http/Controllers/Lecture14/controllerLecture14.php
- /app/Models/lecture12/ModelLecture12.php

### Lecture15-16: Schema
ghi chú bài học:
- /routes/learning/part-8-database.php
- /database/migrations

### Lecture17: Seeding
ghi chú bài học:
- /routes/learning/part-8-database.php
- /database/seeders

### Lecture18: Form Request
ghi chú bài học:
- /routes/learning/part-9-form-request.php
- /app/Http/Controllers/Lecture18/controllerLecture18.php
- /resources/views/lecture18-19-20/view-lecture18.php

### Lecture19: Upload files trong Laravel
ghi chú bài học:
- /routes/learning/part-9-form-request.php
- /app/Http/Controllers/Lecture19/controllerLecture19.php
- /resources/views/lecture18-19-20/view-lecture19.php

### Lecture20: Validation trong Laravel
ghi chú bài học:
- /routes/learning/part-9-form-request.php
- /app/Http/Controllers/Lecture20/controllerLecture20.php
- /resources/views/lecture18-19-20/view-lecture20.php

### Lecture21: Form Request Validation trong Laravel
ghi chú bài học:
- /routes/learning/part-9-form-request.php
- /app/Http/Requests/lecture21/RequestForm21.php

### Lecture22 23 24: Authentication trong Laravel
ghi chú bài học:
- /routes/learning/part-10-authentication.php

### Lecture25: Middleware trong Laravel
ghi chú bài học:
- /routes/learning/part-11-middleware.php
- /app/Http/Kernel.php
- /app/Http/Middleware/Lecture25/Middleware25.php
- /app/Http/Controllers/Lecture25/ControllerLecture25.php

### Lecture26: Debugbar trong laravel
ghi chú bài học:
- /routes/learning/part-12-other.php
- /app/Models/lecture26/ModelLecture26.php
- /app/Http/Controllers/Lecture26/ControllerLecture26.php

### Lecture27: Directives hữu dụng trong blade template
(ko có ghi chú, vì frontend sẽ xử dụng nextJS ko dùng blade template)


##  laravel 8.0 (bổ sung cho laravel 5.0)
### Lecture03 04 05: Routes 
ghi chú bài học:
- /routes/learning/part-1-route.php

### Lecture06 07 08 09 10 11: Blade template
ghi chú bài học:
- /routes/learning/part-2-template.php
- /resources/views/lecture06/view-template.blade.php
- /resources/views/lecture06/view-template(child-01).blade.php
- /resources/views/lecture06/view-template(child-02).blade.php

### Lecture12 13 14: Request
ghi chú bài học:
- /app/Http/Controllers/Lecture18/ControllerLecture18.php
- /routes/learning/part-9-form-request.php
- /resources/views/lecture18/view-lecture18.blade.php

### Lecture15: Response
ghi chú bài học:
- /app/Providers/RouteServiceProvider.php
- /app/Http/Controllers/Lecture24/ControllerLecture24Ext.php
- /routes/learning/part-12-other.php

### Lecture16: Middleware
ghi chú bài học:
- /app/Http/Kernel.php
- /app/Http/Middleware/LectureExtension/MiddlewareExt16.php
- /routes/learning/part-11-middleware.php

### Lecture17: Controller
ghi chú bài học:
- /app/Providers/RouteServiceProvider.php
- /routes/learning/part-3-controller.php

### Lecture18: Url 
ghi chú bài học:
- /app/Providers/RouteServiceProvider.php
- /routes/learning/part-12-other.php
- /resources/views/lectureext/view-lecture26.blade.php

### Lecture19: Session 
ghi chú bài học:
- /app/Providers/RouteServiceProvider.php
- /routes/learning/part-ext-19-session.php

### Lecture20 21: Validation
ghi chú bài học:
- /app/Providers/RouteServiceProvider.php
- /app/Http/Requests/LectureExt/RequestFormExt.php
- /app/Rules/ValidCustomRule.php
- /routes/learning/part-ext-21-validation.php

### Lecture22: Xử lý lỗi
ghi chú bài học:
- /app/Providers/RouteServiceProvider.php
- /routes/learning/part-ext-22-exception.php

### Lecture23: Collection
ghi chú bài học:
- /app/Http/Controllers/Lecture14/controllerLecture14.php
- /routes/learning/part-7-collection.php

### Lecture24: Database
ghi chú bài học:
- /routes/learning/part-8-database.php

### Lecture25: Query Builder
ghi chú bài học:
- /routes/learning/part-4-query-builder.php

### Lecture26: Pagination
ghi chú bài học:
- /routes/learning/part-ext-26-pagination.php

### Lecture30: Query với Eloquent
ghi chú bài học:
- /routes/learning/part-ext-30-query-eloquent.php

### Lecture31: Scope
ghi chú bài học:
- /routes/learning/part-ext-31-query-scope.php
- /app/Http/Controllers/Lecture30/ControllerLecture30.php
- /app/Models/lecture26/ModelLecture26.php
- /app/Scopes/UsersScope.php

### Lecture31: Event
ghi chú bài học:
- /routes/learning/part-ext-32-query-event.php
- /app/Http/Controllers/Lecture32/ControllerLecture32.php
- /app/Models/lecture32/ModelLecture32.php
- /app/Providers/AppServiceProvider.php
- /app/Observers/Observer.php

### Lecture32 33 34: Eloquent
ghi chú bài học:
- /routes/learning/part-6-eloquent.php
- /app/Http/Controllers/Lecture13/controllerLecture13.php
- /app/Models/lecture13/ModelLecture13Post.php
- /app/Models/lecture13/ModelLecture13Media.php
- /app/Models/lecture13/ModelLecture13CatePost.php

### Lecture35: Collection Eloquent
ghi chú bài học:
- /routes/learning/part-6-eloquent.php
- /app/Http/Controllers/Lecture13/controllerLecture13.php

### Lecture36: Mutator và Cast
ghi chú bài học:
- /routes/learning/part-6-eloquent.php
- /app/Http/Controllers/Lecture13/controllerLecture13.php
- /app/Models/lecture13/ModelLecture13Users.php

### Lecture37: Eloquent ORM Serialize
ghi chú bài học:
- /routes/learning/part-6-eloquent.php
- /app/Http/Controllers/Lecture13/controllerLecture13.php


### Lecture: Other
ghi chú bài học:
- /routes/learning/part-ext-other.php