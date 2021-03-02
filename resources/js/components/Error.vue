<template>
    <div class="alert alert-danger my-2" role="alert" v-if="error && error.length > 0">
        {{ error[0] }}
    </div>
</template>
<script>
export default {
    props: {
        error: Array
    }
}
</script>
