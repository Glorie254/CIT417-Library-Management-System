<?php

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function getDemoBooks(): array
{
    return [
        ['id' => 1, 'title' => 'Fundamentals of Database Systems', 'category' => 'Database Systems'],
        ['id' => 2, 'title' => 'Database Design Principles', 'category' => 'Database Systems'],
        ['id' => 3, 'title' => 'Modern Web Development', 'category' => 'Web Development'],
        ['id' => 4, 'title' => 'Server-Side Programming', 'category' => 'Web Development'],
        ['id' => 5, 'title' => 'Computer Networks', 'category' => 'Networking']
    ];
}

function findDemoBook(int $id): ?array
{
    foreach (getDemoBooks() as $book) {
        if ($book['id'] === $id) {
            return $book;
        }
    }

    return null;
}

function logMessage(string $message): void
{
    $line = date('Y-m-d H:i:s') . ' ' . $message . PHP_EOL;

    file_put_contents(
        __DIR__ . '/../logs/app.log',
        $line,
        FILE_APPEND
    );
}