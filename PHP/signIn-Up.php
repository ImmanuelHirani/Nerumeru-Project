<?php


include "conn.php";

// --------------------Sign Up User------------------------

function signUp_user($data) {
    global $conn;

    $username = $data['uname'];
    $pass = $data['pass'];
    $email = $data['em'];
    $tlpn = $data['tlp'];

    $query = "SELECT * FROM user_neru WHERE Username = '$username' ";

    $run = mysqli_query($conn,$query);
    $cek = mysqli_num_rows($run);

    if($cek == 0 ){
        $query2 = "INSERT INTO user_neru VALUES ('', '$username', '$email', MD5('$pass'), '$tlpn')";

        mysqli_query($conn, $query2);
        return mysqli_affected_rows($conn);
    }
    
}

// --------------------Sign In User------------------------

function signIn_user($data) {
    global $conn;
    
    $inUsEm = mysqli_real_escape_string($conn, $data['inUsEm']); // menghindari SQL Injection
    $inPass = md5($data['inPass']);

    $query = "SELECT * FROM user_neru WHERE (BINARY Username = '$inUsEm') AND Password='$inPass'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 1){ // cek jumlah baris data yang ditemukan
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user['Username'];
        $_SESSION['id_user'] = $user['id_user'];
        return true;
    } else {
        return false;
    }
}
?>