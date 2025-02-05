<script setup lang="ts">
import { ref } from 'vue';
import { getLoggedUser, getUser } from './store';

const logged = ref({});

const updateInfo = async () => {
    getLoggedUser();
    logged.value=getUser();
}
</script>

<template>
    <button @click="updateInfo">Get the logged user</button>
    {{ logged }}
</template>