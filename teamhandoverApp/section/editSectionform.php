<?php

require_once '../class/Sections.php';

$id = $_GET["id"];

$section = new Sections();

$edit_section = $section -> getSection($id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Edit Section | Handover App</title>

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

    <div class="content">

        <p class="subtitle is-4">Edit Section</p>
        <hr>
        <div class="block"></div>
    </div>

</div>

<div class="container">
    <form action="editSection.php" method="post">
        
        <div class="field">
            <label class="label" for="section">Section</label>
            <input type="number" name="id" hidden value="<?php echo $id ;?>" >
            <div class="control">
                <input class="input" name="section" type="text" value="<?php echo $edit_section[0]["name"] ;?>">
            </div>
        </div>
        
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Submit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light"> <a href="../teams_sections.php">Cancel</a> </button>
            </div>
        </div>

    </form>
</div>
    
</body>
</html>