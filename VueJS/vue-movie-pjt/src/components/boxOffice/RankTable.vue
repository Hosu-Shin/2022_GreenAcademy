<template>
  <table>
        <thead>
            <tr>
                <th>순위</th>
                <th>제목</th>
                <th>개봉일</th>
                <th>누적관객수</th>
                <th>누적매출액</th>
            </tr>
        </thead>
        <tbody>
            <rank-row v-bind:item="item" v-for="item in list" :key="item.movieCd" />
        </tbody>
    </table>
</template>

<script>
import RankRow from '../boxOffice/RankRow.vue';

export default {
    components: {
        RankRow
    },
    props: {
        list: Array     // ['list]로 적어도 가능
    }
}
</script>

<style>

</style>