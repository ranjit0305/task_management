# task_management
# Task Management Tool

A simple web-based task management application that allows users to create, update, delete, and track their tasks. The tool also prevents scheduling conflicts by ensuring no two tasks are added for the same date and time. 

## Features

- **Create Tasks**: Users can create tasks with a title, description, deadline, and specific time.
- **Unique Task Scheduling**: Prevents adding multiple tasks at the same date and time.
- **Task Status Management**: Update the status of tasks (Pending, In Progress, Completed).
- **Delete Tasks**: Users can delete tasks that are no longer needed.
- **View Tasks**: Displays a list of tasks with details such as title, description, deadline, time, and status.

## Project Overview

This project is built using **PHP** for the backend and **MySQL** as the database. The front-end uses HTML and basic CSS to present the task input form and task list. It ensures that users can manage their tasks efficiently, without scheduling conflicts.

## Table of Contents

- [Features](#features)
- [Project Overview](#project-overview)
- [Installation](#installation)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-username/your-repo-name.git
Install XAMPP/WAMP/MAMP (or any PHP server with MySQL).

Start the server:

Move the project folder into the htdocs directory of XAMPP (for WAMP, move it to www).
Set up the MySQL database:

Start Apache and MySQL from XAMPP/WAMP.
Open phpMyAdmin (http://localhost/phpmyadmin/).
Create a new database called task_management.
Import the SQL file located in the db/ folder to create the necessary tables.

Alternatively, run this SQL command in phpMyAdmin:

CREATE DATABASE task_management;

USE task_management;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status ENUM('pending', 'in progress', 'completed') DEFAULT 'pending',
    deadline DATE,
    time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Update Database Configuration:

Edit the config.php file and update it with your database connection details:

<?php
$host = 'localhost';
$db = 'task_management';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
Access the application:

Open your browser and go to http://localhost/task_management/.
Usage
Add Tasks: Navigate to the homepage and use the form to add new tasks. Ensure that no two tasks overlap by date and time.
View Tasks: All tasks are displayed in a table with options to update the status or delete them.
Update Tasks: Use the dropdown menu to update the status of tasks.
Delete Tasks: Delete tasks by clicking the "Delete" button next to each task.
Screenshots
Task Management Interface

Technologies Used
Frontend: HTML, CSS
Backend: PHP
Database: MySQL
Hosting: Deployed locally using XAMPP/WAMP
Contributing
Contributions are welcome! If you'd like to contribute to this project, please fork the repository and use a feature branch. Pull requests are warmly welcomed.

Fork the project
Create your feature branch: git checkout -b my-new-feature
Commit your changes: git commit -m 'Add some feature'
Push to the branch: git push origin my-new-feature
Open a pull request
