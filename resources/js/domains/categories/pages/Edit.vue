<script setup lang="ts">
import { ref } from 'vue';
import Form from '../components/Form.vue';
import { categoryStore } from '../routes';
import { goToOverviewPage } from '../../../services/router';
import { useRoute } from 'vue-router';
import { isAdmin } from '../../../services/auth';
const category = categoryStore.getters.byId(+useRoute().params.id);

const editCategory = async (category: any) => {
    try {
        await categoryStore.actions.update(category.id, category);
        goToOverviewPage('categories');
    }
    catch (e) {
        console.log(e);
    }

}
</script>

<template>
    <div v-if="isAdmin">
        <h1>Edit tag</h1>
        <Form :category="category" @category-submit="editCategory"></Form>
    </div>

</template>