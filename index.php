<?php

$config = require __DIR__ . '/config/app.php';
require __DIR__ . '/includes/functions.php';

$pageMessage = 'Server-side application modules loaded successfully.';

require __DIR__ . '/includes/header.php';
?>

<h2>Week 3 Server-Side Application</h2>

<p><?= e($pageMessage) ?></p>

<p>
    This week the application uses PHP arrays as temporary data.
    Week 4 will replace the array with database queries.
</p>

<?php require __DIR__ . '/includes/footer.php'; ?>