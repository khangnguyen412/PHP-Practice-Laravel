cd .\Laravel\Laravel-Learning\
:: docker compose up -d  
docker restart Laravel-App
docker exec Laravel-App php artisan serve --host=0.0.0.0 --port=8000
