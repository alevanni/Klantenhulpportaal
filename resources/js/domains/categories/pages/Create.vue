<script setup lang="ts">
import { ref } from 'vue';
import Form from '../components/Form.vue';
import { categoryStore } from '../routes';
import { goToOverviewPage } from '../../../services/router';
import { isAdmin } from '../../../services/auth';
const newCategory = ref({ name: "" })
const addCategory = async (category: any) => {
    try {
        await categoryStore.actions.create(category);
        goToOverviewPage('categories');
    }
    catch (e) {
        console.log(e)
    }

}
</script>

<template>
    <div v-if="isAdmin">
        <h1>Create a new tag</h1>
        <Form :category="newCategory" @category-submit="addCategory"></Form>
    </div>

</template>