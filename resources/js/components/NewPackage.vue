<template>

<div>

    









    <div class="row">
        <div class="col-md-6">
            <div v-for="send in sender" :key="send.id" >
            <button class="address" data-toggle="modal" data-target="#modalSlideUp-1">
                <div class="address-title text-muted">Sender Address &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                <h5 class="no-margin"><strong>{{ send.name ? send.name : 'Sender Name' }} | {{ send.number ? send.number : 'Phone Number' }} | {{ send.pickup_date ? send.pickup_date : 'Pickup Date' }}</strong></h5>
                <p>{{ send.address ? send.address : 'Address' }} {{ send.city ? send.city : 'City' }} {{ send.postal_code ? send.postal_code : 'Postal Code' }}</p>
            </button>
            <div class="modal fade slide-up disable-scroll" id="modalSlideUp-1" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
                <div class="modal-dialog ">
                <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix">
                        <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
                        </button>
                        <h5 class="text-uppercase">Sender Details</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label>Sender Name</label>
                                <input v-model="send.name" type="text" class="form-control" :name="name" placeholder="Enter name">
                    
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label>Phone Number</label>
                                <input v-model="send.number" type="text" class="form-control" :name="phone_number" placeholder="Enter phone number">
                    
                                </div>
                            </div>
                            </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group form-group-default input-group">
                                            <div class="form-input-group">
                                                <label>Pickup Date</label>
                                                <input v-model="send.pickup_date" type="text" class="form-control" :name="pickup_date" placeholder="Pick a date" id="datepicker-component2">
                                                </div>
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <input v-model="send.address" type="text" class="form-control" placeholder="123 Manuel St.">
                                
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xl-12">
                                        <div class="form-group form-group-default form-group-default-select2 @error('pickup_city') has-error @enderror">
                                            <p style="margin-top: 10px; margin-left: 10px; padding: 0px; margin-bottom: 0px; color: blue; font-weight: bold; color: #196a87 !important;">City</p>
                                                <select v-model="send.city" name="pickup_city" class="full-width" data-init-plugin="select2" >
                                                    <optgroup v-for="(city, state) in cities" :label="state">
                                                        <option v-for="cit in city" :value="cit">
                                                            {{ cit }}
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row clearfix">
                                        <div class="col-xl-12">
                                        <div class="form-group form-group-default">
                                            <label>Postal Code</label>
                                            <input v-model="send.postal_code" type="text" id="" :name="pickup_postal_code" placeholder="Enter postal coe" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row m-t-20 clearfix">
                                        <div class="col-xl-12">
                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-rounded btn-block btn-primary">Save Sender Details</button>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
            <hr class="no-margin">
            <div v-for="reci in recipient" :key="reci.id">
                <button class="address" data-toggle="modal" data-target="#modalSlideUp-2">
                    <div class="address-title text-muted">Recipient Address &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <h5 class="no-margin" style="margin-top: -12px !important"><strong>{{ reci.name }} | {{ reci.number }} | {{ reci.email }}</strong></h5>
                    <p>{{ reci.address }} {{ reci.city }} {{ reci.postal_code }}</p>
                </button>
                <div class="modal fade slide-up disable-scroll" id="modalSlideUp-2" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
                    <div class="modal-dialog ">
                    <div class="modal-content-wrapper">
                        <div class="modal-content">
                        <div class="modal-header clearfix">
                            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
                            </button>
                            <h5 class="text-uppercase">Recipient Details</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <div class="col-md-12">
                                        <div class="row clearfix">
                                        <div class="col-xl-6">
                                            <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input v-model="reci.name" type="text" placeholder="John Doe" :name="receiver_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input v-model="reci.email" type="email" placeholder="email@gmail.com" :name="receiver_email" class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group form-group-default">
                                            <label>Phone Number</label>
                                            <input v-model="reci.number" type="text" id="" :name="receiver_phone" placeholder="Enter phone number" class="form-control">
                                        </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <input v-model="reci.address" type="text" class="form-control" :name="receiver_address" placeholder="123 Manuel St.">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row clearfix">
                                        <div class="col-xl-12">
                                        <div class="form-group form-group-default form-group-default-select2 @error('pickup_city') has-error @enderror">
                                            <p style="margin-top: 10px; margin-left: 10px; padding: 0px; margin-bottom: 0px; color: blue; font-weight: bold; color: #196a87 !important;">City</p>
                                                <select v-model="reci.city" name="pickup_city" class="full-width" data-init-plugin="select2" >
                                                    <optgroup v-for="(city, state) in cities" :label="state">
                                                        <option v-for="cit in city" :value="cit">
                                                            {{ cit }}
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group form-group-default">
                                            <label>Postal Code</label>
                                            <input v-model="reci.postal_code" type="text" id="" name="receiver_postal_code" placeholder="Enterh postal code" class="form-control">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row m-t-20 clearfix">
                                            <div class="col-xl-12">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-rounded btn-block btn-primary">Save Recipient Details</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            <div class="modal fade slide-up disable-scroll" id="modalSlideUp-3" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
                <div class="modal-dialog ">
                <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix">
                        <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
                        </button>
                        <h5 class="text-uppercase">Package Details</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="address-title">Select Package Type</h4>
                                            <div id="div2">
                                                <span v-for="(pack, packs) in packageTypes" :key="pack.id" class="b">
                                                <label class="container-radio radio-label">
                                                    <img alt="Packange Picture" width="90" height="50" :src="'/pages/assets/img/icon.png'">
                                                    <p class="package-title">{{ pack.name }}</p>
                                                    <p class="package-description">Max weight: {{ pack.weight }} kg</p>
                                                    <p class="package-description price">₱{{ pack.rate }}.00</p>
                                                    <p class="package-description">Rate</p>
                                                    <input type="radio" :value="packageTypes[packs]" checked="checked" v-model="selectedPackageType" name="radio">
                                                    <span class="checkmark"></span>
                                                </label>
                                                </span>
                                            </div>
                                            <div class="row m-t-10" v-if="selectedPackageType.name == 'Own Packaging'" v-for="dime in dimension" :key="dime.id">
                                            <p class="btn-block m-t-10 m-l-10"><em>If your item weight is beyond 4kg, kindly fill this out.</em></p>
                                                <div class="col-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Length(cm)</label>
                                                        <input type="number" class="form-control" name="package_length" v-model="dime.length" step="any" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==6) return false;">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Width(cm)</label>
                                                        <input type="number" class="form-control" name="package_width" v-model="dime.width" step="any" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==6) return false;">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group form-group-default">
                                                        <label>Height(cm)</label>
                                                        <input type="number" class="form-control" name="package_height" v-model="dime.height" step="any" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==6) return false;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-20">
                                        <div class="col-6">
                                            <div class="pull-left">
                                                <p>Total Amount</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pull-right">
                                                <p>₱{{ totalAmount }}.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-20 clearfix">
                                        <div class="col-xl-12">
                                            <button @click="packageDetailsButton()" type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-rounded btn-block btn-primary">Save Package Details</button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                            </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>


            <div class="card-body no-padding" style="margin-top: 10px">
            <div class="card card-default">
                <div class="card-header">
                <div class="row">
                    <div class="col-6">
                    <div class="pull-left">
                        <div class="card-title text-muted">Package Details</div>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="pull-right">
                        <button class="address package address-title text-primary" data-toggle="modal" data-target="#modalSlideUp-3">Edit</button>
                    </div>
                    </div>
                </div>
                <hr style="margin: 10px 0 15px 0">
                <div class="row">
                    <div class="col-md-3">
                    <div class="user-pic">
                        <img alt="Package Picture" width="90" height="50" :src="'/pages/assets/img/icon.png'">
                    </div>
                    </div>
                    <div class="col-md-9">
                    <h5 class="no-margin"><strong>{{ selectedPackageType.name ? selectedPackageType.name : 'Package Name' }}</strong></h5>
                    <p>Max Weight: {{ selectedPackageType.weight ? selectedPackageType.weight : 0 }} kg</p>
                    <p>Rate: ₱{{ selectedPackageType.rate ? selectedPackageType.rate : 0 }}.00</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div v-if="feesAndBreakdown == true" class="col-md-6">
        <div class="card-body no-padding">
            <div class="card card-default">
            <div class="card-header">
                <div class="row">
                <div class="col-6">
                    <div class="pull-left">
                    <div class="card-title text-muted">Fees and Breakdown</div>
                    </div>
                </div>
                </div>
                <hr style="margin: 10px 0 15px 0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pull-left">
                        <h5 class="no-margin small"><strong>Service Fees</strong></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        <h5 class="no-margin small"><strong>₱{{ selectedPackageType.rate ? selectedPackageType.rate : 0 }}.00</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="pull-left m-l-10">
                        <h5 class="no-margin small text-muted">Additional Weight Fee</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        <h5 class="no-margin small text-muted">₱{{ additionalWeightFee }}.00</h5>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6">
                        <div class="pull-left">
                        <h5 class="no-margin small"><strong>Total Amount</strong></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        <h5 class="no-margin small"><strong>P{{ totalAmount }}.00</strong></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="card-body no-padding" style="margin-top: -10px">
            <div class="card card-default">
            <div class="card-header">
                <div class="row">
                <div class="col-12">
                    <button class="btn btn-block btn-rounded btn-primary">BOOK NOW</button>
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

        props: ['cities'],

        data: function () {
            return {
                sender: [
                    {
                        name: '',
                        number: '',
                        pickup_date: '',
                        address: '',
                        city: '',
                        postal_code: '',
                    }
                ],

                recipient: [
                    {
                        name: 'Recipient Name',
                        email: 'Email',
                        number: 'Phone Number',
                        address: 'Address',
                        city: 'City',
                        postal_code: 'Postal Code',
                    }
                ],

                packageTypes: [
                    {
                        name: 'Medium Parcel',
                        weight: 2,
                        rate: 78
                    },
                    {
                        name: 'Large Parcel',
                        weight: 3,
                        rate: 88
                    },
                    {
                        name: 'Own Packaging',
                        weight: 4,
                        rate: 98
                    },
                ],

                selectedPackageType: [],

                dimension: [
                    {
                        height: 0,
                        length: 0,
                        width: 0,
                    }
                ],

                feesAndBreakdown: false,
            }
        },

        methods: {
            packageDetailsButton: function () {
                if (this.selectedPackageType.length == undefined) {
                    this.feesAndBreakdown = true
                }
            }
        },

        computed: {
            additionalWeightFee: function () {
                return this.dimension.reduce((total, item) => {
                    let dimensionTotal = (total + parseFloat(item.height).toFixed() * parseFloat(item.length).toFixed() * parseFloat(item.width).toFixed() / 4000).toFixed()
                    let additionalAmount = dimensionTotal * 20;
                    return additionalAmount
                }, 0)
            },

            totalAmount: function () {
                let packageRate = this.selectedPackageType.rate ? this.selectedPackageType.rate : 0
                return this.additionalWeightFee + packageRate
            },
        },
    }
</script>