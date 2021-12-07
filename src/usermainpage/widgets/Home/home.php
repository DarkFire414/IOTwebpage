<?php
    session_start();
?>

<div class="homeMain">

    <h1>Panel principal</h1>
        <p>
            <?php
                echo "Bienvenido " . $_SESSION["User"];
            ?>
        </p>
</div>