<script setup lang="ts">

import {checkIfLoggedIn, getLoggedInUser, isLoggedIn} from './services/auth/index';

isLoggedIn;
const updateInfo = async () => {
    await checkIfLoggedIn();
    /*
    console.log(getLoggedInUser());
    if ( isLoggedIn.value ) {
        console.log(isLoggedIn.value);
        getLoggedInUser();
    }
    */
}


</script>

<template>
    <button @click="updateInfo">Get the logged user</button>
   <p v-if="isLoggedIn">{{ getLoggedInUser() }}</p>
</template>