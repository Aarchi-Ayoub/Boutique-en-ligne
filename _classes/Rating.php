<?php


 abstract class Rating
{
    private static $tbl_rating = 'tbl_rating';
    private static $tbl_rating_blog = 'tbl_rating_blog';
    public static  $avg_rating;

    public static function rating_of_product($id){
        global $db;
         $t_rating = 0;
        $rat ="SELECT *  FROM " . self::$tbl_rating . " WHERE p_id = " . $db->escape_string(intval($id));
        $exec = $db->exec_query($rat);
        $tot_personne_rat = mysqli_num_rows($exec);
        // any person rating in this product
        if($tot_personne_rat == 0){
             self::$avg_rating = 0;
        }else{

            while($result = mysqli_fetch_assoc($exec)){
                // total rating
                $t_rating = $t_rating + $result['rating'];

            }
            self::$avg_rating = $t_rating / $tot_personne_rat;

        }


        if(self::$avg_rating == 0){
            echo  ' <i class="fa fa-star-o"></i>
                   <i class="fa fa-star-o"></i>
                   <i class="fa fa-star-o"></i>
                   <i class="fa fa-star-o"></i>
                   <i class="fa fa-star-o"></i>
                   ';
        }elseif(self::$avg_rating == 1.5){
            echo '
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                                        
            ';

        }elseif(self::$avg_rating == 2.5){
            echo '
                  <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                 
                                        
            ';

        }elseif(self::$avg_rating == 3.5){
            echo '
                  <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                
                                        
            ';

        }elseif(self::$avg_rating == 4.5){
            echo '
                  <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>               
                                        
            ';

        }else{
            for($i=1;$i<=5;$i++){
                if($i>self::$avg_rating){
                    ?>
                    <i class="fa fa-star-o"></i>
               <?php }else{
                    ?>
                    <i class="fa fa-star"></i>

               <?php }

            }

        }

    }

    public static function rating_of_blog($id){
   global $db;
   $stat = " SELECT * FROM " . self::$tbl_rating_blog . " WHERE blog_id = " . $db->escape_string(intval($id)) . " AND status = 1";
   $exec = $db->exec_query($stat);
   $total = mysqli_num_rows($exec);
   return $total;

    }


}
