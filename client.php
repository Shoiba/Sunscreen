<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sunscreen Database</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    function newclient(key){
    myWindow=window.open('','','width=450,height=100');
    myWindow.document.write("<html>");
    myWindow.document.write("<title>Editing Contacts</title>");
    myWindow.document.write("<body style=background-color:#ffb542;>");
    myWindow.document.write("<form action=insertnewclient.php method=post>");
    myWindow.document.write("<table>");
    myWindow.document.write("<tr><td><input type=hidden name=id value="+key+"></tr></td>");
    myWindow.document.write("<tr><td>Name: <input type=text name=name></tr></td>");
    myWindow.document.write("<tr><td><input type='submit' value = 'Save'></td></tr>");
    myWindow.document.write("</table>");
    myWindow.document.write("</form>");
    myWindow.document.write("</body>");
    myWindow.document.write("</html>");
    myWindow.focus();
    }

    function Back(key, cog){
        window.location =('clientmonth.php?pkey='+key+'&cog='+cog);
    }
</script>
</head>
<body>
<div id="header">
	<h1>Sunscreen</h1>
	<h2>EBCO Distributors Inc.</h2>
</div>
<!-- end #header -->
<div id="menu">
	<ul>
		<li class="first"><a href="index.php" accesskey="1" title="">Home</a></li>
		<li><a href="newclient.php" accesskey="2" title="">New Client</a></li>
		<li><a href="#" accesskey="3" title="">Logout</a></li>

	</ul>
</div>
<!-- end #menu -->
<div id="content">
	<div id="posts">
		<div class="post">
			<h2 class="title">Sunscreen Database</h2>
			<div class="story">

			</div>
		</div>
		<div class="post">
                 <form action="newclient.php" method="post">
                        <?php
                        $con = mysql_connect("localhost","root","qwerty314");
                        if (!$con)
                          {
                          die('Could not connect: ' . mysql_error());
                          }

                        mysql_select_db("sunscreen", $con);
                        $key=$_GET['pkey'];
                        $cog=$_GET['cog'];
                        $result = mysql_query("SELECT idc, name, idm FROM client WHERE idm ='$key'");


                                        echo "<table class='table'>";
                                        echo "<tr>";
                                        echo "<th>Client Name</th>";
                                        echo "<th>Command</th>";
                                        echo "</tr>";

                        $i=0;
                        while($row = mysql_fetch_array($result))
                          {
                                        echo "<tr>";
                                        echo "<td><b>".htmlspecialchars($row['name'])."</b></td>";
                                        echo "<td><a href = specific.php?pkey=".$row['idc'].">Edit / View</a></td>";
                                        echo "</tr>";
                          }
                                        echo "</table>";
                           echo $cog;
                           echo "<input type=button value=Back onclick=Back(".$key.",".$cog.");>";
                           //To add a new month
                           echo "<input type='button' value = 'Add New Client' onclick=newclient(".$key.");>";
                        mysql_close($con);
                        ?>
                </form>
		</div>
	</div>

	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #content -->
<div id="footer">
	<p id="legal">EBCO Distributors Inc.</p>
</div>
<!-- end #footer -->
</body>
</html>

