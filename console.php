
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="src\Repositories\LibraryService.php" method='POST'>
        Book Title : <input type="text" name="title">
        Author Name : <input type="text" name="author">
        Price : <input type="text" name="price">
        Stock : <input type="text" name="stock">
        <button type='submit' name="display">Submit</button>
    </form>  -->

    <form action="src\Repositories\LibraryService.php" method = "GET">
        <label for="search">search for a book : </label>
        <input type="text" name='search'>
        <button type='submit'>Search</button>
    </form>
</body>
</html>

<?php
