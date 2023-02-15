<?php
// print_r($_SESSION['toppings']);

$conn = new mysqli("127.0.0.1:3308", "root", "", "myDB");
$products = []; ?>
<footer id='pageFooter' class='grid-container'>
    <?php

    if (isset($_GET['storeID'])) {

        $_SESSION['storeID'] = $_GET['storeID'];

        $sql = "Select name, toppings, product, price from StoreProducts, Products where StoreProducts.`product` = Products.`id` AND shop = " . $_SESSION['storeID'] . " ORDER BY name ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
    ?>
                <div>
                    <?php echo "MT-0" . $row['product'] ?>
                    <div class="bold"><?php echo $row['name'] ?></div>
                    <hr width="75%" color="#14213d" />
                    <div>
                        <div class="bold">Toppings: </div>
                        <div><?php echo $row['toppings'] ?></div>
                    </div>
                    <div class="bold right">$<?php echo $row['price'] ?></div>
                </div>
            <?php }
        }
    } else if (isset($_GET['Sort'])) {
        $_SESSION['Sort'] = $_GET['Sort'];
        if ($_SESSION['Sort'] == 'NameASC') {
            $sql = "Select name, toppings, product, price from StoreProducts, Products where StoreProducts.`product` = Products.`id` AND shop = " . $_SESSION['storeID'] . " ORDER BY name ASC";
        } else if (($_SESSION['Sort'] == 'NameDESC')) {
            $sql = "Select name, toppings, product, price from StoreProducts, Products where StoreProducts.`product` = Products.`id` AND shop = " . $_SESSION['storeID'] . " ORDER BY name DESC";
        } else if (($_SESSION['Sort'] == 'PriceASC')) {
            $sql = "Select name, toppings, product, price from StoreProducts, Products where StoreProducts.`product` = Products.`id` AND shop = " . $_SESSION['storeID'] . " ORDER BY price ASC";
        } else if (($_SESSION['Sort'] == 'PriceDESC')) {
            $sql = "Select name, toppings, product, price from StoreProducts, Products where StoreProducts.`product` = Products.`id` AND shop = " . $_SESSION['storeID'] . " ORDER BY price DESC";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            ?>
                <div>
                    <?php echo "MT-0" . $row['product'] ?>
                    <div class="bold"><?php echo $row['name'] ?></div>
                    <hr width="75%" color="#14213d" />
                    <div>
                        <div class="bold">Toppings: </div>
                        <div><?php echo $row['toppings'] ?></div>
                    </div>
                    <div class="bold right">$<?php echo $row['price'] ?></div>
                </div>
            <?php }
        }
    } else if (isset($_POST['filter'])) {
        $search = "Select name, toppings, product, price from StoreProducts, Products where StoreProducts.`product` = Products.`id` AND shop = " . $_SESSION['storeID'];
        $aTopping = $_POST['toppings'];
        if (empty($aTopping)) {
        } else {
            $N = count($aTopping);
            for ($i = 0; $i < $N; $i++) {
                $_SESSION['toppings']  .= "'%" . $aTopping[$i] . "%'" . ",";
            }
        }
        $arr = explode(",", $_SESSION['toppings']);
        $N = count($arr);
        for ($i = 0; $i < $N - 1; $i++) {
            $FILTER .= " AND toppings LIKE " . $arr[$i];
        }
        if ($_SESSION['Sort'] == 'NameASC') {
            $SORT = " ORDER BY name ASC";
        } else if (($_SESSION['Sort'] == 'NameDESC')) {
            $SORT = " ORDER BY name DESC";
        } else if (($_SESSION['Sort'] == 'PriceASC')) {
            $SORT = " ORDER BY price ASC";
        } else if (($_SESSION['Sort'] == 'PriceDESC')) {
            $SORT = " ORDER BY price DESC";
        }
        $sql = $search . $FILTER . $SORT;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            ?>
                <div>
                    <?php echo "MT-0" . $row['product'] ?>
                    <div class="bold"><?php echo $row['name'] ?></div>
                    <hr width="75%" color="#14213d" />
                    <div>
                        <div class="bold">Toppings: </div>
                        <div><?php echo $row['toppings'] ?></div>
                    </div>
                    <div class="bold right">$<?php echo $row['price'] ?></div>
                </div>
            <?php }
        }
    } else {
        $sql = "Select * from Products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            ?>
                <div>
                    <?php echo "MT-0" . $row['id'] ?>
                    <div class="bold"><?php echo $row['name'] ?></div>
                    <hr width="75%" color="#14213d" />
                    <div>
                        <div class="bold">Toppings: </div>
                        <div><?php echo $row['toppings'] ?></div>
                    </div>
                    <div class="bold right">$<?php echo $row['price'] ?></div>
                </div>
    <?php }
        }
    }
    echo "</footer>"; ?>
