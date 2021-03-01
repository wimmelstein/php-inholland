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
VALUES ('Wim', 'Wiltenburg', 52),
       ('Jack', 'Monterrey', 38);

# noinspection SqlNoDataSourceInspection

CREATE TABLE IF NOT EXISTS `events`
(
    `id`   int(11) PRIMARY KEY NOT NULL,
    `date` DATE,
    `type` ENUM ('JAZZ', 'DANCE','FOOD')
);

CREATE TABLE IF NOT EXISTS `tickets`
(
    `id`       VARCHAR(100) NOT NULL,
    `user_id`  int(11)      NOT NULL,
    `event_id` int(11)      NOT NULL,
    `checkin`  TINYINT,
    PRIMARY KEY
(
    id
),
    FOREIGN KEY
(
    user_id
) REFERENCES users
(
    id
),
    FOREIGN KEY
(
    event_id
) REFERENCES events
(
    id
)
    );


insert into events (id, date, type)
values (1, DATE_ADD(curdate(), interval + 4 DAY), 'JAZZ');
insert into events (id, date, type)
values (2, DATE_ADD(curdate(), interval + 4 DAY), 'FOOD');
insert into events (id, date, type)
values (3, DATE_ADD(curdate(), interval + 4 DAY), 'DANCE');
