<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Karaoke online</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo $base_url ?>/public/css/main.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
	<div id="app">
		<div id="secmain">
			<div class="container">
				<?php 
					if (isset($songs)) {
						foreach ($songs as $song) {
							echo '<a href="'.$base_url.'/song/'.$song->sis.'">'.$song->title.'</a>';
						}
					}
				 ?>
				
			</div>
		</div>
	</div>
	<script src="<?php echo $base_url ?>/public/js/karaoke.js"></script>

</body>
</html>