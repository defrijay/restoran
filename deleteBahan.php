<?php
include('function.php');

if(isset($_GET['id_bahan'])){
    $id = $_GET['id_bahan'];
    
    if($id > 0){
        $isDeleteSucceed = deleteBahan($id);
        
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
