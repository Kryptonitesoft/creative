# Creative

Creative is training center management system for publishing tutorials, slides, exam result and organize quiz.

## Features

* Automate entire management system
* Online admission(Apply)
* Publish result in online
* Publish education equipment in online
* File manager, upload, delete, edit.
* Store exam and results.
* Admission applicant
* Faculty add system
* Admin dashboard

## Prerequisites

* PHP >= 5.4, PHP < 7
* Mcrypt PHP Extension
* OpenSSL PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension

## Installing

* `install composer form https://getcomposer.org`
* `git clone https://github.com/Kryptonitesoft/creative projectname`
* `cd projectname`
* `composer install`
* `php artisan key:generate`
*  create a database and inform *.env*
* `php artisan migrate` to create tables
* `php artisan db:seed` to populate tables
* `php artisan user:create` to create admin user

## Built With

* [Bootstrap](http://getbootstrap.com) for CSS and jQuery plugins.
* [AngularJS](https://angularjs.org/) as JavaScript Framework.
* [Textangular](http://textangular.com/) as blog editor.

## Enjoy

```
php artisan serve
```
## Admin Views

Go to: `/login` to login.

## Contributing

Please read [CONTRIBUTING.md](https://github.com/Kryptonitesoft/creative/blob/master/CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning.

## Authors

* **Joynal Abedin** - *Backend development* - [Joynal](https://github.com/joynal)
* **Sabbir Rahman** - *Frontend development* - [Sabbir](https://github.com/sabbirrahman)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details