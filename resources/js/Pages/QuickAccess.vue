<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import AlertNotification from '@/Components/AlertNotification.vue';
</script>

<style>
html,
body {
    margin: 60px;
    padding: 0;
    height: 100%;
}
</style>

<template>

    <Head>
        <title>Acesso Rápido</title>
    </Head>

    <AlertNotification :message="message" :message_success="message_success" />

    <div v-if="isModalOpen"
        class="fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50 overflow-hidden">
        <div
            class="bg-white px-6 pb-6 p-4 rounded-lg shadow-lg max-w-6xl w-full animate-fadeIn overflow-y-auto max-h-[80vh]">
            <div class="flex justify-between items-center mt-4 mb-5">
                <div class="flex items-center">
                    <span class="mr-4 inline-block bg-gray-200 rounded-full p-3">
                        <svg width="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M12.0007 13.537L12.5959 13.0807C12.454 12.8955 12.234 12.787 12.0007 12.787C11.7675 12.787 11.5475 12.8955 11.4055 13.0807L12.0007 13.537ZM8.88974 15.066L8.89204 14.316C8.88678 14.316 8.88153 14.316 8.87627 14.3161L8.88974 15.066ZM8.44674 7.443L8.52022 8.18939C8.76089 8.1657 8.97537 8.02741 9.09627 7.81797C9.21718 7.60853 9.22968 7.35364 9.12984 7.13338L8.44674 7.443ZM8.11174 5.889L8.86174 5.88968V5.889H8.11174ZM15.8897 5.889H15.1397V5.88968L15.8897 5.889ZM15.5547 7.443L14.8716 7.13338C14.7718 7.35364 14.7843 7.60853 14.9052 7.81797C15.0261 8.02741 15.2406 8.1657 15.4813 8.18939L15.5547 7.443ZM18.9949 11.4673L18.2462 11.4238V11.4238L18.9949 11.4673ZM15.1117 15.066L15.1252 14.3161C15.12 14.316 15.1147 14.316 15.1094 14.316L15.1117 15.066ZM12.7507 13.537C12.7507 13.1228 12.415 12.787 12.0007 12.787C11.5865 12.787 11.2507 13.1228 11.2507 13.537H12.7507ZM11.2507 21.066C11.2507 21.4802 11.5865 21.816 12.0007 21.816C12.415 21.816 12.7507 21.4802 12.7507 21.066H11.2507ZM11.2507 13.537C11.2507 13.9512 11.5865 14.287 12.0007 14.287C12.415 14.287 12.7507 13.9512 12.7507 13.537H11.2507ZM12.7507 11.551C12.7507 11.1368 12.415 10.801 12.0007 10.801C11.5865 10.801 11.2507 11.1368 11.2507 11.551H12.7507ZM12.7507 8.566C12.7507 8.15179 12.415 7.816 12.0007 7.816C11.5865 7.816 11.2507 8.15179 11.2507 8.566H12.7507ZM11.2507 9.566C11.2507 9.98021 11.5865 10.316 12.0007 10.316C12.415 10.316 12.7507 9.98021 12.7507 9.566H11.2507ZM12.4507 10.166C12.7821 9.91747 12.8493 9.44737 12.6007 9.116C12.3522 8.78463 11.8821 8.71747 11.5507 8.966L12.4507 10.166ZM9.55074 10.466C9.21937 10.7145 9.15221 11.1846 9.40074 11.516C9.64927 11.8474 10.1194 11.9145 10.4507 11.666L9.55074 10.466ZM12.7507 9.566C12.7507 9.15179 12.415 8.816 12.0007 8.816C11.5865 8.816 11.2507 9.15179 11.2507 9.566H12.7507ZM11.2507 11.551C11.2507 11.9652 11.5865 12.301 12.0007 12.301C12.415 12.301 12.7507 11.9652 12.7507 11.551H11.2507ZM12.2829 10.8561C11.8991 10.7003 11.4616 10.8851 11.3058 11.2689C11.15 11.6527 11.3348 12.0901 11.7186 12.2459L12.2829 10.8561ZM14.2186 13.2609C14.6024 13.4167 15.0398 13.2319 15.1956 12.8481C15.3515 12.4643 15.1667 12.0269 14.7829 11.8711L14.2186 13.2609ZM11.4055 13.0807C10.8064 13.8621 9.87675 14.319 8.89204 14.316L8.88743 15.816C10.3403 15.8205 11.7119 15.1463 12.5959 13.9933L11.4055 13.0807ZM8.87627 14.3161C7.22834 14.3457 5.8509 13.0692 5.75528 11.4238L4.2578 11.5108C4.40013 13.9599 6.45037 15.8599 8.90321 15.8159L8.87627 14.3161ZM5.75528 11.4238C5.65965 9.77837 6.87996 8.35087 8.52022 8.18939L8.37326 6.69661C5.93183 6.93696 4.11548 9.06171 4.2578 11.5108L5.75528 11.4238ZM9.12984 7.13338C8.95276 6.74269 8.86135 6.31863 8.86174 5.88968L7.36174 5.88832C7.36115 6.53131 7.49819 7.16698 7.76363 7.75262L9.12984 7.13338ZM8.86174 5.889C8.86174 4.15538 10.2671 2.75 12.0007 2.75V1.25C9.43869 1.25 7.36174 3.32695 7.36174 5.889H8.86174ZM12.0007 2.75C13.7344 2.75 15.1397 4.15538 15.1397 5.889H16.6397C16.6397 3.32695 14.5628 1.25 12.0007 1.25V2.75ZM15.1397 5.88968C15.1401 6.31863 15.0487 6.74269 14.8716 7.13338L16.2378 7.75262C16.5033 7.16698 16.6403 6.53131 16.6397 5.88832L15.1397 5.88968ZM15.4813 8.18939C17.1215 8.35087 18.3418 9.77837 18.2462 11.4238L19.7437 11.5108C19.886 9.06171 18.0696 6.93696 15.6282 6.69661L15.4813 8.18939ZM18.2462 11.4238C18.1506 13.0692 16.7731 14.3457 15.1252 14.3161L15.0983 15.8159C17.5511 15.8599 19.6013 13.9599 19.7437 11.5108L18.2462 11.4238ZM15.1094 14.316C14.1247 14.319 13.1951 13.8621 12.5959 13.0807L11.4055 13.9933C12.2895 15.1463 13.6612 15.8205 15.114 15.816L15.1094 14.316ZM11.2507 13.537V21.066H12.7507V13.537H11.2507ZM12.7507 13.537V11.551H11.2507V13.537H12.7507ZM11.2507 8.566V9.566H12.7507V8.566H11.2507ZM11.5507 8.966L9.55074 10.466L10.4507 11.666L12.4507 10.166L11.5507 8.966ZM11.2507 9.566V11.551H12.7507V9.566H11.2507ZM11.7186 12.2459L14.2186 13.2609L14.7829 11.8711L12.2829 10.8561L11.7186 12.2459Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                    </span>
                    <h1 class="text-2xl font-bold mt-2 mb-2 select-none">Acessos rápidos montados</h1>
                </div>
                <!-- Botão de Fechar (X) no canto superior direito -->
                <button @click="closeModal"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-10 mb-10 text-4xl flex flex-col items-center justify-center" v-if="data == ''">
                Não existe nenhuma árvore criada ainda.
                <div class="text-base text-gray-500">
                    <Link class="hover:underline hover:text-blue-500">Clique aqui para criar</Link>
                </div>
            </div>
            <div v-for="(tree, index) in data" :key="index" class="p-4 border rounded mb-4">
                <div class="justify-between">
                    <div class="flex justify-between">
                        <p>
                            <b class="text-2xl">Título: </b>
                            <a :href="tree.url" target="_blank" class="text-2xl">{{
                                tree.nome }}</a>
                        </p>
                        <div class="flex">
                            <!--<button name="bttn-copy" type="button" @click="copyToClipboard(tree.uri)"
                                class="select-none font-medium rounded-lg bg-blue-500 text-white hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 flex flex-row-reverse items-center text-sm px-5 me-2 mb-2 focus:outline-none">
                                Copiar
                            </button>-->
                            <!--<button type="button" name="bttn-edit" :value="tree.id"
                                @click="openEditModal(tree.nome, tree.id)"
                                class="select-none focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Editar</button>
                            -->
                            <form action="/acessorapido" method="post">
                                <input type="hidden" name="_token" :value="csrfToken">
                                <button type="submit" name="bttn_delete" :value="tree.id" class="select-none focus:outline-none text-white bg-red-700 hover:bg-red-800
                                focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2
                                mb-2">Deletar</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <p class="mr-64 mb-2">
                            <b>Descrição:</b>
                            <span>&nbsp;{{ tree.descricao }}</span>
                        </p>
                        <p>
                            <b>URI:</b>
                            <a :href="`page/${tree.uri}`" :value="`${baseUrl}/page/${tree.uri}`" target="_blank"
                                class="hover:text-blue-500 hover:underline"> page/{{ tree.uri
                                }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-if="isEditModalOpen"
        class="overflow-y-auto max-h-[100vh] fixed inset-0 flex items-center justify-center z-50 bg-gray-800 bg-opacity-50">
        <div class="bg-white p-6 max-w-lg w-full max-h-[90vh] overflow-auto flex flex-col animate-fadeIn">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center overflow-y-auto">
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

            <div class="mb-4">
                <div class="mb-4 border-b border-gray-200">
                    <ul class="flex flex-wrap justify-center -mb-px text-sm font-medium text-center"
                        id="default-styled-tab" role="tablist">
                        <li class="me-2" role="presentation">
                            <button type="button" class="active:text-blue-600 inline-block p-4 border-b-2 rounded-t-lg"
                                @click="toggleContent('profile')"
                                :aria-selected="activeTab === 'profile' ? 'true' : 'false'">
                                Edição padrão
                            </button>

                        </li>
                        <li class="me-2" role="presentation">
                            <button type="button" class="active:text-blue-600 inline-block p-4 border-b-2 rounded-t-lg"
                                @click="toggleContent('dashboard')"
                                :aria-selected="activeTab === 'dashboard' ? 'true' : 'false'">
                                Customização avançada
                            </button>
                        </li>
                    </ul>
                </div>

                <div id="default-styled-tab-content" v-if="activeTab === 'profile'">
                    <form action="/acessorapido" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" :value="csrfToken">

                        <div class="mb-4">
                            <label class="block mb-2 text-sm select-none font-medium text-gray-900"
                                for="file_input">Tela de fundo</label>
                            <input name="background"
                                class="block select-none w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="file_input" type="file">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm select-none font-medium text-gray-900"
                                for="file_input">Logo</label>
                            <input name="foto"
                                class="block select-none w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="file_input" type="file">
                        </div>

                        <div class="mb-4">
                            <label for="nome"
                                class="select-none block text-gray-700 text-sm font-semibold mb-2">Título/Nome<span
                                    class="text-red-500">*</span></label>
                            <input name="nome" type="text" id="nome" aria-describedby="helper-text-explanation"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Digite um título ou um nome aqui" required>
                        </div>

                        <div class="mb-4">
                            <label for="descricao"
                                class="select-none block text-gray-700 text-sm font-semibold mb-2">Descrição<span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="descricao" id="descricao"
                                aria-describedby="helper-text-explanation"
                                class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Portal do Governo do Estado de Rondônia. Aqui você encontra todo o conteúdo institucional e notícias relacionados ao Governo do Estado de Rondônia."
                                required>
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" viewBox="-3.6 -3.6 31.20 31.20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.982 19.61c.454-.7.909-1.6 1.236-2.755.755.29 1.273.636 1.591.909a8.182 8.182 0 0 1-2.864 1.845h.037v.001zm-8.8-1.855c.336-.273.845-.61 1.6-.91.336 1.164.773 2.064 1.236 2.764A8.2 8.2 0 0 1 6.2 17.755h-.018zm10.636-6.664c-.028-.81-.11-1.619-.245-2.418 1-.364 1.727-.8 2.236-1.2a8.136 8.136 0 0 1 1.282 3.618h-3.273zm-8.973-4.2a5.936 5.936 0 0 1-1.481-.8 8.2 8.2 0 0 1 2.654-1.7c-.427.636-.845 1.454-1.182 2.5h.01-.001zm7.137-2.5a8.145 8.145 0 0 1 2.654 1.7 6.01 6.01 0 0 1-1.481.8 9.58 9.58 0 0 0-1.182-2.5h.009zM14.8 9.118c.09.6.182 1.246.2 1.973H9c.027-.727.09-1.382.182-1.973 1.855.334 3.754.334 5.609 0h.009zM12 7.545c-.91 0-1.71-.072-2.39-.181.726-2.237 1.854-3.137 2.39-3.455.518.318 1.655 1.227 2.382 3.455A15.04 15.04 0 0 1 12 7.545zm-6.818-.072a8.03 8.03 0 0 0 2.245 1.2 18.368 18.368 0 0 0-.245 2.418h-3.31a8.13 8.13 0 0 1 1.319-3.618h-.01.001zm-1.3 5.436h3.3c.036.782.09 1.5.2 2.155a7.682 7.682 0 0 0-2.31 1.272 8.11 8.11 0 0 1-1.2-3.427h.01zM12 14.364c-1.09 0-2.027.09-2.845.236A16.91 16.91 0 0 1 9 12.91h6c-.027.608-.073 1.18-.145 1.69A15.388 15.388 0 0 0 12 14.355v.009zm0 5.727c-.545-.327-1.745-1.3-2.473-3.727A14.095 14.095 0 0 1 12 16.182c.955 0 1.773.063 2.482.182-.727 2.454-1.927 3.4-2.473 3.727H12zm6.927-3.764a7.634 7.634 0 0 0-2.309-1.272 17.95 17.95 0 0 0 .2-2.146h3.31a8.11 8.11 0 0 1-1.2 3.418h-.001zM12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <label for="websiteid"
                                    class="block text-gray-700 text-sm font-semibold select-none">Website:</label>
                            </div>
                            <input name="website"
                                class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                id=websiteid type="text" placeholder="https://rondonia.ro.gov.br/setic">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.5 5H9.5C7.29086 5 5.5 6.79086 5.5 9V15C5.5 17.2091 7.29086 19 9.5 19H15.5C17.7091 19 19.5 17.2091 19.5 15V9C19.5 6.79086 17.7091 5 15.5 5Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.5 15C10.8431 15 9.5 13.6569 9.5 12C9.5 10.3431 10.8431 9 12.5 9C14.1569 9 15.5 10.3431 15.5 12C15.5 12.7956 15.1839 13.5587 14.6213 14.1213C14.0587 14.6839 13.2956 15 12.5 15Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                        <rect x="15.5" y="9" width="2" height="2" rx="1" transform="rotate(-90 15.5 9)"
                                            fill="#000000"></rect>
                                        <rect x="16" y="8.5" width="1" height="1" rx="0.5"
                                            transform="rotate(-90 16 8.5)" stroke="#000000" stroke-linecap="round">
                                        </rect>
                                    </g>
                                </svg>
                                <label for="instagramid"
                                    class="block text-gray-700 text-sm font-semibold select-none">Instagram:</label>
                            </div>
                            <input name="instagram"
                                class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                id="instagramid" type="text" placeholder="https://www.instagram.com/setic">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <label for="whatsappid"
                                    class="block text-gray-700 text-sm font-semibold select-none">Whatsapp:</label>
                            </div>
                            <input name="whatsapp"
                                class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="text" placeholder="https://web.whatsapp.com/send/?phone=556984460144">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" viewBox="-3.6 -3.6 31.20 31.20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2 6C2 3.79086 3.79086 2 6 2H18C20.2091 2 22 3.79086 22 6V18C22 20.2091 20.2091 22 18 22H6C3.79086 22 2 20.2091 2 18V6ZM6 4C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H12V13H11C10.4477 13 10 12.5523 10 12C10 11.4477 10.4477 11 11 11H12V9.5C12 7.567 13.567 6 15.5 6H16.1C16.6523 6 17.1 6.44772 17.1 7C17.1 7.55228 16.6523 8 16.1 8H15.5C14.6716 8 14 8.67157 14 9.5V11H16.1C16.6523 11 17.1 11.4477 17.1 12C17.1 12.5523 16.6523 13 16.1 13H14V20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <label class="block text-gray-700 text-sm font-semibold select-none">Facebook:</label>
                            </div>
                            <input name="facebook"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="text" placeholder="https://www.facebook.com/">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" viewBox="-3 -3 26.00 26.00" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>email [#1573]</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs> </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Dribbble-Light-Preview"
                                                transform="translate(-300.000000, -922.000000)" fill="#000000">
                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <path
                                                        d="M262,764.291 L254,771.318 L246,764.281 L246,764 L262,764 L262,764.291 Z M246,775 L246,766.945 L254,773.98 L262,766.953 L262,775 L246,775 Z M244,777 L264,777 L264,762 L244,762 L244,777 Z"
                                                        id="email-[#1573]"> </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <label class="block text-gray-700 text-sm font-semibold select-none">Email:</label>
                            </div>
                            <input name="email"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="text" placeholder="seticro@gmail.com">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" viewBox="0 0 24.00 24.00" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#000000"
                                    stroke-width="0.12000000000000002">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M18.72 3.99997H5.37C5.19793 3.99191 5.02595 4.01786 4.86392 4.07635C4.70189 4.13484 4.55299 4.22471 4.42573 4.34081C4.29848 4.45692 4.19537 4.59699 4.12232 4.75299C4.04927 4.909 4.0077 5.07788 4 5.24997V18.63C4.01008 18.9901 4.15766 19.3328 4.41243 19.5875C4.6672 19.8423 5.00984 19.9899 5.37 20H18.72C19.0701 19.9844 19.4002 19.8322 19.6395 19.5761C19.8788 19.32 20.0082 18.9804 20 18.63V5.24997C20.0029 5.08247 19.9715 4.91616 19.9078 4.76122C19.8441 4.60629 19.7494 4.466 19.6295 4.34895C19.5097 4.23191 19.3672 4.14059 19.2108 4.08058C19.0544 4.02057 18.8874 3.99314 18.72 3.99997ZM9 17.34H6.67V10.21H9V17.34ZM7.89 9.12997C7.72741 9.13564 7.5654 9.10762 7.41416 9.04768C7.26291 8.98774 7.12569 8.89717 7.01113 8.78166C6.89656 8.66615 6.80711 8.5282 6.74841 8.37647C6.6897 8.22474 6.66301 8.06251 6.67 7.89997C6.66281 7.73567 6.69004 7.57169 6.74995 7.41854C6.80986 7.26538 6.90112 7.12644 7.01787 7.01063C7.13463 6.89481 7.2743 6.80468 7.42793 6.74602C7.58157 6.68735 7.74577 6.66145 7.91 6.66997C8.07259 6.66431 8.2346 6.69232 8.38584 6.75226C8.53709 6.8122 8.67431 6.90277 8.78887 7.01828C8.90344 7.13379 8.99289 7.27174 9.05159 7.42347C9.1103 7.5752 9.13699 7.73743 9.13 7.89997C9.13719 8.06427 9.10996 8.22825 9.05005 8.3814C8.99014 8.53456 8.89888 8.6735 8.78213 8.78931C8.66537 8.90513 8.5257 8.99526 8.37207 9.05392C8.21843 9.11259 8.05423 9.13849 7.89 9.12997ZM17.34 17.34H15V13.44C15 12.51 14.67 11.87 13.84 11.87C13.5822 11.8722 13.3313 11.9541 13.1219 12.1045C12.9124 12.2549 12.7546 12.4664 12.67 12.71C12.605 12.8926 12.5778 13.0865 12.59 13.28V17.34H10.29V10.21H12.59V11.21C12.7945 10.8343 13.0988 10.5225 13.4694 10.3089C13.84 10.0954 14.2624 9.98848 14.69 9.99997C16.2 9.99997 17.34 11 17.34 13.13V17.34Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                                <label class="block text-gray-700 text-sm font-semibold select-none">Linkedin:</label>
                            </div>
                            <input name="linkedin"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="text" placeholder="https://br.linkedin.com/">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" fill="#000000" viewBox="-1.6 -1.6 35.20 35.20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M11.919 24.94c-2.548 0-4.921-.747-6.919-2.032a9.049 9.049 0 0 0 6.681-1.867 4.512 4.512 0 0 1-4.215-3.137c.276.054.559.082.848.082.412 0 .812-.056 1.193-.156a4.519 4.519 0 0 1-3.622-4.425v-.059a4.478 4.478 0 0 0 2.042.564 4.507 4.507 0 0 1-2.008-3.758c0-.824.225-1.602.612-2.268a12.811 12.811 0 0 0 9.303 4.715 4.517 4.517 0 0 1 7.692-4.115 9.107 9.107 0 0 0 2.866-1.094 4.542 4.542 0 0 1-1.983 2.498 9.08 9.08 0 0 0 2.592-.71 9.283 9.283 0 0 1-2.252 2.337c.008.193.014.388.014.583-.001 5.962-4.542 12.843-12.844 12.842">
                                        </path>
                                    </g>
                                </svg>
                                <label class="block text-gray-700 text-sm font-semibold select-none">Twitter:</label>
                            </div>
                            <input name="twitter"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="text" placeholder="https://twitter.com/?lang=pt-br">
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center mb-2">
                                <svg width="25px" viewBox="-1.5 -1.5 28.00 28.00" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.168 19.0028C20.4724 19.0867 22.41 17.29 22.5 14.9858V9.01982C22.41 6.71569 20.4724 4.91893 18.168 5.00282H6.832C4.52763 4.91893 2.58998 6.71569 2.5 9.01982V14.9858C2.58998 17.29 4.52763 19.0867 6.832 19.0028H18.168Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.008 9.17784L15.169 11.3258C15.3738 11.4454 15.4997 11.6647 15.4997 11.9018C15.4997 12.139 15.3738 12.3583 15.169 12.4778L12.008 14.8278C11.408 15.2348 10.5 14.8878 10.5 14.2518V9.75184C10.5 9.11884 11.409 8.77084 12.008 9.17784Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                                <label class="block text-gray-700 text-sm font-semibold select-none">Youtube:</label>
                            </div>
                            <input name="youtube"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                type="text" placeholder="https://www.youtube.com/">
                        </div>

                        <div class="mb-4">
                            <div class="flex justify-between items-center">
                                <label class="block text-gray-700 text-sm font-semibold select-none">Site/Portal:
                                    <span class="text-red-500">*</span></label>
                            </div>
                            <input name="uri" placeholder="/govro" type="text"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>

                        <button type="submit" value="bttn_edit" name="bttn_edit"
                            class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Gerar</button>
                    </form>
                </div>
            </div>

            <!-- Conteúdo de "Customização avançada" -->
            <div id="advanced-styled-tab-content" v-if="activeTab === 'dashboard'">
                <div class="p-4 rounded-lg bg-gray-50" id="styled-dashboard" role="tabpanel">
                    <p class="text-sm text-gray-500">
                        Conteúdo de <strong>Customização avançada</strong>.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <Header :userData="userData" :userID="userID" :ConfigLogo="ConfigLogo" :ConfigNome="ConfigNome"
        :ConfigRedirect="ConfigRedirect" />

    <div class="flex items-center justify-center min-h-screen animate-fadeIn">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-6xl w-full">
            <div class="flex justify-center mb-6 animate-fadeIn">
                <span class="inline-block bg-gray-200 rounded-full p-3">
                    <svg width="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M12.0007 13.537L12.5959 13.0807C12.454 12.8955 12.234 12.787 12.0007 12.787C11.7675 12.787 11.5475 12.8955 11.4055 13.0807L12.0007 13.537ZM8.88974 15.066L8.89204 14.316C8.88678 14.316 8.88153 14.316 8.87627 14.3161L8.88974 15.066ZM8.44674 7.443L8.52022 8.18939C8.76089 8.1657 8.97537 8.02741 9.09627 7.81797C9.21718 7.60853 9.22968 7.35364 9.12984 7.13338L8.44674 7.443ZM8.11174 5.889L8.86174 5.88968V5.889H8.11174ZM15.8897 5.889H15.1397V5.88968L15.8897 5.889ZM15.5547 7.443L14.8716 7.13338C14.7718 7.35364 14.7843 7.60853 14.9052 7.81797C15.0261 8.02741 15.2406 8.1657 15.4813 8.18939L15.5547 7.443ZM18.9949 11.4673L18.2462 11.4238V11.4238L18.9949 11.4673ZM15.1117 15.066L15.1252 14.3161C15.12 14.316 15.1147 14.316 15.1094 14.316L15.1117 15.066ZM12.7507 13.537C12.7507 13.1228 12.415 12.787 12.0007 12.787C11.5865 12.787 11.2507 13.1228 11.2507 13.537H12.7507ZM11.2507 21.066C11.2507 21.4802 11.5865 21.816 12.0007 21.816C12.415 21.816 12.7507 21.4802 12.7507 21.066H11.2507ZM11.2507 13.537C11.2507 13.9512 11.5865 14.287 12.0007 14.287C12.415 14.287 12.7507 13.9512 12.7507 13.537H11.2507ZM12.7507 11.551C12.7507 11.1368 12.415 10.801 12.0007 10.801C11.5865 10.801 11.2507 11.1368 11.2507 11.551H12.7507ZM12.7507 8.566C12.7507 8.15179 12.415 7.816 12.0007 7.816C11.5865 7.816 11.2507 8.15179 11.2507 8.566H12.7507ZM11.2507 9.566C11.2507 9.98021 11.5865 10.316 12.0007 10.316C12.415 10.316 12.7507 9.98021 12.7507 9.566H11.2507ZM12.4507 10.166C12.7821 9.91747 12.8493 9.44737 12.6007 9.116C12.3522 8.78463 11.8821 8.71747 11.5507 8.966L12.4507 10.166ZM9.55074 10.466C9.21937 10.7145 9.15221 11.1846 9.40074 11.516C9.64927 11.8474 10.1194 11.9145 10.4507 11.666L9.55074 10.466ZM12.7507 9.566C12.7507 9.15179 12.415 8.816 12.0007 8.816C11.5865 8.816 11.2507 9.15179 11.2507 9.566H12.7507ZM11.2507 11.551C11.2507 11.9652 11.5865 12.301 12.0007 12.301C12.415 12.301 12.7507 11.9652 12.7507 11.551H11.2507ZM12.2829 10.8561C11.8991 10.7003 11.4616 10.8851 11.3058 11.2689C11.15 11.6527 11.3348 12.0901 11.7186 12.2459L12.2829 10.8561ZM14.2186 13.2609C14.6024 13.4167 15.0398 13.2319 15.1956 12.8481C15.3515 12.4643 15.1667 12.0269 14.7829 11.8711L14.2186 13.2609ZM11.4055 13.0807C10.8064 13.8621 9.87675 14.319 8.89204 14.316L8.88743 15.816C10.3403 15.8205 11.7119 15.1463 12.5959 13.9933L11.4055 13.0807ZM8.87627 14.3161C7.22834 14.3457 5.8509 13.0692 5.75528 11.4238L4.2578 11.5108C4.40013 13.9599 6.45037 15.8599 8.90321 15.8159L8.87627 14.3161ZM5.75528 11.4238C5.65965 9.77837 6.87996 8.35087 8.52022 8.18939L8.37326 6.69661C5.93183 6.93696 4.11548 9.06171 4.2578 11.5108L5.75528 11.4238ZM9.12984 7.13338C8.95276 6.74269 8.86135 6.31863 8.86174 5.88968L7.36174 5.88832C7.36115 6.53131 7.49819 7.16698 7.76363 7.75262L9.12984 7.13338ZM8.86174 5.889C8.86174 4.15538 10.2671 2.75 12.0007 2.75V1.25C9.43869 1.25 7.36174 3.32695 7.36174 5.889H8.86174ZM12.0007 2.75C13.7344 2.75 15.1397 4.15538 15.1397 5.889H16.6397C16.6397 3.32695 14.5628 1.25 12.0007 1.25V2.75ZM15.1397 5.88968C15.1401 6.31863 15.0487 6.74269 14.8716 7.13338L16.2378 7.75262C16.5033 7.16698 16.6403 6.53131 16.6397 5.88832L15.1397 5.88968ZM15.4813 8.18939C17.1215 8.35087 18.3418 9.77837 18.2462 11.4238L19.7437 11.5108C19.886 9.06171 18.0696 6.93696 15.6282 6.69661L15.4813 8.18939ZM18.2462 11.4238C18.1506 13.0692 16.7731 14.3457 15.1252 14.3161L15.0983 15.8159C17.5511 15.8599 19.6013 13.9599 19.7437 11.5108L18.2462 11.4238ZM15.1094 14.316C14.1247 14.319 13.1951 13.8621 12.5959 13.0807L11.4055 13.9933C12.2895 15.1463 13.6612 15.8205 15.114 15.816L15.1094 14.316ZM11.2507 13.537V21.066H12.7507V13.537H11.2507ZM12.7507 13.537V11.551H11.2507V13.537H12.7507ZM11.2507 8.566V9.566H12.7507V8.566H11.2507ZM11.5507 8.966L9.55074 10.466L10.4507 11.666L12.4507 10.166L11.5507 8.966ZM11.2507 9.566V11.551H12.7507V9.566H11.2507ZM11.7186 12.2459L14.2186 13.2609L14.7829 11.8711L12.2829 10.8561L11.7186 12.2459Z"
                                fill="#000000"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <h2 class="text-2xl font-semibold text-center mb-10 select-none opacity-0 scale-95 animate-fadeIn">
                Acesso rápido</h2>
            <form action="/acessorapido" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" :value="csrfToken">

                <div class="mb-4">
                    <label class="block mb-2 text-sm select-none font-medium text-gray-900"
                        for="file_input">Tela de fundo</label>
                    <input name="background"
                        class="block select-none w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        id="file_input" type="file">
                </div>

                <div class="mb-4">
                    <label class="block mb-2 text-sm select-none font-medium text-gray-900"
                        for="file_input">Logo</label>
                    <input name="foto"
                        class="block select-none w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        id="file_input" type="file">
                </div>

                <div class="mb-4">
                    <label for="nome"
                        class="select-none block text-gray-700 text-sm font-semibold mb-2">Título/Nome<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nome" id="nome" aria-describedby="helper-text-explanation"
                        class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Digite um título ou um nome aqui" required>
                </div>

                <div class="mb-4">
                    <label for="descricao"
                        class="select-none block text-gray-700 text-sm font-semibold mb-2">Descrição<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="descricao" id="descricao" aria-describedby="helper-text-explanation"
                        class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Portal do Governo do Estado de Rondônia. Aqui você encontra todo o conteúdo institucional e notícias relacionados ao Governo do Estado de Rondônia."
                        required>
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" viewBox="-3.6 -3.6 31.20 31.20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.982 19.61c.454-.7.909-1.6 1.236-2.755.755.29 1.273.636 1.591.909a8.182 8.182 0 0 1-2.864 1.845h.037v.001zm-8.8-1.855c.336-.273.845-.61 1.6-.91.336 1.164.773 2.064 1.236 2.764A8.2 8.2 0 0 1 6.2 17.755h-.018zm10.636-6.664c-.028-.81-.11-1.619-.245-2.418 1-.364 1.727-.8 2.236-1.2a8.136 8.136 0 0 1 1.282 3.618h-3.273zm-8.973-4.2a5.936 5.936 0 0 1-1.481-.8 8.2 8.2 0 0 1 2.654-1.7c-.427.636-.845 1.454-1.182 2.5h.01-.001zm7.137-2.5a8.145 8.145 0 0 1 2.654 1.7 6.01 6.01 0 0 1-1.481.8 9.58 9.58 0 0 0-1.182-2.5h.009zM14.8 9.118c.09.6.182 1.246.2 1.973H9c.027-.727.09-1.382.182-1.973 1.855.334 3.754.334 5.609 0h.009zM12 7.545c-.91 0-1.71-.072-2.39-.181.726-2.237 1.854-3.137 2.39-3.455.518.318 1.655 1.227 2.382 3.455A15.04 15.04 0 0 1 12 7.545zm-6.818-.072a8.03 8.03 0 0 0 2.245 1.2 18.368 18.368 0 0 0-.245 2.418h-3.31a8.13 8.13 0 0 1 1.319-3.618h-.01.001zm-1.3 5.436h3.3c.036.782.09 1.5.2 2.155a7.682 7.682 0 0 0-2.31 1.272 8.11 8.11 0 0 1-1.2-3.427h.01zM12 14.364c-1.09 0-2.027.09-2.845.236A16.91 16.91 0 0 1 9 12.91h6c-.027.608-.073 1.18-.145 1.69A15.388 15.388 0 0 0 12 14.355v.009zm0 5.727c-.545-.327-1.745-1.3-2.473-3.727A14.095 14.095 0 0 1 12 16.182c.955 0 1.773.063 2.482.182-.727 2.454-1.927 3.4-2.473 3.727H12zm6.927-3.764a7.634 7.634 0 0 0-2.309-1.272 17.95 17.95 0 0 0 .2-2.146h3.31a8.11 8.11 0 0 1-1.2 3.418h-.001zM12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                        <label for="websiteid"
                            class="block text-gray-700 text-sm font-semibold select-none">Website:</label>
                    </div>
                    <input name="website"
                        class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        id=websiteid type="text" placeholder="https://rondonia.ro.gov.br/setic">
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.5 5H9.5C7.29086 5 5.5 6.79086 5.5 9V15C5.5 17.2091 7.29086 19 9.5 19H15.5C17.7091 19 19.5 17.2091 19.5 15V9C19.5 6.79086 17.7091 5 15.5 5Z"
                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.5 15C10.8431 15 9.5 13.6569 9.5 12C9.5 10.3431 10.8431 9 12.5 9C14.1569 9 15.5 10.3431 15.5 12C15.5 12.7956 15.1839 13.5587 14.6213 14.1213C14.0587 14.6839 13.2956 15 12.5 15Z"
                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <rect x="15.5" y="9" width="2" height="2" rx="1" transform="rotate(-90 15.5 9)"
                                    fill="#000000"></rect>
                                <rect x="16" y="8.5" width="1" height="1" rx="0.5" transform="rotate(-90 16 8.5)"
                                    stroke="#000000" stroke-linecap="round"></rect>
                            </g>
                        </svg>
                        <label for="instagramid"
                            class="block text-gray-700 text-sm font-semibold select-none">Instagram:</label>
                    </div>
                    <input name="instagram"
                        class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        id="instagramid" type="text" placeholder="https://www.instagram.com/setic">
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                        <label for="whatsappid"
                            class="block text-gray-700 text-sm font-semibold select-none">Whatsapp:</label>
                    </div>
                    <input name="whatsapp"
                        class="select-none bg-gray-50 border hover:bg-white focus:bg-white border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text" placeholder="https://web.whatsapp.com/send/?phone=556984460144">
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" viewBox="-3.6 -3.6 31.20 31.20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2 6C2 3.79086 3.79086 2 6 2H18C20.2091 2 22 3.79086 22 6V18C22 20.2091 20.2091 22 18 22H6C3.79086 22 2 20.2091 2 18V6ZM6 4C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H12V13H11C10.4477 13 10 12.5523 10 12C10 11.4477 10.4477 11 11 11H12V9.5C12 7.567 13.567 6 15.5 6H16.1C16.6523 6 17.1 6.44772 17.1 7C17.1 7.55228 16.6523 8 16.1 8H15.5C14.6716 8 14 8.67157 14 9.5V11H16.1C16.6523 11 17.1 11.4477 17.1 12C17.1 12.5523 16.6523 13 16.1 13H14V20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                        <label class="block text-gray-700 text-sm font-semibold select-none">Facebook:</label>
                    </div>
                    <input name="facebook"
                        class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text" placeholder="https://www.facebook.com/">
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" viewBox="-3 -3 26.00 26.00" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>email [#1573]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -922.000000)"
                                        fill="#000000">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path
                                                d="M262,764.291 L254,771.318 L246,764.281 L246,764 L262,764 L262,764.291 Z M246,775 L246,766.945 L254,773.98 L262,766.953 L262,775 L246,775 Z M244,777 L264,777 L264,762 L244,762 L244,777 Z"
                                                id="email-[#1573]"> </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <label class="block text-gray-700 text-sm font-semibold select-none">Email:</label>
                    </div>
                    <input name="email"
                        class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text" placeholder="seticro@gmail.com">
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg"
                            stroke="#000000" stroke-width="0.12000000000000002">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M18.72 3.99997H5.37C5.19793 3.99191 5.02595 4.01786 4.86392 4.07635C4.70189 4.13484 4.55299 4.22471 4.42573 4.34081C4.29848 4.45692 4.19537 4.59699 4.12232 4.75299C4.04927 4.909 4.0077 5.07788 4 5.24997V18.63C4.01008 18.9901 4.15766 19.3328 4.41243 19.5875C4.6672 19.8423 5.00984 19.9899 5.37 20H18.72C19.0701 19.9844 19.4002 19.8322 19.6395 19.5761C19.8788 19.32 20.0082 18.9804 20 18.63V5.24997C20.0029 5.08247 19.9715 4.91616 19.9078 4.76122C19.8441 4.60629 19.7494 4.466 19.6295 4.34895C19.5097 4.23191 19.3672 4.14059 19.2108 4.08058C19.0544 4.02057 18.8874 3.99314 18.72 3.99997ZM9 17.34H6.67V10.21H9V17.34ZM7.89 9.12997C7.72741 9.13564 7.5654 9.10762 7.41416 9.04768C7.26291 8.98774 7.12569 8.89717 7.01113 8.78166C6.89656 8.66615 6.80711 8.5282 6.74841 8.37647C6.6897 8.22474 6.66301 8.06251 6.67 7.89997C6.66281 7.73567 6.69004 7.57169 6.74995 7.41854C6.80986 7.26538 6.90112 7.12644 7.01787 7.01063C7.13463 6.89481 7.2743 6.80468 7.42793 6.74602C7.58157 6.68735 7.74577 6.66145 7.91 6.66997C8.07259 6.66431 8.2346 6.69232 8.38584 6.75226C8.53709 6.8122 8.67431 6.90277 8.78887 7.01828C8.90344 7.13379 8.99289 7.27174 9.05159 7.42347C9.1103 7.5752 9.13699 7.73743 9.13 7.89997C9.13719 8.06427 9.10996 8.22825 9.05005 8.3814C8.99014 8.53456 8.89888 8.6735 8.78213 8.78931C8.66537 8.90513 8.5257 8.99526 8.37207 9.05392C8.21843 9.11259 8.05423 9.13849 7.89 9.12997ZM17.34 17.34H15V13.44C15 12.51 14.67 11.87 13.84 11.87C13.5822 11.8722 13.3313 11.9541 13.1219 12.1045C12.9124 12.2549 12.7546 12.4664 12.67 12.71C12.605 12.8926 12.5778 13.0865 12.59 13.28V17.34H10.29V10.21H12.59V11.21C12.7945 10.8343 13.0988 10.5225 13.4694 10.3089C13.84 10.0954 14.2624 9.98848 14.69 9.99997C16.2 9.99997 17.34 11 17.34 13.13V17.34Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                        <label class="block text-gray-700 text-sm font-semibold select-none">Linkedin:</label>
                    </div>
                    <input name="linkedin"
                        class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text" placeholder="https://br.linkedin.com/">
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" fill="#000000" viewBox="-1.6 -1.6 35.20 35.20"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M11.919 24.94c-2.548 0-4.921-.747-6.919-2.032a9.049 9.049 0 0 0 6.681-1.867 4.512 4.512 0 0 1-4.215-3.137c.276.054.559.082.848.082.412 0 .812-.056 1.193-.156a4.519 4.519 0 0 1-3.622-4.425v-.059a4.478 4.478 0 0 0 2.042.564 4.507 4.507 0 0 1-2.008-3.758c0-.824.225-1.602.612-2.268a12.811 12.811 0 0 0 9.303 4.715 4.517 4.517 0 0 1 7.692-4.115 9.107 9.107 0 0 0 2.866-1.094 4.542 4.542 0 0 1-1.983 2.498 9.08 9.08 0 0 0 2.592-.71 9.283 9.283 0 0 1-2.252 2.337c.008.193.014.388.014.583-.001 5.962-4.542 12.843-12.844 12.842">
                                </path>
                            </g>
                        </svg>
                        <label class="block text-gray-700 text-sm font-semibold select-none">Twitter:</label>
                    </div>
                    <input name="twitter"
                        class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text" placeholder="https://twitter.com/?lang=pt-br">
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg width="25px" viewBox="-1.5 -1.5 28.00 28.00" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.168 19.0028C20.4724 19.0867 22.41 17.29 22.5 14.9858V9.01982C22.41 6.71569 20.4724 4.91893 18.168 5.00282H6.832C4.52763 4.91893 2.58998 6.71569 2.5 9.01982V14.9858C2.58998 17.29 4.52763 19.0867 6.832 19.0028H18.168Z"
                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.008 9.17784L15.169 11.3258C15.3738 11.4454 15.4997 11.6647 15.4997 11.9018C15.4997 12.139 15.3738 12.3583 15.169 12.4778L12.008 14.8278C11.408 15.2348 10.5 14.8878 10.5 14.2518V9.75184C10.5 9.11884 11.409 8.77084 12.008 9.17784Z"
                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <label class="block text-gray-700 text-sm font-semibold select-none">Youtube:</label>
                    </div>
                    <input name="youtube"
                        class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        type="text" placeholder="https://www.youtube.com/">
                </div>

                <div class="mb-4">
                    <div class="flex justify-between items-center">
                        <label class="block text-gray-700 text-sm font-semibold select-none">Site/Portal <span
                                class="text-red-500">*</span></label>
                    </div>
                    <input name="uri" placeholder="/govro" type="text"
                        class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-4">
                        <label for="add-input" class="block text-gray-700 text-sm font-semibold select-none">
                            Links Personalizados:
                        </label>
                        <button id="add-input" class="text-3xl" type="button" @click="addField"
                            :disabled="fields.length >= maxFields">
                            +
                        </button>
                    </div>

                    <!-- Renderizando os campos dinamicamente -->
                    <div v-for="(field, index) in fields" :key="index" class="mb-6 border-b pb-4">
                        <div class="mb-2">
                            <div class="flex justify-between items-center">
                                <label class="block text-gray-700 text-sm font-semibold select-none">
                                    Título:
                                </label>
                                <button type="button" class="text-red-500 text-lg font-bold"
                                    @click="removeField(index)">
                                    ×
                                </button>
                            </div>
                            <input name="nomelabel[]" v-model="field.title" placeholder="Nome" type="text"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required/>
                        </div>
                        <div>
                            <div class="flex justify-between items-center">
                                <label class="block text-gray-700 text-sm font-semibold select-none">
                                    Link do campo personalizado:
                                </label>
                            </div>
                            <input name="linklabel[]" v-model="field.link" placeholder="Campo personalizado 1"
                                type="text"
                                class="select-none hover:bg-white focus:bg-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required/>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Gerar</button>
                <p class="text-gray-600 text-xs text-center select-none  mt-4">
                    Os campos com <span class="text-red-500">*</span> são restritamente obrigatórios.
                </p>

                <p>
                    <a href="#" @click.prevent="openModal" id="openThirdModal"
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
            type: Array,
        },
        data: {
            type: Array,
        },
        message: {
            type: String,
        },
        message_success: {
            type: String,
        },
    },

    data() {
        return {
            maxFields: 6,
            fields: [],
            activeTab: null,
            isEditModalOpen: false,
            isModalOpen: false,
            foto: null,
            nome: '',
            descricao: '',
            website: '',
            instagram: '',
            whatsapp: '',
            facebook: '',
            email: '',
            linkedin: '',
            twitter: '',
            youtube: '',
            site: '',
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content
        };
    },

    methods: {
        addField() {
            if (this.fields.length < this.maxFields) {
                this.fields.push({ title: '', link: '' });
            }
        },

        removeField(index) {
            this.fields.splice(index, 1);
        },

        toggleContent(tab) {
            this.activeTab = this.activeTab === tab ? null : tab;
        },

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

        async copyToClipboard(uri) {
            try {
                await navigator.clipboard.writeText(`${this.baseUrl}/${uri}`);
            } catch (error) { }
        }
    }, 
}
</script>