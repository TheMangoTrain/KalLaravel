<template>
    <div id="app">
        <div class="loaderAnim" v-if="loading">
            <div class="inner">
                <div class="lds-ripple">
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <main>
            <nav>
                <h3>Kal's Laravel Sample</h3>
                <router-link to="/">Home</router-link>
                <router-link to="/Products">Products</router-link>
                <router-link to="/Orders">Orders</router-link>
                <router-link to="/PrintSheets">Print Sheets</router-link>
                <router-link to="/PrintSheetItems"
                    >Print Sheet Items</router-link
                >
                <hr style="width: 100%;height: 3px;" />
                <div @click="reSeedDB">Reset DB</div>
            </nav>

            <router-view />
        </main>

        <ModalRoot />
    </div>
</template>

<script>
import ModalRoot from "@/js/components/ModalRoot.vue";
import HTTP from "@/js/http";

export default {
    name: "App",

    components: {
        ModalRoot
    },

    data: function() {
        return { loading: false };
    },

    methods: {
        reSeedDB: function() {
            this.loading = true;
            HTTP.get("api/db/reseed").then(response => {
                this.loading = false;
                this.$router.go();
            });
        }
    }
};
</script>

<style lang="scss">
html,
body {
    padding: 0;
    margin: 0;
}

#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: black;
}

#app main {
    min-height: 100vh;
    display: flex;
}

.loaderAnim {
    position: absolute;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: center;
    align-items: center;
}

.loaderAnim .inner {
}

.lds-ripple {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
}
.lds-ripple div {
    position: absolute;
    border: 4px solid #fff;
    opacity: 1;
    border-radius: 50%;
    animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
    animation-delay: -0.5s;
}
@keyframes lds-ripple {
    0% {
        top: 36px;
        left: 36px;
        width: 0;
        height: 0;
        opacity: 1;
    }
    100% {
        top: 0px;
        left: 0px;
        width: 72px;
        height: 72px;
        opacity: 0;
    }
}

nav > h3 {
    line-height: 1;
    padding: 1rem;
}

.view {
    flex: 1;
    padding: 5%;
}

nav {
    flex: 0;
    min-width: 150px;
    display: flex !important;
    flex-direction: column;
    justify-content: flex-start;
    background-color: #fffb00;

    a {
        font-weight: bold;
        color: black;
        text-decoration: none;
        padding: 1rem 0 1rem 1rem;
        position: relative;
        text-decoration: none;

        &.router-link-exact-active {
            border-right: 4px solid black;
        }

        /* &.router-link-exact-active:after {
      content: ">";
      position: absolute;
      right: 0;
    } */
    }

    a:hover {
        color: white;
        background-color: #ff8f00;
        text-decoration: none;
    }
}
</style>
