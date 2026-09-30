WEEK 3 REQUEST LIFECYCLE

Browser form
    |
    | POST request
    v
request-book.php
    |
    | read + validate request data
    v
PHP application logic
    |
    | success/errors
    v
header/template + page content
    |
    | HTML response
    v
Browser

NOTE: No database persistence in Week 3.

WEEK 3 DESIGN NOTES

1. Reusable modules
config/app.php stores application configuration.
includes/functions.php contains reusable functions.
includes/header.php and includes/footer.php provide reusable presentation.

2. GET and POST
GET is used by catalogue.php to read the optional category filter.
POST is used by request-book.php to submit form data for validation.

3. Request data is untrusted
Values received from GET and POST originate from the browser and must therefore be validated before use.

4. Output encoding
The e() function uses htmlspecialchars() to encode values before they are placed into HTML.

5. Temporary data
The catalogue currently uses an in-memory PHP array. No form submission is stored in MySQL during Week 3.

6. Logging
Catalogue views and successfully validated book requests are written to logs/app.log.

7. Database persistence
Database persistence begins in the later database-connected week. Week 3 intentionally does not insert form data into MySQL.