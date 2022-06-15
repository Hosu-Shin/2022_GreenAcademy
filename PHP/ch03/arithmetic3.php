<?php
    // && : ture 만들기가 힘듬,  false 만들기가 쉬움
    // || : false 만들기가 힘든,  true 만들기가 쉬움, 하나라도 true가 있으면 전부 true뜸 

    if(1 && 1)
    {
        print "<div>나는 진실이다.</div>";
    }
    
    if(1 && 1 && 1 && 0)
    {
        print "나는 진실이다ㅏ.";
    }

    $name = 1;
    if(1 && 1 && 1 && -2 && 'a' && $name)
    {
        print "나는 진실이다ㅏㅏ.";
    }
// 0만 false, 나머지는 다 ture로 잡아준다
// 문자열이 빈칸이면 flase가 뜨지만, 값이 하나라도 있으면 true

print "<br>";

    if(1 || 1 || 1 || 1)
    {
        print "<div>I'm true</div>";
    }
    
    if(1 || 1 || 1 || 0)
    {
        print "I'm truue";
    }
// || 앞의 값이 true면 뒤에 flase여도 다 true띄움
?>

<!-- 논리 연산자 -->