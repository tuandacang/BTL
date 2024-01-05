<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mẫu</title>
    <link rel="stylesheet" href="css/css.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
     
    </style>
</head>
<body>
    <div class="boxcenter">
        <div class="row2">
         <div class="row2 font_title mb10">
          <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
          <form action="index.php?act=listsp" method="post">
                <input type="text" name="kyw">
                <select name="iddm">
                    <option value="0" selected>tất cả</option>
            <?php 
                foreach($listdm as $danhmuc){
                    extract($danhmuc);
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
                
            ?>
                </select>
                <input type="submit" name="listok" value="GO">
            </form>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
            
           <table>
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN SẢN PHẨM</th>
                <th>IMAGE</th>
                <th>Mô tả</th>
                <th>GIÁ</th>
                <th>LƯỢT XEM</th>
                <th></th>
            </tr>

            <?php 
            foreach($lisspdm as $sanpham){
                extract($sanpham);
               
                
                $suasp = "index.php?act=suasp&id=".$id;
                $xoasp = "index.php?act=xoasp&id=".$id;
                $imagepart = "../uploads/".$img;
                if(is_file($imagepart)){
                    $image = "<img src='".$imagepart."' height = '80'>";
                }else{
                    $image = "no photo";
                }
                echo '  <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$image.'</td>
                <td>'.$mota.'</td>
                <td>'.$price.'</td>
                <td>'.$luotxem.'</td>
                <td> <a href="'.$suasp.'">  <input type="button" value="Sửa">    <a href="'.$xoasp.'"> <input type="button" value="Xóa"></td>
                </tr>';
            }
            
            ?>
           
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
                
           </div>
          </form>
         </div>
        </div>



       
    </div>
    
</body>
</html>