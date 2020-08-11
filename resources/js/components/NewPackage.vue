<template>
<div>
    <div v-if="successful.length != 0" class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 sm-p-t-15">
            <div class="alert alert-success" role="alert">
                <button aria-label="" class="close" data-dismiss="alert"></button>
                Pickup has been successfully added.
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div v-for="send in sender" :key="send.id" >
            <button type="button" class="address" data-toggle="modal" data-target="#modalSlideUp-1">
                <div class="address-title text-muted">Sender Address &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                <h5 class="no-margin"><strong>{{ send.name ? send.name : 'Sender Name' }} | {{ send.number ? send.number : 'Phone Number' }} | {{ send.pickup_date ? send.pickup_date : 'Pickup Date' }}</strong></h5>
                <p>{{ send.address ? send.address : 'Address' }} {{ send.city ? send.city : 'City' }} {{ send.postal_code ? send.postal_code : 'Postal Code' }}</p>
                <label v-if="errors.sender_name || errors.sender_phone || errors.pickup_date || errors.pickup_address || errors.pickup_city || errors.pickup_postal_code" class="error no-margin font-weight-bold">
                    Error occured in Sender Form.
                </label>
            </button>
            <form @submit="senderForm">
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
                        <p v-if="errors.length">
                            <b>Please correct the following error(s):</b>
                            <ul>
                            <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </p>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label>Sender Name</label>
                                    <input v-model="senderName" type="text" class="form-control" name="sender_name" placeholder="Enter sender name">
                                </div>
                                <label v-if="msg.senderName" class="error" for="sender_name">
                                    {{ msg.senderName }}
                                </label>
                                <!-- <label v-if="errors.sender_name" class="error" for="sender_name">
                                    {{ errors.sender_name[0] }}
                                </label> -->
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label>Phone Number</label>
                                    <input v-model="senderNumber" type="text" class="form-control" name="sender_phone" placeholder="Enter phone number">
                                </div>
                                <label v-if="msg.senderNumber" class="error" for="sender_phone">
                                    {{ msg.senderNumber }}
                                </label>
                                <!-- <label v-if="errors.sender_phone" class="error" for="sender_phone">
                                    {{ errors.sender_phone[0] }}
                                </label> -->
                            </div>
                            </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group form-group-default input-group">
                                            <div class="form-input-group">
                                                <label>Pickup Date</label>
                                                <input v-model="send.pickup_date" type="text" class="form-control" name="pickup_date" placeholder="Pick a date" id="datepicker-component2">
                                                </div>
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                                                </div>
                                            </div>
                                        </div>
                                            <label v-if="errors.pickup_date" class="error" for="pickup_date">
                                                {{ errors.pickup_date[0] }}
                                            </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                        <label>Address</label>
                                            <input v-model="send.address" type="text" class="form-control" name="pickup_address" placeholder="123 Manuel St.">
                                        </div>
                                        <label v-if="errors.pickup_address" class="error" for="pickup_address">
                                            {{ errors.pickup_address[0] }}
                                        </label>
                                        </div>
                                    </div>
                                    <!-- try select2 and jquery in another method -->
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
                                            <label v-if="errors.pickup_city" class="error" for="pickup_city">
                                                {{ errors.pickup_city[0] }}
                                            </label>
                                        </div>
                                    </div>
                                        <div class="row clearfix">
                                        <div class="col-xl-12">
                                        <div class="form-group form-group-default">
                                        <label>Postal Code</label>
                                            <input v-model="senderPostalCode" type="text" id="" name="pickup_postal_code" placeholder="Enter postal coe" class="form-control">
                                        </div>
                                        <label v-if="msg.senderPostalCode" class="error" for="sender_phone">
                                            {{ msg.senderPostalCode }}
                                        </label>
                                        <!-- <label v-if="errors.pickup_postal_code" class="error" for="pickup_postal_code">
                                            {{ errors.pickup_postal_code[0] }}
                                        </label> -->
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row m-t-20 clearfix">
                                        <div class="col-xl-12">
                                            <button type="submit" :data-dismiss="modal" class="btn btn-rounded btn-block btn-primary">Save Sender Details</button>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div>
            <hr class="no-margin">
            <div v-for="reci in recipient" :key="reci.id">
                <button type="button" class="address" data-toggle="modal" data-target="#modalSlideUp-2">
                    <div class="address-title text-muted">Recipient Address &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <h5 class="no-margin"><strong>{{ reci.name ? reci.name : 'Recipient Name' }} | {{ reci.number ? reci.number : 'Phone Number' }} | {{ reci.email ? reci.email : 'Email' }}</strong></h5>
                    <p>{{ reci.address ? reci.address : 'Address' }} {{ reci.city ? reci.city : 'City' }} {{ reci.postal_code ? reci.postal_code : 'Postal Code' }}</p>
                    <label v-if="errors.receiver_name || errors.receiver_email || errors.receiver_phone || errors.receiver_address || errors.receiver_city || errors.receiver_postal_code" class="error no-margin font-weight-bold">
                        Error occured in Recipient Form.
                    </label>
                </button>
                <form @submit="recipientForm">
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
                            <p v-if="errors.length">
                                <b>Please correct the following error(s):</b>
                                <ul>
                                <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </p>
                            <div class="row">
                            <div class="col-md-12">
                                        <div class="row clearfix">
                                        <div class="col-xl-6">
                                            <div class="form-group form-group-default">
                                            <label>Name</label>
                                                <input v-model="recipientName" type="text" placeholder="John Doe" name="receiver_name" class="form-control">
                                            </div>
                                            <label v-if="msg.recipientName" class="error" for="receiver_email">
                                                {{ msg.recipientName }}
                                            </label>
                                            <!-- <label v-if="errors.receiver_name" class="error" for="receiver_name">
                                                {{ errors.receiver_name[0] }}
                                            </label> -->
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-group-default">
                                            <label>Email</label>
                                                <input v-model="recipientEmail" type="email" placeholder="email@gmail.com" name="receiver_email" class="form-control">
                                            </div>
                                            <label v-if="msg.recipientEmail" class="error" for="receiver_email">
                                                {{ msg.recipientEmail }}
                                            </label>
                                            <!-- <label v-if="errors.receiver_email" class="error" for="receiver_email">
                                                {{ errors.receiver_email[0] }}
                                            </label> -->
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-xl-6">
                                        <div class="form-group form-group-default">
                                        <label>Phone Number</label>
                                            <input v-model="recipientNumber" type="text" id="" name="receiver_phone" placeholder="Enter phone number" class="form-control">
                                        </div>
                                        <label v-if="msg.recipientNumber" class="error" for="receiver_email">
                                            {{ msg.recipientNumber }}
                                        </label>
                                        <!-- <label v-if="errors.receiver_phone" class="error" for="receiver_phone">
                                            {{ errors.receiver_phone[0] }}
                                        </label> -->
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-group-default">
                                            <label>Address</label>
                                                <input v-model="reci.address" type="text" class="form-control" name="receiver_address" placeholder="123 Manuel St.">
                                            </div>
                                            <label v-if="errors.receiver_address" class="error" for="receiver_address">
                                                {{ errors.receiver_address[0] }}
                                            </label>
                                        </div>
                                        </div>
                                        <div class="row clearfix">
                                        <div class="col-xl-12">
                                        <div class="form-group form-group-default form-group-default-select2 @error('receiver_city') has-error @enderror">
                                            <p style="margin-top: 10px; margin-left: 10px; padding: 0px; margin-bottom: 0px; color: blue; font-weight: bold; color: #196a87 !important;">City</p>
                                                <select v-model="reci.city" name="receiver_city" class="full-width" data-init-plugin="select2" >
                                                    <optgroup v-for="(city, state) in cities" :label="state">
                                                        <option v-for="cit in city" :value="cit">
                                                            {{ cit }}
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <label v-if="errors.receiver_city" class="error" for="receiver_city">
                                                {{ errors.receiver_city[0] }}
                                            </label>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group form-group-default">
                                            <label>Postal Code</label>
                                                <input v-model="recipientPostalCode" type="text" id="" name="receiver_postal_code" placeholder="Enter postal code" class="form-control">
                                            </div>
                                            <label v-if="msg.recipientPostalCode" class="error" for="receiver_email">
                                                {{ msg.recipientPostalCode }}
                                            </label>
                                            <!-- <label v-if="errors.receiver_postal_code" class="error" for="receiver_postal_code">
                                                {{ errors.receiver_postal_code[0] }}
                                            </label> -->
                                        </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row m-t-20 clearfix">
                                            <div class="col-xl-12">
                                                <button type="submit" :data-dismiss="modal" aria-hidden="true" class="btn btn-rounded btn-block btn-primary">Save Recipient Details</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </form>
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
                                                    <p class="package-description price">{{ new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(pack.rate) }}</p>
                                                    <p class="package-description">Rate</p>
                                                    <input type="radio" :value="packageTypes[packs]" checked="checked" v-model="selectedPackageType">
                                                    <input type="hidden" v-model="selectedPackageType.id" name="package_id">
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
                                                <p>{{ new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(totalAmount) }}</p>
                                                <input v-model="totalAmount" type="hidden" name="package_amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-20 clearfix">
                                        <div class="col-xl-12">
                                            <button @click.prevent="packageDetailsButton()" type="button" data-dismiss="modal" aria-hidden="true" class="btn btn-rounded btn-block btn-primary">Save Package Details</button>
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
                        <button type="button" class="address package address-title text-primary" data-toggle="modal" data-target="#modalSlideUp-3">Edit</button>
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
                        <h5 class="no-margin small text-muted">{{ new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(additionalWeightFee) }}</h5>
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
                        <h5 class="no-margin small"><strong>{{ new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(totalAmount) }}</strong></h5>
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
                    <button @click="createPickup" :disabled="submitted" class="btn btn-block btn-rounded btn-primary">BOOK NOW</button>
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

        props: ['cities', 'username'],

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
                        name: '',
                        email: '',
                        number: '',
                        address: '',
                        city: '',
                        postal_code: '',
                    }
                ],

                msg: [],

                modal: false,

                senderName: '',
                senderNumber: '',
                senderPostalCode: '',

                recipientName: '',
                recipientEmail: '',
                recipientNumber: '',
                recipientPostalCode: '',

                packageTypes: [
                    {
                        id: 1,
                        name: 'Medium Parcel',
                        weight: 2,
                        rate: 78
                    },
                    {
                        id: 2,
                        name: 'Large Parcel',
                        weight: 3,
                        rate: 88
                    },
                    {
                        id: 3,
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

                errors: [],

                successful: [],

                submitted: false,
            }
        },

        watch: {
            senderName(value) {
                this.sender[0].name = value;
                this.validateSenderName(value);
            },
            
            senderNumber(value) {
                this.sender[0].number = value;
                this.validateSenderNumber(value);
            },
            
            senderPostalCode(value) {
                this.sender[0].postal_code = value;
                this.validateSenderPostalCode(value);
            },

            recipientName(value) {
                this.recipient[0].name = value;
                this.validateRecipientName(value);
            },
            
            recipientEmail(value) {
                this.recipient[0].email = value;
                this.validateRecipientEmail(value);
            },
            
            recipientNumber(value) {
                this.recipient[0].number = value;
                this.validateRecipientNumber(value);
            },
            
            recipientPostalCode(value) {
                this.recipient[0].postal_code = value;
                this.validateRecipientPostalCode(value);
            },
        },

        methods: {
            senderForm:function(e) {
                e.preventDefault();
                this.errors = [];

                if (this.sender[0].name === '') {
                    this.errors.push("Sender Name is required.");
                }

                if (this.sender[0].number === '') {
                    this.errors.push("Sender Mobile Number is required.");
                }
                
                if (this.sender[0].address === '') {
                    this.errors.push("Sender Address is required.");
                }

                if (this.sender[0].city === '') {
                    this.errors.push("Sender City is required.");
                }

                if (this.sender[0].postal_code === '') {
                    this.errors.push("Sender Postal Code is required.");
                }

                if (this.errors.length == 0) {
                    this.modal = 'modal'
                    e.preventDefault();
                }
            },

            recipientForm:function(e) {
                e.preventDefault();
                this.errors = [];

                if (this.recipient[0].name === '') {
                    this.errors.push("Recipient Name is required.");
                }

                if (this.recipient[0].number === '') {
                    this.errors.push("Recipient Mobile Number is required.");
                }

                if (this.recipient[0].email === '') {
                    this.errors.push("Recipient Email is required.");
                }
                
                if (this.recipient[0].address === '') {
                    this.errors.push("Recipient Address is required.");
                }

                if (this.recipient[0].city === '') {
                    this.errors.push("Recipient City is required.");
                }

                if (this.recipient[0].postal_code === '') {
                    this.errors.push("Recipient Postal Code is required.");
                }

                if (this.errors.length == 0) {
                    this.modal = 'modal'
                    e.preventDefault();
                }
            },

            validateSenderName(value) {
                if (/^[a-zA-Z ]+$/.test(value)) {
                    this.msg['senderName'] = '';
                } else {
                    this.msg['senderName'] = 'The name field can only contain letters.';
                } 
            },

            validateSenderNumber(value) {
                if (/^(09|\+639)\d{9}$/.test(value)) {
                    this.msg['senderNumber'] = '';
                } else {
                    this.msg['senderNumber'] = 'Invalid Phone Number';
                } 
            },

            validateSenderPostalCode(value) {
                if (/^[0-9]{4}$/.test(value)) {
                    this.msg['senderPostalCode'] = '';
                } else {
                    this.msg['senderPostalCode'] = 'Invalid Postal Code';
                } 
            },

            validateRecipientName(value) {
                if (/^[a-zA-Z ]+$/.test(value)) {
                    this.msg['recipientName'] = '';
                } else {
                    this.msg['recipientName'] = 'The name field can only contain letters.';
                } 
            },

            validateRecipientEmail(value) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
                    this.msg['recipientEmail'] = '';
                } else {
                    this.msg['recipientEmail'] = 'Invalid Email Address';
                } 
            },

            validateRecipientNumber(value) {
                if (/^(09|\+639)\d{9}$/.test(value)) {
                    this.msg['recipientNumber'] = '';
                } else {
                    this.msg['recipientNumber'] = 'Invalid Phone Number';
                } 
            },

            validateRecipientPostalCode(value) {
                if (/^[0-9]{4}$/.test(value)) {
                    this.msg['recipientPostalCode'] = '';
                } else {
                    this.msg['recipientPostalCode'] = 'Invalid Postal Code';
                } 
            },

            packageDetailsButton: function () {
                if (this.selectedPackageType.length == undefined) {
                    this.feesAndBreakdown = true
                }
            },

            createPickup: function () {
                this.errors = []
                this.successful = []

                axios.post('/' + this.username + '/pickup', {
                    sender_name: this.sender[0].name,
                    sender_phone: this.sender[0].number,
                    pickup_date: this.sender[0].pickup_date,
                    pickup_address: this.sender[0].address,
                    pickup_city: this.sender[0].city,
                    pickup_postal_code: this.sender[0].postal_code,
                    receiver_name: this.recipient[0].name,
                    receiver_email: this.recipient[0].email,
                    receiver_phone: this.recipient[0].number,
                    receiver_address: this.recipient[0].address,
                    receiver_city: this.recipient[0].city,
                    receiver_postal_code: this.recipient[0].postal_code,
                    package_id: this.selectedPackageType.id,
                    package_length: this.dimension[0].length,
                    package_width: this.dimension[0].width,
                    package_height: this.dimension[0].height,
                    package_amount: this.totalAmount
                })
                    .then(response => {
                        this.successful = response.data,
                        this.sender[0].name = '',
                        this.sender[0].number = '',
                        this.sender[0].pickup_date = '',
                        this.sender[0].address = '',
                        this.sender[0].city = '',
                        this.sender[0].postal_code = '',
                        this.recipient[0].name = '',
                        this.recipient[0].email = '',
                        this.recipient[0].number = '',
                        this.recipient[0].address = '',
                        this.recipient[0].city = '',
                        this.recipient[0].postal_code = '',
                        this.selectedPackageType = [],
                        this.dimension[0].length = 0,
                        this.dimension[0].width = 0,
                        this.dimension[0].height = 0,
                        this.totalAmount = 0,
                        this.submitted = false,
                        this.senderName = '',
                        this.senderNumber = '',
                        this.senderPostalCode = '',
                        this.recipientName = '',
                        this.recipientEmail = '',
                        this.recipientNumber = '',
                        this.recipientPostalCode = ''
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors
                            this.submitted = false
                        }
                    })
                        this.submitted = true
            }
        },

        computed: {
            additionalWeightFee: function () {
                if (this.selectedPackageType.name == 'Own Packaging') {
                    return this.dimension.reduce((total, item) => {
                        let ownPackagingFee = 26
                        let ownPackagingMaxWeight = 4
                        let dimensionTotal = (total + parseFloat(item.height) * parseFloat(item.length) * parseFloat(item.width) / 4000)
                        if (dimensionTotal > ownPackagingMaxWeight) {
                            let dimensionGrandTotal = dimensionTotal - ownPackagingMaxWeight
                            let feesTotal = dimensionGrandTotal * ownPackagingFee
                            return feesTotal
                        } else {
                            return 0
                        }
                    }, 0)
                } else {
                    return 0
                }
            },

            totalAmount: function () {
                if (this.selectedPackageType.name == 'Own Packaging') {
                    let packageRate = this.selectedPackageType.rate ? this.selectedPackageType.rate : 0
                    let packageTotal = this.additionalWeightFee + packageRate
                    return packageTotal
                } else {
                    let packageRate = this.selectedPackageType.rate ? this.selectedPackageType.rate : 0
                    return packageRate
                }
            },
        },
    }
</script>