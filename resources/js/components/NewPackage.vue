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
            <button type="button" class="btn-block address" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalSlideUp-1">
                <div class="address-title text-muted">Sender Address</div>
                <hr style="margin: 3px 0px -15px 0px;">
                <br>
                <label v-if="errors.sender_name || errors.sender_phone || errors.pickup_date || errors.pickup_address || errors.pickup_city || errors.pickup_postal_code" class="error no-margin font-weight-bold" style="margin-left: -3px !important;">
                    Kindly fill out all the fields.
                </label>
                <h5 class="details-title">Sender Name: </h5>
                <span class="text-muted" style="display:inline;">{{ send.name ? send.name : userDetails.name }}</span>
                <br>
                <h5 class="details-title">Phone Number: </h5>
                <span class="text-muted" style="display:inline;">{{ send.number ? send.number : userDetails.m_number }}</span>
                <br>
                <h5 class="details-title">Pickup Date: </h5>
                <span class="text-muted" style="display:inline;">{{ send.pickup_date ? send.pickup_date : '' }}</span>
                <br>
                <h5 class="details-title">Address: </h5>
                <span class="text-muted" style="display:inline;">{{ send.address ? send.address : userDetails.address }}</span>
                <br>
                <h5 class="details-title">City: </h5>
                <span class="text-muted" style="display:inline;">{{ send.city ? send.city : userDetails.city }}</span>
                <br>
                <h5 class="details-title">Postal Code: </h5>
                <span class="text-muted" style="display:inline;">{{ send.postal_code ? send.postal_code : userDetails.postal_code }}</span>
                <br>
            </button>
            <form @submit="senderForm">
            <div class="modal fade slide-up disable-scroll" id="modalSlideUp-1" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
                <div class="modal-dialog ">
                <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix">
                        <div class="row m-b-10">
                            <div class="pull-right">
                                <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i></button>
                            </div>
                            <div class="pull-left">
                                <h5 class="text-uppercase no-margin" style="margin-top: -10px !important">Sender Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
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
                            </div>
                            </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                    <label>Pickup Date</label>
                                                    <input type="text" class="form-control" name="pickup_date" placeholder="Pick a date" data-date-format="dd-M-yyyy" id="datepicker-component2">
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
                                            <input v-model="senderAddress" type="text" class="form-control" name="pickup_address" placeholder="123 Manuel St.">
                                        </div>
                                        <label v-if="msg.senderAddress" class="error" for="pickup_address">
                                            {{ msg.senderAddress }}
                                        </label>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xl-12">
                                        <div class="form-group form-group-default">
                                            <p style="color: blue; font-weight: bold; color: #196a87 !important;">City</p>
                                                <select v-model="senderCity" name="pickup_city" class="form-control" id="exampleFormControlSelect1">
                                                    <optgroup v-for="(city, state) in cities" :label="state">
                                                        <option v-for="cit in city" :value="cit">
                                                            {{ cit }}
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <label v-if="msg.senderCity" class="error" for="pickup_city">
                                                {{ msg.senderCity }}
                                            </label>
                                        </div>
                                    </div>
                                        <div class="row clearfix">
                                        <div class="col-xl-12">
                                        <div class="form-group form-group-default">
                                        <label>Postal Code</label>
                                            <input v-model="senderPostalCode" type="text" id="" name="pickup_postal_code" placeholder="Enter postal coe" class="form-control">
                                        </div>
                                        <label v-if="msg.senderPostalCode" class="error" for="pickup_postal_code">
                                            {{ msg.senderPostalCode }}
                                        </label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row m-t-20 clearfix">
                                        <div class="col-xl-12">
                                            <button type="submit" :data-dismiss="senderModal" :disabled="isSenderSubmit" class="btn btn-rounded btn-lg btn-block btn-primary">Save Sender Details</button>
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
    </div>
    <div class="col-md-6">
            <div v-for="reci in recipient" :key="reci.id">
                <button type="button" class="btn-block address" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalSlideUp-2">
                    <div class="address-title text-muted">Recipient Address</div>
                    <hr style="margin: 3px 0px -15px 0px;">
                    <br>
                    <label v-if="errors.receiver_name || errors.receiver_email || errors.receiver_phone || errors.receiver_address || errors.receiver_city || errors.receiver_postal_code" class="error no-margin font-weight-bold" style="margin-left: -3px !important;">
                        Kindly fill out all the fields.
                    </label>
                    <h5 class="details-title">Recipient Name: </h5>
                    <span class="text-muted" style="display:inline;">{{ reci.name ? reci.name : '' }}</span>
                    <br>
                    <h5 class="details-title">Phone Number: </h5>
                    <span class="text-muted" style="display:inline;">{{ reci.number ? reci.number : '' }}</span>
                    <br>
                    <h5 class="details-title">Email: </h5>
                    <span class="text-muted" style="display:inline;">{{ reci.email ? reci.email : '' }}</span>
                    <br>
                    <h5 class="details-title">Address: </h5>
                    <span class="text-muted" style="display:inline;">{{ reci.address ? reci.address : '' }}</span>
                    <br>
                    <h5 class="details-title">City: </h5>
                    <span class="text-muted" style="display:inline;">{{ reci.city ? reci.city : '' }}</span>
                    <br>
                    <h5 class="details-title">Postal Code: </h5>
                    <span class="text-muted" style="display:inline;">{{ reci.postal_code ? reci.postal_code : '' }}</span>
                    <br>
                </button>
                <form @submit="recipientForm">
                <div class="modal fade slide-up disable-scroll" id="modalSlideUp-2" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
                    <div class="modal-dialog ">
                    <div class="modal-content-wrapper">
                        <div class="modal-content">
                        <div class="modal-header clearfix">
                            <div class="row m-b-10">
                                <div class="pull-right">
                                    <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i></button>
                                </div>
                                <div class="pull-left">
                                    <h5 class="text-uppercase no-margin" style="margin-top: -10px !important">Recipient Details</h5>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <p v-if="recipientErrors.length">
                                <label class="error">Kindly fill out all the fields.</label>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                    <label>Name</label>
                                        <input v-model="recipientName" type="text" placeholder="John Doe" name="receiver_name" class="form-control">
                                    </div>
                                    <label v-if="msg.recipientName" class="error" for="receiver_email">
                                        {{ msg.recipientName }}
                                    </label>
                                    <label v-if="recipientErrors[0]" class="error" for="receiver_name">
                                        {{ recipientErrors[0] }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                    <label>Email</label>
                                        <input v-model="recipientEmail" type="email" placeholder="email@gmail.com" name="receiver_email" class="form-control">
                                    </div>
                                    <label v-if="msg.recipientEmail" class="error" for="receiver_email">
                                        {{ msg.recipientEmail }}
                                    </label>
                                    <label v-if="recipientErrors[1]" class="error" for="receiver_email">
                                        {{ recipientErrors[1] }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                    <label>Phone Number</label>
                                        <input v-model="recipientNumber" type="text" id="" name="receiver_phone" placeholder="Enter phone number" class="form-control">
                                    </div>
                                    <label v-if="msg.recipientNumber" class="error" for="receiver_email">
                                        {{ msg.recipientNumber }}
                                    </label>
                                    <label v-if="recipientErrors[2]" class="error" for="receiver_phone">
                                        {{ recipientErrors[2] }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                    <label>Address</label>
                                        <input v-model="recipientAddress" type="text" class="form-control" name="receiver_address" placeholder="123 Manuel St.">
                                    </div>
                                    <label v-if="msg.recipientAddress" class="error" for="receiver_email">
                                        {{ msg.recipientAddress }}
                                    </label>
                                    <label v-if="recipientErrors[3]" class="error" for="receiver_address">
                                        {{ recipientErrors[3] }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                    <p style="color: blue; font-weight: bold; color: #196a87 !important;">City</p>
                                        <select v-model="reci.city" name="receiver_city" class="form-control" id="exampleFormControlSelect1">
                                            <optgroup v-for="(city, state) in cities" :label="state">
                                                <option v-for="cit in city" :value="cit">
                                                    {{ cit }}
                                                </option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <label v-if="recipientErrors[4]" class="error" for="receiver_city">
                                        {{ recipientErrors[4] }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                    <label>Postal Code</label>
                                        <input v-model="recipientPostalCode" type="text" id="" name="receiver_postal_code" placeholder="Enter postal code" class="form-control">
                                    </div>
                                    <label v-if="msg.recipientPostalCode" class="error" for="receiver_email">
                                        {{ msg.recipientPostalCode }}
                                    </label>
                                    <label v-if="recipientErrors[5]" class="error" for="receiver_postal_code">
                                        {{ recipientErrors[5] }}
                                    </label>
                                </div>
                            </div>
                                <div class="clearfix"></div>
                                <div class="row m-t-20 clearfix">
                                    <div class="col-xl-12">
                                        <button type="submit" :data-dismiss="recipientModal" aria-hidden="true" class="btn btn-rounded btn-lg btn-block btn-primary">Save Recipient Details</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row m-t-10">
        <div class="col-md-6">
            <div class="card-body no-padding">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                    <div class="col-6">
                    <div class="pull-left">
                        <div class="card-title text-muted">Package Details</div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card-body">
                <hr style="margin: -3px 0px 17px 0px">
                <div class="row">
                    <div class="col-md-12">
                        <label v-if="errors.package_id" class="error no-margin font-weight-bold" style="margin-left: -3px !important; margin-top: -12px !important; margin-bottom: 3px !important;">
                            Select Package Type
                        </label>
                        <div class="row" style="margin-right: 20px; margin-left: -15px; margin-top: -9px">
                            <div class="col-md-4" v-for="(pack, packs) in packageTypes" :key="pack.id">
                                    <label class="container-radio radio-label">
                                        <img alt="Packange Picture" width="75" height="45" :src="'/pages/assets/img/icon.png'">
                                        <p class="package-title">{{ pack.name }}</p>
                                        <p class="package-description">Max weight: {{ pack.weight }} kg</p>
                                        <p class="package-description price">{{ new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(pack.rate) }}</p>
                                        <p class="package-description rate">Rate</p>
                                        <input type="radio" :value="packageTypes[packs]" checked="checked" v-model="selectedPackageType">
                                        <input type="hidden" v-model="selectedPackageType.id" name="package_id">
                                        <span class="checkmark"></span>
                                    </label>
                            </div>
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
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
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
                <hr style="margin: 3px 0px 12px 0px">
                <div class="row">
                    <div class="col-md-6">
                        <div class="pull-left">
                        <h5 class="no-margin details-title"><strong>Service Fees</strong></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        <h5 class="no-margin"><strong>₱{{ selectedPackageType.rate ? selectedPackageType.rate : 0 }}.00</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="pull-left m-l-10">
                        <h5 class="no-margin text-muted">Additional Weight Fee</h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        <h5 class="no-margin text-muted">{{ new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(additionalWeightFee) }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row m-t-20">
                    <div class="col-md-6">
                        <div class="pull-left">
                        <h5 class="no-margin details-title"><strong>Total Amount</strong></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        <h5 class="no-margin"><strong>{{ new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(totalAmount) }}</strong></h5>
                        </div>
                    </div>
                </div>
                
                <div class="row m-t-20">
                    <div class="col-md-12">
                        <button @click="createPickup" :disabled="submitted" class="btn btn-block btn-lg btn-rounded btn-primary m-b-10">BOOK NOW</button>
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
            console.log('Parcel Bear.')
        },

        props: ['cities', 'username', 'userDetails'],

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

                senderModal: false,

                recipientModal: false,

                senderName: '',
                senderNumber: '',
                senderAddress: '',
                senderCity: '',
                senderPickupDate: '',
                senderPostalCode: '',

                recipientName: '',
                recipientEmail: '',
                recipientNumber: '',
                recipientAddress: '',
                recipientPostalCode: '',

                packageTypes: [
                    {
                        id: 1,
                        name: 'Medium',
                        weight: 2,
                        rate: 78
                    },
                    {
                        id: 2,
                        name: 'Large',
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

                errors: [],

                senderErrors: [],

                recipientErrors: [],

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
            
            senderPickupDate(value) {
                this.sender[0].pickup_date = value;
                this.validateSenderPickupDate(value);
            },
            
            senderAddress(value) {
                this.sender[0].address = value;
                this.validateSenderAddress(value);
            },
            
            senderCity(value) {
                this.sender[0].city = value;
                this.validateSenderCity(value);
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
            
            recipientAddress(value) {
                this.recipient[0].address = value;
                this.validateRecipientAddress(value);
            },
            
            recipientPostalCode(value) {
                this.recipient[0].postal_code = value;
                this.validateRecipientPostalCode(value);
            },
        },

        methods: {
            dateDisabled(ymd, date) {
                // Disable weekends (Sunday = `0`, Saturday = `6`) and
                // disable days that fall on the 13th of the month
                const weekday = date.getDay()
                const day = date.getDate()
                // Return `true` if the date should be disabled
                return weekday === 0 || weekday === 6 || day === 13
            },

            senderForm:function(e) {
                e.preventDefault();
                this.senderErrors = [];

                this.validateSenderName()

                this.validateSenderNumber(this.sender[0].number)

                this.validateSenderPickupDate()

                this.validateSenderAddress()

                this.validateSenderCity()

                this.validateSenderPostalCode(this.sender[0].postal_code)

                if (this.senderErrors.length == 0) {
                    this.senderModal = 'modal'
                    e.preventDefault();
                }
            },

            recipientForm:function(e) {
                e.preventDefault();
                this.recipientErrors = [];

                if (this.recipient[0].name === '') {
                    this.recipientErrors[0] = "This field is required";
                }

                if (this.recipient[0].number === '') {
                    this.recipientErrors[1] = "This field is required";
                }

                if (this.recipient[0].email === '') {
                    this.recipientErrors[2] = "This field is required";
                }
                
                if (this.recipient[0].address === '') {
                    this.recipientErrors[3] = "This field is required";
                }

                if (this.recipient[0].city === '') {
                    this.recipientErrors[4] = "This field is required";
                }

                if (this.recipient[0].postal_code === '') {
                    this.recipientErrors[5] = "This field is required";
                }

                if (this.recipientErrors.length == 0) {
                    this.recipientModal = 'modal'
                    e.preventDefault();
                }
            },

            validateSenderName(value) {
                if (this.sender[0].name === '') {
                    this.msg['senderName'] = 'This field is required';
                    this.senderErrors[0] = 'Sender Name'
                } else if (!/^[a-zA-Z ]+$/.test(value)) {
                    this.msg['senderName'] = 'The name field can only contain letters.';
                    this.senderErrors[0] = 'Sender Name'
                } else {
                    this.msg['senderName'] = '';
                    return true
                }
            },

            validateSenderNumber(value) {
                if (this.sender[0].number === '') {
                    this.msg['senderNumber'] = 'This field is required';
                    this.senderErrors[1] = 'Sender Number'
                } else if (!/^(09|\+639)\d{9}$/.test(value)) {
                    this.msg['senderNumber'] = 'Phone Number is invalid.';
                    this.senderErrors[1] = 'Sender Number'
                } else {
                    this.msg['senderNumber'] = '';
                    return true
                } 
            },

            validateSenderPickupDate(value) {
                if (this.sender[0].pickup_date === '') {
                    this.msg['senderPickupDate'] = 'This field is required';
                    this.senderErrors[2] = 'Sender Pickup Date'
                } else {
                    this.msg['senderPickupDate'] = '';
                    return true
                } 
            },

            validateSenderAddress(value) {
                if (this.sender[0].address === '') {
                    this.msg['senderAddress'] = 'This field is required';
                    this.senderErrors[3] = 'Sender Address'
                } else {
                    this.msg['senderAddress'] = '';
                    return true
                } 
            },

            validateSenderCity(value) {
                if (this.sender[0].city === '') {
                    this.msg['senderCity'] = 'This field is required';
                    this.senderErrors[4] = 'Sender City'
                } else {
                    this.msg['senderCity'] = '';
                    return true
                } 
            },

            validateSenderPostalCode(value) {
                if (this.sender[0].postal_code === '') {
                    this.msg['senderPostalCode'] = 'This field is required';
                    this.senderErrors[5] = 'Sender Postal Code'
                } else if (!/^[0-9]{4}$/.test(value)) {
                    this.msg['senderPostalCode'] = 'Postal Code is invalid.';
                    this.senderErrors[5] = 'Sender Postal Code'
                } else {
                    this.msg['senderPostalCode'] = '';
                    return true
                } 
            },

            validateRecipientName(value) {
                if (this.recipient[0].name === '') {
                    this.msg['recipientName'] = 'This field is required';
                } else if (!/^[a-zA-Z ]+$/.test(value)) {
                    this.msg['recipientName'] = 'The name field can only contain letters.';
                } else {
                    this.msg['recipientName'] = '';
                } 
            },

            validateRecipientEmail(value) {
                if (this.recipient[0].email === '') {
                    this.msg['recipientEmail'] = 'This field is required';
                } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
                    this.msg['recipientEmail'] = 'Email Address is invalid.';
                } else {
                    this.msg['recipientEmail'] = '';
                } 
            },

            validateRecipientNumber(value) {
                if (this.recipient[0].number === '') {
                    this.msg['recipientNumber'] = 'This field is required';
                } else if (!/^(09|\+639)\d{9}$/.test(value)) {
                    this.msg['recipientNumber'] = 'Phone Number is invalid.';
                } else {
                    this.msg['recipientNumber'] = '';
                } 
            },

            validateRecipientAddress(value) {
                if (this.recipient[0].address === '') {
                    this.msg['recipientAddress'] = 'This field is required';
                } else {
                    this.msg['recipientAddress'] = '';
                } 
            },

            validateRecipientPostalCode(value) {
                if (this.recipient[0].postal_code === '') {
                    this.msg['recipientPostalCode'] = 'This field is required';
                }
                else if (!/^[0-9]{4}$/.test(value)) {
                    this.msg['recipientPostalCode'] = 'Postal Code is invalid.';
                } else {
                    this.msg['recipientPostalCode'] = '';
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
                        this.senderAddress = '',
                        this.senderPostalCode = '',
                        this.recipientName = '',
                        this.recipientEmail = '',
                        this.recipientNumber = '',
                        this.recipientAddress = ''
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
            isSenderSubmit: function () {
                if (this.validateSenderName() == true && this.validateSenderNumber(this.sender[0].number) == true && this.validateSenderPickupDate() == true && this.validateSenderAddress() == true && this.validateSenderCity() == true && this.validateSenderPostalCode(this.sender[0].postal_code) == true) {
                    return false    
                } else {
                    return true
                }
            },

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