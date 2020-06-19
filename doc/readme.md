PROJECT DEPLOYMENT MANUAL
Dear user, please follow the instructions below to configure the environment.

FIRST Download
https://github.com/288125/project.git

SECOND Configuration Environment
PHP and MySQL

THIRD MySQL Related configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=msd
DB_USERNAME=root
DB_PASSWORD=

FOURTH Database create table
create table msd.`user`  (`id`int(10) not null auto_increment, `name` varchar(30) not null, `email` varchar (30) not null,  `password` varchar (20) not null,primary key(`id`))
create table msd.`home`  (`id`int(10) not null auto_increment, `name` varchar(30) not null, `work` varchar (30) not null, `status` varchar (20) not null, `share` varchar (20) not null, primary key(`id`))
create table msd.`mylist`  (`id`int(10) not null auto_increment, `item` varchar(30) not null,  `status` varchar (20) not null, `home_id` varchar (20) not null, primary key(`id`))
create table msd.`friend`  (`id`int(10) not null auto_increment, `name` varchar(30) not null, `friend` varchar (20) not null, primary key(`id`))

FIFTH Start
Command line, enter
php artisan serve  

Thanks.