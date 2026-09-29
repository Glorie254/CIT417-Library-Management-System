# CIT 417 Library Management System Week 1 starter

This is the LMS domain starter for the twelve-week lab manual. It replaces the earlier campus service request tracker example. No database connection is implemented in Week 1.

## Start
1. Install a supported PHP 8.3 or newer runtime or an institutionally approved supported equivalent; keep a MySQL or MariaDB service available for Week 2.
2. From this project root, run `php -S 127.0.0.1:8000 -t public`.
3. Open `http://127.0.0.1:8000/`, then `http://127.0.0.1:8000/?title=Database%20Systems`.
4. Complete the TODO in `public/index.php`, run the four Week 1 tests in the lab manual, and record results under `evidence/week01/`.
5. Stop the server with Ctrl+C. Tag accepted work `v0.1-foundation`.

The `public/` directory is the document root. Internal source, configuration, docs and evidence are outside it. The PHP built-in server is for local development only. Never commit credentials or real borrower records.

## Technical references
- PHP built-in web server: https://www.php.net/manual/en/features.commandline.webserver.php
- htmlspecialchars: https://www.php.net/manual/en/function.htmlspecialchars.php
