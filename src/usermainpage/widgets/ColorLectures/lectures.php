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
    
    <button onclick="generateTableComp()">Recargar</button>
    
    <div id="table">
        <!--Container for color comparisons-->
    </div>

    <script>
        generateTableComp();
    </script>

</div>