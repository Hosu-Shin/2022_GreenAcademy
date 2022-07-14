<template>
  <div>
    <h1>Box Office By Week</h1>
    <div>
        <input type="date" v-model="selectedWeek">
        <button @click="search">검색</button>
    </div>
    <div>
        <h4>{{ Weekly }}</h4>
    </div>
    <rank-table v-bind:list="list" />  <!-- props에 있는 이름 사용해야함 -->
  </div>
</template>

<script>
import RankTable from '../components/boxOffice/RankTable.vue';

export default {
    components: {
        RankTable
    },
    data() {
        return {
            list: [],
            selectedWeek: '',
            showRange: '',
            Weekly: ''
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
        
        /*
        //날짜 분리하기 
            const range = data.boxOfficeResult.showRange;
            const arr = range.split('~');
            console.log(arr);
            let startYear = '';
            let startMonth = '';
            let startDate = '';
            const StartDay = [];

            for(let i=0; i<=arr.length; i++){

                let startYear = arr[i].substr(0,4);
                console.log(startYear);
                let startMonth = arr[i].substr(4,2);
                let startDate = arr[i].substr(6,2);
                
                StartDay[i] = startYear + "/" + startMonth + "/" + startDate
            }

            // console.log(startYear + "/" + startMonth + "/" + startDate);
            // const StartDay = startYear[0] + "/" + startMonth + "/" + startDate
            // const EndDay = startYear + "/" + startMonth + "/" + startDate
            // const Weekly = StartDay + " - " + EndDay
            this.Weekly = StartDay[0] + "~" + StartDay[1];
        */
            
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