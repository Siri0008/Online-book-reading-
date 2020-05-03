CREATE TABLE `admins`(
    `adminnumber` int(20) ,
    `password`  varchar(20),
    PRIMARY KEY(`adminnumber`)
);
CREATE TABLE `users`(
    `id` int(20) NOT NULL AUTO_INCREMENT,
    `name` text,
    `mail` text,
    `mobilenumber` text,
    `password` text,
    `mybooks` int(11),
    PRIMARY KEY(`id`)
);
CREATE TABLE `books`(
    `Id` int(11) NOT NULL AUTO_INCREMENT,
    `Bookname` text,
    `Author` text,
    `Genre` text,
    `picture` text,
    `description` text,
    `cost` text,
    `orderstatus` int(11),
    PRIMARY KEY(`Id`)
);
CREATE TABLE `feedbacks`(
    `Fmail` text,
    `feedback` text
);
CREATE TABLE `cart_details` (
    `name_cart` text,
    `book_cart` text
);
CREATE TABLE `purchase_details` (
    `Cname` text,
    `BookP` text
);
CREATE TABLE `rating_data` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `rating` int(11),
    `name` text,
    `email` text,
    `date_time` datetime,
    `status` int(1)
);
INSERT INTO `admins`(adminnumber,password) 
VALUES ('123','admin');
INSERT INTO `books` (Bookname,Author,Genre,picture,description,cost,orderstatus)
VALUES ('BOOK1','Author1','Fantasy','BOOK1.jpg','Book description to be written here in 2-3 lines','100/-',0);
INSERT INTO `books` (Bookname,Author,Genre,picture,description,cost,orderstatus)
VALUES ('BOOK2','Author2','Fantasy','BOOK2.jpg','Book description to be written here in 2-3 lines','200/-',0);
INSERT INTO `books` (Bookname,Author,Genre,picture,description,cost,orderstatus)
VALUES ('BOOK3','Author3','Romance','BOOK3.jpg','Book description to be written here in 2-3 lines','300/-',0);
INSERT INTO `books` (Bookname,Author,Genre,picture,description,cost,orderstatus)
VALUES ('BOOK4','Author4','Romance','BOOK4.jpg','Book description to be written here in 2-3 lines','250/-',0);
INSERT INTO `books` (Bookname,Author,Genre,picture,description,cost,orderstatus)
VALUES ('BOOK5','Author2','Drama','BOOK5.jpg','Book description to be written here in 2-3 lines','300/-',0);
INSERT INTO `books` (Bookname,Author,Genre,picture,description,cost,orderstatus)
VALUES ('BOOK6','Author6','Drama','BOOK6.jpg','Book description to be written here in 2-3 lines','208/-',0);



