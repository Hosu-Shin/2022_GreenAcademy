function calc(cb, n1, n2) {
    return cb(n1, n2);
}

function fnSum(n1, n2) {
    return n1 + n2;
}

function fnMulti(n1, n2) {
    return n1 * n2;
}

const result = calc(fnSum, 10, 20);
console.log('result : ' + result);

const result2 = calc(fnMulti, 10, 20);
console.log('result2 : ' + result2);