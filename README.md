# Tugas Laravel PBP

- Maulana Zia Ul Haq      (24060119140084)
- Muhammad Keenan F       (24060119130052)
- Irfaan Abiyyu Annas     (24060119140063)
- Rashif Dhafin Fairiza   (24060119140079)
- Giffari Agza Fahlevi    (24060119140082)

### Installing tutorial
##### This tutorial was originally created by M.Naufal Pratama  

#### 1. Clone
```
git clone https://github.com/mkf450/perpusMiniProject.git
```

#### 2. Change your directory into existing perpusMiniProject directory
```
cd perpusMiniProject
```

#### 3. Install composer for running the laravel
```
composer install
```

#### 4. Copy .env.example or rename the .env.example file to .env
```
cp .env.example .env
```
Edit the configuration inside .env, for
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=anforcom

change the DB_DATABASE value into anything that you want and it will be the name of your database
#### 5. Generate key
```
php artisan key:generate
```

#### 6. Run the migration
```
php artisan migrate
```
or (optional)
```
php artisan migrate:fresh --seed
```

#### 7. Run the server
```
php artisan serve
```
