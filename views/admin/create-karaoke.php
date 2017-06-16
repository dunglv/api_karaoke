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
                                                <td width="100%" colspan="2">
                                                    <div class="ct_slider">
                                                        <div id="slider" class="slider_dx play" data-start="">
                                                        </div>
                                                    </div>
                                                    <script>
                                                    $(function() {
                                                        var lwt = 0;
                                                        var stal, stol, dal, lid, i_this;
                                                        
                                                        $('.rlclick').on('click', function(e) {
                                                            i_this = $(this).prop('id').substring(3);
                                                            var v_str = $('#il_' + i_this).val();
                                                            //Duration
                                                            var dur = Number($('#so_' + i_this).val()) - Number($('#sa_' + i_this).val());
                                                            stal = Number($('#sa_' + i_this).val());
                                                            stol = Number($('#so_' + i_this).val());
                                                            dal = dur;
                                                            var sd = 0;
                                                            player.seekTo(Number($('#sa_' + i_this).val()));
                                                            player.pauseVideo();
                                                            //Separate word
                                                            var art = v_str.split(' ');
                                                            var to_art = art.length;
                                                            var ll = '',
                                                                e_a = 0;
                                                            //[-----Divide time to each span-----]//
                                                            // 
                                                            e_a = ((dur / to_art) / dur) * 100;
                                                            //[---]//
                                                            for (var i = 0; i < to_art; i++) {
                                                                ll += '<span data-l="' + art[i] + '" style="width:' + e_a + '%;" id="ll_ax_' + i + '" class="btn btn-default ll_ax">' + art[i] + '<strong>' + (dur / to_art).toFixed(2) + '</strong></span>';
                                                            }
                                                            $('#slider').attr('data-start', stal).html(ll);
                                                            var mxw = $('#slider').width();
                                                            var container = $('#slider');
                                                            $('#dur_time').val(dur.toFixed(2));
                                                            var sibTotalWidth;
                                                            $(".ll_ax").resizable({
                                                                handles: 'e',
                                                                maxWidth: mxw,
                                                                minWidth: 0,
                                                                resize: function(e, ui) {
                                                                    // var w = u.size.width;
                                                                    ui.originalElement.next().width(sibTotalWidth - ui.originalElement.outerWidth());
                                                                    // Get width size of other not this
                                                                    var xx = $(".ll_ax").not(this);
                                                                    var rw = 0;
                                                                    for (var i = 0; i < xx.length; i++) {
                                                                        rw += xx.eq(i).outerWidth();
                                                                    }
                                                                    // Set width this when ==  gaps  max width
                                                                    if (ui.originalElement.outerWidth() >= (mxw - rw)) {
                                                                        var gw = ((mxw - rw) / mxw) * 100;
                                                                        ui.originalElement.css({
                                                                            width: gw + '%'
                                                                        });
                                                                        $(this).find('strong').html((gw * dur / 100).toFixed(2));
                                                                    }
                                                                    // console.log(((ui.originalSize.width)));
                                                                },
                                                                start: function(e, ui) {
                                                                    sibTotalWidth = ui.originalElement.outerWidth() + ui.originalElement.next().outerWidth();
                                                                },
                                                                stop: function(e, ui) {
                                                                    var cellPercentWidth = 100 * ui.originalElement.outerWidth() / container.width();
                                                                    ui.originalElement.css('width', cellPercentWidth + '%');
                                                                    var dt = ((cellPercentWidth * dur) / 100).toFixed(2);
                                                                    $(this).find('strong').html(dt);
                                                                    var nextCell = ui.originalElement.next();
                                                                    var nextPercentWidth = 100 * nextCell.outerWidth() / container.width();
                                                                    nextCell.css('width', nextPercentWidth + '%');
                                                                    nextCell.find('strong').html(((nextPercentWidth * dur) / 100).toFixed(2));
                                                                    // console.log(container.width());

                                                                }
                                                            });
                                                        });
                                                        $('#play').on('click', function() {
                                                            // interval;
                                                            // player.playVideo();
                                                            var itv = setInterval(function() {
                                                                t = player.getCurrentTime();
                                                            }, 10);
                                                            if (player.getPlayerState() == 1) {
                                                                player.pauseVideo();
                                                                $(this).html('<i class="fa fa-play"></i>');
                                                            } else {
                                                                player.playVideo();
                                                                $(this).html('<i class="fa fa-pause"></i>');
                                                            }
                                                           
                                                            player.seekTo(10);
                                                        });

                                                        $('#pause').on('click', function() {
                                                            player.pauseVideo();
                                                        });

                                                        $('#save').on('click', function(e) {
                                                            var sp = $('#slider').children('span');
                                                            var tp='',tf = '';
                                                            if (sp.length > 0) {
                                                                tf += '"'+(i_this-1)+'":[';
                                                                sp.each(function(i) {
                                                                    var s = stal;
                                                                    if (i == 0) {
                                                                        s = stal;
                                                                    } else {
                                                                        for (var k = 0; k < i; k++) {
                                                                            s = s + Number(sp.eq(k).find('strong').html());
                                                                        }
                                                                    }
                                                                    tf += '{"w":"' + $('#ll_ax_' + i).data('l') + '","s":"' + s.toFixed(2) + '", "d":"' + sp.eq(i).find('strong').html() + '"},';
                                                                });
                                                                tf = tf.replace(/\,$/, '')+'],';
                                                                // console.log(tf);
                                                                $('#kr_' + i_this).val(tf);
                                                                // console.log($('#kr_'+i_this).val());

                                                            }
                                                        });

                                                        $('#submit_kara').on('click', function(e) {
                                                            var hdv = $('input[name="kr[]"]');
                                                            var r = '';
                                                            hdv.each(function(i, e) {
                                                                r += hdv.eq(i).val();
                                                            });
                                                            $.ajax({
                                                                type: 'POST',
                                                                data: {
                                                                    "kr": '{' + r.replace(/\,$/, '') + '}',
                                                                    "song": $('input[name="song"]').val()
                                                                },
                                                                success: function(data){
                                                                    console.log(data);
                                                                },
                                                                error: function(e){
                                                                    console.log(e);
                                                                }
                                                            });
                                                            // console.log('['+r.replace(/\,$/, '')+']');
                                                        });
                                                    });
                                                    </script>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%">
                                                    <input id="dur_time" type="text" placeholder="Duration time.." title="Duration time">
                                                    <input id="set_time" type="text" placeholder="Current time..">
                                                </td>
                                                <td width="50%">
                                                    <button type="button" class="btn btn-success"><i class="fa fa-retweet"></i></button>
                                                    <button type="button" class="btn btn-primary pause" id="play"><i class="fa fa-play"></i></button>
                                                    <button id="save" type="button" class="btn btn-default"><i class="fa fa-save"></i></button>
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
                                                <td>
                                                    <?php echo $i+1; ?>
                                                </td>
                                                <td>
                                                    <input id="il_<?php echo $i+1; ?>" type="text" style="width:100%;" name="line[]" readonly="true" placeholder="Input lyric..." value="<?php echo $ts[$i]['line'] ?>">
                                                    <input type="hidden" name="kr[]" id="kr_<?php echo $i+1; ?>">
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
                                            <?php } ?>
                                            <input type="hidden" name="song" value="<?php echo $s->sis ?>">
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-right">
                                    <button id="submit_kara" onclick="javascript:void(0);return false;" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Save</button>
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
    <script type="text/javascript" src="../js/st_karaok.js"></script>
</body>

</html>
