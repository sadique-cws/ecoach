<?php 
$conn = new mysqli("localhost","root","","ecoach");

session_start();


if($conn->connect_error){
    echo "fail";
}




function redirect($page){
    echo "<script>window.open('$page','_self')</script>";
}


function alert($msg){
    echo "<script>alert('$msg')</script>";
}

function insertData($table, $data){
    global $conn;

    $cols = implode(",", array_keys($data));
    $values = implode("','", $data);

    $q = $conn->query("insert into $table ($cols) value ('$values')");

    return $q;
}

function callingData($table, $cond = NULL){
    global $conn;

    if($cond == NULL){
        $query = "select * from $table";
    }
    else{
        $query = "select * from $table WHERE $cond";
    }

    $q = $conn->query($query);
    $data = $q->fetch_all(MYSQLI_ASSOC);

    return $data;
}



// delete function 
function deleteRecord($table, $cond){
    global $conn;

    $q = $conn->query("DELETE from $table WHERE $cond");

    return $q;
}

// count function
function countRecords($table, $cond = NULL){
    global $conn;

    if($cond == NULL){
        $q = "select * from $table";
    }
    else{
        $q  = "select * from $table WHERE $cond";
    }

    $result = $conn->query($q);
    $count = $result->num_rows;

    return $count;
}

// student approve

function approveStudent($roll){
    global $conn;
    $query = $conn->query("UPDATE students SET status='1' WHERE roll='$roll' AND status='0'");

    return $query;
}


// for disabled student 

function disableStudent($roll){
    global $conn;
    $query = $conn->query("UPDATE students SET status='2' WHERE roll='$roll' AND status='1'");

    return $query;
}


// check if admin logged on not

function checkAdmin(){
    if(!isset($_SESSION['admin'])){
        redirect('login.php');
    }
}


function getUser(){ 
    global $conn;
    if(!isset($_SESSION['student'])) return null;
    
    $email = $_SESSION['student'];

    $user = callingData("students", "email='$email'");
    
    return $user[0];
}


?>