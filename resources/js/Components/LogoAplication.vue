<template>
    <!-- Adicionar favicon -->
    <img class="select-none" :src=ConfigLogo>
</template>

<script>
export default {
    props: {
        ConfigLogo: String,
    }
}
</script>