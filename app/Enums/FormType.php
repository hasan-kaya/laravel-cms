<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class FormType extends Enum
{
    const Appointment = 1;
    const Order = 2;
    const Contact = 3;
}
