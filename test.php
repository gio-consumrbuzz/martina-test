<!DOCTYPE HTML>
<html>

<head>
</head>

<body>

  <?php
  $name = $email = $phone = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = email_inputs($_POST["email"]);
    $phone = test_input($_POST["phone"]);
  }

  function test_input($data)
  {
    // removes spaces
    $data = preg_replace("/\s+/", "", $data);
    // removes special symbols, can be simplified
    $data = str_replace(
      array(
        '\'', '"',
        ',', ';', '<', '+', '>', '-', '_', '@', '!', '#', '$', '^', '&', '*', '(', ')'
      ),
      '',
      $data
    );
    return $data;
  }

  function email_inputs($email)
  {
    //Splits email at @, stores two seperate strings
    $email = preg_split("/@/", $email);
    return (implode(", ", $email));
  }

  ?>

  <h1>Test Form:</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    First Name: <input type="text" name="name">
    <br><br>
    E-mail: <input type="text" name="email">
    <br><br>
    phone: <input type="text" name="phone">
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
  echo "<h2>Formatted Text:</h2>";
  echo $name;
  echo "<br>";
  echo $email; 
  echo "<br>";
  echo $phone;
  ?>

</body>

</html>