<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Model;

class ErrorCode extends Enum
{
    //ComputerCon
    const WRONG_MAC = 100;
    const COMPUTER_ERROR = 101;
    const ANOTHER_PC_LOGGED_IN = 102;

}
