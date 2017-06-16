$(function() {
    // Effect a line
    
    var klr_t = $('span.klr');
    // Effect a word
    klr_t.each(function(i) {
        var klr_sta = klr_t.eq(i).data('start');
        var klr_sto = klr_t.eq(i).data('stop');
        var klr_d = klr_t.eq(i).data('duration');
        var timeCur = 0;
        // Get duration transition effect a word
        // var asta = klr_sta.split(':'), // Start duration
        //     sta_ms = asta[2].split('.'),
        //     astp = klr_sto.split(':'), // End duration
        //     stp_ms = astp[2].split('.');
        //     console.log(asta);
        // var as_hh = Math.abs(Number(astp[0]) - Number(asta[0])),
        //     as_mm = Math.abs(Number(astp[1]) - Number(astp[1])),
        //     as_ss = Math.abs(Number(stp_ms[0]) - Number(sta_ms[0])),
        //     as_ms = Math.abs(Number(stp_ms[1]) - Number(sta_ms[1]));
        // var leav_ms = ((as_hh * 360000 + as_mm * 6000 + as_ss * 100 + as_ms) *10 )/1000;
        var startKara = setInterval(function() {
        //     var hh = Math.floor(timeCur / (360000));
        //     var mm = Math.floor((timeCur % 360000) / 6000);
            var ss = (((timeCur % 360000) % 6000) / 100).toFixed(2);
        //     var ms = Math.floor(((timeCur % 360000) % 6000) % 100);
        //     hh = hh < 10 ? '0' + hh : hh;
        //     mm = mm < 10 ? '0' + mm : mm;
        //     ss = ss < 10 ? '0' + ss : ss;
        //     var curd = hh + ':' + mm + ':' + ss + '.' + ms;
            // window.document.write('sdgsd');
            if (klr_t.eq(i).attr('data-start') === ss) {
                klr_t.eq(i).attr('data-start', ss).addClass('voiced');
                klr_t.eq(i).css({'-webkit-transition': klr_d+'s', '-o-transition': klr_d+'s', 'transition': klr_d+'s' });
            }

            // var opp = document.querySelectorAll('.opp')[0];
            // opp.innerHTML = ss;
            timeCur++;
        }, 10);
    });
});
