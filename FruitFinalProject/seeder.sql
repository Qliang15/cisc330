DROP TABLE IF EXISTS fruits;

CREATE TABLE fruits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fruit_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (fruit_id) REFERENCES fruits(id) ON DELETE CASCADE
);

INSERT INTO fruits (name) VALUES
('Apple'),
('Banana'),
('Strawberry'),
('Orange'),
('Pineapple'),
('Mango'),
('Grapes'),
('Blueberry'),
('Watermelon'),
('Peach'),
('Cherry'),
('Pear'),
('Kiwi'),
('Lemon'),
('Lime'),
('Coconut'),
('Pomegranate'),
('Fig'),
('Plum'),
('Apricot');


