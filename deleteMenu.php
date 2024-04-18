<?php
include('function.php');

if(isset($_GET['id'])){
  $id = $_GET['id'];
  
  if($id > 0){
    $isDeleteSucceed = deleteMenu($id);
    
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
