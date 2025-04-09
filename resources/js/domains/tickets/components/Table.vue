<script setup lang="ts">
import { ref } from 'vue';
import { compare } from '../../../services/helpers/sort';
import Card from './Card.vue';
import { Ticket } from '../../types';
const { tickets } = defineProps(['tickets']);
//const sortedTickets = tickets.sort((a: Ticket, b: Ticket) => compare(new Date(a.updated_on), new Date(b.updated_on)));
//console.log(sortedTickets.value)
</script>

<template>
    <div class="table" >
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