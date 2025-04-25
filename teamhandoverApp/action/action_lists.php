<?php

require_once '../class/Stats.php';

$stat = $_GET["stat"];
//echo $stat;

$stat_list = new Stats();

switch ($stat){
    case "pending":
        $all_actions = $stat_list -> getAllPendingActions();
        break;
    case "complete":
        $all_actions = $stat_list -> getAllCompleteActions();
        break;
    case "due":
        $all_actions = $stat_list -> getAllDueActions();
        break;
    case "upcoming":
        $all_actions = $stat_list -> getAllUpcomingActions();
        break;
    case "cancelled":
        $all_actions = $stat_list -> getAllCancelledActions();
        break;
    default:
        $all_actions = $stat_list -> getAllDueActions();
}

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

    <nav class="breadcrumb is-left" aria-label="breadcrumbs">

        <ul>

            <li><a href="../index.php">Home</a></li>

            <li><a href="../handoverNotes.php">Handovers</a></li>

            <li><a href="../action_items.php">Actions</a></li>

            <li><a href="../report/createReportform.php">Create Report</a></li>

            <li><a href="../teams_sections.php">Sections & Teams</a></li>

        </ul>

    </nav>


    <div class="content">

        <h1 class="title is-2">Team Handover</h1>

        <p class="subtitle is-4">Effectively manage your team or crew's shift handovers!</p>
        <div class="block"></div>
    </div>


</div>
    
    <div class="container">
        <div class="box">
            <h5 class="subtitle is-5">Actions Stat Lists: <?php echo strtoupper($stat);?></h5>
            <h5 class="subtitle is-5"> <a href="newActionform.php" class="tag is-link">New Action</a> </h5>

            <nav class="breadcrumb is-left" aria-label="breadcrumbs">
                <ul>
                    <li><a href="action_lists.php?stat=pending">Pending</a></li>
                    <li><a href="action_lists.php?stat=complete">Complete</a></li>
                    <li><a href="action_lists.php?stat=due">Due</a></li>
                    <li><a href="action_lists.php?stat=upcoming">Upcoming</a></li>
                    <li><a href="action_lists.php?stat=cancelled">Cancelled</a></li>
                </ul>
            </nav>

            <hr>
            <!-- Table to display all actions -->
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

                <!-- Dynamically tutput lists returned by Stat class methods depending on status -->

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
                                    <a href="editActionform.php?id=<?php echo $action["ID"];?>">Edit</a> 
                                </button>

                                <button> 
                                    <a href="deleteAction.php?id=<?php echo $action["ID"];?>&attachment_name=<?php echo $action["attachments"];?>">Delete</a>
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