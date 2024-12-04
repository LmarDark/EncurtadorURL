<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>

    <!-- Modal -->
    <div v-if="isModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg w-3/4 shadow-lg relative">
            <!-- Botão de Fechar (X) -->
            <button @click="closeEditModal"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-2xl mb-4">{{ modalData.userName }}</h2>
            <p class="mb-2 text-lg font-extrabold"></p>

            <form action="/usuarios" method="post" class="mb-4">
                <input type="hidden" name="_token" :value="csrfToken">
                <input type="hidden" name="id" :value="modalData.userId">
                <label for="permissions" class="block mb-2 text-sm font-medium text-gray-900">Selecione uma
                    opção</label>
                <select name="perm_name" id="permissions"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>Escolha uma permissão</option>
                    <option value=1>Administrador</option>
                    <option value=0>Padrão</option>
                </select>
                <div class="flex flex-row-reverse mt-4">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Enviar</button>
                </div>
            </form>


        </div>
    </div>
    <!-- Modal -->

    <div class="flex mt-24 p-4 animate-fadeIn">
        <ul
            class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 md:me-4 mb-4 md:mb-0">
            <li v-if="currentPath == '/usuarios'">
                <Link href="/usuarios"
                    class="select-none inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full"
                    aria-current="page">
                <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg>
                Usuários
                </Link>
            </li>
            <li v-if="currentPath !== '/usuarios'">
                <Link href="/usuarios"
                    class="select-none inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full"
                    aria-current="page">
                <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="gray"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg>
                Usuários
                </Link>
            </li>


            <li v-if="currentPath == '/configuracoes'">
                <Link href="/configuracoes"
                    class="select-none inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full">
                <svg class="w-4 h-4 me-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="white" viewBox="0 0 20 20">
                    <path
                        d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
                </svg>
                Configurações
                </Link>
            </li>
            <li v-if="currentPath !== '/configuracoes'">
                <Link href="/configuracoes"
                    class="select-none inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                <svg class="w-4 h-4 me-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="gray" viewBox="0 0 20 20">
                    <path
                        d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
                </svg>
                Configurações
                </Link>
            </li>

            <li v-if="currentPath == '/auditoria'">
                <Link href="/auditoria"
                    class="select-none inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full">
                <svg class="w-4 h-4 me-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="white" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                Auditoria</Link>
            </li>
            <li v-if="currentPath !== '/auditoria'">
                <Link href="/auditoria"
                    class="select-none inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full">
                <svg class="w-4 h-4 me-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="gray" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                Auditoria</Link>
            </li>
        </ul>

        <div v-if="currentPath == '/usuarios'" class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between m-2 pb-4">

                    <h3 class="ml-10 text-xl font-bold text-gray-900">Lista de usuários</h3>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="p-4">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CPF
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOME
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PERMISSÃO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                LOCALIZAÇÃO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CRIADO EM
                            </th>
                            <th scope="col" class="px-10 py-3">
                                AÇÕES
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(data, index) in UserData" :key="index"
                            class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">

                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ data.id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ data.user_cpf }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.user_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.roles === 1 ? 'Administrador' : 'Padrão' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.location }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.created_at }}
                            </td>
                            <td class="flex py-4">
                                <button type="button" name="edit_button" @click="openEditModal(data.user_name, data.id)"
                                    class="ml-4 font-medium text-blue-600 hover:underline">
                                    Editar
                                </button>
                                <form action="/usuarios" method="post">
                                    <input type="hidden" name="_token" :value="csrfToken">
                                    <input type="hidden" name="id" :value="data.id">
                                    <button type="button" name="delete_button" value="delete_button"
                                        class="ml-4 font-medium text-blue-600 hover:underline">Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div v-if="currentPath == '/configuracoes'" class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full">

            <h3 class="ml-10 text-xl font-bold text-gray-900">Configurações do(a) {{ }}</h3>

            <h4 class="ml-10 mt-8 text-md font-black text-gray-900">Configurações do LDAP</h4>
            <form @submit.prevent="handleSubmit">
                <div class="ml-10 mt-4">
                    <label for="LDAP_HOST" class="block mb-2 text-sm font-medium text-gray-900">LDAP HOST</label>
                    <input type="text" id="LDAP_HOST" placeholder="LDAP_HOST" v-model="formData.LDAP_HOST"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="ml-10 mt-4">
                    <label for="LDAP_USERNAME" class="block mb-2 text-sm font-medium text-gray-900">LDAP
                        USERNAME</label>
                    <input type="text" id="LDAP_USERNAME" placeholder="LDAP_USERNAME" v-model="formData.LDAP_USERNAME"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="ml-10 mt-4">
                    <label for="LDAP_PASSWORD" class="block mb-2 text-sm font-medium text-gray-900">LDAP
                        PASSWORD</label>
                    <input type="text" id="LDAP_PASSWORD" placeholder="LDAP_PASSWORD" v-model="formData.LDAP_PASSWORD"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="ml-10 mt-4">
                    <label for="LDAP_BASE_DN" class="block mb-2 text-sm font-medium text-gray-900">LDAP BASE_DN</label>
                    <input type="text" id="LDAP_BASE_DN" placeholder="LDAP_BASE_DN" v-model="formData.LDAP_BASE_DN"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="ml-10 mt-4">
                    <label for="usuario_id" class="block mb-2 text-sm font-medium text-gray-900">Usuário</label>
                    <input type="text" id="usuario_id" v-model="formData.usuario" placeholder="Usuário"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="ml-10 mt-4">
                    <label for="senha_id" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                    <input type="password" id="senha_id" v-model="formData.senha" placeholder="Senha"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="flex flex-row-reverse mt-4">
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Testar
                        conexão</button>
                </div>
            </form>

            <h4 class="ml-10 mt-8 text-md font-black text-gray-900">Customizações</h4>
            <form action="/configuracoes" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" :value="csrfToken">
                <div class="ml-10 mt-4">
                    <label for="senha_id1" class="block mb-2 text-sm font-medium text-gray-900">Logo</label>
                    <input type="file" id="senha_id1" name="file"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="ml-10 mt-4">
                    <label for="senha_id2" class="block mb-2 text-sm font-medium text-gray-900">Título</label>
                    <input type="text" id="senha_id2" name="nome" placeholder="Example Title"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="ml-10 mt-4">
                    <label for="senha_id3" class="block mb-2 text-sm font-medium text-gray-900">URL /
                        Redirecionamento</label>
                    <input type="text" id="senha_id3" name="url" placeholder="/example.com.br"
                        class="focus:outline-none mb-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-1.5">
                </div>

                <div class="flex flex-row-reverse mt-4">
                    <button type="submit" name="enviar_button" value="true"
                        class="text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Salvar
                    </button>
                </div>
            </form>
        </div>

        <div v-if="currentPath == '/auditoria'" class="p-6 bg-gray-50 text-medium text-gray-500 rounded-lg w-full">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between m-2 pb-4">

                    <h3 class="ml-10 text-lg font-bold text-gray-900">Lista de usuários</h3>

                    <div class="flex items-center">
                        <label for="table-search" class="sr-only">Procurar</label>
                        <div class="relative">
                            <div
                                class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search"
                                class="block p-3 ps-10 text-sm mr-5 mt-1 text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Procure por um item">

                        </div>
                        <button type="submit"
                            class="text-white bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm p-3 px-4 text-center">Pesquisar</button>
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="p-4">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CPF
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOME
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PERMISSÃO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                LOCALIZAÇÃO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CRIADO EM
                            </th>
                            <th scope="col" class="px-10 py-3">
                                AÇÕES
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(data, index) in AuditoriaData" :key="index"
                            class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4">

                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ data.id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ data.user_cpf }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.user_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.roles === 1 ? 'Administrador' : 'Padrão' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.location }}
                            </td>
                            <td class="px-6 py-4">
                                {{ data.created_at }}
                            </td>
                            <td class="py-4">
                                <a href="#" class="ml-4 font-medium text-blue-600 hover:underline">Editar</a>
                                <a href="#" class="ml-4 font-medium text-blue-600 hover:underline">Deletar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        UserData: Array,
        
        ConfigLogo: String,
        ConfigNome: String,
        ConfigRedirect: String

        //AuditoriaData: Array,
    },

    data() {
        return {
            currentPath: window.location.pathname,
            isModalOpen: false,
            modalData: {
                userName: '',
                userId: null,
            },
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
            formData: {
                LDAP_HOST: '',
                LDAP_USERNAME: '',
                LDAP_PASSWORD: '',
                LDAP_BASE_DN: '',
                usuario: '',
                senha: '',
            },
            formDataCustom: {
                nome: '',
                url: '',
                file: null,
            },
            errorMessage: '',
        };
    },

    methods: {
        async handleSubmit() {
            const formData = new FormData();
            for (const key in this.formData) {
                formData.append(key, this.formData[key]);
            }
            formData.append('_token', this.csrfToken);

            try {
                const response = await fetch('/configuracoes', {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error('Erro ao conectar com o servidor');
                }

                const result = await response.json();
                alert('Configuração salva com sucesso!');
                console.log(result);
            } catch (error) {
                this.errorMessage = error.message || 'Erro ao salvar a configuração';
                console.error(error);
            }
        },

        openEditModal(userName, userId) {
            this.modalData.userName = userName;
            this.modalData.userId = userId;
            this.isModalOpen = true;
        },
        closeEditModal() {
            this.isModalOpen = false;
        },
    }
}
</script>