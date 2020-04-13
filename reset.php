<?php include_once('lib/header.php'); 

//TODO: Fix session error message display on login page


if(!isset($_SESSION['loggedIn']) && !isset($_GET['token']) && !isset($_SESSION['token'])){
    $_SESSION["error"] = "You are not authorized to view that page";
    header("Location: login.php");
}
if(isset($_SESSION['loggedIn'])){ 
	include_once('lib/dashboardheader.php');
	echo "<main>";
} else{ ?>
<div class="login">
<?php	
}
?>
   <h3>Reset Password</h3>
   <p>Reset Password associated with your account : [email]</p> 
   <!-- TODO: Update email above as they enter it (JS) -->

   <form action="processreset.php" method="POST">
   <p>
        <?php 
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                session_destroy();
            }
        ?>
    </p>
    <?php if(!isset($_SESSION['loggedIn'])) { ?>
    <input
            
            <?php              
                if(isset($_SESSION['token'])){
                    echo "value='" . $_SESSION['token'] . "'";                                                             
                }else{
                    echo "value='" . $_GET['token'] . "'";
                }             
            ?>

           type="hidden" name="token"  />
    <?php } ?>

    <p>
        <label>Email</label><br />
        <input
            
            <?php              
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];                                                     
                }               
                if(isset($_SESSION['loggedIn'])){ 
				?>
                    readonly                                                   
             <?php  
			  }                
            ?>

             type="text" name="email" placeholder="Email" />
    </p>
    <p>
        <label>Enter New Password</label><br />
        <input type="password" name="password" placeholder="Password"  />
    </p>
    <p>
        <button type="submit">Reset Password</button>
    </p>
   </form>
 
<?php 
if(isset($_SESSION['loggedIn'])){ 
	echo "</main>";
}
include_once('lib/footer.php'); ?>