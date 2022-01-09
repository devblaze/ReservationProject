# ReservationProject
This is a Reservation project made to help people book their seats in many restaurants, theaters, etc.
It's the combination of two other projects made into one organized and simpler to use.

Mentioned below are the creators of the projects that were combined in order to make this project

>- [Leonidas Antoniadis](https://github.com/Leonidas-Antoniadis/Reservations)
>   - Reservations Project coded in Visual Studio IDE with C#.
>- [Theodore Zervakis](https://github.com/btx-dev/Ticket-Manager)
>   - Ticket Manager Project coded in Sublime Text Editor with PHP 7.4.

The project's is developed with PHPStrong IDE.

### The project's backend technologies are the following:
- [PHP 8.0](https://www.php.net/releases/8.0/en.php)
- [Laravel](https://laravel.com/) Framework
- [Algolia](https://www.algolia.com/) search & discovery hosted API

### The project's frontend technologies are the following
- [Vue.js](https://vuejs.org/) JavaScript Framework
- [Bootstrap](https://getbootstrap.com/) CSS Framework
- SCSS

***

## xDebug Installation (Developers only)
In laradock there is a file called `.env` search for 'xdebug' and set to `true` the following variables.
<br>
*(Line numbers might differ)*
```dotenv
line 125: WORKSPACE_INSTALL_XDEBUG=true
line 211: PHP_FPM_INSTALL_XDEBUG=true
```
Go to laravel.conf.example into laradock folder to path `/nginx/sites/` copy it and remove ".exmaple"

Go to the following files in path.
```xpath
/php-fpm/xdebug.ini
/workspace/xdebug.ini
```

Change them to look like this:
```apacheconf
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

You just need to change ``xdebug.remote_host``, ``xdebug.remote_autostart``, ``xdebug.remote_enable`` to "1" and `xdebug.remote_host=docker.for.win.localhost`.

***

## PHPStorm Settings (Developers only)
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
```apacheconf
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

### Configuration

Go edit your .env files, first inside `../yourproject/laradock/.env` find your database settings and change them if you wish.
```dotenv
MYSQL_DATABASE=default
MYSQL_USER=default
MYSQL_PASSWORD=secret
```
Also change the `DATA_PATH_HOST` from the .env
```dotenv
DATA_PATH_HOST=~/.laradock/data

Change to this:
#DATA_PATH_HOST=~/.laradock/<Project Name>/data
DATA_PATH_HOST=~/.laradock/ReservationProject/data
```

Go to your `../yourproject/.env`, change your DB settings accordingly.
```dotenv
DB_CONNECTION=mysql
DB_HOST=laradock_mysql_1 # Your docker mysql container name.
DB_PORT=3306
DB_DATABASE=default # MYSQL_DATABASE
DB_USERNAME=default # MYSQL_PASSWORD
DB_PASSWORD=secret  # MYSQL_PASSWORD
```

Note: Development versions PHP 7.3

### Project setup steps

Run the following docker commands.
```bash
docker-compose up -d nginx mysql workspace 
```

Common error fix list:
- [ERROR: Service 'workspace' failed to build : Build failed](https://github.com/laradock/laradock/issues/3103#issuecomment-974316464)
- [MySQL not starting](https://github.com/laradock/laradock/issues/1138#issuecomment-333332386), change project data path from .env `DATA_PATH_HOST=~/.laradock/<project_name>/data`

Now that you've built your containers you need to get inside your workspace.
```bash
docker exec -it <laradock-workspace-1> /bin/bash

<> = Your workspace docker container name in there.
```

So now run the following commands to install autoload dependencies.
```bash
composer install
```

Use the yarn command or npm to install.
```bash
yarn
```

Use yarn for JavaScript and SCSS to compile.
```bash
yarn dev
```

### Common error's fix list
- [ERROR: Service 'workspace' failed to build : Build failed](https://github.com/laradock/laradock/issues/3103#issuecomment-974316464)
- [MySQL not starting](https://github.com/laradock/laradock/issues/1138#issuecomment-333332386), change project data path from .env `DATA_PATH_HOST=~/.laradock/<project_name>/data`
- [ERR_OSSL_EVP_UNSUPPORTED](https://github.com/webpack/webpack/issues/14532#issuecomment-947515866), if you run `yarn watch` and get the following error just run `export NODE_OPTIONS=--openssl-legacy-provider` at laradock workspace.

## Database setup

Use the migration to install the database.
```bash
php artisan migrate
```

After the migration you need to run the database seeders in order to create the first admin user.
```bash
php artisan db:seed
```
This command will create a user with the following credentials:
- Email: admin@admin
- Password: admin

After you've run the seeder you run the pre-configured factories by entering the tinker and running the following line
```bash
php artisan tinker
-> App\Models\Event::factory()->count(x)->make()

x = Enter the number of events you want to create.
```

_*And don't forget to configure your .env file._

### Algolia setup steps

Go into your algolia account at API Keys -> copy your Application ID and Admin API Key. <br>
Edit `.env` file at the end of the file insert the following two lines:
```dotenv
ALGOLIA_APP_ID=<Application ID>
ALGOLIA_SECRET=<Admin API Key>
```

After setting up algolia there are some basic commands you can use in order to update and view the status of your data.

You can check the status of your algolia search data by going in your `workspace` container.
```bash
php artisan scout:status
```

This result will mean the you have no data in your database and none at your algolia.
```bash
 ------------------ -------- -------------- --------------- ----------------
  Searchable         Index    Settings       Local records   Remote records
 ------------------ -------- -------------- --------------- ----------------
  App\Models\Event   events   Synchronized   0               0
 ------------------ -------- -------------- --------------- ----------------
```
This would mean that some of the records are not available for search.

(247 are in the database but only 242 are able to be search from algolia)
```bash
 ------------------ -------- -------------- --------------- ----------------
  Searchable         Index    Settings       Local records   Remote records
 ------------------ -------- -------------- --------------- ----------------
  App\Models\Event   events   Synchronized   247             242
 ------------------ -------- -------------- --------------- ----------------
```

You can use `import` in order to put all your records into algolia so they will be searchable.
```bash
php artisan scout:import
```

You can use the `sync` in order to synchronize your algolia custom settings.
```
php artisan scout:sync
```
***

## Frontend (Developers only)
If you want to change something to the front end, JavaScript or SCSS you can use:
```bash
yarn watch
||
npm watch
```
In order for your JS, SCSS files to be updated/compiled everytime without using each time
```bash
yarn
||
npm run dev
```
*Note: Using `yarn` because it's a bit faster than `npm`.*

***

> ## Contributing
>Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

