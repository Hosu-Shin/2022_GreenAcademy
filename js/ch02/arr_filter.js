var arr = [2, 6, 10, 11, 22, 1, 7];
var resultArr = arr.filter(function(item, idx) {
    console.log(`${idx}: ${item}`);
    //return true;
    if(item <= 8) {
        return true; //8이하인 새로운 배열을 만들 수 있다 (이것이 filter)
    }
});

console.log(resultArr);

var newArr = [];
newArr.push(10);
newArr.push(12);
console.log(newArr);
/*
var newArr = [];
newArr[0] = 10;
newArr[1] = 12;
newArr[5] = 14;
console.log(newArr);
newArr.length = 1;
console.log(newArr);
*/