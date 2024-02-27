<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            background-color: #444;
            color: #fff;
            text-align: center;
            padding: 0.5em 0;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 1em;
            font-size: 1.2em;
        }

        section {
            padding: 2em;
        }

        .product {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 1em;
            padding: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <h1>Your Website</h1>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">Shop</a>
        <a href="#">Contact</a>
    </nav>

    <section>
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <div>
                <h2>Product 1</h2>
                <p>Description of Product 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button>Add to Cart</button>
            </div>
        </div>

        <div class="product">
            <img src="product2.jpg" alt="Product 2">
            <div>
                <h2>Product 2</h2>
                <p>Description of Product 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button>Add to Cart</button>
            </div>
        </div>
    </section>

    <footer>
        &copy; 2024 Your Website. All rights reserved.
    </footer>
</body>

</html>
