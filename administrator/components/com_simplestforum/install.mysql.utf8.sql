CREATE TABLE IF NOT EXISTS `#__simplestforum_forum` (
    `id` int auto_increment not null,
    `name` varchar(100),
    `description` text,

    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `#__simplestforum_post` (
    `id` int auto_increment not null,
    `subject` varchar(255),
    `message` text,
    `authorId` varchar(25),
    `parentId` int,
    `thread` int,
    `depth` int,
    `forumId` int,
    `date` datetime,

    PRIMARY KEY(`id`)
);
