<?php
    require_once '../Controller/PhotoController.php';
    $PhotoCont = new PhotoController;
    $PhotoCont -> upload();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>画像投稿</title>
</head>
<body>

    <h2>画像投稿</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="max_file_size" value="1000000" />
        <input id="upfile" type="file" name="upfile" size="40" />
        <div>
            <label for="description">説明文</label>
        </div>
        <div>
            <textarea id="description" type="text" name="description"></textarea>
        </div>
        <input type="submit" name="submit" value="追加">
    </form>

    <h2>画像一覧</h2>
    <?php
        foreach($PhotoCont->getAllPhotoList() as $row){
    ?>
        <img src="<?= $row['photo_path']?>" alt="画像" width="200px" height="200px">
        <p><?= $row['description']?></p>
    <?php       
        }
        $PhotoCont ->outputCsv();
    ?>

</body>