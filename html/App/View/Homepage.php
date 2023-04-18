<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Todo App</h1>

    <!-- Add item form -->
    <form method="POST" action="/Home/edit">
        <label for="item_name">New Item:</label>
        <input type="text" id="item_name" name="item_name" placeholder="Enter new item...">
        <button type="submit" name="add_item">Add</button>
    </form>

    <hr>

</body>

</html>