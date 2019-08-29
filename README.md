# Hungry Fox API

**React App project:** [click](https://github.com/KongoPL/Hungry-Fox)

Simple API created with [Yii 2.0 framework](https://www.yiiframework.com/).

API is very simple, and could be written better, but I wanted to focus on React App instead of polishing API.
However, nice thing was to design translations for DB data - I created `Translations` table that stores all translated values.

## Installation
* You need Composer first. [Get it here](https://getcomposer.org/)
* Open command prompt in project's directory and type `composer update`.
* Make sure database credentials are correct. You can find them in `config/db.php`
* just type `yii migrate`
* If you don't have any web server just type `yii serve` to run one!

### Available actions
All actions are in `ApiController`.
Access link: `my-website.com/api/[action]`

**Actions:**
* index
* categories
* items
* coupons
* staff
* job-offers
* contact

You can also change language of returning data by sending `X-Language` header (accepted values: `en` and `pl`).

** Returned output is always JSON **
