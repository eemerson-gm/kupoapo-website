<div class="project_table">

    <!-- Selects a list of project previews from the database. -->
    <?php

        //Queries the database from projects.
        $sql_command = "SELECT project_id, project_title, project_image1, project_tinyinfo, project_language, project_complete, project_team, project_date FROM projects WHERE project_type = ".$project_type.";";
        $sql_results = $database_connection->query($sql_command);

        //Checks if the results were not empty.
        if ($sql_results->num_rows > 0){

            //Loops through each result.
            while($sql_row = $sql_results->fetch_assoc()){

                //Creates a space for the project preview.
                echo "<div class=\"project_column\" onclick=\"window.location='./projects.php?id=".$sql_row["project_id"]."'\">
                        <table>
                            <tr>
                                <td class=\"list_preview\">
                                    <img class=\"project_image\" src=\"".$sql_row["project_image1"]."\">
                                </td>
                            </tr>
                            <tr>
                                <td class=\"list_title\">
                                    ".$sql_row["project_title"]."
                                </td>
                            </tr>
                        </table>";
                include("tags.php");
                echo "</div>";

            }

        }

    ?>

</div>