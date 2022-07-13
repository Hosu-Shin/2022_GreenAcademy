<template>
    <div>
        <h1>이벤트 클릭</h1>
        <button @click="increaseCnt(); printConsole()">Add 1</button>
        <p>The counter is : {{ cnt }}</p>
    </div>
    <div>
        {{ selectedValue }}
        <select v-model="selectedValue" @change="changeSelect">
            <option>서울</option>
            <option>부산</option>
            <option>제주</option>
        </select>
    </div>
    <div>
        {{ txtVal }}
        <input type="txtVal" v-model="txtVal" @keyup="changetxtVal" @keyup.enter="enterTxtVal">
        <!-- 값 넣는 동시에 출력하는 건 keyup -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            cnt: 0,
            selectedValue: '',
            txtVal: '',
        }
    },
    methods: {
        increaseCnt() {
            this.cnt++;
        },
        printConsole() {
            console.log(this.cnt);
        },
        changeSelect() {
            alert(this.selectedValue);
        },
        changetxtVal() {
            console.log(this.txtVal);
        },
        enterTxtVal() {
            console.log('Enter!!!');
        },
    },
}
</script>

<style>

</style>