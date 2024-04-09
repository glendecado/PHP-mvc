<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include(__DIR__ . '/../App/urlProtection.php'); ?>
</head>

<body>
    <br>
    <br>
    <br>
    <h1>Post sample</h1>
    <form action="/m" method='post'>
        <input type="text" name="email" placeholder="email">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">

        <input type="submit">
    </form>

    <form action="/d" method='post'>
        <input type="text" name="id" placeholder="Id">
        <input type="submit">
    </form>

</body>

</html>