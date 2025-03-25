<script setup lang="ts">
const { categories } = defineProps(['categories']);
import DeletionForm from './DeletionForm.vue';
//import Modal from './Modal.vue';
//import { confirmModal } from '../../../services/modal';
import { formModal } from '../../../services/modal';
import FormModal from '../../../services/modal/dom/FormModal.vue';
import Modal from './Modal.vue';
import { categoryStore } from '../routes';
//const modal = ;
const deleteCategory = async (id: number) => {
    await categoryStore.actions.delete(id);
    console.log('delete ' + id);
}
</script>

<template>

    <table>
        <thead>
            <tr>
                <th>
                    Id
                </th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="category in categories" :key="category.id">
                <td>{{ category.id }}</td>
                <td>{{ category.name }} <RouterLink class="edit-link"
                        :to="{ name: 'categories.edit', params: { id: category.id } }"> &#128393; Edit
                    </RouterLink>
                    <button class="delete-link" @click="formModal(category.id, DeletionForm, deleteCategory)"> Delete
                        &#128465;</button>
                </td>

            </tr>
        </tbody>
    </table>


</template>