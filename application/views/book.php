<?php $this->load->view("partials/header")?>
<?php $this->load->view("partials/nav")?>
<!-- TITLE AND MENU -->
<h2><?= $book["title"] ?></h2>
<h4>Author: <?= $book["name"] ?></h4>
<!-- ECHO ALL REVIEWS, link to delete for own reviews -->
<h3>Reviews</h3>
<?php foreach ($reviews as $review){?>
		<div class="well">	
			<p>Rating: 
<?php
				for($x = 1; $x <= $review["rating"]; $x++){
	    		echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
				}
				while ($x<=5){
	    		echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
	    		$x++;
				}
?>
			</p>
			<p><a href="/users/view_user/<?= $review['id'] ?>"><?=$review["alias"]?></a> says: <i><?= $review["content"] ?></i></p>
			<h6><i>Posted on <?= $review["created_at"] ?></i></h6>
<?php		if($review["id"]===$this->session->userdata("user")){?>
				<form action="/reviews/delete_review" method="post">
					<input type="hidden" name="bookID" value="<?= $book['id'] ?>">
					<input type="hidden" name="reviewID" value="<?= $review['review_id'] ?>">
					<input type="submit" class="btn btn-danger" value="Delete this review">
				</form>
<?php		}	?>
		</div>
<?php	}	?>
<!-- ADD A NEW REVIEW FOR THIS BOOK -->
<h3>Add a review</h3>
<form action="/reviews/add_new" method="post">
	<input type="hidden" name="action" value="new_review">
	<input type="hidden" name="book_id" value="<?= $book['id'] ?>">
	<textarea name="review" class="form-control"></textarea>
	<label><h4>Rating</h4>
		<select class="form-control" name="rating">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</label>
	<input type="submit" class="btn btn-default" value="Submit Review">
</form>
<?php $this->load->view("partials/footer")?>
