<template>
  <div>
    <p> Count : {{ count }} </p>
    <button type="button" @click="increment"> 증가 </button>
    <p> 카트 상품 수 : {{ cartCount }} </p>
  </div>
</template>

<script>
export default {
    computed: {
        count() {
            return this.$store.state.count;
        },
        cartCount() {
            return this.$store.getters.cartCount;
            //store > index.js에서 cartCount는 매소드지만 값은 index.js에서 넣는거고 여기서는 그냥 가져오는 거 뿐, 
        }
    },
    methods: {
        increment() {
            // this.$store.state.count = 100; //되더라도 쓰지말자
            this.$store.commit('setCount', 200);
        }
    },
}
</script>

<style>

</style>