<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        define("TITLE", "Search Family");
        include_once("Common/headurls.php");
    ?>
    <style>
        #members_table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #members_table td,
        #members_table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #members_table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
        }
    </style>
</head>

<body class=''>
    <?php
        include_once("Common/header.php");
    ?>

    <!-- Nav bar -->
    <?php
        include_once("Common/sidenav.php");
    ?>
    <div class='w3-main w3-white' style="margin-left:300px;">
        <div style='height:80px;'>
            <!-- Blank space for top bar -->
        </div>
        <div class='w3-light-gray w3-padding'>
            <div class='w3-center w3-xlarge w3-padding w3-margin-top w3-text-dark-gray'>
                Family List
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container' style=''>
                <div class='w3-white w3-round' style='padding:32px 16px;'>
                    <table id='members_table' class='w3-padding'>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Members</th>
                            <th>Operations</th>
                        </tr>
                        <?php
                            while($family = $families->fetch_assoc()){
                        ?>
                        <tr>
                            <td>
                                F.<?php echo $family['f_id']  ?>
                            </td>
                            <td>
                                <?php echo $family['f_name']  ?>
                            </td>
                            <td>
                                <?php echo $family['f_members']  ?>
                            </td>
                            <td>
                                <button class='w3-button kel-hover w3-round w3-red' title='Remove family'>
                                    <i class='fa fa-times'></i>
                                </button>
                                <a href="family<?php echo $url_extension ?>?id=<?php echo $family['f_id'] ?>">
                                    <button class='w3-button kel-hover w3-round w3-blue' title='View Family'>
                                        <i class='fa fa-eye'></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php
                                    }

                                ?>
                    </table>
                </div>
            </div>
            <hr style='border-bottom:0.5px solid gray;'>
            <hr style='border-bottom:0.5px solid gray;'>
            <div class='w3-container w3-center w3-padding'>
                &reg; Patients Record management system By Kushang Shah
            </div>
        </div>
    </div>

</body>

</html>