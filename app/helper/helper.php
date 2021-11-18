<?php
class Helper
{
    public function CustomDateFormat($date)
    {
        if ($date != '') {
            $date = strtotime($date);
            return date('d-M Y', $date);
        }
    }

    public function readMore($text1, $limit  = 200)
    {
        $data = htmlspecialchars($text1);
        if(\strlen($data) <=$limit){
            echo $data;
        }else{
            $data = $data . "";
            $data = substr($data, 0, $limit);
            $data = substr($data, 0, strrpos($data, ' '));
            $data = $data . "... ";
            return $data;
        }
    }
}
