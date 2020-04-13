<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
}
include_once('lib/dashboardheader.php')
?>
	
<main>
<table class="masterlist">
	<tr>Pay Bill</th>
		<th></th>
	</tr>
	
	<tr>	
		<td>		
			
		</td>
	</tr>
</table>

</main>
<?php include_once('lib/footer.php'); ?>