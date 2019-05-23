<?php 
include('./simple_html_dom.php');
include('./custom_extractor.php'); 
set_time_limit(0);

if (!isset($_GET['url']) || empty($_GET['url'])) {
	exit("enter url");
}

//setup
$url = trim($_GET['url']);
$multy = (isset($_GET['multy']) && !empty($_GET['multy']));
$user_dir = (isset($_GET['dir']) && !empty($_GET['dir'])) ? stripcslashes($_GET['dir']) : "other";
$user_dir = "/". $user_dir ."/";
$dir = getcwd() . $user_dir;
if (!is_dir($dir)) mkdir($dir);       
$limit = 1000; //max pages/folders downloaded

function renderImgs(array $pic_urls) {
	$imgs = '<hr/>';
	foreach ($pic_urls as $pic_url) {
		$imgs .= "<a href='" .$pic_url. "' target='_blank'><img src='" .$pic_url. "' alt=''></img></a>";
	}
	echo $imgs;
}

function saveImgs(array $pic_urls) {
	global $dir;
	$subdir = $dir . substr(md5(join($pic_urls)), 1, 8) . "/";
	if(is_dir($subdir)) return "skiped all";
	mkdir($subdir);
	$counter = 0;

	foreach ($pic_urls as $url) {
		if(!$file = @file_get_contents($url)) continue;
		$name = substr(md5($url), 1, 6) . ".jpg";
		@file_put_contents($subdir . $name, $file);
		++$counter;
	}
	return $counter . " items";
}

//main logic
if ($multy) {
	$pages = getRefs($url);
	for($i = 0, $pages_count = count($pages); $i < $limit, $i < $pages_count; $i++) {
		//downloaded per page
		$counter = saveImgs(getImgs($pages[$i]));
		echo ($i + 1) . ") " . $pages[$i] . " : $counter<br/>";
	}
} else {
	renderImgs(getImgs($url));
}