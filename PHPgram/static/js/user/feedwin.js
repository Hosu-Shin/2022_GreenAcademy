const url = new URL(location.href);

function getFeedList() {
    if(!feedObj) { return; }
    
    // const urlParam = url.searchParams;
    
    feedObj.showLoading();            
    const param = {
        page: feedObj.currentPage++,
        // iuser: parseInt(urlParam.get('iuser'))
        iuser: url.searchParams.get('iuser')
    }
    fetch('/user/feed' + encodeQueryString(param))
    .then(res => res.json())
    .then(list => {                
        feedObj.makeFeedList(list);                
    })
    .catch(e => {
        console.error(e);
        feedObj.hideLoading();
    });
}
getFeedList(); 

(function() {
    const btnFollow = document.querySelector('#btnFollow');
    const lData = document.querySelector('#lData');
    const myFeed = document.querySelector('#myFeed');
    const follower = document.querySelector('#follower');
    let followCnt = parseInt(follower.dataset.follower);
    let allMyFeed = parseInt(myFeed.dataset.myFeed);

    console.log('total :' + myFeed.dataset.myFeed);

    if(btnFollow) {
        btnFollow.addEventListener('click', function() {
            
        //팔로우 할 유저의 iuser값 구하기
            const param = {
                // toiuser: parseInt(lData.dataset.toiuser)
                toiuser: url.searchParams.get('iuser')
            };
            console.log(param);
        
        //팔로우 기능
            const follow = btnFollow.dataset.follow;
            console.log('follow : ' + follow);

        const followUrl = '/user/follow';

        switch(follow){
            case '1': //팔로우 취소
                fetch(followUrl + encodeQueryString(param), {method: 'DELETE'})
                .then(res => res.json())
                .then(res => {
                    console.log('res : ' + res);
                    if(res.result) {
                    followCnt -= 1;
                    follower.innerText = followCnt;
                    btnFollow.dataset.follow = '0';
                    btnFollow.classList.remove('btn-outline-secondary');
                    btnFollow.classList.add('btn-primary');
                    if(btnFollow.dataset.youme === '1') {
                        btnFollow.innerText = '맞팔로우 하기';
                    } else {
                    btnFollow.innerText = '팔로우';
                    }
                    }
                });
                break;

            case'0': //팔로우 등록
                fetch(followUrl, {
                    method: 'POST',
                    body: JSON.stringify(param)
                })
                .then(res => res.json())
                .then(res => {
                    if(res.result) {
                            followCnt += 1;
                            follower.innerText = followCnt;
                        btnFollow.dataset.follow = '1';
                        btnFollow.classList.remove('btn-primary');
                        btnFollow.classList.add('btn-outline-secondary');
                        btnFollow.innerText = '팔로우 취소';
                    }
                })
                break;
        }

        });
        
    }
})();