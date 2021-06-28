<template>
    <div class="client">
        <input 
        type="checkbox"
        @change="updateCheck()"
        v-model="client.firstname"
        />
        <table>
        <thead>
        <tr>
        <th>FirstName</th>
        <th>Last</th>
        <th>Email</th>
        </tr>
    </thead>
        <tbody>

        <!-- <span :class="[client.firstname ? 'firstname': '', 'clientText' ]">{{ client.firstname }}</span> -->
        <!-- <span>{{ client.firstname }}</span> -->
    
        <tr>
        <td>{{ client.firstname }}</td>
        <td>{{ client.lastname }}</td>
        <td>{{ client.email }}</td>
        </tr>
        
    </tbody>
            </table>

            <button @click="removeClient()" class="trashcan">
                <font-awesome-icon icon="trash"/>
            </button>
        </div>
</template>

<script>
    export default {
       props: ['client'],
       methods: {
           updateCheck() {
               axios.put('api/client/' + this.client.id, {
                   client: this.client
               })
               .then( response => {
                   if( response.status == 200 ) {
                       this.$emit('clientchanged');
                   }
               })
               .catch( error => {
                   console.log( error );
               })
           },
           removeClient() {
               axios.delete('api/client/' + this.client.id )
               .then( response => {
                   if( response.status == 200 ){
                       this.$emit('clientchanged');
                   }
               })
               .catch ( error => {
                   console.log( error );
               })
           }
       }
    }
</script>

<style scoped>
    .firstname{
        text-decoration: line-through;
        color: #999999;
    }
    .clientText{
        width: 100%;
        margin-left: 20px;
    }
    .client{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .trashcan {
        background: #e6e6e6;
        border: none;
        color: #FF0000;
        outline: none;
    }
</style>