# Tugas Laravel PBP

- Maulana Zia Ul Haq      (24060119140084)
- Muhammad Keenan F       (24060119130052)
- Irfaan Abiyyu Annas     (24060119140063)
- Rashif Dhafin Fairiza   (24060119140079)
- Giffari Agza Fahlevi    (24060119140082)

# Installing tutorial
This tutorial was originally created by M Naufal Pratama  

## Prerequisites

Download composer for managing PHP dependencies (which Laravel is PHP) in here

```
https://getcomposer.org/Composer-Setup.exe
```

<br>after installed, check it by using commandline and type

```
composer
```

<br>if you're not getting any error message and composer shows its version, than it's completely installed

<br>

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
- DB_DATABASE=miniprojectperpus

In the example above we create database named miniprojectperpus which runs on Localhost (127.0.0.1) on port 3306

##### 5. Generate key
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
