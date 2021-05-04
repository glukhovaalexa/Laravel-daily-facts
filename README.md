!! Install the app !!!

1. Clone the app - git clone https://github.com/AleksandraHlukhova/Laravel-daily-facts.git
2. Make changes into .env file - cp .env.example .env
   
   (var FACT_TIME means through how many time fact need to be changed, for testing set 1 (1 minute))
3. Install depencies - composer install / npm install
4. Filling and seeding db - php artisan migrate --seed
   
   (before seeding: for testing you can go to config/facts.php and comment the facts, leaving about 5 items)   
5. Config cron 
    - crontab -e
    - * * * * * cd /path/to-project/ && php artisan schedule:run >> /dev/null 2>&1
    
    (it means that every minute (for testing) cron need to run the programm with command schedule:run)
