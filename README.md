Laravel on Heroku
=====================

Sample Laravel Application on Heroku

## Usage

```
$ git clone this_repo
$ cd this_repo
$ git init
$ git add .
$ git commit -m "init"
```

initialize Heroku application.

```
$ composer install
$ ./heroku_create
$ git push heroku master
```

migration database.

```
$ heroku run php artisan migrate
$ heroku run php artisan db:seed
```

add S3 api key that allow writable to S3 Bucket.

```
$ heroku config:add AWS_ACCESS_KEY_ID=YOUR AWS ACCESS_KEY_ID
$ heroku config:add AWS_SECRET_ACCESS_KEY=YOUR AWS SECRET_ACCESS_KEY
```

done.

open your application.

```
$ heroku open
```
