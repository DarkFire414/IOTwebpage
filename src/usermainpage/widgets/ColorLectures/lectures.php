<?php
    session_start();
?>
<!-- Files in widgets will be inserted into userview.php dinamically so, files added here must be
     called with base userview.php location
-->

<link rel="stylesheet" type="text/css" href="widgets/ColorLectures/styles.css"/>

<!-- Wiidget Manager -->
<script type="text/javascript" src="widgets/ColorLectures/wdgtmanager.js"></script>

<h1>Comparaciones de color</h1>
<div style="overflow-x:auto;">
    <p>
        Ordenar por:

        <select name="sort" onchange="setSortType(this.value); sortSelect();">
            <option value="">Seleccione</option>
            <option value="Fecha">Fecha</option>
        </select>

        <select name="mode" onchange="setSortMode(this.value); sortSelect();">
            <option value="">Seleccione</option>
            <option value="asc">Ascendente</option>
            <option value="desc">Descendente</option>
        </select>

        <button onclick="generateTableComp(); sortSelect();">Recargar</button>
    
    </p>

    <div id="table">
        <!--Container for color comparisons-->
    </div>

    <script>
        generateTableComp();
    </script>

</div>