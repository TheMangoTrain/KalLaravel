<template>
  <table>
    <thead>
      <tr>
        <th
          v-for="(column, index) in columns"
          :key="index"
          @click="sort(column)"
        >
          {{ column }}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, index) in computedItems" :key="index">
        <td v-for="(data, column) in item" :key="column">
          {{ data }}
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "Table",

  props: {
    search: String,
    items: Array,
    columns: Array,
    focusedID: Number
  },

  data: function() {
    return {
      currentSort: "date",
      currentSortDir: "asc"
    };
  },

  methods: {
    sort: function(s) {
      // Reversing direction if user toggles existing sort (ie same column)
      if (s === this.currentSort) {
        this.currentSortDir = this.currentSortDir === "asc" ? "desc" : "asc";
      }

      this.currentSort = s;
    }
  },

  computed: {
    computedItems() {

      console.log("computing table items")
      console.log(this.items)
      if (this.items != null) {
        return (
          this.items

            // Using .slice to get a copy of original items, so .sort can mutate it as it needs.
            .slice()

            // Filtering based on variable from parent (via prop 'search')
            .filter(a => {
              return (a.date + "").includes(this.search);
            })

            .sort((a, b) => {
              if (this.currentSortDir === "asc") {
                return a[this.currentSort] >= b[this.currentSort];
              }
              return a[this.currentSort] <= b[this.currentSort];
            })
        );
      } else {
        console.log("empty table")
        return [];
      }
    },

    filteredItems() {
      if (this.focusedID) {
        return this.items.filter(item => {
          return item;
        });
      } else {
        return this.items;
      }
    }
  }
};
</script>
