function sum(n1, n2) {
    return n1 + n2;
}

function sum(n1, n2) {
    console.log(1111);
}

var ddd = sum; // ddd는 1111

function sum(n1, n2) {
    console.log(2222); //ddd는 2222로 바뀜
}

console.log(ddd(10,20));