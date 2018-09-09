# Сервис вопросов и ответов

## Как развернуть приложение?

### Что нам нужно?
1. Хостинг с доступом по SSH и СУБД MySQL(http://timeweb.com)
2. PHP 7.0 и выше(http://php.net/)
3. Composer(https://getcomposer.org/)
4. GIT(http://timeweb.com)


### Подготовка к установке  

1. Устаналиваем композер из командной строки

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Используем PHP 7.1 Для удобства  использования php composer прописываем alias. Для это в корне создаем файл .bash_profile и пишем туда

```
alias php='/opt/php71/bin/php -d memory_limit=256M'
alias composer='/opt/php71/bin/php -d memory_limit=500M /home/ваша директория/composer.phar'
```

3. Создаем БД на вашем хостинге

4. Создаем и настраиваем сайт.

## Установка

1. Клонируем приложение в выбранную директорию

```
git clone
```

2. Переходим в директор и запускаем установку

```
composer install
```

3. Получаем окружение

```
cp .env.example .env
```

4. Генерируем ключ приложения

```
php artisan key:generate
```

5. Настраиваем подключение БД в папке с проектом (файл .env)
Для параметра THEME устанавливаем значение FAQ (THEME=FAQ)

6. Запускаем миграции и наполняем начальными данными.
По умолчанию создан админ: name: admin, password: admin,  а также тема ABOUT
```
php artisan migrate --seed
```
7. Создаем симилинк:

```
ln -s /home/ваш путь/папка с проектом/public /home/ваш путь/public_html
```

8. Запускам сайт
