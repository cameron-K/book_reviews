<html>
<head>
	<title>User Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/user.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<div id="container">
		<div class="row">
			<div class="col-md-6">
				<h4>User Alias: <?= $user['alias']; ?></h4>
				<h4>Name: <?= $user['name']; ?></h4>
			</div>

			<div class="col-md-6">
				<h4>Email: <?= $user['email']; ?></h4>
				<h4>Total Reviews: <?= COUNT($reviews); ?></h4>
			</div>
		</div>
<div class="row">
	<div class="col-md-12">
		<h3>Posted Reviews on the following books:</h3>
		<?php foreach ($reviews as $review): ?>
			<p><a href="/books/<?= $review['book_id'] ?>"><?= $review['title'] ?></a></p>
		<?php endforeach ?>
	</div>
</div>

	</div>
</body>
</html>
