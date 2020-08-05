

<!DOCTYPE html>
<html>
    <head>
		<title>Form Data Results - Camp CONNECT Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
        
        
             
	</head>
	
	
	<body>

<article id="top"></article>
            <p><a href="#bottom">gotobottom</a></p>


                <table>
                <?php
                    $fp = fopen ( "https://campconnect.co/schedules/formdata.csv" , "r" );
                    while (( $data = fgetcsv ( $fp , 100000 , "," )) !== FALSE ) {
                        $i = 0;
                        echo "<tr>";
                        foreach($data as $row) {
                           echo "<td>" . $row . "</td>";
                           $i++ ;
                        }
                        echo "/<tr>";
                    }
                    fclose ( $fp );
                ?>
                </table>



		<article id="bottom"></article>
		<p><a href="#top">gototop</a></p>
			
			
			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			
</body>
</html>