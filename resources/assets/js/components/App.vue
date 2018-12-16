<template>
    <div>
        <router-link :to="{ name: 'register' }" class="nav-link">Register</router-link>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {

    }
</script>