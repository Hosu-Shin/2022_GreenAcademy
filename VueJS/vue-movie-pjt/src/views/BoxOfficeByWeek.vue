<template>
  <div>
    <h1>Box Office By Week</h1>
    <div>
        <input type="date" v-model="selectedWeek">
        <button @click="search">검색</button>
    </div>
    <div>
        <h4>{{ showRange }}</h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>순위</th>
                <th>제목</th>
                <th>개봉일</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in list" :key="item.movieCd">
                <td>{{ item.rank }}</td>
                <td>{{ item.movieNm }}</td>
                <td>{{ item.openDt }}</td>
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
            selectedWeek: '',
            showRange: '',
        }
    },
    methods: {
        search() {
            const targetDt = this.selectedWeek.replaceAll('-', '');
            this.getDate(targetDt);
            
        },
        async getDate(targetDt) {
            const data = await this.getBoxOfficeByWeek(targetDt);
            this.list = data.boxOfficeResult.weeklyBoxOfficeList;
            this.showRange = data.boxOfficeResult.showRange;
            console.log(data);
        }
    },
    created() {
        const d = new Date();
        d.setDate(d.getDate() - 1);
        this.selectedWeek = this.getOnlyDateStr(d);  
    },
    


}
</script>

<style scope>

</style>