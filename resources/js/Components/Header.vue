<script setup>
import LogoAplication from './LogoAplication.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="animate-fadeIn bg-white fixed z-30 w-full top-0 start-0 border border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
            <a :href="ConfigRedirect" class="flex items-center space-x-3 rtl:space-x-reverse">
            <LogoAplication style="width: 80px;height: 80px;" :ConfigLogo="ConfigLogo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">{{ ConfigNome }}</span>
            </a>
            <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li v-if="(currentPath == '/usuarios' || currentPath == '/configuracoes' || currentPath == '/auditoria') && userData !== 0">
                        <Link href="/usuarios"
                            class="select-none block py-2 px-3 md:py-2 md:px-3 outline outline-blue-700 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 :p-0 md:hover:text-blue-700"
                            aria-current="page">Administração</Link>
                    </li>

                    <li v-if="currentPath !== '/usuarios' && currentPath !== '/configuracoes' && currentPath !== '/auditoria' && userData !== 0">
                        <Link href="/usuarios"
                            class="select-none block py-2 px-3 md:py-2 md:px-3 transition-outline duration-100 hover:outline text-white bg-blue-700 rounded md:bg-transparent md:text-gray-900 md:p-0 md:hover:text-blue-700"
                            aria-current="page">Administração</Link>
                    </li>

                    <li v-if="currentPath == '/encurtadordeurl'">
                        <Link href="/encurtadordeurl"
                            class="select-none block py-2 px-3 md:py-2 md:px-3 outline outline-blue-700 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 :p-0 md:hover:text-blue-700"
                            aria-current="page">Encurtador de URL</Link>
                    </li>
                    <li v-if="currentPath !== '/encurtadordeurl'">
                        <Link href="/encurtadordeurl"
                            class="select-none block py-2 px-3 md:py-2 md:px-3 transition-outline duration-100 hover:outline text-white bg-blue-700 rounded md:bg-transparent md:text-gray-900 md:p-0 md:hover:text-blue-700"
                            aria-current="page">Encurtador de URL</Link>
                    </li>

                    <li v-if="currentPath == '/acessorapido'">
                        <Link href="/acessorapido"
                            class="select-none block py-2 px-3 md:py-2 md:px-3 outline outline-blue-700 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 :p-0 md:hover:text-blue-700"
                            aria-current="page">Acesso Rápido</Link>
                    </li>
                    <li v-if="currentPath !== '/acessorapido'">
                        <Link href="/acessorapido"
                            class="select-none block py-2 px-3 md:py-2 md:px-3 transition-outline duration-100 bg-blue-700 hover:outline text-white rounded md:bg-transparent md:text-gray-900 md:p-0 md:hover:text-blue-700"
                            aria-current="page">Acesso Rápido</Link>
                    </li>

                    <li>
                        <a href="/logout"
                            class="select-none block py-2 px-3 text-white transition-outline duration-900 hover:outline rounded md:py-2 md:px-3 md:transition-colors duration-1000 bg-blue-500 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        userData: Number,
        userID: Number,

        ConfigLogo: String,
        ConfigNome: String,
        ConfigRedirect: String
    },

    data() {
        return {
            currentPath: window.location.pathname
        };
    }
}
</script>