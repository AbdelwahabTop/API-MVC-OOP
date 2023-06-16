<h1><?= $foo ?></h1>

<form action="/upload" method="post" enctype="multipart/form-data">
    <input name="receipt" type="file">
    <input name="myimage" type="file">
    <button type="submit">Upload</button>
</form>