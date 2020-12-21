drop table if exists users;

create table users
(
    id int auto_increment,
    username varchar(100) not null,
    email varchar(100) not null,
    password varchar(100) not null,
    created_at datetime not null,
    token varchar(100) null,
    tokenExpire_at datetime null,
    constraint users_pk
        primary key (id)
);

create unique index users_email_uindex
on users (email);

create unique index users_id_uindex
on users (id);

INSERT INTO `users` (id, username, email, password, created_at) VALUES
(1, 'Admin', 'admin@app.test', '43af55ba0e7f82395100e34839a5acb4', '2020-12-15 18:56:46');
