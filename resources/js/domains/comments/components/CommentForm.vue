<script setup lang="ts">
import { ref } from 'vue';

const { comment } = defineProps(['comment']);
const commentCopy = ref({...comment});

const emit = defineEmits(['submitComment']);

const submitForm = (ticket: any) => {
emit('submitComment', commentCopy.value);
}
</script>

<template>
   
    <form @submit.prevent="submitForm">
<table class="new-comment">
    <thead>
        <tr>
            <th>
            Your reply:
        </th>
        </tr>
        
    </thead>
    <tbody>
        <tr>
           <td> <textarea class="comment-text" v-model="commentCopy.body"></textarea></td>
        </tr>
        <tr><td><input type="submit" value="Send"></td></tr>
    </tbody>
</table>
    </form>
    {{ commentCopy }}
    
</template>