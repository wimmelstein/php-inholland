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

# noinspection SqlNoDataSourceInspection

CREATE TABLE IF NOT EXISTS `tickets`
(
    `id`      VARCHAR(100) NOT NULL,
    `user_id` int(11)      NOT NULL,
    `checkin` TINYINT,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
)
