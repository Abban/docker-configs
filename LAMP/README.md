# LAMP

This has an basic old-ish php5 setup and a more modern php7 one which installs composer dependencies and stuff.

Drop your database into the `.docker/db/` folder and Docker will automatically import that on up. `docker-compose down -v` will remove the volume if you want to re-import. 