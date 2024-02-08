<?php
require_once('crgmclass.php');
$crgm->login();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login Page</title>
  <style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f0f2f5;
}

h1 {
    margin-left: 30px;
}

.container {
    text-align: center;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 396px;
}

.logo {
    width: 120px;
    height: 120px;
    margin-bottom: 10px;
}

.tagline {
    font-size: 14px;
    color: #606770;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

label {
    font-size: 14px;
    font-weight: bold;
    color: #606770;
}

.input-group {
    position: relative;
}

.input-group input {
    padding: 10px;
    border: 1px solid #dddfe2;
    border-radius: 5px;
    width: 100%;
}


.form-group {
    position: relative;
}

.form-select {
    margin-top: px;
    padding: 4px;
    border: 1px solid #dddfe2;
    border-radius: 5px;
    width: 100%;
}

button {
    padding: 8px;
    background-color: #1877f2;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bolder;
}

button:hover {
    background-color: #0e5a8a;
}

</style>
</head>

<div class="container">
        <img src="images/logo.png" class="logo">
        <h3>Campus Resource Generation Management</h3>
        <!-- <p class="tagline">Campus Resource Generation Management</p> -->
        <form action="" method="post">
            <label for="username"></label>
            <input type="email" id="username" name="email"  placeholder="Username" required>

            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <div class="form-input">
              <label class="access-label" align = "center"></label>
                <select class="form-select" name="access">
                    <option selected>Select Access</option>
                    <option value="administrator">Administrator</option>
                    <option value="crgm">CRGM</option>
                    <option value="cashier">Cashier</option>
                    <option value="accounting">Accounting</option>
                </select>
            </div>

            <button type="submit" name="submit">Log In</button>
        </form>
    </div>
</body>
</html>  

  <!-- <script src="script.js"></script> -->
</body>

</html>