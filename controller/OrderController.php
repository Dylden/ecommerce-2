<?php

require_once('../model/Order.php');
require_once('../model/OrderRepository.php');


class OrderController
{


    public function createOrder()
    {
        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (key_exists('customerName', $_POST)) {


                try {
                    $order = new Order($_POST['customerName']);
                    // stocke la commande en BDD
                    $order = new Order($_POST['shippingAddress']);


                    $orderRepository = new OrderRepository();
                    $orderRepository->persistOrder($order);


                    $message = 'Commande créée';
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }

            }
        }

        require_once('../view/index-view.php');
    }

    public function addProduct()
    {
        $message = null;

        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();

        try {
            $order->addProducts();

            $orderRepository->persistOrder($order);
            $message = "produit ajouté";
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }

        require_once('../view/add-product-view.php');
    }

    public function setShippingAddress() {

        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();

        $message = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//si on marque l'adresse dans le formulaire
            if (key_exists('shippingAddress', $_POST)) {
//Alors marque un message "adresse ajoutée"
                try {
                    $order->setShippingAddress($_POST['shippingAddress']);

                    $message = "Adresse ajoutée";
//Sinon affiche un autre message
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }


            }
        }


        require_once('../view/set-shipping-address-view.php');
    }

}

