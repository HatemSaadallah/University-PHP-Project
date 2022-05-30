CREATE TABLE IF NOT EXISTS experience_info (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL,
    place_of_training VARCHAR(255) NOT NULL,
    experience_category VARCHAR(255) NOT NULL,
    start_month DATE NOT NULL,
    -- Add not less than constraint
    end_month DATE NOT NULL 

    description TEXT NOT NULL
);

INSERT INTO experience_info (job_title, place_of_training, experience_category, start_month, end_month, description)

VALUES ('Web Developer', 'Al Azhar University', 'Job', '2000-5-1', '2005-5-1', 'I have been working as a web developer for 3 years.');