<template>
    <td>{{ item.product_name }}</td>
    <td>{{ numberComma(item.price) }}</td>
    <td>{{ item.category }}</td>
    <td>{{ item.delivery_price }}</td>

</template>

<script>
export default {
    props: {
        item: Object
    },
    computed: {
        getPrice() {
            return this.numberComma(this.item.price);
        },
        getDeliveryPrice() {
            return this.numberComma(this.item.delivery_price);
        }
    },
    methods: {
        numberComma(num) {
            return String(num).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
}
</script>

<style>

</style>