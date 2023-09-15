<?php

function convertirEnAlphabetFrancaisMajuscule($texte) {
    $conversion = [
        'À' => 'A', 'Â' => 'A', 'Ä' => 'A', 'Á' => 'A', 'Ã' => 'A', 'Ā' => 'A', 'Ă' => 'A', 'Ą' => 'A', 
        'Ǎ' => 'A', 'Ǟ' => 'A', 'Ǡ' => 'A', 'Ȁ' => 'A', 'Ȃ' => 'A', 'Ȧ' => 'A', 'Ⱥ' => 'A', 'ɑ' => 'A', 
        'Ά' => 'A', 'ά' => 'A', 'α' => 'A', 'ᴀ' => 'A', 'Ḁ' => 'A', 'Ạ' => 'A', 'Ả' => 'A', 'Ấ' => 'A', 
        'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 
        'Ặ' => 'A', 'ἀ' => 'A', 'ἁ' => 'A', 'ἂ' => 'A', 'ἃ' => 'A', 'ἄ' => 'A', 'ἅ' => 'A', 'ἆ' => 'A', 
        'ἇ' => 'A', 'Ἀ' => 'A', 'Ἁ' => 'A', 'Ἂ' => 'A', 'Ἃ' => 'A', 'Ἄ' => 'A', 'Ἅ' => 'A', 'Ἆ' => 'A', 
        'Ἇ' => 'A', 'ὰ' => 'A', 'ά' => 'A', 'ᾀ' => 'A', 'ᾁ' => 'A', 'ᾂ' => 'A', 'ᾃ' => 'A', 'ᾄ' => 'A', 
        'ᾅ' => 'A', 'ᾆ' => 'A', 'ᾇ' => 'A', 'ᾈ' => 'A', 'ᾉ' => 'A', 'ᾊ' => 'A', 'ᾋ' => 'A', 'ᾌ' => 'A', 
        'ᾍ' => 'A', 'ᾎ' => 'A', 'ᾏ' => 'A', 'ᾰ' => 'A', 'ᾱ' => 'A', 'ᾲ' => 'A', 'ᾳ' => 'A', 'ᾴ' => 'A', 
        'ᾶ' => 'A', 'ᾷ' => 'A', 'Ᾰ' => 'A', 'Ᾱ' => 'A', 'Ὰ' => 'A', 'Ά' => 'A', 'ᾼ' => 'A',
        'Ɓ' => 'B', 'Ƃ' => 'B', 'Ƀ' => 'B', 'ʙ' => 'B', 'β' => 'B', 'ϐ' => 'B', 'ᴃ' => 'B', 'ᵦ' => 'B', 
        'Ḃ' => 'B', 'Ḅ' => 'B', 'Ḇ' => 'B',
        'Ç' => 'C', '©' => 'C', 'Ć' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Č' => 'C', 'Ƈ' => 'C', 'Ȼ' => 'C', 
        'ʗ' => 'C', 'ᴄ' => 'C', 'Ḉ' => 'C', 'Ç' => 'C','ç' => 'c', 'Ç' => 'C', 'ñ' => 'n',  
        'Ð' => 'D', 'Ď' => 'D', 'Đ' => 'D', 'Ɖ' => 'D', 'Ɗ' => 'D', 'Ƌ' => 'D', 'ᴅ' => 'D', 'ᴆ' => 'D', 
        'Ḋ' => 'D', 'Ḍ' => 'D', 'Ḏ' => 'D', 'Ḑ' => 'D', 'Ḓ' => 'D',
        'È' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ĕ' => 'E', 'Ė' => 'E', 'Ę' => 'E', 'Ě' => 'E', 
        'Ȅ' => 'E', 'Ȇ' => 'E', 'Ȩ' => 'E', 'Ɇ' => 'E', 'Έ' => 'E', 'έ' => 'E', 'ε' => 'E', 'ᴇ' => 'E', 
        'Ḕ' => 'E', 'Ḗ' => 'E', 'Ḙ' => 'E', 'Ḛ' => 'E', 'Ḝ' => 'E', 'Ẹ' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 
        'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'ἐ' => 'E', 'ἑ' => 'E', 'ἒ' => 'E', 
        'ἓ' => 'E', 'ἔ' => 'E', 'ἕ' => 'E', 'Ἐ' => 'E', 'Ἑ' => 'E', 'Ἒ' => 'E', 'Ἓ' => 'E', 'Ἔ' => 'E', 
        'Ἕ' => 'E', 'ὲ' => 'E', 'έ' => 'E', 'Ὲ' => 'E', 'Έ' => 'E', 'É' => 'E',
        'Ƒ' => 'F', 'Ḟ' => 'F', 
        'Ĝ' => 'G', 'Ğ' => 'G', 'Ġ' => 'G', 'Ģ' => 'G', 'Ɠ' => 'G', 'Ǥ' => 'G', 'Ǧ' => 'G', 'Ǵ' => 'G', 
        'ɢ' => 'G', 'ʛ' => 'G', 'Ḡ' => 'G',
        'Ĥ' => 'H', 'Ħ' => 'H', 'Ȟ' => 'H', 'ʜ' => 'H', 'Ή' => 'H', 'ή' => 'H', 'η' => 'H', 'Ḣ' => 'H',
        'Ḥ' => 'H', 'Ḧ' => 'H', 'Ḩ' => 'H', 'Ḫ' => 'H', 'ἠ' => 'H', 'ἡ' => 'H', 'ἢ' => 'H', 'ἣ' => 'H', 
        'ἤ' => 'H', 'ἥ' => 'H', 'ἦ' => 'H', 'ἧ' => 'H', 'Ἠ' => 'H', 'Ἡ' => 'H', 'Ἢ' => 'H', 'Ἣ' => 'H', 
        'Ἤ' => 'H', 'Ἥ' => 'H', 'Ἦ' => 'H', 'Ἧ' => 'H', 'ὴ' => 'H', 'ή' => 'H', 'ᾐ' => 'H', 'ᾑ' => 'H', 
        'ᾒ' => 'H', 'ᾓ' => 'H', 'ᾔ' => 'H', 'ᾕ' => 'H', 'ᾖ' => 'H', 'ᾗ' => 'H', 'ᾘ' => 'H', 'ᾙ' => 'H', 
        'ᾚ' => 'H', 'ᾛ' => 'H', 'ᾜ' => 'H', 'ᾝ' => 'H', 'ᾞ' => 'H', 'ᾟ' => 'H', 'ῂ' => 'H', 'ῃ' => 'H', 
        'ῄ' => 'H', 'ῆ' => 'H', 'ῇ' => 'H', 'Ὴ' => 'H', 'Ή' => 'H', 'ῌ' => 'H',
        'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ĩ' => 'I', 'Ī' => 'I', 'Ĭ' => 'I', 'Į' => 'I', 
        'İ' => 'I', 'Ɩ' => 'I', 'Ɨ' => 'I', 'Ǐ' => 'I', 'Ȉ' => 'I', 'Ȋ' => 'I', 'ɩ' => 'I', 'ɪ' => 'I', 
        'Ί' => 'I', 'ΐ' => 'I', 'Ϊ' => 'I', 'ί' => 'I', 'ι' => 'I', 'ϊ' => 'I', 'ᵻ' => 'I', 'Ḭ' => 'I', 
        'Ḯ' => 'I', 'Ỉ' => 'I', 'Ị' => 'I', 'ἰ' => 'I', 'ἱ' => 'I', 'ἲ' => 'I', 'ἳ' => 'I', 'ἴ' => 'I', 
        'ἵ' => 'I', 'ἶ' => 'I', 'ἷ' => 'I', 'Ἰ' => 'I', 'Ἱ' => 'I', 'Ἲ' => 'I', 'Ἳ' => 'I', 'Ἴ' => 'I', 
        'Ἵ' => 'I', 'Ἶ' => 'I', 'Ἷ' => 'I', 'ὶ' => 'I', 'ί' => 'I', 'ῐ' => 'I', 'ῑ' => 'I', 'ῒ' => 'I', 
        'ΐ' => 'I', 'ῖ' => 'I', 'ῗ' => 'I', 'Ῐ' => 'I', 'Ῑ' => 'I', 'Ὶ' => 'I', 'Ί' => 'I',
        'Ĵ' => 'J', 'Ɉ' => 'J', 'ᴊ' => 'J',
        'Ķ' => 'K', 'Ƙ' => 'K', 'Ǩ' => 'K', 'κ' => 'K', 'ϰ' => 'K', 'ᴋ' => 'K', 'Ḱ' => 'K', 'Ḳ' => 'K', 
        'Ḵ' => 'K', 
        'Ĺ' => 'L', 'Ļ' => 'L', 'Ľ' => 'L', 'Ŀ' => 'L', 'Ł' => 'L', 'Ƚ' => 'L', 'ʟ' => 'L', 'ᴌ' => 'L', 
        'Ḷ' => 'L', 'Ḹ' => 'L', 'Ḻ' => 'L', 'Ḽ' => 'L', 
        'μ' => 'M', 'ᴍ' => 'M', 'Ḿ' => 'M', 'Ṁ' => 'M', 'Ṃ' => 'M', 
        'Ń' => 'N', 'Ņ' => 'N', 'Ň' => 'N', 'Ɲ' => 'N', 'Ǹ' => 'N', 'ɴ' => 'N', 'ν' => 'N', 'Ṅ' => 'N', 
        'Ṇ' => 'N', 'Ṉ' => 'N', 'Ṋ' => 'N',
        'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ō' => 'O', 'Ŏ' => 'O', 'Ő' => 'O', 'Ɵ' => 'O', 
        'Ơ' => 'O', 'Ǒ' => 'O', 'Ǫ' => 'O', 'Ǭ' => 'O', 'Ȍ' => 'O', 'Ȏ' => 'O', 'Ȫ' => 'O', 'Ȭ' => 'O', 
        'Ȯ' => 'O', 'Ȱ' => 'O', 'Ό' => 'O', 'ο' => 'O', 'ό' => 'O', 'ᴏ' => 'O', 'Ṍ' => 'O', 'Ṏ' => 'O', 
        'Ṑ' => 'O', 'Ṓ' => 'O', 'Ọ' => 'O', 'Ỏ' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 
        'Ộ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'ὀ' => 'O', 'ὁ' => 'O', 
        'ὂ' => 'O', 'ὃ' => 'O', 'ὄ' => 'O', 'ὅ' => 'O', 'Ὀ' => 'O', 'Ὁ' => 'O', 'Ὂ' => 'O', 'Ὃ' => 'O', 
        'Ὄ' => 'O', 'Ὅ' => 'O', 'ὸ' => 'O', 'ό' => 'O', 'Ὸ' => 'O', 'Ό' => 'O',
        'Ƥ' => 'P', 'ρ' => 'P', 'ϱ' => 'P', 'ϼ' => 'P', 'ᴘ' => 'P', 'ᴩ' => 'P', 'ᵨ' => 'P', 'Ṕ' => 'P', 
        'Ṗ' => 'P', 'ῤ' => 'P', 'ῥ' => 'P', 'Ῥ' => 'P',
        'Ɋ' => 'Q', 
        '®' => 'R', 'Ŕ' => 'R', 'Ŗ' => 'R', 'Ř' => 'R', 'Ȑ' => 'R', 'Ȓ' => 'R', 'Ɍ' => 'R', 'ʀ' => 'R', 
        'Ṙ' => 'R', 'Ṛ' => 'R', 'Ṝ' => 'R', 'Ṟ' => 'R',
        'Ś' => 'S', 'Ŝ' => 'S', 'Ş' => 'S', 'Š' => 'S', 'Ș' => 'S', 'Ṡ' => 'S', 'Ṣ' => 'S', 'Ṥ' => 'S', 
        'Ṧ' => 'S', 'Ṩ' => 'S', 
        'Ţ' => 'T', 'Ť' => 'T', 'Ŧ' => 'T', 'Ƭ' => 'T', 'Ʈ' => 'T', 'Ț' => 'T', 'Ⱦ' => 'T', 'τ' => 'T', 
        'ᴛ' => 'T', 'Ṫ' => 'T', 'Ṭ' => 'T', 'Ṯ' => 'T', 'Ṱ' => 'T',
        'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ũ' => 'U', 'Ū' => 'U', 'Ŭ' => 'U', 'Ů' => 'U', 'Ű' => 'U', 
        'Ų' => 'U', 'Ư' => 'U', 'Ǔ' => 'U', 'Ǖ' => 'U', 'Ǘ' => 'U', 'Ǚ' => 'U', 'Ǜ' => 'U', 'Ȕ' => 'U', 
        'Ȗ' => 'U', 'Ʉ' => 'U', 'ᴜ' => 'U', 'ᵾ' => 'U', 'Ṳ' => 'U', 'Ṵ' => 'U', 'Ṷ' => 'U', 'Ṹ' => 'U', 
        'Ṻ' => 'U', 'Ụ' => 'U', 'Ủ' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 
        'ù' => 'u', 
        'Ʋ' => 'V', 'ᴠ' => 'V', 'Ṽ' => 'V', 'Ṿ' => 'V',
        'Ŵ' => 'W', 'ᴡ' => 'W', 'Ẁ' => 'W', 'Ẃ' => 'W', 'Ẅ' => 'W', 'Ẇ' => 'W', 'Ẉ' => 'W',
        'χ' => 'X', 'ᵪ' => 'X', 'Ẋ' => 'X', 'Ẍ' => 'X',
        'Ý' => 'Y', 'Ŷ' => 'Y', 'Ÿ' => 'Y', 'Ʊ' => 'Y', 'Ƴ' => 'Y', 'Ȳ' => 'Y', 'Ɏ' => 'Y', 'ʊ' => 'Y', 
        'ʏ' => 'Y', 'Ύ' => 'Y', 'Ϋ' => 'Y', 'ΰ' => 'Y', 'υ' => 'Y', 'ϋ' => 'Y', 'ύ' => 'Y', 'ϒ' => 'Y', 
        'ϓ' => 'Y', 'ϔ' => 'Y', 'Ẏ' => 'Y', 'Ỳ' => 'Y', 'Ỵ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỿ' => 'Y', 
        'ὐ' => 'Y', 'ὑ' => 'Y', 'ὒ' => 'Y', 'ὓ' => 'Y', 'ὔ' => 'Y', 'ὕ' => 'Y', 'ὖ' => 'Y', 'ὗ' => 'Y', 
        'Ὑ' => 'Y', 'Ὓ' => 'Y', 'Ὕ' => 'Y', 'Ὗ' => 'Y', 'ὺ' => 'Y', 'ύ' => 'Y', 'ῠ' => 'Y', 'ῡ' => 'Y', 
        'ῢ' => 'Y', 'ΰ' => 'Y', 'ῦ' => 'Y', 'ῧ' => 'Y', 'Ῠ' => 'Y', 'Ῡ' => 'Y', 'Ὺ' => 'Y', 'Ύ' => 'Y', 
        'Ź' => 'Z', 'Ż' => 'Z', 'Ž' => 'Z', 'Ƶ' => 'Z', 'Ȥ' => 'Z', 'ζ' => 'Z', 'ᴢ' => 'Z', 'Ẑ' => 'Z', 
        'Ẓ' => 'Z', 'Ẕ' => 'Z',
 
    ];

    return strtr($texte, $conversion);
}

?>
