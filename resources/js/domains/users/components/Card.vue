<script setup lang="ts">
import { ref } from 'vue';
import EditForm from './EditForm.vue';
const { user } = defineProps(['user']);
const edit = ref(0);

const editUser = () => {
    edit.value = edit.value + 1;

}
</script>

<template>
    <tr v-if="(edit % 2 === 0)">
        <td>{{ user.id }}</td>
    <td>{{ user.firstName + ' ' + user.lastName }}</td>
    <td>{{ user.email }}</td>   
    <td :class="[user.isAdmin ? 'admin' : 'basic']">{{ user.isAdmin ? "Admin" : "Basic User" }}</td>
    <td>1111111</td>
    <td>
    <button class="edit-link" @click="editUser">&#128393; Edit User</button>
    </td>
    </tr>
    <tr v-else><EditForm></EditForm> </tr>
   
       
    
</template>