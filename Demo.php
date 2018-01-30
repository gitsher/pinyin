<?php
/**
 * @name DEMO
 * @desc 汉字转拼音 
 * @author 张顺(zhangshun@baidu.com)
 */

include 'Pinyin.php';

var_dump(Pinyin_Pinyin::convertPinyin('UTF8-PHP版汉字转拼音'));
var_dump(Pinyin_Pinyin::convertPinyinList('UTF8-PHP版汉字转拼音-重圈', '_'));
var_dump(Pinyin_Pinyin::convertInitalPinyin('UTF8-PHP版汉字转拼音'));
var_dump(Pinyin_Pinyin::convertInitalPinyinList('UTF8-PHP版汉字转拼音-重圈'));
var_dump(Pinyin_Pinyin::convertAllPinyinList('UTF8-PHP版汉字转拼音-重圈', '_'));

echo '------' . "\n";

var_dump(Pinyin_Pinyin::convertPinyin('圈2'));
var_dump(Pinyin_Pinyin::convertPinyinList('圈2', '_'));
var_dump(Pinyin_Pinyin::convertInitalPinyin('圈2'));
var_dump(Pinyin_Pinyin::convertInitalPinyinList('圈2'));
var_dump(Pinyin_Pinyin::convertAllPinyinList('圈2', '_'));

echo  '------' . "\n";

var_dump(Pinyin_Pinyin::convertPinyin('圈'));
var_dump(Pinyin_Pinyin::convertPinyinList('圈', '_'));
var_dump(Pinyin_Pinyin::convertInitalPinyin('圈'));
var_dump(Pinyin_Pinyin::convertInitalPinyinList('圈'));
var_dump(Pinyin_Pinyin::convertAllPinyinList('圈', '_'));
