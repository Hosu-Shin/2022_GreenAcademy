<template>
    <div class = "inputBox shadow">
        <input type="text" v-model="newTodoItem" @keyup.enter="addTodo" placeholder="Type what you have to do">
        <span class="addContainer" @click="addTodo">
            <i class="addBtn fas fa-plus" aria-hidden="true"></i>
        <!-- <button @click="addTodo">추가</button> -->
        </span>
    </div>
</template>

<script>
export default {
    data() {
        return {
            newTodoItem: ''
        }
    },
    methods: {
        addTodo() {
            if(this.newTodoItem.trim() !== '') { 
            const value = this.newTodoItem && this.newTodoItem.trim(); //trim : 양쪽에 있는 빈칸을 지우는 것
            // localStorage.setItem(value, value);
            this.$emit('childAddTodo', value); //$는 vue에서 특별한 일을 한다고 생각하면됨
            } else {
                this.$emit('openModal');
            }
            this.newTodoItem = '';
            
            
        }
    }
}
</script>

<style scope>
    input:focus { outline: none; }
    .inputBox {
        background-color: white;
        height: 50px;
        line-height: 50px;
        border-radius: 5px;
        display: flex;
    }
    .inputBox input { border-style: none; font-size: 0.9rem; flex-grow: 1; padding: 0 10px;}
    .addContainer { background: linear-gradient(to right, #6478fb, #8763fb); width: 3rem; border-radius: 0 5px 5px 0; }
    .addContainer > .addBtn { color: white; }
</style>