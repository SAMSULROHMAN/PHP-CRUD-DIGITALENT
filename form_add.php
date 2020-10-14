<?php 
include('library.php');
$library = new Library();
if(isset($_POST['tombol_tambah'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    $add_status = $library->addData($title, $content);
    if($add_status){
        header('Location: index.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3>Tambah Data Siswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required="">
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 col-form-label">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" required=""></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="tombol_tambah" class="btn btn-outline-primary
                    btn-block mt-3" value="Tambah">
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>