.mode columns
.headers on

drop table if exists User;
drop table if exists Dish;
drop table if exists Restaurant;
drop table if exists Review;
drop table if exists Request;
drop table if exists FavoriteRestaurant;
drop table if exists FavoriteDish;

create table User(

    idUser INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    userName TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    address TEXT NOT NULL,
    email TEXT NOT NULL,
    phoneNumber TEXT UNIQUE NOT NULL,
    photo TEXT NOT NULL,
    option TEXT
);

create table Dish(

    idDish INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    price REAL NOT NULL,
    photo TEXT NOT NULL,
    descrip TEXT,
    category TEXT NOT NULL,
    restaurant INT REFERENCES Restaurant ON DELETE CASCADE ON UPDATE CASCADE
);

create table Restaurant(

    idRestaurant INTEGER PRIMARY KEY,
    name TEXT UNIQUE NOT NULL,
    address TEXT NOT NULL,
    photo TEXT NOT NULL,
    category TEXT NOT NULL,
    idOwner INT REFERENCES User ON DELETE CASCADE ON UPDATE CASCADE

);

create table Review(

    idReview INTEGER PRIMARY KEY,
    grade INT NOT NULL,
    date TEXT NOT NULL,
    user INT REFERENCES User ON DELETE CASCADE ON UPDATE CASCADE,
    restaurant INT REFERENCES Restaurant ON DELETE CASCADE ON UPDATE CASCADE
);

create table Request(

    idorder INT NOT NULL,
    price REAL NOT NULL,
    quantity INT NOT NULL,
    date TEXT NOT NULL,
    state TEXT NOT NULL,
    user INT REFERENCES User ON DELETE CASCADE ON UPDATE CASCADE,
    restaurant INT REFERENCES Restaurant ON DELETE CASCADE ON UPDATE CASCADE,
    dish INT REFERENCES Dish ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(user, restaurant, dish, idorder)
);

create table FavoriteRestaurant(

    user INT REFERENCES User ON DELETE CASCADE ON UPDATE CASCADE,
    restaurant INT REFERENCES Restaurant ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(user, restaurant)
);

create table FavoriteDish(

    user INT REFERENCES User ON DELETE CASCADE ON UPDATE CASCADE,
    dish INT REFERENCES Dish ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(user, dish)
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
    "/../photos/user/default.jpg",
    "tester"
    
);
/*restaurant*/

insert into Restaurant values(

    1,
    "pizaplex",
    "rua da pizza",
    "photo",
    "Italian",
    1
);

insert into Restaurant values(

    2,
    "sushi place",
    "rua do sushi",
    "photo",
    "Japanese",
    1
);

insert into Restaurant values(

    3,
    "100 montaditos",
    "rua do S. João",
    "photo",
    "Traditional",
    1
);

/* prato */
insert into Dish values(

    1,
    "novo prato",
    12.30,
    "photos\img.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    2,
    "pizza",
    12.30,
    "photos\dis2.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    3,
    "pizza",
    12.30,
    "photos\dis3.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    4,
    "pizza",
    12.30,
    "photos\dis4.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    5,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    6,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    7,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    8,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    9,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    10,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    11,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    12,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    13,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    14,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    15,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    16,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    17,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    18,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    19,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    20,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    21,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    22,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    23,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    24,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    25,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    26,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    27,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    28,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    29,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    30,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    31,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    32,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    33,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    34,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);
insert into Dish values(

    35,
    "pizza",
    12.30,
    "photos\default.jpg",
    "E muito bom",
    "Pizza",
    1
);

/* review */ 

insert into Review values(
    1,
    4,
    "13-02-2021",
    1,
    1
);