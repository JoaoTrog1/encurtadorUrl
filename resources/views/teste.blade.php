<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Link</title>
</head>
<body>
    <form action="/" method="POST">
        @csrf
        <label for="link">Link:</label>
        <input type="text" id="link" name="link" required>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
