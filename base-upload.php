<?php
    if ($_FILES["epsFile"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["epsFile"]["error"] . "<br>";
    }
    else
    {
        echo "Upload: " . $_FILES["epsFile"]["name"] . "<br>";
        echo "Type: " . $_FILES["epsFile"]["type"] . "<br>";
        echo "Size: " . ($_FILES["epsFile"]["size"] / 1024) . " kB<br>";
      //  echo "Temp file: " . $_FILES["epsFile"]["tmp_name"] . "<br>";
        
        
        if($_FILES["epsFile"]["type"] == "application/postscript"){
         
                 if (file_exists("upload/" . $_FILES["epsFile"]["name"]))
                {
                    echo $_FILES["epsFile"]["name"] . "Please Rename Your File Name and Upload Again";
                }
                else
                {
                   move_uploaded_file($_FILES["epsFile"]["tmp_name"],
                    "upload/". $_FILES["epsFile"]["name"]);
                    echo "Stored in: " ."upload/". $_FILES["epsFile"]["name"];
                    echo '<br />';
                    
                    
                    /* eps code */
                    

                    $save_path = '';
                    if(!extension_loaded('imagick')){
                        echo 'imagick not installed'; 
                    }else{
                        echo 'start to convert eps to png';
                        echo '<br />';


                            $path = "upload/". $_FILES["epsFile"]["name"];
                                    echo    $path; 
                            
                        $filename = pathinfo($_FILES['epsFile']['name'], PATHINFO_FILENAME);
                        
                            $getFileName = 'png/'. $filename.'.png';

                            $save_path = getcwd().'/'.$getFileName;
                            $image = new Imagick();
                            $image->readimage($path);
                            $image->setBackgroundColor(new ImagickPixel('transparent'));
                            $image->setResolution(300,300);
                           // $image->scaleImage(600, 270);
                            $image->setImageFormat("png");
                            $image->writeImage($save_path);



                    }

                    echo $save_path; 
                    echo '<br />';

                    echo '<img src="'.$getFileName.'">';
                    echo '<br />';
                    
                    /*eps code*/
                    
                    
                    
                }

        }else{
            echo '<div>Please Select eps format file</div>';
        }    
        
    }
?> 