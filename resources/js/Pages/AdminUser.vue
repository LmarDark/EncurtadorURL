<script setup>
import { Head,Link } from '@inertiajs/vue3';
import Header from '../Components/Header.vue'
import AdminTabs from '@/Components/AdminTabs.vue';
</script>

<template>
    <Head>
        <title>Usuários</title>
    </Head>

    <Header :ConfigLogo="ConfigLogo" :ConfigNome="ConfigNome" :ConfigRedirect="ConfigRedirect"/>
    <AdminTabs :UserData="UserData" :ConfigLogo="ConfigLogo" :ConfigNome="ConfigNome" :ConfigRedirect="ConfigRedirect"/>
    
</template>

<script>
export default {
    props: {
        UserData: Array,
        ConfigLogo: String,
        ConfigNome: String,
        ConfigRedirect: String,
    },
}
</script>