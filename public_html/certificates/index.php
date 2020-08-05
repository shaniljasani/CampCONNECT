<!DOCTYPE html>
<html>
    <head>
		<title>Certificates - Camp CONNECT Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" href="./confetti.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" 
              type="image/ico" 
              href="https://campconnect.co/assets/favicon.ico">
              
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171846759-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-171846759-1');
        </script>
                    
        <script>
            function validateForm() {
                  var x = document.forms["certificateForm"]["input_id"].value;
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
            $enabled = true;
            
        } else {
            $enabled = false;
        }
        $posted = true;
    ?>

	
	<?php if($posted == true) { 
        if($enabled == true) { 
            // header row
            $header = "CampID,Time\n";
            
            // time
            date_default_timezone_set("Etc/GMT");
            $d = date("Y-m-d h:i:sa");
            
            // data
            $data = "$id,$d\n";

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
			    <form name="certificateForm" action="index.php" onsubmit="return validateForm()" method="POST">
				<div class="inner">
					<header class="align-center">
						<h2>Certificates!</h2>
						<p><strong>You did it! Enter your Camp ID to download your Camp CONNECT Certificate.</strong></p>
					</header>

                <div class="field half first">
					<label for="name">Enter your Camp ID:</label>
					<input name="input_id" id="input_id" type="text" placeholder="" value="<?php if (isset($_POST['input_id'])) echo $_POST['input_id']; ?>">
				</div>
                
				
				<br/>
				
				<ul class="actions">
					<li><input value="Submit" class="button" type="submit"></li>
				</ul>
				</form>
				
				
				<hr/>
				
				
				<?php if($posted == true) { if($enabled == true) { ?>
					<h3> 
					Certificate for ID <?php echo $id ?>
					</h3>
					
					<center>
					    
					<?php echo '<a href="https://campconnect.co/certificates/pdf-data/certificate-' . $id  . '.pdf"> Click here to download your certificate. </a>' ?>
					
		            <?php echo '<iframe src="https://docs.google.com/gview?url=https://campconnect.co/certificates/pdf-data/certificate-' . $id  . '.pdf&embedded=true" style="width:100%; height:1100px;" frameborder="0"></iframe>' ?>
				     </center>
			     <?php }} ?>
			     
			     
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