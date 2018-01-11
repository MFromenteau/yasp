<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Database extends Controller
{
	private static $_instance = null;
	private $dbUrl;
	public $db;

   private function __construct() {
   	$this->$dbUrl = "mysql://root:".$_ENV["bddpsw"]."@localhost:3306/yasp";


    $config = new \Doctrine\DBAL\Configuration();
    $connectionParams = array(
        'url' => 'mysql://user:secret@localhost/mydb'
    );

    $this->$db = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
   }

   public static function getInstance() {

     if(is_null(self::$_instance)) {
       self::$_instance = new Database();
     }

     return self::$_instance;
   }

}

