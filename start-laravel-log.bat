@REM Vào đường dẫn
cd "%USERPROFILE%\Desktop\Practice Laravel"
cd .\Laravel-Learning\

@REM Lấy log 
Get-Content storage/logs/laravel.log -Wait -Tail 30 -Encoding UTF8