<template>
  <div class="container">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Product Edit</h5>
        </div>
        <div class="row m-3">
          <form action="/product">
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
            </div>
            <div class="modal-footer">
              <router-link
                :to="{
                  name: 'product',
                }"
                class="btn btn-secondary"
                ><i class="fa fa-arrow-left"></i> Back
              </router-link>

              <button
                type="submit"
                @click="getupdate()"
                class="btn btn-success"
              >
                Save
              </button>
            </div>
          </form>
          <div class="col">
            <!-- //////////////// -->
            <div class="input-group mt-3 mb-3">
              <select
                class="form-control"
                v-model="product_material"
                @change="setValadd()"
              >
                <option
                  v-for="e_material in e_materials"
                  :key="e_material.nane"
                >
                  {{ e_material.name }}
                </option>
              </select>
            </div>
            <div class="overflow-auto" style="height: 210px">
              <div
                class="list-group"
                v-for="material in materials"
                :key="material.submaterial"
              >
                <button class="list-group-item list-group-item-action mt-1">
                  {{ material.submaterial
                  }}<button
                    class="btn btn-danger float-right"
                    @click="setVal(material.id, material.submaterial)"
                  >
                    <i class="fa fa-trash"></i>
                  </button>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="container col">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Materials List To Delete</h5>
            </div>
            <div class="overflow-auto" style="height: 210px">
              <div class="overflow-auto" style="height: 210px">
                <div class="list-group" v-for="(content, index) in contents">
                  <button class="list-group-item list-group-item-action mt-1">
                    {{ content[1] }}
                    <button
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
      <div class="container col">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Materials List To Add</h5>
            </div>
            <div class="overflow-auto" style="height: 210px">
              <div class="overflow-auto" style="height: 210px">
                <div
                  class="list-group"
                  v-for="(content_add, index) in contents_adds"
                >
                  <button class="list-group-item list-group-item-action mt-1">
                    {{ content_add }}
                    <button
                      class="btn btn-danger float-right"
                      @click="deleteTableRowadd(index)"
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
  </div>
</template>

<script>
export default {
  props: ["id"],
  data() {
    return {
      count: 0,
      name: "",
      code: "",
      price: "",
      subid: "",
      name_add: "",
      quantity: "",
      soft_del: "",
      contents: [],
      materials: [],
      contents_adds: [],
      e_materials: [],
      product_material: 0,
      // submaterial: [],
    };
  },
  mounted() {
    this.getmateriallist();
    this.getmaterial();
    this.getproduct();
  },
  methods: {
    getmaterial() {
      axios.get("/api/getsubmaterial/" + this.id).then((response) => {
        this.materials = response.data;
      });
    },
    getproduct() {
      axios.get("/api/product/" + this.id).then((response) => {
        var product = response.data;
        this.name = product.name;
        this.code = product.code;
        this.price = product.price;
        this.quantity = product.quantity;
        // console.log(response.data);
      });
    },
    getmateriallist() {
      axios.get("/api/getmaterial").then((response) => {
        this.e_materials = response.data;
      });
    },
    getupdate() {
      axios.put("/api/edit/" + this.id, {
        name: this.name,
        code: this.code,
        price: this.price,
        quantity: this.quantity,
      });
      // console.log(this.contents);
      try {
        for (var i = 0; i <= this.count; i++) {
          axios.delete("/api/subdelete/" + this.contents[i][0]);
        }
      } catch {}
    },
    setVal(subid, submaterial) {
      this.subid = subid;
      this.soft_del = submaterial;
      this.addTableRow();
    },
    setValadd() {
      // this.name_add = this.product_material;
      // console.log(this.product_material);
      this.contents_adds.push(this.product_material);
      this.contents_adds = _.uniq(this.contents_adds);
      // this.addsubmaterial();
    },
    addTableRow() {
      this.contents.push([this.subid, this.soft_del]);
      this.contents = _.uniqBy(this.contents, "1");
      this.count++;
    },
    deleteTableRow: function (idx) {
      this.contents.splice(idx, 1);
    },
    deleteTableRowadd: function (idx) {
      this.contents_adds.splice(idx, 1);
    },
  },
};
</script>

<style>
</style>