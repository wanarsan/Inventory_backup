<template>
  <div class="container-fluid mt-3">
    <!-- Large modal -->
    <button
      type="button"
      class="btn btn-success mb-3"
      data-toggle="modal"
      data-target=".bd-example-modal-lgadd"
    >
      Add Product
    </button>

    <div
      class="modal fade bd-example-modal-lgadd"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Product</h5>
          </div>
          <div class="row m-3">
            <form action="/product">
              <div class="col">
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                  </div>
                  <input
                    required
                    type="text"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Product Name"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="name"
                  />
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Code</span>
                  </div>
                  <input
                    required
                    type="number"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Product Code"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="code"
                  />
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"
                      >Price</span
                    >
                  </div>
                  <input
                    required
                    type="number"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Product Price"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="price"
                  />
                </div>

                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"
                      >Quantity</span
                    >
                  </div>
                  <input
                    required
                    type="number"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Product Quantity"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="quantity"
                  />
                </div>
              </div>

              <button
                type="button"
                class="btn btn-secondary ml-3 mt-3"
                data-dismiss="modal"
              >
                Close
              </button>
              <button
                type="submit"
                v-on:click="addproduct()"
                class="btn btn-success mt-3"
              >
                Add Product
              </button>
            </form>
            <div class="col">
              <label class="mt-3">Add Materials</label>
              <div class="input-group mb-3">
                <select
                  class="form-control"
                  required
                  v-model="product_material"
                  @change="addTableRow()"
                >
                  <option v-for="material in materials" :key="material.nane">
                    {{ material.name }}
                  </option>
                </select>
              </div>
              <div class="overflow-auto" style="height: 210px">
                <div
                  class="list-group"
                  v-for="(content, index) in submaterial"
                  :key="index"
                >
                  <button class="list-group-item list-group-item-action mt-1">
                    {{ content
                    }}<button
                      class="btn btn-danger float-right"
                      @click="deleteTableRow(index)"
                    >
                      <i class="fa fa-close"></i>
                    </button>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Large modal -->
    <div class="row">
      <div class="col">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Code</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.nane">
              <th scope="row">{{ product.name }}</th>
              <td>{{ product.code }}</td>
              <td>{{ product.price }}</td>
              <td>{{ product.quantity }}</td>
              <td>
                <router-link
                  :to="{
                    name: 'edit-product',
                    params: { id: product.id },
                  }"
                  class="btn btn-warning"
                  ><i class="fa fa-pencil"></i
                ></router-link>

                <button
                  type="button"
                  class="btn btn-danger"
                  data-toggle="modal"
                  :data-target="'#myModal' + product.id"
                  @click="
                    setVal(
                      product.id,
                      product.name,
                      product.code,
                      product.price,
                      product.quantity
                    )
                  "
                >
                  <i class="fa fa-trash"></i>
                </button>

                <div
                  :id="'myModal' + product.id"
                  class="modal fade bd-example-modal-lg-del"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="myLargeModalLabel"
                  aria-hidden="true"
                >
                  <form>
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Product Delete</h5>
                        </div>
                        <div class="container">
                          Are you sure that you want to delete
                          {{ product.name }} ?
                        </div>
                        <div class="modal-footer">
                          <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                          >
                            Close
                          </button>
                          <!-- <router-link
                            :to="{
                              name: 'product',
                            }"
                            class="btn btn-danger"
                            :@click="getdelete()"
                            ><i class="fa fa-trash"></i> Confirm</router-link
                          > -->
                          <button
                            type="submit"
                            class="btn btn-danger"
                            @click="getdelete()"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.getproduct();
    this.getmaterial();
  },
  data() {
    return {
      name: "",
      code: "",
      price: "",
      // material: [],
      quantity: "",
      products: [],
      materials: [],
      errors: {},
      product_material: 0,
      submaterial: [],
    };
  },

  methods: {
    deleteTableRow: function (idx) {
      this.submaterial.splice(idx, 1);
    },
    addTableRow: function () {
      this.submaterial.push(this.product_material);
      this.submaterial = [...new Set(this.submaterial)];
    },
    getproduct() {
      axios.get("/api/getproduct").then((response) => {
        this.products = response.data;
      });
    },
    // addproduct() {
    //   axios.post("/api/addproduct", {
    //     name: this.name,
    //     code: this.code,
    //     price: this.price,
    //     material: this.material,
    //     quantity: this.quantity,
    //     img: this.img,
    //   });
    // },
    addproduct() {
      axios
        .post("/api/addproduct", {
          name: this.name,
          code: this.code,
          price: this.price,
          // material: this.material,
          quantity: this.quantity,
          submaterial: this.submaterial,
        })
        .then(() => {})
        .catch((error) => (this.errors = error.response.data.errors));
    },
    getdelete(id) {
      axios.delete("/api/delete/" + this.id).then(
        (response) => {}
        // this.products.push(response.data);
      );
    },
    setVal(id, name, code, price, quantity) {
      this.id = id;
      this.name = name;
      this.code = code;
      this.price = price;
      this.quantity = quantity;
    },
    getmaterial() {
      axios.get("/api/getmaterial").then((response) => {
        this.materials = response.data;
      });
    },
  },
};
</script>

<style>
</style>