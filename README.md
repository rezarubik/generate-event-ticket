# generate-event-ticket

## About Generate Event Ticket

Generate Event Ticket use PHP-CLI Native, API check and update ticket code use PHP Native. This generate event ticket use PHP version 8.1.16.

## Installation and Set Up

### 1. Clone Repo

### 2. Setting Database Connection

#### a. Setting your database inside config/database.php. In this example I use mysql as database.

#### b. Import Dummy Database from detikcom_event.sql in your local database.

### 3. DONE

## Generate Ticket use PHP-CLI

### 1. Open your local terminal and direct to the directory for this repo in your local

### 2. Type this command

```
php generate_ticket.php 2 5
```

Detail of arguments:

#### a. First argument is event_id (example is 2)

#### b. Second argument is total of ticket (example is 5)

## Run API Check Status Ticket Code

### 1. Import postman collection from this repo

### 2. Open request Check Status Ticket Code

### 3. Input event_id and ticket_code that want to check

### 4. Hit the request

### 5. DONE

## Run API Update Status Ticket

### 1. Import postman collection from this repo

### 2. Open request Update Status Ticket

### 3. Input event_id, ticket_code, and status that want to update

### 4. Hit the request

### 5. DONE
