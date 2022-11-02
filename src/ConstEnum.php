<?php


namespace Yager\Phphelper;

/**
 * Trait ConstEnum
 *
 * const a
 * const b
 * const c
 *
 * [
 *      [
 *          'id' => 'a',
 *          'name' => 'an',
 *          'color' => 'red'
 *      ],
 *      [
 *          'id' => 'b',
 *          'name' => 'bang',
 *          'color' => 'red'
 *      ],
 *      [
 *          'id' => 'c',
 *          'name' => 'chang',
 *          'color' => 'black'
 *      ],
 * ]
 *
 * @package Yager\Phphelper
 */
trait ConstEnum
{
    /**
     * example
     * key: name
     * return: ['a' => 'an', 'b' => 'bang', 'c' => 'chang']
     *
     * @param string $key
     * @return array
     */
    public static function columns(string $key): array
    {
        return array_column(self::haystack(), $key, 'id');
    }

    /**
     * example
     * key: color
     * value: black
     * return: c
     *
     * @param string $key
     * @param $value
     * @return false|int|string
     */
    public static function getEnumByColumn(string $key, $value)
    {
        return array_search($value, self::columns($key));
    }

    /**
     * example
     * enum: b
     * key: name
     * return: bang
     *
     * @param $enum
     * @param $key
     * @return mixed|null
     */
    public static function getColumnByEnum($enum, $key)
    {
        $array = self::columns($key);
        return array_key_exists($enum, $array) ? $array[$enum] : null;
    }

    /**
     * example
     * key: name
     * filterKey: color
     * filterValue: red
     * return: ['a' => 'an', 'b' => 'bang']
     *
     * @param $key
     * @param $filterKey
     * @param $filterValue
     * @return array
     */
    public static function getFilteredColumns($key, $filterKey, $filterValue)
    {
        $array = [];
        foreach (self::haystack() as $k => $v) {
            if ($v[$filterKey] === $filterValue) {
                $array[$k] = $v;
            }
        }

        return array_column($array, $key, 'id');
    }
}
