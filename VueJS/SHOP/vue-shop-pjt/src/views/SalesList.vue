<template>
<div class="mt-3">
    <div class="container">
        <div class="float-end mb-1">
            <router-link class="nav-link" to="/create">
            <button type="button" class="btn btn-dark">
                Registration
            </button>
            </router-link>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr >
                    <th></th>
                    <th>Products</th>
                    <th>Prices</th>
                    <th>Shipping Costs</th>
                    <th>Additional Charges</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr :key="name" v-for="(value, name) of ProductList">
                    <td></td>
                    <td>{{value.product_name}}</td>
                    <td>{{value.product_price}}</td>
                    <td>{{value.delivery_price}}</td>
                    <td>{{value.add_delivery_price}}</td>
                    <td>
                        <button type="button" class="btn btn-info me-1">Image</button>
                        <button type="button" class="btn btn-warning me-1">Edit</button>
                        <button type="button" class="btn btn-danger me-1">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            ProductList: [],
        }
    },
    created() {
    this.getCategoryList();
    },
    methods: {
        async getCategoryList() {
            const productList = await this.$get('/api/productList2', {});
            console.log(productList);
            this.ProductList = productList;
        }
    }

}
</script>

<style>

</style>