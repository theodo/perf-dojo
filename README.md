# Dojo Performance

## Installation

```sh
git clone git@github.com:theodo/perf-dojo.git
cd dojo-perf
docker-compose up -d

docker-compose exec php composer install
docker-compose exec php php bin/console do:mi:mi --env=dev
docker-compose exec php php bin/console hautelook:fixtures:load -n --env=dev
```

You can now add the following lines to your `/etc/hosts`:
```
127.0.0.1 cdn.catbook.local
127.0.0.1 catbook.local
```

Finally, navigate to https://catbook.local and accept the certificate. Do the same for https://cdn.catbook.local.

You are good to go!

## Instructions

My site is supposed to display cat pictures, but lately it has been really slow.

There are (at least) 15 performance improvements in that application. Some are obvious, some require more thinking.

### How to start?

??

