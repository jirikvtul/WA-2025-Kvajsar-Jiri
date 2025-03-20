CREATE TABLE wa_test (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL, 
    user_surname VARCHAR(50) NOT NULL,
    user_email VARCHAR(150) NOT NULL UNIQUE, 
    user_age INT DEFAULT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

INSERT INTO wa_test (user_name, user_surname, user_email, user_age) VALUES 
('Petr', 'Novák', 'petr.novak@seznam.cz', 43),
('Markéta', 'Lánová', 'marketa_lanova@seznam.cz', 24),
('Marta', 'Holičková', 'marta.holickova@seznam.cz', 38),
('Franišek', 'Táhlo', 'frantisek.tahlo@seznam.cz', 32);