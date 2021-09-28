var jingle = new Howl({
	src: ['sfx/jingle-win-00.wav'],
	html5: true
});

var jangle = new Howl({
	src: ['sfx/jingle-lose-01.wav'],
	html5: true
});

var updateScore = function(u, i, v, t) {

	$.ajax({
		method: "GET",
		url: "api.php",
		data: {
			u: u, 
			i: i, 
			v: v 
		}
	})
	.done(function( msg ) {

		$('#progress-bar-' + i).css('width', (parseInt(msg) / parseInt(t) * 100) + '%');
		$('#progress-bar-' + i).html(msg + '/' + t);

		if (bPlayJingles) {
			if (v >= 0)
				jingle.play();
			else
				jangle.play();
		}

	});
	
}