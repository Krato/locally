# Laravel 5 User Preferred Localization
This package allows users to set the prefered site localization. Locales are based on ISO 639-1 standard.
It automatically switch the site langage to the user preference. All you have to do is install it and set a locale for the user.
## Installation
You can install the package via composer
``` 
composer require smartisan/locally
```
Then you must configure the service provider by adding this in config/app.php
```
'providers' => [
  ...
  Smartisan\Locally\LocallyServiceProvider::class,
];
```
Also, add the middleware to web group in Kernel.php
```
'web' => [
            ...
            \Smartisan\Locally\Http\Middlewares\LocallyMiddleware::class
        ],
```
And you must publish the migrations
```
php artisan vendor:publish --provider="Smartisan\Locally\LocallyServiceProvider" --tag="migrations"
```
Do not forget to migrate your tables
```
php artisan migrate
```
Finally, add the package trait in your User model.
```
class User
{
    use LocallyTrait;
}
```
Optionally, you can add a Laravel Facade and alias for it in config/app.php
```
'aliases' => [
  ...
  'Locally'   => \Smartisan\Locally\Facades\Locally::class
];
```
## Usage
### Set User Locale
If given language code is not exists, an exception will be thrown.
```
$user->setLocale('en');
```
### Get User Prefered Locale
If user local is not set, the system default locale will be returned.
```
$user->getLocale(); //en
```
### Remove User Prefered Locale
```
$user->removeLocale();
```
### Supported Locales
An array of supported locales will be returned by scanning resources/lang folder.
```
Locally::getSupportedLocales();
```
### Get Language Code / Name
Two helper functions to get language code or name
```
Locally::getLanguageCodeByName('english'); //en
Locally::getLanguageNameByCode('en'); //English
```
## License
The MIT License (MIT). Please see [License File](https://github.com/mohd-isa/locally/blob/master/LICENSE) for more information.
