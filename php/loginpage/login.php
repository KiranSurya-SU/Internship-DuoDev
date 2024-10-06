<?php
if(!isset($_POST['submit']))
{
     $username=$_POST['username'];
     $password=$_POST['password'];

     $con=mysqli_connect("localhost","root","","loginpage");

     $sql="SELECT * from login1 WHERE username='$username' AND 
     password='$password' ";

     $result=mysqli_query($con,$sql);
     
     $resultcheck=mysqli_num_rows($result);

     if($resultcheck>0)
     {
     echo"<h1>You are logined!</h1>";
     }
     else
     {
     echo"<h1>Incorrect</h1>";
     }
}
?>