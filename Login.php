<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="Css/styles.css" type="text/css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title>Document</title>
  </head>
  <body>

  <?php

if(!isset($nameErr,$passErr)){
  $nameErr = "";
  $passErr = "";
  

}

if(!isset($name,$pass)){
$name = $pass = "";
}



if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(empty($_POST['User'])){
    $nameErr = "Please Enter The name";
    }else{
      $name = test_input($_POST['User']);
     }

    if(empty($_POST['Pass'])){
       $passErr = "password is Required";
      }else{
      $pass =  test_input($_POST['Pass']);
      }

      if(($nameErr == "") && ($passErr == "")){
       
        $User = $_POST["User"];
        $Pass = $_POST["Pass"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "el-cultivo";
        $Connect = new mysqli($servername,$username,$password,$dbname);
        $sqlC = "SELECT * FROM account_details where Username = '$User' AND Passwd = '$Pass' ";
        $Final = $Connect->query($sqlC);
        
        
        
        if($Final->num_rows > 0){
            header("Location:Home_El-Cultivo.html");
            
        }
        
      
      }
  
   
}
 
function test_input($data){
 $data = trim($data);
 $data = strip_tags($data);
 $data = htmlspecialchars($data);
 return $data;
 }
 ?>


   


 



    <div class="wrapper">
      <img src="Svg's/corn.svg" alt="" class="corn">
      <div class="container" data-aos="zoom-out-up">
        <h1 class="form-heading phone-heading animate__animated animate__fadeInLeftBig "><span>El-Cultivoo...</span></h1>
        <div class="form_container">
          <div class="form_inner_container">
            <span class="logo_outline">
              <img src="Svg's/person.svg" alt="" class="person" />
            </span>
            <h2 class="log-in_text">LOG-IN</h2>
            <div class="line-container">
              <span class="point"></span>
              <div class="line"></div>
              <span class="point"></span>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" method="POST">
              <input
                type="text"
                name="User"
                id="user"
                placeholder="Enter Username"
                class="input"
                value="<?php echo $name;?>"
              
              />
              <span class="error"><?php echo $nameErr;?></span>
              
              <input
                type="password"
                name="Pass"
                id="pass"
                placeholder="Enter Password"
                class="input"
                
              />
              <span class="error"><?php echo $passErr;?></span>
              <input type="submit" name="" id="" class="submit" />
            </form>
            <div class="create-account-link">
              <a href="Create-account.php" class="create-account_text"
                >Don't have an account? sign in</a
              >
            </div>
          </div>
        </div>
        <h1 class="form-heading display_none padding-left animate__animated animate__fadeInRightBig">Lets Cultivate together</h1>
      </div>
    </div>

  <script>
    AOS.init();
  </script>

  
  </body>
</html>
