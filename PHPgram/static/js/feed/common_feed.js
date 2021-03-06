const feedObj = {
    limit: 20,
    itemLength: 0,
    currentPage: 1,
    swiper: null,
    getfeedUrl: '',
    iuser: 0,
    setScrollInfinity: function() {
    //무한 스크롤(Infinite Scroll) 간단 작업
        window.addEventListener('scroll', e => {
            if(this.isLoading()) {return;}

            const {
                scrollTop,
                scrollHeight,
                clientHeight
            } = document.documentElement   //자바스크립트 구조 분해 할당
        
            if( scrollTop + clientHeight >= scrollHeight - 10 && this.itemLength === this.limit ) {
                this.getFeedList();
            }
        }, { passive: true });
    },
    getFeedList: function() {
        this.itemLength = 0;
        this.showLoading();            
        const param = {
            page: this.currentPage++,
            iuser: this.iuser,
        }
        fetch(this.getfeedUrl + encodeQueryString(param))
        .then(res => res.json())
        .then(list => {       
            this.itemLength = list.length;
            this.makeFeedList(list);                
        })
        .catch(e => {
            console.error(e);
            this.hideLoading();
        });
    },
    refreshSwipe: function() {
        if(this.swiper !== null) { this.swiper = null; }
            this.swiper = new Swiper('.swiper', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                pagination: { el: '.swiper-pagination'},
                allowTouchMove: false,
                direction: 'horizontal',
                loop: false,
            });
    },
    loadingElem: document.querySelector('.loading'),
    containerElem: document.querySelector('#item_container'),

//댓글 더보기 기능
    getFeedCmtList: function(ifeed, divCmtList, spanMoreCmt) {
        fetch(`/feedcmt/index?ifeed=${ifeed}`)
        .then(res => res.json())
        .then(res => {
            if(res && res.length > 0) {
                if(spanMoreCmt) { spanMoreCmt.remove(); }

                divCmtList.innerHTML = null;
                res.forEach(item => {
                    const divCmtItem = this.makeCmtItem(item);
                    divCmtList.appendChild(divCmtItem);
                });
            }
        })
    },

    makeCmtItem: function(item) {
        const divCmtItemContainer = document.createElement('div');
        divCmtItemContainer.className = 'd-flex flex-row align-items-center mb-2 cmtwin';
        
        let src = '/static/img/profile/' + (item.writerimg ? `${item.iuser}/${item.writerimg}` : 'uniCorn.png');
        divCmtItemContainer.innerHTML = `
                                    <div class="circleimg h24 w24 me-1 cmtwin">
                                        <img src="${src}" class="profile w24 pointer profileimg">
                                    </div>
                                    <div class="d-flex flex-row cmtwin">
                                        <div class="pointer me-2 nickNm bold">${item.writer}</div>
                                        <div>${item.cmt} <span class="rem0_7 m-1 c_lightgray">${getDateTimeInfo(item.regdt)}</span></div>
                                    </div>
                                    `;

    //댓글의 유저 클릭하면 해당 유저 feed로 이동
        const cmtwinList = divCmtItemContainer.querySelectorAll('.cmtwin');
        cmtwinList.forEach(el => {
            el.addEventListener('click', () => {
                moveToFeedWin(item.iuser);
            });
        });

        return divCmtItemContainer;
    },
    
    makeFeedList: function(list) {
        if(list.length !== 0) {
            list.forEach(item => {
                const divItem = this.makeFeedItem(item);
                this.containerElem.appendChild(divItem);    
            });
        }

        // if(this.swiper !== null) { this.swiper = null; }
        //     this.swiper = new Swiper('.swiper', {
        //         navigation: {
        //             nextEl: '.swiper-button-next',
        //             prevEl: '.swiper-button-prev'
        //         },
        //         pagination: { el: '.swiper-pagination'},
        //         allowTouchMove: false,
        //         direction: 'horizontal',
        //         loop: false,
        //     });
        
        this.refreshSwipe();
        this.hideLoading();
    },

    makeFeedItem: function(item) {
        console.log(item);
        const divContainer = document.createElement('div');
        divContainer.className = 'item mt-3 mb-3';

        const divTop = document.createElement('div');
        divContainer.appendChild(divTop);

        const regDtInfo = getDateTimeInfo(item.regdt);
        divTop.className = 'd-flex flex-row ps-3 pe-3';
        const writerImg = `<img class="profileimg" src='/static/img/profile/${item.iuser}/${item.mainimg}'
                            onerror='this.error=null;
                            this.src="/static/img/profile/uniCorn.png"'>`;
        
        divTop.innerHTML = `
                            <div class="d-flex flex-column justify-content-center">
                                <div class="circleimg h64 w64 feedwin">${writerImg}</div>
                            </div>
                            <div class="p-3 flex-grow-1">
                                <div><span class="pointer feedwin nickNm bold">${item.writer}</span><span class="rem0_8 m-1"> _${regDtInfo}</span></div>
                                <div class="imgLocation">${item.location === null ? '' : item.location}</div>
                            </div>
                            `;

    //유저 클리하면 해당 유저 feed로 이동
        const feedwinList = divTop.querySelectorAll('.feedwin');
        feedwinList.forEach(el => {
            el.addEventListener('click', () => {
                moveToFeedWin(item.iuser);
            });
        });

        const divImgSwiper = document.createElement('div');
            divContainer.appendChild(divImgSwiper);
            divImgSwiper.className = 'swiper item_img';
            divImgSwiper.innerHTML = `
                <div class="swiper-wrapper align-items-center"></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            `;
        const divSwiperWrapper = divImgSwiper.querySelector('.swiper-wrapper');

    //TODO : imgList forEach 돌릴 예정
        item.imgList.forEach(function(imgObj){
            // const imgObj = item.imgList[0];
            const divSwiperSlide = document.createElement('div');
                divSwiperWrapper.appendChild(divSwiperSlide);
                divSwiperSlide.classList.add('swiper-slide');

            const img = document.createElement('img');
                divSwiperSlide.appendChild(img);
                img.className = 'w100p_mw614 pic';
                img.src = `/static/img/feed/${item.ifeed}/${imgObj.img}`;

                //라이트 박스
                // const lightbox = document.querySelector('#lightbox');
                // const lightboxImage = lightbox.querySelector('#lightboxImage');
                
                // function showLightbox() {
                //     const bigLocation = this.src;
                //     lightboxImage.setAttribute('src', bigLocation);
                //     lightbox.style.display = 'flex';
                // }
                
                // const rowPic = document.querySelectorAll('.pic');
            
                // rowPic.forEach(item => {
                //     item.addEventListener('click', showLightbox);
                // });
         
                // lightbox.addEventListener('click', function() {
                //     this.style.display = 'none';
                // });
        
            img.addEventListener('click', () => {
                const imgBox = document.createElement('div');
                imgBox.classList = 'modal modal-img d-flex pointer imgBox';
                imgBox.tabIndex = '2';
                imgBox.innerHTML = `
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content img-modal-content">
                        <img src="${img.src}">
                    </div>
                    </div>`;
                const main = document.querySelector('main');
                main.appendChild(imgBox);
                imgBox.addEventListener('click', () => {
                    imgBox.remove();
                });
            });
        });



    //좋아요 기능
        const divBtns = document.createElement('div');
        divContainer.appendChild(divBtns);
        divBtns.className = 'favCont p-3 d-flex flex-row';

        const heartIcon = document.createElement('i');
        divBtns.appendChild(heartIcon);
        heartIcon.className = 'fa-heart pointer rem1_5 me-3';
        heartIcon.classList.add(item.isFav === 1 ? 'fas' : 'far');
    
        heartIcon.addEventListener('click', (e) => {
            //item.isFav = 1 - item.isFav;
        
        // 좋아요 숫자 실시간 반영
            let method = 'POST';
            if( item.isFav === 0 ) {
                divFav.classList.remove('d-none');

                item.favCnt = item.favCnt + 1;
                spanFavCnt.innerHTML = `좋아요 ${item.favCnt}개`;
            }
            if( item.isFav === 1 ) {
                //delete (1은 0으로 바꿔줘야 함)
                method = 'DELETE';
                divFav.classList.remove('d-none');
                item.favCnt = item.favCnt - 1;
                spanFavCnt.innerHTML = `좋아요 ${item.favCnt}개`;
                if( item.favCnt === 0 ) {
                    divFav.classList.add('d-none');
                }
            }

            fetch(`/feed/fav/${item.ifeed}`, {
                'method': method,
            }).then(res => res.json())
              .then(res => { 
                    if(res.result) {
                        item.isFav = 1 - item.isFav;
                        if(item.isFav === 0) {
                            heartIcon.classList.remove('fas');
                            heartIcon.classList.add('far');
                        //좋아요 바로 반영 (강사님 풀이)
                            // item.favCnt++;
                            // if(item.favCnt === 0 ) {
                            //     divFav.classList.add('d-none');
                            // }
                        } else {
                            heartIcon.classList.remove('far');
                            heartIcon.classList.add('fas');
                            // item.favCnt++;
                            // divFav.classList.remove('d-none')
                            
                        }
                    } else {
                        alert('좋아요를 할 수 없습니다.');
                    }
                })
                .catch (e => {
                    alert('네트워크에 이상이 있습니다.');
                });
        });
        

    //댓글 아이콘
        const CmtIcon = document.createElement('div');
        divBtns.appendChild(CmtIcon);
        CmtIcon.className = 'pointer me-3';
        CmtIcon.innerHTML = `<svg aria-label="댓글 달기" class="_8-yf5" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                            <path d="M20.656 17.008a9.993 9.993 0 10-3.59 3.615L22 22z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path>
                            </svg>`


    //DM 기능
        const divDm = document.createElement('div');
        divBtns.appendChild(divDm);
        divDm.className = 'pointer';
        divDm.innerHTML = `<svg aria-label="다이렉트 메시지" class="_8-yf5 " color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 24 24" width="24">
                            <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083"></line>
                            <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></polygon>
                            </svg>
                            `;
        divDm.addEventListener('click', e => {
            location.href = `/dm/index?oppoiuser=${item.iuser}`;
        });

    //좋아요 개수
        const divFav = document.createElement('div');
        divContainer.appendChild(divFav);
        divFav.className = 'p-2 d-none';
        
        const spanFavCnt = document.createElement('span');
        divFav.appendChild(spanFavCnt);
        spanFavCnt.className = 'bold';
        spanFavCnt.innerHTML = `좋아요 ${item.favCnt}개`;

        if(item.favCnt > 0 ) { divFav.classList.remove('d-none'); }

        if(item.ctnt !== null && item.ctnt !== '' ) {
            const divCtnt = document.createElement('div');
            divContainer.appendChild(divCtnt);
            divCtnt.innerText = item.ctnt;
            divCtnt.className = 'itemCtnt p-3';
        }


    //댓글 기능
        const divCmtList = document.createElement('div');
        divContainer.appendChild(divCmtList);
        divCmtList.className = 'ms-3';
        
        const divCmt = document.createElement('div');
        divContainer.appendChild(divCmt);
    
        const spanMoreCmt = document.createElement('span');

    if(item.cmt) {
            const divCmtItem = this.makeCmtItem(item.cmt);
            divCmtList.appendChild(divCmtItem);
            

        if(item.cmt.ismore === 1) {
            const divMoreCmt = document.createElement('div');
            divCmt.appendChild(divMoreCmt);
            divMoreCmt.className = 'ms-3 mb-3';

            divMoreCmt.appendChild(spanMoreCmt);
            spanMoreCmt.className = 'pointer rem0_9 c_lightgray';
            spanMoreCmt.innerText = '댓글 더보기...';
            spanMoreCmt.addEventListener('click', e => {
                this.getFeedCmtList(item.ifeed, divCmtList, spanMoreCmt);
            });
        }
    }

        const divCmtForm = document.createElement('div');
        divCmtForm.className = 'd-flex flex-row';
        divCmt.appendChild(divCmtForm);
        
        divCmtForm.innerHTML = `
                                <input type="text" class="flex-grow-1 my_input back_color p-2"placeholder="댓글을 입력하세요...">
                                <button type="button" class="btn btn-outline-primary">등록</button>
                                `;
                                

    //댓글에 엔터치면 등록되도록 이벤트 걸기
        const inputCmt = divCmtForm.querySelector('input');
        inputCmt.addEventListener('keyup', e => {
            if(e.key === 'Enter') {
                btnCmtReg.click();
            }
        });
        const btnCmtReg = divCmtForm.querySelector('button');
        btnCmtReg.addEventListener('click', e => {
            
            const param = {
                ifeed: item.ifeed,
                cmt: inputCmt.value
            };
            fetch('/feedcmt/index', {
                method: 'POST',
                body: JSON.stringify(param)
            })
            .then(res => res.json())
            .then(res => {
                if(res.result) {
                    inputCmt.value = '';
                    this.getFeedCmtList(param.ifeed, divCmtList, spanMoreCmt);
                }
            });
            
        });


        return divContainer;
    },

    showLoading: function() { this.loadingElem.classList.remove('d-none'); },
    hideLoading: function() { this.loadingElem.classList.add('d-none'); },
    isLoading: function() { return !this.loadingElem.classList.contains('d-none'); }
}

//iuser의 feed로 이동
function moveToFeedWin(iuser) {
    location.href = `/user/feedwin?iuser=${iuser}`;
}


(function() {
    const btnNewFeedModal = document.querySelector('#btnNewFeedModal');
    if(btnNewFeedModal) {
        const modal = document.querySelector('#newFeedModal');
        const body =  modal.querySelector('#id-modal-body');
        const frmElem = modal.querySelector('form');
        const btnClose = modal.querySelector('.btn-close');

    //이미지 값이 변하면
        frmElem.imgs.addEventListener('change', function(e) {

            if(e.target.files.length > 0) {
                body.innerHTML = `
                    <div>
                        <div class="d-flex flex-md-row">
                            <div class="flex-grow-1 h-full"><img id="id-img" class="w300"></div>
                            <div class="ms-1 w250 d-flex flex-column">                
                                <textarea placeholder="문구 입력..." class="flex-grow-1 p-1"></textarea>
                                <input type="text" placeholder="위치" class="mt-1 p-1">
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-primary">공유하기</button>
                    </div>
                `;
                const imgElem = body.querySelector('#id-img');

                const imgSource = e.target.files[0]; //e.target은 form 태그 안의 image
                const reader = new FileReader();
                reader.readAsDataURL(imgSource);
                reader.onload = function() {
                imgElem.src = reader.result;
                };

            //공유하기 버튼에 이벤트 걸기
                const shareBtnElem = body.querySelector('button');
                

                shareBtnElem.addEventListener('click', function() {
                    const files = frmElem.imgs.files;

                    const fData = new FormData();
                    for(let i=0; i<files.length; i++) {
                        fData.append('imgs[]', files[i]);
                    }
                    fData.append('ctnt', body.querySelector('textarea').value);
                    fData.append('location', body.querySelector('input[type=text]').value);

                    fetch('/feed/rest', {
                        method: 'post',
                        body: fData
                    }).then(res => res.json())
                        .then(myJson => {
                            console.log(myJson);

                            if(myJson) {                                
                                btnClose.click();

                                const lData = document.querySelector('#lData');
                                const gData = document.querySelector('#gData');
                                if(lData && lData.dataset.toiuser !== gData.dataset.loginiuser) { return; }
                                // 남의 feedWin이 아니라면 화면에 등록!!!

                            //화면에 등록 (글 작성하면 새로고침 안해도 바로 화면에 보이도록 만들기)
                                const feedItem = feedObj.makeFeedItem(myJson);
                                feedObj.containerElem.prepend(feedItem);
                                feedObj.refreshSwipe();
                                window.scrollTo(0, 0);
                            
                            //공유하기 클릭하면 게시물 숫자 바로 반영
                                const myfeed = document.querySelector('#myfeed');
                                let allMyFeed = parseInt(myfeed.dataset.myfeed);
                                myfeed.innerHTML = allMyFeed + 1;

                            }
                        });
                });
            }
        });

    // btnNewFeedModal은 header.php의 a 태그
        btnNewFeedModal.addEventListener('click', function() {
            const selFromComBtn = document.createElement('button');
            selFromComBtn.type = 'button';
            selFromComBtn.className = 'btn btn-primary';
            selFromComBtn.innerText = '컴퓨터에서 선택';
            selFromComBtn.addEventListener('click', function() {
                frmElem.imgs.click();
            });
            body.innerHTML = null;
            body.appendChild(selFromComBtn);
        });
    }

})();