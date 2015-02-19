<?php $this->load->view("partials/header_view")?>
<?php $this->load->view("partials/navin_view")?>
	<!-- USER INFO -->
	<h2>User Alias: <?=$profile["alias"]?></h2>
	<h3>Name: <?=$profile["name"]?></h3>
	<h3>Email: <?=$profile["email"]?></h3>
	<h3>Total Reviews: <?=$count?></h3>
	<!-- LIST OF REVIEWED BOOKS -->
	<h3>Posted Reviews on the following books:</h3>
<?php foreach($reviews as $review){?>
				<p><a href="/reviews/view_book/<?=$review['book_id']?>"><?=$review["title"]?></a></p>
<?php	}?>
</body>
</html>