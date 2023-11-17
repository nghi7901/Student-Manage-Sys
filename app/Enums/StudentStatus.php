<?php
  
namespace App\Enums;
 
enum StudentStatus:string {
    case Active = 'Active';
    case Leave = 'Leave';
    case Suspended = 'Suspended';
    case Drop_out = 'Drop out';

    public static function getArray(): array{
        return[
            'Active' => self::Active,
            'Leave' => self::Leave,
            'Suspended' => self::Suspended,
            'Drop out' => self::Drop_out,
        ];
    }
}