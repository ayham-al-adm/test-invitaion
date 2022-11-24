<?php

namespace App\Services;

use App\Models\Attendance;

class AttendanceService
{
    public function addNew(Array $data, Array $images = [])
    {
        return Attendance::create(array_merge($data, $images));
    }
}
