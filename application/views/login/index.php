<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<style type="text/css">		
form {
  border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.container {
  padding: 16px;
  left: 50%;
  transform: translateX(-50%);
  position: absolute;
  margin-top: 80px;
  width: 25%;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }  
}
	</style>
</head>
<body>
	<form action="auth_login" method="post">
	
	  <div class="container">	  	
	  	<?php if($this->session->flashdata('message')): ?>
	  	<center><h4 style="color: red;"><?php echo $this->session->flashdata('message'); ?></h4></center>
	  	<?php endif; ?>
	  	<center><h1>LOGIN</h1></center>
	    <label for="username"><b>Username</b></label>
	    <input type="text" placeholder="Enter Username" name="username" required>
	    <label for="password"><b>Password</b></label>
	    <input type="password" placeholder="Enter Password" name="password" required>
	    <button type="submit">Login</button>		
	  </div>
	
	</form>
</body>
</html>