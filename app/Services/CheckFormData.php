<?php

namespace App\Services;

class CheckFormData
{
    public static function checkGender($pickdata)
    {
        if ($pickdata->gender === 0) {
            $gender = '男性';
        }
        if ($pickdata->gender === 1) {
            $gender = '女性';
        }

        return $gender;
    }

    public static function checkAge($pickdata)
    {
        if ($pickdata->age === 1) {
            $age = '〜19歳';
        }
        if ($pickdata->age === 2) {
            $age = '20〜29歳';
        }
        if ($pickdata->age === 3) {
            $age = '30〜39歳';
        }
        if ($pickdata->age === 4) {
            $age = '40〜49歳';
        }
        if ($pickdata->age === 5) {
            $age = '50〜59歳';
        }
        if ($pickdata->age === 6) {
            $age = '60歳〜';
        }

        return $age;
    }
}
