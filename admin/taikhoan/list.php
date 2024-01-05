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
         <div class="row2 font_title">
          <h1>DANH SÁCH KHÁCH HÀNG</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ TÀI KHOAN</th>
                <th>USER NAME</th>
                <th>PASS</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>TEL</th>
                <th>ROLE</th>
                <th></th>
            </tr>

            <?php 
            foreach($listtk as $taikhoan){
                extract($taikhoan);
                $suatk = "index.php?act=suatk&id=".$id;
                $xoatk = "index.php?act=xoatk&id=".$id;
                echo '  <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>'.$id.'</td>
                <td>'.$user.'</td>
                <td>'.$pass.'</td>
                <td>'.$email.'</td>
                <td>'.$address.'</td>
                <td>'.$tel.'</td>
                <td> <a href="'.$suatk.'">  <input type="button" value="Sửa">    <a href="'.$xoatk.'"> <input type="button" value="Xóa"></td>
                </tr>';
            }
            
            ?>
           
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>
    
</body>
</html>