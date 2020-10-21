# Hanged! - Web Application in PHP

## Introduction

Using the knowledge learned in the course [Building Web Applications in PHP](https://www.coursera.org/learn/web-applications-php) from Coursera (with Dr. Charles Severance as teacher) and a [free Laravel course](https://bit.ly/3o6HKW2) (by Aprendible) from Youtube, I decided to make a small project: a **hangman game with a simple authentication system**.

At below, I will explain the installation process, as well as how to use it.

## Installation

You must run the project in a PHP server. The simple way is downloading [Laragon](https://www.apachefriends.org/) (Windows) to simulate a PHP and database server on localhost.

Run Laragon app, click on `Root` button and then download this repository as a [zip file](https://github.com/juansedo/hanged/archive/master.zip) and unzip it in that folder. Also, you must "Run all" (first button on the left).

![Laragon interface](/readme-img/laragon-1.png)

Next, open Laragon `Terminal` (button at left of `Root`) and go to project directory using `cd hanged`.

You must execute this commands with server on:

Commands:
```bash
mv .env.example .env                    #It creates .env
composer install                        #Install packages
npm install                             #Install packages
php artisan key:generate                #It generates a key for .env
sql -u root                             #To create the database
CREATE DATABASE IF NOT EXISTS hanged;
quit
php artisan migrate --seed              #Install migrations and seedes
php artisan serve                       #Run, for the first time, the server
```

When all of them finish, you can use "Hanged!".

## Usage

For accessing to webpage, you need to start the Laragon server.

 
Then, you must register in database. Go to register section clicking on "Register" button.

![Hanged Register Section](/readme-img/hanged-1.png)

When you complete it and send the form, you are going to redirected to Game page.

![Hanged Game Section](/readme-img/hanged-2.png)

Also, you can use the login form for accessing to Game page.

Play button actives the game routine. A random seed for secret word is selected and the game will begin.

You can guess characters using the letter input. If you win, you will be redirected to "congratulations" page, otherwise you will be redirected to "failed" page. Play Hanged! to know that final pages.

![Hanged Game Section with Input](/readme-img/hanged-3.png)


## License

The content of this project itself is licensed under the [GNU General Public License](https://www.gnu.org/licenses/gpl-3.0.html).

## Related links

Open Sans and Rowdies fonts have been used from [Google Fonts API](https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&family=Rowdies:wght@300;400&display=swap).

Youtube video:
- *Coming soon*