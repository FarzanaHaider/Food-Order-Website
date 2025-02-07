🍔 Food Order Website

The Food Order Website is a web-based application designed to provide a seamless online food ordering experience. Customers can browse the menu, add items to their cart, and place orders efficiently.

🛠 Features

Responsive Design: Works on all devices (mobile, tablet, and desktop).

Dynamic Menu Management: Easily add, update, or delete food items.

User-Friendly Interface: Simple and intuitive navigation.

Order Management System: View, manage, and process orders.

Search and Filter: Quickly find desired food items.

🚀 Technologies Used

Frontend: HTML, CSS

Backend: PHP

Database: MySQL

🛠️ How to Build and Run This Project

Follow these steps to set up and run the Food Order Website on your local machine.

📌 Prerequisites

Before starting, ensure you have the following installed on your system:

PHP (>= 8.x)

MySQL (or any other database)

Apache/Nginx (for serving PHP applications)

Git

🔽 Clone the Repository

git clone https://github.com/FarzanaHaider/Food-Order-Website.git

📦 Install Dependencies

Ensure PHP and MySQL are running properly.

If required, configure the necessary PHP extensions (such as mysqli).

⚙️ Set Up Database

Create a new database in MySQL:

CREATE DATABASE food_order_db;

Import the provided SQL file into your database:

mysql -u your_username -p food_order_db < database/food_order.sql

Configure database settings in config.php (if applicable):

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_database_user');
define('DB_PASSWORD', 'your_database_password');
define('DB_NAME', 'food_order_db');

🚀 Start the Server

If using Apache with PHP:

php -S localhost:8000

Then open http://localhost:8000 in your browser.

If using XAMPP or WAMP, place the project inside the htdocs directory and access it via:
http://localhost/Food-Order-Website/


