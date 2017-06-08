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
								<iframe width="560" height="315" src="https://www.youtube.com/embed/PbkPz5hOWSo" frameborder="0" allowfullscreen></iframe>
							</div>
						
							<!-- Table -->
							
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-default">
							<!-- Default panel contents -->
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
											<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam amet similique beatae minus dicta id.</td>
											<td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button></td>
											<td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button></td>
											<td>01:00:00</td>
											<td>#00</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="panel-footer text-right">
								<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Save</button>
								<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Save</button>
							</div>

							<!-- Table -->
							
						</div>
						<script type="text/javascript">
							var dr = $('video');
							console.log(dr.length);
						</script>
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
</body>
</html>