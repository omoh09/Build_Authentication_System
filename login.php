<?php include_once('lib/header.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: dashboard.php");
}
// include_once('lib/header.php'); 

?>
   
<h3>Login</h3>
    <p>
        <?php 
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                echo "<span style='color:green'>" . $_SESSION['message'] . "</span>";
                session_destroy();
            }
        ?>
    </p>
    <form method="POST" action="processlogin.php">
    <p>
        <?php 
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";

                session_destroy();
            }
			
            if(isset($_SESSION['emailerr']) && !empty($_SESSION['emailerr'])){
                echo "<span style='color:red'>" . $_SESSION['emailerr'] . "</span>";
                session_unset();
            }
            if(isset($_SESSION['emailerrfmt']) && !empty($_SESSION['emailerrfmt'])){
                echo "<span style='color:red'>" . $_SESSION['emailerrfmt'] . "</span>";
                session_unset();
            }
            if(isset($_SESSION['passworderr']) && !empty($_SESSION['passworderr'])){
                echo "<span style='color:red'>" . $_SESSION['passworderr'] . "</span>";
                session_unset();
            }
        ?>
    </p>
               
        <p>
            <label>Email</label><br />
            <input
            
            <?php              
                if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email'];                                                             
                }                
            ?>

             type="text" name="email" placeholder="Email"  />
        </p>

        <p>
            <label>Password</label><br />
            <input type="password" name="password" placeholder="Password"  />
        </p>       
       
       
        <p>
            <button type="submit">Login</button>
        </p>
    </form>
<?php include_once('lib/footer.php'); ?>