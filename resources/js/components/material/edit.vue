<template>
  <div class="container">
    <form action="/material">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Material Edit</h5>
          </div>
          <div class="row m-3">
            <div class="col">
              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input
                  type="text"
                  autocomplete="off"
                  class="form-control"
                  placeholder="Product Name"
                  required
                  v-model="name"
                />
              </div>
              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input
                  v-model="code"
                  type="number"
                  autocomplete="off"
                  class="form-control"
                  placeholder="Product Code"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                  required
                />
              </div>
              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input
                  v-model="price"
                  type="number"
                  autocomplete="off"
                  class="form-control"
                  placeholder="Product Price"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                  required
                />
              </div>
              <div class="form-group mt-3">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea
                  required
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                  v-model="description"
                ></textarea>
              </div>
            </div>
            <div class="col">
              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input
                  v-model="quantity"
                  type="number"
                  autocomplete="off"
                  class="form-control"
                  placeholder="Product Quantity"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                  required
                />
              </div>
              <div class="input-group mt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input
                  v-model="supplier"
                  type="text"
                  autocomplete="off"
                  class="form-control"
                  placeholder="Product supplier"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                  required
                />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <router-link
              :to="{
                name: 'material',
              }"
              class="btn btn-secondary"
              ><i class="fa fa-arrow-left"></i> Back
            </router-link>

            <button type="submit" @click="getupdate()" class="btn btn-success">
              Save
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      name: "",
      code: "",
      price: "",
      supplier: "",
      description: "",
      quantity: "",
    };
  },
  mounted() {
    this.getproduct();
  },
  methods: {
    getproduct() {
      axios.get("/api/material/" + this.id).then((response) => {
        var product = response.data;
        this.name = product.name;
        this.code = product.code;
        this.price = product.price;
        this.supplier = product.supplier;
        this.description = product.description;
        this.quantity = product.quantity;
        // console.log(response.data);
      });
    },
    getupdate() {
      axios.put("/api/editmaterial/" + this.id, {
        name: this.name,
        code: this.code,
        price: this.price,
        supplier: this.supplier,
        quantity: this.quantity,
        description: this.description,
      });
    },
  },
};
</script>

<style>
</style>