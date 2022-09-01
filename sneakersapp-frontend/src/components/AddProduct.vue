<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger mt-4" v-if="errors.length">
                    <ul class="mb-0">
                        <li v-for="(errors, index) in errors" :key="index">
                            {{errors}}
                        </li>
                    </ul>
                </div>

                <form @submit.prevent="saveProduct" novalidate>
                    <fieldset>
                        <div class="form-group">
                            <label for="name" class="form-label mt-4">Name</label>
                            <input type="text" class="form-control" v-model="product.name" placeholder="Enter Name">
                        </div>


                        <div class="form-group">
                            <label for="Details" class="form-label mt-4">Details</label>
                            <textarea class="form-control" v-model="product.details" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="attribute" class="form-label mt-4">Attributes</label>
                            <input type="text" class="form-control" v-model="product.product_attribute"
                                placeholder="Enter Attribute">
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'AddProduct',
        data() {
            return {
                product: {},
                name: '',
                details: '',
                product_attribute: '',
                errors: []
            }
        },
        methods: {
            async saveProduct() {
                this.errors = [];
                if (!this.product.name) {
                    this.errors.push("Name is Required")
                }

                if (!this.product.details) {
                    this.errors.push("Details is Required")
                }

                if (!this.product.product_attribute) {
                    this.errors.push("Product attribute is Required")
                }

                if (!this.errors.length) {
                    let formData = new FormData();
                    formData.append('name', this.product.name);
                    formData.append('details', this.product.details);
                    formData.append('product_attribute', this.product.product_attribute);
                    let url = 'http://127.0.0.1:8000/api/save_product';
                    await axios.post(url, formData).then((response) => {
                        console.log(response);
                        if (response.status == 200) {
                            this.product.name = '';
                            this.product.details = '';
                            this.product.product_attribute = '';
                            alert(response.data.message);
                        } else {
                            console.log('error');
                        }
                    }).catch(error => {
                        this.errors.push(error.response);
                    });
                }
            }
        }
    }
</script>