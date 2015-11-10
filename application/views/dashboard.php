<?php $this->load->view("partials/header")?>
<?php $this->load->view("partials/nav")?>
<!-- MENU -->
<h2>Welcome, <?=$user["name"]?>!</h2>
<!-- RECENT REVIEWS -->
<div class="row">
	<div class="col-xs-6">
		<h3>Recent Book Reviews</h3>
<?php foreach($reviews as $review){?>
		<div class="well">
		<h4><a href="/reviews/view_book/<?=$review['book_id']?>" class="title"><?=$review["title"]?></a></h4>
		<p>Rating: 
<?php
			for($x = 1; $x <= $review["rating"]; $x++) {
    		echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
			}
			while ($x<=5) {
    		echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
    		$x++;
			}
?>
		</p>
		<p><a href="/users/view_user/<?=$review['user_id']?>"><?=$review["alias"]?></a> says: <i><?=$review["content"]?></i></p>
		<h6><i>Posted on <?=$review["created_at"]?></i></h6>
		</div>
<?php 	}?>
	</div>
	<!-- OTHER BOOKS WITH REVIEWS, echo all titles, linking to book page-->
	<div class="col-xs-5 col-xs-offset-1">
		<h3>Other Books with Reviews</h3>
		<hr>
<?php 	foreach($books as $book){?>
				<p><a href="/reviews/view_book/<?=$book['id']?>"><?=$book["title"]?></a></p>
<?php 	}	?>
	</div>
</div>
<?php $this->load->view("partials/footer")?>
