<script setup lang="ts">
import { compare } from '../../../services/helpers/sort';
import Card from './Card.vue';
const { tickets } = defineProps(['tickets']);

</script>

<template>
    <div class="table">
        <table>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Created by</th>
                <th>Created on</th>
                <th>Last Updated on</th>
                <th>Assigned to</th>
            </tr>
            <Card v-for="ticket in tickets" :key="ticket.id" :ticket="ticket"></Card>
        </table>




    </div>

</template>