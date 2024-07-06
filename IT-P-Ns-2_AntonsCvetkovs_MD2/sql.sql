drop database if exists rally;

create database rally;

create table rally.sacensibas (
    id bigint primary key auto_increment,
    name varchar(255) not null,
    address varchar(255) not null,
    start_date datetime not null,
    end_date datetime not null
);

create table rally.sponsori (
    id bigint primary key auto_increment,
    name varchar(255) not null,
    url varchar(255) not null,
    logo varchar(255) not null,
    phone_number int8 not null,
    notes text
);

create table rally.sacensibas_sponsori (
    sacensibas bigint not null,
    sponsors bigint not null,
    primary key (sacensibas, sponsors),
    foreign key (sacensibas) references rally.sacensibas(id),
    foreign key (sponsors) references rally.sponsori(id)
);

insert into rally.sacensibas
    (name, address, start_date, end_date)
values
    ('Championship in Riga', 'Latvia, Riga, Street in Riga 5', str_to_date('2021-01-03', '%Y-%m-%d'), str_to_date('2021-01-06', '%Y-%m-%d')),
    ('Championship in Ogre', 'Latvia, Ogre, Street in Ogre 3', str_to_date('2021-01-23', '%Y-%m-%d'), str_to_date('2021-01-26', '%Y-%m-%d')),
    ('Championship in Vilnius', 'Lithuania, Vilnius, Street in Vilnius 56', str_to_date('2022-01-03', '%Y-%m-%d'), str_to_date('2022-01-06', '%Y-%m-%d')),
    ('Championship in Klaipeda', 'Lithuania, Klaipeda, Street in Klaipeda 45', str_to_date('2022-01-23', '%Y-%m-%d'), str_to_date('2022-01-26', '%Y-%m-%d')),
    ('Championship in Tallinn', 'Estonia, Tallinn, Street in Tallinn 23', str_to_date('2023-01-03', '%Y-%m-%d'), str_to_date('2023-01-06', '%Y-%m-%d')),
    ('Championship in Tartu', 'Estonia, Tartu, Street in Tartu 67', str_to_date('2023-01-23', '%Y-%m-%d'), str_to_date('2023-01-26', '%Y-%m-%d'));

insert into rally.sponsori
    (name, url, logo, phone_number, notes)
values
    ('DD', 'https://www.alberta-koledza.lv', 'dd.png', 29292929, 'Some notes about DD'),
    ('Monkey App', 'https://www.alberta-koledza.lv', 'monkey_app.png', 28282828, 'Some notes about Monkey App'),
    ('Diamond', 'https://www.alberta-koledza.lv', 'diamond.png', 27272727, 'Some notes about Diamond'),
    ('Random Incorporated', 'https://www.alberta-koledza.lv', 'random_incorporated.png', 26262626, 'Some notes about Random Incorporated');

insert into rally.sacensibas_sponsori
    (sacensibas, sponsors)
values
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (2, 1),
    (2, 2),
    (2, 3),
    (2, 4),
    (3, 1),
    (3, 2),
    (3, 3),
    (3, 4),
    (4, 1),
    (4, 2),
    (4, 3),
    (4, 4),
    (5, 1),
    (5, 2),
    (5, 3),
    (5, 4),
    (6, 1),
    (6, 2),
    (6, 3),
    (6, 4);
