<?php

require_once '../class/Stats.php';
require_once '../class/Handover.php';

//echo $_POST["start_date"];

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Handover Report | Handover App</title>

    <style>
     
    </style>
</head>
<body>
    <div class="container">
        <div class="">
        <a href="../newNote/newHandoverNote.php" class="tag is-link">New Handover Note</a>
        <a href="../createReportform.php" class="tag is-link">Re-run Report</a>
        <a href="../index.php" class="tag is-link">Home</a>
        <div class="block"></div>
        <hr>
            <div class="is-size-6 has-text-link">
                <p>Report Start Date (Y-M-D): <span><?php echo $start_date;?></span> </p>
                <p>Report End Date (Y-M-D): <span><?php echo $end_date;?></span> </p>
            </div>
        <hr>
        </div>
    </div>      
    
    <div class="container">
        <!-- Handover Report -->
        <div class="box">
            <h5 class="subtitle is-4">Handover Report</h5>
            
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
                    

                    $handoverNotes = new Handover();
                    
                   
                    $allNotes = $handoverNotes -> getReportNotes($start_date, $end_date);

                    //var_dump($allNotes);
                    //echo $start_date;

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
                            <a href="../uploads/<?php echo $notes["attachments"];?>"><?php echo $notes["attachments"];?></a> 
                        </td>
                        <td>
                            <div class="buttons">
                                <button> 
                                    <a href="../newNote/editHandoverform.php?id=<?php echo $notes["ID"];?>">Edit</a> 
                                </button>

                                <button> 
                                    <a href="../newNote/deleteNote.php?id=<?php echo $notes["ID"];?>&attachment_name=<?php echo $notes["attachments"];?>">Delete</a>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
             </table>
             </div>
        </div>

        <!-- Actions List -->
        <div class="box">
            <h3 class="subtitle is-4">Actions Report</h3>
            <hr>
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

                        <!-- Fetch action lists from database -->
                         <?php 
                            $actions = new Stats();
                            $all_actions = $actions -> getActions_Report();
                         ;?>

                        <?php foreach($all_actions as $action){  ;?>
                            
                            <tr>
                                <td><?php echo $action["ID"];?></td>
                                <td><?php echo $action["title"];?></td>
                                <td><?php echo $action["assocNoteID"];?></td>
                                <td><?php echo $action["description"];?></td>
                                <td><?php echo $action["actionOwner"];?></td>
                                <td><?php echo $action["dueDate"];?></td>
                                <td><?php echo $action["status"];?></td>
                                <td><a href="../uploads/<?php echo $action["attachments"];?>"><?php echo $action["attachments"];?></a></td>
                                <td>
                                    <div class="buttons">
                                        <button> 
                                            <a href="../action/editActionform.php?id=<?php echo $action["ID"];?>">Edit</a> 
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
    
    <div class="container">
        <div class="block"></div>
        <span>Handover App Report</span>
        <div class="bock"></div>
    </div>

    
    
</body>
</html>