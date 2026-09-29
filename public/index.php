<?php
declare(strict_types=1);
require dirname(__DIR__) . '/src/bootstrap.php';

// Read the optional ?title= parameter.
$title = $_GET['title'] ?? '';

if (!is_string($title)) {
    $title = '';
}

$title = trim($title);

if ($title === '') {
    $displayTitle = 'the library catalogue';
} else {
    $displayTitle = substr($title, 0, 80);
}

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$generatedAt = date('Y-m-d H:i:s');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CIT 417 Library Management System</title>
  <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
  <main>
    <p class="eyebrow">CIT 417 cumulative capstone</p>
    <h1>Library Management System</h1>
    <p>This server-generated page introduces <?= h($displayTitle) ?>.</p>
    <form action="/" method="get">
      <label for="title">Catalogue topic</label>
      <input id="title" name="title" maxlength="80" value="<?= h($displayTitle === 'the library catalogue' ? '' : $displayTitle) ?>">
      <button type="submit">View topic</button>
    </form>
    <section aria-label="Request evidence">
      <h2>Request evidence</h2>
      <p>Method: <?= h($method) ?></p>
      <p>Generated at: <?= h($generatedAt) ?></p>
      <p>Database status: planned for Week 2; no SQL is executed by this page.</p>
    </section>
  </main>
</body>
</html>