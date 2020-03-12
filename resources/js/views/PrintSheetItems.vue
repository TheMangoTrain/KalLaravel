<template>
    <div class="view_PrintSheetItems view">
        <h1>PRINT SHEET ITEMS</h1>

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
    name: "PrintSheetItems",
    components: {
        Table
    },

    data: function() {
        return {
            resultsItems: null,
            contentType: "PrintSheetItem",
            contentKey: "ps_id",
            columns: [
                "psi_id",
                "ps_id",
                "order_item_id",
                "image_url",
                "x_pos",
                "y_pos",
                "width",
                "height"
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
                // filter logic
                // return ...

                return this.resultsItems.data;
            } else {
                return null;
            }
        }
    },

    methods: {
        getData: function() {
            HTTP.get("api/printsheetitems").then(response => {
                this.processData(response.data);
            });
        },

        processData: function(data) {
            // ...

            this.resultsItems = data;

            //this.filterResults;
        }
    }
};
</script>
