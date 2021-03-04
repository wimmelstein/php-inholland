DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`
(
    `id`          varchar(25) PRIMARY KEY,
    `description` varchar(40) DEFAULT NULL,
    `status`      varchar(25) DEFAULT NULL,
    `timestamp`   timestamp   DEFAULT now()
)
