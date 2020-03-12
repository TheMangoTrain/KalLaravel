<template>
    <div class="view_Product view">
        <h1>PRODUCT DETAILS</h1>

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
    name: "Product",

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
            HTTP.get("api/product/" + this.id).then(response => {
                this.processData(response.data);
            });
        },

        processData: function(data) {
            // ...

            console.log("processing data");

            this.item = data;
        }
    }
};
</script>
