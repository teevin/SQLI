<?php
/**
 * 45min
 */
class SqliQuestionTwo
{

  private static $instance = NULL;
  //prevent object instatiation
  private final function __construct()
  {
    // code...
  }
  //prevent object cloning
  private final function __clone()
  {
    // code...
  }
  //prevent serialization
  private final function __wakeup()
  {
    // code...
  }
  //reverse a string
  public function getString($value='')
  {
     echo strrev($value);
  }
  //method to instatiate objet
  public final static function getInstance()
  {
    if(!self::$instance){
      self::$instance = new self;
    }

    return self::$instance;
  }

}

 ?>
