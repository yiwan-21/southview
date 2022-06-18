<?php

class User extends dbh {

    public function getAllCase(){
        $sql = 'SELECT * FROM `covid-19 patient`';
        $result = $this-> connect()-> query($sql);
        $numRows = $result->num_rows;
        echo $numRows;
    }

    public function dailyCase(){
        $date = date('Y-m-d');
        $sql = 'SELECT * FROM `covid-19 patient` WHERE Date_Start= \''.$date.'\'';
        $result = $this-> connect()-> query($sql);
        $dailyCase = $result->num_rows;
        echo $dailyCase;
    }

    public function dailyRecovered(){
        $date = date('Y-m-d');
        $sql = 'SELECT * FROM `covid-19 patient` WHERE Date_End= \''.$date.'\'';
        $result = $this-> connect()-> query($sql);
        $dailyRec = $result->num_rows;
        echo $dailyRec;
    }

    public function weeklyCase(){
        $ddate = date('Y-m-d');
        $date = new DateTime($ddate);
        $week = $date-> format('W');
        $sql = 'SELECT * FROM `covid-19 patient` WHERE WEEK(Date_Start) = '. $week .' OR WEEK(Date_End) = '. $week;
        $result = $this-> connect()-> query($sql);
        $weeklyCase = $result->num_rows;
        echo $weeklyCase;
    }

    public function weeklyRecovered(){
        $ddate = date('Y-m-d');
        $date = new DateTime($ddate);
        $day = $date-> format('d');
        $sql = 'SELECT * FROM `covid-19 patient` WHERE DAY(Date_End) = '. $day;
        $result = $this-> connect()-> query($sql);
        $weeklyRec = $result->num_rows;
        echo $weeklyRec;
    }
}
