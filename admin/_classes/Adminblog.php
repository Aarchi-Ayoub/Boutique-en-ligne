<?php


class Adminblog extends Request
{
    private static $tbl_blog = 'blog';
    private static $table_top_category = 'tbl_category';
    private $tcat_id;
    private $tit_blog;
    private $blog_desc;
    private $file;
    private $tmp_name;
    private $is_active;
    private $date;
    private $tcat_name;
    private  $folder_tmp = ROOT.DS.'assets'.DS.'img'.DS.'img_blog';

    public function add_blog(){
        global $db;
        $this->tcat_id = $_POST['tcat_id_blog'];
        $this->tit_blog = $_POST['tit_blog'];
        $this->tit_blog = str_replace("'","\'",$this->tit_blog);

        $this->blog_desc = $_POST['blog_description'];
        $this->file = uniqid('blog_',TRUE).$_FILES['file']['name'];
        $this->tmp_name=$_FILES['file']['tmp_name'];
        $this->is_active = $_POST['p_is_active_blog'];
        $this->date = date('Y/m/d H:i:s');
        $this->blog_desc = str_replace("'","\'",$this->blog_desc);

        move_uploaded_file($this->tmp_name, "$this->folder_tmp".DS.$this->file);
      $stat = " INSERT INTO  " . self::$tbl_blog . "(`tcat_id`, `title`, `description`, `date_blog`, `photo_blog`, `blog_active`, `total_view`)  ";
      $stat .= " VALUES ('$this->tcat_id','$this->tit_blog','$this->blog_desc','$this->date','$this->file','$this->is_active',0) ";
      $db->exec_query($stat);

    }
    public function AllBlog(){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_blog;
        $exec= $db->exec_query($stat);
        $i = 0;
        while ($row = mysqli_fetch_assoc($exec)){
            $i++;
            ?>
            <tr class="<?php if($row['blog_active']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
                <td><?php echo $i; ?></td>
                <td><img width="100px" height="100px" src="../assets/img/img_blog/<?php echo $row['photo_blog']; ?>"</td>
                <td><?php echo $row['title']; ?></td>
                <td>
                    <?php echo substr($row['description'],0,70); ?>

                </td>
                <td><?php if($row['blog_active']==1) {echo 'Actif';} else {echo 'Inactif';} ?></td>

                <td> <a href="#" class="btn btn-danger btn-xs delete_blog" id="<?php echo $row['id'] ?>">Supprimer</a>
                    <a href="blog-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-xs ">Éditer</a>
                </td>

            </tr>


        <?php }





    }

    public function Blog_by_id($id){
        global $db;

        $stat = " SELECT title,description,photo_blog,blog_active,bl.tcat_id,tcat_name FROM " . self::$tbl_blog ." as bl JOIN tbl_category as cate ON bl.tcat_id = cate.tcat_id WHERE id = $id ORDER BY bl.tcat_id DESC LIMIT 1 ";
        $exec = $db->exec_query($stat);

        while($row = mysqli_fetch_assoc($exec)){
            $this->tcat_id = $row['tcat_id'];
            $this->tcat_name = $row['tcat_name'];
            $this->tit_blog = $row['title'];
            $this->blog_desc = $row['description'];
            $this->file = $row['photo_blog'];
            $this->is_active = $row['blog_active'];

        echo " <div class='box box-info'>
                    <div class='box-body'>
                  
                        <div class='form-group has-feedback' id='top_cat_name_blog_edit'>
                            <label for='' class='col-sm-3 control-label'>Nom de catégorie <span>*</span></label>
                            <div class='col-sm-4'>
                                <select name='tcat_id' class='form-control select2 top-cat' id='tcat_id_blog_edit' aria-describedby='inputSuccess1'>
                                    <option value=''>Choisir une catégorie</option>
                                   ";
            $top_cat = "SELECT * FROM " . self::$table_top_category . " ORDER BY tcat_name DESC";
            $exec_cat = $db->exec_query($top_cat);
            while($row_top_cat = mysqli_fetch_assoc($exec_cat)){
                ?>
                <option value="<?php echo $row_top_cat['tcat_id']; ?>" <?php if($row_top_cat['tcat_id'] == $this->tcat_id){echo 'selected';} ?>><?php echo $row_top_cat['tcat_name']; ?></option>
            <?php }


        echo "                        </select>
                                <span class='glyphicon  form-control-feedback' aria-hidden='true' id='for_econ'></span>
                                <span id='inputSuccess1' class='sr-only'>(success)</span>
                                <span class='msg'>ne peux pas être vide</span>
                            </div>
                        </div>
                        <div class='form-group  has-feedback' id='title_blog_edit'>
                            <label class='col-sm-3 control-label' for='tit_blog_edit' >Titre <span>*</span></label>
                            <div class='col-sm-4'>
                                <input type='text' class='form-control' id='tit_blog_edit' aria-describedby='inputSuccess3' value='{$this->tit_blog}'>
                                <span class='glyphicon  form-control-feedback' aria-hidden='true' id='for_econ'></span>
                                <span id='inputSuccess3' class='sr-only'>(success)</span>
                                <span class='msg'>plus de 7 caractères</span>
                            </div>
                        </div>

                        <div class='form-group has-feedback' id='image_blog_edit'>
                            <label for='' class='col-sm-3 control-label'> Photo <span>*</span></label>
                            <div class='col-sm-4' style='padding-top:4px;'>
                                <input type='file' name='p_photo' id='blog_photo_edit' class='form-control' aria-describedby='inputSuccess8'>
                                <span class='glyphicon  form-control-feedback' aria-hidden='true' id='for_econ'></span>
                                <span id='inputSuccess8' class='sr-only'>(success)</span>
                                <span class='msg'>La photo ne peut pas être vide</span>
                            </div>
                        </div>
                        <label for='' class='col-sm-3 control-label'></label>
						
							<div class='col-sm-4' style='padding-top:4px;'>							
								<img src='../assets/img/img_blog/{$this->file}'  alt='' style='width:150px; height: 150px' >
								<input type='hidden' name='current_photo_blog'  value='{$this->file}'>
							</div>
						</div>

                        <div class='form-group has-feedback' id='desc_blog_edit'>
                            <label for='' class='col-sm-3 control-label'>Description *<br>
                                <span style='font-size: 10px;line-height: 34px;'> (La description ne peut pas être inférieure à 20 caractères)</span></label>
                            <div class='col-sm-8'>
                                <textarea name='p_description' class='form-control blog_description_edit' cols='30' rows='10' id=''  >{$this->blog_desc}</textarea>
                                <span class='msg_text' style='font-weight: bold;'></span>
                                <span class='glyphicon  form-control-feedback' aria-hidden='true' id='for_econ'></span>
                                <span id='inputSuccess9' class='sr-only'>(success)</span>
                            </div>


                        </div>

                        <div class='form-group'>
                            <label for='' class='col-sm-3 control-label'>Is Active?</label>
                            <div class='col-sm-8'>
                                <select name='p_is_active' class='form-control' style='width:auto;' id='p_is_active_blog_edit'>
                                   	<option value='1' "; if($this->is_active == '1' )echo 'selected';  echo ">Oui</option>
									<option value='0' "; if($this->is_active == '0' )echo 'selected';  echo ">Non</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='' class='col-sm-3 control-label'></label>
                            <div class='col-sm-6'>
                                <button type='submit' class='btn btn-success pull-left' name='form1'>Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>";







        }
    }

    public function edit_blog_without_photo($id){
        global $db;
        $this->tcat_id = $_POST['tcat_id_blog_edit'];
        $this->tit_blog = $_POST['tit_blog_edit'];
        $this->tit_blog = str_replace("'","\'",$this->tit_blog);
        $this->blog_desc = $_POST['blog_description_edit'];
        $this->is_active = $_POST['p_is_active_blog_edit'];
        $this->blog_desc = str_replace("'","\'",$this->blog_desc);
        $stat = " UPDATE `blog` SET `tcat_id`='$this->tcat_id',`title`='$this->tit_blog',`description`='$this->blog_desc',`blog_active`='$this->is_active' ";
        $stat .= " WHERE id = $id";
       $exec =  $db->exec_query($stat);
      if(!$exec)echo "error" . mysqli_error($db->getConnection());
    }
    public function edit_blog_with_photo($id){
        global $db;
        $this->tcat_id = $_POST['tcat_id_blog_edit'];
        $this->tit_blog = $_POST['tit_blog_edit'];
        $this->tit_blog = str_replace("'","\'",$this->tit_blog);

        $this->blog_desc = $_POST['blog_description_edit'];
        $this->is_active = $_POST['p_is_active_blog_edit'];
        $this->blog_desc = str_replace("'","\'",$this->blog_desc);
        $this->file = uniqid('blog_',TRUE).$_FILES['file']['name'];
        $this->tmp_name=$_FILES['file']['tmp_name'];
        move_uploaded_file($this->tmp_name, "$this->folder_tmp".DS.$this->file);
        $stat = " UPDATE `blog` SET `tcat_id`='$this->tcat_id',`title`='$this->tit_blog',`description`='$this->blog_desc',`photo_blog`='$this->file',`blog_active`='$this->is_active' ";
        $stat .= " WHERE id = $id";
        $db->exec_query($stat);

    }

    public  function  Delete_blog($id){
        global $db;
        $sel = " SELECT * FROM " .self::$tbl_blog . " WHERE id =  " . $db->escape_string(intval($id));
        $exec = $db->exec_query($sel);
        while($row = mysqli_fetch_assoc($exec)){
            $this->file = $row['photo_blog'];
            unlink($this->folder_tmp.DS.$this->file);
        }


        $stat = "DELETE FROM  " . self::$tbl_blog . "  WHERE id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);




    }
    public function check_url_data_and_id_for_blog($request){

        return self::check_url_if_id_exist($request,'blog.php',self::$tbl_blog,'id');
    }

}
$Adminblog = new Adminblog();