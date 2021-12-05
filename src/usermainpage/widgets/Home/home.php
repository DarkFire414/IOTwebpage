<h1>Panel principal</h1>
    <p>
        <?php
            session_start();
            echo "Bienvenido " . $_SESSION["User"];
        ?>
    </p>