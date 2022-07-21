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
                <tr>
                    <th></th>
                    <th>Products</th>
                    <th>Prices</th>
                    <th>Shipping Costs</th>
                    <th>Additional Charges</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, idx) in productList" :key="product.id">
                    <td>
                        <img v-if="product.path !== null" :src="`/static/img/${product.id}/1/${product.path}`" style="height:50px; width:auto;">
                    </td>
                    <td>{{ product.product_name }}</td>
                    <td>{{ product.product_price }}</td>
                    <td>{{ product.delivery_price }}</td>
                    <td>{{ product.add_delivery_price }}</td>
                    <td>
                        <!--
                        <router-link class="nav-link" :to="{path: '/image_insert', query: {product_id: value.id}}">
                            <button type="button" class="btn btn-info me-1">Image</button>
                        </router-link>
                        -->
                        <button type="button" class="btn btn-info me-1" @click="goToImageInsert(idx)">Image</button>
                        <router-link class="nav-link" :to="{path: '/update', query: {product_id: product.id}}">
                            <button type="button" class="btn btn-warning me-1">Edit</button>
                        </router-link>
                        <button type="button" class="btn btn-danger me-1" @click="deleteProduct(product.id, idx)">Delete</button>
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
            productList: [],
        }
    },
    created() {
        this.getProductList();
    },
    updated() {
        
    },
    methods: {
        async getProductList() {
        this.productList = await this.$get('/api/productList2', {});
        console.log(this.productList);
        },
        goToImageInsert(idx) {
        this.$store.commit('sallerSelectedProduct', this.productList[idx]);
        this.$router.push( {path: '/image_insert'} );
        },
        async deleteProduct(productId, idx) {
            console.log(productId);
            const res = await this.$delete(`/api/productDelete/${productId}`, {});
            if(res.result === 1) {
                // this.product.splice(idx, 1);
                this.productList.remove(idx)
            }
        },
    }
}
</script>

<style>

</style>