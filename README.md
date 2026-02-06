# Notes App

A simple notes-taking application built with a custom semi-framework from scratch using PHP.

## Database Setup

Create two tables:

**users:**
- id
- name
- email
- password

**notes:**
- id
- body
- user_id

## Configuration

Edit `config.php` and set your database credentials:
- username
- password
- host
- dbname

## Run
```bash
php -S localhost:8000 -t public
```
