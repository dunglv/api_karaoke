<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Karaoke online</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
	<div id="app">
		<div id="secmain">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Title</a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="./song/create.php">Create new</a></li>
							<li><a href="#">Collection</a></li>
						</ul>
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Id or name song...">
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">Logout</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li><a href="#">Separated link</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">Panel heading</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-7">

										<iframe id="vid" width="560" height="315" src="https://www.youtube.com/embed/PbkPz5hOWSo" frameborder="0" allowfullscreen></iframe>
									</div>
									<div class="col-md-5">
										<?php 
										$d = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id=0d5RNTOKBYQ&key=AIzaSyBjXlDvy1m-hGgoGwIFqM9xCw1B7G3vBBs&part=snippet,contentDetails,statistics,status');
										$d = json_decode($d);
											
										if (count($d->items) > 0) {
											$title = ($d->items[0]->snippet->title);
											$description = ($d->items[0]->snippet->description);
											$dur = ($d->items[0]->contentDetails->duration);
											$vid = array();
											preg_match_all('/\d+/', $dur, $vid);
											$td = '';
											if(strpos($dur, 'H') !==false && strpos($dur, 'M') !== false && strpos($dur, 'S') !== false){
												$td = $vid[0][0].':'.$vid[0][1].':'.$vid[0][2];
											}elseif(strpos($dur, 'H') === false && strpos($dur, 'M') !== false && strpos($dur, 'S') !== false){
												$td = '00:'.$vid[0][0].':'.$vid[0][1];
											}elseif(strpos($dur, 'H') === false && strpos($dur, 'M') === false && strpos($dur, 'S') !== false){
													$td = '00:00:'.$vid[0][0];
											}else{
												$td = '00:00:00';
											}
											
										} ?>
										<div class="about-song">
											<table class="table table-striped table-hover">
												<thead>
													<tr>
														<th>Name:</th>
														<th><?php echo $title; ?></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Description</td>
														<td><?php echo $description; ?></td>
													</tr>
													<tr>
														<td>Duration:</td>
														<td><?php echo $td; ?></td>
													</tr>
													<tr>
														<td>Lyric:</td>
														<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex accusamus cupiditate molestias aliquid quam consequatur temporibus voluptas perspiciatis, dolore deserunt, eveniet in dignissimos est aut eos error possimus mollitia, voluptates praesentium repellat excepturi sint. Inventore ducimus corrupti harum ex, expedita. Fugit aut quibusdam, repellat harum recusandae alias sequi repellendus voluptate nesciunt. Cupiditate quidem maxime vitae, quibusdam inventore ut eaque odit amet tempora excepturi, in a asperiores repudiandae adipisci voluptas doloribus, temporibus eligendi eius facere recusandae consequatur! Dolores officia ipsum consequatur, odit ipsa aliquid id, sapiente rem modi voluptates eos quo sunt ullam fuga. Ex vero expedita natus optio ipsum minima eius sit nulla dicta maiores fugiat vitae dolorum quia velit error nostrum, blanditiis illum, rerum quae accusantium praesentium! Earum unde rem nobis aliquam nemo inventore deserunt hic quasi odio doloremque dignissimos adipisci illum cupiditate expedita dolor quos iste, doloribus omnis repellendus eligendi laborum dolorum saepe debitis officiis. Dolor minima blanditiis nemo. Ipsam quia dolores ad, pariatur fuga quam a placeat consequatur soluta eaque minus praesentium porro, beatae quis quisquam, corporis illum. Rerum voluptate fugiat, autem officiis, inventore perferendis ratione qui velit nam exercitationem, eaque iure nostrum similique eos! Deleniti quaerat distinctio nesciunt rerum voluptates ipsum excepturi et nostrum perspiciatis dignissimos.</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						
							<!-- Table -->
							
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<form action="./save.php" method="POST">
							<div class="panel-heading">Panel heading</div>
							<div class="panel-body">
								
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th width="1%">#0</th>
												<th>#Lyric</th>
												<th width="10%">#Start</th>
												<th width="10%">#End</th>
												<th width="10%">#Timing</th>
												<th width="12%">#b</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td><input type="text" style="width:100%;" name="line[]" placeholder="Input lyric..."></td>
												<td>
													<input type="text" name="start[]" class="field_start start_01" placeholder="00:00:00">
												</td>
												<td>
													<input type="text" name="stop[]" class="field_stop stop_01" placeholder="00:00:00">
												</td>
												<td><span id="time_duration"></span></td>
												<td><button id="on_start_01" type="button" class="btn btn-default btn-kara-start"><i class="fa fa-caret-square-o-right"></i></button><button id="on_stop_01" type="button" class="btn btn-default btn-kara-stop"><i class="fa fa-caret-square-o-left"></i></button></td>
											</tr>
											<tr>
												<td>2</td>
												<td><input type="text" style="width:100%;" name="line[]" placeholder="Input lyric..."></td>
												<td>
													<input type="text" name="start[]" class="field_start start_01" placeholder="00:00:00">
												</td>
												<td>
													<input type="text" name="stop[]" class="field_stop stop_01" placeholder="00:00:00">
												</td>
												<td><span id="time_duration"></span></td>
												<td><button  type="button" class="btn btn-default "><i class="fa fa-caret-square-o-right"></i></button><button  type="button" class="btn btn-default"><i class="fa fa-caret-square-o-left"></i></button></td>
											</tr>
										</tbody>
									</table>
							</div>
							<div class="panel-footer text-right">
								<button  type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Save</button>
								<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
							</div>
							</form>
							<!-- Table -->
							
						</div>
						
					</div>
					<div class="col-md-7">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Panel Left</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>#No</th>
											<th>Word</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
											<td><button  class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
											<td><button  class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
										</tr>
										<tr>
											<td>3</td>
											<td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
											<td><button  class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
										</tr>
										<tr>
											<td>4</td>
											<td>Lorem ipsum dolor sit amet, consectetur adipisicing.</td>
											<td><button  class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></button> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Panel right</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>#No</th>
											<th>#Text</th>
											<th>#Timing</th>
											<th>#Save</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td width="1%">1</td>
											<td width="50%"><span class="word">Lorem</span></td>
											<td><input type="text" name="#" value="01:00:00"></td>
											<td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span></button></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>