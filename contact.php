        <!DOCTYPE html>
        <html lang="en">
        <head>
          <title>Contact Us</title>
          <?php include_once 'links.php'?>
          
          <link rel="stylesheet" type="text/css" href="./css/contact.css">
          <style type="text/css">
              .alert{
                width: 50%;
                position: relative;
                float: center;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
              }
          </style>

        </head>
        <body style="background-image: url('./assets/photo-1559165317-7638c2b9a7af.jpeg')">
        <?php include_once 'header1.php';
        if (empty($_SESSION['is_login'])){
            header('Location: login.php');
          }?>


        <?php 

        include_once 'db_connection.php';
        if (isset($_POST['save_contact'])) {
            $user_id = $_SESSION['current_user_id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $emailtitle = $_POST['emailtitle'];
            $subject = $_POST['subject'];

           
            if (!empty($fname) && !empty($lname) && !empty($email) && !empty($emailtitle) && !empty($subject)) {

                $sql = "INSERT INTO contact_us (`first_name`, `last_name`, `email`, `email_title`, `subject`, `user_id`)
                VALUES ('$fname', '$lname', '$email', '$emailtitle', '$subject', '$user_id')";
                $result = mysqli_query($conn,$sql);
                if (empty($result)) {
                   echo("Error description: " . mysqli_error($conn));
                }
                else{
        ?>
            <div class="alert alert-primary " role="alert" >
                Your request is submitted. </div>
        <?php
                    
                }
            }
            else {
        ?>
            <div class="alert alert-danger " role="alert">
                All fields are mandatory. </div>
        <?php
            }

        }   
        ?>




        <div class="container">
            <div class="card card-login mx-auto text-center">
                <div class="card-header mx-auto">
                    <span class="logo_title mt-5"> Contact Us </span>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                      <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="fname" class="form-control" placeholder="First Name*" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="lname" class="form-control" placeholder="Last Name*" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="Email" name="email" class="form-control" placeholder="Email Adress*" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                            </div>
                            <input type="text" name="emailtitle" class="form-control" placeholder="Email Title*" required>
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                            </div>
                            <textarea rows="4" cols="50" type="subject" name="subject" class="form-control" placeholder="subject*" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="save_contact" value="submit" class="btn btn-outline-danger float-right login_btn">
                        </div >
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php'?>
    </body>
</html>
