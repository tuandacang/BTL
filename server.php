<?php
session_start();

// khởi tạo biến
$username = "";
$email    = "";
$errors = array(); 

// kết nối với cơ sở dữ liệu
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER 
if (isset($_POST['reg_user'])) {
  // giá trị đầu vào
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // xác nhận biểu mẫu 
  if (empty($username)) { array_push($errors, "Username không thể bó trống"); }
  if (empty($email)) { array_push($errors, "Email không thể bó trống"); }
  if (empty($password_1)) { array_push($errors, "Password không thể bó trống"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Mật khẩu không trùng khớp");
  }

  // người dùng chưa tồn tại với cùng tên người dùng và/hoặc email

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Tên đăng nhập đã tồn tại");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email đã tồn tại");
    }
  }

  // đăng kí nếu không có lỗi
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Đăng nhập thành công.";
  	header('location: home.html');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Đăng nhập thành công";
  	  header('location: home.html');
  	}else {
  		array_push($errors, "Sai tên đăng nhập hoặc mật khẩu . Vui lòng nhập lại");
  	}
  }
}

?>