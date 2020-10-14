<?php 
include('library.php');
$library = new Library();
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $data = $library->get_by_id($id);
}
else
{
    header('Location: index.php');
}

if(isset($_POST['tombol_update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content']; 
    $status_update = $library->update($id,$title,$content);
    if($status_update)
    {
        header('Location:index.php');
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
                <h3>Edit Post</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>
               <div class="form-group">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required="" value="<?php echo $data['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-2 col-form-label">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" required="" value="<?php echo $data['content']; ?>"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="tombol_update" class="btn btn-outline-primary
                    btn-block mt-3" value="Update">
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>