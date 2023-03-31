## Laravel Starter Code
Mini laravel starter code with admin templates (SBAdmin)

----------

#### Steps
```javascript
git clone https://github.com/kmmaniez/laravel-starter.git

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

##### Package Depedency Lists
1. [Sweetalert2](https://realrashid.github.io/sweet-alert/)
2. [Spatie Permission](https://spatie.be/docs/laravel-permission/v5/introduction)
3. [Yajra DataTables](https://yajrabox.com/docs/laravel-datatables/10.0)
4. [DomPDF](https://github.com/barryvdh/laravel-dompdf)

This project **has 3 simple features**, that is CRUD for post,category and product. 

The main different is product using **UUID**, category using **ID**, you'll know it later after read and test the app.

Wanna add some features or depedencies? or integrate with front-end framework? feels free to pull request :D