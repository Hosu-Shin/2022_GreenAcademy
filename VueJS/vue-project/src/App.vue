<template>
  <div id="app">
    <TodoHeader></TodoHeader>
    <TodoInput @childAddTodo="addTodo" @openModal="openModal"></TodoInput>
    <TodoList :propsItems="todoItems" @childRemoveTodo="removeTodo"></TodoList>
    <TodoFooter @childClearAllTodo="clearTodo"></TodoFooter>
  </div>
  <AlertModal :show="modalShow" header="알림창" body="내용을 입력해 주세요." @close="modalShow = false"></AlertModal>
</template>

<script>
import TodoHeader from './components/todo/TodoHeader.vue';
import TodoInput from './components/todo/TodoInput.vue';
import TodoList from './components/todo/TodoList.vue';
import TodoFooter from './components/todo/TodoFooter.vue';
import AlertModal from './components/common/AlertModal.vue';
import axios from 'axios';
import DataUtils from './utils/DataUtils';

export default {
  name: 'App',
  data() {
    return {
      todoItems: [],
      cnt: 0,
      modalShow: false,
    }
  },
  methods: {
    //빈칸 입력 시 모달창 띄우기
    openModal() {
      this.modalShow= true;
    },
    // closeModal() {
    //   this.modalShow= false;    
    // },
    
    addTodo(todoItem) { //리스트 추가 
      const param = {
        'todo' : todoItem
      };
      axios.post('/todo/index', param)
      .then(res => {
        if(res.status === 200 && res.data) {
          const item = {
            'itodo' : res.data.result,
            'todo' : todoItem,
            'created_at' : DataUtils.getTimestamp(new Date())
          }
          this.todoItems.push(item);
        }
      })
      
      //localStorage.setItem(todoItem, todoItem);
      /*this.todoItems.push({
        key: this.cnt++,
        value: todoItem
      });*/
    },
    removeTodo(key) { //리스트 하나하나 삭제 (todoItems는 받아올 필요가 없음)
      //localStorage.removeItem(todoItems);
      // this.todoItems.splice(index, 1);

      this.todoItems.forEach( (item, index) => {
          if(item.itodo === key) {
            this.todoItems.splice(index, 1);
            axios.delete(`/todo/index/${item.itodo}`)
            .then(res => {
              console.log(res);
            });
          }        
      });
    },
    clearTodo() { //리스트 전체 삭제
      /*
      // localStorage.clear();
      // this.todoItems = []; // 이렇게 할 경우 주소값이 바뀌기 때문에 아래의 방법 권장
      this.todoItems.splice(0);
      this.cnt = 0;
      */
      axios.delete(`/todo/index`)
      .then(res => {
        if(res.status === 200 && res.data.result) {
          this.todoItems.splice(0);
        }
      });
      
    },
    changeValue() { //등록 순으로 나열되도록 
      const json = JSON.stringify(this.todoItems); //문자열로 변환
      localStorage.setItem('todoItems', json);
      localStorage.setItem('cnt', this.cnt);
    }
  },
  components: {
    TodoHeader,
    TodoInput,
    TodoList,
    TodoFooter,
    AlertModal
  },
  watch: { // watch: 감시하는 역할로, vue에서 제공해 주는 기능
    // changeValue()를 하나하나 다 넣어 줄 필요가 없다
    todoItems: {
      deep: true, //deep: 객체 안의 내용을 바꿀 때 사용
      handler() {
        this.changeValue();
      }
    }
  },
  created() { //지금은 created() 대신 beforeMount()로 사용해도 가능
    
    axios.get('/todo/index')
    .then(res => {
      console.log(res);
      if(res.status === 200 && res.data.length > 0) {
        res.data.forEach(item => {
          this.todoItems.push(item);
        });
      }
    });
    
    /*
    const json = localStorage.getItem("todoItems")
      if(json) {
        const todoItems = JSON.parse(json);
        todoItems.forEach(item => {
          this.todoItems.push(item);       
        });
        const cnt = localStorage.getItem('cnt');
        this.cnt = cnt;
      }
      */
    }
    /*
        if(localStorage.length > 0) {
            for(let i=0; i<localStorage.length; i++ ){
                this.todoItems.push(localStorage.key(i));
            }
        }
    },
    */

}
</script>

<style>
  body { text-align: center; background-color: #f6f6f8; }
  input { border-style: groove; width: 200px; }
  button { border-style: groove; }

  .ctnt { font-size: 1rem; }
  .d-flex { display: flex; }
  .flex-row { flex-direction: row; }
  .flex-col { flex-direction: column; }
  .grow_1 { flex-grow: 1; }
  .justify_content_evenly { justify-content: space-evenly; }
  .shadow { box-shadow: 5px 10px 10px rgba(0, 0, 0, 0.03);}
</style>