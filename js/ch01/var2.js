var n1 = 10;
var s1 = '20';
s1 = parseInt(s1); //s1을 int로 형 변환 하는 방법

console.log(n1 + s1);

var s2 = '20';
s2 = Number(s2);
console.log(n1 + s2);

console.log('parseInt ' + parseInt("12a34")); //문자열을 만나는 그 순간부터 변환을 멈춤
console.log('Number : ' + Number("12a34"));