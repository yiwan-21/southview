<?php
function showResult($Patient_ID, $conn) {
                      $sql="select * from `covid-19 patient` where Patient_ID=$Patient_ID";
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $singleRow  = mysqli_fetch_assoc($result);
                        if(isset($singleRow['Testkit_Result']))
                        {
                          $img_src = "data:".$singleRow['Mime'].";base64,".base64_encode($singleRow['Testkit_Result']);
                        }
                        else{
                          $img_src = "../admin/images/no_image.jpg";
                        }
                        echo $img_src;
                      }
                      else{
                          die("Connection failed: " . $conn->connect_error);
                      }
                    }
                    showResult($Patient_ID, $conn);
                    ?>