<?php include "includes/header.php";?>
<?php //checkIfUserLogin(); ?>
    <div id="wrapper">

    <?php isUsreSignIn(); ?>

        <!-- Navigation -->
        <?php include "includes/nav.php";?>

        <?php
            if(isset($_GET["query-update"])){
                $message = "<h4 class='text-success'>Record Updated Successfully</h4>";
            }
        ?>

        <?php
        if (isset($_GET["id"])) {

            $stu_id = mysqli_escape_string($conn, $_GET["id"]);
            
                $query = "DELETE FROM `tblstudents` WHERE stu_id = $stu_id";

                $delete_student = mysqli_query($conn, $query);
            
                if ($delete_student) {

                    $message = "<p class='text-success'> Record Deleted Successfully! </p>";

                    header("Location: viewstudents.php");
                }else{
                    $message = "Record did no deleted";
                }          
             }
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         STUDENT RECORDS
                            <small></small>
                        </h1>
                        <?= $retVal = (!empty($message)) ? $message : '' ; ?>
                        <div class="col-xs-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>OTHER NAME</th>
                                    <th>GENDER</th>
                                    <th>PHONE NUMBER</th>
                                    <th>CAUSE</th>
                                    <th>CLASS</th>
                                    <th>EX. DATE</th>
                                    <th>DATE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                    <th>PRINT ID</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
                    <?php 

                        $query = "SELECT * FROM tblstudents ORDER BY stu_id DESC";

                        $select_all_students = mysqli_query($conn, $query);

                        confirmQueryExc($select_all_students);

                        if(mysqli_num_rows($select_all_students) > 0){

                            while($row = mysqli_fetch_assoc($select_all_students)){
                                $stu_id     = $row['stu_id'];
                                $firstname  = $row['firstname'];
                                $lastname   = $row['lastname'];
                                $othername  = $row['othername'];
                                $gender     = $row['gender'];
                                $phonenumber= $row['phonenumber'];
                                $couse      = $row['couse'];
                                $stu_class  = $row['stu_class'];
                                $exp_date  = $row['exp_date'];
                                $created_at = $row['created_date'];
             
                                echo "<tr>";

                                echo "<td>{$stu_id}</td>";

                                // display edited user

                                if (isset($_GET['u_id']) and $_GET['u_id'] === $user_id) {

                                echo "<td style='color: blue'>{$firstname}</td>";
                                }else{

                                    echo "<td>{$firstname}</td>";
                                }
                                
                                echo "<td>{$lastname}</td>";
                                echo "<td>{$othername}</td>";
                                echo "<td>{$gender}</td>";
                                echo "<td>{$phonenumber}</td>";
                                // echo "<td><img width='100' height='50' src='../images/{$user_image}' alt='image'></td>";
                                echo "<td>{$couse}</td>";
                                echo "<td>{$stu_class}</td>";
                                echo "<td>{$exp_date}</td>";
                                echo "<td>{$created_at}</td>";
                                echo "<td><a href='edit_student.php?id={$stu_id}' class='btn btn-warning'>Edit</a></td>";
                                echo "<td><a onClick='return confirm(\"Are you sure, you want to Delete!\")' href='viewstudents.php?id={$stu_id}' class='btn btn-danger'>Delete</a></td>";
                                echo "<td><a href='print_stu_id.php?id={$stu_id}' class='btn btn-success fa fa-print'> Print </a></td>";
                                echo "</tr>";
                            }
                        }else{
                            echo "<h2 class='No Student Available</h2>'>";
                        }

                    ?>
                                </tbody>
                            
                           </table>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- footer-->
    <?php include "includes/footer.php";?>
