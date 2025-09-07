  

        <!--**********************************
            Sidebar start
        ***********************************-->


<?php 
  try{
       $username = $_SESSION['username'];
       if(!$username){
        throw new Exception("User not logged in");        
       }

      // 1. get users role
       
       $userQuery= mysqli_query($conn,"select role from admin where username='$username'");
       if(!$userQuery){
         throw new Exception("Failed to fetch user:". mysqli_error($conn));         
       }
       $userData= mysqli_fetch_assoc($userQuery);
       $role= $userData['role'];
        if(!$role){
         throw new Exception("Role not found for users:");         
       }


    if ( $role!="1"){
            // 2. get Allowed module_id for the role
             
             $roleQuery= mysqli_query($conn,"select module_id from roles where id='$role'");    
              if(!$roleQuery){
                 throw new Exception("Failed to fetch role:". mysqli_error($conn));         
               }  
                $roleData= mysqli_fetch_assoc($roleQuery);
                $allowedModule= json_decode($roleData['module_id']??'[]',true);
              if(!is_array($allowedModule)){
                 throw new Exception("Invalid module_id format:");         
               }  

               $allowedIds =implode(",", array_map('intval', $allowedModule));
                if(empty($allowedIds)){
                 throw new Exception("No role assigned to this role");         
               }  

             // 3. fetch only allowd modules
              $query= mysqli_query($conn,"select * from modules where id in($allowedIds) ORDER by sort ");

      }else{
        $query= mysqli_query($conn,"select * from modules ORDER by sort ");
      }            


        if(!$query){
          throw new Exception("Failed to fetch modules:". mysqli_error($conn));        
       } 


       $modules=[];
       while($row=mysqli_fetch_assoc($query)) {
        $modules[$row['menu']][]=$row;
       }

    $currentSegment= basename(trim($_SERVER['REQUEST_URI'],'/'));
?>
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <div class="">
                 <form action="#">
                     <input type="text" class="form-control" placeholder="Search">
                  </form>
                </div>
                <ul class="metismenu" id="menu">
                    <!-- <li class="nav-label">Home</li> -->
                    <?php 
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
                            <li>
                                <a class="<?php echo ($value[$i]['module']==$currentSegment)? 'active':''?>" href="<?php echo $base_url;?>modules/<?php echo $value[$i]['module'];?>" onclick="storeModule('<?php echo $value[$i]['module']; ?>')"                            
                                    ><?php echo $value[$i]['label'];?></a>
                            </li>
                           
                        </ul>
                         <?php }?>
                    </li>
                    <?php } ?>


                </ul>
            </div>
        </div>


<script>
    function storeModule(moduleName){
       
        fetch('<?php echo $base_url;?>store_module.php',{
            method:'POST',
            headers:{
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:'module='+encodeURIComponent(moduleName)
        });
    }
</script>
<?php    
}catch(Exception $e){

    echo $e->getMessage();
}
?>
        <!--**********************************
            Sidebar end
        ***********************************-->
