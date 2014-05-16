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
                        <img src="/assets/CC0.png" style="border-style: none;" width="81px" height="31px" alt="CC0" />
                    </a>
				</div>
			</div>
		</div>
    </body>
</html>