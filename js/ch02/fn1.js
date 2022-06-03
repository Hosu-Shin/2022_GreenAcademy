function sum(n1, n2) {
    return n1 + n2;
}

function printSum(n1, n2) {
    console.log('sum : ' + (n1 + n2));
}

var result = sum(10, 20);
console.log('result : ' + result);

result = sum(10, 20, 30);
console.log('result : ' + result);

result = sum(10);
console.log('result : ' + result);

result = printSum(100, 200);
console.log('result : ' + result);