<?php

    // spl_autoload_register(function($class_name){
    //     var_dump($class_name);

    //     // include $class_name.'php';

    // });

    require_once '../class/Sections.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>New Team Member | Handover App</title>
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

        <p class="subtitle is-4">Effectively manage your team or crew's shift handovers!</p>
        <div class="block"></div>
    </div>


</div>

<div class="container">

    <div class="content">

        <p class="subtitle is-4">Add New Member</p>
        <hr>
        <div class="block"></div>
    </div>

</div>

<div class="container">
    <form action="addNewMember.php" method="post">

        <div class="field">
            <label class="label" for="companyID">Company ID<span class="required">*</span></label>
            <div class="control">
                <input class="input" name="companyID" type="text" placeholder="Company ID">
            </div>
        </div>

        <div class="field">
            <label class="label" for="name">Name<span class="required">*</span></label>
            <div class="control">
                <input class="input" name="name" placeholder="Name of new member">
            </div>
        </div>

        <div class="field is-grouped">
            <label class="label" for="section">Section<span class="required">*</span></label>
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    <?php 
                        // require_once '../class/Sections.php';
                    ?>

                    <select name="section">
                        
                        <option value="">Select Section</option>

                        <?php
                            
                            $sections = new Sections();

                            $all_sections = $sections -> getAllSections();

                            //var_dump($all_sections);

                            foreach($all_sections as $section){?>

                               <option value="<?php echo $section["name"];?>"><?php echo $section["name"];?></option>

                            <?php } ?>

                    </select>

                </div>
            </div>

            <label class="label" for="email">Email<span class="required">*</span></label>
            <div class="control is-expanded">
                
                <div class="control">
                    <input class="input" type="email" name="email"  required placeholder="someone@gmail.com">
                </div>

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