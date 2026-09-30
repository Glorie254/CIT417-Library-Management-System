# CIT 417 Library Management System — Data Dictionary

## 1. Visitor browses a title

### User story
As a visitor, I want to browse a library title so that I can view information about the book.

### Minimum records needed
- **categories** — stores the category to which the title belongs.
- **books** — stores the book title, author, optional ISBN, and category reference.
- **copies** — stores the physical copies available for that title, including their individual barcodes and status.

### Data distinction
A **book** represents the abstract title, while a **copy** represents one physical item of that title.

---

## 2. Librarian issues a specific available copy

### User story
As a librarian, I want to issue a specific available physical copy to a user so that the circulation transaction is recorded.

### Minimum records needed
- **users** — identifies the person borrowing the copy.
- **books** — identifies the abstract book title.
- **copies** — identifies the specific physical copy using its barcode and status.
- **loans** — records the borrowing transaction and links the user to the physical copy.

### Data distinction
The librarian issues a **physical copy**, not an abstract book title. The copy has its own unique barcode.

---

## 3. Librarian records a return

### User story
As a librarian, I want to record the return of a borrowed physical copy so that the loan history is maintained and the copy becomes available again.

### Minimum records needed
- **users** — identifies the borrower.
- **copies** — identifies the physical copy that was returned.
- **loans** — records the historical borrowing transaction and return information.
- **books** — identifies the title associated with the returned copy.

### Data distinction
The return applies to a specific **physical copy** identified by its copy ID/barcode. The loan remains part of the historical loan record.