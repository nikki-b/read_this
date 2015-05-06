<?php $this->load->view("partials/header")?>
<?php $this->load->view("partials/nav")?>
<!-- MENU -->
<h2>Add A New Book and A Review</h2>
<!-- ADD BOOK/REVIEW, one form to insert in all tables-->
<form action="/reviews/add_new" method="post">
	<input type="hidden" name="action" value="new_book">
	<div class="form-group">
		<label><h4>Book Title:</h4><input type="text" class="form-control" name="title"></label>
	</div>
	<div class="form-group">
		<h4>Author:</h4>
		<label>Choose from the list:
			<select class="form-control" name="old_author">
				<option></option>
<?php 		foreach($authors as $author){?>
						<option value="<?=$author['id']?>"><?=$author["name"]?></option>
<?php			}?>	
			</select>
		</label>
	</div>
	<div class="form-group">
		<label>Or add a new author: <input type="text" class="form-control" name="new_author"></label>
	</div>
	<div class="form-group">
		<label><h4>Review:</h4><textarea name="review" class="form-control"></textarea></label>
	</div>
	<div class="form-group">
		<label><h4>Rating:</h4>
			<select name="rating" class="form-control">
				<option value="0"></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</label>
	</div>
	<input type="submit" class="btn btn-default" value="Add Book and Review">
</form>
<?= $this->session->flashdata("author_errors")?>
<?= $this->session->flashdata("book_errors")?>
<?php $this->load->view("partials/footer")?>
