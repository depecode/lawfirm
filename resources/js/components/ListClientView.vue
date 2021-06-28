<template>
    <div>
        <div v-for="(client, index) in clients" :key="index">
            <list-client
                :client="client"
                class="client"
                v-on:clientchanged="$emit('reloadedlist')"
            />
        </div>
    </div>
</template>

<script>
import listClient from "./ListClient"

    export default {
        props: ['clients'],
        components: {
            listClient
        }
    }

</script>

<style scoped>
    .client {
        background: #e6e6e6;
        padding: 5px;
        margin-top: 5px;
    }
</style>