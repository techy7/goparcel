<template>
    <div>
        <div class="row m-t-10">
            <div class="col-md-12">
                <div class="form-group form-group-default">
                    <label>Tracking Number</label>
                    <input type="text" v-model="search" name="tracking_number" placeholder="Enter tracking number" class="form-control">
                </div>
                <label v-if="errorInput" class="error" for="tracking_number">
                    {{ errorInput }}
                </label>

                <button class="d-none" v-on="trackingUrl == trackingUrl ? { click: () => trackingUrl } : { click: () => trackingUrl }"></button>

                <div class="row m-b-10">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button ref="triggerShowDelivery" class="btn btn-outline-complete btn-rounded btn-block" @click="showDelivery">Track Order</button>
                    </div>
                    <div class="col-4"></div>
                </div>

                <div v-if="pickup.length != 0" class="card-body" style="padding-top: 0px !important">
                    <div class="row">
                        <div class="col-12 no-padding">
                            <div class="card card-default" style="border: 1px solid #ccc">
                                <div class="card-body" style="padding: 8px !important;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="pull-left">
                                                <h5 class="address-title text-muted">Tracking Details</h5>
                                            </div>
                                        </div>
                                    </div>
                                <div class="card-body" style="padding: 10px 20px 0px 10px !important;">
                                    <div class="steps padding-top-2x padding-bottom-1x">
                                        <div v-for="active in pickup.pickup_activities" :key="active.id" class="row">
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i 
                                                        :class="{ 'pe-7s-note': active.delivery_status.name == 'Order Created', 'pe-7s-albums': active.delivery_status.name == 'In Transit for Collection', 'pe-7s-map-marker ': active.delivery_status.name == 'Arrived at Manila Hub', 'pe-7s-car': active.delivery_status.name == 'In Transit for Delivery', 'pe-7s-box2': active.delivery_status.name == 'Delivered', 'pe-7s-back-2': active.delivery_status.name == 'Back to Sender' } "
                                                    ></i></div>
                                                </div>
                                                <h4 class="step-title">{{ active.delivery_status.name }}</h4>
                                                <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ active.updated_at | formattedDate }}</h5>
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
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            var config = {
              headers:{
                  'Content-Type':'application/json',
                  'Accept':'application/json'
              }
          }
        this.$refs.triggerShowDelivery.click()
        },

        data() {
            return {
                search: '',
                errorInput: '',
                pickup: [],
            }
        },

        methods: {
            showDelivery: function () {
                axios.get('/track-delivery/' + this.search)
                    .then(response => {
                        this.errorInput = ''
                        if (this.search == '') {
                            this.pickup = []
                        } else {
                            this.pickup = response.data
                        }
                    })
                    
                    .catch(error => {
                        if (error.response.status == 500 || 404) {
                            this.errorInput = 'Wrong tracking number'
                            this.pickup = []
                        } 
                    })
            },
        },

        computed: {
            trackingUrl: function () {
                let currentUrl = window.location.pathname
                let formattedUrl = currentUrl.replace('/track-delivery/', '')
                if (formattedUrl != '/track-delivery') {
                    return this.search = formattedUrl
                }
            }
        }
    }
</script>