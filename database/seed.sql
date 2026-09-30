USE cit417_lms;

INSERT INTO categories (category_id, name) VALUES
(1, 'Computing'),
(2, 'Business'),
(3, 'Communication');

INSERT INTO books
(book_id, category_id, title, author, isbn, published_year)
VALUES
(1, 1, 'Web Systems Basics', 'A. Njeri',
 '9780000001001', 2021),
(2, 1, 'Database Design Cases', 'B. Otieno',
 '9780000001002', 2020),
(3, 2, 'Managing Projects', 'C. Wekesa',
 '9780000001003', 2019),
(4, 3, 'Digital Communication', 'D. Achieng',
 '9780000001004', 2022),
(5, 1, 'Applied PHP Notes', 'E. Kamau',
 NULL, 2023);

INSERT INTO copies (copy_id, book_id, barcode, status) VALUES
(1, 1, 'LMS-001', 'available'),
(2, 1, 'LMS-002', 'available'),
(3, 2, 'LMS-003', 'unavailable'),
(4, 2, 'LMS-004', 'unavailable'),
(5, 3, 'LMS-005', 'available'),
(6, 4, 'LMS-006', 'available'),
(7, 5, 'LMS-007', 'available');