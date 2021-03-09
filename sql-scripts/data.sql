SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
    time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users`
(
    `id`         int(11)     NOT NULL AUTO_INCREMENT,
    `first_name` varchar(20) NOT NULL,
    `last_name`  varchar(30) NOT NULL,
    `age`        int(11)     NOT NULL,
    PRIMARY KEY
        (
         `id`
            )
);

INSERT INTO `users` (`first_name`, `last_name`, `age`)
VALUES ('Wim', 'Wiltenburg', 51),
       ('Jan', 'Jansen', 32);

create TABLE if not exists `weather`
(
    `timestamp`   TIMESTAMP default now(),
    `location`    VARCHAR(30) NOT NULL,
    `country`     varchar(3)  NOT NULL,
    `temperature` double,
    `feels_like`  double,
    `min_temp`    double,
    `max_temp`    double,
    `pressure`    int(11),
    `humidity`    int(11),
    `description` varchar(30)
)
