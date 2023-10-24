CREATE TABLE nodes (
    node_id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE closure_table (
    ancestor INT,
    descendant INT,
    path_length INT,
    PRIMARY KEY (ancestor, descendant),
    FOREIGN KEY (ancestor) REFERENCES nodes(node_id),
    FOREIGN KEY (descendant) REFERENCES nodes(node_id)
);

INSERT INTO nodes (node_id, name) VALUES
(1, 'Root'),
(2, 'Child A'),
(3, 'Child B'),
(4, 'Grandchild A1'),
(5, 'Grandchild A2'),
(6, 'Grandchild B1');

INSERT INTO closure_table (ancestor, descendant, path_length) VALUES
(1, 1, 0),
(1, 2, 1),
(1, 3, 1),
(2, 4, 1),
(2, 5, 1),
(3, 6, 1),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0);
