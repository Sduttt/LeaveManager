# Employee Leave Management System


**This project is live on the following link: [Leave Management System](https://leavemanagersduttt.azurewebsites.net/)**

## Description
This is a simple leave management system for employees. It is built using php and Tailwind CSS.

## Instructions to run this ptoject
1. Clone this repository to your local machine.
2. Install XAMPP or WAMPP.
3. Start Apache and MySQL in XAMPP or WAMPP.
4. Copy this project to htdocs folder of XAMPP
5. Open phpMyAdmin in your browser.
6. Create a database named `LeaveManager` which has tables: `admins`.
7. Run the following SQL commands in the SQL tab of phpMyAdmin.
```sql
CREATE DATABASE `LeaveManager`;

CREATE TABLE `LeaveManager`.`admins` (
    `id` INT(5) NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(30) NOT NULL , 
    `email` VARCHAR(30) NOT NULL , 
    `password` VARCHAR(252) NOT NULL , 
    `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `LeaveManager`.`employees` (
    `adminID` INT(5) NOT NULL , 
    `employeeID` VARCHAR(5) NOT NULL , 
    `name` VARCHAR(30) NOT NULL , 
    `email` VARCHAR(30) NOT NULL , 
    `designation` VARCHAR(30) NOT NULL , 
    `totalLeave` INT(2) NOT NULL 
) ENGINE = InnoDB;

CREATE TABLE `LeaveManager`.`employee_auth` (
    `employeeID` VARCHAR(5) NOT NULL , 
    `email` VARCHAR(30) NOT NULL , 
    `password` VARCHAR(252) NOT NULL , 
    `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
) ENGINE = InnoDB;

CREATE TABLE `LeaveManager`.`leave_details` (
    `leaveID` INT(10) NOT NULL AUTO_INCREMENT,
    `employeeID` VARCHAR(5) NOT NULL,
    `adminID` VARCHAR(5) NOT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE NOT NULL,
    `total_days` INT NOT NULL,
    `type` ENUM('paid', 'unpaid') NOT NULL,
    `reason` ENUM('health', 'family', 'vacation', 'personal') NOT NULL,
    `isApproved` BOOLEAN NOT NULL,
    `isRejected` BOOLEAN NOT NULL,
    `admin_message` VARCHAR(300) DEFAULT NULL,
    `timestamp` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`leaveID`)
) ENGINE = InnoDB;

CREATE TABLE `LeaveManager`.`leave_account` (
    `employeeID` VARCHAR(5) NOT NULL , 
    `total_leaves` INT(3) NOT NULL , 
    `used_leaves` INT(3) NOT NULL , 
    `pending_leaves` INT(3) NOT NULL , 
    `remaining_leaves` INT(3) NOT NULL 
) ENGINE = InnoDB;


```


