<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_account.css">   

</head>
<body>
    

<div class="center">
         <h1 class="titel">Login</h1>
         <form action="../../Controller/ControlLogin.php" method="get">
            <?php
         if(isset($_GET['erreur'])) {?>
               <p style="background: #F2DEDE;color: #A94442;padding: 10px;width: 95%;border-radius: 5px;margin: 20px auto;text-align: center;">
               <?php echo $_GET['erreur']; ?></p>
     	    <?php } ?>
         <div class="txt_field">
         <input   name="cin" type="number" required>
            <span></span>
            <label>Cin</label>
         </div>
         <div class="txt_field">
         <input name="password"  type="password" required> 

            <span></span>
            <label>Password</label>
         </div>
         <input type="submit" value="Login">
         <div class="sign">
               Not a member? <a href="regiister.php">Register</a>
         </div >
         <?php if(isset($_GET['error'])) 
             echo $_GET['error']  ?>
         </form>
      </div>


</body>
</html>