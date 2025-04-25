<?php

require_once 'navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Actions | Handover App</title>

    <style>
     
    </style>
</head>
<body>
    
    <div class="container">
        <div class="box">
            <h5 class="subtitle is-5">All Actions</h5>
            <h5 class="subtitle is-5"> <a href="action/newActionform.php" class="tag is-link">New Action</a> </h5>
            <hr>
            <!-- Table to display all handover notes -->
             <div class="table-container">
             <table class="table is-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Associated Note ID</th>
                        <th>Description</th>
                        <th>Action Owner</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Attachments</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                <!-- Fetch from database -->

                <?php
                    require_once 'class/Actions.php';

                    $actions = new Actions();
                    
                   // var_dump($handoverNotes -> getAllNotes());
                    $all_actions = $actions -> getAllActions();

                ?>
                <?php foreach($all_actions as $action){  ;?>
                    
                    <tr>
                        <td><?php echo $action["ID"];?></td>
                        <td><?php echo $action["title"];?></td>
                        <td><?php echo $action["assocNoteID"];?></td>
                        <td><?php echo $action["description"];?></td>
                        <td><?php echo $action["actionOwner"];?></td>
                        <td><?php echo $action["dueDate"];?></td>
                        <td><?php echo $action["status"];?></td>
                        <td><a href="uploads/<?php echo $action["attachments"];?>"><?php echo $action["attachments"];?></a></td>
                        <td>
                            <div class="buttons">
                                <button> 
                                    <a href="action/editActionform.php?id=<?php echo $action["ID"];?>">Edit</a> 
                                </button>

                                <button> 
                                    <a href="action/deleteAction.php?id=<?php echo $action["ID"];?>&attachment_name=<?php echo $action["attachments"];?>">Delete</a>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
             </table>
             </div>
        </div>
    </div>
    
</body>
</html>