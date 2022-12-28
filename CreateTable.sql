/**********************************************************************
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/21/22
 * HOMEWORK: Final Project
 * DESCRIPTION: This file creates the schema for Travel Slate.
 **********************************************************************/

-- DROP TABLE Statements:
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS SavedPlan;
DROP TABLE IF EXISTS Plan;
DROP TABLE IF EXISTS Price;
DROP TABLE IF EXISTS Location;
DROP TABLE IF EXISTS Account;

-- CREATE TABLE Statements:
-- Account provides information about a user's account and related personal info
CREATE TABLE Account(
    user VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY (user)
);

CREATE TABLE Location(
    location_id INT UNSIGNED NOT NULL,
    city VARCHAR(50) NOT NULL,
    province VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    size INT UNSIGNED NOT NULL, -- approx. population
    type VARCHAR(50) NOT NULL,
    main_attraction VARCHAR(50) NOT NULL,
    safety INT UNSIGNED NOT NULL,
    PRIMARY KEY(location_id),
    CONSTRAINT safety CHECK (safety >= 0 AND safety <= 10)
);

-- Price provides information about different vacation packages that are determined by quality and time 
CREATE TABLE Price(
    package_type VARCHAR(50) NOT NULL,
    amount DECIMAL(8, 2) UNSIGNED NOT NULL,
    trip_time DECIMAL(4, 1) UNSIGNED NOT NULL,
    travel_time DECIMAL(4, 1) UNSIGNED NOT NULL,
    PRIMARY KEY (package_type)
);

-- Plan provides information about a specific plan's 
CREATE TABLE Plan(
    plan_id INT UNSIGNED NOT NULL,
    description TEXT NOT NULL,
    rating INT UNSIGNED NOT NULL, -- from 0-10
    price_package VARCHAR(50) NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (plan_id),
    FOREIGN KEY (price_package)
        REFERENCES Price(package_type),
    FOREIGN KEY (location_id)
        REFERENCES Location(location_id),
    CONSTRAINT rating CHECK (rating >= 0 AND rating <= 10)
);

-- SavedPlan holds the plans that have been added to a certain user's library
CREATE TABLE SavedPlan(
    user VARCHAR(50) NOT NULL,
    plan_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (user, plan_id),
    FOREIGN KEY (user)
        REFERENCES Account(user),
    FOREIGN KEY (plan_id)
        REFERENCES Plan(plan_id)
);

CREATE TABLE Review(
    review_id INT NOT NULL AUTO_INCREMENT,
    title TINYTEXT NOT NULL,
    description TEXT NOT NULL,
    rating INT UNSIGNED NOT NULL, -- from 0-10
    plan_id INT UNSIGNED NOT NULL,
    user VARCHAR(50) NOT NULL,
    PRIMARY KEY (review_id),
    FOREIGN KEY (plan_id)
        REFERENCES Plan(plan_id),
    FOREIGN KEY (user)
        REFERENCES Account(user),
    CONSTRAINT rating CHECK (rating >= 0 AND rating <= 10) 
);