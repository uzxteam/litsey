<?php
header("Content-Type:text/css");
function checkhexcolor($color){
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color OR !checkhexcolor($color)) {
    $color = "#336699";
}

if (isset($_GET['secondColor']) AND $_GET['secondColor'] != '') {
    $secondColor = "#" . $_GET['secondColor'];
}

if (!$secondColor OR !checkhexcolor($secondColor)) {
    $secondColor = "#336699";
}

?>

:root {
  --primary: <?php echo $color;?>;
  --secondary: <?php echo $secondColor;?>;
}