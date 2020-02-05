Documentation:
Standard laravel project, otherwise if You need instruction below is on linux (if You need on another system, write to me):
1. copy .env.example as .env and fullfill params for dababase:
DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
2. Open terminal, go to project directory and type:
"bash deployprod.sh"
3. type "php artisan serve" and go under given url.

How to import data:
Open terminal, go to project directory and type:
"php artisan import:job_offers"
Where to check if data imported:
Main page of application (url given in "php artisan serve").
There is hack (non good practice - only for recrutation purposes) in app/Services/ImportJobOffersJson.php to have
possibility to clear imported data.

Where to check code:
1. app/Console/Commands/ImportJobOffers.php
2. app/Services/ImportJobOffersJson.php

What could I do in another way:
But serious:
1. I could implement project in docker containers
2. I could set url for import in .env or new file in directory config.

What I tried to implement:
- Contracts,
- Repository pattern,
- PSR1 and 2,
- Eloquent
