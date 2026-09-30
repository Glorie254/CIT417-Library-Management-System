<?php

$config = require __DIR__ . '/config/app.php';
require __DIR__ . '/includes/functions.php';

$books = getDemoBooks();

$category = trim($_GET['category'] ?? '');

$allowedCategories = [
    'Database Systems',
    'Web Development',
    'Networking'
];

if ($category !== '' && !in_array($category, $allowedCategories, true)) {
    $category = '';
}

if ($category !== '') {
    $books = array_values(
        array_filter(
            $books,
            fn(array $book): bool => $book['category'] === $category
        )
    );
}

logMessage('Catalogue viewed; category=' . ($category ?: 'ALL'));

require __DIR__ . '/includes/header.php';
?>

<h2>Book Catalogue</h2>

<p>
    Filter:
    <a href="catalogue.php">All</a> |
    <a href="catalogue.php?category=Database%20Systems">Database Systems</a> |
    <a href="catalogue.php?category=Web%20Development">Web Development</a> |
    <a href="catalogue.php?category=Networking">Networking</a>
</p>

<?php if (count($books) === 0): ?>

    <p>No matching books.</p>

<?php else: ?>

    <ul>

        <?php foreach ($books as $book): ?>

            <li>
                <?= e($book['title']) ?>
                — <?= e($book['category']) ?>
            </li>

        <?php endforeach; ?>

    </ul>

<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>