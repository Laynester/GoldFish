![GoldFish](https://imgur.com/TUv8HNu.png)

## What is Goldfish CMS?
Goldfish CMS is a Habbo retro CMS built to allow you to setup your retro easily but without sacrifising features or the habbo feeling.


* Goldfish refactored is an edit and update of the original Goldfish, with permission from Laynester i decided to start the Goldfish refactored project which is a project that aims to refactor and update the Goldfish cms.

* The project is a side project and I only work on it when I have time, and theres still a lot of code that has been left untouched currently.

## Who made Goldfish CMS?
Goldfish CMS was originally made by [Laynester](https://github.com/Laynester/GoldFish)

## What does Goldfish CMS offer?
Goldfish CMS offers a modern and industry approved backend, featuring the PHP framework Laravel.

It offers the features that you'd normally expect from a Habbo retro CMS, the CMS also includes a custom built housekeeping, to manage different aspects of your hotel.

**What technologies is being used?**
- Laravel 8.x (Latest as of August 2021)
[Laravel docs](https://laravel.com/docs/8.x).
- Bootstrap 5
[Bootstrap docs](https://getbootstrap.com/docs/5.0/getting-started/introduction/).

## Setup guide
To setup Goldfish CMS you'll need the following:
- Clone this repository to your wanted destination
- PHP 7.4
- Composer
- NPM
- An Arcturus Morningstar database

After all of the above has been installed you've to do the following:
- Open CMD, head to your CMS path and run the commands listed below
```
composer install
npm install && npm run dev
```

Once the above commands has been executed, go to your CMS folder and create a file called .env and copy the content of the .env-example file into your .env file, then edit database details to fit yours. Once that has been done run the following commands:

```
php artisan key:generate
php artisan migrate --seed
```

If all of the above steps has been done correctly / successfully, you should be prompted with an easy to follow installation process, once that has been finished, your CMS should be ready to use!
