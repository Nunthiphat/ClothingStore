<html>

<head>
    <link rel="stylesheet" href="header.css">
</head>
<header>
    <div class="navigation">
        <div class="first">
            <h2 class="menu-item"><a id="Logo" href="homepage.php">KHAOTOM</a></h2>
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="homepagephp.php?Gender=w">WOMEN</a>
                <ul class="dropdown-body">
                    <li><a href="homepagephp.php?Gender=w&Type=shirt">SHIRT</a></li>
                    <li><a href="homepagephp.php?Gender=w&Type=pants">PANTS</a></li>
                    <li><a href="homepagephp.php?Gender=w&Type=hoodie">HOODIE</a></li>
                </ul>
            </ul>
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="homepagephp.php?Gender=m">MEN</a>
                <ul class="dropdown-body">
                    <li><a href="homepagephp.php?Gender=m&Type=shirt">SHIRT</a></li>
                    <li><a href="homepagephp.php?Gender=m&Type=pants">PANTS</a></li>
                    <li><a href="homepagephp.php?Gender=m&Type=hoodie">HOODIE</a></li>
                </ul>
            </ul>
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="homepagephp.php?Gender=k">KIDS</a>
                <ul class="dropdown-body">
                    <li><a href="homepagephp.php?Gender=k&Type=shirt">SHIRT</a></li>
                    <li><a href="homepagephp.php?Gender=k&Type=pants">PANTS</a></li>
                    <li><a href="homepagephp.php?Gender=k&Type=hoodie">HOODIE</a></li>
                </ul>
            </ul>
        </div>
        <div class="last">
            <div class="Profile">
                <button class="Profile btn-profile" onclick="window.location.href = 'Account.php'">Profile</button>
            </div>
            <div class="Cart">
                <a class="btn-cart" href="ShoppingCart.php">Cart</a>
            </div>
        </div>
    </div>
</header>

</html>