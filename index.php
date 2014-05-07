<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Feed For Blogger</title>
    <meta name="description" content="This is a Custom Feeder any Rss" />
    <link rel="stylesheet" href="" />
</head>

<?php
	$rss = new DOMDocument();
	$rss->load(''); //put link for rss here
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 5;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ',  ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		echo '<p><center><h1><a href="'.$link. '"target="_blank"" title="'.$title.'"target="_blank" ">'.$title.'</a></h1></center><br />';
		echo '<p><center>'.$description.'</center></p>';
		echo '<small><center><em>Posted on '.$date. '</em></center></small></p>';
		
	}
?>
