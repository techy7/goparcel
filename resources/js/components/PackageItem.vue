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
                            @click="currentFrequency = frequency" v-for="(price, frequency) in packageTypes[0].pricing" 
                            class="btn btn-default"
                            :class="currentFrequency == frequency ? 'clicked focus' : ''"
                            >
                            <input v-on="frequency == 'ownPackaging' ? { click: () => addDimension() } : { click: () => removeDimension() }" 
                                type="radio" 
                                :name="frequency"> {{ frequency == 'ownPackaging' ? 'OWN PACKAGING' : frequency.toUpperCase() }}
                        </label>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row" v-for="pro in products" :key="pro.id">
            <h5 class="btn-block m-l-10">Item Dimension:</h5>
            <p class="btn-block m-l-10" style="margin-top: -10px;"><em>If your item weight is beyond 4kg, kindly fill this out.</em></p>
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
                <div class="col-md-12">
                    <div class="row" v-for="packageType in packageTypes">
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
                                            <strong>Additional Weight:</strong><small> {{ additionalWeight }}kg</small>
                                        </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="v-align-middle ">
                                        <h4>
                                            <strong>Cost:</strong><small> {{ getPrice(packageType.pricing[currentFrequency].price) }}</small>
                                        </h4>
                                        </td>
                                        <td class="v-align-middle">
                                        <h4>
                                            <strong>Additional Cost:</strong><small> {{ getPrice(additionalCost) }}</small>
                                        </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="v-align-middle">
                                        <h4>
                                            <!-- getPrice(additionalCostComputation(packageType.pricing[currentFrequency].price)) -->
                                            <strong>Total:</strong><small> {{ initialTotalAmount }}</small>
                                            <input type="hidden" name="weight">
                                        </h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
        mounted() {
            console.log('Component mounted.')
        },
        
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
                            medium: { price: 28, weight: '2', label: 'Up to ' },
                            large: { price: 48, weight: '3', label: 'More than 2 to ' },
                            ownPackaging: { price: 68, weight: '4', label: 'More than 3 to ' }
                        }
                    },
                ],

                currentFrequency: 'medium',

                currency: 'php',
            }
        },

        methods: {
            additionalCostComputation(price) {
                return (price + parseInt(this.additionalCost));
            },

            getPrice(price) {
                return this['currency' + this.currency.toUpperCase()](price);
            },

            currencyPHP(price) {
                return '₱' + price + '.00';
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
            },

            removeDimension: function (item) {
                var del = this.products.indexOf(item)
                this.products.splice(del, 1)
            },
        },

        computed: {
            additionalWeight: function () {
                return this.products.reduce((total, item) => {
                    return total + parseInt(item.height) * parseInt(item.length) * parseInt(item.width)
                }, 0)
            },
            additionalCost: function () {
                let chargeRate = 20;
                return this.additionalWeight * chargeRate;
            },
            totalAmount: function () {
                let ownPackagingPrice = 68;
                return this.additionalCost + ownPackagingPrice;
            },
            initialTotalAmount: function () {
                let getPriceMethod = this.getPrice(this.totalAmount)
                let additionalCostComputationMethod = this.additionalCostComputation(this.totalAmount)
                
                this.packageTypes.forEach(packageType => {
                    console.log(packageType.pricing[this.currentFrequency].price)
                });

                // return getPriceMethod(additionalCostComputation&totalAmount)
            }
        },
    }
</script>