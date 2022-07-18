<template>
    <main class="mt-3">
        <div class="container">
            <h2 class="text-center">_(:3」∠)_</h2>

            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Products</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" v-model="product.product_name">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Price</label>
                <div class="col-md-9">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" v-model="product.product_price">
                        <span class="input-group-text">💸</span>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Shipping Costs</label>
                <div class="col-md-9">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" v-model="product.delivery_price">
                        <span class="input-group-text">💸</span>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Additional Charges</label>
                <div class="col-md-9">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" v-model="product.add_delivery_price">
                        <span class="input-group-text">💸</span>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Category</label>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-auto">
                            <select class="form-select" v-model="cate1" @change="changeCategory1">
                                <option :key="i" v-for="(cate, i) in category1">{{ cate }}</option> <!-- 출력 부분:{{ cate }}와 value값(:value="cate")이 같다면 value는 지워도 된다 -->
                            </select>
                        </div>

                        <div class="col-auto">
                            <select class="form-select" v-model="cate2" @change="changeCategory2">
                                <option :key="i" v-for="(cate, i) in category2">{{ cate }}</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <select class="form-select" v-model="cate3">
                                <option :key="i" v-for="(cate, i) in category3">{{ cate }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Tag</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" v-model="product.tags">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-md-3 col-form-label">Release Date</label>
                <div class="col-md-9">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" v-model="product.outbound_days">
                        <span class="input-group-text">Day Shipping</span>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-6 d-grid p-1">
                    <button type="button" class="btn btn-lg btn-dark" @click="goToList">Cancel</button>
                </div>
                <div class="col-6 d-grid p-1">
                    <button type="button" class="btn btn-lg btn-danger" @click="productInsert">Save</button>
                </div>
            </div>

        </div>
    </main>
</template>

<script>
export default {
    data() {
        return {
            product: {
                product_name: '',
                product_price: 0,
                delivery_price: 0,
                add_delivery_price: 0,
                tags: '',
                outbound_days: 0,
                category_id: 1,
                seller_id: 1,
            },
            categoryList: [],
            category1: [],
            category2: [],
            category3: [],
            cate1: '',
            cate2: '',
            cate3: '',
        };
    },
    created() {
        this.getCategoryList();
    },
    methods: {
        async getCategoryList() {
            const categoryList = await this.$get('/api/categoryList', {}); //get을 mixins에 만들어 준다
            console.log(categoryList);
            this.categoryList = categoryList;

            let oCategory = {}; //const oCategory해도 주소값은 안 바뀌기 때문에 상관없음
            categoryList.forEach(item => {
                oCategory[item.cate1] = 1; //oCategory['전자제품'] = 1;
            });

            const cate1 = [];
            for(const key in oCategory) {
                cate1.push(key);
            }
            this.category1 = cate1;

            const cate2 = categoryList.filter(c => {
                return c.cate1 === cate1[0];
            });
            this.cate1 = cate1[0];
            
            const oCategory2 = {}; // ={} <-이것은 객체
            cate2.forEach(item => {
                oCategory2[item.cate2] = 2; //숫자는 의미 없는 것이므로 아무 숫자나 넣어도 됨다
            });

            const category2 = [];
            for(const key in oCategory2) {
                category2.push(key);
            }
            this.category2 = category2;

        },
    }
}
</script>

<style>

</style>