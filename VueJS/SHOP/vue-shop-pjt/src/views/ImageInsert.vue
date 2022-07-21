<template>
    <main class="mt-3">
    <div class="container">
        <h2 class="text-center">Image</h2>

        <div class="mb-3 row">
            <label for="" class="col-md-3 col-form-label">Products ID</label>
            <div class="col-md-9">{{ productDetail.id }}</div>
        </div>
        
        <div class="mb-3 row">
            <label for="" class="col-md-3 col-form-label">Products</label>
            <div class="col-md-9">{{ productDetail.product_name }}</div>
        </div>
        
        <div class="mb-3 row">
            <label for="" class="col-md-3 col-form-label">ThumbNail</label>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-2" 
                          :key="item.id" v-for="item in productImage.filter( c => c.type === 1)">
                        <div class="position-relative">
                            <img :src="`static/img/${item.product_id}/${item.type}/${item.path}`" class="img-fluid">
                            <div class="position-absolute top-0 end-0" style="cursor:pointer;"
                                @click="deleteImg(item);">X</div>
                        </div>
                    </div>
                </div>
                <input type="file" class="form-control" accept="image/png,image/jpeg"
                    @change="uploadFile($event.target.files, 1)">
                <div class="alert alert-secondary" role="alert">
                    <ul>
                        <li>Image Size : 350 * 350</li>
                        <li>File Size : Under 1MB</li>
                        <li>File Extension : Only png, jpg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-md-3 col-form-label">Product Image</label>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-2" 
                          :key="item.id" v-for="item in productImage.filter( c => c.type === 2)">
                        <div class="position-relative">
                            <img :src="`static/img/${item.product_id}/${item.type}/${item.path}`" class="img-fluid">
                            <div class="position-absolute top-0 end-0" style="cursor:pointer;"
                                @click="deleteImg(item);">X</div>
                        </div>
                    </div>
                </div>
                <input type="file" class="form-control" accept="image/png,image/jpeg"
                    @change="uploadFile($event.target.files, 2)">
                <div class="alert alert-secondary" role="alert">
                    <ul>
                        <li>Max 5</li>
                        <li>Image Size : 700 * 700</li>
                        <li>File Size : Under 1MB</li>
                        <li>File Extension : Only png, jpg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-md-3 col-form-label">Detail Image</label>
            <div class="col-md-9">
                <div class="">
                    <div class="col-lg-3 col-md-4 col-sm-2" 
                          :key="item.id" v-for="item in productImage.filter( c => c.type === 3)">
                        <div class="position-relative">
                            <img :src="`static/img/${item.product_id}/${item.type}/${item.path}`" class="img-fluid">
                            <div class="position-absolute top-0 end-0" style="cursor:pointer;"
                                @click="deleteImg(item);">X</div>
                        </div>
                    </div>
                </div>
                <input type="file" class="form-control" accept="image/png,image/jpeg"
                    @change="uploadFile($event.target.files, 3)">
                <div class="alert alert-secondary" role="alert">
                    <ul>
                        <li>File Size : Under 5MB</li>
                        <li>File Extension : Only png, jpg</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mb-3 row m-auto">
            <router-link class="nav-link" to="/sales">
            <button type="button" class="btn btn-lg btn-dark">Confirm</button>
            </router-link>
        </div>
    </div>
</main>
</template>

<script>
export default {
    data() {
        return {
            productName: '',
            productDetail: {},
            productImage: [],
        }
    },
    updated() {
        this.getProductImage();
    },
    created() {   
        this.productDetail = this.$store.state.sallerSelectedProduct;
        this.getProductImage();
    },
        methods: {
            async getProductImage() {
                this.productImage = await this.$get(`/api/productImageList/${this.productDetail.id}`);
            },
            async uploadFile(files, type) {
            console.log(files);
            const image = await this.$base64(files[0]);
            const formData = { image };
            const { error } = await this.$post(`/api/upload/${this.productDetail.id}/${type}`, formData);
            console.log(error);
            },
            async deleteImg({id, product_id, type, path}) {
                console.log(type, path, id, product_id);
                // const deleteImg = await this.$delete(`/api/productImageDelete/${this.productDetail.id}/${type}/${path}/${id}`);
                const deleteImg = await this.$delete(`/api/productImageDelete/${id}/${product_id}/${type}/${path}`);
                
                console.log(deleteImg);
            }
    }
}
</script>

<style>

</style>
