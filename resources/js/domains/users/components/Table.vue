<script setup lang="ts">
import Card from './Card.vue';
const { users } = defineProps(['users']);

</script>

<template>
    <div class="table">

        <table>
            <thead>
                <tr>
                    <th class="table-id">Id</th>
                    <th class="table-name">First Name</th>
                    <th class="table-name">Last Name</th>
                    <th class="table-email">Email</th>
                    <th class="table-role">Role</th>
                    <th class="table-telephone">Telephone number</th>
                    <th class="table-button"></th>
                </tr>

            </thead>
            <tbody>
                <Card v-for="user in users" :key="user.id" :user="user"></Card>
            </tbody>
        </table>



    </div>

</template>