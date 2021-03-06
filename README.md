## ReservationProject
This is a Reservation project made to help people book their seats in many restaurants, theaters, etc.
It's the combination of two other projects made into one organized and simpler to use.

Below the projects that were combined to make this one and their creators:
- [Leonidas Antoniadis](https://github.com/Leonidas-Antoniadis/Reservations)

- [Theodore Zervakis](https://github.com/btx-dev/Ticket-Manager)

The project is being developed with PHP Framework [Laravel](https://laravel.com/) and for the front end [Vue.js](https://vuejs.org/) JavaScript Framework is used.

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

## Edit Front End
If you want to change something to the front end, JavaScript or SCSS use:
```
yarn watch
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

