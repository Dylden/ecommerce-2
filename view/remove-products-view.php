<main>
    <p>
        <?php echo $message; ?>
    </p>
    <?php if (count($order->products) > 0) { ?>
        <p>
            Commande numéro : <?php echo $order->getId() ?> au nom de <?php echo $order->getCustomerName() ?> créée
            le <?php echo $order->getCreationDate() ?>.
        </p>
        <p>Total de la commande : <?php echo $order->getTotalPrice(); ?> €</p>
        <p>Résumé de la commande : </p>
        <ul>
            <?php
            foreach ($order->products as $product) { ?>
                <li> <?php echo $product; ?> </li>
            <?php } ?>
        </ul>
    <?php } ?>
</main>

