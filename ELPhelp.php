<?php
		require_once("header.php");
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('li').click(function(){
			var id = $(this).attr('id');
			$('#info').load('/help/'+id);
		});
	});
</script>

			<div class="item" id="light">
				<div class="entry">
							<table class="help" width="405px">
									<tr>
										<th>SQL</th>
										<th>ELP</th>
										<th>USF</th>
									</tr>
									<tr>
										<td width="135px">
											<ul>
												<li id="select.html">
													SELECT
												</li>
												<li id="distinct.html">
													DISTINCT
												</li>
												<li id="top.html">
													TOP
												</li>
												<li id="join.html">
													JOIN
												</li>
												<li id="where.html">
													WHERE
												</li>
												<li id="like.html">
													LIKE
												</li>
												<li id="and.html">
													AND/OR
												</li>
												<li id="group.html">
													GROUP BY
												</lI>
												<li id="order.html">
													ORDER BY
												</li>
												<li id="between.html">
													BETWEEN
												</li>
												<li id="alias.html">
													Alias
												</li>
												<li id="functions.html">
													Functions
												</li>
											</ul>
										</td>
										<td width="135px">
											<ul>
												<li id="word.html">
													Word
												</li>
												<li id="length.html">
													Length
												</li>
												<li id="subtlwf.html">
													SUBTLWF
												</li>
												<li id="lgsubtlwf.html">
													LgSUBTLWF
												</li>
												<li id="subtlcd.html">
													SUBTLCD
												</li>
												<li id="lgsubtlcd.html">
													LgSUBTLCD
												</li>
												<li id="pron.html">
													Pron
												</li>
												<li id="nphon.html">
													NPhon
												</li>
												<li id="nsyll.html">
													NSyll
												</li>
												<li id="pos.html">
													POS
												</li>
											</ul>
										</td>
										<td width="135px">
											<ul>
												<li id="cue.html">
													Cue
												</li>
												<li id="target.html">
													Target
												</li>
												<li id="normed.html">
													Normed
												</li>
												<li id="sample.html">
													Sample
												</li>
												<li id="n.html">
													N
												</li>
												<li id="set.html">
													CueSetSize
												</li>
												<li id="cuehomograph.html">
													CueHomograph
												</li>
												<li id="cuepos.html">
													CuePOS
												</li>
												<li id="tset.html">
													TargetSetSize
												</li>
												<li id="targethomograph.html">
													TargetHomograph
												</li>
												<li id="targetpos.html">
													TargetPOS
												</li>
											</ul>
										</td>
									</tr>
							</table>
				</div>
			</div>
			<div class="item" id="dark">
				<div class="entry" id="info">
					<h3>Querying the ELP database</h3>
					<p>Having trouble searching the database with SQL? Select any of the links up above for an explanation of either how a SQL statement can be specified or how to query specific columns within the ELP database.</p>
					<p>If you're still having issues, make sure that your FROM statement reads:</p>
					<code>FROM ELP or FROM USF</code>
					<p>Although SQL statements themselves are not case-sensitive, the name of the database that you're searching is. In this case, the tables are titled in all caps.</p>
					<p>In other news, the SQL explanations here were written heavily referencing <a href="http://w3schools.com" target="__blank">W3 Schools</a>. Because SQL is SQL and I'm lazy. Please do check them out, though--they have a ton of great tutorials for SQL and more and deserve much credit for these explanations.</p>
					<p>Finally, not all of the links above work. (But don't worry, they all light up when you hover over them. Pretty over functional, I always say.) This is mostly just because I got bored writing up documentation for the two tables and already know how to query them. If you're confused on how to query a field, try something like:</p>
					<code>SELECT DISTINCT(field) FROM ELP LIMIT 0, 30</code>
					<p>Just swap out 'field' in the code above with the column header. This'll return to you the first 30 or so unique values for that item and should give you a better idea of how to structure your query.</p>
				</div>
			</div>

<?php
	require_once('footer.php');
?>