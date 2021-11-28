<?php
    session_start();
    //Database conection
    $servername = "sql102.epizy.com";
    $username = "epiz_30279333";
    $password = "0rbzdnc6";
    $database = "epiz_30279333_iotDB";

    // Create conection
    $conn = new mysqli($servername, $username, $password, $database);

    //Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $sql = "SELECT `color_id`, `color_result`, `h_ref1`, `s_ref1`, `l_ref1`, `h_ref2`, `s_ref2`, `l_ref2`, `h_ref3`, `s_ref3`, `l_ref3`, `h_samp`, `s_samp`, `l_samp`, `color_diff`, `color_tol`, `color_date` FROM `data_colorimeter` WHERE `color_username` = '". $_SESSION["User"] . "'";
    //echo $sql;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        $colorid = 0;
        //Output data of each row
        while($row = $result->fetch_assoc())
        {
            $hex1 = convertHSL($row["h_ref1"], $row["s_ref1"], $row["l_ref1"]);
            $hex2 = convertHSL($row["h_ref2"], $row["s_ref2"], $row["l_ref2"]);
            $hex3 = convertHSL($row["h_ref3"], $row["s_ref3"], $row["l_ref3"]);
            $hex4 = convertHSL($row["h_samp"], $row["s_samp"], $row["l_samp"]);
            echo "<tr><td>" . $row["color_id"] . 
                 "</td><td>" . $row["color_result"] . 
                 "</td><td class = 'Ref1'>(" . $row["h_ref1"] . "," . $row["s_ref1"] . "," . $row["l_ref1"] . ')  <input type="color" id="colorInput1_' . $colorid . '" name="colorInput" value="' . $hex1 . '">' . 
                 "</td><td class = 'Ref2'>(" . $row["h_ref2"] . "," . $row["s_ref2"] . "," . $row["l_ref2"] . ')  <input type="color" id="colorInput2_' . $colorid . '" name="colorInput" value="' . $hex2 . '">' .
                 "</td><td class = 'Ref3'>(" . $row["h_ref3"] . "," . $row["s_ref3"] . "," . $row["l_ref3"] . ')  <input type="color" id="colorInput3_' . $colorid . '" name="colorInput" value="' . $hex3 . '">' .
                 "</td><td class = 'Muestra'>(" . $row["h_samp"] . "," . $row["s_samp"] . "," . $row["l_samp"] . ')  <input type="color" id="colorInput4_' . $colorid . '" name="colorInput" value="' . $hex4 . '">' .
                 "</td><td>" . $row["color_diff"] .
                 "</td><td>" . $row["color_tol"] .
                 "</td><td>" . $row["color_date"] .
                 "</td></tr>";

            echo '<script>
                 var hex1_' . $colorid . ' = "' . $hex1 . '";' . 
                 'document.getElementById("colorInput1_' . $colorid . '").addEventListener("change", function(e){
                    if (e.target.value != hex1_' . $colorid . ') { 
                        document.getElementById("colorInput1_' . $colorid.  '").value = hex1_' . $colorid . ';
                    } 
                    });' . 
                 "</script>";

            echo '<script>
                 var hex2_' . $colorid . ' = "' . $hex2 . '";' . 
                 'document.getElementById("colorInput2_' . $colorid . '").addEventListener("change", function(e){
                    if (e.target.value != hex2_' . $colorid . ') { 
                        document.getElementById("colorInput2_' . $colorid.  '").value = hex2_' . $colorid . ';
                    } 
                    });' . 
                 "</script>";
            
            echo '<script>
                 var hex3_' . $colorid . ' = "' . $hex3 . '";' . 
                 'document.getElementById("colorInput3_' . $colorid . '").addEventListener("change", function(e){
                    if (e.target.value != hex3_' . $colorid . ') { 
                        document.getElementById("colorInput3_' . $colorid.  '").value = hex3_' . $colorid . ';
                    } 
                    });' . 
                 "</script>";

            echo '<script>
                 var hex4_' . $colorid . ' = "' . $hex4 . '";' . 
                 'document.getElementById("colorInput4_' . $colorid . '").addEventListener("change", function(e){
                    if (e.target.value != hex4_' . $colorid . ') { 
                        document.getElementById("colorInput4_' . $colorid.  '").value = hex4_' . $colorid . ';
                    } 
                    });' . 
                 "</script>";

            $colorid = $colorid + 1;
        }
    }
    else 
    { 
        echo "0 results"; 
    }
    $conn->close();

    function convertHSL($h, $s, $l, $toHex=true){
        $h /= 360;
        $s /=100;
        $l /=100;
    
        $r = $l;
        $g = $l;
        $b = $l;
        $v = ($l <= 0.5) ? ($l * (1.0 + $s)) : ($l + $s - $l * $s);
        if ($v > 0){
              $m;
              $sv;
              $sextant;
              $fract;
              $vsf;
              $mid1;
              $mid2;
    
              $m = $l + $l - $v;
              $sv = ($v - $m ) / $v;
              $h *= 6.0;
              $sextant = floor($h);
              $fract = $h - $sextant;
              $vsf = $v * $sv * $fract;
              $mid1 = $m + $vsf;
              $mid2 = $v - $vsf;
    
              switch ($sextant)
              {
                    case 0:
                          $r = $v;
                          $g = $mid1;
                          $b = $m;
                          break;
                    case 1:
                          $r = $mid2;
                          $g = $v;
                          $b = $m;
                          break;
                    case 2:
                          $r = $m;
                          $g = $v;
                          $b = $mid1;
                          break;
                    case 3:
                          $r = $m;
                          $g = $mid2;
                          $b = $v;
                          break;
                    case 4:
                          $r = $mid1;
                          $g = $m;
                          $b = $v;
                          break;
                    case 5:
                          $r = $v;
                          $g = $m;
                          $b = $mid2;
                          break;
              }
        }
        $r = round($r * 255, 0);
        $g = round($g * 255, 0);
        $b = round($b * 255, 0);
    
        if ($toHex) {
            $r = ($r < 15)? '0' . dechex($r) : dechex($r);
            $g = ($g < 15)? '0' . dechex($g) : dechex($g);
            $b = ($b < 15)? '0' . dechex($b) : dechex($b);
            return "#$r$g$b";
        } else {
            return "rgb($r, $g, $b)";    
        }
    }
?>