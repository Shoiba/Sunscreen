<html>
<head>
<title>New Client</title>
<link href="default.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    function newentry(key){
        myWindow=window.open('','','width=450,height=320');
        myWindow.document.write("<html>");
        myWindow.document.write("<title>New Entry</title>");
        myWindow.document.write("<body style=background-color:#ffb542;>");
        myWindow.document.write("<form action=insertnewentry.php method='post'>");
        myWindow.document.write("<table>");
        myWindow.document.write("<input type=hidden name=idc value ="+key+">");
        myWindow.document.write("<tr><td>Job Order Series No.:<input style=margin-left:24px type=text size=20 name=joborder></td></tr>");
        myWindow.document.write("<tr><td>Qty Purchased/Qty Used:<input type=text size=20 name=qty></td></tr>");
        myWindow.document.write("<tr><td>Date Delivered:<input style=margin-left:64px type=text size=20 name=datedelivered></td></tr>");
        myWindow.document.write("<tr><td>Actual Cost:<input style=margin-left:83px type=text size=20 name=actualcost></td></tr>");
        myWindow.document.write("<tr><td>Cost to Customer:<input style=margin-left:47px type=text size=20 name=costtocust></td></tr>");
        myWindow.document.write("<tr><td>Remarks:<textarea rows='5' cols='30' input type=text size=20 name=remarks></textarea></td></tr>");
        myWindow.document.write("<tr><td><input type='submit' value = 'Save'></td></tr>");
        myWindow.document.write("</table>");
        myWindow.document.write("</form>");
        myWindow.document.write("</body>");
        myWindow.document.write("</html>");
        myWindow.focus();
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
<div class="contentv">
	<div id="posts">
		<div class="post">
			<h2 class="title">Sunscreen Database</h2>
			<div class="story">

			</div>
		</div>
		<div class="post">
                        <table>
                            <?php
                            $con = mysql_connect("localhost","root","qwerty314");
                            if (!$con)
                              {
                              die('Could not connect: ' . mysql_error());
                              }
                            mysql_select_db("sunscreen", $con);
                            $key=$_GET['pkey'];
                            $result = mysql_query("SELECT name FROM client WHERE idc='$key'");
                            while($row = mysql_fetch_array($result))
                            {
                            echo "<table>
                            <tr><td>Name:<input type=text value=\"".htmlspecialchars($row['name'])."\"></td></tr>
                            </table>";
                            }

                            $result1= mysql_query("SELECT idd, joborder, qty, datedelivered, actualcost, costtocust, remarks FROM detailed WHERE idc='$key'");
                            echo"<table class='tablev'>
                            <tr>
                            <th>Job Order Series No.</th>
                            <th>Qty Purchased/Qty Used</th>
                            <th>Date Delivered</th>
                            <th>Actual Cost</th>
                            <th>Cost to Customer</th>
                            <th>Remarks</th>
                            <th>Command</th>
                            </tr>";

                            while($row = mysql_fetch_array($result1))
                            {
                                echo "
                                <tr><td>".htmlspecialchars($row['joborder'])."</td>
                                <td>".htmlspecialchars($row['qty'])."</td>
                                <td>".htmlspecialchars($row['datedelivered'])."</td>
                                <td>".htmlspecialchars($row['actualcost'])."</td>
                                <td>".htmlspecialchars($row['costtocust'])."</td>
                                <td>".htmlspecialchars($row['remarks'])."</td>
                                <td><a href = blah.php?pkey=".$row['idd'].">Edit / View</a></td></tr>";
                            }        
                            echo "</table>";
                            echo "<input type=button value='New Entry' onclick=newentry(".$key.");>";
                                
                           
                            mysql_close($con);
                            ?>
                        </table>

                       

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
