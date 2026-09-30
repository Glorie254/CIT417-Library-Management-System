<?php

$config = require __DIR__ . '/config/app.php';
require __DIR__ . '/includes/functions.php';

$errors = [];
$success = '';

$memberName = '';
$email = '';
$bookId = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $memberName = trim($_POST['member_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $bookId = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT) ?: 0;

    if ($memberName === '') {
        $errors[] = 'Member name is required.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email address is required.';
    }

    $book = $bookId > 0 ? findDemoBook($bookId) : null;

    if ($book === null) {
        $errors[] = 'Select a valid book.';
    }

    if (count($errors) === 0) {

        $success = 'Request received for ' . $book['title'] .
                   '. It has not yet been saved to the database.';

        logMessage(
            'Book request validated for email=' . $email .
            '; book_id=' . $bookId
        );
    }
}

$books = getDemoBooks();

require __DIR__ . '/includes/header.php';
?>

<h2>Request a Book</h2>

<?php if ($success !== ''): ?>

    <p><strong><?= e($success) ?></strong></p>

<?php endif; ?>

<?php if (count($errors) > 0): ?>

    <ul>

        <?php foreach ($errors as $error): ?>

            <li><?= e($error) ?></li>

        <?php endforeach; ?>

    </ul>

<?php endif; ?>

<form method="post" action="request-book.php">

    <p>
        <label>
            Member Name:

            <input
                type="text"
                name="member_name"
                value="<?= e($memberName) ?>"
            >
        </label>
    </p>

    <p>
        <label>
            Email:

            <input
                type="email"
                name="email"
                value="<?= e($email) ?>"
            >
        </label>
    </p>

    <p>
        <label>
            Book:

            <select name="book_id">

                <option value="">-- Select --</option>

                <?php foreach ($books as $book): ?>

                    <option
                        value="<?= (int) $book['id'] ?>"
                        <?= $bookId === $book['id'] ? 'selected' : '' ?>
                    >
                        <?= e($book['title']) ?>
                    </option>

                <?php endforeach; ?>

            </select>
        </label>
    </p>

    <button type="submit">Submit Request</button>

</form>

<?php require __DIR__ . '/includes/footer.php'; ?>