//Axis통신
    // function getFeedList() {
    //     if(!feedObj) { return; }
    //     feedObj.showLoading();            
    //     const param = {
    //         page: feedObj.currentPage++
    //     }
    //     fetch('/feed/rest' + encodeQueryString(param))
    //     .then(res => res.json())
    //     .then(list => {                
    //         feedObj.makeFeedList(list);                
    //     })
    //     .catch(e => {
    //         console.error(e);
    //         feedObj.hideLoading();
    //     });
    // }
    // getFeedList(); 
if(Object) {
    feedObj.getfeedUrl = '/feed/rest';
    feedObj.getFeedList();
    feedObj.setScrollInfinity();
}