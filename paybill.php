<?php include_once('lib/header.php'); 
include_once('functions/redirect.php'); 

if(!isset($_SESSION['loggedIn'])){
    redirect("login.php");
}
?>
	
<div class="container-fluid">
  <div class="row">
  
<?php require_once("lib/nav_bar.php") ; ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h2>Pay Bill</h2>
			<div class="table-responsive">
		        <table class="table table-striped ">
		          <thead>
				      <tr>
						<th>COMMING SOON...</th>
					  </tr>
				  </thead>

				</table>
			</div>
		</main>
	</div>
</div>
<?php include_once('lib/footer.php'); ?>