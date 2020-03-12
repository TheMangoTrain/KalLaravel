<template>
    <div class="comp comp-List">
        <div class="inner">
            <Card
                :id="index"
                v-for="(item, index) in filteredItems"
                :key="index"
                :item="item"
                class="card"
            />
        </div>
    </div>
</template>

<script>
import Card from "@/js/components/Card.vue";

export default {
    name: "List",

    components: {
        Card
    },

    props: {
        msg: String,
        items: Array,
        focusedID: Number
    },

    mounted() {
        //console.log("Items in list: " + this.items);
    },

    beforeUpdate() {
        //console.log("update list" + this.items) // Logs the counter value every second, before the DOM updates.
    },

    methods: {},

    computed: {
        filteredItems() {
            if (this.focusedID) {
                return this.items.filter(item => {
                    return item; //(this.focusedID === item.LocationID);
                });
            } else {
                return this.items;
            }
        }
    },

    data() {
        return {};
    }
};
</script>
