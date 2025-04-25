<?php
    require_once './class/Stats.php';

    $stats = new Stats();
    $count_pending = $stats -> getPendingActions_count();
    $count_complete = $stats -> getCompleteActions_count();
    $count_due = $stats -> getDueActions_count();
    $count_upcoming = $stats -> getUpcomingActions_count();
    $count_cancelled = $stats -> getCancelledActions_count();
    $count_handover = $stats -> getAllHandover_count();
?>


<div class="container">
<div id="statcontainer">
<!-- Pending Actions stat block -->
    <div class="grid is-col-min-12 is-row-gap-2">
        <div class="cell">
            <div class="box has-background-warning">
                <div class="fixed-grid has-2-cols">
                    <div class="grid">
                        <div class="cell is-row-span-2">
                            <h2 class="subtitle is-1 has-text-white p-auto"><?php echo $count_pending[0]["count"] ;?></h2>
                        </div>
                        <div class="cell">
                            <h2 class="title is-5">Pending Actions</h2>
                        </div>
                        <div class="cell">
                            <h3 class="has-text-black"><a class="has-text-link" href="action/action_lists.php?stat=pending">View</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- complete actions stat block -->

    <div class="cell">
            <div class="box has-background-primary">
                <div class="fixed-grid has-2-cols">
                    <div class="grid">
                        <div class="cell is-row-span-2">
                            <h2 class="subtitle is-1 has-text-white p-auto"><?php echo $count_complete[0]["count"];?></h2>
                        </div>
                        <div class="cell">
                            <h2 class="title is-5">Complete Actions</h2>
                        </div>
                        <div class="cell">
                            <h3 class="has-text-black"> <a class="has-text-link" href="action/action_lists.php?stat=complete">View</a> </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Due Actions stat block -->

    <div class="cell">
            <div class="box has-background-danger">
                <div class="fixed-grid has-2-cols">
                    <div class="grid">
                        <div class="cell is-row-span-2">
                            <h2 class="subtitle is-1 has-text-white p-auto"><?php echo $count_due[0]["count"] ;?></h2>
                        </div>
                        <div class="cell">
                            <h2 class="title is-5">Due Actions</h2>
                        </div>
                        <div class="cell">
                            <h3 class="has-text-black"> <a class="has-text-link" href="action/action_lists.php?stat=due">View</a> </h3>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Upcoming Actions stat block -->
    <div class="cell">
            <div class="box has-background-link">
                <div class="fixed-grid has-2-cols">
                    <div class="grid">
                        <div class="cell is-row-span-2">
                            <h2 class="subtitle is-1 has-text-white p-auto"><?php echo $count_upcoming[0]["count"] ;?></h2>
                        </div>
                        <div class="cell">
                            <h2 class="title is-5">Upcoming Actions</h2>
                        </div>
                        <div class="cell">
                            <h3 class="has-text-black"> <a class="has-text-link has-background-link-light" href="action/action_lists.php?stat=upcoming">View</a> </h3>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Cancelled Actions stat block -->

    <div class="cell">
            <div class="box has-background-text">
                <div class="fixed-grid has-2-cols">
                    <div class="grid">
                        <div class="cell is-row-span-2">
                            <h2 class="subtitle is-1 has-text-white p-auto"><?php echo $count_cancelled[0]["count"] ;?></h2>
                        </div>
                        <div class="cell">
                            <h2 class="title is-5">Cancelled Actions</h2>
                        </div>
                        <div class="cell">
                            <h3 class="has-text-black"> <a class="has-text-link" href="action/action_lists.php?stat=cancelled">View</a> </h3>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Handovers stat block -->
     
    <div class="cell">
            <div class="box" style="background-color: rgb(165,0,255);">
                <div class="fixed-grid has-2-cols">
                    <div class="grid">
                        <div class="cell is-row-span-2">
                            <h2 class="subtitle is-1 has-text-white p-auto"><?php echo $count_handover[0]["count"] ;?></h2>
                        </div>
                        <div class="cell">
                            <h2 class="title is-5">Handovers</h2>
                        </div>
                        <div class="cell">
                            <h3 class="has-text-black"> <a class="has-text-link has-background-grey-light" href="handoverNotes.php">View</a> </h3>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>

</div>
</div>

<div class="block"></div>

<?php
    require_once 'chartcomponent.php';
?>