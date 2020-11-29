
<?php 
session_start();

$msg = $msgClass = $suc = $sucClass = '';

$con = mysqli_connect("localhost","root", "", "cellshope");

    if(isset($_POST['log_form'])){
        $user = $_POST['user_name'];
        $pass = $_POST['password'];

    $result = "SELECT * FROM register_page WHERE userName = '$user' AND user_password = '$pass' ";
    $rows = mysqli_query($con, $result);
    
    // $password = "SELECT user_password FROM register_page WHERE userName = '$user' ";
    // $columns = mysqli_query($con, $password);

    if(mysqli_num_rows($rows) > 0){
        $_SESSION['user_name'] = $user;
            header("Location: products.php?user_id=$user");
    }else{
      $msg="Invalid user name or Password";
      $msgClass = "alert-danger";
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
        form{
            margin: 10px;
            width: 50%;
           margin-left: 25%;      }

           input{
               margin-bottom: 20px;
           }
           input[type='submit']{
               width: 30rem;
               margin-left: 3rem;
               font-weight: 500;
                         }

                         input[type='submit']:hover{
               
               background-color: transparent;
               border: 2px solid dodgerblue;
               color: dodgerblue;
               font-weight: 600;
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
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Create Password" required>
            

            

             <input type="submit" name="log_form" class="btn btn-primary" value="Sign in">
        </form>

        <div class="text-center">You Don't Have An Account?, <a href="register.php">Sign Up Here</a> </div>
    </div>    
</body>
</html>