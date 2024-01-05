<?php
    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/taikhoan.php";
    include "../model/binhluan.php";
    include "../model/thongke.php";
    include "header.php";
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
        switch($act) {
            case "adddm":
                //kiem tra nf dung click vao nut add k
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($tenloai);
                    $thongbao ="them thanh cong";
                }
                include "danhmuc/add.php";
                break;

            case "listdm":
                $listdm = [];   
                   $listdm = loadall();   
                    include "danhmuc/list.php";
                             
                break;

            case "xoadm":   
                $listdm = [];   
                if(isset($_GET['id'])&& ($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdm = loadall();  
                include "danhmuc/list.php";
                break;

            case "suadm":
                $listdm = [];   
                if(isset($_GET['id'])&& ($_GET['id']>0)){
                    $dm=loadone($_GET['id']);
                }
                
                include "danhmuc/update.php";
                break;

            case "updatedm":
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    updatedm($id,$tenloai);
                    $thongbao ="them thanh cong";
                }
                $sql = "SELECT * FROM danhmuc order by name";
                $listdm=pdo_query($sql);

                include "danhmuc/list.php";
                break;

                //controler san pham
                case "addsp":
                    //kiem tra nf dung click vao nut add k
                    if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                        $iddm = $_POST['iddm'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        $fileName = $_FILES['image']['name'];
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                           // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                           $image = $target_file;
                          } else {
                            //echo "Sorry, there was an error uploading your file.";
                          }

                        insert_sanpham($tensp,$giasp,$image,$mota,$iddm);
                        $thongbao ="them thanh cong";
                    }
                    $listdm = loadall();  
                    include "sanpham/add.php";
                    break;
    
                case "listsp":
                    $iddm = "";
                    if(isset($_POST['listok']) && ($_POST['listok'])){
                        $kyw = $_POST['kyw'];
                        $iddm = $_POST['iddm'];
                    }else{
                        $kyw = '';
                        $iddm = 0;
                    }
                       $listdm = loadall();  
                       $lisspdm =  loadall_sanphamdm($iddm,$kyw);    
                        include "sanpham/list.php";
                                 
                    break;
    
                case "xoasp":   
                    $listsp = [];   
                    if(isset($_GET['id'])&& ($_GET['id']>0)){
                        delete_sanpham($_GET['id']);
                    }
                    $listsp = loadall_sanpham_home();  
                    include "sanpham/list.php";
                    break;
    
                case "suasp":
                    // $listsp = [];   
                    if(isset($_GET['id'])&& ($_GET['id']>0)){
                        $id = $_GET['id'];
                        $sp=loadone_sanpham($id);
                    

                    }
                    $listdm = loadall();  
                    include "sanpham/update.php";
                    break;
    
                case "updatesp":
                    if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                        $iddm = $_POST['iddm'];
                        $id = $_POST['id'];
                        $tensp = $_POST['tensp'];
                        $giasp = $_POST['giasp'];
                        $mota = $_POST['mota'];
                        $fileName = $_FILES['image']['name'];
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                           // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                           $image = $target_file;
                          } else {
                            //echo "Sorry, there was an error uploading your file.";
                          }
                        updatesp($id,$iddm,$tensp,$giasp,$mota,$fileName);
                        $thongbao ="them thanh cong";
                    }
                    $listdm = loadall();  
                    $sql = "SELECT * FROM sanpham order by name";
                    $listsp=pdo_query($sql);
                    include "sanpham/list.php";
                    break;
                    
                
                    case "dskh":                     
                        $listtk = loadall_taikhoan();  
                        include "taikhoan/list.php";
                     break;


                     case "xoatk":   
                        // $listdm = [];   
                        if(isset($_GET['id'])&& ($_GET['id']>0)){
                            delete_taikhoan($_GET['id']);
                        }
                        $listtk =loadall_taikhoan();  
                        include "taikhoan/list.php";
                     break;


                     case "suatk":
                        if(isset($_GET['id'])&& ($_GET['id']>0)){
                            $id = $_GET['id'] ;
                            $lissuatk = sua_taikhoan($id);
                        }
                        
                        include "taikhoan/update.php";
                        break;       
                        
                    case "updatetk":
                        if(isset($_POST['capnhat'])&& ($_POST['capnhat'])){
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $email = $_POST['email'];
                            $address = $_POST['address'];
                            $tel = $_POST['tel'];
                            $id = $_POST['id'];

                            updatetk($id,$user,$pass,$email,$address,$tel);
                        }
                        $listtk =loadall_taikhoan();  
                        include "taikhoan/list.php";
                        break;


                        case "dsbl":                     
                            $listbl = loadall_binhluan(0);  
                            include "binhluan/list.php";
                         break;
    

                         case "xoabl":   
                            if(isset($_GET['id'])&& ($_GET['id']>0)){
                                delete_binhluan($_GET['id']);
                            }
                            $listbl = loadall_binhluan(0);  
                            include "binhluan/list.php";
                         break;

                         case "thongke":                     
                            $lidtk = loadall_thongke();  
                            include "thongke/list.php";
                         break;     

                         case "bieudo":
                            $lidtk = loadall_thongke(); 
                            include "../admin/bieudo.php";
                            break;
            
            default:
            include "home.php";
            break;    
        }
    } else {
        include "home.php";
    }
    include "footer.php";
?>
