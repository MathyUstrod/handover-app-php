<?php
    $id = $_GET['id'];

    require_once '../class/Handover.php';
                        
    $note = new Handover();

    $to_edit = $note -> getNote($id);

    //var_dump($to_edit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Edit Handover Note | Handover App</title>
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
    <form action="editNote.php" enctype="multipart/form-data" method="post">
        <input type="number" name="id" hidden value="<?php echo $id; ?>">    
        <div class="field">
            <label class="label" for="title">Title<span class="required">*</span></label>
            <div class="control">
                <input class="input" name="title" type="text" placeholder="" value="<?php echo $to_edit[0]["title"];?>">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Note Description<span class="required">*</span></label>
            <div class="control">
                <textarea class="textarea" name="description" placeholder="Outline your handover notes"><?php echo $to_edit[0]["note"];?></textarea>
            </div>
        </div>

        <div class="field is-grouped">
            <label class="label" for="title">Create Date<span class="required">*</span></label>
            <div class="control is-expanded">
                <input class="input" name="createDate" type="date" value="<?php echo $to_edit[0]["createDate"];?>">
            </div>

            <label class="label" for="title">Status<span class="required">*</span></label>
            <div class="control is-expanded">
                
                <div class="select is-fullwidth">
                    <select name="status">
                    <option selected value="<?php echo $to_edit[0]["status"];?>"><?php echo $to_edit[0]["status"];?></option>
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
                <textarea class="textarea" name="actions" placeholder="Outline general handover actions"><?php echo $to_edit[0]["actions"];?></textarea>
            </div>
        </div>

        <div class="field is-grouped">
            
            <label class="label" for="title">Action Owner</label>
            <div class="control is-expanded">
                
                <div class="select is-fullwidth">
                    <select name="actionOwner">
                        <option><?php echo $to_edit[0]["actionOwner"];?></option>
                        <?php  require_once '../class/TeamMembers.php';
                        
                        $team = new TeamMembers();

                        $names = $team -> getAllTeamMembers();

                        foreach($names as $member){;?>
                        
                            <?php echo '<option value="'.$member["name"].'">'.$member["name"]."</option>"; ?> 
                        
                        <?php } ?>
                    </select>
                </div>

            </div>

            <label class="label" for="title">Attachments(zip multiple files before upload) </label>
            <div class="control is-expanded">
                <input class="input" name="attachments" type="file" value="<?php echo $to_edit[0]["attachments"];?>">
                <input type="text" name="oldattachment" id="" hidden value="<?php echo $to_edit[0]["attachments"];?>">            
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