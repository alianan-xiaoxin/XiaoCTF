<?php
include "navigation.php";
class xiao{
            private $file='php-fan.php';
            function __destruct(){
                if(!empty($this->file))
                {
                    show_source($this->file);
                }
            }
            function __wakeup(){
                $this->file='php-fan.php';
            }
        }
        if(!isset($_GET['php-fan'])){
            show_source('php-fan.php');
        }
        else{
            unserialize($_GET['php-fan']);
        }
?>
