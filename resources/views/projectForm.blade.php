<?php
    //dd($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Form</title>
</head>
<body>
    <!-- il valore di action è quello indicato nella route:list che fa riferimento al metodo store del projectController -->
    <form method="post" action="/project">
        @csrf
        <label for="name">name:</label><br>
        <input type="text" id="name" name="name" value=""><br>
        <label for="description">description:</label><br>
        <textarea name="description"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>
