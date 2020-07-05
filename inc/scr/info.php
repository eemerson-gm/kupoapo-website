
<!-- Selects a list of project previews from the database. -->
<?php

    //Queries the database from projects.
    $sql_command = "SELECT project_title, project_image1, project_image2, project_image3, project_tinyinfo, project_longinfo, project_language, project_team, project_complete, project_date, project_button, project_link FROM projects WHERE project_id = ?";
    $sql_statement = mysqli_stmt_init($database_connection);

    //Checks if the statement can be prepared.
    if (mysqli_stmt_prepare($sql_statement, $sql_command)){

        //Queries the database for the project.
        mysqli_stmt_bind_param($sql_statement, "i", $project_id);
        mysqli_stmt_execute($sql_statement);
        $sql_results = mysqli_stmt_get_result($sql_statement);

        //Checks if the results were not empty.
        if ($sql_results->num_rows > 0){

            //Gets the row of sql information.
            $sql_row = mysqli_fetch_assoc($sql_results);

            //Creates a space for the project preview.
            echo "
                <div class=\"info_divider\">
                    <h1 class=\"info_title\">".$sql_row["project_title"]."</h1>
                    <p class=\"info_tinyinfo\">".$sql_row["project_tinyinfo"]."</p>
                </div>
                <div class=\"info_divider\">
                    <table class=\"info_table\">
                        <tr>
                            <td class=\"info_preview\">
                                <img class=\"info_image\" src=\"".$sql_row["project_image1"]."\">
                            </td>
                            <td class=\"info_preview\">
                                <img class=\"info_image\" src=\"".$sql_row["project_image2"]."\">
                            </td>
                            <td class=\"info_preview\">
                                <img class=\"info_image\" src=\"".$sql_row["project_image3"]."\">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class=\"info_divider\">
                    <p class=\"info_longinfo\">".$sql_row["project_longinfo"]."</p>
                </div>
                ";

                //Checks if the button name is defined.
                if (!empty($sql_row["project_button"])){
                    echo "<div class=\"info_divider\">
                        <input type=\"button\" class=\"info_button\" onclick=\"location.href='".$sql_row["project_link"]."';\" value=\"".$sql_row["project_button"]."\" />
                    </div>";
                }
                
                echo "<div class=\"info_divider\">";
                include("tags.php");
                echo "</div>";

        }

    }

?>