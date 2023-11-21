<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>
          
               <!-- email -->
          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
          <input type="email" 
                    name="email" 
                    placeholder="Email"
                    value="<?php echo $_GET['email']; ?>"
                    required><br>
          <?php } else { ?>
          <input type="email" 
                    name="email" 
                    placeholder="Email"
                    required><br>
          <?php } ?>
               <!--  -->

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

                 <!-- phone number -->
                 <label>Phone Number</label>
        <?php if (isset($_GET['phone'])) { ?>
            <input type="tel" 
                   name="phone" 
                   placeholder="Phone Number"
                   value="<?php echo $_GET['phone']; ?>"
                   required><br>
        <?php } else { ?>
            <input type="tel" 
                   name="phone" 
                   placeholder="Phone Number"
                   required><br>
        <?php } ?>
        <!-- Phone -->
        
        <!-- address -->
        <label>Address</label>
        <?php if (isset($_GET['address'])) { ?>
            <input type="text" 
                   name="address" 
                   placeholder="Address"
                   value="<?php echo $_GET['address']; ?>"
                   required><br>
        <?php } else { ?>
            <input type="text" 
                   name="address" 
                   placeholder="Address"
                   required><br>
        <?php } ?>

     	<button type="submit">Sign Up</button>
          <a href="index1.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>