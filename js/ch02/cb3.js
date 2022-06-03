function proc(cb, max) {
    for(var i=0; i<max; i++) {
        cb(i);
    }
}

proc(function(item) {
    console.log('noName : ' + item);
}, 5);
//function(item)은 cb가 되고, 5는 max가 된다