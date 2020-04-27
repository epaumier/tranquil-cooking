<template>
  <div class="container-md">
      <ul class="col-sm-6 mx-auto list-group" v-bind:key="recipe.id" v-for="recipe in recipes">
        <li class="list-group-item d-flex justify-content-between">
          <a v-bind:href="'recipe/' + recipe.id">{{ recipe.title }}</a>
          <div>
            <a v-bind:href="'recipe/' + recipe.id + '/edit/'" class="fas fa-edit p-2 text-success"></a>
            <a
              href
              class="fas fa-trash p-2 text-danger"
              data-toggle="modal"
              v-bind:data-target="'#exampleModal' + recipe.id"
            ></a>

            <!-- Modal -->
            <div
              class="modal fade"
              v-bind:id="'exampleModal' + recipe.id"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{
                       recipe.title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">Are you sure that you want to delete this recipe ?</div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button
                      @click="deleteRecipe(recipe)"
                      data-dismiss="modal"
                      type="button"
                      class="btn btn-danger"
                    >Delete</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
     </div>
</template>
<script>
export default {
  props: ["data"],
  data() {
    return {
      recipes: JSON.parse(this.data)
    };
  },
  created() {
    console.log(this.recipes)
  },
  methods: {
    deleteRecipe(recipe) {
      axios
        .delete("/recipe/" + recipe.id,)
        .then(function(response) {
          console.log('deleted')
        })
        .catch(function(error) {
          console.log(error);
        });
      let index = this.recipes.indexOf(recipe);
      this.recipes.splice(index, 1);
    }
  }
};
</script>
