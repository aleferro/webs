
<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Weekly News</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM videos ORDER BY upload_date DESC");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
					  echo "<h5><b>".$row['title']."</b></h5>";
					  echo "<iframe class='embed-responsive-item' width='250' height='187.5' src='".$row['url']."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
		</div>
	</div>
</div>
