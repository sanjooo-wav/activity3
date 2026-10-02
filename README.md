# POS System

## How to Run

1. Put this folder inside `C:\xampp\htdocs`.
2. Open XAMPP and start Apache and MySQL.
3. Open `http://localhost/phpmyadmin`.
4. Import the file `database/pos_database_act3.sql`.
5. Open `http://localhost/act3/public/`.

## Avatar Upload

Go to Users and click Edit. Choose a JPG or PNG image that is smaller than 2MB.

If avatar upload does not work, enable `gd`, `intl`, and `mysqli` in PHP and restart Apache.