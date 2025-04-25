<?php

require_once './navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>Sections & Teams | Handover App</title>

    <style>
     
    </style>
</head>
<body>
    <div class="container">
    <div class="columns">
        <div class="column is-two-thirds">
            <div class="">
                <div class="box">
                    <h5 class="subtitle is-5">All Team Members</h5>
                    <h5 class="subtitle is-5"> <a href="team/newTeamMemberform.php" class="tag is-link">New Team Member</a> </h5>
                    <hr>
                    <!-- Table to display all handover notes -->
                    <div class="table-container">
                    <table class="table is-striped is-fullwidth">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company ID</th>
                                <th>Name</th>
                                <th>Section</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <!-- Fetch from database -->

                        <?php
                            require_once 'class/TeamMembers.php';

                            $teamMembers = new TeamMembers();
                            
                        // var_dump($handoverNotes -> getAllNotes());
                            $all_teamMembers = $teamMembers -> getAllTeamMembersDetails();
                            //var_dump($all_teamMembers);
                        ?>
                        <?php foreach($all_teamMembers as $team_member){  ;?>
                            
                            <tr>
                                <td><?php echo $team_member["ID"];?></td>
                                <td><?php echo $team_member["companyID"];?></td>
                                <td><?php echo $team_member["name"];?></td>
                                <td><?php echo $team_member["section"];?></td>
                                <td><?php echo $team_member["email"];?></td>
                                <td>
                                    <div class="buttons">
                                        <button> 
                                            <a href="team/editTeamMemberform.php?id=<?php echo $team_member["ID"];?>">Edit</a> 
                                        </button>

                                        <button> 
                                            <a href="team/deleteTeamMember.php?id=<?php echo $team_member["ID"];?>">Delete</a>
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
        </div>
        <div class="column">          
            <div class="">
                <div class="box">
                    <h5 class="subtitle is-5">All Sections</h5>
                    <h5 class="subtitle is-5"> <a href="section/newSectionform.php" class="tag is-link">New Section</a> </h5>
                    <hr>

                    <!-- Output all Sections -->
                    <div class="table-container">
                    <table class="table is-striped is-fullwidth">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                               
                            <tbody>

                             <?php 
                             
                                //require_once 'class/Sections.php';
                                require_once 'class/Sections.php';
                             
                             ?>

                                <?php
                                    $all_sections = new Sections();

                                    $sections = $all_sections -> getAllSections();

                                    foreach($sections as $section){
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $section["ID"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $section["name"]; ?>
                                        </td>
                                        <td>
                                            <div class="buttons">
                                                <button> 
                                                    <a href="section/editSectionform.php?id=<?php echo $section["ID"];?>">Edit</a> 
                                                </button>

                                                <button> 
                                                    <a href="section/deleteSection.php?id=<?php echo $section["ID"];?>">Delete</a>
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
        </div>      
    </div>
    </div>
</body>
</html>