<template>
    <div class="view_Product view">
        <h1>ORDER DETAILS</h1>

        <ul>
            <li v-for="(value, index) in item" :key="index">
                {{ index }} : {{ value }}
            </li>
        </ul>
    </div>
</template>

<script>
import HTTP from "@/js/http";

export default {
    name: "Order",

    props: {
        id: Number
    },

    data: function() {
        return {
            item: Object
        };
    },

    mounted() {
        this.getData();
    },

    methods: {
        getData: function() {
            HTTP.get("api/order/" + this.id).then(response => {
                this.processData(response.data);
            });
        },

        processData: function(data) {
            // ...

            this.item = data;
        }
    }
};
</script>
