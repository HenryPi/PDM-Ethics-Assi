<!DOCTYPE  html>
<html>
<head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
	<title>Profile Page</title>
	<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
	<script src="JS/setRequired.js" type="text/javascript"></script>
	<link href="CSS/profile_page.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
	<link href="CSS/cssEthics_Application.css" rel="stylesheet" type="text/css" />
        
            <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/jumbotron.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body>
	<?php
		$servername = "127.0.0.1"; //Change the value inside those " " to your own server/host,username,password,and database name
		$username = "root"; 
		$password = "abc123";
		$dbname = "pdm";
		
		$mysqli = mysql_connect($servername, $username, $password); //Terminate connection if the connection failed
		if(!$mysqli) 
		{
			die ('Could not connect' . mysql_error() );
			echo 'Could not connect to the server.';
		}
		
		$db_selected = mysql_select_db($dbname, $mysqli);
	
		if (!$db_selected) // If the database selected doesn't exist, terminate the process
		{
			die('Can\'t use ' . $dbname . ': ' . mysql_error());
			echo 'Unable to access the database';
		}
		
		session_start();
		$userName = $_SESSION["myusername"];
		$sql = "SELECT firstname, lastname, email, pno FROM Member WHERE username ='$userName'";
		$result = mysql_query($sql, $mysqli);
		if(!$result)
		{
			die(mysql_error());
		}
		
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
	?>
	
    
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                  <a class="navbar-brand" href="#"><img style="max-width:200px" src="image/curtin-logo.gif"> </a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <form class="navbar-form navbar-right">
                    <a class="navbar-text">Welcome, <?php echo $row['firstname']." ".$row['lastname']; ?></a>
                    <button type="submit" onclick ="window.location='Login.php'" name="Logout" id="logout_button" class="btn btn-warning">Log Out</button>
                </form>
              </div><!--/.navbar-collapse -->
            </div>
        </nav>
    
    
	<?php echo "<p>Name:   ".$row['firstname']."  ".$row['lastname']."</p>"; ?>
	<?php echo "<p>E-mail Address:   ".$row['email']."</p>"; ?>
	<?php echo "<p>Contact Number:   ".$row['pno']."</p>"; ?>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<div id="testing" class="TabbedPanels">
		<ul class="TabbedPanelsTabGroup">
			<li class="TabbedPanelsTab" tabindex="0"><h3>Current Application</h3></li>
			<li class="TabbedPanelsTab" tabindex="0"><h3>Drafts</h3></li>
			<li class="TabbedPanelsTab" tabindex="0"><h3>Tagged</h3></li>
			
		</ul>
		
		<div class="TabbedPanelsContentGroup">
			<div class="TabbedPanelsContent">
				<p class="tab">Ethics_Application One
				<input type="button" onclick="alert('go to the actual application')" name="View" value="View" />
				<input type="button" onclick="alert('go to the head of school')" name="HOS" value ="Head Of School"/>
				<input type="button" onclick="alert('a testing button')" name="testing" value="NULL" /></p>

			</div>

			<div class="TabbedPanelsContent">
				<p class="tab">Draft One
				<input type="button" onclick="alert('Create')" name="Create" value="Create New Application" />
				<input type="button" onclick="alert('Edit')" name="Edit" value ="Edit Draft Application"/>
				<input type="button" onclick="alert('Delete')" name="Delete" value="Delete Application" /></p>

			</div>
			
			<div class="TabbedPanelsContent">
				<p class="tab">Tagged One
				<input type="button" onclick="alert('go to the actual application')" name="ViewTagged" value="View" />
				<input type="button" onclick="alert('go to the head of school')" name="ContactPerson" value ="Principal Investigator"/>
				<input type="button" onclick="alert('a testing button')" name="testing" value="blank tab" /></p>

			</div>
		</div>
	</div>

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("testing");
</script>	
</body>
</html>