<?php

class OrderRepository {
    public function persistOrder($order){
        session_start();
        $_SESSION["order"] = $order;
    }

    public function findOrder(){
        session_start();
        return $_SESSION["order"];
    }
}