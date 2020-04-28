<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">

        <h1 class="text-center">
          {{ recipe.title }}
          <span class="badge badge-secondary">{{ recipe.regimen }}</span>
        </h1>

        <div class="accordion" id="accordionIngredients">
          <div
            class="card mx-auto mt-3"
            data-toggle="collapse"
            data-target="#collapseIngredients"
            aria-expanded="true"
            aria-controls="collapseIngredients"
            v-on:click="toggleIngredients()"
          >
            <div
              class="d-inline-flex align-items-center justify-content-center card-header text-center"
              style="cursor: pointer"
            >
              <h3 class="flex-grow-1">Ingredients</h3>
              <i v-if="collapseIngredients" class="fas fa-minus mb-1"></i>
              <i v-else class="fas fa-plus mb-1"></i>
            </div>
            <div
              id="collapseIngredients"
              class="collapse show"
              aria-labelledby="headingOne"
              data-parent="#accordionIngredients"
            >
              <div class="card-body">
                <ul
                  v-for="(ingredient, index) in recipe.ingredients"
                  v-bind:key="ingredient"
                  class="list-group list-group-flush text-center"
                >
                  <li
                    class="list-group-item font-weight-bold"
                  >{{ index + 1 + '.' + ' ' + ingredient }}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="accordionInstructions">
          <div
            class="card mx-auto mt-3"
            data-toggle="collapse"
            data-target="#collapseInstructions"
            aria-expanded="true"
            aria-controls="collapseInstructions"
            v-on:click="toggleInstructions()"
          >
            <div
              class="d-inline-flex align-items-center justify-content-center card-header text-center"
              style="cursor: pointer"
            >
              <h3 class="flex-grow-1">Instructions</h3>
              <i v-if="collapseInstructions" class="fas fa-minus mb-1"></i>
              <i v-else class="fas fa-plus mb-1"></i>
            </div>
            <div
              id="collapseInstructions"
              class="collapse show"
              aria-labelledby="headingOne"
              data-parent="#accordionInstructions"
            >
              <div class="card-body">
                <ul
                  v-for="(instruction, index) in recipe.instructions"
                  v-bind:key="instruction"
                  class="list-group list-group-flush text-center"
                >
                  <li
                    class="list-group-item font-weight-bold"
                  >{{ index + 1 + '.' + ' ' + instruction }}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion" id="accordionDescription">
          <div
            class="card mx-auto mt-3"
            data-toggle="collapse"
            data-target="#collapseDescription"
            aria-expanded="true"
            aria-controls="collapseDescription"
            v-on:click="toggleDescription()"
          >
            <div
              class="d-inline-flex align-items-center justify-content-center card-header text-center"
              style="cursor: pointer"
            >
              <h3 class="flex-grow-1">Description</h3>
              <i v-if="collapseDescription" class="fas fa-minus mb-1"></i>
              <i v-else class="fas fa-plus mb-1"></i>
            </div>
            <div
              id="collapseDescription"
              class="collapse show"
              aria-labelledby="headingOne"
              data-parent="#accordionDescription"
            >
              <div class="card-body">{{ recipe.desc }}</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["data"],
  data() {
    return {
      recipe: JSON.parse(this.data),
      collapseIngredients: true,
      collapseInstructions: true,
      collapseDescription: true,
      toggleIngredients() {
        this.collapseIngredients = !this.collapseIngredients
      },
      toggleInstructions() {
        this.collapseInstructions = !this.collapseInstructions
      },
      toggleDescription() {
        this.collapseDescription = !this.collapseDescription
      }
    };
  },
  created() {
    console.log(this.recipe);
    
  }
};
</script>
