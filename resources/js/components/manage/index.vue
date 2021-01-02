<template>
  <div class="container-fluid row">
    <div class="col-4">
      <div class="card bg-light mb-3">
        <div class="card-header">Manage</div>
        <div class="card-body">
          <h5 class="card-title">List of Product</h5>
          <p class="card-text"></p>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mark</td>
                <td>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="btn btn-success"
                        ><i class="fa fa-plus"> </i
                      ></span>
                    </div>
                    <div class="custom-file">
                      <input class="form-control" type="number" />
                    </div>
                    <div class="input-group-prepend">
                      <span class="btn btn-success"
                        ><i class="fa fa-plus"> </i
                      ></span>
                    </div>
                  </div>
                </td>
                <td><span class="badge badge-success">Activated</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-8">
      <div class="card bg-light mb-3">
        <div class="card-header">Manage</div>
        <div class="card-body">
          <h5 class="card-title">List of Product</h5>
          <p class="card-text"></p>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mark</td>
                <td>
                  <div class="row">
                    <div class="col-1">
                      <button class="btn btn-success">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-1">
                      <input class="form-control" />
                    </div>
                    <div class="col-1">
                      <button class="btn btn-danger">
                        <i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>