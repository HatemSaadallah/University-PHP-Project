CREATE TABLE IF NOT EXISTS experience_info (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    -- Add not less than constraint
    end_date DATE,
    institution VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO experience_info (title, category, start_date, end_date, institution, description)

VALUES ('Web Developer', 'Job', '2015-5-1', '2020-5-1', 'Azhar University', 'Lorem Ipsum');