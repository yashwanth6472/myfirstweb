
<?php 

$msg = $msgClass = $suc = $sucClass = '';

$con = mysqli_connect("localhost","root", "", "cellshope") or die("didnot connectr0");
    if(isset($_POST['register_form'])){
        $user = $_POST['user_name'];
    $email = $_POST['email_id'];
    $adress = $_POST['adress'];
    $pass = $_POST['password'];
    $Cpass = $_POST['Cpass'];
    
 

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
        //pass
        if($pass == $Cpass){
            //pass
           
         
            
        }else{
            //fail
            $msg = "Password Not Match";
            $msgClass = "alert-danger";
        }

    }else{
        $msg = "Invalid mail id";
            $msgClass = "alert-danger";
    }

    $result = "SELECT * FROM register_page WHERE userName = '$user'";
    $rows = mysqli_query($con, $result);

    if(mysqli_num_rows($rows) == 1){
        $msg = "alredy registerd";
        $msgClass = "alert-danger";
    }else{
        $sql = "INSERT INTO register_page(userName, email_id, adress, user_password) VALUES ('$user', '$email', '$adress', '$pass')";
        $suc = "Registerd Successfully";
        $sucClass = "alert-success";
        header("Location: login.php");
    
        if(mysqli_query($con, $sql)){
            
        }else{
            echo mysqli_error($con);
        }
        
    
    }
    }



   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        input{
            margin: 10px;
            
        }
    </style>
</head>
<body>
    <div class="container">
    <?php if($msg != ''): ?>

        <div style="padding: 15px; margin-bottom: -1rem; opacity: 1; border-radius: 10px; background-color: tomato; width: 50%; color: white; margin-top: 2rem;" class="<?php echo $msgClass; ?>"><?php echo $msg; ?></div>


    <?php else: ?>

<div style="padding: 15px; opacity: 1; margin-bottom: -1rem; border-radius: 10px; background-color: green; width: 50%; color: white; margin-top: 2rem;" class="<?php echo $sucClass; ?>"><?php echo $suc; ?></div>
<?php endif; ?>

    
    
        <form method="post" style="margin-top: 3rem;">
            <label for="">Name</label>
            <input type="text" name="user_name" class="form-control" placeholder="User Name" value="<?php echo isset($user)? $user : ''; ?>">
            <label for="">Email-Id</label>
            <input type="text" name="email_id" class="form-control" placeholder="User E_MAIL Id" value="<?php echo isset($email)? $email : ''; ?>">
            <label for="">Adress</label>
            <input type="text" name="adress" class="form-control" placeholder="Current Adress" value="<?php echo isset($adress)? $adress : ''; ?>">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Create Password" required>
            

            <label for="">Confirm Password</label>
            <input type="password" name="Cpass" class="form-control" placeholder = "Confirm Passowrd" required>


            <input type="submit" name="register_form" class="btn btn-success" value="Sign Up">
        </form>
    </div>    
</body>
</html>