<template>
    <div>
        <h1>BoxOffice By Day</h1>
        <div>
            <input type="date" v-model="selectedDate">
            <button @click="search">검색</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>순위</th>
                    <th>제목</th>
                    <th>개봉일</th>
                    <th>누적 관객수</th>
                    <th>누적 매출액</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in list" :key="item.movieCd">
                    <td>{{ item.rank }}</td>
                    <td>{{ item.movieNm }}</td>
                    <td>{{ item.openDt }}</td>
                    <td>{{ item.audiAcc }}</td>
                    <td>{{ item.salesAcc }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            list: [],
            selectedDate: '',
        }
    },
    methods: {
        search() {
            const targetDt = this.selectedDate.replaceAll('-', '');
            this.getData(targetDt);
            console.log(targetDt);
        },
        async getData(targetDt) {
            const data = await this.getBoxOfficeByWeek(targetDt);
            // console.log(data);
            this.list = data.boxOfficeResult.daliyBoxOfficeList;
        },
    },
    created() {
        const d = new Date();
        d.setDate(d.getDate() - 1);
        this.selectedDate = this.getOnlyDateStr(d);
        console.log(this.selectedDate);
    },
}

</script>

<style scope>
    
</style>