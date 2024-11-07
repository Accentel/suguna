<div class="col-sm-1 col-xs-hidden"></div>
  <div class="col-sm-10 col-xs-12">

	<div class=" container-fluid" style="background-color:#565656;">

		  <div class="header" style="height:70px;">
		  <div class="col-sm-8" >
		  <?php include("title.php"); ?>
		 </div>
		 <div class="col-sm-4" >
		 <b id="logout" style="color:#fff;padding-top:25px;" >Welcome to <?php echo $_SESSION['suguna']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b>
		 </div>
		 </div>
			
			  
			 </div>  
			 <?php
				include("main_menu.php");
			  ?>