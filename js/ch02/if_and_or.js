function m1() {
    console.log('-- m1 fn called --');
    return 1;
}

function m2() {
    console.log('-- m1 fn called --');
    return 1;
}

//true: !0(0빼고 다 true), !""(문자 빈칸 아니면 true), true, 객체, 배열
//false: 0, "", false, undefined, null

if(m1() && m2()) {
    console.log('이것은 true일까 false일까'); //m2: 리턴 안 해서 undefined임 
}