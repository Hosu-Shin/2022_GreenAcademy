import axios from 'axios';

export default {
    data() {
        return {
            key: '0beecfdd3a0eba0dbb97b9a5772fbf18',
            baseUrl: 'http://www.kobis.or.kr/kobisopenapi/webservice/rest/',
            boxOfficeByDay: 'boxoffice/searchDailyBoxOfficeList.json',
            boxOfficeByWeek: 'boxoffice/searchWeeklyBoxOfficeList.json' //주간 박스오피스
        }
    },
    methods: {
        async $api(url, parameter) {
            return (await axios.get(url, {
                params: parameter
            }).catch(e => {
                console.log(e);
            })).data;
        },
        async getBoxOfficeByDay(targetDt) {
            const parameter = {
                key: this.key,
                targetDt
                // 'target' : targetDt (key값과 변수명이 같다면 윗 줄 처럼 적을 수 있다)
            }
            const url = this.baseUrl + this.boxOfficeByDay;
            return await this.$api(url, parameter);
        },
        getOnlyDateStr(date) {
            const d = new Date(date);
            console.log(d.toDateString());
            return d.toISOString().split('T')[0];
        },
    //주간 박스 오피스
        async getBoxOfficeByWeek(targetDt) {
            const parameter = {
                    key: this.key,
                    targetDt,
                    weekGb : 0
                }
            const url = this.baseUrl + this.boxOfficeByWeek;
            return await this.$api(url, parameter);
        }, 
    }
}