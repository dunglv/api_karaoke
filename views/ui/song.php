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
                    if (isset($song) && count($song) > 0) {
                        ?>
                <div class="showprint">
                    <span class="opp"></span>
                    <div class="kr-line">
                        <?php
                        foreach ($song as $s) {
                            echo '<a href="'.$base_url.'/song/'.$s->sis.'">'.$s->title.'</a>';
                            if (is_null($s->karaoke) || empty($s->karaoke) || !preg_match('/\w+/', $s->karaoke)) {
                                $lr = json_decode($s->lyrics, true);
                                for ($i=0; $i < sizeof($lr); $i++) { ?>
                                    <div data-show="<?php echo $lr[$i]['start']  ?>" data-hide="<?php echo $lr[$i]['stop']?>" class="line line-top active">
                                        <?php 
                                            $sp = explode(' ', $lr[$i]['line']);
                                            for ($k=0; $k < count($sp); $k++) { 
                                                echo '<span class="klr klr_'.$i.$k.'" data-kara="'.$sp[$k].'" data-start="" data-stop="">'.$sp[$k].'</span>';
                                            }
                                        ?>
                                    </div>
                                    <?php
                                } // end for
                            }else{
                                $lr = json_decode($s->karaoke, true);
                                $ls = json_decode($s->lyrics, true);
                                for ($i=0; $i < sizeof($lr); $i++) {
                                    if ($i%2!==0) {
                                    ?>
                                    <div data-show="<?php echo $ls[$i]['start'] ?>" data-hide="<?php echo $ls[$i]['stop'] ?>" class="line line-bottom active">
                                        <?php 
                                            for ($k=0; $k < count($lr[$i]); $k++) { 
                                                echo '<span class="klr klr_00000'. $i.$k .'" data-kara="'. $lr[$i][$k]['w'] .'" data-start="'. $lr[$i][$k]['s'] .'" data-duration="'. $lr[$i][$k]['d'] .'">'. $lr[$i][$k]['w'] .'</span>'; 
                                            }
                                        ?>
                                    </div>
                                <?php }else{ ?>
                                    <div data-show="<?php echo $ls[$i]['start'] ?>" data-hide="<?php echo $ls[$i]['stop'] ?>" class="line line-top active">
                                        <?php 
                                            for ($k=0; $k < count($lr[$i]); $k++) { 
                                                echo '<span class="klr klr_00000'. $i.$k .'" data-kara="'. $lr[$i][$k]['w'] .'" data-start="'. $lr[$i][$k]['s'] .'" data-duration="'. $lr[$i][$k]['d'] .'">'. $lr[$i][$k]['w'] .'</span>'; 
                                            }
                                        ?>
                                    </div>
                                <?php } 
                                } // end for
                            } //end else
                        }?>
                    </div>
                </div>
                <?php
                    }
                 ?>
                    <!--  <div class="showprint">
                        <span class="opp"></span>
                        <div class="kr-line">
                            <div data-show="00:00:02.12" data-hide="00:00:07.34" class="line line-top active">
                                <span class="klr klr_000004" data-kara="Xây" data-start="00:00:04.20" data-stop="00:00:05.45">Xây</span>
                                <span class="klr klr_000006" data-kara="giấc" data-start="00:00:06.74" data-stop="00:00:07.10">giấc</span>
                                <span class="klr klr_3" data-kara="mộng" data-start="00:00:07.15" data-stop="00:00:10.10">mộng</span>
                                <span class="klr klr_4" data-kara="ban" data-start="00:00:06.74" data-stop="00:00:07.10">ban</span>
                                <span class="klr klr_5" data-kara="đầu" data-start="00:00:06.74" data-stop="00:00:07.10">đầu</span>
                            </div>
                            <div data-show="00:00:02.12" data-hide="00:00:12.34" class="line line-bottom">
                                <span class="klr klr_6" data-kara="Yêu">Yêu</span>
                                <span class="klr klr_7" data-kara="người">người</span>
                                <span class="klr klr_8" data-kara="thủa">thủa</span>
                                <span class="klr klr_9" data-kara="mới">mới</span>
                                <span class="klr klr_10" data-kara="đôi">đôi</span>
                                <span class="klr klr_11" data-kara="mươi">mươi</span>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
    <script src="<?php echo $base_url ?>/public/js/karaoke.js"></script>
</body>

</html>
