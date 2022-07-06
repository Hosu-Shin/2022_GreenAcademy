const url = new URL(location.href);

if(feedObj) {
    const url = new URL(location.href);
    feedObj.iuser = parseInt(url.searchParams.get('iuser'));
    feedObj.getfeedUrl = '/user/feed';
    feedObj.getFeedList();
}

/*
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
*/ 

(function() {
    const btnFollow = document.querySelector('#btnFollow');
    const lData = document.querySelector('#lData');
   
    //팔로우 팔로워 숫자 변경
    const follower = document.querySelector('#follower');
    // let followCnt = parseInt(follower.dataset.follower);
    
    // data-set 소문자로 받기
    // const myfeed = document.querySelector('#myfeed');
    // let allMyFeed = parseInt(myfeed.dataset.myfeed);
    // console.log('myFeed :' + myfeed);
    // console.log('allMyFeed :' + allMyFeed);
    
    //프로필 사진 수정 작업
    const btnDelCurrentProfilePic = document.querySelector('#DelCurrentProfilePic');
    const btnProfileImgModalClose = document.querySelector('#btnProfileImgModalClose');
    

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
                    // followCnt -= 1;
                    // follower.innerText = followCnt;

                    const Followerval = parseInt(follower.innerText);
                    follower.innerText = Followerval - 1;


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
                        // followCnt += 1;
                        // follower.innerText = followCnt;

                        const Followerval = parseInt(follower.innerText);
                        follower.innerText = Followerval + 1;

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
    
    if(btnDelCurrentProfilePic) {
        btnDelCurrentProfilePic.addEventListener('click', e => {
            fetch('/user/profile', { method: 'DELETE'})
            .then(res => res.json())
            .then(res => {
                if(res.result) {                    
                    const profileImgList = document.querySelectorAll('.profileimg');
                    profileImgList.forEach(item => {
                        item.src = '/static/img/profile/uniCorn.png';
                    });
                }
                btnProfileImgModalClose.click();
            });
        });
    }
})();