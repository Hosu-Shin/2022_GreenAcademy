<template>
    <div>
        <h1>{{ title }}</h1>
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
            pathName: '',
            title: '',
        }
    },
    methods: {
        search() {
            const targetDt = this.selectedDate.replaceAll('-', '');
            this.getData(targetDt);
            console.log(targetDt);
        },
        async getData(targetDt) {
            switch(this.pathName) {
                case 'boxOfficeByDay':
                    this.list = (await this.getBoxOfficeByDay(targetDt)).boxOfficeResult.dailyBoxOfficeList;
                    break;
                case 'boxOfficeByWeek':
                    this.list = (await this.getBoxOfficeByWeek(targetDt)).boxOfficeResult.weeklyBoxOfficeList;
                    break;
            }
        },
    },
    created() { //화면이 켜질 때 최초 한 번만 실행
        const d = new Date();
        d.setDate(d.getDate() - 1);
        this.selectedDate = this.getOnlyDateStr(d);
        console.log(this.selectedDate);
    },
    updated() { //화면 전환시 내용 바뀌는 작업
        this.pathName = this.$route.name;  //router > index.js > routes안의 name: ''이 찍힌다
        console.log(this.pathName);

        switch(this.pathName) {
            case 'boxOfficeByDay':
                this.title = '일별 박스오피스';
                break;
            case 'boxOfficeByWeek':
                this.title = '주간 박스오피스';
                break;

        }
    }
}

</script>

<style scope>
    
</style>