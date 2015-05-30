##Tools used
1. [Lumen](https://lumen.laravel.com/) - Laravel micro framework - Light but powerful microframework
2. [Bootstrap](https://getbootstrap.com/) - Frontend css framework - Since I am not a designer/front end dev :)

##Requirements
1. [Composer](https://getcomposer.org/)
2. [phpUnit](https://phpunit.de/)

##Instructions
1. Clone the repo
```
sudo git clone https://github.com/beanmoss/frog-asia-test.git
```
2. Navigate to
```
frog-asia-test/src
```
3. Update or Install dependencies
```
sudo composer update
```
4. I used sqlite as storage so copy ```.env.example``` as ```.env```
```
cp .env.example .env
```
5. Bootup the built in php server
```
php artisan serve
```
and you will see something like
```
Lumen development server started on http://localhost:8000/
```
6. Click on the link or open a browser and go to ```http://localhost:8000/```
7. For testing, under /src folder you can directly issue ```phpunit```

###That's it! Thank you!
####Robel Luna



