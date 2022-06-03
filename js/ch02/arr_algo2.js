// var arr = [2, 6, 10, 11, 22, 1, 7];

var arr = { //자바스크립트에서의 {}는 객체를 의미함
    '0': 2,
    '1': 6,
    '2': 10,
    '3': 11,
    '4': 22,
    '5': 1,
    '6': 7,
    'length' : 7,
    'forEach' : function(cb) {
        //console.log('this : ' + this.length); //this란 객체 나 자신을 의미
        for(var i=0; i<this.length; i++) {
            cb(this[i]);
        }
    }
}
// arr.forEach();

var sum2 = 0;
arr.forEach(function(item) {
    sum2 += item;
});
console.log(`sum2 : ${sum2}`)