<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import AlertNotification from '@/Components/AlertNotification.vue';
</script>

<template>

    <Head>
        <title>Encurtador de URLs</title>
    </Head>

    <AlertNotification :message="message" :message_success="message_success" />

    <div v-if="isModalOpen"
        class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50 overflow-hidden">
        <div
            class="bg-white px-6 pb-6 p-4 rounded-lg shadow-lg max-w-6xl w-full animate-fadeIn overflow-y-auto max-h-[80vh] relative">
            <!-- Botão de Fechar (X) no canto superior direito -->
            <button @click="closeModal"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="flex justify-between items-center mt-4 mb-5">
                <div class="flex items-center">
                    <span class="mr-4 inline-block bg-gray-200 rounded-full p-3">
                        <svg width="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 7H16C18.7614 7 21 9.23858 21 12C21 14.7614 18.7614 17 16 17H14M10 7H8C5.23858 7 3 9.23858 3 12C3 14.7614 5.23858 17 8 17H10M8 12H16"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <h1 class="text-2xl font-bold mt-2 mb-2 select-none">URLs Encurtadas</h1>
                </div>
            </div>
            <div class="mt-10 mb-10 text-4xl flex flex-col items-center justify-center" v-if="urls == ''">
                Não existe nenhum link criado ainda.
                <div class="text-base text-gray-500">
                    <Link class="hover:underline hover:text-blue-500">Clique aqui para criar</Link>
                </div>
            </div>
            <div v-for="(url, index) in urls" :key="index" class="p-4 border rounded mb-4">
                <div class="justify-between">
                    <div class="flex justify-between">
                        <p>
                            <b class="text-2xl">Título: </b>
                            <span class="text-2xl">{{ url.nome }}</span>
                        </p>
                        <div class="flex">
                            <button name="bttn-copy" type="button" @click="copyToClipboard(url.uri)"
                                class="select-none font-medium rounded-lg bg-blue-500 text-white hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 flex flex-row-reverse items-center text-sm px-5 me-2 mb-2 focus:outline-none">
                                Copiar
                            </button>
                            <button type="button" name="bttn-edit" :value="url.id"
                                @click="openEditModal(url.nome, url.id)"
                                class="select-none focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Editar</button>

                            <form action="/encurtadordeurl" method="post">
                                <input type="hidden" name="_token" :value="csrfToken">
                                <button type="submit" name="bttn_delete" :value="url.id" class="select-none focus:outline-none text-white bg-red-700 hover:bg-red-800
                            focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2
                            mb-2">Deletar</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <p>
                            <b>URL: </b>
                            <a :href="url.url" target="_blank" class="hover:text-blue-500 hover:underline">{{ url.url
                                }}</a>
                        </p>
                        <p>
                            <b>Url Encurtada:</b>
                            <a :href="url.uri" :value="`${baseUrl}/${url.uri}`" target="_blank"
                                class="hover:text-blue-500 hover:underline"> /{{ url.uri }}</a>
                        </p>
                        <p>
                            <b>Criado em: </b>
                            <span>{{ url.created_at }}</span>
                        </p>
                        <p>
                            <b>Ultima atualização em: </b>
                            <span>{{ url.updated_at }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-if="isEditModalOpen" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50">
        <div class="bg-white px-6 pb-6 p-4 rounded-lg shadow-lg max-w-2xl w-full animate-fadeIn">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <svg class="mr-2" width="40px" viewBox="-3.6 -3.6 31.20 31.20" xmlns="http://www.w3.org/2000/svg"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title></title>
                            <g id="Complete">
                                <g id="edit">
                                    <g>
                                        <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8" fill="none"
                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"></path>
                                        <polygon fill="none" points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                            stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"></polygon>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <h2 class="text-xl font-semibold">Editar ({{ currentEditName }})</h2>
                </div>

                <div>
                    <button @click="closeEditModal" class="text-gray-500 hover:text-gray-700">&times;</button>
                </div>
            </div>
            <form action="/encurtadordeurl" method="POST">
                <div class="mb-4">

                    <input type="hidden" name="_token" :value="csrfToken">
                    <label class="select-none block text-gray-700 text-sm font-semibold mb-2"
                        for="titulo">Título</label>
                    <input id="titulo" name="titulo"
                        class="bg-gray-50 hover:bg-white focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Altere o título aqui" type="text">
                </div>
                <div class="mb-4">
                    <label class="select-none block text-gray-700 text-sm font-semibold mb-2" for="url">Site</label>
                    <input id="url" name="url"
                        class="bg-gray-50 hover:bg-white focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Altere o link do site aqui" type="text">
                </div>
                <div class="mb-4">
                    <label class="select-none block text-gray-700 text-sm font-semibold mb-2" for="uri">Url
                        encurtada</label>
                    <input id="uri" name="uri"
                        class="mb-10 bg-gray-50 hover:bg-white focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Altere a url personalizada desejada aqui" type="text">
                </div>
                <div class="flex flex-row-reverse">
                    <button type="submit" :value="currentEditId" name="bttn_edit"
                        class="w-full focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <Header :userData="userData" :userID="userID" :ConfigLogo="ConfigLogo" :ConfigNome="ConfigNome"
        :ConfigRedirect="ConfigRedirect" />

    <div class="mt-20 flex flex-col items-center justify-center animate-fadeIn">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-screen-xl w-full">
            <div class="flex justify-center mb-6 animate-fadeIn">
                <span class="inline-block bg-gray-200 rounded-full p-3">
                    <svg width="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M14 7H16C18.7614 7 21 9.23858 21 12C21 14.7614 18.7614 17 16 17H14M10 7H8C5.23858 7 3 9.23858 3 12C3 14.7614 5.23858 17 8 17H10M8 12H16"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                </span>
            </div>
            <h2 class="text-2xl font-semibold text-center mb-10 select-none opacity-0 scale-95 animate-fadeIn">
                Encurtador de URL</h2>
            <form action="/encurtadordeurl" method="POST">
                <input type="hidden" name="_token" :value="csrfToken">
                <div class="mb-4">
                    <label for="nome"
                        class="select-none block text-gray-700 text-sm font-semibold mb-2">Título/Nome<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nome" id="nome" aria-describedby="helper-text-explanation"
                        class="hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Digite um título ou um nome para seu link" required>
                </div>
                <div class="mb-4">
                    <label for="linkurl" class="select-none block text-gray-700 text-sm font-semibold mb-2">Link a ser
                        encurtado <span class="text-red-500">*</span></label>
                    <input type="text" name="urlobrigatorio" id="linkurl" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Cole um link aqui" required>
                </div>
                <div class="mb-4">
                    <label for="linkuri"
                        class="select-none block text-gray-700 text-sm font-semibold mb-2">Personalizado</label>
                    <input type="text" name="urlopcionalname" id="linkuri" aria-describedby="helper-text-explanation"
                        class="bg-gray-50 hover:bg-white focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Digite seu link personalizado aqui">
                    <p class="text-gray-600 text-xs text-center select-none  mt-4">
                        Obs.: Caso não seja preenchido o campo "Personalizado", ele gerará um link personalizado
                        aleatório!
                    </p>
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Gerar</button>
                <p class="text-gray-600 text-xs text-center select-none  mt-4">
                    Os campos com <span class="text-red-500">*</span> são restritamente obrigatórios.
                </p>
                <p>
                    <a href="#" @click.prevent="openModal" id="openSecondModal"
                        class="flex items-center justify-center text-xs mt-4 text-blue-400 hover:text-blue-600">
                        <svg width="25px" fill="#60a5fa" viewBox="-9.6 -9.6 83.20 83.20" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xml:space="preserve" xmlns:serif="http://www.serif.com/"
                            style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                            stroke="#60a5fa" stroke-width="0.00064">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <rect id="Icons" x="-896" y="0" width="1280" height="800" style="fill:none;"></rect>
                                <g id="Icons1" serif:id="Icons">
                                    <g id="Strike"> </g>
                                    <g id="H1"> </g>
                                    <g id="H2"> </g>
                                    <g id="H3"> </g>
                                    <g id="list-ul"> </g>
                                    <g id="hamburger-1"> </g>
                                    <g id="hamburger-2"> </g>
                                    <g id="list-ol"> </g>
                                    <g id="list-task"> </g>
                                    <g id="trash"> </g>
                                    <g id="vertical-menu"> </g>
                                    <g id="horizontal-menu"> </g>
                                    <g id="sidebar-2"> </g>
                                    <g id="Pen"> </g>
                                    <g id="Pen1" serif:id="Pen"> </g>
                                    <g id="clock"> </g>
                                    <g id="external-link">
                                        <path
                                            d="M36.026,20.058l-21.092,0c-1.65,0 -2.989,1.339 -2.989,2.989l0,25.964c0,1.65 1.339,2.989 2.989,2.989l26.024,0c1.65,0 2.989,-1.339 2.989,-2.989l0,-20.953l3.999,0l0,21.948c0,3.308 -2.686,5.994 -5.995,5.995l-28.01,0c-3.309,0 -5.995,-2.687 -5.995,-5.995l0,-27.954c0,-3.309 2.686,-5.995 5.995,-5.995l22.085,0l0,4.001Z">
                                        </path>
                                        <path
                                            d="M55.925,25.32l-4.005,0l0,-10.481l-27.894,27.893l-2.832,-2.832l27.895,-27.895l-10.484,0l0,-4.005l17.318,0l0.002,0.001l0,17.319Z">
                                        </path>
                                    </g>
                                    <g id="hr"> </g>
                                    <g id="info"> </g>
                                    <g id="warning"> </g>
                                    <g id="plus-circle"> </g>
                                    <g id="minus-circle"> </g>
                                    <g id="vue"> </g>
                                    <g id="cog"> </g>
                                    <g id="logo"> </g>
                                    <g id="radio-check"> </g>
                                    <g id="eye-slash"> </g>
                                    <g id="eye"> </g>
                                    <g id="toggle-off"> </g>
                                    <g id="shredder"> </g>
                                    <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]"> </g>
                                    <g id="react"> </g>
                                    <g id="check-selected"> </g>
                                    <g id="turn-off"> </g>
                                    <g id="code-block"> </g>
                                    <g id="user"> </g>
                                    <g id="coffee-bean"> </g>
                                    <g id="coffee-beans">
                                        <g id="coffee-bean1" serif:id="coffee-bean"> </g>
                                    </g>
                                    <g id="coffee-bean-filled"> </g>
                                    <g id="coffee-beans-filled">
                                        <g id="coffee-bean2" serif:id="coffee-bean"> </g>
                                    </g>
                                    <g id="clipboard"> </g>
                                    <g id="clipboard-paste"> </g>
                                    <g id="clipboard-copy"> </g>
                                    <g id="Layer1"> </g>
                                </g>
                            </g>
                        </svg>
                        Listar links encurtados
                    </a>
                </p>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        ConfigLogo: String,
        ConfigNome: String,
        ConfigRedirect: String,
        userID: {
            type: Number,
        },
        userData: {
            type: Number,
        },
        message: {
            type: String,
        },
        message_success: {
            type: String,
        },
        urls: {
            type: Array,
        }
    },

    data() {
        return {
            baseUrl: `${window.location.origin}`,
            isModalOpen: false,
            isModalOpen: false,
            isEditModalOpen: false,
            currentEditId: null,
            nome: '',
            url: '',
            urlperson: '',
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content
        };
    },

    methods: {
        openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        },
        openEditModal(name, id) {
            this.currentEditName = name;
            this.currentEditId = id;
            this.isEditModalOpen = true;
        },
        closeEditModal() {
            this.isEditModalOpen = false;
            this.currentEditId = null;
        },
        copyToClipboard(uri) {
            const fullUrl = `${this.baseUrl.replace(/\/$/, "")}/${uri.replace(/^\//, "")}`;

            if (navigator.clipboard && typeof navigator.clipboard.writeText === "function") {
                navigator.clipboard.writeText(fullUrl)
                    .then(() => {
                        alert("URL completa copiada com sucesso!");
                    })
                    .catch(err => {
                        console.error("Erro ao copiar a URL completa: ", err);
                    });
            } else {
                // Fallback para navegadores mais antigos
                const tempInput = document.createElement("textarea");
                tempInput.value = fullUrl;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand("copy");
                document.body.removeChild(tempInput);
                alert("URL completa copiada para a área de transferência!");
            }
        }
    }
}
</script>
