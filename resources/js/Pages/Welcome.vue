<template>
    <div>
        <Navbar />
        <h1 class="">HALO GAES {{ data }} DISINI</h1>
    </div>
</template>

<script>

import Navbar from '../Layout/navbar.vue';

export default {

    components: {
        Navbar
    },

    props: {
        data: String
    },

    data() {
        return {}
    }
}
</script>
