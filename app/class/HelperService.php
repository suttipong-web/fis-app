<?php

namespace App\class;

use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Session;
use Illuminate\Support\Facades\DB;

class HelperService
{
    public static function convertDateThaiWithTime($arg, $addtime, $short)
    {
        if (!empty($arg)) {
            //2024-06-25 07:01:07
            $tempDateTime = explode(" ", $arg);
            $tempDate = explode("-",  $tempDateTime[0]);
            $istime = " " . substr($arg, 10, 6);

            if ($short) {
                $thai_months = [1 => 'ม.ค.', 2 => 'ก.พ.', 3 => 'มี.ค.', 4 => 'เม.ย.', 5 => 'พ.ค.', 6 => 'มิ.ย.', 7 => 'ก.ค.', 8 => 'ส.ค.', 9 => 'ก.ย.', 10 => 'ต.ค.', 11 => 'พ.ย.', 12 => 'ธ.ค.',];
            } else {
                $thai_months = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม',];
            }

            $dates =  $tempDate[2];
            $month = $thai_months[(int)$tempDate[1]];
            $year = $tempDate[0] + 543;
            $setdate =  $dates . " " . $month . " " . $year;

            if ($addtime) {
                $setdate = $setdate . " " . $istime;
            }

            return $setdate;
        }
    }

    public static function convertDateThaiNoTime($arg,  $short)
    {
        //2024-06-25 07:01:07
        $tempinput = explode("-", $arg);


        if ($short) {
            $thai_months = [1 => 'ม.ค.', 2 => 'ก.พ.', 3 => 'มี.ค.', 4 => 'เม.ย.', 5 => 'พ.ค.', 6 => 'มิ.ย.', 7 => 'ก.ค.', 8 => 'ส.ค.', 9 => 'ก.ย.', 10 => 'ต.ค.', 11 => 'พ.ย.', 12 => 'ธ.ค.',];
        } else {
            $thai_months = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม',];
        }

        $dates =  $tempinput[2];
        $month = $thai_months[(int)$tempinput[1]];
        $year = $tempinput[0] + 543;

        $setdate =  $dates . " " . $month . " " . $year;
        return $setdate;
    }


    public static function convertDateThai($arg, $addtime, $short)
    {
        //2024-06-25 07:01:07
        $tempinput = explode(" ", $arg);
        $isdate = $tempinput[0];
        $istime = " " . substr($arg, 10, 6);
        if ($short) {
            $thai_months = [1 => 'ม.ค.', 2 => 'ก.พ.', 3 => 'มี.ค.', 4 => 'เม.ย.', 5 => 'พ.ค.', 6 => 'มิ.ย.', 7 => 'ก.ค.', 8 => 'ส.ค.', 9 => 'ก.ย.', 10 => 'ต.ค.', 11 => 'พ.ย.', 12 => 'ธ.ค.',];
        } else {
            $thai_months = [1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม',];
        }

        $date_ =  DateTime::createFromFormat('d/m/Y', $arg);
        $date = Carbon::parse($date_);
        $month = $thai_months[$date->month];
        $year = $date->year + 543;
        if ($addtime) {
            $setdate = $date->format("j $month $year $istime");
        } else {
            $setdate = $date->format("j $month $year");
        }
        return $setdate;
    }

    public function convertDateSqlInsert($dates)
    {
        //15/07/2024
        $temp = explode('/', $dates);
        $result = $temp[2] . '-' . $temp[1] . '-' . $temp[0];
        return $result;
    }

    public function getFullNameCmuAcount($email)
    {
        $result = User::where('email', $email)->first();
        if (!empty($result->positionName2)) {
            $prename = $result->positionName2;
        } else {
            $prename = $result->prename_TH;
        }
        $fullNames = $prename . "  " . $result->firstname_TH . " " . $result->lastname_TH;
        return $fullNames;
    }


    
    public static function testClass(){
        return "ABC";
    }

}
