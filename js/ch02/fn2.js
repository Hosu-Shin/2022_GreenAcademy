function sum(n1=1, n2=2, n3=3, n4=4) { //defult값은 내가 값을 안 정해 줬을 때는 이 값을 쓰겠다는 말임
    console.log('sum : ' + (n1 + n2 + n3 + n4));
}

sum(); //=1+2+3+4
sum(10); //=10+2+3+4
sum(10, 20); //=10+20+3+4
sum(10, 20, 30);
sum(10, 20, 30, 40);
sum(10, 20, 30, 40, 50); //n5가 없으므로 50은 무시


function multi(n1=null, n2=1, n3=2) { //null=0
    console.log(n1 * n2 * n3);
}
multi();
multi(5);