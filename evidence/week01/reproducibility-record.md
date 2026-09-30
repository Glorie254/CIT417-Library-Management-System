# Week 1 Reproducibility Record

## Tester
Name/Initials: __________________

## Tested Version
Version: Week 1 accepted version
Date: __________________

## README Follow-through
The tester followed the README instructions without verbal corrections.

## Tests Performed

### W1-01
URL: http://127.0.0.1:8000/
Expected: Default library catalogue label, generated timestamp, GET method.
Result: __________________
Status: PASS / FAIL

### W1-02
URL: http://127.0.0.1:8000/?title=Database%20Systems
Expected: Page displays "Database Systems".
Result: __________________
Status: PASS / FAIL

### W1-03
URL: http://127.0.0.1:8000/?title=%3Cscript%3Ealert(1)%3C%2Fscript%3E
Expected: Script text is displayed safely and no alert executes.
Result: __________________
Status: PASS / FAIL

### W1-04
URL: http://127.0.0.1:8000/config/app.example.php
Expected: No disclosure of internal configuration source, paths, or secrets.
Result: __________________
Status: PASS / FAIL

## What Worked
____________________________________________

## Hidden Setup Steps
____________________________________________

## Reproducibility Problem Found
____________________________________________

## Correction Made
____________________________________________

## Affected Test Re-run
____________________________________________