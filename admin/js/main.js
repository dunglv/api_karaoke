$(function(){
	 $.getJSON('https://www.googleapis.com/youtube/v3/videos?id=79RS6SwVly0&key=AIzaSyBjXlDvy1m-hGgoGwIFqM9xCw1B7G3vBBs&part=snippet,contentDetails,statistics,status', function(data){	
			 if (data.items.length > 0) {

			 console.log(data.items[0]['contentDetails'].duration);
			 }
		});
		// var dr = $('video');
});