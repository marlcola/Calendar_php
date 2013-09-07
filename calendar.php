<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calendar
 *
 * @author mori
 */
class Calendar {

    protected $weeks = array();
    protected $timestamp;

    public function __construct($ym){
        
        $this->timestamp = strtotime($ym . "-1");

        if( $this->timestamp === false ){
            $this->timestamp = time();
        }

    }
    
    public function create() {
        $lastDay = date("t", $this->timestamp);

        $youbi = date("w", mktime(0, 0, 0, date("m", $this->timestamp), 1, date("y", $this->timestamp)));

        $week = "";

        $week .= str_repeat('<td></td>', $youbi);

        for($day = 1;
            $day <= $lastDay;
            $day++, $youbi++){
            $week .= sprintf('<td class="youbi_%d">%d</td>', $youbi % 7, $day);

            if( $youbi % 7 == 6 OR $day == $lastDay){

                if($day == $lastDay){

                    $week .= str_repeat('<td></td>', 6 - $youbi % 7);

                }

                $this->weeks[] = '<tr>' . $week . '</tr>';

                $week = '';


            }
        }
    }

    public function getWeeks() {
        return $this->weeks;
    }

    public function getYearMonth() {
        return date('Y-m', $this->timestamp);
    }
    
    public function prev() {
        return date("Y-m", mktime(0, 0, 0, date("m", $this->timestamp)-1, 1, date("y", $this->timestamp)));
    }
    
    public function next() {
        return date("Y-m", mktime(0, 0, 0, date("m", $this->timestamp)+1, 1, date("y", $this->timestamp)));
    }
    
    




}
?>
