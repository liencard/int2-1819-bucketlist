<?php

require_once __DIR__ . '/Controller.php';

require_once __DIR__ . '/../dao/ItemDAO.php';

class ItemsController extends Controller {

  function __construct() {
    $this->itemDAO = new ItemDAO();
  }

  public function index() {
   $items= $this->itemDAO->selectAllItems();
   $this->set('items', $items);

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($items);
      exit();
    }
  }

  public function detail() {

    if(!empty($_GET['id'])){
      $item = $this->itemDAO->selectById($_GET['id']);
    }

    if(empty($item)){
      header('Location:index.php');
      exit();
    }

    // ADD TO FAVOURITES
    if (!empty($_POST) && !empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $_SESSION['finishedItems'][$item['id']] = true;
        $_SESSION['info'] = 'Congrats you completed an item!';
        header('Location: index.php?page=detail&id=' . $item['id']);
        exit();
      } else if ($_POST['action'] == 'remove') {
        if (!empty($_SESSION['finishedItems'][$item['id']])) {
          unset($_SESSION['finishedItems'][$item['id']]);
          $_SESSION['info'] = 'We removed the item from your completed list!';
          header('Location: index.php?page=detail&id=' . $item['id']);
          exit();
        }
      }
    }

  $this->set('item',$item);
  $this->set('specifications',$this->itemDAO->selectSpecificationById($_GET['id']));

   if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($choices);
      exit();
    }
  }

  public function test() {
    $questions= $this->itemDAO->selectAllQuestions();
    $this->set('questions', $questions);

    // SAVE ANSWER
    if (!empty($_POST) && !empty($_POST['action'])) {
      if ($_POST['action'] == 'save') {
        $_SESSION['saveAswers'][$item['id']] = true;
        $_SESSION['info'] = 'Thanks for answering the questions';
        header('Location: index.php?page=test');
        exit();
      } 
    }
  }

}
