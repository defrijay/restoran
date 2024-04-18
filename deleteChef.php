<?php
    include('function.php');

    if(isset($_GET['id_chef'])){
        $id = $_GET['id_chef'];
        
        if($id > 0){
            $isDeleteSucceed = deleteChef($id);  
            
            if($isDeleteSucceed > 0){
                echo "<script>
                        alert('Delete Success!');
                        window.location.href = 'admin.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Delete Failed!');
                        window.location.href = 'admin.php';
                      </script>";
            }
        }
    }
?>
