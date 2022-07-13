<template>
<div>
  <h1>DataBinding</h1>
  <table>
    <thead>
        <tr>
            <th>제품명</th>
            <th>가격</th>
            <th>카테고리</th>
            <th>배송료</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(item, idx) in productList" :key="idx">
            <td>{{ item.product_name }}</td>
            <td>{{ numberComma(item.price) }}</td>
            <td>{{ item.category }}</td>
            <td>{{ item.delivery_price }}</td>
        </tr>
    </tbody>
  </table>

  <hr>

  <table>
    <thead>
        <tr>
            <th>제품명</th>
            <th>가격</th>
            <th>카테고리</th>
            <th>배송료</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(item, idx) in productList" :key="idx">
            <product-item :item="item" />
        </tr>
        <productItem :item="item" v-for="(item, idx) in productList" :key="idx" />
    </tbody>
  </table>
</div>
</template>

<script>
import ProductItem from '../components/ProductItems.vue';

export default {
    components: { ProductItem },
    methods: {
        numberComma(num) {
            return String(num).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    },
    data() {
        return {
            productList: [
                {
                product_name: '기계식 키보드',
                price: 25000,
                category: '노트북/태블릿',
                delivery_price: 5000
                }, 
                {
                product_name: '무선 마우스',
                price: 12000,
                category: '노트북/태블릿',
                delivery_price: 3000
                }, 
                {
                product_name: '아이패드',
                price: 725000,
                category: '노트북/태블릿',
                delivery_price: 5000
                }, 
                {
                product_name: '태블릿 거치대',
                price: 32000,
                category: '노트북/태블릿',
                delivery_price: 4000
                }, 
            ]
        }
    }

}
</script>

<style>
    table { font-family: arial, sans-serif; border-collapse: collapse; width: 100%; }
    td, th { border: 1px solid #ddd; text-align: left; padding: 8px; }
</style>