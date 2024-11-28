# ORM Project

---

Group members: Alexandre GIBAULT

---
This project implements a lightweight 
**Object-Relational Mapping (ORM)** in PHP to interact with 
a MySQL database. It follows a modular architecture 
consisting of an **Adapter**, a **Repository**, 
and a **Manager**.

The ORM allows:
- **Reading** data via the Repository.
- **Writing** data via the Adapter.
- **Coordination** of operations via the Manager.

---

## Features

- **Adapter**: Handles direct database operations (e.g., writing, updating, deleting).
- **Repository**: Manages read operations, interfacing with the database via the Adapter.
- **Manager**: Coordinates reading and writing operations using both the Repository and Adapter.
- **Environment Configuration**: Loads database settings from a `.env` file.

---

## Prerequisites

Make sure the following tools are installed on your system:
- [PHP 8.3+](https://www.php.net/)
- [Composer](https://getcomposer.org/)

---

## Setup and Configuration

1. **Clone the Repository**
   ```bash
   git clone https://github.com/Alexandre-gibault-ynov/orm.git
   cd orm
   ```
2. Set up the Environment Create a .env file at the root of the project with the following content:
    ```
   DB_HOST=your-db-adress
   DB_NAME=your-db-name
   DB_USER=your-user-name
   DB_PASS=your-user-password
   DB_CHARSET=utf8mb4
   ```
    Make sure to put your values of the four beginning parameters.

3. Install Dependencies Run Composer to install the required dependencies

    ```bash
   composer install
   ```

4. Load the database configurations

    To load the database configurations add the following content to your php script
     that will use the `NewsEntityManager.php`: 
    ```php
   
   use App\Config\Config;
   
   Config::loadEnv(__DIR__ . 'path/to/.env');
   
   $dbConfig = Config::getDatabaseConfig();
   ```
   Make sure to assign the correct path to the `.env` file previously created.

Then run a script that will interact with the `NewsEntityManager.php`.