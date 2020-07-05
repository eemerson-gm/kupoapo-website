
DROP TABLE IF EXISTS projects;

CREATE TABLE projects(
	project_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_title TINYTEXT NOT NULL,
    project_image1 TINYTEXT NOT NULL,
    project_image2 TINYTEXT NOT NULL,
    project_image3 TINYTEXT NOT NULL,
    project_tinyinfo TINYTEXT NOT NULL,
    project_longinfo TEXT NOT NULL,
    project_language TINYTEXT NOT NULL,
    project_complete BOOL NOT NULL,
    project_team INT NOT NULL,
    project_type INT NOT NULL,
    project_time INT NOT NULL,
    project_date DATE NOT NULL
);

SELECT * FROM projects;

SELECT project_id, project_title, project_image1, project_tinyinfo, project_team, project_language, project_date FROM projects ORDER BY DATE(updated_at) DESC LIMIT 3