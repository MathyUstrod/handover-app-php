<?php

    // $filename = basename(($_FILES["photo"]["name"]));
    // $location = "uploads/".$filename;

    // if(move_uploaded_file($_FILES["photo"]["tmp_name"],$location)){
    //     echo "<p>File uplodaed successfully!</p>";
    // }else{
    //     echo "<p>Error uploading file!</p>";
    // }


    class FileHandler
    {
       public function upload($attachment_name, $attachment_tmp)
       {
            $filename = basename($attachment_name);
            $location = '../uploads/'.$filename;

            move_uploaded_file($attachment_tmp,$location) ? "Uploaded Successfully" : "Upload Failed";
              
       }

       public function delete($attachment_name){
            
            $filename = basename($attachment_name);
            $location = '../uploads/'.$filename;

            if (file_exists($location)){
               unlink($location);
            }
       }
    }