<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="dashboard.js"></script>
</head>

<body>
    <h1>Shopping Cart</h1>
    <h2 class="category-name">Category 1 - Healthy Snacks</h2>
    <ul class="category-items" id="healthySnacks">
        <li>
            <input type="checkbox" name="item[]" value="Lays Tangy">
            <label for="item[]">Lays Tangy ($1)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Granola Bars">
            <label for="item[]">Granola Bars ($2)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Almonds">
            <label for="item[]">Almonds ($3)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Trail Mix">
            <label for="item[]">Trail Mix ($4)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Kale Chips">
            <label for="item[]">Kale Chips ($5)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
    </ul>
    <h2 class="category-name">Category 2 - Unhealthy Snacks</h2>
    <ul class="category-items" id="unhealthySnacks">
        <li>
            <input type="checkbox" name="item[]" value="Potato Chips">
            <label for="item[]">Potato Chips ($1)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Candy Bars">
            <label for="item[]">Candy Bars ($2)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Popcorn">
            <label for="item[]">Popcorn ($3)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Soda">
            <label for="item[]">Soda ($4)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
        <li>
            <input type="checkbox" name="item[]" value="Cookies">
            <label for="item[]">Cookies ($5)</label>
            <input type="number" name="quantity[]" min="1" max="5">
        </li>
    </ul>
    <button id="submitBtn">Submit</button>

    <form class="userform" action="welcome.php" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone">Phone number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
            <!-- <p>Total payable amount: <span id="totalAmount">$0</span></p> -->
            <label for="total_payable">Total payable amount:</label>
            <input type="text" id="total_payable" name="total_payable" value="$0" disabled>
        </div>
        <div>
            <button type="submit" name="submit_order">Submit Order</button>
        </div>
    </form>

</body>

</html>