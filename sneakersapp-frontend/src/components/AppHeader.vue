<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/">{{title}}</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <router-link class="nav-link active" to="/">Home
                    <span class="visually-hidden">(current)</span>
                </router-link>
                </li>
                <li class="nav-item">
                <router-link class="nav-link" to="add_products">Add Product</router-link>
                </li>
            </ul>
            </div>
        </div>
    </nav>
</template>


<script>

export default {
    name: 'AppHeader',
    props: {
        title: String
    }
    }
</script>
