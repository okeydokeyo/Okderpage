<?php
include("top_menu.php");
?>
                    <div class="carousel-inner" >
                        <?php  
                        $i=0;
                        while($i < $carousel_num){       
                            $location = "../../carouselPicture/" . mysql_result($carousel_result,$i,1);
                            $imageFileType = pathinfo($location, PATHINFO_EXTENSION);                       
                            $j = $i + 1;
                            $name = $j . "." . $imageFileType;
                            if($i == 0){            
                                echo '<div class="item active"><img src="carouselPicture/'.$name.'"></div>';
                            }
                            else{  
                                echo '<div class="item"><img src="carouselPicture/'.$name.'"></div>';
                            }
                            $i++;
                        }
                        ?>
                    </div> 