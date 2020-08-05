<!DOCTYPE html>
<html>
    <head>
		<title>See My Schedule - Camp CONNECT Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" href="./confetti.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" 
              type="image/ico" 
              href="https://campconnect.co/assets/favicon.ico">
              
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=REDACTED"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'REDACTED');
        </script>
                    
        <script>
            function validateForm() {
              var x = document.forms["scheduleForm"]["input_id"].value;
              if (x == "") {
                alert("Please enter your Camp ID");
                return false;
              }
              
            if (isNaN(x)) {
                alert("Please enter your Camp ID");
                return false;
            } 
  
            }
        </script>
        
        
        <style>
            .sj_banner {
              padding: 10px 0;
              text-align: center;
              background-color: #facc2f;
              
            }
            .alertt{
                color:red;
            }
        </style>
              
	</head>
	
    <?php 
    
    $posted = false;
    if($_SERVER['REQUEST_METHOD'] == "POST" ) {
        
        $id = $_POST["input_id"];
        $day = $_POST["DayId"];
        
        $enabled = true;
        
        
    } else {
        $enabled = false;
    }
    
    $posted = true;
    
    ?>

	
	<?php if($posted == true) { 
        if($enabled == true) { 
            // header row
            $header = "CampID,Day,Time\n";
            
            // time
            date_default_timezone_set("Etc/GMT");
            $d = date("Y-m-d h:i:sa");
            
            // data
            $data = "$id,$day,$d\n";

            $fileName = "formdata" . ".csv";
            
            /*
             * Create the CSV file.
             * If file exists, append the data to it. Otherwise create the file.
             */
            if (file_exists($fileName)) {
                // Add only data. The header is already added in the existing file.
                file_put_contents($fileName, $data, FILE_APPEND);
            } else {
                // Add CSV header and data.
                file_put_contents($fileName, $header . $data);
            }
        }
    }
	?>
	 
	
	<body class="subpage">


    <div class="sj_banner">
        <div>
    <!--style="background-color: #facc2f; height:75px; border:thin solid #facc2f">-->
    <!--style='padding-top:10px; padding: 30px 0; text-align:center;'-->
        <h4><strong><u>BIG SHOUTOUT</u> to Alim, Daanish, Nadim, and Shanil for working tirelessly to generate schedules daily. Thank you!</h4></strong>
					        
        </div>
    
    </div>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="https://campconnect.co" class="logo"><strong>Camp CONNECT</strong> Portal</a>
					<nav id="nav">
						<a href="https://campconnect.co">Home</a>
						<a href="https://campconnect.co/schedules">See My Schedule</a>
						<a href="https://campconnect.co/moodle">Resources & FAQ</a>
						<a href="https://campconnect.co/support">Get Support</a>
						<a href="https://campconnect.co/live">Live Streams</a>
						<a href="https://campconnect.co/certificates">Certificates</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
			
			
	<!-- Three -->
			<section id="three" class="wrapper">
			    <form name="scheduleForm" action="index.php" onsubmit="return validateForm()" method="POST">
				<div class="inner">
					<header class="align-center">
						<h2>See My Schedule</h2>
						<p><strong>Enter your unique Camp ID &amp; scroll down to see your personalized schedule</strong></p>
					</header>

                <div class="field half first">
					<label for="name">Enter your Camp ID:</label>
					<input name="input_id" id="input_id" type="text" placeholder="" value="<?php if (isset($_POST['input_id'])) echo $_POST['input_id']; ?>">
				</div>
                

                <div class="12u$">
					<div class="select-wrapper">
					    <label for="DayId">Select a Day to View</label>
						<select name="DayId" id="DayId">
							
							<option value="1"> <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '1') ? 'selected="selected"' : ''; ?>Day 1</option>
						    <option value="2"  <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '2') ? 'selected="selected"' : ''; ?>>Day 2</option>
							<option value="3"  <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '3') ? 'selected="selected"' : ''; ?>>Day 3</option>
							<option value="4"  <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '4') ? 'selected="selected"' : ''; ?>>Day 4</option>
							<option value="5"  <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '5') ? 'selected="selected"' : ''; ?>>Day 5</option>
							<option value="6"  <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '6') ? 'selected="selected"' : ''; ?>>Day 6</option>
							<option value="7" <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '7') ? 'selected="selected"' : ''; ?>>Day 7</option>
							<option value="8" <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '8') ? 'selected="selected"' : ''; ?>>Day 8</option>
							<option value="9" <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '9') ? 'selected="selected"' : ''; ?>>Day 9</option>
							<option value="10" selected <?php echo (isset($_POST['DayId']) && $_POST['DayId'] == '10') ? 'selected="selected"' : ''; ?>>Day 10</option>
						</select>
					</div>
				</div>
				
				<br/>
				
				<ul class="actions">
					<li><input value="Submit" class="button" type="submit"></li>
				</ul>
				</form>
				
				<!--PDF VIEWER WORKS-->
				<!--<center>-->
				<!--    <iframe src="https://docs.google.com/gview?url=https://campconnect.co/schedules/pdf-data/77-1.pdf&embedded=true" style="width:718px; height:700px;" frameborder="0"></iframe>-->
				<!--</center>-->
				
				<hr/>
				
				
				<?php if($posted == true) { if($enabled == true) { ?>
					<h3> 
					Your Schedule for Day <?php echo $day ?>
					</h3>
					
					<center>
					    
					    
					    <!--DAY 5 NOTICE-->
					    <?php if($day == 5){ ?>
					        <h3 class="alertt">Please Note: You will begin Day 5 in your family groups!</h3>
					    <?php } ?>
					    
					    
					    <!--DAY 10 FUN-->
					    <?php if($day == 10){ ?>
					        
					        <h4 style="color:red;">Welcome to the LAST Day of Camp CONNECT!<br/>PS. We've left you a fun surprise below your schedule.</h4>
					        
                            <script src="https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js"></script>
                            <script>confetti.start(4000, 200);</script>
					    <?php } ?>
					    
					<?php if($id < 5999 && $id > 5000){ ?>
					    
							<div class="6u$ 12u$(medium)">
					    <h4>NOTE -- Facilitators &amp; Connect Associates: <br/>
					        Please go to your PD's Zoom session 15 minutes before Cabin check-in and right after Cabin closing.</h4>
					        <p>The remainder of your personal schedule is below this table.</p>
					        
					        
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Family</th>
													<th>Zoom Link</th>
												</tr>
											</thead>
											<tbody>
											    <tr>
    												<td>A1</td><td><a href="https://zoom.us/j/7554414257">https://zoom.us/j/7554414257</td>
                                                </tr><tr>
                                                    <td>A2</td><td><a href="https://zoom.us/j/5452256258">https://zoom.us/j/5452256258</td>
                                                </tr><tr>    
                                                    <td>A3</td><td><a href="https://zoom.us/j/6906197657">https://zoom.us/j/6906197657</td>
                                                </tr><tr>    
                                                    <td>A4</td><td><a href="https://zoom.us/j/4846675788">https://zoom.us/j/4846675788</td>
                                                </tr><tr>    
                                                    <td>A5</td><td><a href="https://zoom.us/j/8156267790">https://zoom.us/j/8156267790</td>
                                                </tr><tr>    
                                                    <td>B1</td><td><a href="https://zoom.us/j/6276029353">https://zoom.us/j/6276029353</td>
                                                </tr><tr>    
                                                    <td>B2</td><td><a href="https://zoom.us/j/9563221084">https://zoom.us/j/9563221084</td>
                                                </tr><tr>    
                                                    <td>B3</td><td><a href="https://zoom.us/j/9968102703">https://zoom.us/j/9968102703</td>
                                                </tr><tr>    
                                                    <td>B4</td><td><a href="https://zoom.us/j/7060866703">https://zoom.us/j/7060866703</td>
                                                </tr><tr>    
                                                    <td>B5</td><td><a href="https://zoom.us/j/5701239566">https://zoom.us/j/5701239566</td>
                                                </tr><tr>    
                                                    <td>B6</td><td><a href="https://zoom.us/j/5120339876">https://zoom.us/j/5120339876</td>
												</tr>
												
											</tbody>
											
										</table>
									</div>
									</div>
					<?php } ?>
					
					<?php echo '<a href="https://campconnect.co/schedules/pdf-data/' . $day . '/' . $id  . '-' . $day . '.pdf"> Click here to download your schedule. </a>' ?>
					<p><strong>This schedule has been customized for you. <br/><i>Please do not share or publish in any way, shape, or form.</i></strong></p>
		
		            <?php echo '<iframe src="https://docs.google.com/gview?url=https://campconnect.co/schedules/pdf-data/' . $day . '/' . $id  . '-' . $day . '.pdf&embedded=true" style="width:100%; height:1000px;" frameborder="0"></iframe>' ?>
           
			
			<center>
			<!--DAY 10 FUN-->
		    <?php if($day == 10){ ?>
		    <hr/>
		        <a class="button" href="http://fun.campconnect.co">Play the CONNECT Game</a>
		        <br/>
		        <iframe src="https://funhtml5games.com?embed=pacman" style="width:342px;height:490px;border:none;" frameborder="0" scrolling="no"></iframe>
		        <br/>
		        <a class="button" href="http://fun.campconnect.co">Click Here For the CONNECT Game</a>
		    <?php } ?>
			</center>
			
			<?php } else { ?>
			        <h3 style="text-align:center">Please enter your Camp ID to see your Schedule. If you are unable to see it, your schedule may still be generating. Please check this page at a later time.</h3>
			<?php }} ?>
			
			
				     </center>
			</section>
			
				<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; 2020 &#124; <a href="https://campconnect.co">Camp Connect Portal</a>
					</div>
				</div>
			</footer>
			
			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			
</body>
</html>
