<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<h2> <?php echo $message; ?></h2>

<p>Commande numéro : <?php echo $order->getId(); ?></p>
<p>Adresse : <?php echo $order->shippingAddress; ?></p>

<form method="post">

    <label for="shippingAddress">Adresse de livraison</label>
    <input type="text" name="shippingAddress" />

    <button type="submit">Valider</button>

</form>

</body>
</html>