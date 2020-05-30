<?php



class Greades{

    
        public static function mark_code($total_marks){

        
                switch ($total_marks) {

                        case $total_marks <= 100 && $total_marks >= 95 :
                               return "A+";
                                break;

                        case $total_marks <= 94 && $total_marks >= 90 :
                                return "A";
                                        break;

                        case $total_marks <= 89 && $total_marks >= 85 :
                                return "B+";
                                        break;        
                                        
                                        
                        case $total_marks <= 79 && $total_marks >= 75 :
                                return "B";
                                        break;

                        case $total_marks <= 74 && $total_marks >= 70 :
                                return "C+";
                                        break;

                        case $total_marks <= 69 && $total_marks >= 65 :
                                return "C";
                                        break;

                        case $total_marks <= 64 && $total_marks >= 65 :
                                return "D+";
                                        break;

                        case $total_marks <= 64 && $total_marks >= 60 :
                                return "D";
                                        break;

                        case $total_marks <= 60  :
                                return "F";
                                        break;
                        
                        default:
                                # code...
                                break;
                }



        }

}