<?php


namespace Yager\Phphelper\example;


use Yager\Phphelper\ConstEnum;

class Case_
{
    use ConstEnum;

    const SIGN_UP = 0;
    const RESET_PASSWORD = 1;
    const CHANGE_PASSWORD = 2;

    public static function haystack(): array
    {
        return [
            [
                'id' => self::SIGN_UP,
                'slug' => 'sign-up',
                'guest' => true
            ],
            [
                'id' => self::CHANGE_PASSWORD,
                'slug' => 'change-password',
                'guest' => false
            ],
            [
                'id' => self::RESET_PASSWORD,
                'slug' => 'reset-password',
                'guest' => true
            ]
        ];
    }
}