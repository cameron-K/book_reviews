<html>
<head>
	<title>Review A Book</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/review.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<div id="container">
		<div class="row">
			<div class="col-md-12">
				<h2><?= $reviews[0]['title']; ?></h2>
				<h3>By: <?= $reviews[0]['author_name']; ?></h3>
			</div>

		</div>

		<div class="row">
			<div class='col-md-8' id="left">
				<h3>Reviews</h3>
				<?php foreach ($reviews as $review): ?>


					<div class="review">
						<h4><a href="/books/<?= $review['book_id']; ?>"> <?= $review['title']; ?></a></h4>
						<span class='author_name'>by: <?= $review['author_name']; ?></span>
						<div class='rating_section'>
							<?php
								for($r=0;$r<$review['rating'];$r++){
									echo "<img src='../assets/golden_star.png' alt='*' />";
								}
							?>
						</div>
						<div class="review_section">
							<p><a href="/users/<?= $review['user_id']; ?>"><?= $review['alias']; ?></a> says: <?= $review['review']; ?></p>
							<p>Posted: <?= $review['created_at']; ?></p>
						</div>
							<?php if($review['user_id']===$this->session->userdata('user_id')){
								echo "<a href='/delete/".$review['review_id']."'>delete</a>";
							} ?>


					</div>
				<?php endforeach ?>
			</div>



		<div id="right" class='col-md-4'>
			<form action="/reviews/add_review" method="post">
				<div class="form-group">
					<label>Add a Review:</label>
					<textarea name="review" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<label>Rating:</label>
					<select name="rating" class="form-control">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<input type="hidden" name="title" value="<?= $reviews[0]['title'] ?>">
				<input type="hidden" name="author_id" value="<?= $reviews[0]['author_id'] ?>">
				<input type="submit" value="Submit Review">
			</form>
			</div>
		</div>
	</div>

</body>
</html>
