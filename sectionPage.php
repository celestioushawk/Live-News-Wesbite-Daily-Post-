<?php
if(isset($_GET['section']))
{
	$section = $_GET['section']; 
	//echo $section;
}
$api_key = 'API KEY HERE';
$url = 'https://newsapi.org/v2/top-headlines?category=' . $section . '&country=in&apiKey=<--API KEY HERE-->';
$data = file_get_contents($url);
$news_array = json_decode($data, true);
//print_r($news_array);


$heading = $news_array['articles'][0]['title'];
$description = $news_array['articles'][0]['description'];
$source = $news_array['articles'][0]['source']['name'];
$image = $news_array['articles'][0]['urlToImage'];
$article_link = $news_array['articles'][0]['url'];


?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo ucfirst($section) . " News - The Daily Post" ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="nav">
		<div class="logo">
			<a href="mainPage.php">
			The Daily Post
			</a>
		</div>
	</nav>

	<div class="categories">
	<div class="category-item"><a href="./sectionPage.php?section=technology">Technology</a></div>
	<div class="category-item"><a href="./sectionPage.php?section=sports">Sports</a></div>
	<div class="category-item"><a href="./sectionPage.php?section=entertainment">Entertainment</a></div>
	<div class="category-item"><a href="./sectionPage.php?section=health">Health</a></div>
	<div class="category-item"><a href="./sectionPage.php?section=business">Business</a></div>
	<div class="category-item">
		<i class="fa fa-search"></i>
		<form action="searchPage.php" method="post">
		<input type="text" name="search-field" class="search-bar" placeholder="Search...">
		</form>
	</div>
	</div>

	

	<div class="main-container">
	<?php for($i=0; $i<15; $i++): ?>
	<div class="news-item">
		<div class="image">
			<img src="<?php echo $news_array['articles'][$i]['urlToImage']; ?>" >
		</div>
		<div class="heading">
			<a href="<?php echo $news_array['articles'][$i]['url']?>">
			<?php echo $news_array['articles'][$i]['title']; ?>
			</a>
		</div>
		<div class="desc">
			<?php echo $news_array['articles'][$i]['description']; ?>
		</div>
	<div class="footer">
		<div class="source">
			<?php echo strtoupper($news_array['articles'][$i]['source']['name']); ?>			
		</div>
	</div>
	</div>
	<?php endfor?>

</div>
<footer>
	<center>
		2020 The Daily Post Inc. ( made with love by Piyush Tekwani ❤️)
	</center>
</footer>

</body>
</html>