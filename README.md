# PHP Panel

Project developed with the objective of accelerating web development using PHP without the use of fremework, the project has a login screen, dashboard, functions to add, edit and delete users, and even a settings screen with several options for site settings , is already configured to make connections to the database to add data and create tables.

----

**Menu**
- [ℹ️ Information](#information)
- [📋 Prerequisites](#prerequisites)
- [🔧 Installation](#installation)
- [🖇 Dependencies](#dependencies)
- [ℹ️ About this project](#about-this-project)
- [🛠️ Built with](#built-with)
- [👥 Authors](#authors)
- [👥 Colaboradores](#collaborators)
- [📝 Changelog](#changelog)
- [🎁 Expressions of gratitude](#expressions-of-gratitude)
- [🔗 Useful links](#useful-links)

----

## ℹ️ <a id="information">Information</a>
- **Tags:** php, login, panel, dashboard
- **License:** MIT License
- **License URI:** [License](./LICENSE)

----

## 📋 <a id="prerequisites">Prerequisites</a>
- **PHP** 8.0 or superior

----

## 🔧 <a id="installation">Installation</a>
 - **First step:** Download the project by opening the zip file, or using the command below::
 ```
    git clone https://github.com/rafaeldevcode/php-panel.git
 ```

 - **Second step:** Install PHP dependencies:
 ```
    composer install
 ```

 - **Third step:** Install the JavaScript dependencies (Used only for development environment):
 ```
    npm install
 ```
 - **Fourth step:** Copy the .env.example file and rename it to .env;
 - **Fifth step:** Add the settings for the database to the .env;
 - **Sixth step:** Run the migrations to create the project's basic tables:
 ```
    php commands.php migrate
 ```

 - **Seventh step:** Run the following command to create an admin user:
 ```
    php commands.php create-user
 ```

 - **Eighth step:** Run the server:
    - If you are going to use the php server;
      ```
       php -S localhost:9090 -t public
      ```   
      
     - If you are going to use xampp or any other application
        - Add the name of the directory where the project is in the environment variable 'PROJECT_PATH';
        - Add the 'public' in the environment variable 'ASSETS_PATH';

----
 
## 🖇 <a id="dependencies">Dependencies</a>

***Production***
- **vlucas/phpdotenv:** 5.4 or superior
- **phpmailer/phpmailer:** 6.8 or superior

***Development***
- **jquery-mask-plugin:** 1.14.16 or superior
- **bootstrap:** 5.1.0 or superior
- **bootstrap-icons:** 1.8.3 or superior
- **jquery:** 3.6.0 or superior
- **laravel-mix:** 6.0.49 or superior
- **resolve-url-loader:** 5.0.0 or superior
- **sass:** 1.52.3 or superior
- **sass-loader:** 12.1.0 or superior
- **webpack:** 5.73.0 or superior
- **webpack-cli:** 4.10.0 or superior

----

## ℹ️ <a id="about-this-project">About this project</a>
*No more information*
----

## 🛠️ <a id="built-with">Built with</a>
- [HTML](https://html.com/) - Markup language
- [PHP](https://www.php.net/docs.php) - Language
- [CSS](#) - Stylization
- [Git](https://git-scm.com/doc) - Version manager

----

## 👥 <a id="authors">Authors</a>
- **Rafael Vieira** - *Initial work* 
    - [Public Github](https://github.com/rafaeldevcode) 
    - [Private Github](https://github.com/rafaeldevfem)

----

## 👥 <a id="collaborators">Collaborators</a>
*No more collaborators*

----

## 📝 <a id="changelog">Changelog</a>
**Version 1.0.0**
[Launch vision](https://github.com/rafaeldevcode/php-panel/releases/tag/v1.0.0)

**Version 1.1.0 - Curent**
[Check the details](https://github.com/rafaeldevcode/php-panel/releases/tag/v1.1.0)

----

## 🎁 <a id="expressions-of-gratitude">Expressions of gratitude</a>
- Tell others about this project 📢
- Thank you publicly 🤓.

## 🔗 <a id="useful-links">Useful links</a>
- [PHP Documentation](https://www.php.net/docs.php)
- [Bootstrap](https://getbootstrap.com/docs/5.1/getting-started/introduction/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [Jquery](https://api.jquery.com/)
- [SASS](https://sass-lang.com/documentation/)
- [Webpack](https://webpack.js.org/concepts/)
- [Laravel Mix](https://laravel-mix.com/docs/6.0/installation)
- [JQuery Mask](https://igorescobar.github.io/jQuery-Mask-Plugin/docs.html)

---
⌨️ with ❤️ by [Rafael Vieira](https://github.com/rafaeldevcode) 😊
