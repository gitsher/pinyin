# ºº×Ö×ªÆ´Òô

##PHP°æºº×ÖÆ´Òô£¨×Ö·û´®°üº¬Êý×Ö¡¢Æ´Òô¡¢¶àÒô×Ö¡¢Ê××ÖÄ¸µÈ£©

###¼òµ¥×ª»»
>Pinyin_Pinyin::ChineseToPinyin('UTF8-PHP°æºº×Ö×ªÆ´Òô');

>UTF8-PHPbanhanzizhuanpinyin

###Ê××ÖÄ¸×ª»»
>Pinyin_Pinyin::ChineseToPinyin('UTF8-PHP°æºº×Ö×ªÆ´Òô', false, true);
>UTF8-PHPbhzzpy

###¶àÒô×Ö
>Pinyin_Pinyin::ChineseToPinyin('UTF8-PHP°æºº×Ö×ªÆ´Òô¶àÒô×Ö-È¦', false, false, true);

>array(  
    'UTF8-PHPbanhanzizhuanpinyinduoyinzi-quan',  
    'UTF8-PHPbanhanzizhuanpinyinduoyinzi-juan',  
	'UTF8-PHPbanhanzizhuanpinyinduoyinzi-juan',  
);

###¶àÒô×ÖÊ××ÖÄ¸
>Pinyin_Pinyin::ChineseToPinyin('UTF8-PHP°æºº×Ö×ªÆ´Òô¶àÒô×Ö-È¦', false, true, true);

>array(  
    'UTF8-PHPbhzzpydyz-q',  
    'UTF8-PHPbhzzpydyz-j',  
	'UTF8-PHPbhzzpydyz-j',  
);

###ËùÓÐ×ª»»½á¹û
>Pinyin_Pinyin::ChineseToPinyin('UTF8-PHP°æºº×Ö×ªÆ´Òô¶àÒô×Ö-È¦', false, true, true, true);

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
