<template>
    <div>
        <h1>BoxOffice By Day</h1>
        <div>
            <input type="date" v-model="selectedDate">
            <button @click="search">검색</button>
        </div>
        <rank-table :list="list" />
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
            const data = await this.getBoxOfficeByDay(targetDt);
            console.log(data);
            this.list = data.boxOfficeResult.dailyBoxOfficeList;
            console.log(this.list);
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