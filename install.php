<?php
$pwd= md5('12345');
$uname='admin';
require './framework.php';
if(mysql_query("CREATE DATABASE `library`")){echo "Db created";}//database
if(mysql_query("CREATE TABLE `library`.`data` ( `USER_NAME` VARCHAR(30) NOT NULL , `PASSWORD` VARCHAR(100) NOT NULL , `RECOVERY_EMAIL` VARCHAR(30) NOT NULL , `CONFIRM_CODE` VARCHAR(30) NOT NULL , `CONFIRMED` INT NOT NULL ) ENGINE = InnoDB;")){echo" <br/>Database created";}//table data
if(mysql_query("CREATE TABLE `library`.`STUDENT` ( `ID` INT(11) NOT NULL AUTO_INCREMENT , `STUDENT_NAME` VARCHAR(40) NOT NULL , `REGISTER_NO` VARCHAR(10) NOT NULL , `SEMESTER` VARCHAR(10) NOT NULL , `EMAIL_ID` VARCHAR(200) NOT NULL , `ADDRESS` VARCHAR(300) ,`DEPARTMENT` VARCHAR(20) NOT NULL , `BOOK_COUNT` INT NOT NULL , `BOOK_1` VARCHAR(20) NOT NULL , `BOOK_1_DATE` VARCHAR(20) NOT NULL , `BOOK_2` VARCHAR(20) NOT NULL , `BOOK_2_DATE` VARCHAR(20) NOT NULL , `BOOK_3` VARCHAR(20) NOT NULL , `BOOK_3_DATE` VARCHAR(20) NOT NULL , PRIMARY KEY (`ID`))  ENGINE = InnoDB;")){echo"<br/> Student created";}//table student 
if(mysql_query("CREATE TABLE `library`.`BOOKS` ( `ID` INT(11) NOT NULL AUTO_INCREMENT , `BOOK_NAME` VARCHAR(40) NOT NULL , `BOOK_ID` VARCHAR(10) NOT NULL , `STOCK_COUNT` INT NOT NULL ,`BOOK_COUNT` INT NOT NULL , `BOOK_AUTHOR` VARCHAR(30) NOT NULL , PRIMARY KEY (`ID`)  ) ENGINE = InnoDB;")){echo"<br/> Books created";}//table books

echo mysql_error();