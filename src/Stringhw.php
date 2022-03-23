<?php


namespace Yager\Phphelper;


class Stringhw
{

    /**
     * 随机字符串
     * @param int $length 长度
     * @return string
     */
    public static function random($length = 12): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * 自动为 url 加上链接
     * @param string $string
     * @return string
     */
    public static function autolink(string $string): string
    {
        $pattern = '/(((http[s]?:\/\/(.+(:.+)?@)?)|(www\.))[a-z0-9](([-a-z0-9]+\.)*\.[a-z]{2,})?\/?[a-z0-9.,_\/~#&=:;%+!?-]+)/is';
        $string = preg_replace($pattern, ' <a href="$1" class="string-autolink" target="_blank">$1</a>', $string);
        $string = preg_replace('/href="www/', 'href="http://www', $string);
        return $string;
    }

}