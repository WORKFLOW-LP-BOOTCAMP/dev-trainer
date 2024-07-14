<?php namespace App\Enum;

enum Domain: string
{
    case Data = 'analyst';
    case FullJS = 'full-js';
    case FullPHP = 'full-php';
    case Python = 'full-python';
    case Stat = 'statistic';
}