<?php

require_once 'navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Handover Notes | Handover App</title>

    <style>
     
    </style>
</head>
<body>
    
    <div class="container">
        <div class="box">
            <h5 class="subtitle is-5">All Handover Notes</h5>
            <h5 class="subtitle is-5"> <a href="newNote/newHandoverNote.php" class="tag is-link">New Handover Note</a> </h5>
            <hr>
            <!-- Table to display all handover notes -->
             <div class="table-container">
             <table class="table is-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Note Description</th>
                        <th>Create Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>Action Owner</th>
                        <th>Attachments</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                <!-- Fetch from database -->

                <?php
                    require_once 'class/Handover.php';

                    $handoverNotes = new Handover();
                    
                   // var_dump($handoverNotes -> getAllNotes());
                    $allNotes = $handoverNotes -> getAllNotes();

                ?>
                <?php foreach($allNotes as $notes){  ;?>
                    
                    <tr>
                        <td><?php echo $notes["ID"];?></td>
                        <td><?php echo $notes["title"];?></td>
                        <td><?php echo $notes["note"];?></td>
                        <td><?php echo $notes["createDate"];?></td>
                        <td><?php echo $notes["status"];?></td>
                        <td><?php echo $notes["actions"];?></td>
                        <td><?php echo $notes["actionOwner"];?></td>
                        <td>
                            <a href="uploads/<?php echo $notes["attachments"];?>"><?php echo $notes["attachments"];?></a> 
                        </td>
                        <td>
                            <div class="buttons">
                                <button> 
                                    <a href="newNote/editHandoverform.php?id=<?php echo $notes["ID"];?>">Edit</a> 
                                </button>

                                <button> 
                                    <a href="newNote/deleteNote.php?id=<?php echo $notes["ID"];?>&attachment_name=<?php echo $notes["attachments"];?>">Delete</a>
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