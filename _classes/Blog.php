<?php


class Blog
{
    private static $tbl_blog = 'blog';
    private static $table_top_category = 'tbl_category';
    private static $tbl_rating_blog = 'tbl_rating_blog';
    private static $tbl_customer = 'tbl_customer';
    private  $folder_tmp = 'assets'.DS.'img'.DS.'img_customer';
    private  $folder_tmp_blog = 'assets'.DS.'img'.DS.'img_blog';
    private  $Tcat_id;
    private $Tcat_name;
    private $id_blog;
    private $title;
    private $description;
    private $date_blog;
    private $file;
    private $blog_active;
    private $message;
    private $rating;
    private $cust_id;
    private $status;
    private $b_total_view;

    public function get_Top_Category_inBlog(){
        global $db;
        $get_cat = "SELECT * FROM " . self::$table_top_category  . " WHERE show_on_menu  = 1";
        $result_cat = $db->exec_query($get_cat);

        while($row = mysqli_fetch_assoc($result_cat)){
            $this->Tcat_id = $row['tcat_id'];
            $this->Tcat_name = $row['tcat_name'];

            echo   "<li><a href='blog.php?id=$this->Tcat_id'>$this->Tcat_name</a></li>";

        }

    }

    public function all_Blog(){
        global $db;
        $stat = " SELECT *  FROM " . self::$tbl_blog ." as bl JOIN tbl_category as cate ON bl.tcat_id = cate.tcat_id  ORDER BY bl.id DESC  ";

        $exec = $db->exec_query($stat);

        while($row = mysqli_fetch_assoc($exec)){
        $this->id_blog = $row['id'];
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->file = $row['photo_blog'];
        $this->Tcat_name = $row['tcat_name'];
        $this->date_blog = $row['date_blog'];
        $this->blog_active = $row['blog_active'];

          if($this->blog_active == 1){

              echo  "  <div class='col-lg-6 col-sm-6'>
                        <div class='blog-item'>
                            <div class='bi-pic'>
                                <img class='img-fluid' src='assets/img/img_blog/{$this->file}' alt='' style='background-repeat: no-repeat;background-size: cover;height: 342px !important;'>
                            </div>
                            <div class='bi-text'>
                                <a href='blog-details.php?id={$this->id_blog}'>
                                    <h4>{$this->title}</h4>
                                </a>
                                <p>{$this->Tcat_name} <span>-"; echo Time_ago::calc_time_ago($this->date_blog);  echo "</span></p>
                            </div>
                        </div>
                    </div>";


          }




        }


    }
    public function Blog_by_cat($id){
        global $db;
        $stat = "SELECT *  FROM blog as bl JOIN tbl_category as cate ON bl.tcat_id = cate.tcat_id WHERE bl.tcat_id = $id  ORDER BY bl.tcat_id DESC";

        $exec = $db->exec_query($stat);

        while($row = mysqli_fetch_assoc($exec)){
        $this->id_blog = $row['id'];
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->file = $row['photo_blog'];
        $this->Tcat_name = $row['tcat_name'];
        $this->date_blog = $row['date_blog'];
        $this->blog_active = $row['blog_active'];

          if($this->blog_active == 1){

              echo  "  <div class='col-lg-6 col-sm-6'>
                        <div class='blog-item'>
                            <div class='bi-pic'>
                                <img class='img-fluid' src='assets/img/img_blog/{$this->file}' alt='' style='background-repeat: no-repeat;background-size: cover;height: 342px !important;'>
                            </div>
                            <div class='bi-text'>
                                <a href='blog-details.php?id={$this->id_blog}'>
                                    <h4>{$this->title}</h4>
                                </a>
                                <p>{$this->Tcat_name} <span> - "; echo Time_ago::calc_time_ago($this->date_blog);  echo "</span></p>
                            </div>
                        </div>
                    </div>";


          }




        }

    }

    public function RecentBlog(){
        global $db;

        $stat = "SELECT *  FROM " . self::$tbl_blog . " as bl 
                JOIN " . self::$table_top_category . " as cate
                ON bl.tcat_id = cate.tcat_id
                ORDER BY bl.id DESC LIMIT 4";
        $exec = $db->exec_query($stat);

        while ($row = mysqli_fetch_assoc($exec)){
            $this->id_blog = $row['id'];
            $this->title =substr($row['title'],0,10);
            $this->description = $row['description'];
            $this->file = $row['photo_blog'];
            $this->Tcat_name = $row['tcat_name'];
            $this->date_blog = $row['date_blog'];
            $this->blog_active = $row['blog_active'];

            if($this->blog_active == 1){
                echo  "<a href='blog-details.php?id={$this->id_blog}' class='rb-item'>
                                <div class='rb-pic'>
                                    <img src='assets/img/img_blog/{$this->file}' alt='' style='height: 80px; width=80px; background-size: cover '>
                                </div>
                                <div class='rb-text'>
                                    <h6>{$this->title}...</h6>
                                    <p>{$this->Tcat_name}<span> - "; echo Time_ago::calc_time_ago($this->date_blog);  echo "</span></p>
                                </div>
                            </a>";

            }





        }

    }

    public function blog_Details($request){
        global $db;
       $stat = " SELECT *  FROM " . self::$tbl_blog . " as bl 
                 JOIN " . self::$table_top_category . " as cate
                 ON bl.tcat_id = cate.tcat_id
                 WHERE bl.id =  " . $db->escape_string(intval($request)) . " LIMIT 1 ";
       $exec = $db->exec_query($stat);

       while ($row = mysqli_fetch_assoc($exec)){
           $this->id_blog = $row['id'];
           $this->title =$row['title'];
           $this->description = $row['description'];
           $this->file = $row['photo_blog'];
           $this->Tcat_name = $row['tcat_name'];
           $this->b_total_view = $row['total_view'];
           $this->date_blog = $row['date_blog'];
           $this->blog_active = $row['blog_active'];
           if($this->blog_active == 1){
               echo "  <div class='blog-detail-title'>
                            <h2>{$this->title}</h2>
                            <p>{$this->Tcat_name} <span>-  "; echo Time_ago::calc_time_ago($this->date_blog);  echo "</span></p>
                        </div>
                        <div class='blog-large-pic'>
                            <img src='assets/img/img_blog/{$this->file}' alt='' width='600px' height='600px'>
                        </div>
                        <div class='blog-detail-desc'>
                            <p>{$this->description}.
                            </p>
                        </div>
                        <div class='tag-share'>
                            <div class='details-tag'>
                                <ul class='list_css'>
                                    <li><i class='fa fa-tags'></i></li>
                                  ";
               $this->get_Top_Category_inBlog();
               echo "
                                </ul>
                            </div>
                       
                        </div>";


           }else{
               header('location: blog.php');
               exit;
           }



       }
        $this->b_total_view =  $this->b_total_view + 1;
        $up = "UPDATE " . self::$tbl_blog. " SET total_view  = $this->b_total_view WHERE id = " . $request;
        $db->exec_query($up);



    }

    public  function CheckcommentaireIfExistBlog($id,$customer_id){
        global $db;
        //check if customer already have a review in this product if $total = 0 give first else (message)

        $statement = "SELECT * FROM " . self::$tbl_rating_blog . " WHERE blog_id = " . $id . " AND cust_id = " . $customer_id;
        $exec = $db->exec_query($statement);
        $total = mysqli_num_rows($exec);
        if($total == 0){
            ?>
            <div class="personal-rating" style="margin-top: 37px">
                <h6>Votre note</h6>
                <style>

                    .ratingss .fa{
                        font-size: 18px;
                        float: left;
                        color:#FF9800;
                        cursor: pointer;
                    }
                </style>

                <div class="ratingss">
                    <span class="fa fa-star" checked></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
            <div class="leave-comment">
                <h4>Laissez un commentaire</h4>
                <form action="#" class="comment-form" id="comment_blog">
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea id="message_blog" placeholder="Messages"></textarea>
                            <span class="msg_commentaire_blog text-danger"  style="line-height: 58px">Le message ne peut pas être vide</span><br>
                            <button type="submit" class="site-btn">Envoyer le message</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php }else{
            ?>
            <span class="text-danger" style="line-height: 173px">Vous avez déjà donné une note!</span>
        <?php }



    }
    public function add_commentaire_blog($id){
        global $db;
        $this->message = $_POST['message'];
        $this->rating = $_POST['rating'];
        $this->cust_id = $_POST['cust_id'];
        $this->status =0;
        $this->message =str_replace("'","\'",$this->message);
        $date = date('Y-m-d H:i:s');

        $stat ="INSERT INTO " .self::$tbl_rating_blog . " (blog_id,cust_id,comment,rating,status,time_rating) VALUES ($id,'$this->cust_id','$this->message','$this->rating','$this->status','$date') ";
        $db->exec_query($stat);


    }
    public  function  fetch_comments_blog($request){
        global  $db;

        $stat = "SELECT *   FROM " . self::$tbl_rating_blog . " t1  
              JOIN " . self::$tbl_customer . " t2 
              ON t1.cust_id = t2.cust_id 
              WHERE t1.blog_id=" . $request . " AND status = 1";

        $exec  = $db->exec_query($stat);
        $total = mysqli_num_rows($exec);

        if($total > 0){
            while($row = mysqli_fetch_assoc($exec)){
                ?>
                <div class="posted-by">
                    <div class="pb-pic">
                        <img src="<?php echo $this->folder_tmp.DS.$row['cust_photo'] ?>" alt="" style="height: 63px;
    width: 63px;
    border-radius: 50%;">

                    </div>
                    <div class="pb-text">
                        <h5><?php echo $row['cust_name']; ?> <span style="color: #b2b2b2;
                                                            font-size: 12px;
                                                            font-weight: 400;
                                                            text-transform: uppercase;
                                                            letter-spacing: 2px;
                                                            margin-left: 22px;
                                                            position: relative;"> -<?php echo Time_ago::calc_time_ago($row['time_rating'])?></span></h5>
                        <p style="font-size: 14px;
                            color: #636363;"><?php echo $row['comment']; ?></p>
                    </div>
                </div>


            <?php  }



        }else{
            ?>
            <span style="color: #7b7b7b;
    font-weight: 500;
    font-family: sans-serif;">Aucun commentaire dans ce blog</span>

        <?php }



    }

    /********************************/
    public function all_Blog_index(){
        global $db;
        $stat = " SELECT * FROM " . self::$tbl_blog . " ORDER by total_view DESC LIMIT 3  ";

        $exec = $db->exec_query($stat);

        while($row = mysqli_fetch_assoc($exec)){
            $this->id_blog = $row['id'];
            $this->title = $row['title'];
            $this->description = substr($row['description'],0,150);
            $this->file = $row['photo_blog'];
            $this->date_blog = $row['date_blog'];
            $this->blog_active = $row['blog_active'];
            $image = $this->folder_tmp_blog.DS.$this->file;

            if($this->blog_active == 1){

                echo  "<div class='col-lg-4 col-md-6'>
                    <div class='single-latest-blog'>
                       <a href='blog-details.php?id={$this->id_blog}'><img src='{$image}' alt='' width='350px' height='350px'></a> 
                        <div class='latest-text'>
                            <div class='tag-list'>
                                <div class='tag-item'>
                                    <i class='fa fa-calendar-o'></i>
                                   ";
                            echo Time_ago::calc_time_ago($this->date_blog);
                echo "
                                </div>
                                <div class='tag-item'>
                                    <i class='fa fa-comment-o'></i>
                                    ";
                echo Rating::rating_of_blog($this->id_blog);

                echo "
                    
                                </div>
                            </div>
                            <a href='blog-details.php?id={$this->id_blog}'>
                                <h4>{$this->title}</h4>
                            </a>
                            <p>{$this->description}... </p>
                        </div>
                    </div>
                </div>";


            }




        }


    }
}
$blog = new Blog();