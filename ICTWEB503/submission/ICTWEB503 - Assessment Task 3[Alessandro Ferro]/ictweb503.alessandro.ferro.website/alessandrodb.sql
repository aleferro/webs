/*[DATABASE NAME alesandrodb]*/
DROP DATABASE IF EXISTS `alesandrodb`;
CREATE DATABASE IF NOT EXISTS `alessandrodb`;
USE `alessandrodb`;

/*[Admin User details]*/

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Alessandro', 'Ferro', 'alessandro@admin.com', 'adminpass');

/*[Category of Product, need to have 4]*/

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'New'),
(2, 'Second Hand'),
(3, 'Hard Copy'),
(4, 'Digital');

/*[records of order items]*/

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[records of order]*/

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[track records of order]*/

CREATE TABLE `ordertracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[Products, need to add 10 records]*/

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `name`, `catid`, `price`, `thumb`, `description`) VALUES
(1, 'Drawing', 1, '10.00', 'uploads/prod1.jpg', 'Draw many thing in black and white. Pretty cool.'),
(2, 'Magnetic Borad', 1, '20.00', 'uploads/prod2.jpg', 'Drawing again. This time more on the magnetic side of things'),
(3, 'Sweet Reading', 2, '30.00', 'uploads/prod3.jpg', 'So beautiful, yet so sadly unrealitic.'),
(4, 'A Plank', 2, '40.00', 'uploads/prod4.jpg', 'Yup, just a plank. You could do thing with it.'),
(5, 'Fish', 3, '50.00', 'uploads/prod5.jpg', 'A red and somewhat fluffy fish. But the subject is sound.'),
(6, 'Mirror', 3, '60.00', 'uploads/prod6.jpg', 'It helps reflecting. Very interesting stuff.'),
(7, 'English', 4, '70.00', 'uploads/prod7.jpg', 'The javascript of human languages. It just works.'),
(8, 'Utopia', 4, '80.00', 'uploads/prod8.jpg', 'Ironic, in a time of lock downs and closed borders.'),
(9, 'Drops', 1, '90.00', 'uploads/prod9.jpg', 'Red and blue drops on white background. But there are mainly red drops.'),
(10, 'Wellbeing', 2, '100.00', 'uploads/prod10.jpg', 'To finish on a positive note in an elegant way.'),
(11, 'Sticks', 3, '110.00', 'uploads/prod11.jpg', 'Some sticks. They can be used as any other stick.'),
(12, 'Christmas star', 4, '120.00', 'uploads/prod12.jpg', 'A book about Crhistmas. Oh, and about stars too.');

/*[records of Reviews]*/

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[records of users]*/

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[records of users details]*/

CREATE TABLE `usersmeta` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[records of wishlist]*/

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[records of contact messages]*/

CREATE TABLE `contactmessage` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*[records of coupon]*/

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `value` varchar(5) NOT NULL,
  `expireon` date NOT NULL,
  `usedon` date NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `coupon` (`id`, `code`, `value`, `expireon`) VALUES
(0001, '0001', '5', '2021-11-18'),
(0002, '0002', '5', '2020-10-18'),
(0003, '0003', '5', '2021-11-18'),
(0004, '0004', '5', '2021-11-18');

/*[Add primary keys]*/

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ordertracking`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `usersmeta`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

/*[add auto increment]*/

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `usersmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
