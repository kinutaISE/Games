CREATE TABLE posts (
  id INT NOT NULL AUT_INCREMENT,
  message VARCHAR(140),
  PRIMARY KEY (id)
) ;

INSERT INTO posts (message) VLUES
  ('post-1') ;

SELECT * FROM posts ;
