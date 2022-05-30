CREATE TABLE todos (
  id INT NOT NULL AUTO_INCREMENT,
  is_done BOOLEAN DEFAULT false,
  content TEXT NOT NULL,
  PRIMARY KEY (id)
) ;

INSERT INTO todos (content) VALUES
  ('todo-1'), ('todo-2'), ('todo-3') ;

INSERT INTO todos (is_done, content) VALUES
  (true, 'todo-4') ;

SELECT * FROM todos ;
