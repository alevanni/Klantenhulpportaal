<script setup lang='ts'>
const { comment } = defineProps(['comment']);
import { userStore } from '../../users/routes';
</script>

<template>
    <tr>
        <td>{{userStore.getters.byId(comment.created_by).value?.firstName + ' ' +
            userStore.getters.byId(comment.created_by).value?.lastName+ ": " + comment.body}}</td>
    </tr>
</template>