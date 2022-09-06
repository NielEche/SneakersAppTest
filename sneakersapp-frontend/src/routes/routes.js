import ProductList  from '../components/ProductList';
import AddProduct from '../components/AddProduct';
import EditProduct from '../components/EditProduct';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        name: 'ProductList',
        path: '/',
        component: ProductList
    },
    {
        name: 'AddProduct',
        path: '/add_products',
        component: AddProduct
    },
    {
        name: 'EditProduct',
        path: '/product/edit/:id?',
        component: EditProduct
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
