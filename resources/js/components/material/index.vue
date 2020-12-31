<template>
  <div class="container-fluid mt-3">
    <!-- Large modal -->
    <button
      type="button"
      class="btn btn-success mb-3"
      data-toggle="modal"
      data-target=".bd-example-modal-lgadd"
    >
      Add Material
    </button>

    <div
      class="modal fade bd-example-modal-lgadd"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <form action="/material">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Material</h5>
            </div>
            <div class="row m-3">
              <div class="col">
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input
                    required
                    type="text"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Material Name"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="name"
                  />
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input
                    required
                    type="number"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Material Code"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="code"
                  />
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input
                    required
                    type="number"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Material Price"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="price"
                  />
                </div>
              </div>
              <div class="col">
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input
                    required
                    type="number"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Material Quantity"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="quantity"
                  />
                </div>
                <div class="input-group mt-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input
                    required
                    type="text"
                    autocomplete="off"
                    class="form-control"
                    placeholder="Material Supplier"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                    v-model="supplier"
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
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button
                type="submit"
                v-on:click="addMaterial()"
                class="btn btn-success"
              >
                Add Material
              </button>
            </div>
          </div>
        </div>
      </form>
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
              <th scope="col">Supplier</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="material in materials" :key="material.nane">
              <th scope="row">{{ material.name }}</th>
              <td>{{ material.code }}</td>
              <td>{{ material.price }}</td>
              <td>{{ material.quantity }}</td>
              <td>{{ material.supplier }}</td>
              <td>
                <router-link
                  :to="{
                    name: 'edit-material',
                    params: { id: material.id },
                  }"
                  class="btn btn-warning"
                  ><i class="fa fa-pencil"></i
                ></router-link>

                <button
                  type="button"
                  class="btn btn-danger"
                  data-toggle="modal"
                  :data-target="'#myModal' + material.id"
                  @click="
                    setVal(
                      material.id,
                      material.name,
                      material.code,
                      material.price,
                      material.quantity,
                      material.material
                    )
                  "
                >
                  <i class="fa fa-trash"></i>
                </button>

                <div
                  :id="'myModal' + material.id"
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
                          <h5 class="modal-title">Material Delete</h5>
                        </div>
                        <div class="container">
                          Are you sure that you want to delete
                          {{ material.name }} ?
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
    this.getmaterial();
  },
  data() {
    return {
      name: "",
      code: "",
      price: "",
      description: "",
      quantity: "",
      supplier: "",
      materials: [],
      errors: {},
    };
  },

  methods: {
    getmaterial() {
      axios.get("/api/getmaterial").then((response) => {
        this.materials = response.data;
      });
    },
    addMaterial() {
      axios
        .post("/api/addmaterial", {
          name: this.name,
          code: this.code,
          price: this.price,
          description: this.description,
          quantity: this.quantity,
          supplier: this.supplier,
        })
        .then(() => {})
        .catch((error) => (this.errors = error.response.data.errors));
    },
    getdelete(id) {
      axios.delete("/api/deletematerial/" + this.id).then(
        (response) => {}
        // this.products.push(response.data);
      );
    },
    setVal(id, name, code, price, quantity, supplier, description) {
      this.id = id;
      this.name = name;
      this.code = code;
      this.price = price;
      this.description = description;
      this.quantity = quantity;
      this.supplier = supplier;
    },
  },
};
</script>

<style>
</style>