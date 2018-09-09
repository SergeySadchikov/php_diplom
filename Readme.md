# Сервис вопросов и ответов

## Как развернуть приложение?

### Что нам нужно?
1. Хостинг с доступом по SSH и СУБД MySQL(http://timeweb.com)
2. PHP 7.0 и выше(http://php.net/)
3. Composer(https://getcomposer.org/)
4. GIT(http://timeweb.com)


###Подготовка к установке  

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
Для параметра THEME=FAQ

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
<!-- ### Explain what these tests test and why

```
ln -s /home/ваш путь/папка с проектом/public /home/ваш путь/public_html
```

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc

 -->