<?php
	require_once("header.php");
?>

<div class="item" id="light">
	<div class="entry">
		<?php
			$con = mysqli_connect("localhost",$_REQUEST['username'], $_REQUEST['password'], "chris_bibtex");
			$UUID = strtotime("now");
			
			if($_REQUEST['type']=="article") {
				$query = "INSERT INTO articles (UUID, shortname, author, year, title, journal, volume, pages) VALUES
				($UUID, \"".$_REQUEST['shortname']."\",\"".$_REQUEST['author']."\",\"".$_REQUEST['year']."\",\"".$_REQUEST['title']
				."\",\"".$_REQUEST['journal']."\",\"".$_REQUEST['volume']."\",\"".$_REQUEST['pages']."\")";
				mysqli_query($con,$query);
				
				$query = "SELECT * from articles WHERE UUID=\"".$UUID."\"";
				$result = mysqli_query($con,$query);
				
				printf("The following item was successfully added:<br /><br />");
				foreach($result as $item) {
					printf("<pre>@article{".$item["shortname"].",\n");
					printf("    author = {".$item["author"]."},\n");
					printf("    year = {".$item["year"]."},\n");
					printf("    title = {".$item["title"]."},\n");
					printf("    journal = {".$item["journal"]."},\n");
					printf("    volume = {".$item["volume"]."},\n");
					printf("    pages = {".$item["pages"]."}\n");
					printf("}</pre><br />");
				}
			} elseif($_REQUEST['type']=="book") {
				$query = "INSERT INTO books (UUID, shortname, author, year, title, publisher, volume, pages) VALUES
				($UUID, \"".$_REQUEST['shortname']."\",\"".$_REQUEST['author']."\",\"".$_REQUEST['year']."\",\"".$_REQUEST['title']
				."\",\"".$_REQUEST['journal']."\",\"".$_REQUEST['volume']."\",\"".$_REQUEST['pages']."\")";
				mysqli_query($con,$query);
				
				$query = "SELECT * from books WHERE UUID=\"".$UUID."\"";
				$result = mysqli_query($con,$query);
				
				printf("The following item was successfully added:<br />");
				foreach($result as $item) {
					printf("<pre>@book{".$item["shortname"].",\n");
					printf("    author = {".$item["author"]."},\n");
					printf("    year = {".$item["year"]."},\n");
					printf("    title = {".$item["title"]."},\n");
					printf("    publisher = {".$item["publisher"]."},\n");
					printf("    volume = {".$item["volume"]."},\n");
					printf("    pages = {".$item["pages"]."}\n");
					printf("}</pre><br />");
				}
			} else {
				printf("<p>Uh-oh, something went wrong! Better try that again...</p>");
			}
		?>
	</div>
</div>
<?php
	require_once("footer.php");
?>