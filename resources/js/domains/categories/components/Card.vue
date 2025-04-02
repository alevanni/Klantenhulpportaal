<script setup lang="ts">
import DeletionForm from './DeletionForm.vue';
import { formModal } from '../../../services/modal';
import { categoryStore } from '../routes';
const { category } = defineProps(['category']);

const deleteCategory = async (id: number) => {
    try {
        await categoryStore.actions.delete(id);
    }
    catch(e) {
        console.log(e);
    }
    
}
</script>

<template>

    <tr>
        
                <td>{{ category.id }}</td>
                <td>{{ category.name }} <RouterLink class="edit-link"
                        :to="{ name: 'categories.edit', params: { id: category.id } }"> &#128393; Edit
                    </RouterLink>
                    <button class="delete-link" @click="formModal(category.id, DeletionForm, deleteCategory)"> 
                        &#128465; Delete</button>
                </td>

           
    </tr>
</template>