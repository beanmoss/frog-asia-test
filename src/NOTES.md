##Tools used
1. [Lumen](https://lumen.laravel.com/) - Laravel micro framework - Light but powerful microframework
2. [Bootstrap](https://getbootstrap.com/) - Frontend css framework - Since I am not a designer/front end dev :)

##Requirements
1. [Composer](https://getcomposer.org/)
2. [phpUnit](https://phpunit.de/)

##Instructions
- Clone the repo
```
sudo git clone https://github.com/beanmoss/frog-asia-test.git
```

- Navigate to
```
frog-asia-test/src
```

- Update or Install dependencies
```
sudo composer update
```

- I used sqlite as storage so copy ```.env.example``` as ```.env```
```
cp .env.example .env
```

- Bootup the built in php server
```
php artisan serve
```
and you will see something like
```
Lumen development server started on http://localhost:8000/
```

- Click on the link or open a browser and go to ```http://localhost:8000/```

- For testing, under /src folder you can directly issue ```phpunit```

###Total hrs - 7hrs

###That's it! Thank you!
####Robel Luna



