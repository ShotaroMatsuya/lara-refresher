# Laravel apps repo

## starting project

Duplicate `.env.default` and create `.env`. Then enter the credentials in `.env` in the mysql container env_file

First things first, run this command bellow to generate an App key. And paste it in `.env`.

```bash
docker-compose run --rm artisan key:generate
```

Next, Restore the dummy data to db using seeder.

```bash
docker-compose run --rm artisan migrate:fresh --seed
```

---

## Forum-only workaround

Only this project gets an error during dependency install (composer install) due to a problem caused by the table definition in the Service Provider .  
So, need to comment out the boot method in `app/Providers/AppServiceProvider.php` and then run install command.
