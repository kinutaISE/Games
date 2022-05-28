CREATE TABLE todos (
  id INT NOT NULL AUTO_INCREMENT,
  is_done BOOL NOT NULL DEFAULT false,
  content TEXT NOT NULL,
  PRIMARY KEY (id)
) ;

INSERT INTO todos (content) VALUES ('aaa') ;
INSERT INTO todos (content, is_done) VALUES ('bbb', true) ;
INSERT INTO todos (content) VALUES ('ccc') ;

SELECT * FROM todos ;
