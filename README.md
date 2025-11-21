![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?logo=mysql&logoColor=white)
![Apache](https://img.shields.io/badge/Apache-2.4-D22128?logo=apache&logoColor=white)
![XAMPP](https://img.shields.io/badge/XAMPP-7.4+-FB7A24?logo=xampp&logoColor=white)
![HTML](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?logo=javascript&logoColor=black)
![phpMyAdmin](https://img.shields.io/badge/phpMyAdmin-5.2-6C78AF?logo=phpmyadmin&logoColor=white)
![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)

---

# 🏥 Hospital Management System (PHP + MySQL)

A complete Hospital Management System developed as a mini project using **PHP, HTML, CSS, JavaScript, and MySQL**. It automates essential hospital operations such as patient management, appointment booking, report generation, and medicine stock handling.

---

## 📌 Overview

Hospitals still relying on manual, paper-based processes face issues like data loss, redundancy, and slow operations.
This system digitizes hospital workflows by providing a secure, efficient, and user-friendly web application that handles:

* Patient information
* Doctor appointments
* Medicine management
* Medical report generation
* Staff and admin operations

---

## ⭐ Features

### 👨‍⚕️ Patient Features

* Register & update profile
* Book appointments
* View reports

### 🩺 Doctor Features

* View patient appointments
* Add reports & prescriptions
* Access patient history

### 🏛️ Admin Features

* Manage doctors, staff & departments
* View system access logs
* Manage users

### 🧾 Office/Staff Features

* Add patients
* Manage medicine stock
* View appointments

### 🔒 System Features

* Role-based login
* Secure data storage
* Automated workflows

---

## 👥 System Users

| Role             | Responsibilities                     |
| ---------------- | ------------------------------------ |
| **Admin**        | User management, logs, departments   |
| **Doctor**       | Reports, prescriptions, appointments |
| **Patient**      | Booking, profile, reports            |
| **Office Staff** | Medicines, patient entry             |

---

## 🛠️ Technologies Used

### **Frontend**

* HTML
* CSS
* JavaScript

### **Backend**

* PHP
* MySQL

### **Tools**

* XAMPP / WAMP
* phpMyAdmin

---

## 🗂️ Database Structure

### Tables Included:

* `user_tab`
* `patient`
* `dept_tab`
* `booking_tab`
* `report_tab`
* `medicine`
* `access_tab`

### Key Concepts:

* Foreign key–based relations
* Secure data flow
* Role-based access management

---

## 🖼️ Screenshots

### 🏠 Home Page
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/f93de910-f016-449b-a263-b83c18e6816f" />


### 🔑 Login Page
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/1e3f6100-d40f-4e55-80bd-20117a812e3b" />

### 👤 Profile Page
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/fad939ea-3913-4ea5-ac0d-066466615da1" />

### 📅 Appointment Booking

<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/2bd0ec30-1a01-4444-8fa9-23b65367f506" />
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/38198987-eecc-4190-946f-22ad8476d1a2" />


### 💊 Medicine Management
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/2da7f8f1-36eb-4e0c-8c2a-131e154b1d38" />

### 📄 Report Page
<img width="1920" height="1020" alt="image" src="https://github.com/user-attachments/assets/1af086a4-c48f-437b-9a56-5b87d338983c" />

---

## ⚙️ Installation Guide

### 1️⃣ Install XAMPP or WAMP

### 2️⃣ Move the Project Into htdocs

```
htdocs/HMS/
```

### 3️⃣ Create Database

1. Open phpMyAdmin
2. Create database:

```
hospital_db
```

3. Import `database.sql`

### 4️⃣ Configure DB Connection (connect.php)

```php
$conn = mysqli_connect("localhost", "root", "", "hospital_db");
```

### 5️⃣ Run the Project

```
http://localhost/HMS/
```

---

## 📁 Recommended Folder Structure

```
HMS/
 ├── admin/
 ├── doctor/
 ├── patient/
 ├── office/
 ├── css/
 ├── js/
 ├── img/
 ├── database/
 ├── inc/
 ├── index.php
 ├── login.php
 ├── README.md
```

---

## 🚀 Future Enhancements

* Email/SMS notifications
* Modern UI using Bootstrap
* REST API support
* Analytics dashboard

---



