<script setup lang='ts'>
const { comment } = defineProps(['comment']);
import { userStore } from '../../users/routes';
</script>

<template>
    <tr>
        <td><span class="comment-author">{{ userStore.getters.byId(comment.created_by).value?.firstName + ' ' +
            userStore.getters.byId(comment.created_by).value?.lastName + " on " + new
                Intl.DateTimeFormat("en-GB").format(new Date(comment.created_on)) }}:</span> <br>{{
                    comment.body }}</td>
    </tr>
</template>