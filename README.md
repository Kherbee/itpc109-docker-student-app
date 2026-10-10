# ITPC 109 Docker Student Information System

## Project Overview

This project is a Student Information Management web application
developed using PHP, MySQL, Apache, Docker Compose, and GitHub.

The application allows users to create, view, update, and delete
student records through a web browser.

## Technologies Used

- PHP 8.3
- Apache Web Server
- MySQL 8.4
- phpMyAdmin
- Docker and Docker Compose
- Git and GitHub
- HTML and CSS

## Application Architecture

Browser → Apache/PHP Container → PHP PDO → MySQL Container

Docker Compose manages the web, database, and phpMyAdmin services.

The MySQL database uses a named Docker volume for persistent storage.

## Requirements

Before running the project, install:

- Docker Desktop
- Git

## Installation and Setup

1. Clone the GitHub repository:

   git clone https://github.com/YOUR-USERNAME/itpc109-docker-student-app.git

2. Open the project directory:

   cd itpc109-docker-student-app

3. Build and start the Docker containers:

   docker compose up -d --build

4. Check the running containers:

   docker compose ps

5. Open the web application in a browser.

## Application URLs

Student Information Management:
http://localhost:8080

phpMyAdmin:
http://localhost:8081

## Database Information

Database Name: student_db

Database Table: students

Database Service Hostname: db

The database is initialized through db/init.sql.

The database contains fictional student records for testing.
The local test credentials are configured in compose.yaml.
Do not reuse these credentials in production.

## CRUD Features

Create - Add a new student record.

Read - Display the existing student records.

Update - Edit and update student information.

Delete - Remove a selected student record.

The application uses PDO prepared statements for
database modification operations.

## Docker Commands

Build and start:
docker compose up -d --build

View running containers:
docker compose ps

View web server logs:
docker compose logs web --tail=50

Stop the containers:
docker compose down

Start existing containers:
docker compose up -d

## Database Persistence

The application uses the named Docker volume mysql_data.

Student records remain stored after the containers
are stopped and restarted normally.

Running docker compose down -v removes the
database volume and its stored data.

## Developer Information

Student Names: 
Gengania, Raymund C. 
Lagrana, John Kherbee M. 
Mendoza, Cyrus A.
Picazo, Mark Riebenz G. 
Rillera, Jake V. 

Section: 3C

Subject: ITPC 109 - Web Systems and Technologies

## Project Purpose

This laboratory demonstrates how PHP, Apache,
MySQL, Docker, and GitHub can work together
to deploy and manage a server-side web application.