# polymorphism (example)

Вопрос: что плохого в условном `switch`?

```php
switch ($colorName) {
    case 'yellow':
        // expression
        break;
    case 'blue':
        // expression
        break;
}
```

Ничего плохого в самом `switch` нет, опастность кроется именно в выражении, которое содержится в `case`, 
в тот момент когда там появляется код бизнес логики.

Соотстветственно мы пишем контракт, в данном случае мы описываем что контракт должен возвращать текстовое представление цвета.
И создаём набор классов которые содержат какую-то часть бизнес логики и реализуют этот контракт. 
И здесь так же важно что именно `interface`, не `abstract`!
Преждевременная группировка в абстрактные типы так же опасна как и логика в `switch`, 
но распутать логику из уже используемых в проекте классов, будет гораздо сложнее.

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

Мы так же можем использовать `switch` внутри фабрики, т.е. эта языковая конструкция сама по себе не содержит негативного контекста.

```php
$class = $factory->createFromSwitch('blue');
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
