CREATE DATABASE IF NOT EXISTS cit417_lms
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE cit417_lms;

DROP TABLE IF EXISTS loans;
DROP TABLE IF EXISTS copies;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    category_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) NOT NULL,
    UNIQUE KEY uq_categories_name (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE users (
    user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('member','librarian') NOT NULL,
    status ENUM('active','suspended') NOT NULL DEFAULT 'active',
    UNIQUE KEY uq_users_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE books (
    book_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id INT UNSIGNED NOT NULL,
    title VARCHAR(200) NOT NULL,
    author VARCHAR(160) NOT NULL,
    isbn VARCHAR(20) NULL,
    published_year SMALLINT UNSIGNED NULL,
    UNIQUE KEY uq_books_isbn (isbn),
    KEY ix_books_category_title (category_id, title),
    CONSTRAINT fk_books_category FOREIGN KEY (category_id)
        REFERENCES categories (category_id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT ck_books_year CHECK
        (published_year IS NULL OR published_year BETWEEN 1400 AND 2100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE copies (
    copy_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_id INT UNSIGNED NOT NULL,
    barcode VARCHAR(40) NOT NULL,
    status ENUM('available','on_loan','unavailable')
        NOT NULL DEFAULT 'available',
    UNIQUE KEY uq_copies_barcode (barcode),
    KEY ix_copies_book_status (book_id, status),
    CONSTRAINT fk_copies_book FOREIGN KEY (book_id)
        REFERENCES books (book_id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE loans (
    loan_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    copy_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    issued_at DATETIME NOT NULL,
    due_at DATETIME NOT NULL,
    returned_at DATETIME NULL,
    KEY ix_loans_copy_returned (copy_id, returned_at),
    KEY ix_loans_user_issued (user_id, issued_at),
    CONSTRAINT fk_loans_copy FOREIGN KEY (copy_id)
        REFERENCES copies (copy_id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT fk_loans_user FOREIGN KEY (user_id)
        REFERENCES users (user_id)
        ON DELETE RESTRICT ON UPDATE RESTRICT,
    CONSTRAINT ck_loans_due CHECK (due_at > issued_at),
    CONSTRAINT ck_loans_return CHECK
        (returned_at IS NULL OR returned_at >= issued_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;