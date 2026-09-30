<?php

declare(strict_types=1);

function getAllBooks(PDO $pdo): array
{
    $sql = "
        SELECT
            b.book_id,
            b.title,
            b.author,
            b.isbn,
            b.published_year,
            c.name AS category,
            COUNT(cp.copy_id) AS total_copies,
            SUM(
                CASE
                    WHEN cp.status = 'available' THEN 1
                    ELSE 0
                END
            ) AS available_copies
        FROM books AS b
        JOIN categories AS c
            ON c.category_id = b.category_id
        LEFT JOIN copies AS cp
            ON cp.book_id = b.book_id
        GROUP BY
            b.book_id,
            b.title,
            b.author,
            b.isbn,
            b.published_year,
            c.name
        ORDER BY b.title
    ";

    $statement = $pdo->query($sql);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getBooksByCategory(PDO $pdo, string $category): array
{
    $sql = "
        SELECT
            b.book_id,
            b.title,
            b.author,
            b.isbn,
            b.published_year,
            c.name AS category,
            COUNT(cp.copy_id) AS total_copies,
            SUM(
                CASE
                    WHEN cp.status = 'available' THEN 1
                    ELSE 0
                END
            ) AS available_copies
        FROM books AS b
        JOIN categories AS c
            ON c.category_id = b.category_id
        LEFT JOIN copies AS cp
            ON cp.book_id = b.book_id
        WHERE c.name = :category
        GROUP BY
            b.book_id,
            b.title,
            b.author,
            b.isbn,
            b.published_year,
            c.name
        ORDER BY b.title
    ";

    $statement = $pdo->prepare($sql);
    $statement->execute(['category' => $category]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getBookCategories(PDO $pdo): array
{
    $statement = $pdo->query(
        'SELECT category_id, name FROM categories ORDER BY name'
    );

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}