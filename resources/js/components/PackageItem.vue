<template>
    <div class="card">
        <div class="card-body">
        <h3 class="mw-80">Package Items</h3>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default active">
                    <input @click.prevent="removeDimension" type="radio" name="options"> Medium
                </label>
                <label class="btn btn-default">
                    <input @click.prevent="removeDimension" type="radio" name="options"> Large
                </label>
                <label class="btn btn-default">
                    <input @click.prevent="addToCart" type="radio" name="options"> Own Packaging
                </label>
            </div>
            <div class="row" v-for="pro in products" :key="pro.id">
            <h5 class="btn-block m-l-10">Item Dimension:</h5>
                <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Height</label>
                        <input type="number" v-model="pro.height" id="height" class="form-control" name="" min="0" oninput="this.value = Math.abs(this.value)">
                    </div>
                </div>
                <div class="col-md-1 d-flex justify-content-center align-items-center">
                    <h4>X</h4>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Width</label>
                        <input type="number" v-model="pro.width" id="width" class="form-control" name="" min="0" oninput="this.value = Math.abs(this.value)">
                    </div>
                </div>
                <div class="col-md-1 d-flex justify-content-center align-items-center">
                    <h4>X</h4>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Length</label>
                        <input type="number" v-model="pro.length" id="length" class="form-control" name="" min="0" oninput="this.value = Math.abs(this.value)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="m-t-15">
                        <h4><strong>Total Weight:</strong> <small>{{ grandTotal }}kg.</small></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="m-t-15" style="margin-left: -20px">
                        <h4><strong>Additional Weight Fee:</strong> <small>₱{{ grandTotal }}pesos.</small></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="m-t-15">
                        <h4><strong>Total Amount:</strong> <small>₱{{ grandTotal }}pesos.</small></h4>
                    </div>
                </div>
            </div>
            <!-- <div class="table-responsive">
            <table class="table table-hover" id="detailedTable">
                <thead>
                <tr>
                    <th style="width:10%">No.</th>
                    <th style="width:25%">Types</th>
                    <th style="width:25%">Description</th>
                    <th style="width:10%">Quantity</th>
                    <th style="width:10%">Weight(kg)</th>
                    <th style="width:10%">Height(cm)</th>
                    <th style="width:10%">Length(cm)</th>
                    <th style="width:10%">Width(cm)</th>
                    <th style="width:10%">Total Weight</th>
                    <th style="width:25%"> </th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="items.length > 0" v-for="(item, index) in items" :key="index">
                    <td class="v-align-middle semi-bold">
                        {{index + 1}}
                    </td>
                    <td class="v-align-middle semi-bold">
                    <select class="full-width" data-init-plugin="select2">
                        <optgroup label="Alaskan/Hawaiian Time Zone">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                            <option value="OR">Oregon</option>
                            <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD">South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="IN">Indiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="OH">Ohio</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WV">West Virginia</option>
                        </optgroup>
                    </select>
                    </td>
                    <td class="v-align-middle">
                    <textarea class="form-control" v-model="item.description" rows="2" id="name" placeholder="Briefly Describe your reports"></textarea>
                    </td>
                    <td class="v-align-middle semi-bold">
                    <input type="number" v-model="item.quantity" class="autonumeric form-control">
                    </td>
                    <td class="v-align-middle">
                        <input type="number" v-model="item.weight" class="autonumeric form-control">
                    </td>
                    <td class="v-align-middle">
                        <input type="number" v-model="item.total" class="autonumeric form-control">
                    </td>
                    <td class="v-align-middle">
                        <input type="number" v-model="item.length" class="autonumeric form-control">
                    </td>
                    <td class="v-align-middle">
                        <input type="number" v-model="item.width" class="autonumeric form-control">
                    </td>
                    <td class="v-align-middle">
                        <input type="number" v-model="item.height" class="autonumeric form-control">
                    </td>
                    <td class="v-align-middle">
                    <button aria-label="" @click="removeItem" class="btn btn-danger btn-icon-left m-b-10 m-t-5" type="button"><i class="pg-icon">trash</i>Delete</button>
                    </td>
                    <h4><strong>Total Actual Weight:</strong> <small>{{ item.total }}kg.</small></h4>
                </tr>
                </tbody>
            </table>
            <div class="col-md-12 d-flex align-items-center">
                <div class="form-check form-check-inline success m-b-0">
                    <button aria-label="" @click="AddItem" class="btn btn-success btn-icon-left m-t-20" type="button"><i class="pg-icon">add</i><span class="">Add Package</span></button>
                </div>
                <div class="form-check form-check-inline success m-b-0">
                    <button aria-label="" @click="totalWeight" class="btn btn-success btn-icon-left m-t-20" type="button"><i class="pg-icon">add</i><span class="">Total Weight</span></button>
                </div>
                <div class="form-check form-check-inline success m-t-30 m-l-20">
                    <h4><strong>Total Actual Weight:</strong> <small>{{  }}kg.</small></h4>
                </div>
                </div>
            </div> -->
        </div>
    </div>

      <!-- <div>
          <table>
        <thead>
          <th>
            <tr>
              <td>#</td>
              <td>Items</td>
               <td>Quantity</td>
               <td>Amount</td>
              <td>Total</td>
              <td>Action</td>
            </tr>
          </th>
        </thead>
        <tbody>
          <tr v-if="items.length > 0" v-for="(item, index) in items" :key="index">
            <td>{{index + 1}}</td>
            <td>
              <input type="text" v-model="item.name"/>
            </td>
            <td>
              <input type="number" v-model="item.quantity"/>
            </td>
            <td>
              <input type="number" v-model="item.amount"/>
            </td>
            <td><input type="number" v-model="item.total"/></td>
            <td>
              <button type="button" @click="removeItem">
                Remove
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="btn">
        <button type="button" class="newItem" @click="AddItem">Add new row</button>
      </div>
      </div> -->
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['productTypes'],
        data() {
            return {
                products: [],
                product: {
                    height: 0,
                    length: 0,
                    width: 0,
                },
                tax: ".00"
            }
        },
        // watch: {
        //     'products': {
        //     handler (newValue, oldValue) {
        //         newValue.forEach((pro) => {
        //         pro.total = pro.quantity * pro.weight
        //         })
        //     },
        //     deep: true
        //     }
        // },
        computed: {
            subTotal: function () {
                return this.products.reduce((total, item) => {
                    return total + parseInt(item.height) * parseInt(item.length) * parseInt(item.width)
                }, 0)
            },
            taxTotal: function () {
                return this.subTotal * this.tax
            },
            grandTotal: function () {
                return this.subTotal + this.taxTotal
            }
        },
        methods: {
            addToCart: function () {
                let line_limit = 1;
                if (this.products.length < line_limit) {
                    var height = this.product.height
                    var length = this.product.length
                    var width = this.product.width

                    this.products.push({ height: height, length: length, width: width })
                    this.clearCart()
                }
            },
            removeDimension: function (item) {
                var del = this.products.indexOf(item)
                this.products.splice(del, 1)
            },
            addQty: function (item) {
                Object.assign(item, {
                    quantity: parseInt(item.quantity) + 1
                })
            },
            removeQty: function (item) {
                Object.assign(item, {
                    quantity: parseInt(item.quantity) - 1
                })
            },
            clearCart: function () {
                this.product.height = 0
                this.product.length = 0
                this.product.width = 0
            },
            itemTotal: function (item) {
                return item.quantity * item.weight
            }
        }
    }
</script>