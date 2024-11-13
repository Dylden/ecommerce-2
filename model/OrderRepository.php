<?php

require_once ('Order.php');
class OrderRepository {
    public function persistOrder(Order $order) : void{
        session_start();
        $_SESSION["order"] = $order;
    }

    public function findOrder(){
        session_start();
        return $_SESSION["order"];
    }
}