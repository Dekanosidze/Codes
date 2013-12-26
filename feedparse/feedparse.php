<html>
<head>
	<style type="text/css">

		@import url("style.css");

	</style>

	<title>Top 10 in the US</title>

</head>
<body>
	<table>
		<tr>
			<td><a href="http://localhost/feedparse/feedparse.php">Most Popular</a></td>
			<td><a href="http://">favorite videos</a></td>
			<td><a href="http://">playlist feed</a></td>
			<td><a href="http://">watch later feed</a></td>
		</tr>
	</table>


<div class="main">
	<?php
		$html = "";
		$url = "http://gdata.youtube.com/feeds/api/standardfeeds/US/most_popular?v=2";
		$xml = simplexml_load_file($url);
		for($i=0; $i<10; $i++){
			$author = $xml->entry[$i]->author->name;
			$id = $xml->entry[$i]->id;
			$id = str_replace("tag:youtube.com,2008:video:","",$id);
			$title = $xml->entry[$i]->title;
			$content = $xml->entry[$i]->content;
			$html .= "<div><h2>$title</h2> <br/> <h6>$content</h6> <h3>Author: $author<h3> <h4>id: $id</h4></div>
					<iframe width=550 height=450  src=//www.youtube.com/embed/$id frameborder=1  allowfullscreen></iframe> 
			<hr/>";
		}
		echo $html;
	?>
</div>
</body>
</html>