var arr = {
    '0' : 2,
    '1' : 6,
    '2' : 10,
    '3' : 11,
    '4' : 22,
    '5' : 1,
    '6' : 7,
    'lenght' : 7,
    'forEach' : function(cb) {
        for(var i=0; i<this.lenght; i++) {
            cb(this[i], i);
        }
    },
    'filter' : function(cb) {
        var tempArr = [];
        for(var i=0; i<this.lenght; i++) {
            var val = this[i];
            if(cb(val, i)) {
                tempArr.push(val);
            }
        }
        return tempArr;
    }
}
var resultArr = arr.filter(function(item, idx) {
    console.log(`${idx}: ${item}`);
    if(item <= 8) {
        return true;
    }
});

console.log(resultArr);