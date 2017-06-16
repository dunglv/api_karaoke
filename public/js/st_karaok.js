var player = new YT.Player('kr_video', {
    width: 600,
    height: 400,
    videoId: 'PbkPz5hOWSo',
    playerVars: {
        // color: 'white'
    }
});


function play_pause_video(player, ui) {
	if (player.getPlayerState() === 1) {
		player.pauseVideo();
		ui.innerHTML = '<i class="fa fa-pause"></i>';
	}else{
		player.playVideo();
		ui.innerHTML = '<i class="fa fa-play"></i>';
	}
}

function play_word(player, word) {
	var sta = Number(word.start);
	var sto = Number(word.stop);
	player.seekTo(sta);
	player.playVideo();
}

function pause_word(player) {
	// body...
}

function play_progess(player, ui) {
	
}

function pause_progress(player) {
	// body...
}