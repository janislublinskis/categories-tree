drop table if exists categories;

create table `categories`
(
    id int auto_increment,
    pid int NULL,
    name varchar(100),
    description varchar(255),
    created_at datetime not null,
    updated_at datetime not null,
    constraint categories_pk
        primary key (id),
    constraint categories_categories_id_fk
        foreign key (pid) references categories (id)
            on update cascade on delete cascade
);

create unique index categories_id_uindex
on categories (id);

create unique index categories_name_uindex
on categories (name);

INSERT INTO `categories` (`id`, `pid`,`name`, `description`,`created_at`,`updated_at`) VALUES
(1, NULL, 'Auto', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(2, 1, 'Moto', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(3, 1, 'Mazda', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(4, 1, 'Honda', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(5, 2, 'Kawasaki', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(6, 2, 'Harley', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(7, 3, 'Mazda 3', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(8, 3, 'Mazda 6', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(9, 7, 'Sedan', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(10, 7, 'Hatchback', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(11, NULL, 'Boats', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(12, 8, 'Liftback', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(13, 8, 'Crossover', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(14, 13, 'White', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(15, 13, 'Red', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(16, 13, 'Black', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(17, 13, 'Green', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(18, 3, 'Mazda SX', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(19, 3, 'LRed', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(20, 15, 'NormalR', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(21, 15, 'DRed', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(22, 20, 'Percent10Red', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(23, 20, 'Percent15Red', 'Lorem ipsum dolor sit amet','2020-12-15 18:56:46', '2020-12-15 18:56:46'),
(24,11,'Abta','kadabra','2020-12-15 18:56:46','2020-12-16 16:34:17');
