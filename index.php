<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sunscreen Database</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    function newitem(){
        myWindow=window.open('','','width=250,height=50');
        myWindow.document.write("<html>");
        myWindow.document.write("<title>New Item</title>");
        myWindow.document.write("<body style=background-color:#ffb542;>");
        myWindow.document.write("<form action=insertnewitem.php method=post>");
        myWindow.document.write("<table>");
        myWindow.document.write("<tr><td>Item:<input type=text size=20 name=name></td></tr>");
        myWindow.document.write("<tr><td><input type='submit' value = 'Save'></td></tr>");
        myWindow.document.write("</table>");
        myWindow.document.write("</form>");
        myWindow.document.write("</body>");
        myWindow.document.write("</html>");
        myWindow.focus();
    }

    function update(ssao,stock,cog,costcu,key){
        myWindow=window.open('','','width=400,height=250');
        var lsRegExp = /\+/g
        var string=unescape(String(ssao).replace(lsRegExp, '\ '));
        myWindow.document.write("<html>");
        myWindow.document.write("<title>Edit Item</title>");
        myWindow.document.write("<body style=background-color:#ffb542;>");
        myWindow.document.write("<form action=updateitem.php method=post>");
        myWindow.document.write("<table>");
        myWindow.document.write("<tr><td><input type=hidden size=20 name=pkey value="+key+"></td></tr>");
        myWindow.document.write("<tr><td style ='font-size:15px'>Stock Status as of:<textarea rows='1' cols='20' input style='margin-left:11px' size=20 name='marks'>"+string+"</textarea></td></tr>");
        myWindow.document.write("<tr><td style ='font-size:15px'>Stock Status:<input style='margin-left:48px' type='text' name='stockstatus' value="+stock+"></td></tr>");
        myWindow.document.write("<tr><td style ='font-size:15px'>Cost of Goods:<input style='margin-left:37px' type='text' name='cog' value="+cog+"></td></tr>");
        myWindow.document.write("<tr><td style ='font-size:15px'>Cost to Customer:<input style='margin-left:18px' type='text' name='costcu' value="+costcu+"></td></tr>");
        myWindow.document.write("<tr><td><input type='submit' value = 'Save'></td></tr>");
        myWindow.document.write("</table>");
        myWindow.document.write("</form>");
        myWindow.document.write("</body>");
        myWindow.document.write("</html>");
        myWindow.focus();
    }

    function clientmonth(){

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
                <?php
                $con = mysql_connect("localhost","root","qwerty314");
                if (!$con)
                  {
                  die('Could not connect: ' . mysql_error());
                  }

                mysql_select_db("sunscreen", $con);

                $result = mysql_query("SELECT id, item, ssao, stockstatus, cog, costcu, total FROM items");


                                echo "<table class='table'>";
                                echo "<tr>";
                                echo "<th>Item</th>";
                                echo "<th>Stock Status as of</th>";
                                echo "<th>Stock Status</th>";
                                echo "<th>Cost of Goods</th>";
                                echo "<th>Cost to Customer</th>";
                                echo "<th>Total</th>";
                                echo "<th>Command</th>";
                                echo "</tr>";

                $i=0;
                while($row = mysql_fetch_array($result))
                  {
                                
                                echo "<tr>";
                                echo "<td><b>".htmlspecialchars($row['item'])."</b></td>";
                                echo "<td>".htmlspecialchars($row['ssao'])."&nbsp;</td>";
                                echo "<td>".htmlspecialchars($row['stockstatus'])."&nbsp;</td>";
                                echo "<td>".htmlspecialchars($row['cog'])."&nbsp;</td>";
                                echo "<td>".htmlspecialchars($row['costcu'])."&nbsp;</td>";
                                echo "<td>".htmlspecialchars($row['total'])."&nbsp;</td>";
                                $ssao = urlencode($row['ssao']);
                                echo "<td><input type='button' value = 'Edit' onclick=update('$ssao',".$row['stockstatus'].','.$row['cog'].','.$row['costcu'].','.$row['id'].");>/<a href='javascript:void(null);' onclick=document.getElementById('clientmonth').submit();>Details</a></td>";
                                
                                echo "<form id='clientmonth' action='clientmonth.php' method='post'>
                                      <input type='hidden' name='pkey' value=".htmlspecialchars($row['id'])." />
                                      <input type='hidden' name='cog' value=".htmlspecialchars($row['cog'])." />
                                      </form>";
                               // echo "<td><a href = updateitem1.php?pkey=".$row['id'].">Edit</a>/<a href = clientmonth.php?pkey=".$row['id']."&cog=".$row['cog']."> Details </a></td>";
                                echo "</tr>";
                  } 
                                echo "</table>";
                                echo "<input type=button value='New Item' onclick=newitem();>";
                mysql_close($con);
                ?>
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
