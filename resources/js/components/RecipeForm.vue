<template>
  <form class="container" @submit.prevent="createRecipe()">
    <slot></slot>
    <div class="form-group mx-auto" style="width: 325px">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Recipe Name</span>
        </div>
        <input type="text" class="form-control" v-model="recipe.title" aria-describedby="name" />
      </div>
    </div>
    <div class="d-flex form-group justify-content-center">
      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="inlineRadioOptions"
          id="inlineRadio1"
          value="Vegan"
          v-model="recipe.regimen"
        />
        <label class="form-check-label" for="inlineRadio1">Vegan</label>
      </div>
      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="inlineRadioOptions"
          id="inlineRadio2"
          value="Vegetarian"
          v-model="recipe.regimen"
        />
        <label class="form-check-label" for="inlineRadio2">Vegetarian</label>
      </div>
      <div class="form-check form-check-inline">
        <input
          class="form-check-input"
          type="radio"
          name="inlineRadioOptions"
          id="inlineRadio3"
          value="Omnivore"
          v-model="recipe.regimen"
        />
        <label class="form-check-label" for="inlineRadio3">Omnivore</label>
      </div>
    </div>
<div class="form-group">
      <div class="d-flex flex-wrap flex-md-nowrap col-sm-6 mx-auto">
        <div class="input-group mb-3 flex-nowrap pl-3 pr-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Prep time</span>
          </div>
          <input
            type="text"
            v-model="recipe.prep"
            class="form-control"
            placeholder="Minutes"
            aria-label="Username"
            aria-describedby="basic-addon1"
          />
        </div>

        <div class="input-group mb-3 flex-nowrap pl-3 pr-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Cook time</span>
          </div>
          <input
            type="text"
            v-model="recipe.cook"
            class="form-control"
            placeholder="Minutes"
            aria-label="Username"
            aria-describedby="basic-addon1"
          />
        </div>
      </div>
      </div>
    
    <div class="col-sm-6 mx-auto">
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="text" v-model="ingredient" class="form-control" placeholder="Ingredients" />
          <div class="input-group-append">
            <button
              v-on:click="addIngredient(ingredient)"
              class="btn btn-outline-secondary"
              type="button"
              id="button-addon2"
            >
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <ul class="list-group px-3">
          <li
            class="list-group-item d-inline-flex align-items-center justify-content-between"
            style="text-align: center"
            v-for="ingredient in recipe.ingredients"
            :key="ingredient"
          >
            {{ ingredient }}
            <i
              style="cursor: pointer"
              v-on:click="removeIngredient(ingredient)"
              class="fas fa-times fa-2x text-danger"
            ></i>
          </li>
        </ul>
      </div>

      <div class="form-group">
        <div class="input-group mb-3">
          <input type="text" v-model="instruction" class="form-control" placeholder="instructions" />
          <div class="input-group-append">
            <button
              v-on:click="addInstructions(instruction)"
              class="btn btn-outline-secondary"
              type="button"
              id="button-addon2"
            >
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <ul class="list-group px-3">
          <li
            class="list-group-item d-inline-flex align-items-center justify-content-between"
            v-for="(instruction, index) in recipe.instructions"
            :key="index"
            v-focus="ifShow"
            v-show="ifShow"
          >
            {{ index + 1 }}. {{ instruction }}
                <i
                  style="cursor: pointer"
                  v-on:click="removeInstruction(instruction)"
                  class="fas fa-times fa-2x text-danger"
                ></i>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-sm-8 col-md-6 mx-auto">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">Description</span>
        </div>
        <textarea class="form-control" v-model="recipe.desc" aria-label="With textarea"></textarea>
      </div>
    <div class="d-flex justify-content-center p-4">
    <button type="submit" class="btn btn-primary btn-lg">Create Recipe</button>
    </div>
    </div>
  </form>
</template>

<script src="https://kit.fontawesome.com/6bbeff6a21.js" crossorigin="anonymous"></script>
<script>
export default {
  data() {
    return {
      ifShow: true,
      ingredient: "",
      instruction: "",
      recipe: {
        title: "",
        prep: "",
        cook: "",
        ingredients: [],
        instructions: [],
        desc: "",
        regimen: "",
      },
      addIngredient(ingredient) {
        this.recipe.ingredients.push(ingredient);
        this.ingredient = "";
      },
      removeIngredient(ingredient) {
        let index = this.recipe.ingredients.indexOf(ingredient);
        this.recipe.ingredients.splice(index, 1);
      },
      addInstructions(instruction) {
        this.recipe.instructions.push(instruction);
        this.instruction = "";
      },
      editInstruction(instruction) {},
      removeInstruction(instruction) {
        let index = this.recipe.instructions.indexOf(instruction);
        this.recipe.instructions.splice(index, 1);
      }
    };
  },
  methods: {
    createRecipe() {
      axios
        .post("/recipe", { recipe: this.recipe })
        .then(function(response) {
          document.location.href = '/recipe/';
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  directives: {
    focus: {
      // directive definition
      inserted: function(el) {
        el.focus();
      }
    },
    update: function(el, binding) {
      var value = binding.value;
      if (value) {
        Vue.nextTick(function() {
          el.focus();
        });
      }
    }
  }
};
</script>