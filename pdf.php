<?php 
    include_once "config/core.php";
    include_once "config/database.php";
    include_once "objects/user.php";
    include_once "tcpdf/tcpdf.php";

    if(!isset($_SESSION['designation'])){
        header("Location: index.php");
    }
    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 1){
        header("Location: home.php");
    }
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $stmt = $user->getUserList();
    $num = $stmt->rowCount();
    
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("List of users in PDF format");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 15);  
    $pdf->SetFont('helvetica', '', 12);  
    $pdf->AddPage();  
    $output = '';  
    $output .= '  
    <h3 align="center">List of users</h3><br /><br />  
    <table border="1" cellspacing="0" cellpadding="5">  
        <tr>  
            <th width="25%"> <strong>Full Name</strong> </th>  
            <th width="25%"> <strong>Email ID</strong> </th>  
            <th width="25%"> <strong>Mobile</strong> </th>  
            <th width="25%"> <strong>Deg Role</strong> </th>  
        </tr>  
    '; 
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $output .= '<tr>  
                          <td>'.$row["FullName"].'</td>  
                          <td>'.$row["Email"].'</td>  
                          <td>'.$row["Mobile"].'</td>   
                          <td>'.$row["DegRole"].'</td>  
                     </tr>  
                          ';  
    }  
    $output .= '</table>';  
    $pdf->writeHTML($output);  
    $pdf->Output('user.pdf', 'I');  



?>