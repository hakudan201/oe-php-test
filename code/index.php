<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Milk Tea Store</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body class="black">
  <?php
  include("createDB.php");
  include("insertDB.php");
  include("navbar.php");
  include("footer.php");
  include("header.php");
  $_SESSION['toppings'] = "";
  ?>
  <article id="mainArticle">
    <div class="dropdown grid-item-right">
      <span>Sort By&nbsp;&nbsp;&nbsp;</span>
      <button class="dropbtn">DEFAULT</button>
      <div class="dropdown-content">
        <a href="index.php?Sort=NameASC">Name(ASC)</a>
        <a href="index.php?Sort=NameDESC">Name(DESC)</a>
        <a href="index.php?Sort=PriceASC">Price(ASC)</a>
        <a href="index.php?Sort=PriceDESC">Price(DESC)</a>
      </div>
    </div>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <input type="submit" name="filter" value="Filter" class="button"></button>
      <h2 class="bolder">Toppings:</h2>
      <ul>
        <li class="checkbox">
          <input class="checkbox-pop" type="checkbox" id="check1" name="toppings[]" value="Milk Foam" />
          <label for="check1"><span></span>Milk Foam</label>
        </li>
        <li class="checkbox">
          <input class="checkbox-pop" type="checkbox" id="check2" name="toppings[]" value="White Pearl" />
          <label for="check2"><span></span>White Pearl</label>
        </li>
        <li class="checkbox">
          <input class="checkbox-pop" type="checkbox" id="check3" name="toppings[]" value="Pearl" />
          <label for="check3"><span></span>Pearl</label>
        </li>
        <li class="checkbox">
          <input class="checkbox-pop" type="checkbox" id="check4" name="toppings[]" value="Aloe" />
          <label for="check4"><span></span>Aloe</label>
        </li>
      </ul>
    </form>
    </div>
</body>

</html>
