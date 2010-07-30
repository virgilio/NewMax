<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

?>
<!-- Calendar -->
<div class="title_calendar"><?php echo $month."/".$year?></div>

<ul class="days_calendar">
    <li>Domingo</li>
    <li>Segunda-feira</li>
    <li>Ter&ccedil;a-feira</li>
    <li>Quarta-feira</li>
    <li>Quinta-feira</li>
    <li>Sexta-feira</li>
    <li>S&aacute;bado</li>
</ul>

<?php
    //Discovering the first week day of the month
    $firstOfMonth = date('N', mktime(0, 0, 0, $month, 1, $year));
    //Days after de start of the month
    $daysToJump = $firstOfMonth % 7;
    //Days in the month
    $daysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));
    //Counter for the visits founded
    $actualVisit = 0;

?>
<ol id="calendar">
    <?php
        //Jumping days of the week
        for($i = 0; $i < $daysToJump; $i++){
            echo "<li></li>";
        }

        //all the days of the month
        for($actualDay = 1; $actualDay < $daysInMonth; $actualDay++){
            echo "<li><span>".$actualDay."</span><ul>";
//            echo date('j', strtotime($monthVisits[$actualVisit]['Visit']['date']));


            while(date('j', strtotime($monthVisits[$actualVisit]['Visit']['date'])) == $actualDay){
                echo "<li class='visit' title='".$monthVisits[$actualVisit]['Contact']['name']."'>".$monthVisits[$actualVisit]['Contact']['client_id']."</li>";
                $actualVisit++;
            }
            //<li class='visit' title='vendedor <br/> aceita <b>html</b>'>Cliente</li>;
            
            echo "</ul></li>";
        }

        //Printing every visit in the right day of the month
//        foreach($monthVisits as $visitToShow)
//            echo "
//                <li>
//                    <span>1</span>
//                    <ul>
//                    <li class='visit' title='vendedor <br/> aceita <b>html</b>'>Cliente</li>
//                </ul>
//            </li>";
    ?>
    <div class="clear"></div>
</ol>

<?php
/*
<li class="monday">
    <span>1</span>
    <ul>
        <li class="visit" title="vendedor <br/> aceita <b>html</b>">Cliente</li>
    </ul>
</li>
*/
?>