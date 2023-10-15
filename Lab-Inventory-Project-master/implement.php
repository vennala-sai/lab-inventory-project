<?php

// session_start();

require('config_db.php');

$ec = '';

$description = '';
$techspec = '';
$vendor = '';
$partnumber = '';
$vendorpn = '';
$manufacture = '';
$manufacturepn = '';
$tech = '';
$acp = '';
$sacp = '';
$link = '';
$inv = '';
$up = '';
$comments = '';

$d = '';
$emn = '';
$emnpn = '';
$evenpn = '';
$ven = '';
$ac = '';
$sac = '';
$emn = '';
$emnpn = '';
$elink = '';
$einv = '';
$eup = '';
$ecom = '';

$update = false;
$id = 0;



if (isset($_POST['save'])){
    $ec = $_POST['EC'];
    $description = $_POST['description'];
    $techspec = $_POST['techspec'];
    $vendor = $_POST['vendor'];
    $manufacture = $_POST['manufac'];
    $manufacturepn = $_POST['mnpn'];
    $vendorpn = $_POST['vpn'];
    $acp = $_POST['ac'];
    $sacp = $_POST['sac'];
    $link = $_POST['l'];
    $inv = $_POST['i'];
    $up = $_POST['unitp'];
    $comments = $_POST['comm'];

    if (isset($ec)){
        $query = mysqli_query($con,"INSERT INTO `inventory`(`Equipment Code`, `Assembly Code`, `Sub-Assembly Code`, `Description`, `Vendor`, `Vendor Part Number`, `Manufacturer`, `Manufacturer Part Number`, `Link`, `Inventory`, `Technical Specifications`, `Unit Price`, `Comments`) VALUES ('$ec','$acp','$sacp', '$description', '$vendor', '$vendorpn', '$manufacture', '$manufacturepn', '$link', '$inv', '$techspec', '$up', '$comments')") or die ("Save Failed!");
        
        $_SESSION['message'] = "Record has been added to the inventory!";
        $_SESSION['msg_type'] = "success";
    
    }
}
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    $query = mysqli_query($con,"DELETE FROM `inventory` WHERE `id`LIKE '%$id%'") or die ('<h1 style="text-align:center" class="display-4">Delete Failed!</h1>');

    $_SESSION['message'] = "Record has been deleted from the inventory!";
    $_SESSION['msg_type'] = "danger";

}


if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = mysqli_query($con," SELECT * FROM `inventory` WHERE id=$id") or die ('<h1 style="text-align:center" class="display-4">Edit Failed!</h1>');
    
    if ($result->num_rows){
        $row = mysqli_fetch_assoc($result);
        $d = $row['Description'];
        $tech = $row['Technical Specifications'];
        $ven = $row['Vendor'];
        $evenpn = $row['Vendor Part Number'];
        $ec = $row['Equipment Code'];
        $ac = $row['Assembly Code'];
        $sac = $row['Sub-Assembly Code'];
        $emn = $row['Manufacturer'];
        $emnpn = $row['Manufacturer Part Number'];
        $elink = $row['Link'];
        $einv = $row['Inventory'];
        $eup = $row['Unit Price'];
        $ecom = $row['Comments'];
        
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];

    $ec = $_POST['EC'];
    $description = $_POST['description'];
    $techspec = $_POST['techspec'];
    $vendor = $_POST['vendor'];
    $manufacture = $_POST['manufac'];
    $acp = $_POST['ac'];
    $sacp = $_POST['sac'];

    $manufacturepn = $_POST['mnpn'];
    $vendorpn = $_POST['vpn'];
    $link = $_POST['l'];
    $inv = $_POST['i'];
    $up = $_POST['unitp'];
    $comments = $_POST['comm'];

    $query = mysqli_query($con, "UPDATE `inventory` SET `Equipment Code`='$ec', `Assembly Code`='$acp',`Sub-Assembly Code`='$sacp',`Description`='$description', `Vendor`='$vendor', `Vendor Part Number`='$vendorpn',`Manufacturer`='$manufacture',`Manufacturer Part Number`='$manufacturepn',`Link`='$link',`Inventory`='$inv', `Technical Specifications`='$techspec', `Unit Price`='$up',`Comments`='$comments' WHERE `id`LIKE '%$id%'") or die ('<h1 style="text-align:center" class="display-4">Update Failed!</h1>');
    $_SESSION['message'] = "Record has been successfully updated!";
    $_SESSION['msg_type']="warning";
}
?>