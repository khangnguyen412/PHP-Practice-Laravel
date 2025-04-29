@REM Vào đường dẫn
cd "%USERPROFILE%\Desktop\Practice Laravel"
cd .\Laravel-Learning\

@REM Xoá các img cũ (chỉ lần cài đặt đầu tiên)
@REM không nên chạy system prune nếu còn những lưu container khác
@REM docker system prune -a -f 
@REM docker image prune -a -f
@REM docker volume prune -a -f

@REM Chạy docker-compose (chỉ lần cài đặt đầu tiên)
@REM docker compose up -d

@REM Cài composer (chỉ lần cài đặt đầu tiên)
@REM docker exec Laravel-App composer install

@REM Chạy migrate cho source (chỉ lần cài đặt đầu tiên, cấu hình file .env trước khi chạy, nếu muốn tạo ra các bảng cần thiết)
@REM docker-compose exec app php artisan migrate

@REM :: Khởi động project
docker restart Laravel-App Laravel-Webserver Laravel-Sql
docker exec Laravel-App php artisan serve --host=0.0.0.0 --port=8000