<?php

session_start();

// destroy favorites
//$_SESSION['favorites'] = [];

if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

function is_favorite($id){
	return in_array($id, $_SESSION['favorites']);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Asyncronuos Button</title>

	<style>
		.blog-post {
			border: 1px solid #ccc;
			padding:20px;
			margin-top: 20px;
		}

		.favorite-heart {
			color: red;
			font-size: 3em;
			float: right;
			display: none;
		}

		.favorite .favorite-heart {
			display: block;
		}

		.favorite button.favorite-button {
			display: none;
		}

		button.unfavorite-button {
			display:none;
		}

		.favorite button.unfavorite-button {
			display: inline;
		}
	</style>
</head>
<body>

<?php echo "Session ids: " . join(',', $_SESSION['favorites']); ?>

<div id="blog-posts">
	<div id="blog-post-101" class="blog-post <?php if(is_favorite(101)){ echo 'favorite'; } ?>">
		<span class="favorite-heart">&hearts;</span>
		<h3>Blog Post 101</h3>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		<button class="favorite-button">Favorite</button>
		<button class="unfavorite-button">Unfavorite</button>
	</div>

	<div id="blog-post-102" class="blog-post <?php if(is_favorite(102)){ echo 'favorite'; } ?>">
		<span class="favorite-heart">&hearts;</span>
		<h3>Blog Post 102</h3>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		<button class="favorite-button">Favorite</button>
		<button class="unfavorite-button">Unfavorite</button>
	</div>

	<div id="blog-post-103" class="blog-post <?php if(is_favorite(103)){ echo 'favorite'; } ?>">
		<span class="favorite-heart">&hearts;</span>
		<h3>Blog Post 103</h3>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		<button class="favorite-button">Favorite</button>
		<button class="unfavorite-button">Unfavorite</button>
	</div>

</div>

<script>

function favorite(){
	var parent = this.parentElement;

	var xhr = new XMLHttpRequest();
	xhr.open('POST', '/ajax/ajax_button/favorite.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			var result = xhr.responseText;
			console.log('Result: ' + xhr.responseText);

			if(result === 'true'){
				parent.classList.add('favorite');
			}
		}
	};

	xhr.send("id=" + parent.id);
}

function unfavorite(){
	var parent = this.parentElement;

	var xhr = new XMLHttpRequest();
	xhr.open('POST', '/ajax/ajax_button/unfavorite.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			var result = xhr.responseText;
			console.log(result);

			if(result === 'true'){
				parent.classList.remove('favorite');
			}
		}
	}

	xhr.send("id=" + parent.id);
}

var favoriteButtons = document.getElementsByClassName("favorite-button");

Array.prototype.forEach.call(favoriteButtons, function(button){
	button.addEventListener('click', favorite);
});

var unfavoriteButtons = document.getElementsByClassName("unfavorite-button");

Array.prototype.forEach.call(unfavoriteButtons, function(button){
	button.addEventListener('click', unfavorite);
});
	
</script>

</body>
</html>