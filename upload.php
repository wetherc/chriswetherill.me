<?php
require_once('header.php');
?>

<div class="item" id="light">
                <div class="entry">

<?php
if( isset( $_POST["Upload"] ) )
{
    $target_path = "assets/";

    $target_path = $target_path . basename( $_FILES['filename']['name']); 

    if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path)) {
        echo "The file ".  basename( $_FILES['filename']['name']). " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
}
?>

<form action="upload" method="post" enctype="multipart/form-data">
<h3>Please select a file to upload</h3>
File: <input type="file" name="filename" />
<input type="submit" value="Upload" name="Upload" />
</form>

<p>Only one file may be uploaded at a time. If upload was successful, you will see a confirmation message appear at the top of the page. If there is an error in uploading, please reference the information included below:</p>
<p><?php print_r($_FILES);?></p>
<p>Max upload filesize: <?php echo ini_get('upload_max_filesize'); ?></p>
<p>Max post filesize: <?php echo ini_get('post_max_size'); ?></p>
</div>
</div>

<?php
require_once('footer.php'); 
?>