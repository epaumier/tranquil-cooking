<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="text-center">{{ recipe.title }} <span class="badge badge-secondary">{{ recipe.regimen }}</span></h1>
        <div class="card mx-auto mt-4">
          <div class="card-header text-center">
              <h3>Ingredients</h3></div>

          <div class="card-body">
            <ul
              v-for="ingredient in recipe.ingredients"
              v-bind:key="ingredient"
              class="list-group list-group-flush text-center"
            >
              <li class="list-group-item">{{ ingredient }}</li>
            </ul>
          </div>
        </div>

        <div class="card mx-auto mt-3">
          <div class="card-header text-center">
              <h3>Instructions</h3></div>

          <div class="card-body">
            <ul
              v-for="(instruction, index) in recipe.instructions"
              v-bind:key="instruction"
              class="list-group list-group-flush text-center"
            >
                <li class="list-group-item font-weight-bold">{{ index + 1 + '.' + ' ' + instruction }}</li>
            </ul>
          </div>
        </div>
        
        <div class="accordion" id="accordionExample">
        <div class="card mx-auto mt-3">
          <div class="card-header text-center">
              <h3>Description</h3></div>
          <div class="card-body">
              {{ recipe.desc }}
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
      recipe: JSON.parse(this.data)
    };
  },
  created() {
    console.log(this.recipe)
  },
};
</script>
