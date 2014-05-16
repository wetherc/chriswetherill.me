<?php
	require_once('beamMeUp.php');

	$query = "SELECT * from articles ORDER BY shortname ASC";
	$bibtex = new bibtexCurrent($query);
	$result = $bibtex->bibtexConnect();
	
	$query = "SELECT * from books ORDER BY shortname ASC";
	$bibtex = new bibtexCurrent($query);
	$result2 = $bibtex->bibtexConnect();
	
	$count = 0;
	
	foreach($result as $item) {
		$count++;
	}
	
	foreach($result2 as $item) {
		$count++;
	}
	
	printf("// Number of entries found: ".$count."<br /><br />\n\n");
	
	foreach($result as $item) {
		printf("<pre>\n");
		printf("@article{".$item["shortname"].",\n");
		printf("    author = {".$item["author"]."},\n");
		printf("    year = {".$item["year"]."},\n");
		printf("    title = {".$item["title"]."},\n");
		printf("    journal = {".$item["journal"]."},\n");
		printf("    volume = {".$item["volume"]."},\n");
		printf("    pages = {".$item["pages"]."}\n");
		printf("}\n</pre>\n\n");
	}
	
	printf("\n");
	
	foreach($result2 as $item) {
		printf("<pre>");
		printf("@book{".$item["shortname"].",\n");
		printf("    author = {".$item["author"]."},\n");
		printf("    year = {".$item["year"]."},\n");
		printf("    title = {".$item["title"]."},\n");
		printf("    publisher = {".$item["publisher"]."},\n");
		printf("    volume = {".$item["volume"]."},\n");
		printf("    pages = {".$item["pages"]."}\n");
		printf("}</pre>\n\n");
	}
?>