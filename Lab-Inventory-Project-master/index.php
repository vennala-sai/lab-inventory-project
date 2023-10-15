
<!DOCTYPE html>

<html lang="en">
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <title>Inventory</title>
      <link rel="icon" href="logo-new-icon.png" type="image/gif" sizes="16x16">
  </head>

  <?php
    require('config_db.php');
    require('search.php');
    require('implement.php');
  ?>

  <body>

    <?php
      if (isset($_SESSION['message'])){ ?>
        <div class = "alert alert-<?=$_SESSION['msg_type']?> alert-dismissible"> 
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            session_unset();
          ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }
    ?>
      


    <div class="container-fluid">
      <nav class="navbar sticky-top navbar-light bg-light">
        <p style="text-align:center">
          <a class="navbar-brand" href="index.php">
            <img src="logo-new.png" width="300" height="50" alt="" loading="lazy">
          </a>
        </p>

        <form class="form-inline" action = "index.php" method = "post">
          <input class="form-control mr-sm-2" type = "text" name = "search" width="300" height="50" id="navBarSearch" placeholder = "Search database" />
          <button class="btn btn-info my-2 my-sm-0" type = "submit" value = "Search">Search</button>
        </form>
      </nav>
      <br>

      <?php
        if (!isset($_GET['delete'])){
          if (isset($_GET['edit'])){ ?>
            <p style="text-align:center">
              <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" disabled>Add New Record</button>
            </p>
            <div class="collapse show" id="collapseExample">
            <?php
          }else{?>
            <p style="text-align:center">
              <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add New Record</button>
            </p>
            <div class="collapse" id="collapseExample">
            <?php
          } ?>

              <div class="shadow-lg p-3 mb-5 bg-white rounded">    
                <form id = "submitform" action = "" method = "POST">
                  <input type = "hidden" name = "id" value="<?php echo $id; ?>">
                  <div class="row">
                    <div class = "col">
                      <label>Equipment Code</label>
                      <input class="form-control" type = "text" name = "EC" value = "<?php echo $ec; ?>" placeholder = "Enter Equipment Code">
                    </div>

                    <div class = "col">
                      <label>Assembly Code</label>
                      <input class="form-control" type = "text" name = "ac" value = "<?php echo $ac; ?>" placeholder = "Enter Assembly Code">
                    </div>
                  
                    <div class = "col">
                      <label>Sub-Assembly Code</label>
                      <input class="form-control" type = "text" name = "sac" value = "<?php echo $sac; ?>" placeholder = "Enter Sub-Assembly Code">
                    </div>
                  </div>
                    <div class = "form-group">
                      <label>Description</label>
                      <input class="form-control" type = "text" name = "description" value = "<?php echo $d; ?>" placeholder = "Enter Description">
                    </div>

                    <div class = "form-group">
                      <label>Technical Specifications</label>
                      <input class="form-control" type = "text" name = "techspec" value = "<?php echo $tech; ?>" placeholder = "Enter Technical Specifications">
                    </div>
                  <div class = "row">
                    <div class = "col">
                      <label>Vendor</label>
                      <input class="form-control" type = "text" name = "vendor" value = "<?php echo $ven; ?>" placeholder = "Enter Vendor">
                    </div>

                    <div class = "col">
                      <label>Vendor Part Number</label>
                      <input class="form-control" type = "text" name = "vpn" value = "<?php echo $evenpn; ?>" placeholder = "Enter Vendor Part Number">
                    </div>
                  </div>
                  <div class = "row">
                    <div class = "col">
                      <label>Manufacturer</label>
                      <input class="form-control" type = "text" name = "manufac" value = "<?php echo $emn; ?>" placeholder = "Enter Manufacturer">
                    </div>
                    <div class = "col">
                      <label> Manufacturer Part Number</label>
                      <input class="form-control" type = "text" name = "mnpn" value = "<?php echo $emnpn; ?>" placeholder = "Enter Manufacturer Part Number">
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class = "col">
                      <label>Inventory</label>
                      <input class="form-control" type = "text" name = "i" value = "<?php echo $einv; ?>" placeholder = "Enter Inventory">
                    </div>

                    <div class = "col">
                      <label>Unit Price</label>
                      <input class="form-control" type = "text" name = "unitp" value = "<?php echo $eup; ?>" placeholder = "Enter Unit Price">
                    </div>
                  </div>
                    <div class = "form-group">
                      <label>Link</label>
                      <input class="form-control" type = "text" name = "l" value = "<?php echo $elink; ?>" placeholder = "Enter Link">
                    </div>

                    <div class = "form-group">
                      <label>Comments</label>
                      <input class="form-control" type = "text" name = "comm" value = "<?php echo $ecom; ?>" placeholder = "Enter Comments">
                    </div>
                    <div>
                      <?php
                        if ($update == true){?>
                          <button class="btn btn-success" type = "submit" name = "update">Update</button>
                          <?php
                        }else{?>
                          <button class="btn btn-success" type = "submit" name = "save">Save</button>
                          <?php
                        }
                      ?>
                    </div>
                </form>
              </div>
            <!-- div tag for sticky bar (below)-->
            </div> 
              <?php
                echo '<br>';
                print($output);
        }else{?>
          <p style="text-align:center"><a class="btn btn-dark" href = "index.php" role="button" style="text-align:center">Back to Home Screen</a></p>
          <?php
        }?>
    <!-- div tag for full page -->
    </div>
    <br>
    <br>
    <div class="shadow-md p-3 mb-5 bg-white rounded">
      <footer>
      <div class="text-center">
        <p class="font-weight-light" >&copy; <?php echo date('Y'); ?> Questron Technologies Corp.</p>
      </div>
      </footer>
    </div>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
      }
      td, th {
        
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>