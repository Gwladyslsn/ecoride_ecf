-- Active: 1748279906913@@127.0.0.1@3307@ecoride
CREATE DATABASE ecoride;
USE ecoride;

CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name_user VARCHAR(255),
    lastname_user VARCHAR(255),
    dob_user DATE,
    email_user VARCHAR(255),
    password_user VARCHAR(255),
    phone_user VARCHAR(12),
    postcode_user VARCHAR(10),
    photo_user VARCHAR(255),
    credit_user INT,
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES role(id_role)
);



CREATE TABLE role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    name_role VARCHAR(255)
);



INSERT INTO role (name_role) VALUES 
("chauffeur"),
("passager"),
("chauffeur-passager");


CREATE TABLE admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    name_admin VARCHAR(255),
    lastname_admin VARCHAR(255),
    email_admin VARCHAR(255),
    password_admin VARCHAR(255),
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES role(id_role)
);



CREATE TABLE employee (
    id_employee INT AUTO_INCREMENT PRIMARY KEY,
    name_employee VARCHAR(255),
    lastname_employee VARCHAR(255),
    email_employee VARCHAR(255),
    password_employee VARCHAR(255),
    dateHire_employee DATE,
    id_role INT,
    FOREIGN KEY (id_role) REFERENCES role(id_role)
);



CREATE TABLE car (
    id_car INT AUTO_INCREMENT PRIMARY KEY,
    brand_car VARCHAR(255),
    model_car VARCHAR(255),
    color_car VARCHAR(255),
    year_car DATE,
    energy_car VARCHAR(255),
    licensePlate_car VARCHAR(10),
    firstPlate_car DATE,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE carpooling (
    id_carpooling INT AUTO_INCREMENT PRIMARY KEY,
    departure_date DATE,
    arrival_date DATE,
    departure_hour TIME,
    arrival_hour TIME,
    departure_city VARCHAR(255),
    arrival_city VARCHAR(255),
    nb_place INT,
    price_place INT,
    id_car INT,
    FOREIGN KEY (id_car) REFERENCES car(id_car)
);

CREATE TABLE Participer (
    id_carpooling INT,
    id_user INT,
    PRIMARY KEY (id_carpooling, id_user),
    FOREIGN KEY (id_carpooling) REFERENCES carpooling(id_carpooling),
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

CREATE TABLE reviews (
    id_reviews INT AUTO_INCREMENT PRIMARY KEY,
    note_reviews INT,
    date_reviews DATE,
    comment_reviews TEXT,
    status_reviews VARCHAR(255),
    id_user INT,
    id_carpooling INT,
    id_employee INT,
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_carpooling) REFERENCES carpooling(id_carpooling),
    FOREIGN KEY (id_employee) REFERENCES employee(id_employee)
);

CREATE TABLE user_preferences (
    id_preferences INT AUTO_INCREMENT PRIMARY KEY,
    smoker BOOL,
    pet BOOL
);

CREATE TABLE Avoir (
    id_user INT,
    id_preferences INT,
    PRIMARY KEY (id_user, id_preferences),
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_preferences) REFERENCES user_preferences(id_preferences)
);

SELECT * FROM user;


