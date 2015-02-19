<?php $this->load->view("partials/header_view")?>
<?php $this->load->view("partials/navin_view")?>
<div class="container">
	<!-- MENU -->
	<h2>Welcome, <?=$user["name"]?>!</h2>
	<!-- RECENT REVIEWS -->
	<div class="row">
		<div class="col-xs-6">
			<h3>Recent Book Reviews</h3>
<?php foreach($reviews as $review){?>
			<h4><a href="/reviews/view_book/<?=$review['book_id']?>"><?=$review["title"]?></a></h4>
			<p>Rating: 
<!-- 				<?php
    			for($x=1;$x<=$starNumber;$x++) {
        		echo '<img src="path/to/star.png" />';
    			}
    			if (strpos($starNumber,'.')) {
        		echo '<img src="path/to/half/star.png" />';
        		$x++;
    			}
    			while ($x<=5) {
        		echo '<img src="path/to/blank/star.png" />';
        	$x++;
    			}
?> -->
			<?=$review["rating"]?></p>
			<p><a href="/users/view_user/<?=$review['user_id']?>"><?=$review["alias"]?></a> says: <i><?=$review["content"]?></i></p>
			<p><i>Posted on <?=$review["created_at"]?></i></p>
<?php 	}?>
		</div>
		<!-- OTHER BOOKS WITH REVIEWS, echo all titles, linking to book page-->
		<div class="col-xs-6">
			<h3>Other Books with Reviews</h3>
<?php 	foreach($books as $book){?>
					<p><a href="/reviews/view_book/<?=$book['id']?>"><?=$book["title"]?></a></p>
<?php 	}	?>
		</div>
	</div>
</div>
</body>
</html>