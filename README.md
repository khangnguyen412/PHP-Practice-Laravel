============================================
## Practice Laravel
- Descripttion: Project Laravel for practice and research with Lavaravel Framework
- Purpose: for learning and reasearching laravel deeper, this was recorded my learning process

============================================
## Technology in project:
- Language: HTML, CSS, Php, Js
- Tailwind
- Docker
- Laravel

============================================
## How to start and testing project
### Start with xampp, wamp (don't need install docker desktop) 
- Start project with cmd: 
```Bash
    php artisan serve
```

### Start with docker (don't need install xampp, wamp) 
- Install docker desktop first
- Use cmd in this path
- Start project with the command below (just the first time): 
```Bash
    cd .\Laravel-Learning\
    docker compose up -d
    docker exec Laravel-App php artisan serve --host=0.0.0.0 --port=8000
```
- Start project 2nd time onwards with the command below:
```Bash
    .\start-laravel.bat
```
- Use terminal in docker:
```Bash
    docker exec -it Laravel-App bash
```