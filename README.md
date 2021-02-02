# ReservationProject
This is a Reservation project made to help people book their seats in many restaurants, theaters, etc.
It's the combination of two other projects made into one organized and simpler to use.

Below the creators of the projects that were combined into this one

>- [Leonidas Antoniadis](https://github.com/Leonidas-Antoniadis/Reservations)
>   - Reservations Project coded in Visual Studio IDE with C#.
>- [Theodore Zervakis](https://github.com/btx-dev/Ticket-Manager)
>   - Ticket Manager Project coded in Sublime Text Editor with PHP 7.4.

The project's is developed with PHPStrong IDE

The project's backend technologies are the following
- [PHP 7.3](https://laravel.com/)
- [Laravel](https://laravel.com/) Framework

The project's frontend technologies are the following
- [Vue.js](https://vuejs.org/) JavaScript Framework
- [Bootstrap](https://getbootstrap.com/) CSS Framework
- SCSS

***

## xDebug Installation (Recommended for developers)
In laradock there is a file called .env changed following lines.
*(Line numbers might differ)*
```bash
line: 125 WORKSPACE_INSTALL_XDEBUG=true
line: 211 PHP_FPM_INSTALL_XDEBUG=true
```
Go to laravel.conf.example into laradock folder to path `/nginx/sites/` copy it and remove ".exmaple"

Go to the following files in path.
```
/php-fpm/xdebug.ini
/workspace/xdebug.ini
```

Change them to this:
```
xdebug.remote_host=docker.for.win.localhost
xdebug.remote_connect_back=0
xdebug.remote_port=9000
xdebug.idekey=PHPSTORM

xdebug.remote_autostart=1
xdebug.remote_enable=1
xdebug.cli_color=0
xdebug.profiler_enable=0
xdebug.profiler_output_dir="~/xdebug/phpstorm/tmp/profiling"

xdebug.remote_handler=dbgp
xdebug.remote_mode=req

xdebug.var_display_max_children=-1
xdebug.var_display_max_data=-1
xdebug.var_display_max_depth=-1
```

You just need to change ``xdebug.remote_host``, ``xdebug.remote_autostart``, ``xdebug.remote_enable`` to "1".

***

## PHPStorm Settings
### CLI Interpreter & Docker
1. Go to Settings (Ctrl + Alt + S) -> Languages & Framework -> PHP -> CLI Interpreter -> Press the three dots (...)
2. CLI Interpreter Window -> Press the plus icon from top left (+) -> From Docker, Vagrant, VM, WLS, Remote..
```bash
Server: Docker (Instruction below)
Image name: laradock_workspace:latest (Name of your Workspace)
```
3. On server press "New" -> Docker from Windows

### Servers
Go to Settings (Ctrl + Alt + S) -> Languages & Framework -> PHP -> Servers
```bash
Host: localhost
Port: 80
Debugger: Xdebug
```

Then check ``Use path mappings`` and find the path of your project the root for the column *File/Directory* (ex. ``../ReservationProject``) and next to it write on column *Absolute path on the server* ``/var/www``.

### Validate xDebug
To check if xDebug works go to
- Settings (Ctrl + Alt + S) -> Languages & Framework -> PHP -> Debug
- Press the ``Validate``
- Url to validation script: http://127.0.0.1:80

If everything goes well you will see 7 (seven) green checks.

***

## Installation
Use Laradock to run the project, place it inside the project.
```bash
/ReservationProject/laradock-a
```
Edit the .env file of Laradock to your liking. *(Note: Development versions PHP 7.3, )
Run docker command.
```
docker-compose up -d nginx mysql phpmyadmin redis workspace 
```

Use the migration to install the database.
```
php artisan migrate
```

Use yarn for JavaScript and SCSS to compile.
```
yarn dev
```
_*And don't forget to configure your .env file._

***

## Frontend
If you want to change something to the front end, JavaScript or SCSS you can use:
```
yarn watch OR npm watch
```
In order for your JS, SCSS files to be updated/compiled everytime without using each time
```bash
yarn OR npm run dev
```
*Note: Using ``yarn`` because it's quite faster than ``npm``.*-

***

> ## Contributing
>Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

