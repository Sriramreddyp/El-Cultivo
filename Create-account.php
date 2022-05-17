<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="Css/create.css" type="text/css" />
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

  session_start();

  if(!isset($emailErr,$nameErr,$dobErr,$passErr,$genderErr,$conpassErr)){
   
    $nameErr = "";
    $emailErr = "";
    $dobErr = "";
    $passErr = "";
    $genderErr = "";
    $conpassErr = "";
    
    
      }

      if(!isset($name,$email,$dob,$pass,$gender,$conpass)){
        $name = $email = $dob = $pass = $gender = $conpass = "";
      }
  



if($_SERVER["REQUEST_METHOD"] == "POST"){


  
    
    

if (empty($_POST["User"])) {
  $nameErr = "Name is required";
} 
else 
{  $name = $_POST['User'];
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $nameErr = "Only letters and white space allowed";
  }
}


if (empty($_POST["email"])) {
  $emailErr = "Email is required";
} 
else
  {
    $email = $_POST['email'];      
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
}


if(empty($_POST["DOB"])){
  $dobErr = "Date of Birth is required";
}else{
  $dob = date('Y-m-d,',strtotime($_POST['DOB']));
}


if(empty($_POST["pass"])){
  $passErr = "Password is required";
}
else{
  $pass = $_POST["pass"];
 }

 if(empty($_POST["conpass"])){
   $passErr = "Password is Required";
 }else{
  $conpass = $_POST["conpass"];
  if($pass != $conpass)
  {
    $conpassErr = "Entered password is not same";
  }
 }
 

if(!isset($_POST["radio"])){ 
  $genderErr = "Please select your gender";
}else{
  $gender  = $_POST['radio'];
}

if(($nameErr == "") &&
($emailErr == "") &&
($dobErr == "") &&
($passErr == "") &&
($genderErr == "") &&
($conpassErr == "")){

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "el-cultivo";
      $Connect = new mysqli($servername,$username,$password,$dbname);
      
      $sqlC = "INSERT INTO `account_details` VALUES('$name','$email','$dob','$pass','$gender')";

      $Final = $Connect->query($sqlC);

     if($Final){
       session_destroy();
       header("Location:Home_El-Cultivo.html");
      }
     
    }


      // $query_insert = $dbConnection->prepare( $sqlC );
      // $query_insert->execute();
      





}






 function test_input($data){
   $data = trim($data);
   $data = strip_tags($data);
   $data = htmlspecialchars($data);
   return $data;
   
}
?>

    <div class="wrapper">
      <img src="Svg's/corn.svg" alt="" class="corn" />
      <div class="container " data-aos="zoom-out-up">
        <h1 class="form-heading phone-heading animate__animated animate__fadeInLeftBig">El-Cultivoo...</h1>
        <div class="form_container">
          <div class="form_inner_container">
            <span class="logo_outline">
              <img src="Svg's/person.svg" alt="" class="person" />
            </span>
            <h2 class="log-in_text">Create an Account</h2>
            <div class="line-container">
              <span class="point"></span>
              <div class="line"></div>
              <span class="point"></span>
            </div>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" >
              <input
                type="text"
                name="User"
                id="user"
                placeholder="Enter Username"
                class="input"
              />
              <span class="error"><?php echo $nameErr;?></span>
             
             
              <input
                type="text"
                name="email"
                id="email"
                placeholder="Enter email"
                class="input"
              />
              <span class="error"><?php echo $emailErr;?></span>
              
              <input
                type="date"
                name="DOB"
                id="DOB"
                placeholder="Date-of-birth"
                class="input"
              />
              <span class="error"><?php echo $dobErr;?></span>
            
              <input
                type="password"
                name="pass"
                id="pass"
                class="input"
                placeholder="Enter Password"
              />
              <span class="error"><?php echo $passErr;?></span>
              
              <input
                type="password"
                name="conpass"
                id="pass"
                class="input"
                placeholder="confirm password"
              />
              <span class="error"><?php echo $passErr;?></span>
              <span class="error"><?php echo $conpassErr;?></span>
              
              <div class="check-container">
                <p class="check-type">Gender :</p>

                <label class="custom-radio">
                  <input type="radio" name="radio" id="male" class="radio" value="M" />
                  <span class="checkmark"></span>
                </label>
                <label for="male" class="label">Male</label>

                <label class="custom-radio"
                  ><input type="radio" name="radio" id="female" class="radio" value="F" />
                  <span class="checkmark"></span
                ></label>
                <label for="female" class="label">Female</label>

                <label class="custom-radio"
                  ><input type="radio" name="radio" id="others" class="radio" value="Ot" />
                  <span class="checkmark"></span>
                </label>
                <label for="Others" class="label">Others</label>
              </div>
              <span class="error"><?php echo $genderErr;?></span>
              <input type="submit" name="" id="" class="submit" />
            </form>
          </div>
        </div>
        <h1 class="form-heading display_none animate__animated animate__fadeInRightBig">Lets Cultivate together</h1>
      </div>
    </div>

    <script>
        AOS.init();
    </script>
   
    




    
  </body>
</html>
