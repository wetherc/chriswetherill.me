<?php
	require_once('header.php');
?>
			<div class="item" id="light">
				<div class="entry">
					<p>	Enter your SQL query here. For help with SQL or questions about what exactly can be queried, <a href="ELPhelp" target="_blank">click here for some pointers</a>. You can query the tables ELP and USF.</p>
					<p>Need help getting started? Maybe try something like:</p>
					<code>SELECT WORD, LENGTH, POS as 'Part of Speech' FROM ELP WHERE LgSUBTLWF IS NOT NULL ORDER BY LgSUBTLWF desc LIMIT 0, 30</code>
					<br /><br />
					<form action="ELP" method="post">
						Query: <input type="text" value="<?php
							if($_REQUEST['query']!=null) {
								echo $_REQUEST['query'];
							}
					?>" name="query" size="85">
						<input type="submit" value="Search">
					</form>
					<br /><br />
					<?php
						if($_REQUEST['query']!=null) {
						echo 'Want do download these results as a CSV file? Just click here: <form action="download" method="post" target="_blank">
						<input type="hidden" name="download" value="'.$_REQUEST['query'].'"><input type="submit" value="Download">
						</form>';
						}
					?>
				</div>
			</div>
			<?php
				if($_REQUEST['query']!=null) {
					$query = $_REQUEST['query'];
					$query = stripslashes($query);
					
					$ELP = new ELP($query);
					
					$result = $ELP->ELPConnect();
					$finfo = $result->fetch_fields();
					
					$output = null;
					echo '<div class="item" id="dark" style="overflow-x:auto">
						<div class="entry">';
					echo "<table class=\"query\"><tr>";
						foreach ($finfo as $val) {
						echo "<th>".$val->name."</th>";
						$output .= '"'.$val->name.'",';
					}
					echo "</tr><tr>";
					while ($arr = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						echo "<tr>";
						foreach($arr as &$value) {
							echo "<td>".$value."</td>";
							$output .= '"'.$value.'",';
						}
						echo "</tr>";
						$output .= "\r\n";
					}
					echo "</table>
					</div>
					</div>";
				}
			?>
			<div class="item" id="<?php if($_REQUEST['query']!=null) {echo "light";} else {echo "dark";} ?>">
				<div class="entry">
					<p>This database uses tables mirrored from the <a href="http://elexicon.wustl.edu" target="__blank">English Lexicon Project</a> and the <a href="http://w3.usf.edu/FreeAssociation/" target="__blank">University of South Florida Homograph Norms</a>. The ELP is maintained by the lovely folks at Washington University in St. Louis and made possible by the hard work of researchers at Morehead State, SUNY Albany, University of Kansas, Univeristy of South Florida, Washington University in St. Louis, and Wayne State University. The USF Free Association Norms by Douglas L. Nelson and Cathy L. McEvoy out of the University of South Florida and by Thomas A. Schreiber at the University of Kansas. If language research is something that you're intersted in, I'd strongly recommend that you check out their sites and some of the great work they're doing.</p>
					<p>Word lists generated from this database are available for non-commercial research purposes only and may not be used in the development of speech technology.</p>
					<p class="pubs">Balota, D.A., Yap, M.J., Cortese, M.J., Hutchison, K.A., Kessler, B., Loftis, B., Neely, J.H., Nelson, D.L., Simpson, G.B., & Treiman, R. (2007). The English Lexicon Project. <em>Behavior Research Methods, 39</em>, 445-459.</p>
					<p class="pubs">Nelson, D., McEvoy, C., & Schreiber, T. (2004). The University of South Florida free association, rhyme, and word fragment norms. <em>Behavior Research Methods, Instruments, & Computers, 36</em>, 402-407.</p>
				</div>
			</div>
<?php
	require_once('footer.php');
?>