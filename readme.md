![GoldFish](https://imgur.com/TUv8HNu.png)

## What is Goldfish CMS?
GoldFish is a Content Management System (CMS) imade for Habbo retros. It is built to allow you to set up your retro easily but without sacrificing features or the habbo feeling.

## Who made Goldfish CMS
Goldfish CMS was originally made by [Laynester](https://github.com/Laynester/GoldFish)

## What is Goldfish Refactored
Goldfish refactored is an edit and update of the original Goldfish, with permission from Laynester. I (Object) decided to start the Goldfish refactored project which is a project that aims to refactor, update and maintain the Goldfish CMS.

The project is only a side project of mine, and I only work on it when I have the time to do so. There's still a lot of code that has been left untouched currently.

**As the project is still WIP (Work In Progress) some parts may be buggy or not working at all - Once I feel like the project is complete enough, I'll publicly release it. You're ofcourse allowed to use this already, as it's a public repository.**

## What does Goldfish CMS offer?
Goldfish CMS offers a modern and industry approved backend, featuring the PHP framework Laravel and support for the most recent PHP version (PHP 8.1).

Besides the above it also offers a ton of features, most which you'd normally expect from a retro CMS, and even comes with its own theme system, that allows you to build your own themes, may it be with TailwindCSS, Bootstrap, Bulma, Custom CSS - you name it!

**What technologies is being used?**
- Laravel 8.x (Latest as of January 2022)
  [Laravel docs](https://laravel.com/docs/8.x).
- Bootstrap 5
  [Bootstrap docs](https://getbootstrap.com/docs/5.0/getting-started/introduction/).

## Setup guide
To install Goldfish CMS you'll need to do the following:
- PHP 7.4 or above (PHP 8.1 is supported) [PHP Downloads](https://www.php.net/downloads.php)
- Composer [Composer Download](https://getcomposer.org/download/)
- NPM [Node Download](https://nodejs.org/en/download/)
- An Arcturus Morningstar database [Database repository](https://git.krews.org/morningstar/arcturus-morningstar-base-database)

After all of the above has been installed you've to do the following:
- Open CMD and navigate into the path you want the CMS to be located at, and run the commands listed below
```
git clone https://github.com/ObjectRetros/GoldFish.git
cd GoldFish
For Windows: copy .env.example .env
For Linux: cp .env.example .env
composer install
npm install && npm run dev
php artisan key:generate
php artisan migrate --seed
```

If all of the above steps has been done correctly / successfully, you should be prompted with an easy to follow installation process, once that has been finished, your CMS should be ready to use!
