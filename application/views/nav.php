<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/nav.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div id="nav">
  		<h1>Welcome <?= $this->session->userdata('alias'); ?>!</h1>
  		<span>
        <a href="/books">Home</a> |
  			<a id='new_book_link' href="/books/add">Add Book And Review</a> |
  			<a href="/users/<?= $this->session->userdata('user_id'); ?>">My Reviews</a> |
  			<a href="/">Logout</a>
  		</span>

  	</div>

  </body>
</html>
