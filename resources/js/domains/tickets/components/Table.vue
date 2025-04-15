<script setup lang="ts">

import Card from './Card.vue';

const { tickets } = defineProps(['tickets']);

</script>

<template>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created by</th>
                    <th>Created on</th>
                    <th>Last Updated on</th>
                    <th>Assigned to</th>
                </tr>
            </thead>
            <tbody>
                <Card v-for="ticket in tickets" :key="ticket.id" :ticket="ticket"></Card>
            </tbody>
        </table>




    </div>

</template>