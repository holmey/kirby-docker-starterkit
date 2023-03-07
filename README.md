# Kirby Docker Starterkit

This Starterkit is a simple demonstration on how to run a [Kirby](https://getkirby.com/) (v3.9) development environment with [Docker](https://www.docker.com/).

For more information on Docker basics you can find a very good guide in the [Kirby Cookbook](https://getkirby.com/docs/cookbook/setup/kirby-meets-docker#example-4-docker-compose).

The setup is for local development only and not designed for production environments but it comes with [Xdebug](#xdebug) and [MailHog](#mailhog) because of that. There is also no image repository this setup is puplished to.

## Installation using NGINX as webserver

```bash
$ git clone git@github.com:holmey/kirby-docker-starterkit.git .
$ cd kirby-docker-starterkit
$ docker compose -f docker-compose.yml -f docker-compose.nginx.yml up -d
$ docker compose exec -it php composer install
```
Visit the [admin panel](http://localhost/panel) and finalize the installation .

## Using Apache instead of NGINX

In shared hosting environments Apache is a common server.
If you would like to start Apache instead of NGINX just use the httpd override.

```bash
$ git clone git@github.com:holmey/kirby-docker-starterkit.git .
$ cd kirby-docker-starterkit
$ docker compose -f docker-compose.yml -f docker-compose.httpd.yml up -d
$ docker compose exec -it php composer install
```
Visit the [admin panel](http://localhost/panel) and finalize the installation .

## Configure Timezone

To configure the Timezone of the PHP service you can change the build args of the [compose file](./docker-compose.yml) before installation. e.g.:

```bash
TIME_ZONE: "Europe/Berlin"
```

## Folder Structure

The folder structure is following the ["Public folder setup"](https://getkirby.com/docs/guide/configuration#custom-folder-setup__public-folder-setup) instructions from the Kirby Guide.

## MailHog

There is a handy [MailHog](https://github.com/mailhog/MailHog) service running and configured in the [localhost configuration](./site/config/config.localhost.php).

## Xdebug

The PHP Service is configured with Xdebug. If you are working with Visual Studio Code you could use the following launch.json configuration.

```bash
{
  "version": "0.2.0",
  "configurations": [
    {
      "name": "Listen for Xdebug",
      "type": "php",
      "request": "launch",
      "port": 9003,
      "pathMappings": {
        "/var/www/html/": "${workspaceFolder}"
      }
    }
  ]
}

```

## License

This "Kirby Docker Starterkit" is licensed under the MIT License. Please see License File for more information. [Kirby](https://getkirby.com/) itself is [commercial software](https://getkirby.com/buy) and has its own [commercial license](https://getkirby.com/license).
