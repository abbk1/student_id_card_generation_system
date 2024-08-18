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

            $stu_id = mysqli_escape_string($conn, $_GET["id"]);

            $query = "SELECT * FROM `tblstudents` WHERE stu_id = $stu_id";
            $select_students = mysqli_query($conn, $query);
            confirmQueryExc($select_students);

            if(mysqli_num_rows($select_students) > 0) { 
                while($row = mysqli_fetch_assoc($select_students)) {
                    $stu_id = $row["stu_id"];
                    $firstname = $row["firstname"];
                    $lastname = $row["lastname"];
                    $othername = $row["othername"];
                    $gender = $row['gender'];
                    $phonenumber = $row['phonenumber'];
                    $couse = $row['couse'];
                    $stu_class = $row['stu_class'];
                    // $stu_img = $row['stu_img'];
                    // $user_role = $row['user_role'];
                }
            } else {
                echo "";
            }

            // header("Location: edituser.php?id=$user_id");
        }


if (isset($_POST['submit'])) {

    $globalError = "";
    $globalMessage = "";

    $student_id = mysqli_escape_string($conn, $_POST['id']);
    $firstname = mysqli_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_escape_string($conn, $_POST['lastname']);
    $othername = mysqli_escape_string($conn, $_POST['othername']);
    $gender = mysqli_escape_string($conn, $_POST['gender']);
    $phonenumber = mysqli_escape_string($conn, $_POST['phonenumber']);
    $stu_class = mysqli_escape_string($conn, $_POST['stu_class']);

    $query = "UPDATE tblstudents SET firstname = '{$firstname}', lastname = '{$lastname}', ";
    $query .= " othername = '{$othername}', gender = '{$gender}', phonenumber = '{$phonenumber}', ";
    $query .= " stu_class = '{$stu_class}' WHERE stu_id = $student_id ";
    
    $insert_update_stu = mysqli_query($conn, $query);
    
    if (!$insert_update_stu) {
    
    $globalError = "<p class='text-warning text-center'>Record not updated check for error!</p>";
    
    }else {
    
    $globalMessage = "<h2 class='text-success text-center'>Student Record Updated Succesfully!</h2>";

    redirect('viewstudents.php?query-update=success');
    }

    }

    ?>

<?=  (isset($globalMessage)) ? $globalMessage : '' ?>
<div class="form-wrap">
    <form action="edit_student.php" method="post" id="register-form">
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

            <div class="form-group">
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
            </div>
            <span class="error text-danger" ><?php echo $genderErr = (!empty($genderErr)) ? $genderErr : ""; ?></span>

            <div class="form-group">
            <label for="class">Phone Number:<span style="color: red;">*</span></label>
            <input type="number" name="phonenumber" id="phonenumber" value="<?= $phonenumber = (!empty($phonenumber)) ? $phonenumber : '' ;?>" class="form-control" placeholder="08021212121">
            <span class="error text-danger" ><?php echo $emailErr = (!empty($phonenumberErr)) ? $phonenumberErr : ""; ?></span>
            </div>
            <span class="error text-danger" ><?php echo $phonenumberErr = (!empty($phonenumberErr)) ? $phonenumberErr : ""; ?></span><br>

            <div class="form-group">
            <label for="class">Student Class:<span style="color: red;">*</span></label>
                <select name="stu_class" id="" class="form-control" id="stu_class">
                <option value="<?= (!empty($stu_class)) ? $stu_class : '' ; ?>"><?= (!empty($stu_class)) ? $stu_class : '' ; ?></option>
                <option value="SS_ONE_A">SS ONE A</option>
                <option value="SS_ONE_B">SS ONE B</option>
                <option value="SS_TWO_A">SS TWO A</option>
                <option value="SS_TWO_B">SS TWO B</option>
                <option value="SS_THREE_A">SS THREE A</option>
                <option value="SS_THREE_B">SS THREE B</option>
            </select>
            <span class="error text-danger" ><?php echo $stu_classErr = (!empty($stu_classErr)) ? $stu_classErr : ""; ?></span>
            <input type="hidden" name="id" value="<?= $stu_id;?>">
            </div>

            <input type="submit" value="UPDATE STUDENT" name="submit" id="btn-register" class="btn btn-custom btnlg btn-block btn-primary">
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
