<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/upload" method="post" enctype="multipart/form-data">
        <input name="receipt" type="file">
        <input name="myimage" type="file">
        <button type="submit">Upload</button>
    </form>
</body>

</html>