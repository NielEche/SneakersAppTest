<template>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Attributes</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="product in products" :key="product.id">
                <tr class="table-secondary">
                    <th scope="row">{{ product.id }}</th>
                    <th scope="row">{{ product.name }}</th>
                    <th scope="row">{{ product.details }}</th>
                    <th scope="row">{{ product.product_attribute }}</th>
                    <th scope="row">
                        <button type="button" class="btn btn-danger btn-sm" @click.prevent="deleteProduct(product.id)">Delete</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'ProductList',
        data() {
            return {
                products:Array
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
                    if(response.data.code == 200) {
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