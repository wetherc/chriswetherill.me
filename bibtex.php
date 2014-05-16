<?php
	require_once('header.php');
	
	$query = "select sum(rows) as total_rows from (select count(*) as rows from articles union all select count(*) as rows from books) as u ";
	$bibtex = new bibtex($query);
	$row = $bibtex->bibtexConnect();
?>

			<div class="item" id="light">
				<div class="entry">
					<p>So LaTeX and R are pretty much the cool kids on the block. I mean, let's be real here. And, thankfully, BibTex's there all the while to make sharing and tracking citations with collaborators that much easier! If you'd like to download the current database, just <a href="/bibtexCurrent" target="_blank">point your clicker this-a-way</a>! Currently, there are <?php printf($row["total_rows"]); ?> records in the database.</p>
					<p>If you would like to contribute to this database, send me <a href="mailto:chris@chriswetherill.me">an email</a> and I'll get you set up.</p>
					<p>Otherwise, if you have credentials to insert rows into the database, feel free to take a crack at it below!</p>
				</div>
			</div>
			<div class="item" id="dark">
				<form method="post" name="form" action="dbUpdate">
					<table width=auto style="margin: 0px 0px 50px 150px">
						<tr>
							<td colspan="2">
								<h3 style="padding-left:15px;">Add a new book or article</h3>
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="type">Type:</label>
							</td>
							<td>
								<select name="type">
									<option value="article">Article</option>
									<option value="book">Book</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="shortname">Shortname:</label>
							</td>
							<td>
								<input type="text" name="shortname" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="author">Author:</label>
							</td>
							<td>
								<input type="text" name="author" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="year">Year:</label>
							</td>
							<td>
								<input type="text" name="year" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="title">Title:</label>
							</td>
							<td>
								<input type="text" name="title" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="journal">Journal/Publisher:</label>
							</td>
							<td>
								<input type="text" name="journal" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="volume">Volume:</label>
							</td>
							<td>
								<input type="text" name="volume" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="pages">Pages:</label>
							</td>
							<td>
								<input type="text" name="pages" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="username">Username:</label>
							</td>
							<td>
								<input type="text" name="username" size="25">
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label for="password">Password:</label>
							</td>
							<td>
								<input type="password" name="password" size="25">
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" value="Submit"></td>
						</tr>
					</table>
				</form>
				<br />
			</div>
		
<?php
	require_once('footer.php');
?>