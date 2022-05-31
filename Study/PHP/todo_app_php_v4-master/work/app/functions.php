<?php

function getTodos($pdo)
{
	$stmt = $pdo->query("SELECT * FROM todos") ;
	return $stmt->fetchAll() ;
}

function addTodo($pdo)
{
  $content = trim( filter_input(INPUT_POST, 'content') ) ;
  if ($content === '')
    return ;
  $stmt = $pdo->prepare("INSERT INTO todos (content) VALUES (:content)") ;
  $stmt->bindValue('content', $content, PDO::PARAM_STR) ;
  $stmt->execute() ;
}

function toggleTodo($pdo)
{
  $id = filter_input(INPUT_POST, 'id') ;

  if (empty($id)) return ;

  $stmt = $pdo->prepare("UPDATE todos SET is_done = NOT is_done WHERE id = :id") ;
  $stmt->bindValue('id', $id, PDO::PARAM_INT) ;
  $stmt->execute() ;
}

function deleteTodo($pdo)
{
  $id = filter_input(INPUT_POST, 'id') ;

  if ( empty($id) ) return ;

  $stmt = $pdo->prepare("DELETE FROM todos WHERE id = :id") ;
  $stmt->bindValue('id', $id, PDO::PARAM_INT) ;
  $stmt->execute() ;
}
