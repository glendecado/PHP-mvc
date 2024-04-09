<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include(__DIR__ . '/../App/urlProtection.php'); ?>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <h1>INSERT</h1>

    <form action="/m" method='post'>
        <input type="text" name="email" placeholder="email">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">

        <input type="submit">
    </form>
    <h1>DELETE</h1>
    <form action="/d" method='post'>
        <input type="text" name="id" placeholder="Id">
        <input type="submit">
    </form>
    <h1>VIEW</h1>
    <form action="/search" method='get'>
        <input type="text" name="id" placeholder="Id">
        <button type="submit">search for ID</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>email</th>
                <th>username</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key) : ?>
                <tr>
                    <td><?= $key['ID'] ?></td>
                    <td><?= $key['email'] ?></td>
                    <td><?= $key['username'] ?></td>
                    <td>
                        <form action="/d" method='post'>
                            <button type="submit" name="id" value=<?= $key['ID'] ?>>DELETE</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


</body>

</html>