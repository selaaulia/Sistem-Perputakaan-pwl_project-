# 📚 Library Management System (LMS)

A web-based library management application designed to manage books, student (borrower) data, staff records, and lending transactions with an automated late return fine system.

## 🚀 Key Features

* **Book Management (CRUD):** Full Create, Read, Update, and Delete operations for the book collection.
* **Member & Staff Management:** Manage profiles for Students (Borrowers) and Library Staff.
* **Lending System:** Efficiently track book loans, return dates, and stock availability.
* **Automated Fine System:** Automatically calculates fines based on the number of days a book is overdue.
* **Advanced Search:** Filter and find data quickly by code, title, or category.

## 🛠 Technical Implementation

This project is built following modern web development standards:

1.  **Database Migration:** Tables (Books, Students, Staff, Loans) are generated using Migrations to ensure database consistency across environments.
2.  **Database Seeder:** Includes a seeder that populates the database with **20 initial records** across **4 different categories** (e.g., Fiction, Education, Mystery, Biography) for testing.
3.  **MVC Architecture:** Implements the *Model-View-Controller* pattern to separate business logic, data management, and the user interface.
4.  **Search Functionality (Value Added):** Users can efficiently search or filter data.
