# EMS DATABASE ERD (Entity Relationship Diagram)

## Text-Based ERD

```
┌─────────────────────────────────────────────────────────────┐
│                          USERS TABLE                         │
├──────────────────────────────────────────────────────────────┤
│ PK: id (INT)                                                 │
│     name (VARCHAR)                                           │
│     email (VARCHAR) - UNIQUE                                 │
│     password (VARCHAR)                                       │
│     timestamps                                               │
└──────────────────┬───────────────────────────────────────────┘
                   │ (Login Session)
                   │
        ┌──────────┴──────────┐
        │                     │
┌───────▼────────────────┐    │    ┌──────────────────────────┐
│   DEPARTMENTS TABLE    │    │    │    EMPLOYEES TABLE       │
├────────────────────────┤    │    ├──────────────────────────┤
│ PK: id (INT)           │    │    │ PK: id (INT)             │
│     department_name    │◄───┼────┤     first_name           │
│     number_of_employ.. │    │    │     last_name            │
│     timestamps         │    │    │     gender (ENUM)        │
│                        │    │    │     position             │
│  (1) ─────► (Many)     │    │    │     email (UNIQUE)       │
└────────────────────────┘    │    │     telephone            │
                              │    │     hire_date            │
                              │    │ FK: department_id ────┐  │
                              │    │     timestamps         │  │
                              │    │                        │  │
                              │    │  (Many) ─────► (1)     │  │
                              │    └────────────────────────┘  │
                              │                                │
                              │    ┌────────────────────────┐  │
                              │    │   SALARIES TABLE       │  │
                              │    ├────────────────────────┤  │
                              │    │ PK: id (INT)           │  │
                              │    │     gross_salary       │  │
                              │    │     total_deduction    │  │
                              │    │     net_salary         │  │
                              │    │ FK: employee_id ───────┼──┘
                              │    │     timestamps         │
                              │    │                        │
                              │    │  (1) ─────► (1)        │
                              │    └────────────────────────┘
                              │
                              └──────────────────────────────────
                                 (Manages/Creates)
```

---

## RELATIONSHIPS EXPLAINED

### 1. USER → SESSION (Authentication)
- User logs in with email/password
- Session is created to track login
- User can access all protected routes

### 2. DEPARTMENT ← → EMPLOYEE (One-to-Many)
- **One Department has Many Employees**
- **Many Employees belong to One Department**
- Cardinality: 1:N (One-to-Many)
- Foreign Key: employee.department_id → department.id

### 3. EMPLOYEE ← → SALARY (One-to-One)
- **One Employee has One Salary Record**
- **One Salary belongs to One Employee**
- Cardinality: 1:1 (One-to-One)
- Foreign Key: salary.employee_id → employee.id

---

## ENTITY DETAILS

### DEPARTMENTS
```
Field Name              Type        Constraints
─────────────────────────────────────────────────
id                      INT         PRIMARY KEY, AUTO_INCREMENT
department_name         VARCHAR     NOT NULL, UNIQUE
number_of_employees     INT         DEFAULT 0
created_at              TIMESTAMP   AUTO TIMESTAMP
updated_at              TIMESTAMP   AUTO TIMESTAMP ON UPDATE
```

### EMPLOYEES
```
Field Name              Type        Constraints
─────────────────────────────────────────────────
id                      INT         PRIMARY KEY, AUTO_INCREMENT
first_name              VARCHAR     NOT NULL
last_name               VARCHAR     NOT NULL
gender                  ENUM        ('Male', 'Female') NOT NULL
position                VARCHAR     NOT NULL
email                   VARCHAR     NOT NULL, UNIQUE
telephone               VARCHAR     NOT NULL
hire_date               DATE        NOT NULL
department_id           INT         FOREIGN KEY, NOT NULL
created_at              TIMESTAMP   AUTO TIMESTAMP
updated_at              TIMESTAMP   AUTO TIMESTAMP ON UPDATE
```

### SALARIES
```
Field Name              Type        Constraints
─────────────────────────────────────────────────
id                      INT         PRIMARY KEY, AUTO_INCREMENT
gross_salary            DECIMAL     (10,2) NOT NULL
total_deduction         DECIMAL     (10,2) NOT NULL
net_salary              DECIMAL     (10,2) NOT NULL
employee_id             INT         FOREIGN KEY, UNIQUE, NOT NULL
created_at              TIMESTAMP   AUTO TIMESTAMP
updated_at              TIMESTAMP   AUTO TIMESTAMP ON UPDATE
```

### USERS
```
Field Name              Type        Constraints
─────────────────────────────────────────────────
id                      INT         PRIMARY KEY, AUTO_INCREMENT
name                    VARCHAR     NOT NULL
email                   VARCHAR     NOT NULL, UNIQUE
password                VARCHAR     NOT NULL (HASHED)
created_at              TIMESTAMP   AUTO TIMESTAMP
updated_at              TIMESTAMP   AUTO TIMESTAMP ON UPDATE
```

---

## CARDINALITY SYMBOLS EXPLANATION

```
(1) ────────► (1)   = ONE-TO-ONE
              Examples: Employee:Salary

(1) ────────► (N)   = ONE-TO-MANY
              Examples: Department:Employees

(N) ────────► (N)   = MANY-TO-MANY
              Examples: None in this project
```

---

## CONSTRAINTS & VALIDATIONS

### Primary Keys (PK)
- Uniquely identifies each record
- All tables have `id` as primary key
- Auto-incremented

### Foreign Keys (FK)
- employee.department_id must exist in departments.id
- salary.employee_id must exist in employees.id

### Unique Constraints
- email (employees table) - no duplicates
- email (users table) - no duplicates
- department_name (departments) - optional

### NOT NULL
- All important fields are NOT NULL

---

## BUSINESS RULES ENFORCED

1. **Employee must belong to a valid department**
   - Enforced by: department_id FOREIGN KEY
   - Prevents orphaned employees

2. **Employee must have a linked salary record**
   - Enforced by: salary.employee_id UNIQUE FOREIGN KEY
   - One salary per employee only

3. **Department employee count must reflect actual employees**
   - Enforced by: Updating number_of_employees on insert/delete
   - Done in EmployeeController

4. **Strong passwords for users**
   - Must contain: uppercase, lowercase, number, special char
   - Minimum 8 characters
   - Password is hashed with bcrypt

---

## SQL TO CREATE DATABASE (Manual Option)

```sql
CREATE DATABASE ems;
USE ems;

CREATE TABLE departments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    department_name VARCHAR(255) NOT NULL,
    number_of_employees INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    position VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    hire_date DATE NOT NULL,
    department_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(id)
);

CREATE TABLE salaries (
    id INT PRIMARY KEY AUTO_INCREMENT,
    gross_salary DECIMAL(10, 2) NOT NULL,
    total_deduction DECIMAL(10, 2) NOT NULL,
    net_salary DECIMAL(10, 2) NOT NULL,
    employee_id INT UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id) ON DELETE CASCADE
);
```

This creates a complete EMS database with all relationships!
