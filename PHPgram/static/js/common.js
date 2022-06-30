function encodeQueryString(params) {
    const keys = Object.keys(params);
    return keys.length
        ? "?" + keys.map(key =>
                            encodeURIComponent(key) + "=" +
                            encodeURIComponent(params[key])
                        ).join("&")
        : "";
}
/*
    map: 길이가 같은 새로운 배열을 만들 때 사용
    [key=params[key]] : 0번방 [page=1], 1번방 [limit=10]
    join("&") : 0번방 1번방을 합치는데 구분자를 &로 사용
    ?page=1&limit=10 이라는 결과값이 나온다
*/


function getDateTimeInfo(dt) {
    const nowDt = new Date();
    const targetDt = new Date(dt);

    const nowDtSec = parseInt(nowDt.getTime() / 1000);
    const targetDtSec = parseInt(targetDt.getTime() / 1000);

    const diffSec = nowDtSec - targetDtSec;
    if(diffSec < 120) {
        return '1분 전';
    } else if(diffSec < 3600) { //분 단위 (60 * 60)
        return `${parseInt(diffSec / 60)}분 전`;
    } else if(diffSec < 86400) { //시간 단위 (60 * 60 * 24)
        return `${parseInt(diffSec / 3600)}시간 전`;
    } else if(diffSec < 2592000) { //일 단위 (60 * 60 * 24 * 30)
        return `${parseInt(diffSec / 86400)}일 전`;
    }
    return targetDt.toLocaleString();
}