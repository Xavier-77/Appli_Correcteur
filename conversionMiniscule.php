<?php

function convertirEnAlphabetFrancaisMiniscule($texte) {
    $conversion = [
        'a' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a','ā' => 'a', 'ă' => 'a', 'ą' => 'a', 'ǎ' => 'a', 
        'ǟ' => 'a', 'ǡ' => 'a','ȁ' => 'a', 'ȃ' => 'a', 'ȧ' => 'a', 'ᶏ' => 'a', 'ḁ' => 'a', 'ẚ' => 'a', 
        'ạ' => 'a', 'ả' => 'a', 'ấ' => 'a', 'ầ' => 'a','ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'ắ' => 'a', 
        'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'à' => 'a',
        'b' => 'b','ƀ' => 'b', 'ƃ' => 'b', 'ɓ' => 'b', 'ᵬ' => 'b', 'ᶀ' => 'b', 'ḃ' => 'b', 'ḅ' => 'b', 
        'ḇ' => 'b', 
        'c' => 'c','¢' => 'c', 'ć' => 'c', 'ĉ' => 'c', 'ċ' => 'c', 'č' => 'c', 'ƈ' => 'c', 'ȼ' => 'c', 
        'ɕ' => 'c', 'ḉ' => 'c', '￠' => 'c', 
        'd' => 'd', 'ð' => 'd','ď' => 'd', 'đ' => 'd', 'ƌ' => 'd', 'ȡ' => 'd', 'ɖ' => 'd', 'ɗ' => 'd', 
        'ᵭ' => 'd', 'ᶁ' => 'd', 'ᶑ' => 'd', 'ḋ' => 'd', 'ḍ' => 'd', 'ḏ' => 'd', 'ḑ' => 'd', 'ḓ' => 'd',
        'e' => 'e', 'ê' => 'e', 'ë' => 'e', 'ē' => 'e', 'ĕ' => 'e', 'ė' => 'e', 'ę' => 'e', 'ě' => 'e', 
        'ȅ' => 'e', 'ȇ' => 'e', 'ȩ' => 'e', 'ɇ' => 'e', 'ᶒ' => 'e', 'ḕ' => 'e', 'ḗ' => 'e', 'ḙ' => 'e', 
        'ḛ' => 'e', 'ḝ' => 'e', 'ẹ' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 
        'ễ' => 'e', 'ệ' => 'e', 'é' => 'e', 'è' => 'e',
        'f' => 'f', 'ƒ' => 'f', 'ᵮ' => 'f', 'ᶂ' => 'f', 'ḟ' => 'f',
        'g' => 'g', 'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ǥ' => 'g', 'ǧ' => 'g', 'ǵ' => 'g', 
        'ɠ' => 'g', 'ɡ' => 'g', 'ᶃ' => 'g', 'ḡ' => 'g', 
        'h' => 'h', 'ĥ' => 'h', 'ħ' => 'h', 'ȟ' => 'h', 'ɦ' => 'h', 'ḣ' => 'h', 'ḥ' => 'h', 'ḧ' => 'h', 
        'ḩ' => 'h', 'ḫ' => 'h', 'ẖ' => 'h', 
        'i' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ĩ' => 'i', 'ī' => 'i', 'ĭ' => 'i', 'į' => 'i', 
        'ı' => 'i', 'ǐ' => 'i', 'ȉ' => 'i', 'ȋ' => 'i', 'ɨ' => 'i', 'ᵢ' => 'i', 'ᶖ' => 'i', 'ḭ' => 'i', 
        'ḯ' => 'i', 'ỉ' => 'i', 'ị' => 'i',
        'j' => 'j', 'ĵ' => 'j', 'ǰ' => 'j', 'ȷ' => 'j', 'ɉ' => 'j', 'ɟ' => 'j', 'ʄ' => 'j', 'ʝ' => 'j',
        'ķ' => 'k', 'ĸ' => 'k', 'ƙ' => 'k', 'ǩ' => 'k', 'ᶄ' => 'k', 'ḱ' => 'k', 'ḳ' => 'k', 'ḵ' => 'k',
        'k' => 'k',
        'l' => 'l', 'ĺ' => 'l', 'ļ' => 'l', 'ľ' => 'l', 'ŀ' => 'l', 'ł' => 'l', 'ƚ' => 'l', 'ȴ' => 'l', 
        'ɫ' => 'l', 'ɬ' => 'l', 'ɭ' => 'l', 'ᶅ' => 'l', 'ḷ' => 'l', 'ḹ' => 'l', 'ḻ' => 'l', 'ḽ' => 'l',
        'm' => 'm', 'ɱ' => 'm', 'ᵯ' => 'm', 'ᶆ' => 'm', 'ḿ' => 'm', 'ṁ' => 'm', 'ṃ' => 'm',
        'n' => 'n', 'ń' => 'n', 'ņ' => 'n', 'ň' => 'n', 'ŉ' => 'n', 'ƞ' => 'n', 'ǹ' => 'n', 'Ƞ' => 'n', 
        'ȵ' => 'n', 'ɲ' => 'n', 'ɳ' => 'n', 'ᵰ' => 'n', 'ᶇ' => 'n', 'ṅ' => 'n', 'ṇ' => 'n', 'ṉ' => 'n', 
        'ṋ' => 'n',
        'o' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ō' => 'o', 'ŏ' => 'o', 'ő' => 'o', 'ơ' => 'o', 
        'ǒ' => 'o', 'ǫ' => 'o', 'ǭ' => 'o', 'ȍ' => 'o', 'ȏ' => 'o', 'ȫ' => 'o', 'ȭ' => 'o', 'ȯ' => 'o', 
        'ȱ' => 'o', 'ɵ' => 'o', 'ṍ' => 'o', 'ṏ' => 'o', 'ṑ' => 'o', 'ṓ' => 'o', 'ọ' => 'o', 'ỏ' => 'o', 
        'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 
        'ỡ' => 'o', 'ợ' => 'o',
        'p' => 'p', 'ƥ' => 'p', 'ᵱ' => 'p', 'ᵽ' => 'p', 'ᶈ' => 'p', 'ṕ' => 'p', 'ṗ' => 'p', 'q' => 'q', 
        'ɋ' => 'q' , 'ʠ' => 'q' , 
        'r' => 'r', 'ŕ' => 'r', 'ŗ' => 'r', 'ř' => 'r', 'ȑ' => 'r', 'ȓ' => 'r', 'ɍ' => 'r', 'ɼ' => 'r', 
        'ɽ' => 'r', 'ɾ' => 'r', 'ᵣ' => 'r', 'ᵲ' => 'r', 'ᵳ' => 'r', 'ᶉ' => 'r', 'ṙ' => 'r', 'ṛ' => 'r', 
        'ṝ' => 'r', 'ṟ' => 'r' , 
        's' => 's', 'ś' => 's', 'ŝ' => 's', 'ş' => 's', 'š' => 's', 'ș' => 's', 'ȿ' => 's', 'ʂ' => 's', 
        'ᵴ' => 's', 'ᶊ' => 's', 'ṡ' => 's', 'ṣ' => 's', 'ṥ' => 's', 'ṧ' => 's', 'ṩ' => 's', 
        't' => 't', 'ţ' => 't', 'ť' => 't', 'ŧ' => 't', 'ƫ' => 't', 'ƭ' => 't', 'ț' => 't', 'ȶ' => 't', 
        'ʈ' => 't', 'ᵵ' => 't', 'ṫ' => 't', 'ṭ' => 't', 'ṯ' => 't', 'ṱ' => 't', 'ẗ' => 't', 
        'u' => 'u', 'ú' => 'u', 'û' => 'u', 'ũ' => 'u', 'ū' => 'u', 'ŭ' => 'u', 'ů' => 'u', 'ű' => 'u', 
        'ų' => 'u', 'ư' => 'u', 'ǔ' => 'u', 'ǖ' => 'u', 'ǘ' => 'u', 'ǚ' => 'u', 'ǜ' => 'u', 'ȕ' => 'u', 
        'ȗ' => 'u', 'ʉ' => 'u', 'ᵤ' => 'u', 'ᶙ' => 'u', 'ṳ' => 'u', 'ṵ' => 'u', 'ṷ' => 'u', 'ṹ' => 'u', 
        'ṻ' => 'u', 'ụ' => 'u', 'ủ' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 
        'v' => 'v', 'ʋ' => 'v', 'ᵥ' => 'v', 'ᶌ' => 'v', 'ṽ' => 'v', 'ṿ' => 'v',
        'w' => 'w', 'ŵ' => 'w', 'ẁ' => 'w', 'ẃ' => 'w', 'ẅ' => 'w', 'ẇ' => 'w', 'ẉ' => 'w', 'ẘ' => 'w',
        'x' => 'x', 'ᶍ' => 'x', 'ẋ' => 'x', 'ẍ' => 'x', 
        'y' => 'y', 'ý' => 'y', 'ÿ' => 'y', 'ŷ' => 'y', 'ƴ' => 'y', 'ȳ' => 'y', 'ɏ' => 'y', 'ẏ' => 'y', 
        'ẙ' => 'y', 'ỳ' => 'y', 'ỵ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỿ' => 'y',
        'z' => 'z', 'ź' => 'z', 'ż' => 'z', 'ž' => 'z', 'ƶ' => 'z', 'ȥ' => 'z', 'ɀ' => 'z', 'ʐ' => 'z', 
        'ʑ' => 'z', 'ᵶ' => 'z', 'ᶎ' => 'z', 'ẑ' => 'z', 'ẓ' => 'z', 'ẕ' => 'z',
        // à valider d'abord
        '¹' => '1', '²' => '2', '³' => '3', '·' => '.', '¸' => ',', '´' => ' ', '｡' => '.', ' ､' => ',',
        '`' => ' ', '｀' => ' ', '｟' => '(', '｠' => ')', 'π' => 'PI','ϖ' => 'PI', 'ᴨ' => 'PI', 'ψ' => 'PSI', 
        'ᴪ' => 'PSI', 'ǣ' => 'ae', 'ǽ' => 'ae', 'Ǣ' => 'AE', 'Ǽ' => 'AE', 'ᴁ' => 'AE', 'ɸ' => 'PHI', 'φ' => 'PHI', 
        'ϕ' => 'PHI', 'ᵩ' => 'PHI', 'Ǻ' => 'A', 'ǻ' => 'a', '＄' => 'S', '¦' => '|', '￤' => '|', '￨' => '|',
        '_' => ' ', '-' => ' ', '« ' => ' ', '»' => ' ', '"' => ' ',  '^' => ' ', '°' => ' ', '“' => ' ', 
        '”' => ' ', '['=> ' ', 'Œ' => 'OE', ']' => ' ', '«' => ' ', 'ä' => 'a', 'ö' => 'o', 'ü' => 'u', 'œ' => 'oe'
        
    ];

    return strtr($texte, $conversion);
}

?>