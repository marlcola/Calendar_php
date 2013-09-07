<?php

require_once 'calendar.php';

function h($s){
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}


$ym = isset($_GET["ym"]) ? $_GET["ym"] : date("Y-m");

$cal = new Calendar($ym);
$cal->create();

?>

<!DOCTYPE html>
<html>
    <head lang="ja">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>カレンダー</title>
        <link rel="stylesheet" href="css/style.css" />
        
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th><a href="?ym=<?php echo h($cal->prev()); ?>">&laquo;</a></th>
                    <th colspan="5"><?php echo h($cal->getYearMonth()); ?></th>
                    <th><a href="?ym=<?php echo h($cal->next()); ?>">&raquo;</a></th>
                </tr>
                <tr>
                    <th class="youbi_0">日</th>
                    <th class="youbi_1">月</th>
                    <th class="youbi_2">火</th>
                    <th class="youbi_3">水</th>
                    <th class="youbi_4">木</th>
                    <th class="youbi_5">金</th>
                    <th class="youbi_6">土</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($cal->getWeeks() as $value) {
                    echo $value;
                    
                }
                
                ?>
                
            </tbody>
        </table>
    </body>
</html>
