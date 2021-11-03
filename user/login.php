<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/433888fe69.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/signin.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <h2>LogIn</h2>
        <form action="">
        <div class="box">
            <i class="fa fa-user"></i>
            <select name="acctype" id="type" placeholder="select accout">
                <option value="">Select Account Type</option>
                <option value="user">User</option>
                <option value="seller">Seller Account</option>
            </select>
        </div>
        <div class="box">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Enter Your email" required>
        </div>
        <div class="box">
            <i class="fa fa-key"></i>
            <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
        </div>
        <button type="submit" class="btn">SignIn</button>
    </div>
    </form>
</body>

</html>