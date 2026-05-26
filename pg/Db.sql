CREATE TABLE IF NOT EXISTS person (
    id INTEGER PRIMARY KEY,
    name VARCHAR(20) NOT NULL
);

INSERT INTO person (id, name) VALUES
(1, 'William'),
(2, 'Marc'),
(3, 'John');
