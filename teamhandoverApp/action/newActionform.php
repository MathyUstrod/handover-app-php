<?php
    require_once '../class/Handover.php';
    //fetch all handover IDs and title

    $assoc_handover = new Handover();
    $handover_list = $assoc_handover -> getAllNotes();

    //get team member list

    require_once '../class/TeamMembers.php';
    $team_members = new TeamMembers();
    $team = $team_members -> getAllTeamMembers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>New Action | Handover App</title>
</head>
<body>

<div class="container">

    <nav class="breadcrumb is-left" aria-label="breadcrumbs">

        <ul>

            <li><a href="../index.php">Home</a></li>

            <li><a href="../handoverNotes.php">Handovers</a></li>

            <li><a href="../action_items.php">Actions</a></li>

            <li><a href="#">Create Report</a></li>

            <li><a href="../teams_sections.php">Sections & Teams</a></li>

        </ul>

    </nav>

    <div class="content">

        <h1 class="title is-2">Team Handover</h1>

        <p class="subtitle is-4">Create New Action Item</p>
        <div class="block"></div>
    </div>

</div>

<div class="container">
    <p>Fields marked <span class="required">*</span> are required.</p>
    <form action="createAction.php" enctype="multipart/form-data" method="post">

        <div class="field">
            <label class="label" for="title">Title <span class="required">*</span> </label>
            <div class="control">
                <input class="input" name="title" type="text" placeholder="Title">
            </div>
        </div>

        <div class="field">
            <label class="label" for="assocNoteID">Associated Note ID<span class="required">*</span></label>
            <div class="control is-expanded">
                <!-- Assoc note id -->
                <div class="select is-fullwidth">
                    <select name="assocNoteID">
                        <option value="">Select Associated Handover Note</option> 

                        <?php 
                            foreach($handover_list as $list){
                                echo "<option value=".$list["ID"].">".$list["ID"]." - ".$list["title"]."</option>";
                            }
                        
                        ?>
                    </select>
                </div>

            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Action Description<span class="required">*</span></label>
            <div class="control">
                <textarea class="textarea" name="description" placeholder="Outline action items here..."></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label" for="actionOwner">Action Owner<span class="required">*</span></label>
                <div class="control is-expanded">
                    
                    <div class="select is-fullwidth">

                        <select name="actionOwner">
                            <option value="">Select Action Owner</option>
                            <?php

                                foreach($team as $owner){
                                    echo "<option value=".'"'.$owner["name"].'">'.$owner["name"]."</option>";
                                }

                            ?>
                            
                        </select>
                    </div>

                </div>
        </div>

        <div class="field is-grouped">
            <label class="label" for="dueDate">Due Date<span class="required">*</span></label>
            <div class="control is-expanded">
                <input class="input" name="dueDate" type="date">
            </div>

            <label class="label" for="status">Status<span class="required">*</span></label>
            <div class="control is-expanded">
                
                <div class="select is-fullwidth">
                    <select name="status">
                        <option value="">Select Status</option>
                        <option value="Complete">Complete</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Pending">Pending</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="field">
            <label class="label" for="attachments">Attachments(zip multiple files before upload) </label>
            <div class="control is-expanded">
                <input class="input" name="attachments" type="file">
            </div>
        </div>
        

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Submit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light"> <a href="../action_items.php">Cancel</a> </button>
            </div>
        </div>

    </form>
</div>
    
</body>
</html>