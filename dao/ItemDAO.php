<?php

require_once( __DIR__ . '/DAO.php');

class ItemDAO extends DAO {

public function selectAllItems(){
    $sql = "SELECT * FROM `int2_items` ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

public function selectById($id){
    $sql = "SELECT * FROM `int2_items` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectSpecificationById($id) {
    $sql = "SELECT * FROM `int2_item_specifications` WHERE `item_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

 public function selectAllQuestions(){
    $sql = "SELECT * FROM `int2_questions` ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
