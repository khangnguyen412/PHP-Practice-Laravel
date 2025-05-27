## Practice Laravel
- Descripttion: Project Laravel for practice and research with the Laravel Framework
- Purpose: For learning and researching Laravel deeper, this project recorded my learning process.

## Technology in project:
- Language: HTML, CSS, PHP, JS
- Tailwind
- Docker
- Laravel

## How to start and testing project
### Start with xampp, wamp (don't need install docker desktop) 
- Start project with cmd: 
```
php artisan serve
```

### Start with docker (don't need install xampp, wamp) 
- Install docker desktop first
- Use cmd in this path
- Start project with the command below (just the first time): 
```
cd .\Laravel-Learning\
docker compose up -d
docker exec Laravel-App composer install
docker exec Laravel-App php artisan serve --host=0.0.0.0 --port=8000
```
- On window, start project 2nd time onwards with the command below:
```
.\start-laravel.bat
```
- On linux vs Macos:
```
.\start-laravel.sh
```
- Use terminal in docker:
```
docker exec -it Laravel-App bash
```

## Project structure 
```
Laravel/
├──Laravel-Learning/
│   ├── app/               # Thư mục chứa code ứng dụng
│   │   ├── Http/          # Các file HTTP (Controllers, Requests, etc.)
│   │   ├── Providers/     # Các service provider
│   │   └── ...
│   ├── bootstrap/         # File khởi tạo ứng dụng
│   ├── config/            # Các tệp cấu hình
│   ├── database/          # Cấu trúc cơ sở dữ liệu và migration
│   ├── lang/              # Các tệp ngôn ngữ
│   ├── nginx.conf.d       # Cấu hình Nginx
│   ├── node_modules/      # Thư viện phụ thuộc Node.js
│   ├── public/            # Tài nguyên công khai (CSS, JS, images)
│   ├── resources/         # Tài nguyên nguồn (views, assets, etc.)
│   ├── routes/            # Định nghĩa các route
│   ├── storage/           # Lưu trữ tạm thời và lưu trữ lâu dài
│   ├── tests/             # Test case
│   ├── vendor/            # Thư viện Composer
│   ├── .dockerignore      # Danh sách bỏ qua khi build Docker
│   ├── .editorconfig      # Cấu hình editor
│   ├── .env               # Biến môi trường
│   ├── .env.docker        # Biến môi trường cho Docker
│   ├── .env.example       # Mẫu biến môi trường
│   ├── .gitattributes     # Thuộc tính Git
│   ├── .gitignore         # Danh sách bỏ qua commit lên Git
│   ├── artisan            # CLI của Laravel
│   ├── composer.json      # Tệp cấu hình Composer
│   ├── composer.lock      # Composer dependencies
│   ├── docker-compose.yml # Tệp cấu hình Docker Compose
│   ├── Dockerfile         # File cấu hình Docker
│   ├── package-lock.json  # Tệp khóa npm
│   ├── package.json       # Tệp cấu hình npm
│   ├── phpunit.xml        # Cấu hình PHPUnit
│   ├── postcss.config.js  # Cấu hình PostCSS
│   ├── README.md          # Hướng dẫn đọc me
│   ├── tailwind.config.js # Cấu hình Tailwind CSS
│   └── vite.config.js     # Cấu hình Vite
├── Laravel-Mysql/
│   ├── MySQL-Database-Example.sql
│   ├── MySQL-Database-Rework-Data.sql
│   ├── MySQL-Database-Rework.sql
│   ├── MySQL-Query-Example.sql
│   └── MySQL-Query-Rework.sql
├── .gitignore         # Danh sách bỏ qua commit lên Git
├── README-docker.md   # Hướng dẫn đọc về Docker
├── README-document.md # Hướng dẫn đọc về tài liệu
├── README-video.md    # Hướng dẫn đọc về video
├── README.md          # Hướng dẫn đọc chính
├── start-laravel.bat  # Script khởi động dự án (Windows)
└── start-laravel.sh   # Script khởi động dự án (Linux/Mac)
```