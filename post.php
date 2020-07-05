
<?php

    //Checks if the admin value has been set.
    if ($_GET["admin"] == "e7596"){

    include('inc/header.php');
    echo "<body>

            <!-- Game post creation form. -->
            <form action=\"inc/scr/post.php\" method=\"post\" enctype=\"multipart/form-data\">
                <table class=\"header_table\">
                    <tr>
                        <td>Create a Post</td>
                    </tr>
                    <tr>
                        <td><input name=\"title\" type=\"text\" placeholder=\"Title...\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"image1\" type=\"file\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"image2\" type=\"file\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"image3\" type=\"file\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"tinyinfo\" type=\"text\" placeholder=\"Info...\"></td>
                    </tr>
                    <tr>
                        <td><textarea name=\"longinfo\" placeholder=\"Description...\"></textarea></td>
                    </tr>
                    <tr>
                        <td><input name=\"language\" type=\"text\" placeholder=\"Language...\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"team\" type=\"number\" placeholder=\"Team...\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"time\" type=\"text\" placeholder=\"Hours\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"date\" type=\"date\" style=\"color:black;\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"button\" type=\"text\" placeholder=\"Button...\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"link\" type=\"text\" placeholder=\"Link...\"></td>
                    </tr>
                    <tr>
                        <td><input name=\"type\" type=\"checkbox\" value=\"Yes\"><label for=\"complete\">Game?</label></td>
                    </tr>
                    <tr>
                        <td><input name=\"complete\" type=\"checkbox\" value=\"Yes\"><label for=\"complete\">Complete?</label></td>
                    </tr>
                    <tr>
                        <td><input name=\"submit\" type=\"submit\" value=\"Submit\"></td>
                    </tr>
                </table>
            </form>

        </body>";
        include('inc/footer.php');

    }

?>