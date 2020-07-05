<?php include('inc/header.php'); ?>
<body>

    <!-- Connects to the mysql database. -->
    <?php include('inc/scr/database.php'); ?>

    <?php

        //Gets the project identifier.
        $project_id = $_GET["id"];
        $project_type = 1;

        //Checks if the value is set.
        if (!isset($project_id)){

            //Includes the project listing code.
            include('inc/scr/list.php');

        }

    ?>

            
</body>
<?php include('inc/footer.php'); ?>