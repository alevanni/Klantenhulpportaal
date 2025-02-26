<script setup lang="ts">
import Card from './Card.vue';
const { users } = defineProps(['users']);

</script>

<template>
    <div class="table">
        

        <Card v-for="user in users" :key="user.id" :user="user"></Card>


    </div>

</template>