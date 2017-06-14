<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Karaoke online</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/public/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
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
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <?php if(isset($song) && count($song) > 0): ?>
                    <form action="" method="POST">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">Panel heading</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div id="kr_video">
                                            </div>
                                            <!-- <iframe id="vid" width="560" height="315" src="https://www.youtube.com/embed/PbkPz5hOWSo" frameborder="0" allowfullscreen></iframe> -->
                                            <script>
                                            var player;

                                            function onYouTubeIframeAPIReady() {
                                                player = new YT.Player('kr_video', {
                                                    width: 600,
                                                    height: 400,
                                                    videoId: 'PbkPz5hOWSo',
                                                    playerVars: {
                                                        // color: 'white'
                                                    }
                                                });
                                            }
                                            $(function() {

                                                var btn_start = $('.btn-kara-start');
                                                var btn_stop = $('.btn-kara-stop');
                                                btn_start.each(function(i) {
                                                    btn_start.eq(i).on('click', function(e) {
                                                        var id = $(this).attr('id').substr(9);
                                                        $('.start_' + id).val(Math.floor(player.getCurrentTime()));
                                                        // console.log($('#vid').getCurrentTime());
                                                    });
                                                });

                                                btn_stop.each(function(i) {
                                                    btn_stop.eq(i).on('click', function(e) {
                                                        var id = $(this).attr('id').substr(8);
                                                        $('.stop_' + id).val(Math.floor(player.getCurrentTime()));
                                                        // console.log($('#vid').getCurrentTime());
                                                    });
                                                });
                                            });
                                            </script>
                                        </div>
                                        <div class="col-md-5">
                                            <?php 
                                        $d = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id=PbkPz5hOWSo&key=AIzaSyBjXlDvy1m-hGgoGwIFqM9xCw1B7G3vBBs&part=snippet,contentDetails,statistics,status');
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
                                                            <th>
                                                                <input type="hidden" name="title" value="<?php echo $title; ?>">
                                                                <?php echo $title; ?>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Description</td>
                                                            <td>
                                                                <input type="hidden" name="description" value="<?php echo $description; ?>">
                                                                <?php echo $description; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Duration:</td>
                                                            <td>
                                                                <input type="hidden" name="duration" value="<?php echo $td; ?>">
                                                                <?php echo $td; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Lyric:</td>
                                                            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, officia?</td>
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
                                <div class="panel-heading">Customzing karaoke line</div>
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td width="50%">
                                                    <div id="slider">
                                                    </div>
                                                    <script>
                                                    $(function() {
                                                        // var interval = setInterval(function(){
                                                        //     $('#slider').slider({
                                                        //         min: 0,
                                                        //         max: 10,
                                                        //         step: 0.01,
                                                        //         slide: function(e, u){
                                                        //             $('#set_time').val(u.value);

                                                        //         }, 
                                                        //         animate: function(){

                                                        //         }
                                                        //     });
                                                        // }, 1000);
                                                        
                                                        $('.rlclick').on('click', function(e){
                                                            var i_this = $(this).prop('id').substring(3);
                                                            var v_str = $('#il_'+i_this).val();
                                                            //Duration
                                                            var dur = Number($('#so_'+i_this).val()) - Number($('#sa_'+i_this).val());
                                                            var sd = 0;
                                                            //Separate word
                                                            var art = v_str.split(' ');
                                                            var ll = '';
                                                            for (var i = 0; i < art.length; i++) {
                                                                ll += '<span id="ll_ax_'+i+'" class="btn btn-default ll_ax">'+art[i]+'</span>';
                                                            }
                                                            $('#slider').html(ll);
                                                            $( ".ll_ax" ).resizable({
                                                                handles:  'e',
                                                                resize: function(e, u){
                                                                    var w = u.size.width;

                                                                    console.log(u);
                                                                }
                                                            });
                                                        });
                                                        $('#play').on('click', function() {
                                                            // interval;
                                                            // player.playVideo();
                                                            if ($(this).hasClass('pause')) {
                                                                $(this).removeClass('pause').html('<i class="fa fa-pause"></i>');
                                                                player.playVideo();
                                                            } else {
                                                                $(this).addClass('pause').html('<i class="fa fa-play"></i>');
                                                                player.pauseVideo();
                                                            }
                                                            // player.seekTo(10);
                                                        });

                                                        $('#pause').on('click', function() {
                                                            player.pauseVideo();
                                                        });
                                                    });
                                                    </script>
                                                </td>
                                                <td width="10%">
                                                    <input id="set_time" type="text" placeholder="Current time..">
                                                </td>
                                                <td width="20%">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-retweet"></i></button>
                                                    <button type="button" class="btn btn-primary pause" id="play"><i class="fa fa-play"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Table -->
                            </div>
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading"><i class="fa fa-music"></i> Lyric</div>
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
                                            <?php 
                                                foreach ($song as $s) {
                                                    $ts = json_decode($s->lyrics, true);
                                                    for ($i=0; $i < count($ts); $i++) { 
                                                    
                                            ?>
                                            <tr id="rl_<?php echo $i+1; ?>" class="rlclick">
                                                <td><?php echo $i+1; ?></td>
                                                <td>
                                                    <input id="il_<?php echo $i+1; ?>" type="text" style="width:100%;" name="line[]" readonly="true" placeholder="Input lyric..." value="<?php echo $ts[$i]['line'] ?>">
                                                </td>
                                                <td>
                                                    <input id="sa_<?php echo $i+1; ?>" type="text" name="start[]" readonly="true" class="field_start sa_01" placeholder="00:00:00" value="<?php echo $ts[$i]['start']; ?>">
                                                </td>
                                                <td>
                                                    <input id="so_<?php echo $i+1; ?>" type="text" name="stop[]" readonly="true" class="field_stop stop_01" placeholder="00:00:00" value="<?php echo $ts[$i]['stop']; ?>">
                                                </td>
                                                <td><span id="time_duration"></span></td>
                                                <td>
                                                    <button id="bl_<?php echo $i+1; ?>" type="button" class="btn btn-default btn-kara-start"><i class="fa fa-refresh"></i></button>
                                                </td>
                                            </tr>
                                            <?php }
                                                } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-right">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Save</button>
                                    <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                </div>
                                <!-- Table -->
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/main.js"></script>
</body>

</html>
