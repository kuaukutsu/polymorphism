# polymorphism (example)

## DI

`di/index.php`

```php
try {
    $class = getContainer()->get(Color::class);
} catch (DependencyException | NotFoundException | Exception $e) {
    echo $e->getMessage();
    exit(0);
}

echo $class->getColor() . PHP_EOL;
```

## Factory

`factory/index.php`

```php
$factory = new ColorFactory();
$class = $factory->create('blue');

echo $class->getColor() . PHP_EOL;
```

## Docker

local

```shell
docker build -t kuaukutsu/polymorphism:php .
docker run --init -it --rm -v "$(pwd):/app" -w /app kuaukutsu/polymorphism:php sh
```

## Testing

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

local

```shell
docker run --init -it --rm -v "$(pwd):/app" -w /app kuaukutsu/polymorphism:php ./vendor/bin/phpunit 
```

### Code Sniffer

local

```shell
docker run --init -it --rm -v "$(pwd):/app" -w /app kuaukutsu/polymorphism:php ./vendor/bin/phpcs 
```

phpqa

```shell
docker run --init -it --rm -v "$(pwd):/app" -v "$(pwd)/phpqa/tmp:/tmp" -w /app jakzal/phpqa phpcs
```

### Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```

local

```shell
docker run --init -it --rm -v "$(pwd):/app" -w /app kuaukutsu/polymorphism:php ./vendor/bin/psalm 
```

phpqa

```shell
docker run --init -it --rm -v "$(pwd):/app" -v "$(pwd)/phpqa/tmp:/tmp" -w /app jakzal/phpqa psalm
```
