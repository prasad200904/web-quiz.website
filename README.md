# 🧠 Web-Based Online Quiz System (PHP + MySQL)

## 🚀 Live Demo
👉 [Click to Try the Quiz](https://web-dev-onlineexam.lovestoblog.com/?i=1)

---

## 📌 Project Overview

This project is a **web-based quiz system** built using **PHP and MySQL**. It allows users to take timed multiple-choice quizzes, calculates their score automatically, and displays results. Ideal for educational institutions, mock tests, or competitive exam platforms.

It includes a user-friendly interface, dynamic question loading from a database, and supports score calculation on completion.

---

## 🛠️ Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL  
- **Hosting**: InfinityFree (via `lovestoblog.com`)

---

## ✅ Features

- Display MCQ questions from MySQL database  
- Randomized answer options  
- Score calculation and result summary  
- User-friendly quiz UI  
- Admin can add/edit questions in the database  
- Optional: Timer functionality *(can be added)*

---

## 📁 Project Structure
quiz-system/
├── index.php # Quiz homepage
├── quiz.php # Main quiz logic
├── result.php # Score display
├── db.php # MySQL database connection
├── css/
│ └── style.css # Styling
└── database/
└── quiz.sql # MySQL dump of the questions table

---

## ⚙️ How to Run Locally

### 1. Requirements
- XAMPP/WAMP (PHP server + MySQL)
- Web browser (Chrome recommended)

### 2. Setup Steps

1. Install XAMPP and run Apache & MySQL  
2. Clone or download this repo  
3. Place the project folder in `C:/xampp/htdocs/`  
4. Open `phpMyAdmin` and import `quiz.sql` into a new database (e.g., `quiz`)  
5. Configure `db.php` with your DB credentials  
6. Visit: `http://localhost/quiz-system/` in your browser

---

## 💾 Database Structure

```sql
CREATE TABLE `questions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `question` TEXT NOT NULL,
  `option1` VARCHAR(255),
  `option2` VARCHAR(255),
  `option3` VARCHAR(255),
  `option4` VARCHAR(255),
  `answer` VARCHAR(255)
);
🧑‍💻 Developer Info
V Durga Prasad
B.Tech - IoT Branch
Potti Sriramulu College of Engineering and Technology
GitHub: prasad200904


---

### ✅ Next Steps:
- Copy this entire content into your GitHub repo’s `README.md`
- Or include it in your project ZIP as `README.txt` or `README.md`
- Make sure your `quiz.sql` is also inside the ZIP

Let me know if you want a **1-page project PDF** or help packaging it now!


