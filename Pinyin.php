<?php
/**
 * @name Pinyin_Pinyin
 * @desc 汉字转拼音 (仅支持utf8汉字转换拼音，支持包含字母和数组。可以更换带注音的拼音库)
 * @author 张顺(zhangshun@baidu.com)
 */

include 'ChinesePinyin.php';
class Pinyin_Pinyin {
    /**
     * @desc 字符串分割成顺序key单字符一维数组
     * @param string $string
     * @return array
     **/
    private static function splitString($string) {
        $result = array();

        $len = mb_strlen($string);
        while ($len) {
            $result[] = mb_substr($string, 0, 1, 'utf8');
            $string = mb_substr($string, 1, $len, 'utf8');
            $len = mb_strlen($string);
        }

        return $result;
    }

    /**
     * @desc 单字符一维数组转变成二维拼音数组
     * @param array $stringList
     * @return array
     **/
    private static function changePinyinList($stringList) {
        $result = array();

        if (!is_array($stringList)) {
            return $result;
        }

        foreach ($stringList as $string) {
            if ((strlen($string) === 3) && isset(Pinyin_ChinesePinyin::$chinesePinyin[$string])) {
            // 大部分汉字strlen长度为3，在拼音库里。所有读音都取出。
                $result[] = Pinyin_ChinesePinyin::$chinesePinyin[$string];
            } else {
                $result[] = array($string);
            }
        }

        return $result;
    }

    /**
     * @desc 将字符串中汉字转换为完整拼音（不支持多音字)，自定义转换连接符，默认为''
     * @param string $string
     * @param string $separator
     * @return string
     **/
    public static function convertPinyin($string, $separator = '') {
        $result = '';

        if (empty($string)) {
            return $result;
        }

        $stringList = self::splitString($string);
        $pinyinList = self::changePinyinList($stringList);

        $resultList = array();
        foreach ($pinyinList as $pinyin) {
            $resultList[] = $pinyin[0];
        }

        $result = implode($separator, $resultList);
        return $result;
    }


    /**
     * @desc 将字符串中汉字转换为完整拼音数组（支持所有多音字组合)，自定义转换连接符，默认为''
     * @param string $string
     * @param string $separator
     * @return  array
     **/
    public static function convertPinyinList($string, $separator = '') {
        $result = array();

        if (empty($string)) {
            return $result;
        }

        $stringList = self::splitString($string);
        $pinyinList = self::changePinyinList($stringList);

        // 弹出二维数组第一个元素作为起始数组。循环读取剩余数组元素。交叉笛卡儿积拼接生成所有多音字情况一维数组。
        // 将所有可能结果赋值给起始数组，进入下一轮循环。至循环结束。
        $prevPinyin = array_shift($pinyinList);
        foreach ($pinyinList as $pinyin) {
            $tmpPinyinList = array();
            foreach ($prevPinyin as $strPrevPinyin) {
                foreach ($pinyin as $strPinyin) {
                    $tmpPinyinList[] = $strPrevPinyin . $separator . $strPinyin;
                }
            }
            $prevPinyin = $tmpPinyinList;
        }
        $result = array_unique($prevPinyin);
        return $result;
    }

    /**
     * @desc 将字符串中汉字转换为首字母拼音（不支持多音字)，自定义转换连接符，默认为''
     * @param string $string
     * @param string $separator
     * @return string
     **/
    public static function convertInitalPinyin($string, $separator = '') {
        $result = '';

        if (empty($string)) {
            return $result;
        }

        $stringList = self::splitString($string);
        $pinyinList = self::changePinyinList($stringList);

        $resultList = array();
        foreach ($pinyinList as $pinyin) {
            if (ord($pinyin[0]) > 129) {  // 非 a-z 字母
                $resultList[] = $pinyin[0];
            } else {
                $resultList[] = substr($pinyin[0], 0, 1);
            }
        }

        $result = implode($separator, $resultList);
        return $result;
    }

    /**
     * @desc 将字符串中汉字转换为首字母拼音数组（支持所有多音字组合)，自定义转换连接符，默认为''
     * @param string $string
     * @param string $separator
     * @return  array
     **/
    public static function convertInitalPinyinList($string, $separator = '') {
        $result = array();

        if (empty($string)) {
            return $result;
        }

        $stringList = self::splitString($string);
        $pinyinList = self::changePinyinList($stringList);

        // 弹出二维数组第一个元素作为起始数组。循环读取剩余数组元素。交叉笛卡儿积拼接生成所有多音字情况一维数组。
        // 将所有可能结果赋值给起始数组，进入下一轮循环。至循环结束。
        $prevPinyin = array_shift($pinyinList);
        // 处理起始数组，只有一个汉字和汉字开头的情况
        foreach ($prevPinyin as $key => $strPrevPinyin) {
            if (ord($strPinyin) > 129) {  // 非 a-z 字母
                $prevPinyin[$key] = $strPrevPinyin;
            } else {
                $prevPinyin[$key] = substr($strPrevPinyin, 0, 1);
            }
        }
        foreach ($pinyinList as $pinyin) {
            $tmpPinyinList = array();
            foreach ($prevPinyin as $strPrevPinyin) {
                foreach ($pinyin as $strPinyin) {
                    if (ord($strPinyin) > 129) {  // 非 a-z 字母
                        $tmpPinyinList[] = $strPrevPinyin . $separator . $strPinyin;
                    } else {
                        $tmpPinyinList[] = $strPrevPinyin . $separator . substr($strPinyin, 0, 1);
                    }
                }
            }
            $prevPinyin = $tmpPinyinList;
        }
        $result = array_unique($prevPinyin);
        return $result;
    }

    /**
     * @desc 将字符串中汉字转换为完整拼音数组、首字母拼音数组（支持所有多音字组合)，自定义转换连接符，默认为''
     * @param string $string
     * @param string $separator
     * @return  array
     **/
    public static function convertAllPinyinList($string, $separator = '') {
        $result['full'] = self::convertPinyinList($string, $separator);
        $result['inital'] = self::convertInitalPinyinList($string, $separator);
        return $result;
    }
}
