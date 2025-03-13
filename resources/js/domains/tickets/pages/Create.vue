<script setup lang="ts">
import { ref } from 'vue';
import Form from '../components/Form.vue';
import { getLoggedInUser } from '../../../services/auth';
const newTicket = ref({ title: "", description: "", categories: [], created_by: getLoggedInUser().id })
</script>

<template>
    <h1>Create a new ticket</h1>
    <Form></Form>
    {{ newTicket }}
</template>