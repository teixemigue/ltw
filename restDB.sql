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
    user INT NOT NULL,
    owner INT NOT NULL);

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