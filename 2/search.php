<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Stellar by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">

						<h1>Search Listings</h1>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
                            <li><a href="index.html">Home</a></li>
							<li><a href="generic.html">Information</a></li>
							<li><a href="Login.html">Login</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Search -->
							<section id="Search" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major" >
											<h2>City Search</h2>
										</header>

										<form action="#Results" method="GET" name = ''>
											<div class = "row">
												<div class="col-6 col-12-xsmall">
													Name of City: <input type="text" name="name" required><br>
												</div>

												<div class="col-6 col-12-xsmall" style = "text-align:center">
													<input type="submit" class = "button" value = "Search" style = "margin-top: 5%">
												</div>
		
											</div>
                                        </form>

											<?php

											// CHECK TO SEE IF THE KEYWORDS WERE PROVIDED
											if (isset($_GET['name']) && $_GET['name'] != ''){
												
												// save the keywords from the url
												$k = trim($_GET['name']);
						
												// create a base query and words string
												$query_string = "SELECT neighbourhood, AVG(price)
												FROM listings";
												$display_words = "";
						
												// seperate each of the keywords
												$keywords = explode(' ', $k); 
												foreach($keywords as $word){
													$query_string .= " WHERE neighbourhood_group = '$word' GROUP BY neighbourhood
													ORDER BY AVG(price) DESC ";
													$display_words .= $word." ";
												}
												$query_string = substr($query_string, 0, strlen($query_string) - 1);
											}
											else
												echo "";
										?>

									</div>


								</div>
							</section>

                            
						<!-- Results -->
                        <section id="Results" class="main">
                            <div class="spotlight">
                                <div class="content">
                                    <header class="major">
                                        <h2>Search Results</h2>
                                    </header>
									
									<?php

									if (isset($_GET['name']) && $_GET['name'] != ''){

										// connect to the database
										$servername = "localhost";
											$username = "root";
											$password = "Test123";
											$dbname = "dcl1";

											// Create connection
											$conn = new mysqli($servername, $username, $password, $dbname);
											// Check connection
											if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
											}

										$query = mysqli_query($conn, $query_string);
										$result_count = mysqli_num_rows($query);

										// check to see if any results were returned
										if ($result_count > 0){
											
											// display search result count to user
											echo 'Popular Neighbourhoods in <i>'.$display_words.'</i> <hr /><br />';

											echo '<table class="search">';

											// display all the search results to the user
											while ($row = mysqli_fetch_assoc($query)){
												
												echo '<tr>
													<td><h2>'.$row['neighbourhood'].'</h2></td>
													<td> Average Price '.$row['AVG(price)'].'</td>
												</tr>';
											}

											echo '</table>';
										}
										else
											echo 'No results found. Please search something else.';

										$conn->close();
									}


									?>

                                </div>
                            </div>
                        </section>

					</div>
					<footer id="footer">
						<section>
							<h2>Aliquam sed mauris</h2>
							<p>Sed lorem ipsum dolor sit amet et nullam consequat feugiat consequat magna adipiscing tempus etiam dolore veroeros. eget dapibus mauris. Cras aliquet, nisl ut viverra sollicitudin, ligula erat egestas velit, vitae tincidunt odio.</p>
							<ul class="actions">
								<li><a href="generic.html" class="button">Learn More</a></li>
							</ul>
						</section>
						<section>
							<h2>Etiam feugiat</h2>
							<dl class="alt">
								<dt>Address</dt>
								<dd>1234 Somewhere Road &bull; Nashville, TN 00000 &bull; USA</dd>
								<dt>Phone</dt>
								<dd>(000) 000-0000 x 0000</dd>
								<dt>Email</dt>
								<dd><a href="#">information@untitled.tld</a></dd>
							</dl>
							<ul class="icons">
								<li><a href="#" class="icon brands fa-twitter alt"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon brands fa-dribbble alt"><span class="label">Dribbble</span></a></li>
							</ul>
						</section>
						<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>