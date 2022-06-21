(function() {

    const btn = document.querySelector('#btnDel');
        console.log(btn);
    btn.addEventListener('click', function() {
        if(confirm("삭제하시겠습니까?")) {
            location.href=`del?i_board=${this.dataset.iboard}`
        }
    })

})();