<?php
$username=$_POST["uname"];
$getloan=$_POST["getloan"];
echo " $username <br>";
echo " $getloan <br>";
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die("could not connect" . mysql_error());
}
echo "connected<br>";
mysql_select_db("quack");
$sql="select * from login where username = '$username'";
$result=mysql_query($sql,$conn);
if(!$result)
{
die("could not execute query". mysql_error() );
echo "<br>";
}
else
{
echo "Query Execute successfully <br>";
$rows=mysql_num_rows($result);
if($rows>0)
{
echo "User name already Exists Record updated Successfully<br>" ;
$dt=date('y-m-d');
$update="update login set loan='$getloan',getloan=0,dueamount='$getloan'/100*5+'$getloan',duedate='$dt' where username = '$username'";
echo "Get Loan updated Successfully<br>" ;
$updateresult=mysql_query($update,$conn);
if(!$updateresult)
{
die("Query not executed" . mysql_error());
}	
}
else
{
echo "Reg No. Does not exists, Record not updated <br>";
}
}
mysql_close($conn);
?>