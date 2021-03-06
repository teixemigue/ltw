.mode columns
.headers on

drop table if exists User;
drop table if exists Dish;
drop table if exists Restaurant;
drop table if exists Review;
drop table if exists Request;
drop table if exists Favorite;

create table User(

    idUser INT PRIMARY KEY,
    name TEXT NOT NULL,
    userName TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    address TEXT NOT NULL,
    email TEXT NOT NULL,
    phoneNumber TEXT UNIQUE NOT NULL,
    photo TEXT,
    option TEXT
    );

create table Dish(

    idDish INT PRIMARY KEY,
    name TEXT NOT NULL,
    price REAL NOT NULL,
    photo TEXT,
    descrip TEXT,
    category TEXT NOT NULL,
    restaurant INT REFERENCES Restaurant ON DELETE SET NULL ON UPDATE CASCADE
);

create table Restaurant(

    idRestaurant INT PRIMARY KEY,
    name TEXT UNIQUE NOT NULL,
    address TEXT NOT NULL,
    photo TEXT NOT NULL,
    category TEXT NOT NULL

);

create table Review(

    idReview INT PRIMARY KEY,
    grade INT NOT NULL,
    date TEXT NOT NULL,
    user INT REFERENCES User ON DELETE SET NULL ON UPDATE CASCADE,
    restaurant INT REFERENCES Restaurant ON DELETE SET NULL ON UPDATE CASCADE
);

create table Request(

    idOrder INT PRIMARY KEY,
    price REAL NOT NULL,
    quantity INT NOT NULL,
    date TEXT NOT NULL,
    state TEXT NOT NULL,
    user INT REFERENCES User ON DELETE SET NULL ON UPDATE CASCADE,
    restaurant INT REFERENCES Restaurant ON DELETE SET NULL ON UPDATE CASCADE,
    dish INT REFERENCES Dish ON DELETE SET NULL ON UPDATE CASCADE
);

create table Favorite(

    user INT REFERENCES User ON DELETE SET NULL ON UPDATE CASCADE,
    restaurant INT REFERENCES Restaurant ON DELETE SET NULL ON UPDATE CASCADE,
    PRIMARY KEY(user, restaurant)
);

PRAGMA foreign_keys = ON;


/* users */

insert into User values (
    1,
    "Tester",
    "tester",
    "***",
    "feup",
    "tester@gmail.com",
    "935768549",
    "photos\User_font_awesome.svg.png",
    "tester"
    
);
/*restaurant*/

insert into Restaurant values(

    1,
    "pizaplex",
    "rua da pizza",
    "photo",
    "categoria"
);

/* prato */
insert into Dish values(

    1,
    "pizza",
    12.30,
    "photos\img.jpg",
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    2,
    "pizza",
    12.30,
    "photos\dis2.jpg",
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    3,
    "pizza",
    12.30,
    "photos\dis3.jpg",
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    4,
    "pizza",
    12.30,
    "photos\dis4.jpg",
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    5,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    6,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    7,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    8,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    9,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    10,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    11,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    12,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    13,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    14,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    15,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    16,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    17,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    18,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    19,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    20,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    21,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    22,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    23,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    24,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    25,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    26,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    27,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    28,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    29,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    30,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    31,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    32,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    33,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    34,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);
insert into Dish values(

    35,
    "pizza",
    12.30,
    NULL,
    "E muito bom",
    "peixe",
    1
);

