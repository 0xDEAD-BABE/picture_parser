$(function() {
	$('#one').click(function() {
		var url = $('#url').val();
		url = encodeURI(url)
		$('#container').load('parser.php?url=' + url);
	})

	$('#multy').click(function() {
		var url = $('#url').val();
		url = encodeURI(url);
		var dir = $('#dir').val();
		dir = encodeURI(dir);
		$('#container').load('parser.php?multy=true&url=' + url + '&dir=' + dir);
	})

});