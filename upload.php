<?php
    if ($_FILES["epsFile"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["epsFile"]["error"] . "<br>";
    }
    else
    {
                    move_uploaded_file($_FILES["epsFile"]["tmp_name"],
                    "upload/". $_FILES["epsFile"]["name"]);
                    
                        $path = "upload/". $_FILES["epsFile"]["name"];
                            
                        $filename = pathinfo($_FILES['epsFile']['name'], PATHINFO_FILENAME);
                    

                        $fileContent = file_get_contents($path);

                        $base64Encode =  base64_encode($fileContent);

                        $array = array(); 
                            
                        $fileSize = $_FILES["epsFile"]["size"]  ;
                    
                        array_push($array,$_FILES["epsFile"]["name"],$_FILES["epsFile"]["type"],$base64Encode, $fileSize);
                        
                    
                        header('Content-type: application/json');

                        $result = json_encode($array);

                        echo $result;    
        
    }
?> 