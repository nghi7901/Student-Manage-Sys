<?php
  
namespace App\Enums;
 
enum StudentStatus:string {
    case Active = 'Đang học';
    case Leave = 'Bảo lưu';
    case Suspended = 'Đình chỉ';
    case Drop_out = 'Nghỉ học';

    public static function getArray(): array{
        return[
            'Đang học' => self::Active,
            'Bảo lưu' => self::Leave,
            'Đình chỉ' => self::Suspended,
            'Nghỉ học' => self::Drop_out,
        ];
    }
}