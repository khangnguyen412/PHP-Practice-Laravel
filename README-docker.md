+ Chạy docker compose build Dockerfile
    docker-compose build
+ Chạy các gói service 
    docker-compose up -d
+ Chạy composer 
    docker exec Laravel-App php artisan serve --host=0.0.0.0 --port=8000 
    - --port=8000 start trên :8000 nhưng tại service Laravel-App trong file docker-compose.yml forward :81
    - --host=0.0.0.0 lắng nghe tất cả các port bên ngoài vào
+ Kết laravel tới mysql của docker
    Cách 1 (trường hợp ip ko thay đổi):
    - Vào CMD chay ipconfig lấy [ipv4]
    - DB_HOST=[ipv4] => được lấy từ ip máy chủ của laptop (127.0.0.0 hay localhost sẽ ko kết nối được)
    - Tham khảo: https://laracasts.com/discuss/channels/laravel/dock-laravel-sqlstatehy000-2002-connection-refused
    Cách 1 (trường hợp ip thay đổi):
    - DB_HOST=[tên-service] => thường tên của service là mysql
    - DB_PORT=3306 => port được cấu hình trong docker, ko phải port forward ra bên ngoài