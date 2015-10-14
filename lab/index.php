<!DOCTYPE HTML>
<html>
	<head>
        <title>Ahoy! | chriswetherill.me</title>
		<meta charset="utf-8" />
        <meta name="description" content="The personal website for Christopher Wetherill. Contains info on past and ongoing projects, research journals, a CV, yada yada yada" />
		<meta name="keywords" content="Chris Wetherill, Wetherill, Christopher Wetherill">
        <meta name="author" content="Chris Wetherill" />
		<?php require_once('beamMeUp.php'); ?>
		<link rel='shortcut icon' href="https://chriswetherill.me/assets/favicon.ico" type="image/x-icon" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=latin' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css">
    	<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  
			ga('create', 'UA-30691582-1', 'chriswetherill.me');
			ga('send', 'pageview');

		</script>
    </head>
	
	<body>
		<div class="navbar">
			<ul>
				<li>
					<a href="/">Home</a>                            
				</li>
				<li>
					<a href="research">Research</a>
				</li>
				<li>
					<a href="blog">Posts</a>
				</li>
				<li>
					<a href="CV">CV</a>
				</li>
			</ul>
		</div>
		
		<div class="content">
            <script src="../js/jquery-1.11.2.min.js"></script>
            <script language="javascript">
                function OnChange(dropdown) {
                    var myIdx = dropdown.selectedIndex;
                    var value = dropdown.options[myIdx].value;
                }
            </script>

            <div class="item" id="light">
                <div class="entry">
                    <select name="procedure" onchange="OnChange(this.form.procedure);">
                        <option value="incompleteMedium">Prepared Incomplete Medium 199</option>
                        <option value="completeMedium">Prepared Complete Medium 199</option>
                        <option value="agarose">Prepared 1.2% Agarose</option>
                        <option value="emem">Prepared 2x EMEM</option>
                        <option value="pbs">Prepared 1x PBS</option>
                        <option value="split">Split Cells</option>
                        <option alue="plate">Plated Cells</option>
                        <option value="infect">SA11 Infection</option>
                        <option value="plaque">Plaque Assay</option>
                        <option value="transduction">siRNA Transduction</option>
                    </select>
                </div>
            </div>
            
            <div class="item" id="dark">
                <div class="entry">
                    
                </div>
            </div>
            
			<div class="footer">
                <div class="motd">
                    <?php
                    $query = "Select COUNT(*) from motd";
					$motd = new footer($query);
					
					$result = $motd->motd();
                    $count = $result->fetch_array(MYSQLI_NUM);
                    $record = rand(0, $count[0]-1);
                    
                    $query = "Select Quote from motd where ID=".$record;
					$motd = new footer($query);
                    $result = $motd->motd();
                    $quote = $result->fetch_array(MYSQLI_NUM);
                    echo $quote[0];
                    ?>
                </div>
                <div class="copyright">
                    <a rel="license" href="license">
                        <img src="..//assets/CC0.png" style="border-style: none;" width="81px" height="31px" alt="CC0" />
                    </a>
				</div>
			</div>
		</div>
    </body>
</html>
<!--<?php
    require_once('../footer.php');
?>-->