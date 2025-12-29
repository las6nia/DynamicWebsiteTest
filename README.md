# Painted Horizons – Service Request Web Application

## 📌 Project Overview

This project is a **full-stack PHP web application** designed to simulate a real-world service request workflow for a small business. It focuses on clean user experience, secure data handling, database integration, and backend automation using PHP, MySQL, and external libraries.

Users submit a service request through a web form by entering their name, email, phone number, selected service, address, and project details. Upon submission, the system generates a **unique confirmation number**, stores the request in a **MySQL database**, and displays the confirmation number back to the user for reference.

The application also integrates **email notification functionality using PHPMailer**, demonstrating how external libraries can extend PHP’s native capabilities.

---

## 🧾 Features

- Dynamic service request form
- Automatic confirmation number generation
- Secure MySQL database storage (phpMyAdmin)
- Confirmation message displayed after submission
- Email notifications via PHPMailer
- Responsive UI and clean layout
- Prepared SQL statements for database inserts

---

## 📝 Service Request Form

Below is the service request form where users enter their information and receive a confirmation number after submission:

![Service Request Form](https://github.com/user-attachments/assets/ad0ddf7b-a804-41a0-8b79-1ef86cf82db3)

---

## 🗄️ Database Integration (phpMyAdmin)

Form submissions are stored in a MySQL database using SQL and PHP. Each record includes:

- Confirmation code  
- Name  
- Email  
- Phone number  
- Selected service  
- Address  
- Notes  
- Timestamp  

Below is an example of stored submissions in **phpMyAdmin**:

![phpMyAdmin Database View](https://github.com/user-attachments/assets/c096d3dd-e493-4d92-ad50-17e3b762f338)

---

## 📧 Email Functionality (PHPMailer)

The application uses **PHPMailer** to send email notifications when a form is submitted. This demonstrates the use of external libraries and SMTP-based email delivery within a PHP application.

Below is an example of PHPMailer using external resources:

![PHPMailer Integration](https://github.com/user-attachments/assets/6b64fb6d-33c6-41b6-bf59-0478a771858e)

---

## 🛠️ Technologies Used

- **PHP**
- **MySQL**
- **phpMyAdmin**
- **SQL**
- **PHPMailer**
- **HTML5**
- **CSS3**
- **XAMPP (Apache + MySQL)**

---

## 🎯 Purpose

This project was built to practice and demonstrate:

- Backend form handling with PHP
- Database-driven web applications
- PHP–MySQL integration
- External library usage
- Real-world full-stack development patterns

The workflow closely mirrors production service-request systems used by small businesses.

---

## 🚀 Future Improvements

- Admin dashboard to manage service requests
- Email confirmation sent to customers
- Enhanced validation and security layers
- Deployment to a live production server

---

## 📄 License

This project is for educational and portfolio purposes.
