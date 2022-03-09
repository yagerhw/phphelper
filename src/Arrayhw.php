<?php


namespace Yager\Phphelper;


class Arrayhw
{
    /**
     * 获取二维数组的值
     * @param $array
     * @param $key1
     * @param $key2
     * @param null $default
     * @return mixed|null
     */
    public static function getD2Value($array, $key1, $key2, $default = null)
    {
        return array_key_exists($key1, $array) && array_key_exists($key2, $array[$key1])
            ? $array[$key1][$key2]
            : $default;
    }

    /**
     * 获取 kv 数组
     * @param array $array
     * @param string $column
     * @return array
     */
    public static function generateKV(array $array, string $column): array
    {
        $return = [];

        foreach ($array as $key => $value) {
            $return[$key] = $value[$column];
        }

        return $return;
    }
}