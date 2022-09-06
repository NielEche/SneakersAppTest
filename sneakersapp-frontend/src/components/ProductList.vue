<template>
    <div>
        <img src="https://res.cloudinary.com/nieleche/image/upload/v1662085371/351e4214-08a3-45a6-86c4-01f03914bd73_dca8vk.jpg"
            class="img-fluid w-100 headimg" alt="Responsive sneaker app image">
        <h1 class=" centeredT display-4 text-white font-weight-bold">Lets talk about Sneakers!</h1>
    </div>


    <div class="container pb-4">
        <h1 class="pb-3">Latest Product Post</h1>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item" v-for="(product, index) in products" :key="product.id">
            <h2 class="accordion-header" :id="'heading'+product.id">
                <button class="accordion-button" :class="{ 'collapsed': index !== 0 }" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse'+product.id" aria-expanded="true" :aria-controls="'collapse'+product.id">
                <h4>{{product.id}}) {{product.name}}</h4>
                </button>
            </h2>
            <div :id="'collapse'+product.id" class="accordion-collapse collapse" :class="{ 'show': index === 0 }" :aria-labelledby="'heading'+product.id" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <h4>Details</h4>
                    {{ product.details }}
                    <h4 class="pt-3">Attributes</h4>
                    {{ product.product_attribute }}
                    <div class="d-flex pt-3">
                        <router-link :to="{ name: 'EditProduct', params: { id:product.id } }" type="button"
                        class="btn btn-primary btn-sm">Edit</router-link>
                        <button type="button" class="btn btn-danger btn-sm"
                        @click.prevent="deleteProduct(product.id)">Delete</button>
                    </div>
                </div>
            </div>
            </div>
        
        </div>
    </div>
</template>

<style>
    .headimg {
        filter: brightness(50%)
    }

    /* Centered text */
    .centeredT {
        position: relative;
        bottom: 80px;
        left: 16px;
    }

    .overlay-dark {
        background-color: rgba(black, 0.4);
    }
</style>

<script>
    import axios from 'axios';

    export default {
        name: 'ProductList',
        data() {
            return {
                products: Array
            }
        },
        created() {
            this.getProducts();
        },
        methods: {
            async getProducts() {
                let url = 'http://127.0.0.1:8000/api/products';
                await axios.get(url).then(response => {
                    this.products = response.data.products;
                    console.log(this.products);
                }).catch(error => {
                    console.log(error);
                });
            },

            async deleteProduct(id) {
                let url = `http://127.0.0.1:8000/api/delete_product/${id}`;
                await axios.delete(url).then(response => {
                    if (response.data.code == 200) {
                        alert(response.data.message);
                        this.getProducts();
                    }
                }).catch(error => {
                    console.log(error);
                });
            }

        },
        mounted() {
            console.log('Product List Component mounted');
        }
    }
</script>