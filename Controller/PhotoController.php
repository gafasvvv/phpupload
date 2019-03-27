<?php
    require_once '../config/DSN.php';

    class PhotoController {

        protected function connectDb()
        {
            
            //データベース接続(PDO)
            try{
                $db = new PDO(DSN, DB_USER, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            } catch (PDOException $e){
                print '接続できません'.$e->getMessage();
            }
        }

        public function upload()
        {
            $ext = pathinfo($_FILES['upfile']['name']);
            $perm = ['gif', 'jpg', 'jpeg', 'png'];
            if($_FILES['upfile']['error'] !== UPLOAD_ERR_OK){
                $msg = [UPLOAD_ERR_NO_FILE => 'アップロードできませんでした！'];
                $err_msg = $msg[$_FILES['upfile']['error']];
            } elseif(!in_array(strtolower($ext['extension']), $perm)){
                $err_msg = '画像以外のファイルはアップロードできません！';
            } elseif(!@getimagesize($_FILES['upfile']['tmp_name'])){
                $err_msg = 'ファイルの内容は画像ではありません！';
            } else {
                $src = $_FILES['upfile']['tmp_name'];
                $dest =$_FILES['upfile']['name'];
                if(!move_uploaded_file($src,'../doc/'.$dest)){
                    $err_msg = 'アップロードできませんでした！';
                }
            }
            if(isset($err_msg)){
                print $err_msg;
            }

            $db = $this->connectDb();
            if(isset($_POST['description'])){
                $stt = $db->prepare("INSERT INTO photo(photo_path, description)
                VALUES (:photo_path, :description)");
                $stt->bindValue(':photo_path','../doc/'.$dest );
                $stt->bindValue(':description', $_POST['description']);
                $stt->execute();
            }
        }
    }