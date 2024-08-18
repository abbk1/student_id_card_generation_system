<?php include 'includes/header.php' ?>
<?php //checkIfUserLogin(); ?>
    <div id="wrapper">

    <?php isUsreSignIn(); ?>

    <!-- Navigations -->
        <?php include 'includes/nav.php'?>
    <!-- end navigations -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">

                        <h1 class="page-header">
                            UPDATE USER RECORD
                            <!-- <small>Subheading</small> -->
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> User Information
                            </li>
                        </ol>

    <?php

    if (isset($_GET["id"])) {

            $user_id = mysqli_escape_string($conn, $_GET["id"]);

            $query = "SELECT * FROM `tblusers` WHERE user_id = $user_id";
            $select_user = mysqli_query($conn, $query);
            confirmQueryExc($select_user);

            if(mysqli_num_rows($select_user) > 0) { 
                while($row = mysqli_fetch_assoc($select_user)) {
                    $user_id = $row["user_id"];
                    $firstname = $row["firstname"];
                    $lastname = $row["lastname"];
                    $othername = $row["othername"];
                    $email = $row["email"]; 
                    $gender = $row['gender'];
                    $password = $row['password'];
                    $user_role = $row['user_role'];
                }
            } else {
                echo "";
            }

            // header("Location: edituser.php?id=$user_id");
        }


if (isset($_POST['submit'])) {

    $globalError = "";
    $globalMessage = "";

    $user_id = mysqli_escape_string($conn, $_POST['id']);
    $firstname = mysqli_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_escape_string($conn, $_POST['lastname']);
    $othername = mysqli_escape_string($conn, $_POST['othername']);
    $gender = mysqli_escape_string($conn, $_POST['gender']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $userole = mysqli_escape_string($conn, $_POST['userole']);
    $password = mysqli_escape_string($conn, $_POST['password']);


    $query = "UPDATE tblusers SET firstname = '{$firstname}', lastname = '{$lastname}', ";
    $query .= " othername = '{$othername}', gender = '{$gender}', email = '{$email}', ";
    $query .= " user_role = '{$userole}', password = '{$password}' WHERE user_id = $user_id ";
    
    $insert_update_user = mysqli_query($conn, $query);
    
    if (!$insert_update_user) {
    
    $globalError = "<p class='text-warning text-center'>Record not inserted check for error!</p>";
    
    }else {
    
    $globalMessage = "<h2 class='text-success text-center'>User Record Updated Succesfully!</h2>";

    redirect('viewusers.php?query-update=success');
    }

    }

    ?>

<?=  (isset($globalMessage)) ? $globalMessage : '' ?>
<div class="form-wrap">
    <form action="edituser.php" method="post" id="register-form">
            <div class="form-group">
                <label for="firstname" class="">First Name: <span style="color: red;">*</span></label>
                <input type="text" name="firstname" id="firstname" value="<?= $retVal = (!empty($firstname)) ? $firstname : '' ;?>" class="form-control" placeholder="first name">
                <span class="error text-danger" ><?php echo $firstnameErr = (!empty($firstnameErr)) ? $firstnameErr : ""; ?></span>
            </div>
            <div class="form-group">
                <label for="lastname" class="">Last Name:<span style="color: red;">*</span></label>
                <input type="text" name="lastname" id="lastname" value="<?= $retVal = (!empty($lastname)) ? $lastname : '' ;?>" class="form-control" placeholder="">
                <span class="error text-danger" ><?php echo $lastnameErr = (!empty($lastnameErr)) ? $lastnameErr : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="othername" class="">Other Name:</label>
                <input type="text" name="othername" id="othername" value="<?= $retVal = (!empty($othername)) ? $othername : '' ;?>" class="form-control" placeholder="">
                <span class="error text-danger" ><?php echo $othernameErr = (!empty($othernameErr)) ? $othernameErr : ""; ?></span>
            </div>

            
            <label for="gender">Gender:<span style="color: red;">*</span></label>
            <select name="gender" id="" class="form-control" id="gender">
             <option value="<?= $gender;?>"><?= ucfirst($gender);?></option>

            <?php  
            if (!empty($gender) AND $gender == "male") {

               echo "<option value='female'>Female</option>";
            }else{
                echo "<option value='male'>Male</option>";
            }
            ?>
            </select>
            <span class="error text-danger" ><?php echo $genderErr = (!empty($genderErr)) ? $genderErr : ""; ?></span>
            
            <div class="form-group">
                <label for="email" class="">Email:</label>
                <input type="email" name="email" id="email" value="<?= $retVal = (!empty($email)) ? $email : '' ;?>" class="form-control" placeholder="email">
                <span class="error text-danger" ><?php echo $emailErr = (!empty($emailErr)) ? $emailErr : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="class">User Role:<span style="color: red;">*</span></label>
                <select name="userole" id="" class="form-control" id="cause">
                <option value="<?= (!empty($user_role)) ? $user_role : '' ; ?>"> <?= (!empty($user_role)) ? $user_role : '' ; ?> </option>
                <?php  
            if (!empty($user_role) AND $user_role == "admin") {

               echo "<option value='user'>User</option>";
            }else{
                echo "<option value='admin'>Admin</option>";
            }
            ?>
            </select>
            <span class="error text-danger" ><?php echo $useroleErr = (!empty($useroleErr)) ? $useroleErr : ""; ?></span><br>

            <div class="form-group">
                <label for="password" class="">Password:<span style="color: red;">*</span></label>
                <input type="password" name="password" id="password" value="<?= $retVal = (!empty($password)) ? $password : '' ;?>" class="form-control" placeholder="password">
                <span class="error text-danger" ><?php echo $passwordErr = (!empty($passwordErr)) ? $passwordErr : ""; ?></span>
                <input type="hidden" name="id" value="<?= $user_id; ?>" id="id">
            </div>

            <input type="submit" value="UPDATE USER" name="submit" id="btn-register" class="btn btn-custom btnlg btn-block btn-primary">
        </form>
    </div>

<hr>

   <!-- /.row -->
   </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


        <!-- Footer -->
 <?php include 'includes/footer.php'; ?>
