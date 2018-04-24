
<?php
    if(!isset($_POST["quantity"])){
        header("HTTP/1.1 400 Invalid Request");
        die();
    }

?>
<?
$quantity = $_POST["quantity"];
$item = $_POST["food"];
//print($item);
//print($quantity);
//$inventory = file_get_contents("inventory.txt");
$inventory = file("inventory.txt");
for($i = 0; $i <= count($inventory); $i++){
    if(strpos($inventory[$i], $item) !== false){
        $n = $i;
    }
}

$line = explode("\t",$inventory[$n]);
$available_quantity = $line[1];
$price = $line[2];

//$lines = explode("\t", $inventory[$n]);
//$available_quantity = $lines[1];
//print($available_quantity);
?>

</head>
<body>
    <? if($quantity <= $available_quantity){
        $cost = $price * $quantity; ?>
        <p> Order successful! Your total is $<?= $cost ?>. Thank you for the order! </p>
        <? for($i = 0; $i < $quantity; $i++){ ?>
                 <img src= "<?= $item?>.jpg" alt = "<?= $item ?>" width="40"/>
                 <? } ?>
    <? }
        else { ?>
        <p> Sorry we dont have <?= $quantity ?> <?= $item ?> in stock. Here is
         what you ordered:</p>
         <? for($i = 0; $i < $quantity; $i++){ ?>
         <img src= "<?= $item?>.jpg" alt = "<?= $item ?>" width="40"/>
         <? } ?>
    <? } ?>
</body>
</html>
