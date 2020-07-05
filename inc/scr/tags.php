<table class="list_table">
    <tr>
        <td>
            <table>
                <tr>
                    <td class="list_icon">
                        <img class="list_icon" src="img/team.png">
                    </td>
                    <td class="list_tinyinfo">
                        <?php echo $sql_row["project_team"] ?>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td class="list_icon">
                        <img class="list_icon" src="img/lang.png">
                    </td>
                    <td class="list_tinyinfo">
                        <?php echo $sql_row["project_language"] ?>
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td class="list_icon">
                        <img class="list_icon" src="img/date.png">
                    </td>
                    <td class="list_tinyinfo">
                        <?php echo $sql_row["project_date"] ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>