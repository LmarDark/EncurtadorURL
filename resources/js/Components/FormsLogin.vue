<script setup>
import LogoAplication from './LogoAplication.vue';
</script>

<template>
    <section class="bg-white">
        <div class="animate-fadeIn flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a :href=ConfigRedirect class="flex items-center mb-14 text-2xl font-semibold text-gray-900">
                <LogoAplication class="w-72" :ConfigLogo="ConfigLogo" />
            </a>
            <div class="w-full bg-white rounded-lg md:mt-0 sm:max-w-md xl:p-0"
                style="box-shadow: 2px 3px 8px 0 rgba(0, 0, 0, 1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl select-none">
                        Entre em sua conta
                    </h1>
                    <form class="space-y-4 md:space-y-6 select-none" action="/login" method="POST">
                        <input type="hidden" name="_token" :value="csrfToken">
                        <div>
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-900">Usuário</label>
                            <input autocomplete="no" type="text" name="user" id="user"
                                class="focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Usuário" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                            <input autocomplete="current-password" type="password" name="password" id="password"
                                placeholder="••••••••"
                                class="focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required="">
                        </div>
                        <div class="flex justify-center">

                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Entrar</button>
                    </form>
                    <p class="mt-10 text-center text-sm/6 text-gray-500">
                        By: Lucas Matheus
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: {
        ConfigLogo: String,
        ConfigRedirect: String
    },

    data() {
        return {
            user: '',
            password: '',
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content
        };
    }
}
</script>