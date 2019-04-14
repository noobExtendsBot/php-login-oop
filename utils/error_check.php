<?php
    /* ERROR CHECK LOGIN ID AND PASSWORD DURING FIRST LOGIN */
    
    $error_check["index"] = array("login_user");   /* CHECK IF LOGIN ID AND PASSWORD MATCH OR NOT */


    /* ERROR CHECK ADMIN ADD PAGE */

    $error_check["register"] = array("user_created"); /* AFTER A USER BEING CREATED */
    $error_check["register"] = array("password_match"); /* CHECK IF THE PASSWORD MATCH OR NOT */
    $error_check["register"] = array("password_short"); /* CHECK IF THE PASSWORD IS TOO SHORT OR NOT */
    $error_check["register"] = array("email_exists"); /* CHECK IF THE USER EXIST OR NOT */
    $error_check["register"] = array("name_short"); /* CHECK IF THE NAME IS TOO SHORT OR NOT */
    $error_check["register"] = array("mobile_no");  /* CHECK IF PHONE NUMBER IS VALID OR NOT */

    /* ERROR CHECK ON USER HOME PAGE */
    $error_check['home'] = array('form_submitted'); /* CHECK IF USER HAS SUBMITED THE FORM OR NOT */

    /* ERROR CHECK FOR USER SUBMITTED FEEDBACK FORM */
    $error_check["home"] = array("services"); /* CHECK IF THE USER HAS SELECTED ANY SERVICES OR NOT */




?>