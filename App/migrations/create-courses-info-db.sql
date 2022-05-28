CREATE TABLE IF NOT EXISTS courses_info (
    id int not null auto_increment PRIMARY KEY,
    course_name varchar(255) not null,
    total_hours INTEGER not null,
    from_date DATE not null,
    to_date DATE not null,
    institution_name varchar(255),
    attachment varchar(255) not null,
    notes varchar(255) not null
);

INSERT INTO courses_info (course_name, total_hours, from_date, to_date, institution_name, attachment, notes) 

VALUES ('Operating System', 5, '2019-10-25', '2020-2-1', 'Al Azhar University Gaza', 'http://google.com', 'No Notes');