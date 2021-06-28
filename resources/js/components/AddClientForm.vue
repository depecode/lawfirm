<template>
    <div class="addClient">
        <input type="text" v-model="client.firstname" />
        <input type="text" v-model="client.lastname" />
        <input type="text" v-model="client.email" />
        <input type="text" v-model="client.dateprofiled" />
        <input type="text" v-model="client.primarylegalcounsel" />
        <input type="text" v-model="client.dateofbirth" />
        <input type="text" v-model="client.profileimage" />
        <font-awesome-icon
            icon="plus-square"
            @click="addClient()"
            :class="[client.firstname ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            client: {
                firstname: "",
                lastname: "",
                email: "",
                dateprofiled: "",
                primarylegalcounsel: "",
                dateofbirth: "",
                profileimage: "",
            }
        };
    },
    methods: {
        addClient() {
            if( this.client.firstname == '') {
                return;
            }

            axios.post('api/client/store', {
                client: this.client
            })
            .then( response => {
                if( response.status == 201 ) {
                    this.client.firstname = "";
                    this.$emit('reloadlist');
                }
            })
            .catch( error => {
                console.log( error );
            })
        }
    }
};
</script>

<style scoped>
.addClient {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100px;
}

.plus {
    font-size: 20px;
}
.active {
    color: #00ce25;
}
.inactive {
    color: #999999;
}
</style>
