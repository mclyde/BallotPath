<?php

include('password_protect.php');

// Database file, i.e. file with real data
$data_file = USERS_LIST_FILE;

// Database definition file. You have to describe database format in this file.
// See flatfile.inc.php header for sample.
$structure_file = 'users.def';

// Fields delimiter
$delimiter = ',';

// Number of lines to skip
$skip_lines = 1;

/////////////////////////////////////////////////////////////////////////
//////////////////  END OF SETTINGS
/////////////////////////////////////////////////////////////////////////

require($_SERVER['DOCUMENT_ROOT'] . "/inc/header.html");
require($_SERVER['DOCUMENT_ROOT'] . "/inc/navBar.html");
?>
<div class="intro-header">
        <div class="container">
		<div	class="panel panel-default" >
			<div class="panel-heading">
				<h3 class="panel-title"> Adminstrator Control</h3>
			</div>
			<div  class="panel-body" >
<?php

// protection string
echo 'Include following code into every page you would like to protect, at the very beginning (first line):<br><b>&lt;?php include("' . str_replace('\\','\\\\',str_replace(basename(__FILE__),'login.php',__FILE__)) . '"); ?&gt;</b>'; 

// run flatfile manager
include ('flatfile.inc.php');
?>

				<hr />
				
				<form action="manager.php" method="post">
				New Administrator Password: <input type="password" name="adminPass"><br>
				<input type="submit">
				</form>
				
				<?php
				$word = $_POST["adminPass"];
				
				if($word != null) {
					$lines = file('settings.php');
					$result = '';
				
					foreach($lines as $line) {
						if(substr($line, 0, 26) == "define('ADMIN_PASSWORD', '") {
							$result .= "define('ADMIN_PASSWORD', '".$word."');\n";
						} else {
							$result .= $line;
						}
					}
					file_put_contents('settings.php', $result);
				}
				?>
				
				<hr />
				<!--logout link-->
				<a href="manager.php?logout=1">Logout</a>
			</div>
		</div>
	</div>
</div> 
