<?php include "includes/header.php";?>
<?php //checkIfUserLogin(); ?>
    <div id="wrapper">

    <?php isUsreSignIn(); ?>

  <!-- Navigation -->
        <?php include "includes/nav.php";?> 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         PRINTED ID CARD RECORDS
                            <small></small>
                        </h1>

                        <div class="col-xs-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FIRSTNAME</th>
                                    <th>LASTNAME</th>
                                    <th>OTHER NAME</th>
                                    <th>GENDER</th>
                                    <th>PRINTED DATE</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                    <?php 
                     $query = "SELECT  s.firstname, s.lastname, s.othername, s.gender, s.couse, p.printed_date, p.print_id FROM tblprint as p INNER JOIN tblstudents as s ON s.stu_id=p.stu_id";

                     $select_all_printed_id = mysqli_query($conn, $query);
                     confirmQueryExc($select_all_printed_id);
                 
                    if (mysqli_num_rows($select_all_printed_id) > 0) {

                    while($row = mysqli_fetch_array($select_all_printed_id)) {
                    $print_id  = $row['print_id'];
                    $firstname  = $row['firstname'];
                    $lastname   = $row['lastname'];
                    $othername  = $row['othername'];
                    $gender     = $row['gender'];
                    $cause      = $row['couse'];
                    $printed_date  = $row['printed_date'];
     
                    echo "<tr>";

                    echo "<th>$print_id</th>";
                    echo "<td>{$firstname}</td>";
                    echo "<td>{$lastname}</td>";
                    echo "<td>{$othername}</td>";
                    echo "<td>{$gender}</td>";
                    echo "<td>{$printed_date}</td>";
                                       
                    echo "</tr>";
                }
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
