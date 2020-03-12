<template>
    <div class="view_Products view">
        <h1>PRODUCTS</h1>

        <Table
            :items="this.resultsFiltered"
            :columns="columns"
            :contentType="contentType"
            :contentKey="contentKey"
        />
    </div>
</template>

<script>
import HTTP from "@/js/http";
import Table from "@/js/components/Table.vue";

export default {
    name: "Products",
    components: {
        Table
    },

    data: function() {
        return {
            resultsItems: null,
            contentType: "Product",
            contentKey: "product_id",
            columns: [
                "product_id",
                "title",
                "size",
                "price",
                "inventory_quantity"
            ],
            filterApplied: []
        };
    },

    mounted() {
        this.getData();
    },

    computed: {
        resultsFiltered: function() {
            if (this.resultsItems != null) {
                //Filtering logic to go here
                return this.resultsItems.data;
            } else {
                return null;
            }
        }
    },

    methods: {
        getData: function() {
            HTTP.get("api/products").then(response => {
                this.processData(response.data);
            });
        },

        processData: function(data) {
            // ...

            this.resultsItems = data;

           // this.filterResults;
        }
    }
};
</script>
