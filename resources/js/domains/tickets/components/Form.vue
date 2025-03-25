<script setup>
import { ref } from 'vue';
import { getAllCategories, getAllButCategories, categoryStore } from '../../categories/routes';
const { ticket } = defineProps(['ticket']);
const ticketCopy = ref({ ...ticket });
//ticketCopy.value.categories = [];
const emit = defineEmits(['ticketSubmit']);

const submitForm = () => {
    emit('ticketSubmit', ticketCopy.value);
}
</script>

<template>
    <form @submit.prevent="submitForm">
        <table>
            <tbody>
                <tr>
                    <td><label for="title">Title</label></td>
                    <td><textarea id="title" rows="1" cols="50" v-model="ticketCopy.title"> </textarea></td>
                </tr>
                <tr>
                    <td><label for="description">Description</label></td>
                    <td><textarea id="description" rows="10" cols="50" v-model="ticketCopy.description"> </textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="categories">Tags</label></td>
                    <td><select v-model="ticketCopy.categories" multiple>
                            <option v-for="category in ticket.categories" :key="category.id"
                                :value="{ id: category.id }" selected>
                                {{ categoryStore.getters.byId(category.id).value?.name }}
                            </option>
                            <option v-for="category in getAllButCategories(ticket.categories).value" :key="category.id"
                                :value="{ id: category.id }">
                                {{ category.name }}
                            </option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="submit">Submit</label></td>
                    <td><input id="submit" type="submit" :value="ticket.title == '' ? 'Add Ticket' : 'Edit Ticket'">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    {{ ticketCopy }}
</template>