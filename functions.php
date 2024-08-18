<?php

//===== DATABASE HELPER =====//
function escapeString($str){
    global $conn;
    return mysqli_real_escape_string($conn, trim($str));
}

//confirmQuery
function confirmQueryExc($result){
    global $conn;
    if(!$result){
        die("QUERY FAILED".mysqli_error($conn));
    }
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    confirmQueryExc($result);
    return $result;
}

function redirect($location){
    header('Location: '.$location);
}

function fetch_record($result){
    return mysqli_fetch_assoc($result);
}

function count_result($result){
    return mysqli_num_rows($result);
}
//===== END DATABASE HELPER =====//


// Functions to filter user inputs
function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}  


//function to filter email
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}

//filter string
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    } else{
        return FALSE;
    }
}


function is_logged_in(){
    if (isset($_SESSION['user_role']) && isset($_SESSION['user_email'])) {
      return true;
    }else{
        return false;
    }
}

function checkIfUserLogin (){
if (isset($_SESSION['user_role'])){
    return true;
}else {
    return false;
}
}

function isUsreSignIn(){
    
    if (!isset($_SESSION['status']) AND $_SESSION['status'] != 1) {

        header('Location: login.php');
      }
}
