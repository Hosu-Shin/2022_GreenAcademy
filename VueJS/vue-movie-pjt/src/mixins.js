import axios from 'axios';

export default {
    data() {
        return {
            key: '1a0a7ecf96ad3364d8de70e91560767a',
            baseUrl: 'http://www.kobis.or.kr/kobisopenapi/webservice/rest/',
            boxOfficeByDay: 'boxoffice/searchDailyBoxOfficeList.json',
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
            return d.toISOString().split('T')[0];
        }
    },
}