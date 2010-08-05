<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

?>
<!-- Calendar -->
<div class="title_calendar">
    <div id="calendar_back">
       <?php
           $backMonth = date('m', mktime(0,0,0,$month-1, 1, $year));
           $backYear = date('Y', mktime(0,0,0,$month-1, 1, $year));
           echo $this->Html->link('<< anterior', array('controller' => 'visits', 'action' => 'calendar_vendor', $backYear, $backMonth));
       ?>
    </div>
    <div id="actualDate">
        <?php echo $month."/".$year?>
    </div>
    <div id="calendar_next">
       <?php
           $nextMonth = date('m', mktime(0,0,0,$month+1, 1, $year));
           $nextYear = date('Y', mktime(0,0,0,$month+1, 1, $year));
           echo $this->Html->link('próximo >>', array('controller' => 'visits', 'action' => 'calendar_vendor', $nextYear, $nextMonth));
       ?>
    </div>
</div>

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
    $daysToJump = ($firstOfMonth % 7) + 1;
    //Days in the month
    $daysInMonth = date('t', mktime(0, 0, 0, $month, 1, $year));
    //Counter for the visits founded
    $actualVisit = 0;
?>
<ol id="calendar">
    <?php
        //Jumping days of the week
        for($i = 1; $i < $daysToJump; $i++){
            echo "<li></li>";
        }

        //all the days of the month
        for($actualDay = 0; $actualDay < $daysInMonth; $actualDay++){
            //POG, não entendi o q está acontecendo e deixei assim pra nao perder tempo
            $temp = $actualDay + 1;
            echo "<li><span>".$temp."</span><ul>";

            while(date('j', strtotime($monthVisits[$actualVisit]['Visit']['date'])) == $actualDay){
                $clientName = $clientsData[$monthVisits[$actualVisit]['Contact']['client_id']];
                $tooltipText = "Contato: ".$monthVisits[$actualVisit]['Contact']['name'];
                $tooltipText = $tooltipText."<br/> E-mail: ".$monthVisits[$actualVisit]['Contact']['email'];
                if( $monthVisits[$actualVisit]['Contact']['phone'] != "" &&
                        $monthVisits[$actualVisit]['Contact']['phone'] != null){
                    $tooltipText = $tooltipText."<br/>Tel: ".$monthVisits[$actualVisit]['Contact']['phone'];
                }

                echo "<li class='visit' title='".$tooltipText."'>".$clientName."</li>";
                $actualVisit++;
            }
            //<li class='visit' title='vendedor <br/> aceita <b>html</b>'>Cliente</li>;

            echo "</ul></li>";
        }

        //Jumping final days of the week
        $daysToJump = 7 - (($daysInMonth + $daysToJump - 1) % 7);
        for($i = 1; $i <= $daysToJump; $i++){
            echo "<li></li>";
        }
    ?>
    <div class="clear"></div>
</ol>