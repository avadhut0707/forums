# forums
Forum project based on PHP

**Forums** is a lightweight discussion platform built with **PHP and MySQL**. It’s designed as a practice project to explore **CRUD operations**, **user authentication**, and building a clean, responsive UI.

Think of it as a simplified version of platforms like Stack Overflow – users can ask questions, reply with answers, and engage in threaded conversations, while guests can browse content without logging in.

---

## Features

* **User Registration & Login**
  Secure signup and login system with password hashing for safe authentication.

* **Ask & Answer Questions**
  Registered users can create new questions and post answers to existing threads.

* **Guest Access**
  Visitors without an account can still read questions and answers but cannot participate.

* **Category-Based Browsing**
  Questions are organized by categories for easy navigation.

* **Responsive Layout**
  Built with **Bootstrap 5**, ensuring a clean, mobile-friendly UI.

* **Session Handling**
  Proper session management with secure login/logout flow.

* **Security Practices**
  Uses prepared statements and session validation to prevent common vulnerabilities.

---

## Built With

* **PHP** (Core PHP – no frameworks)
* **MySQL** (database backend)
* **Bootstrap 5 & HTML5** (frontend layout & styling)
* **JavaScript** (basic form validation & interactivity)

---

## Installation

Follow these steps to set up **Forums** locally using WAMP/XAMPP:

### 1️ Clone the Repository

```bash
git clone https://github.com/avadhut0707/forums.git
```

### 2️ Import the Database

* Open **phpMyAdmin**.

* Create a new database named:

  ```
  forums
  ```

* Import the `forums.sql` file from the `database` folder of the cloned project.

### 3️ Configure Database Connection

Open `partials/_dbconnect.php` and update values if needed:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "forums";
```

### 4️ Run the Project

* Start **Apache** and **MySQL** in WAMP/XAMPP.
* Open your browser and visit:

```
http://localhost/forums/
```

Now, your **Forums** project should be running locally 

---

👉 Do you want me to also add **screenshots section + contribution guide** to make it look even more professional like GitHub open-source projects?
