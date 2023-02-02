<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank U</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body> 
    <h1>Thank U </h1>
    <div class="col">
      <p class="lbl">Name:</p><?php echo $_POST['uname']; ?>
    </div>
    <div class="col">
      <p class="lbl">Email:</p><?php echo $_POST['email']; ?>
    </div>
    <div class="col">
      <p class="lbl">Message:</p><?php echo $_POST['msg']; ?>
    </div>
  </body>
</html>