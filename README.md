<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>




## Project installation

- #cd project
- #run composer install
- #change .env.example to .env
- #Run php artisan key:generate
- #Run php artisan migrate

## Notes
- to add first admin Follow the following steps:
- create user from sign up
- go to database and edit these fields:is_admin=1 , is_active=1
  
## Description

- Admin:
  
1- Users Management Page (Default Page):
‐ Delete user account.
‐ Edit user data.
‐ Disable user account.
‐ Enable user account.
‐ Bulk disable user accounts.
‐ Bulk enable user accounts.
‐ View admin accounts (Default Page).
‐ Profile button for the admin.
‐ Logout button.
‐ Button to navigate to the Product Management page.

2- Products Management Page:
‐ Delete product.
‐ Add product.
‐ Edit product.
‐ Search for a product.
‐ View users interested in this product.
‐ View product details.


- User:
‐ Create a new account (disabled by default).
‐ Log in and wait for account activation by the admin.
‐ User page: Display products with a button to view product details.
‐ Button "Interested" to add the product to the user's interests.
‐ Button to cancel user's interest in the product.
‐ Profile button.
‐ Logout button.

