<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>New Handover Note | Handover App</title>
    <link rel="stylesheet" href="../style.css">
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

        <p class="subtitle is-4">Create New Handover Note</p>
        <div class="block"></div>
    </div>

</div>

<div class="container">
    <p>Fields marked <span class="required">*</span> are required.</p>
    <form action="createNote.php" enctype="multipart/form-data" method="post">

        <div class="field">
            <label class="label" for="title">Title<span class="required">*</span></label>
            <div class="control">
                <input class="input" name="title" type="text" placeholder="Title">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Note Description<span class="required">*</span></label>
            <div class="control">
                <textarea class="textarea" name="description" placeholder="Outline your handover notes"></textarea>
            </div>
        </div>

        <div class="field is-grouped">
            <label class="label" for="createDate">Create Date<span class="required">*</span></label>
            <div class="control is-expanded">
                <input class="input" name="createDate" type="date">
            </div>

            <label class="label" for="title">Status<span class="required">*</span></label>
            <div class="control is-expanded">
                
                <div class="select is-fullwidth">
                    <select name="status">
                        <option value="Complete">Complete</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Pending">Pending</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="field">
            <label class="label" for="actions">Actions</label>
            <div class="control">
                <textarea class="textarea" name="actions" placeholder="Outline general handover actions"></textarea>
            </div>
        </div>

        <div class="field is-grouped">
            
            <label class="label" for="title">Action Owner</label>
            <div class="control is-expanded">
                
                <div class="select is-fullwidth">
                    <select name="actionOwner">
                        <option value="">Select Action Owner</option>
                        <?php  require_once '../class/TeamMembers.php';
                        
                        $team = new TeamMembers();

                        $names = $team -> getAllTeamMembers();

                        foreach($names as $member){;?>
                        
                            <?php echo "<option value=".$member["name"].'">'.$member["name"]."</option>"; ?> 
                        
                        <?php } ?>
                    </select>
                </div>

            </div>

            <label class="label" for="title">Attachments(zip multiple files before upload) </label>
            <div class="control is-expanded">
                <input class="input" name="attachments" type="file">

                <!-- <div class="file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="resume" />
                        <span class="file-cta">
                        <span class="file-label"> Choose a file… </span>
                        </span>
                        <span class="file-name"> Screen Shot 2017-07-29 at 15.54.25.png </span>
                    </label>
                </div> -->
            </div>

        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Submit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light"> <a href="../handoverNotes.php">Cancel</a> </button>
            </div>
        </div>

    </form>
</div>
    
</body>
</html>