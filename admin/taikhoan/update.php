<?php
if(isset($lissuatk)){
 extract($lissuatk);
}

?>



<div class="row2">
         <div class="row2 font_title">
          <h1>update khách hàng</h1>
         </div>
         <div class="row2 form_content ">
          <form action="index.php?act=updatetk" method="POST">
           <div class="row2 mb10 form_content_container">
           <div class="row2 mb10">
            <label>User</label> <br>
            <input type="text" name="user" value="<?=$user?>" placeholder="nhập vào tên">
           </div>
           <div class="row2 mb10">
            <label>Pass</label> <br>
            <input type="text" name="pass" value="<?=$pass?>" placeholder="nhập vào tên">
           </div>
           <div class="row2 mb10">
            <label>Email</label> <br>
            <input type="text" name="email" value="<?=$email?>" placeholder="nhập vào tên">
           </div>
           <div class="row2 mb10">
            <label>address</label> <br>
            <input type="text" name="address" value="<?=$address?>" placeholder="nhập vào tên">
           </div>
           <div class="row2 mb10">
            <label>tel</label> <br>
            <input type="text" name="tel" value="<?=$tel?>" placeholder="nhập vào tên">
           </div>
           
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id; ?>">
         <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=dskh"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>

        
          </form>
         </div>
        </div>
 
</div>
    