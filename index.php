 <?php

  $error = [];
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = htmlspecialchars(trim($_POST["fname"]));
    $password = $_POST["password"];
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    if(empty($fname)) {
      $error["fname"] = "Name Is Required";
    }
    else if(strlen($fname) < 3) {
      $error['fname'] = "Name must be at least 3 characters.";
    }

    if(empty($email)) {
      $error["email"] = "Email Is Required";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Invalid email format.";
    }

    if(empty($password)) {
      $error["password"] = "Password Is Required";
    }
    else if(strlen($password) < 5) {
      $error['password'] = "Password must be at least 5 characters.";
    }

    if(empty($error)) {
      echo "Registration Successful";
    }

  }

?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 </head>
 <body>

    <form action="" method="post">
      <input type="text" name="fname" placeholder="Enter Name">
      <span style="color:red;"><?php echo $error['fname'] ?? ''; ?></span><br><br>
      <input type="password" name="password" placeholder="Enter Password">
      <span style="color:red;"><?php echo $error['password'] ?? ''; ?></span><br><br>
      <input type="text" name="email" placeholder="Enter Valid Email">
      <span style="color:red;"><?php echo $error['email'] ?? ''; ?></span><br><br>
      <input type="submit" name="submit">
    </form>

 </body>
 </html>