<?php

require_once('../view/partials/header.html'); ?>


<main>
    <h1>Ceci est un titre</h1>

    <p><?php echo $message; ?></p>

    <form method="POST">
        <label for="customerName">Veuillez entrer votre nom </label>
        <input name="customerName" type="text">

        <input type="submit">

    </form>
</main>


<?php require_once('../view/partials/footer.html') ?>
