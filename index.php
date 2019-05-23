<!DOCTYPE html>
<html lang="ru">
<head>
    <title>parser</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js" defer></script>
    <script src="loader.js" defer></script>
   
</head>
<body>
	<div class="center">
		<p>
			<button id="one">fetch url</button>
			<input type="text" size=50 id="url" name="url" placeholder="URL TO PARSE:" />
		</p>
		<p>
			<button id="multy">grab site</button>
			<input type="text" size=50 id="dir" name="dir" placeholder="TO DIRECTORY:" />
		</p>
	</div>
	<div class="container" id="container"></div>
</body>
</html>