# PHP Panel

Project developed with the objective of accelerating web development using PHP without the use of fremework, the project has a login screen, dashboard, functions to add, edit and delete users, and even a settings screen with several options for site settings , is already configured to make connections to the database to add data and create tables.

----

**Table of Contents**
- [ℹ️ Information](#information)
- [📋 Prerequisites](#prerequisites)
- [🔧 Installation](#installation)
- [🖌️ Styling](#styling)
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
    ```bash
        git clone https://github.com/rafaeldevcode/php-panel.git
    ```

 - **Second step:** Install PHP dependencies:
    ```bash
        composer install
    ```

 - **Third step:** Install the JavaScript dependencies (Used only for development environment):
    ```bash
        npm install
    ```
 - **Fourth step:** Copy the .env.example file and rename it to .env;
 - **Fifth step:** Add the settings for the database to the .env;
 - **Sixth step:** Run this command to perform database migrations:
    ```bash
        php commands.php migrate
    ```

 - **Seventh step:** Run this command to perform initial settings:
    ```bash
        php commands.php initial-setup
    ```

 - **Eighth step:** Run the server:
    - If you are going to use the php server;
      ```bash
       php -S localhost:9090
      ```   
      
     - If you are going to use xampp or any other application
        - Add the name of the directory where the project is in the environment variable 'PROJECT_PATH';
        - Add the 'public' in the environment variable 'ASSETS_PATH';

----

## 🔧 <a id="styling">Styling</a>
If you want to change the default colors, it's very simple, as we use bootstrap just follow the step by step and change the colors defined in the variables:
- **Step one:** Go to the [_variables.sass](/public/libs/sass/_variables.sass) file and change the colors;
- **Step two:** Go to the [styles.scss](/public/libs/sass/style.scss) file and change the colors;
- **Step three:** Now just run the following command to build the new file with the styles:

    - In case you want to run the construction of styles and scripts for the production environment (In these cases they will be compressed to reduce the size of the files):
        ```bash
        npm run prod
        ```

    - In case you want to run the construction of styles and scripts for the development environment (In these cases they will not be zipped):
        ```bash
        npm run dev
        ```

    - If you want styles to be built as you edit them (At this point it's only if you're using sass or scss for your styling):
        ```bash
        npm run watch
        ```

- **Step Four:** You will certainly also want to change the color of the default images made in svg, this is also very simple, just run this command:
    ```bash
    php commands.php change-color-svg [OLD_COLOR] [NEW_COLOR]
    ```
    - If you are running this command for the first time then the OLD_COLOR would be **#3695FF**, if not the first time then it will be the last color you defined, the command looks like this:
        ```bash
        php commands.php change-color-svg '#3695FF' '#FF0000'
        ```

    **OBSS:** We do not recommend that you edit the style files inside [libs/sass ](/public/libs/sass/) because if there is an update they will be replaced, we recommend that you create a style file in [public/assets](/public/assets/), and add this path to [webpack.config.js](/webpack.mix.js) to build the file
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

**Version 1.1.0**
[Check the details](https://github.com/rafaeldevcode/php-panel/releases/tag/v1.1.0)

**Version 1.2.0**
[Check the details](https://github.com/rafaeldevcode/php-panel/releases/tag/v1.2.0)

**Version 1.3.0 - Curent**
[Check the details](https://github.com/rafaeldevcode/php-panel/releases/tag/v1.3.0)

**Version 1.3.1 - Curent**
[Check the details](https://github.com/rafaeldevcode/php-panel/releases/tag/v1.3.1)

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
