<template>
    <div class="clientListContianer">
        <div class="heading">
            <h2 id="title">Client List</h2>
            <add-client-form
                 v-on:reloadlist="getList()"
             />
        </div>
        <list-client-view 
            :clients="clients"
            v-on:reloadlist="getList()"
        />
    </div>
</template>

<script>
import addClientForm from "./AddClientForm";
import listClientView from "./ListClientView";

export default {
    components: {
        addClientForm,
        listClientView
    },
    data: function() {
        return {
            clients: []
        };
    },
    methods: {
        getList() {
            axios
                .get("api/clients")
                .then(response => {
                    this.clients = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.getList();
    }
};
</script>

<style scoped>
.clientListContianer {
    width: 350px;
    margin: auto;
}
</style>
