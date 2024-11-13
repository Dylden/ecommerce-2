<?php

declare(strict_types=1);

class Order
{
    private string $id;
    private string $customerName;
    private string $status = "cart";
    private float $totalPrice = 0;
    private array $products = [];
    public ?string $shippingAddress;

    //méthode magique
    public function __construct(string $customerName)
    {
        $this->customerName = $customerName;
        $this->id = uniqid();
    }

    //Fonction permettant d'ajouter des produits
    public function addProducts(): void
    {
        if ($this->status === "cart") {
            $this->products[] = "Café";
            $this->totalPrice += 1;
        } else {
            throw new Exception("Une erreur est survenue");
        };
    }

    public function setShippingAddress($shippingAddress)
    {
        //condition pour gérer l'adresse de livraison saisie par l'utilisateur
        if ($this->status === "cart") {
            $this->shippingAddress = $shippingAddress;
            $this->status = "shippingAddressSet";
        } else { //Une fois l'adresse saisie, l'adresse ne sera pas modifiable
            throw new Exception('Adresse non modifiable');
        }
    }


    //Fonction permettant de payer
    public function pay(): void
    {
        if ($this->status === "shippingAddressSet" && !empty($this->products)) {
            $this->status = "paid";

        } else {
            throw new Exception('Vous ne pouvez pas payer, merci de remplir votre adresse d\'abord');
        };
    }
    //Fonction permettant de supprimer les produits du panier
    public function removeProducts(): void
    {
        if ($this->status === "cart" && ($this->products)) {
            array_pop($this->products);
            $this->totalPrice -= 1;
        } else {
            echo "Vous n\'avez aucun produit à supprimer";
        }
    }
    public function ship(): void
    {
        if ($this->status === "paid") {
            $this->status = "shipped";

        } else {
            throw new Exception('La commande ne peut pas être expédiée. Elle n\'est pas encore payée');
        }
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function getProducts(): array
    {
        return $this->products;
    }
}