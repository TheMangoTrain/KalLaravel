<template>
    <div class="view_PrintSheet view">
        <h1>PRINT SHEET DETAILS</h1>

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
    name: "PrintSheet",

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
            HTTP.get("api/printsheet/" + this.id).then(response => {
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
