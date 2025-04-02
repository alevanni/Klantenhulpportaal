<script setup lang="ts">
import { ref } from 'vue';
import { userStore, getAllUsers, getAdmins } from '../../users/routes';
const emit = defineEmits(['assign_user']);
const { ticket } = defineProps(['ticket']);
const ticketCopy = ref({ id: ticket.id, assigned_to: ticket.assigned_to, title: ticket.title, description: ticket.description });

const assignUser = () => {
    emit('assign_user', ticketCopy.value);
}
</script>

<template>
    <form @submit.prevent="assignUser">
        <label for="assigned-to">Assigned to: </label>
        <select v-model="ticketCopy.assigned_to" id="assigned-to">
            <option v-for="user in getAdmins" :key="user.id" :value="user.id">
                {{ user.firstName + ' ' + user.lastName }}
            </option>
        </select>
        <input type="submit" value="&#128190; Save">
    </form>

</template>