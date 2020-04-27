<template>
  <div class="container">
    <div class="d-flex flex-column justify-content-center my-3">
      <div class="input-group mb-3 mx-auto" style="width: 325px">
        <input
          v-model="search"
          type="text"
          class="form-control"
          placeholder="Recipe name..."
          aria-label="Recipe name..."
          aria-describedby="button-addon2"
        />
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
      </div>
      <div class="d-flex flex-row justify-content-center"> 
      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="inlineRadioOptions"
          id="inlineRadio1"
          value="option1"
        />
        <label class="form-check-label" for="inlineRadio1">Vegan</label>
      </div>
      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="inlineRadioOptions"
          id="inlineRadio2"
          value="option2"
        />
        <label class="form-check-label" for="inlineRadio2">Vegetarian</label>
      </div>
      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="inlineRadioOptions"
          id="inlineRadio3"
          value="option3"
        />
        <label class="form-check-label" for="inlineRadio3">Omnivore</label>
      </div>
      </div>
    </div>
    <div class="d-flex flex-row flex-wrap justify-content-center">
      <div
        class="card mt-2 mx-2 hoverShadow"
        style="width: 18rem;"
        id="card"
        v-bind:key="recipe.title"
        v-for="recipe in filteredRecipes"
      >
        <a v-bind:href='"/recipe/" + recipe.id' class="text-decoration-none text-reset">
          <div class="text-center card-body">
            <h5 class="card-title">
              {{ recipe.title }}
              <span class="badge badge-secondary">{{ recipe.regimen }}</span>
            </h5>
            <p class="card-text">{{ recipe.desc }}</p>
            <div class="d-flex-inline">
              <i class="fas fa-utensil-spoon" style="padding-right: 10px">{{ recipe.prep }}</i>
              <i class="fas fa-clock" style="padding-left: 10px">{{ recipe.cook }}</i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>
<style>
  .hoverShadow:hover {
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
  }
</style>
<script>
  export default {
    props: ["data"],
    data() {
      return {
        recipes: JSON.parse(this.data),
        search: ''
      };
    },
    computed: {
      filteredRecipes: function () {
        if (this.search !== '') {
          const input = this.search
          return this.recipes.filter(function (recipe) {
            return input.toLowerCase().split(' ').every(v => recipe.title.toLowerCase().includes(v))
        });
        } else {
          return this.recipes
        }
      }
    }
  };
</script>
