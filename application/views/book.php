<?php $this->load->view("partials/header_view")?>
<?php $this->load->view("partials/navin_view")?>
	<!-- TITLE AND MENU -->
	<h2><?=$book["title"]?></h2>
	<p>Author: <?=$book["name"]?></p>
	<!-- ECHO ALL REVIEWS, link to delete for own reviews -->
	<h3>Reviews</h3>
<?php foreach ($reviews as $review){?>
				<hr>
				<p>Rating: <?=$review["rating"]?></p>
				<p><a href="/users/view_user/<?=$review['id']?>"><?=$review["alias"]?></a> says: <i><?=$review["content"]?></i></p>
				<p><i>Posted on <?=$review["created_at"]?></i></p>
<?php		if($review["id"]===$this->session->userdata("user")){?>
					<form action="/reviews/delete_review" method="post">
						<input type="hidden" name="bookID" value="<?=$book['id']?>">
						<input type="hidden" name="reviewID" value="<?$review['review_id']?>">
						<input type="submit" value="Delete this review">
					</form>
<?php		}	
			}	?>
	<!-- ADD A NEW REVIEW FOR THIS BOOK -->
	<h3>Add a review</h3>
	<form action="/reviews/add_new" method="post">
		<input type="hidden" name="action" value="new_review">
		<input type="hidden" name="book_id" value="<?=$book['id']?>">
		<textarea name="review"></textarea>
		<label><h4>Rating</h4>
			<select name="rating">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</label>
		<input type="submit" value="Submit Review">
	</form>
</body>
</html>