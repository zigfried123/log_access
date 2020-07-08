1. composer install.
2. Прописать свои настройки соединения с бд в файле /web/protected/config/database.php. 
3. Создать бд с указанным именем.
4. php yiic migrate up. Добавится тестовый юзер. Вход admin 123456.
5. Добавить в файл web/protected/config/params.php путь к файлу access логов
6. Для запуска консольной команды парсера ACCESS логов: php yiic apacheLogger logAccess

