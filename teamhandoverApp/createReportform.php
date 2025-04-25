<?php
    require_once 'navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>New Handover Report | Handover App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<div class="container">

    <div class="content">

        <p class="subtitle is-4">Create New Handover Report</p>
        <hr>
        <div class="block"></div>
    </div>

</div>

<div class="container">
    <div class="box">
    <form action="report/report.php" method="post">

        <div class="field is-grouped">
            <label class="label" for="start_date">Start Date<span class="required">*</span></label>
            <div class="control is-expanded">
                <input class="input" name="start_date" type="date">
            </div>

            <label class="label" for="end_date">End Date<span class="required">*</span></label>
            <div class="control is-expanded">
                <input class="input" name="end_date" type="date">
            </div>
        </div>
        
        
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary">Create</button>
            </div>
            <div class="control">
                <button class="button is-link is-light"> <a href="index.php">Cancel</a> </button>
            </div>
        </div>

    </form>
    </div>
</div>
</>
    
</body>
</html>