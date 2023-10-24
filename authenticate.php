<?php
session_start();

include_once( 'included/dbaccess/DBUtil.php' );
$con = getConnection();

$email = $_POST[ 'email' ];
$password = $_POST[ 'password' ];

$sql = "SELECT * FROM users WHERE email = '".$email."' and password = '".$password."'";

$result = $con->query( $sql );
$row = $result->fetch_assoc();

if ( isset( $_POST[ 'loginbtn' ] ) ) {

    if ( $row[ 'email' ] == $email && $row[ 'password' ] == $password ) {
        if ( $row[ 'Role' ] == 'admin' ) {
            header( 'Location: admin.php' );
        } else if ( $row[ 'Role' ] == 'user' ) {
            header( 'Location: users.php' );
        }

        $_SESSION[ 'id' ] = $row[ 'id' ];
        $_SESSION[ 'Role' ] = $row[ 'Role' ];
    } else {
        echo "<script>alert('Incorrect username or password!')</script>";
        echo "<script>window.location.href = 'landing.html?email=$email';</script>";
    }
}

closeConnection();
?>