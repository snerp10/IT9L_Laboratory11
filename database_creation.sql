-- Create the database tables with their relationships

-- Create regions table
CREATE TABLE regions (
    region_id INT PRIMARY KEY,
    region_name VARCHAR(25) NOT NULL
);

-- Create countries table
CREATE TABLE countries (
    country_id CHAR(2) PRIMARY KEY,
    country_name VARCHAR(40) NOT NULL,
    region_id INT NOT NULL,
    FOREIGN KEY (region_id) REFERENCES regions(region_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

-- Create locations table
CREATE TABLE locations (
    location_id INT PRIMARY KEY,
    street_address VARCHAR(40),
    postal_code VARCHAR(12),
    city VARCHAR(30) NOT NULL,
    state_province VARCHAR(25),
    country_id CHAR(2) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES countries(country_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

-- Create departments table
CREATE TABLE departments (
    department_id INT PRIMARY KEY,
    department_name VARCHAR(30) NOT NULL,
    location_id INT,
    FOREIGN KEY (location_id) REFERENCES locations(location_id)
    ON UPDATE CASCADE
    ON DELETE SET NULL
);

-- Create jobs table
CREATE TABLE jobs (
    job_id INT PRIMARY KEY,
    job_title VARCHAR(35) NOT NULL,
    min_salary DECIMAL(8,2),
    max_salary DECIMAL(8,2)
);

-- Create employees table with self-referencing foreign key
CREATE TABLE employees (
    employee_id INT PRIMARY KEY,
    first_name VARCHAR(20),
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20),
    hire_date DATE NOT NULL,
    job_id INT NOT NULL,
    salary DECIMAL(8,2),
    manager_id INT,
    department_id INT,
    FOREIGN KEY (job_id) REFERENCES jobs(job_id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    FOREIGN KEY (manager_id) REFERENCES employees(employee_id)
    ON UPDATE CASCADE
    ON DELETE SET NULL,
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
    ON UPDATE CASCADE
    ON DELETE SET NULL
);

-- Create dependents table
CREATE TABLE dependents (
    dependent_id INT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    relationship VARCHAR(25) NOT NULL,
    employee_id INT NOT NULL,
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);
