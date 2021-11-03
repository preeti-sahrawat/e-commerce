<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Register</title>

</head>

<body>
    <form action="" method="post" class="signup-form">
        <div class="form-header">
            <h2>Sign up</h2>
            <p>register with us</p>
        </div>
        <div class="form-group">
            <label for="">Enter name</label>
            <input type="text" class="form-control" name="username" id="uname" placeholder="Enter Username" autocomplete="off" required>
            <span id="user-status1" style="font-size:15px; "></span>
        </div>
        <div class="form-group">
            <label for="">Enter Email</label>
            <input type="email" class="form-control" id="uemail" onBlur="validemail()" name="email" placeholder="Enter Email" autocomplete="off" required>
            <span id="user-status2" style="font-size:15px; "></span>

        </div>
        <div class="form-group">
            <label for="">Enter Number</label>
            <input type="number" class="form-control" name="number" id="number" onBlur="valid()" placeholder="Enter Number" autocomplete="off"
                required>
                <span id="user-status" style="font-size:15px; color:red; "></span>
        </div>
        <div class="form-group">
            <label for="">Enter Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off"
                required>
        </div>
        <div class="form-group">
            <label for="">Select Country</label>
            <select name="country" class="form-control" required>
                <option disabled="">select Country</option>
                <option value="india"> India</option>
                <option value="usa">Usa</option>
                <option value="uk">Uk</option>
                <option value="france">France</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Select Gender</label>
            <select name="gender" class="form-control" required>
                <option disabled="">select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label class="checkbox-inline"><input type="checkbox" required> I accept Terms Condition <a href="#"></a>
                &nbsp; <a href="#">Privacy Police</a></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg" id="register" name="register">Register</button>
        </div>
    </form>
        <div class="text-center acc small" style="color:white;">Allredy have an account?
    </a></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</html>