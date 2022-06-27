<?php

namespace MyApp ;

class Todo
{
  private $pdo ;
  public function __construct($pdo)
  {
    $this->pdo = $pdo ;
    Token::create() ;
  }
  public function processPost()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      Token::validate() ;
      $action = filter_input(INPUT_GET, 'action') ;

      switch ($action) {
        case 'add':
          $this->add() ;
          break ;
        case 'toggle':
          $this->toggle() ;
          break ;
        case 'delete':
          $this->delete() ;
          break ;
        case 'purge':
          $this->purge() ;
          break ;
        default:
          exit ;
      }
      header('Location: ' . SITE_URL) ;
      exit ;
    }
  }
  private function add()
  {
    $content = trim( filter_input(INPUT_POST, 'content') ) ;
    if ($content === '')
      return ;
    $stmt = $this->pdo->prepare("INSERT INTO todos (content) VALUES (:content)") ;
    $stmt->bindValue('content', $content) ;
    $stmt->execute() ;
  }
  private function toggle()
  {
    $id = filter_input(INPUT_POST, 'id') ;
    if ( empty($id) ) return ;
    $stmt = $this->pdo->prepare("UPDATE todos SET is_done = NOT is_done WHERE id = :id") ;
    $stmt->bindValue('id', $id) ;
    $stmt->execute() ;
  }
  private function delete()
  {
    $id = filter_input(INPUT_POST, 'id') ;
    if ( empty($id) ) return ;
    $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = :id") ;
    $stmt->bindValue('id', $id) ;
    $stmt->execute() ;
  }
  public function getAll()
  {
  	$stmt = $this->pdo->query("SELECT * FROM todos") ;
  	return $stmt->fetchAll() ;
  }
  private function purge()
  {
    $stmt = $this->pdo->query("DELETE FROM todos WHERE is_done = true") ;
    $stmt->execute() ;
  }
}
