<?php
$output = '';

if(isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $query = mysqli_query($con, "SELECT * FROM `inventory` WHERE `Description` LIKE '%$searchq%' OR `Assembly Code` LIKE '%$searchq%' OR `Equipment Code` LIKE '%$searchq%' OR `Sub-Assembly Code` LIKE '%$searchq%' OR `Vendor` LIKE '%$searchq%' OR `Vendor Part Number` LIKE '%$searchq%' OR `Manufacturer` LIKE '%$searchq%' OR `Manufacturer Part Number` LIKE '%$searchq%' OR `Comments` LIKE '%$searchq%'OR `Unit Price` LIKE '%$searchq%' OR `Technical Specifications` LIKE '%$searchq%'") or die ('<h1 style="text-align:center" class="display-4">Could Not Search!</h1>');
  $count = mysqli_num_rows($query);

  if ($count == 0) {
    $output ='<h1 style="text-align:center" class="display-4">No results found in the Inventory!</h1>';
  }else{
    $output = '
    <table class="table table-hover table-light">
    <tr>
      <th>Equipment Code</th>  
      <th>Assembly Code</th>
      <th>Sub-Assembly Code</th>
      <th>Description</th>
      <th>Vendor</th>
      <th>Vendor Part Number</th>
      <th>Manufacturer</th>
      <th>Manufacturer Part Number</th>
      <th>Link</th>
      <th>Inventory</th>
      <th>Technical Specifications</th>
      <th>Unit Price</th>
      <th>Comments</th>
      <th colspan="2">Action</th>
    </tr>';
    
    while ($row = mysqli_fetch_array($query)){
      $ec = $row['Equipment Code'];
      $ac = $row['Assembly Code'];
      $sac = $row['Sub-Assembly Code'];
      $desc = $row['Description'];
      $ven = $row['Vendor'];
      $evenpn = $row['Vendor Part Number'];
      $id = $row['id'];
      $emn = $row['Manufacturer'];
      $emnpn = $row['Manufacturer Part Number'];
      $elink = $row['Link'];
      $einv = $row['Inventory'];
      $eup = $row['Unit Price'];
      $ecom = $row['Comments'];
      $tech = $row['Technical Specifications'];
      ?>
      <?php $convLink = '<a href="'.$elink.'" target="_blank">'.$elink.'</a>';?>
      <?php
      $output .= '<tr>
      <td>'.$ec.'</td><td>'.$ac.'</td><td>'.$sac.'</td><td>'.$desc.'</td><td>'.$ven. '</td><td>'.$evenpn. '</td><td>'.$emn. '</td><td>'.$emnpn. '</td><td>'.$convLink. '</td><td>'.$einv. '</td><td>'.$tech. '</td><td>'.$eup. '</td><td>'.$ecom.'</td><td><a class="btn btn-warning" href= "index.php?edit='.$id.'">Edit</a></td>
      <td><a class="btn btn-danger" href="index.php?delete='.$id.'">Delete</a></td></tr>';
    }
    $output .= '</table>
                  </div>';
  }
}
?>