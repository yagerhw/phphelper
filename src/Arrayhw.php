<?php


namespace Yager\Phphelper;


class Arrayhw
{

    /**
     * 判断 数组array 中的 键key 的值是否为空数组
     * @param $array
     * @param $key
     * @return Returnhw
     */
    public static function isEmpty2d($array, $key): Returnhw
    {
        if (is_array($array) == false) {
            return new Returnhw(1, 'array 不是数组');
        }

        if (array_key_exists($key, $array) == false) {
            return new Returnhw(1, 'array 中不存在 key 键');
        }

        $value = $array[$key];

        if (is_array($value) == false || count($value) == 0) {
            return new Returnhw(1, '键key 的值不为数组或者无元素');
        }

        return new Returnhw(0);
    }

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
     * 获取二维数组的键
     * @param $array
     * @param $d2key
     * @param $d2Value
     * @param $default
     * @return int|mixed|string|null
     */
    public static function getKeyD2($array, $d2key, $d2Value, $default = null)
    {
        if (empty($array)) {
            return $default;
        }

        foreach ($array as $key => $value) {
            if (is_array($value) && array_key_exists($d2key, $value) && $value[$d2key] == $d2Value) {
                return $key;
            }
        }

        return $default;
    }

    /**
     * 获取 kv 数组
     * @param array $array
     * @param string $column
     * @param bool $setEmptyPrefix 是否前置空元素
     * @return array
     */
    public static function kv(array $array, string $column, bool $setEmptyPrefix = false): array
    {
        $return = [];

        if ($setEmptyPrefix) {
            $return[''] = '';
        }

        foreach ($array as $key => $value) {
            $return[$key] = $value[$column];
        }

        return $return;
    }

    /**
     * 弃用，请使用 kv
     * @param array $array
     * @param string $column
     * @return array
     */
    public static function generateKV(array $array, string $column): array
    {
        return self::kv($array, $column);
    }
}