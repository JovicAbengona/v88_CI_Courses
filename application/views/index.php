<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>static/style.css">
    <title>PHP | Courses</title>
</head>
<body>
    <section>
        <form action="courses/add" method="POST">
            <h3>Add a new course</h3>
            <label>Name: <input type="text" name="name" id="name" value="<?= set_value('name')?>"></label>
<?php if($this->session->userdata("error_name") != NULL){ echo "".$this->session->userdata("error_name").""; $this->session->unset_userdata("error_name");}?>
            <label class="description">Description: 
                <textarea name="description" id="description"><?php if($this->session->userdata("description") != NULL){ echo "".$this->session->userdata("description").""; $this->session->unset_userdata("description");}?></textarea>
            </label>
            <input type="submit" class="add" value="Add">
        </form>
        <div>
            <h3>Courses</h3>
            <table>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Description</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(count($form_data) > 0){
                        foreach($form_data AS $data){
                ?>
                            <tr>
                                <td class="name"><?= $data["name"] ?></td>
                                <td clas="description"><?= $data["description"] ?></td>
                                <td class="date_added"><?= $data["created_at"] ?></td>
                                <td class="action"><a href="courses/destroy/<?= $data["id"] ?>">remove</a></td>
                            </tr>
                <?php
                        }
                    }
                    else{
                ?>
                        <tr>
                            <td colspan="3">No Data Found</td>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>