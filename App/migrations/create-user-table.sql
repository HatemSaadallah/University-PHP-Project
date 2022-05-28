-- drop table users if exists;

create table if not exists users (
    id int not null auto_increment PRIMARY KEY,
    full_name varchar(255) not null,
    gender ENUM('Male', 'Female') not null,
    nationality varchar(200) not null,
    place_of_birth varchar(200) not null,
    birth_date DATE not null, 
    job_title varchar(255) not null,
    years_of_experience INTEGER
);

-- Insert into table 
INSERT INTO 
    users(full_name, gender, nationality, place_of_birth, birth_date, job_title, years_of_experience)
VALUES 
    ('Hatem Raafat Saadallah', 'Male', 'Palestinian', 'Gaza', '2000-7-01', 'Software Engineer', 3)
;