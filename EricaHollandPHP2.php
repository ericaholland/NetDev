<!DOCTYPE html>
<html>
<head>
    <title>PHP2</title>
    <meta charset="utf-8" />

    <?php
        $items =  glob("*.jpg"); /* gives list of food photos */
        for ($i = 0; $i < count($items); $i++){
            $items[$i] = chop($items[$i], ".jpg"); /* cuts off the file name */
        }
    ?>

</head>
<body>
    <form action="EricaHollandPHP3.php" method="post">
        <div>
            Food item:
            <select name="food".
                <? for ($i = -1; $i < count($items); $i++) { ?>
                <option> <?= $items[$i] ?></option>
                <? } ?>
            </select>
        </div>
        <div>Quantity: <input type="text" name="quantity" size="2" /> </div>
        <div> <input type="submit" value="Order" /> </div>
    </form>
</body>
</html>
