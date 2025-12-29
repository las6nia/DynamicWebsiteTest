# Painted Horizons – Service Request Web Application

## 📌 Project Overview

This project is a **full-stack PHP web application** designed to simulate a real-world service request workflow for a small business. It focuses on clean user experience, secure data handling, and backend automation using PHP, MySQL, and external libraries.

Users submit a service request through a web form by entering their name, email, phone number, selected service, address, and project details. Upon submission, the system generates a **unique confirmation number**, stores the request in a **MySQL database**, and displays the confirmation number back to the user for reference.

In addition to database storage, the project integrates **email notification functionality** using **PHPMailer**, demonstrating how external libraries can be used to extend PHP’s native capabilities.

---

## 🧾 Features

- Dynamic service request form (name, email, phone, service, address, notes)
- Automatic confirmation number generation
- Secure database storage using MySQL (phpMyAdmin)
- Confirmation message displayed after successful submission
- Email notifications sent using PHPMailer
- Clean UI with responsive layout and styling
- Server-side validation and prepared SQL statements

---

## 🗄️ Database Integration

Form submissions are stored in a MySQL database using SQL and PHP. Each entry includes:

- Confirmation code
- Customer name
- Email address
- Phone number
- Selected service
- Job location
- Project notes
- Timestamp of submission

This allows submissions to be tracked, queried, and reviewed through **phpMyAdmin**.

---

## 📧 Email Functionality

The application uses **PHPMailer** to send email notifications when a form is submitted. This demonstrates the use of external resources and libraries within a PHP project to handle real-world requirements such as automated email delivery.

---

## 🛠️ Technologies Used

- **PHP**
- **MySQL / phpMyAdmin**
- **SQL**
- **PHPMailer**
- **HTML5**
- **CSS3**
- **XAMPP (Apache + MySQL)**

---

## 🎯 Purpose

This project was built to practice and demonstrate:
- Backend form processing
- Database-driven web applications
- PHP–MySQL integration
- External library usage in PHP
- Real-world full-stack development patterns

It mirrors workflows commonly found in production service-based applications.

---

## 📷 Screenshots

- Service request form with confirmation number display  
- phpMyAdmin database showing stored submissions  
- PHPMailer integration using external resources  

(See images in the repository for reference.)

---

## 🚀 Future Improvements

- Admin dashboard to view and manage requests
- Email confirmation sent to the customer
- Input sanitization and validation enhancements
- Deployment to a live server environment

---

## 📄 License

This project is for educational and portfolio purposes.
