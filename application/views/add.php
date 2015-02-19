<?php $this->load->view("partials/header_view")?>
<?php $this->load->view("partials/navin_view")?>
	<!-- MENU -->
	<h2>Add A New Book and A Review</h2>
	<!-- ADD BOOK/REVIEW, one form to insert in all tables-->
	<form action="" method="post">
		<input type="hidden" name="action" value="new_book">
		<label><h4>Book Title:</h4><input type="text" name="title"></label>
		<h4>Author:</h4>
			<label>Choose from the list:
				<select name="old_author">
					<option></option>
<?php 		foreach($authors as $author){?>
						<option value="<?=$author['id']?>"><?=$author["name"]?></option>
<?php			}?>	
				</select>
			</label>
			<label>Or add a new author: <input type="text" name="new_author"></label>
		<label><h4>Review:</h4><textarea name="review"></textarea></label>
		<label><h4>Rating:</h4>
			<select name="rating">
				<option value="0"></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</label>
		<input type="submit" value="Add Book and Review">
	</form>
	<?= $this->session->flashdata("author_errors")?>
	<?= $this->session->flashdata("book_errors")?>
</body>
</html>