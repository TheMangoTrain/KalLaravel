<template>
  <div id="app">
    <Main>
      <div id="nav">
        <router-link to="/">Home</router-link>
        <router-link to="/events">Events</router-link>
        <router-link to="/stats">Stats</router-link>
        <router-link to="/map">Map</router-link>
      </div>
      <router-view />
bv vbvfbvb
    </Main>
    
  </div>
</template>


<script>
    //import Footer from '@/components/Footer.vue'
console.log("hello3")

  export default {
    name: 'App',
    components: {
    
    },

  }

  console.log("hello4")
</script>


<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#app Main {
  min-height: 100vh;
}

#nav {
  padding: 1em;

  a {
    font-weight: bold;
    color: #2c3e50;
    text-decoration: none;
    padding: 1em;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
