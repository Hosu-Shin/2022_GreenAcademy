// 감싸는 이유 : 스코프를 짧게 하기 위해서^^
(function() {
    const trList = document.querySelectorAll('tbody > tr');

    //dataset 사용 방법 예시
    //const trl = trList[1];
    //console.log(trl.dataset.iboard);

    trList.forEach(item => {
        item.addEventListener('click', function() {
           location.href=`detail?i_board=${this.dataset.iboard}`;
        });
    });
    
    //강사님 풀이
    /*
    trList.forEach(item => {
        item.addEventListener('click', e => {
            location.href = `detail?i_board=${this.dataset.iboard}`;
        })
    })
    */

})();