<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data"><code>
    @csrf
    <div class="form-group">
        <label for="image">Feature Image</label>
        <input type="file" name="image" class="form-control" required accept="image/png, image/jpeg">
    </div>
    <button type="submit" class="mt-4 btn btn-rounded btn-primary">Upload Image</button>
</form>
</body>
</html>