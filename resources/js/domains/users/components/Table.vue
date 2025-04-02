<script setup lang="ts">
import Card from './Card.vue';
const { users } = defineProps(['users']);

</script>

<template>
    <div class="table">
        
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Telephone number (to be done)</th>
        </tr>
       
    </thead>
    <tbody>
        <Card v-for="user in users" :key="user.id" :user="user"></Card> 
    </tbody>
</table>
      


    </div>

</template>