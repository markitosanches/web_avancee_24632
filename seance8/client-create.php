<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Client Create</h1>
        <form action="client-store.php" method="post"> 
            <label>Name
                <input type="text" name="name">
            </label>
            <label>Address
                <input type="text" name="address">
            </label>
            <label>Phone
                <input type="text" name="phone">
            </label>
            <label>Zip Code
                <input type="text" name="zip_code">
            </label>
            <label>Email
                <input type="email" name="email">
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>