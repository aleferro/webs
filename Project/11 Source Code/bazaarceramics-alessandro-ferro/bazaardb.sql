/*[DATABASE NAME bazaardb]*/
DROP DATABASE IF EXISTS `bazaardb`;
CREATE DATABASE IF NOT EXISTS `bazaardb`;
USE `bazaardb`;

/*** CREATE TABLE ***/

/*[address] - consider removing and add the attributes to the users table*/

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `addressLine` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `region` varchar(255) NULL,
  `country` varchar(255) NOT NULL
) DEFAULT CHARSET=latin1;


/*[users]*/

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARSET=latin1;

/*[Products]*/

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `glazeType`  varchar(255) NOT NULL,
  `dateProduced` date DEFAULT CURRENT_TIMESTAMP
  
) DEFAULT CHARSET=latin1;

/*[orders]*/

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `orderDate` date NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalprice` float NOT NULL
  ) DEFAULT CHARSET=latin1;

  INSERT INTO `orders`(`orderId`, `customerId`, `orderDate`, `totalPrice`) VALUES
  (1, 1, "2021-03-26", 100.00),
  (2, 3, "2021-03-26", 110.00),
  (3, 4, "2021-03-25", 120.00),
  (4, 5, "2021-03-24", 130.00),
  (5, 1, "2021-03-24", 140.00),
  (6, 3, "2021-03-24", 150.00),
  (7, 4, "2021-03-23", 160.00),
  (8, 5, "2021-03-22", 170.00),
  (9, 1, "2021-03-21", 180.00),
  (10, 3, "2021-03-20", 190.00),
  (11, 3, "2021-03-20", 180.00),
  (12, 3, "2021-03-20", 170.00),
  (13, 3, "2021-03-20", 210.00),
  (14, 3, "2021-03-19", 290.00),
  (15, 3, "2021-03-18", 170.00),
  (16, 3, "2021-03-18", 190.00),
  (17, 3, "2021-03-17", 190.00),
  (18, 3, "2021-03-16", 200.00),
  (19, 3, "2021-03-16", 210.00),
  (20, 3, "2021-03-15", 270.00);

/*[order_details]*/

CREATE TABLE `order_details` (
  `order_detailsId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `quantity` tinyint NOT NULL,
  `unitPrice` float NOT NULL,
  `discount` tinyint NULL
) DEFAULT CHARSET=latin1;

/*[item_cart]*/

CREATE TABLE `item_cart` (
  `item_cartId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quantity` tinyint NOT NULL
) DEFAULT CHARSET=latin1;

/*[email]*/

CREATE TABLE `email` (
  `emailId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `dateSent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) DEFAULT CHARSET=latin1;

/*[categories]*/

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) DEFAULT CHARSET=latin1;

/*** POPULATE TABLES ***/

/*[Add records to categories table]*/
INSERT INTO `categories` (`categoryId`, `description`) VALUES
(1, "homeware"),
(2, "collection");

/*[Add records to products table]*/
INSERT INTO `products` (`productId`, `productName`, `categoryId`, `productImage`, `description`, `size`, `price`, `glazeType`, `dateProduced`) VALUES
(1, "Pottery 1", 1, "img/pottery1.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(2, "Pottery 2", 1, "img/pottery2.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(3, "Pottery 3", 1, "img/pottery3.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(4, "Pottery 4", 1, "img/pottery4.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(5, "Pottery 5", 1, "img/pottery5.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(6, "Pottery 6", 2, "img/pottery6.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(7, "Pottery 7", 2, "img/pottery7.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(8, "Pottery 8", 2, "img/pottery8.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(9, "Pottery 9", 2, "img/pottery9.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25"),
(10, "Pottery 10", 2, "img/pottery10.jpg", "This is a nice piece of pottery", "40cm tall", 49.99, "Slip Ware", "2021-03-25");



/*[Add records to users table]*/
/*
password for test admin: illo
password for test customers: lala
*/
INSERT INTO `users` (`userId`, `firstName`, `lastName`, `role`, `email`,`password`) VALUES
(1, "Lei", "Ella", "customer", "lei@ella.com", "$2y$10$Iy/S9lq3mm5O1NVtTBC6D.UWbDbeB35xSiQpqXF21sYwkVW690KA6"),
(2, "Lui", "Egli", "admin", "lui@egli.com", "$2y$10$KqKJtuLimHXhfO0gREYD6.FSYa9qu7OY07z6RQtd0IXocZVksrHf."),
(3, "Mare", "Koivi", "customer", "mare@koivi.com", "$2y$10$Iy/S9lq3mm5O1NVtTBC6D.UWbDbeB35xSiQpqXF21sYwkVW690KA6"),
(4, "Jacopo", "Marengo", "customer", "jacopo@marengo.com", "$2y$10$Iy/S9lq3mm5O1NVtTBC6D.UWbDbeB35xSiQpqXF21sYwkVW690KA6"),
(5, "Ayoub", "Bkhouti", "customer", "ayoub@bkhouti.com", "$2y$10$Iy/S9lq3mm5O1NVtTBC6D.UWbDbeB35xSiQpqXF21sYwkVW690KA6");


/*[Add primary keys]*/

ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detailsId`);

ALTER TABLE `item_cart`
  ADD PRIMARY KEY (`item_cartId`);

ALTER TABLE `email`
  ADD PRIMARY KEY (`emailId`);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

/*[add auto increment]*/

ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `order_details`
  MODIFY `order_detailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `item_cart`
  MODIFY `item_cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `email`
  MODIFY `emailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
