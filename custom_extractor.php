<?php

/**
 * Custom content extraction logic. 
 * implementation of getRefs() and getImgs() may vary in different extractors
 */

/**
 * get Pages list from Site
 */
function getRefs(string $url) {
	$html = file_get_html($url);
	$elements = $html->find('div.thumb a');

	$refs = [];
	foreach ($elements as $a) {
		$refs[] = preg_replace('/^(.)+url=http/', 'http', $a->href);
	}

	$html->clear(); 
	return $refs;
}

/**
 * return img refs array
 * from given page 
 * for structures like <href="01.php"> 
 */
function getImgs(string $url) {
	if(!$html = @file_get_html($url)) return array();
	$elements = $html->find('div.gallery-thumb a');
	$pics = [];
	foreach ($elements as $a) {
		$pics[] = $url . $a->href;
	}
	$pics = preg_replace('/\.php$/', '.jpg', $pics);
	
	$html->clear(); 
	return $pics;
}