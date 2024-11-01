# Использование

php 8.1.25

```bash
composer install
```

```bash
php -S localhost:8000 -t public
```

## Недостатки исходного класса

1. Самое главное, **ПОЛНОЕ НАРУШЕНИЕ** принципов SOLID
2. Зависимость от глобальных переменных
3. Вся логика в одном месте, как бизнес так и прикладная - _**недопустимо**_
4. Жёсткое подключение к БД
5. Опечатки в вызове методов
6. Строгое логирование? зачем если есть такая вещь как Интерфейс, и можно туда всё вынести
7. "Кривая" обработка запросов

### Решение

1. _Разделение_ кода на модули и слои
2. Добавление _комментариев_ для IDE - **_PHPDoc_** comments
3. Вынесение конфигураций в _отдельный класс_
4. Вызов переменных конфигураций из _ENViroment_
5. Код стал более _гибким_ для расширения за счёт _структурирования_
6. Добавление _композёра_ для использования готовых решений некоторого функционала (например: **логирование**)
7. Приведение к стандартам PSR