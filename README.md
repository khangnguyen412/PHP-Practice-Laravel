============================================
## Practice Laravel
- Descripttion: Project Laravel for practice and research with the Laravel Framework
- Purpose: For learning and researching Laravel deeper, this project recorded my learning process.

============================================
## Technology in project:
- Language: HTML, CSS, PHP, JS
- Tailwind
- Docker
- Laravel

============================================
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
- Start project 2nd time onwards with the command below:
```
.\start-laravel.bat
```
- Use terminal in docker:
```
docker exec -it Laravel-App bash
```