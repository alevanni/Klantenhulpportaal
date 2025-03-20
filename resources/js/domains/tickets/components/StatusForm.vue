<script setup lang="ts">
import { ref } from 'vue';
import { userStore, getAllUsers, getAdmins } from '../../users/routes';
const emit = defineEmits(['assign_status']);
const { ticket } = defineProps(['ticket']);
const ticketCopy = ref({ id: ticket.id, title: ticket.title, description: ticket.description, status: ticket.status });

const assignStatus = () => {
    emit('assign_status', ticketCopy.value);
}
</script>

<template>
    <form @submit.prevent="assignStatus">
        <label for="status">Status:</label>
        <select v-model="ticketCopy.status" id="status">
            <option value=0> pending </option>
            <option value=1> in progress </option>
            <option value=2> closed </option>
        </select>
        <input type="submit" value="Save">
    </form>

</template>