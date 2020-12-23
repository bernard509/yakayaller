
CREATE TABLE `event` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `uid` integer NOT NULL ,
    `address_id` integer  NOT NULL ,
    `category_id` integer,
    `title` varchar(255)  NOT NULL ,
    `description` text,
    `space_time_info` text,
    `start_date` date,
    `end_date` date,
    `link` text,
    `image` text,
    `image_thumb` text,
    `tags` text,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);
ALTER TABLE `event` ADD UNIQUE(`uid`);
ALTER TABLE `event` ADD INDEX(`uid`); 

CREATE TABLE `category` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `category_id` integer,
    `label` varchar(255)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `address` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `country_id` integer  NOT NULL ,
    `address` varchar(255)  NOT NULL ,
    `complement` varchar(255) ,
    `zipcode` varchar(255) ,
    `city` varchar(255) ,
    `city_district` varchar(255) ,
    `department` varchar(255) ,
    `region` varchar(255) ,
    `longitude` float ,
    `latitude` float ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `user` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `address_id` integer ,
    `public_id` varchar(255)  NOT NULL ,
    `civility` varchar(20)  NOT NULL ,
    `firstname` varchar(255) ,
    `lastname` varchar(255) ,
    `birthdate` varchar(20) ,
    `email` varchar(255)  NOT NULL ,
    `password` varchar(255)  NOT NULL ,
    `phone` varchar(20) ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `notification` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `request_id` integer  NOT NULL ,
    `by_day` boolean  NOT NULL ,
    `by_week` boolean  NOT NULL ,
    `active` boolean  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `request` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `user_id` integer  NOT NULL ,
    `title` varchar(255)  NOT NULL ,
    `keywords` text ,
    `city` varchar(255) ,
    `longitude` float ,
    `latitude` float ,
    `distance` integer ,
    `start_date` datetime ,
    `end_date` datetime ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `request_category` (
    `category_id` integer  NOT NULL ,
    `request_id` integer  NOT NULL 
);

CREATE TABLE `country` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `label` varchar(255)  NOT NULL ,
    `code` varchar(5)  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `publish` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `event_id` integer  NOT NULL ,
    `user_id` integer  NOT NULL ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

CREATE TABLE `payment` (
    `id` integer  NOT NULL AUTO_INCREMENT,
    `publish_id` integer  NOT NULL ,
    `ht_amount` float  NOT NULL ,
    `ttc_amount` float  NOT NULL ,
    `status` varchar(20)  NOT NULL ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `id`
    )
);

ALTER TABLE `event` ADD CONSTRAINT `fk_event_address_id` FOREIGN KEY(`address_id`)
REFERENCES `address` (`id`);

ALTER TABLE `event` ADD CONSTRAINT `fk_event_category_id` FOREIGN KEY(`category_id`)
REFERENCES `category` (`id`);

ALTER TABLE `category` ADD CONSTRAINT `fk_category_category_id` FOREIGN KEY(`category_id`)
REFERENCES `category` (`id`);

ALTER TABLE `address` ADD CONSTRAINT `fk_address_country_id` FOREIGN KEY(`country_id`)
REFERENCES `country` (`id`);

ALTER TABLE `notification` ADD CONSTRAINT `fk_notification_request_id` FOREIGN KEY(`request_id`)
REFERENCES `request` (`id`);

ALTER TABLE `request` ADD CONSTRAINT `fk_request_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`id`);

ALTER TABLE `request_category` ADD CONSTRAINT `fk_request_category_category_id` FOREIGN KEY(`category_id`)
REFERENCES `category` (`id`);

ALTER TABLE `request_category` ADD CONSTRAINT `fk_request_category_request_id` FOREIGN KEY(`request_id`)
REFERENCES `request` (`id`);

ALTER TABLE `publish` ADD CONSTRAINT `fk_publish_event_id` FOREIGN KEY(`event_id`)
REFERENCES `event` (`id`);

ALTER TABLE `publish` ADD CONSTRAINT `fk_publish_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`id`);

ALTER TABLE `payment` ADD CONSTRAINT `fk_payment_publish_id` FOREIGN KEY(`publish_id`)
REFERENCES `publish` (`id`);

ALTER TABLE `user` ADD CONSTRAINT `fk_user_address_id` FOREIGN KEY(`address_id`)
REFERENCES `address` (`id`);