sum(1, 2);
sum(1, 2, 3, 4, 5, 6);
sum(1, 2, 3, 4, 5, 6, 2, 3, 4, 5, 6, 2, 3, 4, 5, 6);

function sum() {
    console.log(arguments.length);

    let sum = 0;
    for(var i=0; i<arguments.length; i++) {
        sum += arguments[i];
    }
    console.log('sum : ' + sum);
}