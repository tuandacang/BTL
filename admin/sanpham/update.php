<div class="row2">
         <div class="row2 font_title">
          <h1>iPhone</h1>
         </div>
         <div class="row2 form_content ">
         <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id ?>">
           <div class="row2 mb10 form_content_container">
           <label> Danh muc
           <select name="iddm" id="">
            <?php 
              foreach($listdm as $danhmuc){
                extract($danhmuc);
                if($iddm == $id){
                  echo '<option value="'.$id.'" selected>'.$name.'</option>';

                }else{
                  echo '<option value="'.$id.'">'.$name.'</option>';

                }
              }
            
            ?>
         
           </select> 
          
           <?php
              if(is_array($sp)){
                  extract($sp);
              }
            ?>
          </label> <br>
           </div>
           <div class="row2 mb10">
            <label>Tên sản phẩm </label> <br>
            <input type="text" name="tensp" placeholder="nhập vào tên" value="<?= $name?>">
           </div>
           <div class="row2 mb10">
            <label>Giá </label> <br>
            <input type="text" name="giasp" placeholder="nhập vào tên" value="<?= $price?>">
           </div>
           <div class="row2 mb10">
            <label>image</label> <br>
            <input type="file" name="image" placeholder="nhập vào tên">
            <img src="../uploads/<?= $img ?>" alt="" height="80px">
           </div>
           <div class="row2 mb10">
            <label>Mô tả</label> <br>
           <textarea name="mota" id="" cols="30" rows="10">
            <?php echo $mota?>
           </textarea>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>

        
          </form>
         </div>
        </div>
 
</div>
    
</body>
</html>