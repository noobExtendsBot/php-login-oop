<?php
    /* ERROR CHECK LOGIN ID AND PASSWORD DURING FIRST LOGIN */
    
    $error_check["index"] = array("login_user");                /* CHECK IF LOGIN ID AND PASSWORD MATCH OR NOT */
    
    /* ERROR CHECK ADMIN ADD PAGE */

    $error_check["register"] = array("user_created");           /* AFTER A USER BEING CREATED */
    $error_check["register"] = array("password_match");         /* CHECK IF THE PASSWORD MATCH OR NOT */
    $error_check["register"] = array("password_short");         /* CHECK IF THE PASSWORD IS TOO SHORT OR NOT */
    $error_check["register"] = array("email_exists");           /* CHECK IF THE USER EXIST OR NOT */
    $error_check["register"] = array("name_short");             /* CHECK IF THE NAME IS TOO SHORT OR NOT */
    $error_check["register"] = array("mobile_no");              /* CHECK IF PHONE NUMBER IS VALID OR NOT */


?>
