<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	
	<style>
body{
	margin: 0 auto;
	background-image: url("ssss.jpg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
}

.container{
	width: 400px;
	height: 350px;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 160px;
}

.container img{
	width: 150px;
	height: 150px;
	margin-top: -60px;
}

input[type="text"],input[type="password"]{
	margin-top: 30px;
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}

.form-input::before{
	content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

.btn-login{
	padding: 15px 25px;
	border: none;
	background-color: #27ae60;
	color: #fff;
}
</style>
</head>
<body>
	<div class="container form-input">
		<form method="POST" action=home.php>
			<h2>LOGIN</h2>
				<label for="username"><b>Username</b><br></label>
				<input type="text" name="username" placeholder="Enter the User Name"/>	
				<label for="password"><b>Password</b><br></label>
				<input type="password" name="password" placeholder="Password"/>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>

<?php 

$host="localhost:3306";
$user="root";
$password="";
$db="bike_showroom";

mysqli_connect($host,$user,$password,$db);
//if($link === false){
//die("ERROR: Could not connect. " . mysqli_connect_error());}
//mysqli_select_db($db);

if(isset($_POST['username'])){
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql = "SELECT * FROM `login` where username='".$username."' AND password='".md5($password)."'";
    $result = $conn->query($sql);
    
    if(mysqli_num_rows($result)==1){
		session_start();
                            
			// Store data in session variables
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $username;
			header("location:home.php");
			exit();
    }
    else{
        echo " Please Enter The Valid Username and Password ";
        exit();
    }
        
}
?>