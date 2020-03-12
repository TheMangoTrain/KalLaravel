<template>
    <div class="comp comp-card">
        {{ item.date }}
    </div>
</template>

<script>
export default {
    name: "Message",
    props: {
        msg: String,
        item: Object
    }
};
</script>

<style scoped lang="scss"></style>
