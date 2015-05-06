<?php $this->load->view("partials/header")?>
<?php $this->load->view("partials/nav")?>
	<!-- USER INFO -->
	<h2>User Alias: <?=$profile["alias"]?></h2>
	<h5>Name: <?=$profile["name"]?></h5>
	<h5>Email: <?=$profile["email"]?></h5>
	<h5>Total Reviews: <?=$count?></h5>
	<!-- LIST OF REVIEWED BOOKS -->
	<h3>Posted Reviews on the following books:</h3>
<?php foreach($reviews as $review){?>
				<p><a href="/reviews/view_book/<?=$review['book_id']?>"><?=$review["title"]?></a></p>
<?php	}?>
<?php $this->load->view("partials/footer")?>
