# Сайт для добавления и просмотра оборудования в базе данных
Сайт позволяет загрузить название оборудования с соотвествующим ему серийным номером в таблицу, находящуюся на удаленной базе данных.
Серийные номера проверяются на соотвествие маске оборудования и повторения в таблице.
# Как запустить?
1. В папке Config_SQL имеется тестовый дам базы данных (далее БД), состоящей из двух таблиц:
   1. Тип оборудования - equipment_template (код - id, наименование типа - name, маска серийного номера - mask).
   2. Оборудование - equipment_list (код - id, код типа - name, уникальный серийный номер – SN).

   Содержимое папки потребуется единственный раз - для импорта БД. Подробную инструкцию можно найти по ссылке: https://www.greengeeks.com/tutorials/restore-a-mysql-database-from-a-backup-with-mysql-workbench/
2. В файле /DB/core.php необходимо указать следующие параметры вашей БД:
    1. $hostname = "имя хоста, на котором находится база данных"; 
    2. $username = "имя пользователя";
    3. $password = "пароль пользователя";
3. Стартовой страницей является index.php. Для проверки проекта можно воспользоваться функционалом для запуска программы PhpStorm.
# Технологии проекта
1. PHP/HTML/CSS
2. BootStrap
3. MySQL
4. AJAX

