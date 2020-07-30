<style scoped>
.clicked {
    background: #e0e0e0;
    animation-name: toggle;
    animation-duration: 300ms;
    animation-iteration-count: 1;
    animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    color: #212121;
}
</style>

<template>
    <div class="card">
        <div class="card-body">
        <h3 class="mw-80">Package Items</h3>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label 
                            @click="currentFrequency = pack.name" v-for="pack in packages" 
                            class="btn btn-default"
                            :class="currentFrequency == pack.name ? 'clicked focus' : ''"
                            >
                            <input v-on="pack.name == 'Own Packaging' ? { click: () => addDimension() } : { click: () => removeDimension() }" 
                                type="radio" name="package_id" :value="pack.id"> {{ pack.name }}
                        </label>
                        <!-- <label 
                            @click="currentFrequency = pack.name" v-for="pack in packageFiltered" 
                            class="btn btn-default"
                            :class="currentFrequency == pack.name ? 'clicked focus' : ''"
                            >
                            <input v-on="pack.name == 'Own Packaging' ? { click: () => addDimension() } : { click: () => removeDimension() }" 
                                type="radio" name="package_id" :value="pack.id"> {{ pack.name }}
                        </label>
                        <label v-for="packaging in own" 
                            class="btn btn-default"
                            >
                            <input v-on="packaging.name == 'Own Packaging' ? { click: () => addDimension() } : { click: () => removeDimension() }" 
                                type="radio" name="package_id" :value="packaging.id"> {{ packaging.name }}
                        </label> -->
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row" v-for="pro in products" :key="pro.id">
            <h5 class="btn-block m-l-10">Item Dimension:</h5>
            <p class="btn-block m-l-10" style="margin-top: -10px;"><em>If your item weight is beyond 4kg, kindly fill this out.</em></p>
                <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Length(cm)</label>
                        <input v-model="pro.length" type="number" id="length" class="form-control" name="package_length" step="any" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==6) return false;">
                    </div>
                </div>
                <div class="col-md-1 d-flex justify-content-center align-items-center">
                    <h4>X</h4>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Width(cm)</label>
                        <input v-model="pro.width" type="number" id="width" class="form-control" name="package_width" step="any" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==6) return false;">
                    </div>
                </div>
                <div class="col-md-1 d-flex justify-content-center align-items-center">
                    <h4>X</h4>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Height(cm)</label>
                        <input v-model="pro.height" type="number" id="height" class="form-control" name="package_height" step="any" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==6) return false;">
                    </div>
                </div>
                <h1>Total Amount: {{ getCurrency(additionalWeightAmount) }}</h1>
                <input v-model="additionalWeightAmount" type="hidden" id="package_amount" class="form-control" name="package_amount">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="row" v-for="packageType in packageTypes">
                        <div class="card card-transparent">
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table" id="basicTable">
                                    <thead>
                                        <tr>
                                            <th style="width:50%"><h3>Summary:</h3></th>
                                            <th style="width:50%"></th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                    <tr>
                                        <td class="v-align-middle ">
                                        <h4>
                                            <strong>Weight:</strong><small> {{ packageType.pricing[currentFrequency].label }}{{ packageType.pricing[currentFrequency].weight }}kg</small>
                                            <input v-model="packageType.pricing[currentFrequency].weight" type="hidden" name="weight">
                                        </h4>
                                        </td>
                                        <td class="v-align-middle">
                                        <h4>
                                            <strong>Additional Weight:</strong><small> {{  }}kg</small>
                                        </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle ">
                                        <h4>
                                            <strong>Cost:</strong><small> {{ getCurrency(packageType.pricing[currentFrequency].amount) }}</small>
                                        </h4>
                                        </td>
                                        <td class="v-align-middle">
                                        <h4>
                                            <strong>Additional Cost:</strong><small> {{ getCurrency(additionalCost) }}</small>
                                        </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="v-align-middle">
                                        <h4>
                                            <strong>Total:</strong><small> {{ getCurrency(packageType.pricing[currentFrequency].amount) }}</small>
                                        </h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['packageFiltered', 'packagingAmount', 'own', 'packages'],
        
        data: function () {
            return {
                products: [],

                product: {
                    height: 0,
                    length: 0,
                    width: 0,
                },

                packageTypes: [
                    {
                        pricing: {
                            Medium: { amount: 78, },
                            Large: { amount: 88, },
                        }
                    },
                ],

                currentFrequency: 'Medium',

                currency: 'php',
            }
        },

        methods: {
            additionalCostComputation(price) {
                return (price + parseInt(this.additionalCost));
            },

            getCurrency(price) {
                return this['currency' + this.currency.toUpperCase()](price)
            },

            currencyPHP(price) {
                return '₱' + price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            },

            addDimension: function () {
                let line_limit = 1;
                if (this.products.length < line_limit) {
                    var height = this.product.height
                    var length = this.product.length
                    var width = this.product.width

                    this.products.push({ height: height, length: length, width: width })
                    this.clearCart()
                }
            },

            clearCart: function () {
                this.product.height = 0
                this.product.length = 0
                this.product.width = 0
                this.currentFrequency = ''
            },

            removeDimension: function (item) {
                var del = this.products.indexOf(item)
                this.products.splice(del, 1)
            },

            setTwoNumberDecimal: function (event) {
                this.value = parseFloat(this.value).toFixed(2);
            },
        },

        computed: {
            additionalWeightAmount: function () {
                return this.products.reduce((total, item) => {
                    let dimensionTotal = (total + parseFloat(item.height).toFixed() * parseFloat(item.length).toFixed() * parseFloat(item.width).toFixed() / 4000).toFixed()
                    let additionalAmount = dimensionTotal * 20;
                    return additionalAmount + this.packagingAmount.amount
                    // return (additionalAmount + this.ownPackaging.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')
                }, 0)
            },
            additionalCost: function () {
                let chargeRate = 20;
                return this.additionalWeightAmount * chargeRate;
            },
            totalAmount: function () {
                let ownPackagingPrice = 68;
                return this.additionalCost + ownPackagingPrice;
            },
            initialTotalAmount: function () {
                let getPriceMethod = this.getCurrency(this.totalAmount)
                let additionalCostComputationMethod = this.additionalCostComputation(this.totalAmount)
                
                this.packageTypes.forEach(packageType => {
                    console.log(packageType.pricing[this.currentFrequency].price)
                });

                // return getPriceMethod(additionalCostComputation&totalAmount)
            }
        },
    }
</script>