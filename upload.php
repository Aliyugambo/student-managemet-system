
    <?php 
            
       if(isset($_POST['submit2'])&& isset($_FILES['my_image'])){

             // echo "<pr>";
             // echo "</pre>";
             // print_r($_FILES['my_image']);

             $img_name = $_FILES['my_image']['name'];
             $img_size =  $_FILES['my_image']['size'];
             $tmp_name =  $_FILES['my_image']['tmp_name'];
             // $error =  $_FILES['my_image']['error'];

             if($error ==0 ){

                     if($img_size >1250000){

                          echo "Sorry, your file is to large.";
                          // header("Location: add-students.php?error=$em");

                     }else{
                       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                       $img_ex_lc = strtolower($img_ex);

                       $allowed_exs = array("jpg","jpeg","png");

                       if(in_array( $img_ex_lc, $allowed_exs)){

                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        //inserting image into database

                        $sql="INSERT INTO images(image_url) VALUES(:new_img_name)";
                        $query = $dbh->prepare($sql);
                        // $em = "image successfully uploaded.";
                        // header("Location:add-students.php");
                        $query->bindParam(':new_img_name', $new_img_name,PDO::PARAM_STR);
                        $query->execute();
                        
                       }else{
                        $em = "You cant Upload file of this type";
                        header("Location: add-students.php?error=$em");
                       }
                     }

             }else{
                $em = "unknown error occured!";
                header("Location: add-students.php?error=$em");

             }

       } else{
            $em= "image successfully upload.";
           header("Location: add-students.php");
       }    

     ?>
