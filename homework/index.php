<?php
    if($_REQUEST['type']!==null) {
        $query = "INSERT INTO homework (UUID, Type, Class, Name, Description, Due) VALUES ('".
            strtotime("now")."','".$_REQUEST['type']."','".$_REQUEST['class']."','".addslashes($_REQUEST['name']).
            "','".addslashes($_REQUEST['description'])."','".$_REQUEST['due']."')";

        $con = mysqli_connect("localhost",$_REQUEST['username'],$_REQUEST['password'],"chris_homework");
        $result = mysqli_query($con, $query);
        header("Location: ./");
    } elseif($_REQUEST['UUID']!==null) {
        $update = "UPDATE homework SET Completed=1 where UUID=".$_REQUEST['UUID'];
        $con = mysqli_connect("localhost","chris_hw","queryHomework","chris_homework");
        $result = mysqli_query($con, $update);
        header("Location: ./");
    }
    //require_once("XML.php");
    $upcoming = "SELECT UUID, type, class, name, description, due, DATEDIFF(due,CURDATE()) 
    as datediff from homework where Completed <> 1 ORDER BY datediff ASC";
    
    $con = mysqli_connect("localhost","chris_hw","queryHomework","chris_homework");
    $result = mysqli_query($con, $upcoming);
    $long = array();
    
    date_default_timezone_set('America/New_York');
    $date_timestamp = strtotime("now");
    $date = new DateTime();
    $date->setTimestamp($date_timestamp);
    
    //$cal = xml2array($url);
    //var_dump($cal);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Homework-n-stuff</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript">
            function refresh() {
                var oldHour = <?php echo $date->format('G') ?>;
                var date = new Date();
                var hour = date.getHours();
                
                if(oldHour != hour) {
                    location.reload();
                }
            }
            
            setInterval("refresh()", 900000);
        </script>
    </head>
    
    <body>
        <div class="container">
            <div class="header" style="min-width:300px;left:0%;">
                <h3>Add a new assignment:</h3>
            </div>
            <div class="header" style="left:33.333%;">
                <h3>Assignments due soon:</h3>
            </div>
            <div class="header" style="left:66.666%;">
                <h3>Things to keep an eye on:</h3>
            </div>
            <div class="addAssignment">
                <form action="index.php" method="post">
                    <table width="auto">
                        <tr>
                            <td style="text-align:right">
                                <label for="username">Username:</label>
                            </td>
                            <td>
                                <input type="text" name="username" size="25" autofocus>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right">
                                <label for="password">Password:</label>
                            </td>
                            <td>
                                <input type="password" name="password" size="25">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right">
                                <label for="type">Type:</label>
                            </td>
                            <td>
                                <select name="type" style="width:185px">
                                        <option value="Assignment">Assignment</option>
                                        <option value="Lab">Lab report</option>
                                        <option value="Paper">Paper</option>
                                        <option value="Presentation">Presentation</option>
                                        <option value="Project">Project</option>
                                        <option value="Reading">Reading</option>
                                        <option value="Sapling">Sapling</option>
                                        <option value="Test">Test</option>
                                        <option value="Misc">Misc</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right">
                                <label for="class">Class:</label>
                            </td>
                            <td>
                                <select name="class" style="width:185px">
                                        <option value="Calc">Calc 3</option>
                                        <option value="Clinic">Clinic</option>
										<option value="Discreet Math">Discreet Math</option>
                                        <option value="Honors">Honors Committee</option>
                                        <option value="Neuroscience">Neuroscience Research</option>
                                        <option value="OChem">OChem</option>
                                        <option value="OChem Lab">OChem Lab</option>
										<option value="Stats 2">Probability and Stats</option>
                                        <option value="Production Effect">Production Effect Research</option>
                                        <option value="Religions of India">Religions of India</option>
                                        <option value="Semsat">Semantic Satiation Research</option>
                                        <option value="Stats Lab">Stats Lab</option>
                                        <option value="Tests and Measures">Tests and Measures</option>
                                        <option value="Misc">Misc</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right">
                                <label for="name">Assignment Name:</label>
                            </td>
                            <td>
                                <input type="text" name="name" size="25">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right;vertical-align: top;">
                                <label for="description">Description:</label>
                            </td>
                            <td>
                                <textarea name="description" cols=20 rows=6></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right">
                                <label for="due">Due Date:</label>
                            </td>
                            <td>
                                <input type="date" name="due" size="25" value="<?php
                                    echo $date->format('Y-m-d');
                                ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:right"><input type="submit" value="Submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="upcoming">
                <?php
                    while($arr = mysqli_fetch_assoc($result)) {
                        if($arr['datediff'] <= 7 && $arr['datediff'] >= -7) {
                            echo '<div id="assignment">
                                <strong class="special">'.$arr["name"].'&nbsp;&nbsp;&nbsp</strong>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="UUID" value="'.$arr['UUID'].'">
                                    <input type="submit" value="Mark Completed">
                                </form><br />'.
                                '<table width="100%">
                                    <tr>
                                        <td class="left">
                                            <strong class="semi">'.$arr['class'].'<br />
                                            '.$arr['type'].'<br />
                                            Due: ';
                                            if($arr['datediff']==0) {
                                                echo 'Today';    
                                            } elseif($arr['datediff']==1) {
                                                echo 'Tomorrow';
                                            } elseif($arr['datediff']==-1) {
                                                echo 'Yesterday';
                                            } elseif($arr['datediff']<-1) {
                                                echo abs($arr['datediff']).' days ago';
                                            } else {
                                                $month = $date->format('n');
                                                $day = $date->format('j')+$arr["datediff"];
                                                $year = $date->format('Y');
                                                echo date("l", mktime(0, 0, 0, $month, $day, $year));
                                            }
                            echo '</strong>
                                        </td>
                                        <td class="right">'.
                                            $arr["description"]
                                        .'</td>
                                    </tr>';
                                    if($arr['datediff'] < 0) {
                                                echo '<tr><td class="overdue" colspan="2" style="text-align:center">
                                                    This assignment is overdue!!!!</td></tr>';
                                    }
                                echo '</table>
                                </div>';
                        } elseif($arr['datediff'] > 7 && $arr['datediff'] <= 21 && $arr['type'] != "Reading") {
                            array_push($long,$arr);
                        }
                    }
                ?>
            </div>
            <div class="projects">
                <?php
                    for($i=0; $i < count($long); $i++) {
                        echo '<div id="assignment">
                                <strong class="special">'.$long[$i]["name"].'&nbsp;&nbsp;&nbsp;</strong>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="UUID" value="'.$long[$i]['UUID'].'">
                                    <input type="submit" value="Mark Completed">
                                </form><br />'.
                                '<table>
                                    <tr>
                                        <td class="left">
                                            <strong class="semi">'.$long[$i]['class'].'<br />
                                            '.$long[$i]['type'].'<br />
                                            Due: ';
                                            if($long[$i]['datediff']<15) {
                                                $month = $date->format('n');
                                                $day = $date->format('j')+$long[$i]["datediff"];
                                                $year = $date->format('Y');
                                                echo 'Next '.date("l", mktime(0, 0, 0, $month, $day, $year));
                                            } else {
                                                echo $long[$i]['datediff'].' days';
                                            }
                                        echo '</strong></td>
                                        <td class="right">'.
                                            $long[$i]["description"]
                                        .'</td>
                                    </tr>
                                </table>
                                <br />
                                </div>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>