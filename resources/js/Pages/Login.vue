<script setup>
import { Head } from '@inertiajs/vue3';
import LoginInput from '../Components/FormsLogin.vue';
import AlertNotification from '@/Components/AlertNotification.vue';
</script>

<template>
    <Head>
        <title>Login</title>
    </Head>

    <body>
        <div class="h-screen">
            <AlertNotification v-if="message" :message="message" />
            <AlertNotification v-if="message_success" :message_success="message_success" />
            <LoginInput :ConfigLogo="ConfigLogo" :ConfigRedirect="ConfigRedirect" />
        </div>
    </body>
</template>
<script>
export default {
    props: {
        ConfigLogo: String,
        ConfigNome: String,
        ConfigRedirect: String,

        message: {
            type: String,
        },
        message_success: {
            type: String,
        }
    },
}
</script>
