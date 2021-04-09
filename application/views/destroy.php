<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>static/destroy.css">
    <title>PHP | Courses</title>
</head>
<body>
    <section>
        <div>
            <h2>Are you sure you want to delete this course?</h2>
            <p class="label">Name:</p> 
            <p><?= $get_data["name"] ?></p>
            <p class="label">Description:</p>
            <p><?= $get_data["description"] ?></p>
        </div>
        <div class="buttons">
            <a href="<?= base_url() ?>">No</a>
            <a href="<?= base_url() ?>delete/<?= $get_data["id"] ?>" class="delete">Yes! I want to delete this</a>
        </div>
    </section>
</body>
</html>