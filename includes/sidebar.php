        <!--**********************************
            Sidebar start
        ***********************************-->

        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Home</li>
                    <?php 
                     $query="select * from modules ORDER by sort";
                     $run= mysqli_query($conn,$query);
                     $modules=array();
                     while ($row=mysqli_fetch_array($run)) {
                        $modules[$row['menu']][]=$row;
                        
                    } 
                    $currentSegment= basename(trim($_SERVER['REQUEST_URI'],'/'));
                 
                    foreach($modules as $key =>$value){ 

                        $isActive= false;
                        foreach($value as $item){
                            if($currentSegment== $item['module']){
                                $isActive= true;
                                break;

                            }

                        }

                    ?>
                    


                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="<?php echo $isActive? 'true':'false'?>">
                            <i class="fa <?php echo $value[0]['icon'];?>" aria-hidden="true"></i> <span class="nav-text"><?php echo $key; ?></span>
                        </a>
                        <?php  for($i=0 ; $i< count($value); $i++){ ?>
                        <ul aria-expanded="true" class="<?php echo $isActive? 'collaspe in':''?>">
                            <li><a class="<?php echo ($value[$i]['module']==$currentSegment)? 'active':''?>" href="<?php echo $base_url;?>modules/<?php echo $value[$i]['module'];?>"><?php echo $value[$i]['label'];?></a></li>
                           
                        </ul>
                         <?php }?>
                    </li>
                    <?php } ?>


                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
