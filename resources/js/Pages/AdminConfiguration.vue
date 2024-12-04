<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '../Components/Header.vue';
import AdminTabs from '@/Components/AdminTabs.vue';
</script>

<template>
    <Head>
        <title>Configurações</title>
    </Head>

    <Header :ConfigLogo="ConfigLogo" :ConfigNome="ConfigNome" :ConfigRedirect="ConfigRedirect"/>

    <AdminTabs />
</template>

<script>
export default {
    props: {
        ConfigLogo: String,
        ConfigNome: String,
        ConfigRedirect: String,
    }
}
</script>