$(function() {
    $.getJSON('https://www.googleapis.com/youtube/v3/videos?id=79RS6SwVly0&key=AIzaSyBjXlDvy1m-hGgoGwIFqM9xCw1B7G3vBBs&part=snippet,contentDetails,statistics,status', function(data) {
        if (data.items.length > 0) {

            console.log(data.items[0]['contentDetails'].duration);
        }
    });
    // var dr = $('video');

    var f_str = $('.field_start');
    var f_stp = $('.field_stop');
    var f_dur = $('#time_duration');
    var f1 = false, f2 = false;
    var t1 = '', t2 ='';
    f_str.each(function(i) {
        $(this).keydown(function(e) {
            var f_str_val = $(this).val();
            var len = f_str_val.length;
            if ((e.keyCode < 48 || e.keyCode > 57) && e.keyCode !== 8 && e.keyCode !== 37 && e.keyCode !== 39 && e.keyCode !== 16 && (e.keyCode !== 16 && e.keyCode !== 186)) {
                e.preventDefault();
            }
        });

        $(this).on('blur', function(e) {
            var f_str_val = $(this).val();
            var len = f_str_val.length;
            var reg = /^([0-9]{1,2})\:([0-9]{1,2})\:([0-9]{1,2})$/g;
            if (!f_str_val.match(reg) && len > 0) {
                alert("Format string: HH:mm:ss [00:00:00]");
                f1 = false;
            }else{
            	f1 = true;
            	t1 = f_str_val;
            }

            if (f1&&f2) {
		     	console.log('Ok');
		     	f_dur.html(cmp_duration(t1, t2));
		     }else{
		     	console.log('error');
		     }
            
        });
    });
     f_stp.each(function(i) {
        $(this).keydown(function(e) {
            var f_str_val = $(this).val();
            var len = f_str_val.length;
            if ((e.keyCode < 48 || e.keyCode > 57) && e.keyCode !== 8 && e.keyCode !== 37 && e.keyCode !== 39 && e.keyCode !== 16 && (e.keyCode !== 16 && e.keyCode !== 186)) {
                e.preventDefault();
            }
        });

        $(this).on('blur', function(e) {
            var f_str_val = $(this).val();
            var len = f_str_val.length;
            var reg = /^([0-9]{1,2})\:([0-9]{1,2})\:([0-9]{1,2})$/g;
            if (!f_str_val.match(reg) && len > 0) {
                alert("Format string: HH:mm:ss [00:00:00]");
                f2 = false;
            }else{
            	f2 = true;
            	t2 = f_str_val;
            }
            if (f1&&f2) {
		     	f_dur.html(cmp_duration(t1, t2));
		     	console.log('Ok');
		     }else{
		     	console.log('error');
		     }
            
        });
    });

    // console.log(f_str.length);

    function cmp_duration(time_start = "10:10:10", time_stop = "10:10:11") {
    	var a_stt = time_start.split(':');
    	var a_stp = time_stop.split(':');
    	if ((Number(a_stt[0])*3600+Number(a_stt[1])*60+Number(a_stt[2])) > (Number(a_stp[0])*3600+Number(a_stp[1])*60+Number(a_stp[2]))) {
    		return 'Error';
    	}else{
    		return Math.abs(Number(a_stp[0])-Number(a_stt[0]))+':'+ Math.abs(Number(a_stp[1])-Number(a_stt[1]))+':'+Math.abs(Number(a_stp[2])-Number(a_stt[2]));
    	}
    }

});
