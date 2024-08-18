<?php include 'includes/header.php' ?>
<?php // checkIfUserLogin(); ?>
    <div id="wrapper">

    <?php isUsreSignIn(); ?>

    <!-- Navigations -->
 <?php include 'includes/nav.php'?>

<?php
if (isset($_GET['id'])) {
    
    $stu_id = $_GET['id'];

    $query = "SELECT * FROM tblstudents WHERE stu_id = $stu_id";

    $select_student = mysqli_query($conn, $query);
    confirmQueryExc($select_student);

    if(mysqli_num_rows($select_student) > 0){

        while($row = mysqli_fetch_assoc($select_student)){
            $stu_id     = $row['stu_id'];
            $firstname  = $row['firstname'];
            $lastname   = $row['lastname'];
            $othername  = $row['othername'];
            $gender     = $row['gender'];
            $phonenumber= $row['phonenumber'];
            $cause      = $row['couse'];
            $stu_class  = $row['stu_class'];
            $exp_date = $row['exp_date'];
            $created_at = $row['created_date'];
            $stu_img = $row['stu_img'];
        }
    }
}
?>


<section>
<div class="id-card" id="id-card">
<link rel="stylesheet" href="css/style.css">
    <!-- Header -->
    <div class="header">FEDERAL POLYTECHNIC MUBI</div>
    <div class="sub-header">P.M.B 35 MUBI ADAMAWA STATE</div>

    <!-- Content -->
    <div class="content">
        <div class="photo">
            <img src="/id-card/img/<?= $stu_img;?>" alt="Student Photo">
        </div>
        <h5 class="value"><?= strtoupper($firstname) . " " . strtoupper($lastname); ?></h5>
        <h5><span>Add No: </span>ST/ADD/<?= mt_rand(1, 1000)?></h5>
        <p class="lblvalue"><span class="label">Cause: </span> <?= ucfirst($cause); ?></p>
        <p class="lblvalue"><span class="label">Class: </span> <?=  $stu_class; ?></p>
        <p class="lblvalue"><span class="label">Phone: </span> <?= $phonenumber; ?></p>
        <p class="lblvalue"><span class="label">Sex: </span> <?= ucfirst($gender); ?></p>
        <p class="lblvalue"><span class="label">Expired Date: </span><?= $exp_date;?></p>
        <!-- Footer -->
    </div>
    <div class="footer"></div>
</div><br>
<button onclick="printId()"><a href="" class="btn btn-success fa fa-print"> Print</a></button>
</section>

<script >

    function printId(){

        const originalContent = document.body.innerHTML;
        const printContent = document.getElementById('id-card').outerHTML;
        document.body.innerHTML = printContent; 
        window.print();
        document.body.innerHTML =originalContent
        Location.reload();

        <?php 
            if (isset( $_GET["id"])) {
                $stu_id = mysqli_escape_string($conn, $_GET["id"]);
                $printed_date = date('m-d-y');
                $query = "INSERT INTO tblprint (stu_id, user_id, printed_date) VALUE ($stu_id, 1, '$printed_date')";
                $insert_query = query( $query );
                confirmQueryExc( $query);
            }
        ?>
    }
</script>
<?php include 'includes/footer.php'; ?>
