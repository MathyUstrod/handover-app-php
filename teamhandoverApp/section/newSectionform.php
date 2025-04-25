
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>New Section | Handover App</title>
    <link rel="stylesheet" href="../style.css">
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

        <p class="subtitle is-4">Add New Section</p>
        <hr>
        <div class="block"></div>
    </div>

</div>

<div class="container">
    <form action="addNewSection.php" method="post">

        <div class="field">
            <label class="label" for="section">Section<span class="required">*</span></label>
            <div class="control">
                <input class="input" name="section" type="text" placeholder="Enter new section name">
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