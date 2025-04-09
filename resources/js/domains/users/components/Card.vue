<script setup lang="ts">
import { ref } from 'vue';
import EditForm from './EditForm.vue';
import { userStore } from '../routes';
import DeletionForm from './DeletionForm.vue';
import { formModal } from '../../../services/modal';
import { ticketStore } from '../../tickets/routes';
const { user } = defineProps(['user']);
const edit = ref(0);

const editUser = () => {
    edit.value = edit.value + 1;

}
const updateUser = async (user: any) => {
    try {
        await userStore.actions.update(user.id, user)
        edit.value = edit.value + 1;
    }
    catch (e) {

    }

}

const deleteUser = async (id: number) => {
    try {
        await userStore.actions.delete(id);
        
    }
    catch (e) {
        console.log(e);
    }

}

</script>

<template>
    <tr v-if="(edit % 2 === 0)">
        <td class="table-id">{{ user.id }}</td>
        <td class="table-name">{{ user.firstName }}</td>
        <td class="table-name">{{ user.lastName }}</td>
        <td class="table-email">{{ user.email }}</td>
        <td class="table-role" :class="[user.isAdmin ? 'admin' : 'basic']">{{ user.isAdmin ? "Admin" : "Basic User" }}
        </td>
        <td class="table-telephone">{{ user.telephone }}</td>
        <td class="table-button">
            <button class="edit-link" @click="editUser">&#128393; Edit User</button>
            <button class="edit-link" @click="formModal(user.id, DeletionForm, deleteUser)"> &#128465; Delete
                User</button>
        </td>
    </tr>
    <tr v-else>
        <td colspan="7" class="edit-user">
            <EditForm :user="user" @cancel="editUser" @submit="updateUser"></EditForm>
        </td>

    </tr>



</template>