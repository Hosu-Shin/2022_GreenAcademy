<?php
    function getExt($fileName) {
    //확장자만 뽑아오기
        
        $ext = explode(".", $fileName);
        //return end(explode(".", $fileName));

        //return substr($fileName, strrpos($fileName, ".") +1);    
                //substr(추출 대상, 추출 시작 위치, 추출할 문자 개수 ] )
                //strrpos: 오른쪽부터
        //pathinfo($fileName, PATHINFO_EXTENSION);
    
        return end($ext);  
    }
    
    function gen_uuid_v4() { 
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x'
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0x0fff) | 0x4000
        , mt_rand(0, 0x3fff) | 0x8000
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff)
        , mt_rand(0, 0xffff) 
    ); 
}

    function getRandomFile($fileName) {
        return gen_uuid_v4() . "." . getExt($fileName);
    }