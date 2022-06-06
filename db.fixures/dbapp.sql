USE scc_db;

DROP TABLE IF EXISTS working_hours, users;
CREATE TABLE users (
    id VARCHAR(36),
    name VARCHAR(100) NOT NULL,
    cpf VARCHAR(11),
    cnpj VARCHAR(14),
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    is_admin BOOLEAN NOT NULL DEFAULT false
);
CREATE TABLE working_hours (
    id VARCHAR(36),
    user_id VARCHAR(36),
    work_date DATE NOT NULL,
    time1 TIME,
    time2 TIME,
    time3 TIME,
    time4 TIME,
    worked_time INT,

    FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT cons_user_day UNIQUE (user_id, work_date)
);

-- Essa senha criptografada corresponde ao valor "a"
INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cnpj)
VALUES ('e8d43e39-b97b-4645-94b2-44431c91ca59', 'Admin', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'admin@root.com.br', '2000-1-1', null, 1, '16128484000199');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cnpj)
VALUES ('ef4a82d5-5f43-41dc-bf92-bfac0a9dab4f', 'Esin Relis LTDA', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'esin@relis.com.br', '2000-1-1', null, 1, '68397232000169');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cpf)
VALUES ('323eef3d-3e1f-40e2-b3a3-426c0c8b712d', 'Zena Soero', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'zena@soero.com.br', '2000-1-1', null, 0, '32883827095');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cpf)
VALUES ('d9b68722-9793-4d6d-a7b1-073909c0e123', 'Ulmu Hahso', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'ulmu@hahso.com.br', '2000-1-1', null, 0, '19515278015');

INSERT INTO users (id, name, password, email, start_date, end_date, is_admin, cpf)
VALUES ('fcc32605-437d-46ca-aaac-7ebe04ae7b48', 'Waire Caruzi', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'waire@caruzi.com.br', '2000-1-1', '2019-1-1', 0, '80564403059');
