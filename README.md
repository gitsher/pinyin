# 汉字转拼音

## PHP版汉字拼音（字符串包含数字、拼音、多音字、首字母等）

### 简单转换
>Pinyin_Pinyin::convertPinyin('UTF8-PHP版汉字转拼音');

>UTF8-PHPbanhanzizhuanpinyin

### 简单转换，自定义连接符 
>Pinyin_Pinyin::convertPinyin('UTF8-PHP版汉字转拼音', '_');

>U_T_F_8_-_P_H_P_ban_han_zi_zhuan_pin_yin

### 首字母转换
>Pinyin_Pinyin::convertInitalPinyin('UTF8-PHP版汉字转拼音');
>UTF8-PHPbhzzpy

### 多音字
>Pinyin_Pinyin::convertPinyinList('UTF8-PHP版汉字转拼音多音字-圈');

>array(  
    'UTF8-PHPbanhanzizhuanpinyinduoyinzi-quan',  
    'UTF8-PHPbanhanzizhuanpinyinduoyinzi-juan',  
	'UTF8-PHPbanhanzizhuanpinyinduoyinzi-juan',  
);

### 多音字首字母
>Pinyin_Pinyin::convertInitalPinyinList('UTF8-PHP版汉字转拼音多音字-圈');

>array(  
    'UTF8-PHPbhzzpydyz-q',  
    'UTF8-PHPbhzzpydyz-j',  
	'UTF8-PHPbhzzpydyz-j',  
);

### 所有转换结果
>Pinyin_Pinyin::convertAllPinyinList('UTF8-PHP版汉字转拼音多音字-圈');

>array (  
  'full' =>   
  array (  
    'UTF8-PHPbanhanzizhuanpinyinduoyinzi-quan',  
    'UTF8-PHPbanhanzizhuanpinyinduoyinzi-juan',  
    'UTF8-PHPbanhanzizhuanpinyinduoyinzi-juan',  
  ),
  'initial' =>   
  array (  
    'UTF8-PHPbhzzpydyz-q',  
    'UTF8-PHPbhzzpydyz-j',  
    'UTF8-PHPbhzzpydyz-j',  
  ),

## 更新
1. 拆解了复杂大方法为多个简单方法；
2. 修复单个汉字或汉字开头转换异常；
3. 去重结果中重复结果
4. 清理冗余判断；
5. 增加自定义分隔符；
6. 增加 Demo 文件；