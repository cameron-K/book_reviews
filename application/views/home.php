<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/home.css" media="screen" title="no title" charset="utf-8">
</head>
<body>


	<div id="container">
		<div class="row">


		<div id="left" class='col-md-8'>
			<h3>Recent Book Reviews</h3>

			<?php for($i=0;$i<3&&$i<count($reviews);$i++){ ?>

			<div class="review">
				<h4><a href="/books/<?= $reviews[$i]['book_id']; ?>"> <?= $reviews[$i]['title']; ?></a></h4>
				<span class='author_name'>by: <?= $reviews[$i]['author_name']; ?></span>
				<div class='rating_section'>
					<?php
						for($r=0;$r<$reviews[$i]['rating'];$r++){
							echo "<img src='./assets/golden_star.png' alt='*' />";
						}
					?>
				</div>
				<div class="review_section">
					<p><a href="/users/<?= $reviews[$i]['user_id']; ?>"><?= $reviews[$i]['alias']; ?></a> says: <?= $reviews[$i]['review']; ?></p>
					<p>Posted: <?= $reviews[$i]['review_created_at']; ?></p>
				</div>
					<?php if($reviews[$i]['user_id']===$this->session->userdata('user_id')){
						echo "<a href='/delete/".$reviews[$i]['review_id']."'>delete</a>";
					} ?>


			</div>

			<?php } ?>

		</div>
		<div class="col-md-1">

		</div>
		<div id="right" class='col-md-3'>

			<div id="book_titles">
				<h3>More Reviews:</h3>
				<ul>
					<?php foreach ($books as $book): ?>
						<li><a href="/books/<?= $book['book_id']; ?>"><?= $book['title']; ?> - <?= "<span>{$book['name']}</span>"; ?></a></li>
					<?php endforeach ?>

				</ul>
			</div>
		</div>
		</div>
	</div>

</body>
</html>
