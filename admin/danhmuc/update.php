<?php
if(is_array($dm)){
    extract($dm);
}

?>


<div class="row2">
         <div class="row2 font_title">
          <h1>update loại hàng</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatedm" method="POST">
           <div class="row2 mb10 form_content_container">
           <label> Mã loại </label> <br>
            <input type="text" name="maloai" placeholder="nhập vào mã loại">
           </div>
           <div class="row2 mb10">
            <label>Tên loại </label> <br>
            <input type="text" name="tenloai" value="<?=$name?>" placeholder="nhập vào tên">
           </div>
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id; ?>">
         <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>

        
          </form>
         </div>
        </div>
 
</div>
    
</body>
</html>