<?php


namespace Drizzle\phpTools\Tools;


class ArrayTools
{
    /**
     * 根据指定值，搜索指定二维数组的指定值，返回其数据
     *
     * @param array $search_array 需搜索数组
     * @param string $search_column 搜索的列
     * @param string $search_value 搜索的值
     * @param bool $search_mode 搜索模式 默认返回第一个匹配结果,否则返回所有匹配结果
     * @param bool $mode 模式 默认不区分数值类型,否则严格区分查询值的类型
     * @return array
     *
     */
    public static function searchTwoArray(array $search_array, string $search_column, string $search_value, bool $search_mode = false, bool $mode = false): array
    {
        if (!$search_array || !$search_column || !$search_value) {
            return [];
        }

        $search = array_column($search_array, $search_column);
        $origin_keys = array_keys($search_array);

        if (!$search_mode) {
            $search_key = array_search($search_value, $search, $mode);
            if ($search_key === false) {
                return [];
            }
            $origin_key = $origin_keys[$search_key];
            return $search_array[$origin_key];
        }

        $returnData = [];
        $search_keys = array_keys($search, $search_value, $mode);
        foreach ($search_keys as $item) {
            $origin_key = $origin_keys[$item];
            $returnData[] = $search_array[$origin_key];
        }
        return $returnData;
    }

}