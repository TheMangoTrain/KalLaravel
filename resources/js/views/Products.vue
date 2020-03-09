<template>
  <div class="view_Products view">
        Products list here

          <Table
            :items="resultsFiltered"
            :columns="columns"
          />
  </div>
</template>

<script>
import HTTP from "http";
import Table from "@/js/components/Table.vue";

export default {
  name: "Products",
  components: {
    Table
  },

  data: function() {
    return {
      resultsItems: null,
      columns: ["sku", "title", "size", "price", "inventory"],
      filterApplied: []
    };
  },

  mounted() {
    //this.getData();
  },

  watch: {

  },

  computed: {

  resultsFiltered: function() {

      console.log("filtering results")
      if (this.resultsItems != null) {
    

         // return this.resultsItems
    
        return this.resultsItems.filter(item => {

         
        });
        
        /*
        return items.filter(item => {
          if (this.startDate != null && this.endDate != null) {
            return true;
          } else {
            return item.date >= this.startDate && item.date <= this.endDate;
          }
        }); */
      } else {
        return []
      }

      /*

         return items.filter(item => {
            if (this.filterApplied.length < 1) {

              // No filter enabled
              return item
            } else {

              // Filter(s) enabled
              var output
              Object.keys(this.filtersAsNumbers)
                .filter(dateRange=>
                  this.filterApplied.includes(dateRange)
                )
                .filter(dateRangeFiltered=>{
                  let low = this.filtersAsNumbers[dateRangeFiltered][0]
                  let high = this.filtersAsNumbers[dateRangeFiltered][1]
                  if (item.Date >= low && item.Date <= high) {
                    output = item
                  }
                })
              return output
            }
          })
          */
    }

  },

  methods: {
    getData: function() {
      HTTP.get("api/products").then(response => {
        this.processData(response.data);
      });
    },

    processData: function(data) {
      // Processing area after download success
      // ...

      console.log("processing data")

      // Lastly, apply data to component
      this.resultsItems = data;

console.log("attempting filtering results")
      this.filterResults;
    },

  
  }
};
</script>
