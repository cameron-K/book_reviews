<html>
<head>
	<title>Add Book Review</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/new_review.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div id="container">


	<h3>Add a New Book Title and a Review</h3>
	<form action="/reviews/add_review" method="post">
		<div class="form-group">
			<label>Book Title</label>
			<input type="text" name="title" class="form-control">
		</div>
		<div id="author_group">
			<label>Author</label>
			<div class="form-group">
				<p>Choose from the list:</p>
				<select name="author_id" class="form-control">

					<?php foreach ($authors as $author) {?>

						<option value=<?= $author['id']; ?>><?= $author['name']; ?></option>

					<?php } ?>

				</select>
			</div>

			<div class="form-group">
				<p>Add a new Author:</p>
				<input type="text" name="add_author" class="form-control"/>
			</div>
		</div>

		<div class="form-group">
			<label>Review</label>
			<textarea name="review" class="form-control"></textarea>
		</div>

		<div class="form-group">
				<label>Choose from the list:</label>
				<select name="rating" class="form-control">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
			<input type="submit" value="Submit" class="btn btn-default">
	</form>
</div>
</body>
</html>
