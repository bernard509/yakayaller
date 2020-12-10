

CREATE TABLE `event` (
    `event_id` integer  NOT NULL ,
    `address_id` integer  NOT NULL ,
    `category_id` integer  NOT NULL ,
    `title` varchar(255)  NOT NULL ,
    `description` text  NOT NULL ,
    `start_date` date  NOT NULL ,
    `end_date` date  NOT NULL ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    `link` text  NOT NULL ,
    PRIMARY KEY (
        `event_id`
    )
);

CREATE TABLE `category` (
    `category_id` integer  NOT NULL ,
    `category_label` varchar(255)  NOT NULL ,
    `category_category_id` integer  NOT NULL ,
    PRIMARY KEY (
        `category_id`
    )
);

CREATE TABLE `address` (
    `address_id` integer  NOT NULL ,
    `user_id` integer  NOT NULL ,
    `country_id` integer  NOT NULL ,
    `address` varchar(255)  NOT NULL ,
    `complement` varchar(255)  NOT NULL ,
    `zipcode` varchar(255)  NOT NULL ,
    `city` varchar(255)  NOT NULL ,
    `longitude` float  NOT NULL ,
    `latitude` float  NOT NULL ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `address_id`
    )
);

CREATE TABLE `user` (
    `user_id` integer  NOT NULL ,
    `user_public_id` varchar(255)  NOT NULL ,
    `civility` varchar(20)  NOT NULL ,
    `firstname` varchar(255)  NOT NULL ,
    `lastname` varchar(255)  NOT NULL ,
    `birthdate` varchar(20)  NOT NULL ,
    `email` varchar(255)  NOT NULL ,
    `password` varchar(255)  NOT NULL ,
    `phone` varchar(20)  NOT NULL ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `user_id`
    )
);

CREATE TABLE `notification` (
    `notification_id` integer  NOT NULL ,
    `request_id` integer  NOT NULL ,
    `by_day` boolean  NOT NULL ,
    `by_week` boolean  NOT NULL ,
    `active` boolean  NOT NULL ,
    PRIMARY KEY (
        `notification_id`
    )
);

CREATE TABLE `request` (
    `request_id` integer  NOT NULL ,
    `user_id` integer  NOT NULL ,
    `request_title` varchar(255)  NOT NULL ,
    `keywords` text  NOT NULL ,
    `request_longitude` float  NOT NULL ,
    `request_latitude` float  NOT NULL ,
    `distance` integer  NOT NULL ,
    `start_date` datetime  NOT NULL ,
    `end_date` datetime  NOT NULL ,
    PRIMARY KEY (
        `request_id`
    )
);

CREATE TABLE `request_category` (
    `category_id` integer  NOT NULL ,
    `request_id` integer  NOT NULL 
);

CREATE TABLE `country` (
    `country_id` integer  NOT NULL ,
    `country_label` varchar(255)  NOT NULL ,
    `code` varchar(5)  NOT NULL ,
    PRIMARY KEY (
        `country_id`
    )
);

CREATE TABLE `publish` (
    `publish_id` integer  NOT NULL ,
    `event_id` integer  NOT NULL ,
    `user_id` integer  NOT NULL ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `publish_id`
    )
);

CREATE TABLE `payment` (
    `payment_id` integer  NOT NULL ,
    `publish_id` integer  NOT NULL ,
    `ht_amount` float  NOT NULL ,
    `ttc_amount` float  NOT NULL ,
    `status` varchar(20)  NOT NULL ,
    `created_at` datetime  NOT NULL ,
    `updated_at` datetime  NOT NULL ,
    PRIMARY KEY (
        `payment_id`
    )
);

ALTER TABLE `event` ADD CONSTRAINT `fk_event_address_id` FOREIGN KEY(`address_id`)
REFERENCES `address` (`address_id`);

ALTER TABLE `event` ADD CONSTRAINT `fk_event_category_id` FOREIGN KEY(`category_id`)
REFERENCES `category` (`category_id`);

ALTER TABLE `category` ADD CONSTRAINT `fk_category_category_category_id` FOREIGN KEY(`category_category_id`)
REFERENCES `category` (`category_id`);

ALTER TABLE `address` ADD CONSTRAINT `fk_address_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`user_id`);

ALTER TABLE `address` ADD CONSTRAINT `fk_address_country_id` FOREIGN KEY(`country_id`)
REFERENCES `country` (`country_id`);

ALTER TABLE `notification` ADD CONSTRAINT `fk_notification_request_id` FOREIGN KEY(`request_id`)
REFERENCES `request` (`request_id`);

ALTER TABLE `request` ADD CONSTRAINT `fk_request_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`user_id`);

ALTER TABLE `request_category` ADD CONSTRAINT `fk_request_category_category_id` FOREIGN KEY(`category_id`)
REFERENCES `category` (`category_id`);

ALTER TABLE `request_category` ADD CONSTRAINT `fk_request_category_request_id` FOREIGN KEY(`request_id`)
REFERENCES `request` (`request_id`);

ALTER TABLE `publish` ADD CONSTRAINT `fk_publish_event_id` FOREIGN KEY(`event_id`)
REFERENCES `event` (`event_id`);

ALTER TABLE `publish` ADD CONSTRAINT `fk_publish_user_id` FOREIGN KEY(`user_id`)
REFERENCES `user` (`user_id`);

ALTER TABLE `payment` ADD CONSTRAINT `fk_payment_publish_id` FOREIGN KEY(`publish_id`)
REFERENCES `publish` (`publish_id`);

