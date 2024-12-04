<script setup>
import AlertNotification from '@/Components/AlertNotification.vue';
</script>

<template>
    <section class="bg-white">
        <div class="animate-fadeIn flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg md:mt-0 sm:max-w-md xl:p-0"
                style="box-shadow: 2px 3px 8px 0 rgba(0, 0, 0, 1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);">

                <AlertNotification :message="message" :message_success="message_success" />

                <div>
                    <h2 class="text-2xl m-4">LDAP Configuration</h2>
                </div>

                <div v-if="errorMessage" class="bg-red-100 text-red-700 p-2 rounded mb-4">
                    {{ errorMessage }}
                </div>

                <form method="post" action="/setup">
                    <input type="hidden" name="_token" :value="csrfToken">
                    <div class="m-4">
                        <label for="LDAP_DC" class="block mb-2 text-sm font-medium text-gray-900">Nome do domínio</label>
                        <input type="text" id="LDAP_DC" name="LDAP_DC" placeholder="@dominio.com"
                            class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div class="m-4">
                        <label for="LDAP_HOST" class="block mb-2 text-sm font-medium text-gray-900">LDAP HOST</label>
                        <input type="text" id="LDAP_HOST" name="LDAP_HOST" placeholder="LDAP_HOST"
                            class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <div class="m-4">
                        <label for="LDAP_USERNAME" class="block mb-2 text-sm font-medium text-gray-900">LDAP
                            USERNAME</label>
                        <input type="text" id="LDAP_USERNAME" name="LDAP_USERNAME" placeholder="LDAP_USERNAME"
                            class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <div class="m-4">
                        <label for="LDAP_PASSWORD" class="block mb-2 text-sm font-medium text-gray-900">LDAP
                            PASSWORD</label>
                        <input type="text" id="LDAP_PASSWORD" name="LDAP_PASSWORD" placeholder="LDAP_PASSWORD"
                            class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <div class="m-4">
                        <label for="LDAP_BASE_DN" class="block mb-2 text-sm font-medium text-gray-900">LDAP
                            BASE_DN</label>
                        <input type="text" id="LDAP_BASE_DN" name="LDAP_BASE_DN" placeholder="LDAP_BASE_DN"
                            class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <div class="m-4">
                        <label for="usuario_id" autocomplete="username" class="block mb-2 text-sm font-medium text-gray-900">Usuário</label>
                        <input type="text" id="usuario_id" name="usuario" placeholder="Usuário"
                            class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <div class="m-4">
                        <label for="senha_id" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                        <input type="password" autocomplete="current-password" id="senha_id" name="senha" placeholder="Senha"
                            class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>

                    <div class="m-4" v-if="memberof">
                        <label for="select_id" class="block mb-2 text-sm font-medium text-gray-900">Escolha o grupo para acesso:</label>
                        <select name="options" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-xs">
                            <option v-for="(member, index) in memberof" :value="member">{{ member }}</option>
                        </select>
                    </div>

                    <div class="m-4">
                        <button type="submit"
                            class="flex justify-center text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Testar
                            Conexão</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        message: String,
        memberof: Array,
    },

    data() {
        return {
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
            currentStep: 1,
            totalSteps: 2,
            errorMessage: '',
        };
    },

    methods: {
        nextStep() {
            if (this.currentStep < this.totalSteps) {
                this.currentStep++;
            }
        },
        prevStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        },
    },
};
</script>

<style>
/* Adicione estilo adicional, se necessário */
</style>
