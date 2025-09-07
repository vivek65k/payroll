

        <nav class="navbar navbar-expand-lg  navbar-dark bg-warning" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <?php
              $module=1;
              if(isset($_SESSION['current_module'])){
                $module= $_SESSION['current_module']['id'];
              }
               $sql= mysqli_query($conn,"select * from tabmenu where module_id=".$module);
               while ($row= mysqli_fetch_array($sql)) {
                ?>

              <li class="nav-item">
                <?php if (!empty($row['name'])){ ?>
                <a class="nav-link" href="<?php echo $row['name']; ?>.php"><?php echo $row['label']; ?> <span class="sr-only"></span></a>
              
              <?php }else{ ?>

             <a class="nav-link" href="index.php"><?php echo $row['label']; ?> <span class="sr-only"></span></a>
              </li>

              <?php } } ?>

              

<!--               <li class="nav-item active">
                <a class="nav-link active" href="#">Users <span class="sr-only"></span></a>
              </li>  -->
<!--                <li class="nav-item ">
                <a class="nav-link " href="#">Module Permission </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="#">Screen Permission </a>
              </li> -->
            </ul>
          </div>
        </nav>
