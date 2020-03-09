<template>
  <div class="comp comp-card">
    {{ item.date }}
  </div>
</template>

<script>
export default {
  name: 'Message',
  props: {
    msg: String,
    item: Object
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
