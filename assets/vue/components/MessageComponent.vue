<template>
  <div class="container-fluid h-100">
    <div class="d-flex justify-content-center align-content-center">
      <section class="w-75 d-flex align-items-center flex-column">
        <h1 class="text-center py-3">Hello Is this cooler?</h1>
        <div class="main_box d-flex">
          <aside class="d-flex flex-column align-items-center">
            <div class="btn-group dropstart">
              <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Visualizza API
              </button>
              <ul class="dropdown-menu mx-2">
                <li>
                  <a class="dropdown-item text-capitalize text-center" @click="getData('json')"> json</a>
                </li>
                <li>
                  <a class="dropdown-item text-capitalize text-center" @click="getData('jsonld')"> jsonld</a>
                </li>
              </ul>
            </div>
            <button class="btn btn-info text-capitalize" @click="resetArea()"> Clear</button>
            <a class="button-link btn btn-info text-capitalize" href="contattaci"> Contattaci </a>
          </aside>
          <textarea class="px-4" v-model="listDataString" rows="20" cols="50" disabled></textarea>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Messages',
  data() {
    return {
      listDataString: "||",
      // page: 1,
    };
  },
  methods: {
    getData(format) {
      axios
          .get(`./api/messaggios.${format}`)
          .then((response) => {
            this.listDataString = JSON.stringify(response.data, null, "\t");
          })
          .catch (e => {
            console.log(e);
          });
    },
    resetArea() {
      this.listDataString = "||";
    }
  }
}
</script>

<style scoped lang="scss">
@import "../../styles/custom";
section{
  @include light-component;
  aside{
    margin: 5rem 0;
    @include btn-konsole;
    .dropdown-menu>li{
      cursor: default;
      color: #8cd41c;
    }
  }
  textarea{
    background-color: #2f2e2e;
    color: #8cd41c;
    padding: 2rem;
    margin: 5rem;
    @include light-component;
  }
}

</style>