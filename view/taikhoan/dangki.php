<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
   <style>
    /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }    */
    .container {
        font-family: Arial, sans-serif;
            max-width: 1400px;
            margin: auto;
            margin-left: 50px;
            padding: 20px;
          
          
            height: auto;
   }
               
             h2 {
                
                text-align: center;
                margin-bottom: 24px;
                color: #007bff; 
        } 

        .mb-3 {
            margin-right: -300px;
            margin-bottom: 24px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            box-sizing: border-box;
            max-width: 1200px;

        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 50px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .mb-7 {
            margin-top: 20px;
        }

        .form-links {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .form-links a {
            text-decoration: none;
            margin-right: 50px;
            color: #007bff;
        }

        .form-links a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            display: none;
        }

        .success {
            color: green;
            display: none;
        }
        
           
        </style>
   
</head>
<body>

<div style="margin-top: 150px;" class="container">
    <div class="vehome">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
        </svg>
        <a href="index.php">Quay Lại Trang Chủ</a>
    </div>
  <h2>Đăng Ký</h2> 
     <div class="row col-6">
        
            <form action="http://localhost/DA1_NHOM2-master/index.php?act=dangki" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                    Email
                    <input type="email" name="email" id="email" class="form-control">
                    <span id="emailError" style="color: red; display: none;">Vui lòng nhập địa chỉ email.</span>
                </div>
                <div class="mb-3">
                    Tài Khoản
                    <input type="text" name="username" id="username" class="form-control">
                    <span id="usernameError" style="color: red; display: none;">Vui lòng nhập tên tài khoản.</span>
                </div>
                <div class="mb-3">
                    Mật khẩu
                    <input type="password" name="password" id="password" class="form-control">
                    <span id="passwordError" style="color: red; display: none;">Vui lòng nhập mật khẩu.</span>
                </div>
                <div id="successMessage" style="color: green; display: none;">Đăng ký thành công. Vui lòng đăng nhập.</div>
                <a style="float: left; text-decoration: none; color: black ;  margin-right: 60px;" href="?act=quenmk">Quên Mật Khẩu</a>
                <a style="float: right; text-decoration: none;" href="?act=login">Đã Có Tài Khoản</a>
                <div class="mb-7" style="padding-top: 40px;">
                    <input type="submit" value="Đăng Ký" class="btn btn-primary" name="dangki">
                </div>
            </form>
    </div>
</div>


<script>
    function validateForm() {
        var email = document.getElementById("email").value;
        var user = document.getElementById("username").value;
        var pass = document.getElementById("password").value;

        if (email == "") {
            document.getElementById("emailError").style.display = "inline";
            return false;
        } else {
            document.getElementById("emailError").style.display = "none";
        }

        if (ten == "") {
            document.getElementById("usernameError").style.display = "inline";
            return false;
        } else {
            document.getElementById("usernameError").style.display = "none";
        }

        if (mk == "") {
            document.getElementById("passwordError").style.display = "inline";
            return false;
        } else {
            document.getElementById("passwordError").style.display = "none";
        }

        // Hiển thị thông báo khi đăng ký thành công
        document.getElementById("successMessage").style.display = "block";
        return true;
    }
</script>

</body>
</html>

