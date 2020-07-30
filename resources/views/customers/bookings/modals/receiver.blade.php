<div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $pickup->id }}-{{ $pickup->id }}" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header clearfix text-left">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
            </button>
            <h5 class="text-uppercase">Receiver <span class="semi-bold">Details</span></h5>
            <p class="p-b-10">Hello, {{ $pickup->user->name }}! Here's your receiver details.</p>
          </div>
          <div class="modal-body">
            <form role="form">
              <div class="form-group-attached">
                <div class="row">
                  <div class="col-md-12 m-l-20">
                    <p class="bold font-montserrat text-uppercase">Name: <span><small class="text-uppercase">{{ $pickup->receiver_name }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Email: <span><small class="text-uppercase">{{ $pickup->receiver_email }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Phone Number: <span><small class="text-uppercase">{{ $pickup->receiver_phone }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Address: <span><small class="text-uppercase">{{ $pickup->receiver_address }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">City: <span><small class="text-uppercase">{{ $pickup->receiver_city }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">State: <span><small class="text-uppercase">{{ $pickup->receiver_state }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Postal Code: <span><small class="text-uppercase">{{ $pickup->receiver_postal_code }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Country: <span><small class="text-uppercase">{{ $pickup->receiver_country }}</small></span></p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $pickup->id }}" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header clearfix text-left">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
            </button>
            <h5 class="text-uppercase">Customer <span class="semi-bold">Details</span></h5>
            <p class="p-b-10">Here's the detail of {{ $pickup->user->name }}.</p>
          </div>
          <div class="modal-body">
            <form role="form">
              <div class="form-group-attached">
                <div class="row">
                  <div class="col-md-12 m-l-20">
                    <p class="bold font-montserrat text-uppercase">Name: <span><small class="text-uppercase">{{ $pickup->user->name }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Email: <span><small class="text-uppercase">{{ $pickup->user->email }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Phone Number: <span><small class="text-uppercase">{{ $pickup->user->m_number }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Address: <span><small class="text-uppercase">{{ $pickup->user->address }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">City: <span><small class="text-uppercase">{{ $pickup->user->city }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">State: <span><small class="text-uppercase">{{ $pickup->user->state }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Postal Code: <span><small class="text-uppercase">{{ $pickup->user->postal_code }}</small></span></p>
                    <p class="bold font-montserrat text-uppercase">Country: <span><small class="text-uppercase">{{ $pickup->user->country }}</small></span></p>

                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12">
                <div class="p-t-20 clearfix p-l-10 p-r-10 m-l-5">
                  <div class="pull-left">
                    <p class="bold font-montserrat text-uppercase">Total Payment:</p>
                  </div>
                  @if ($pickup->package->name == 'Own Packaging')
                    <div class="pull-right">
                      <p class="bold font-montserrat text-uppercase">{{ $pickup->priceFormatted($pickup->package_amount) }}</p>
                    </div>
                  @else
                    <div class="pull-right">
                      <p class="bold font-montserrat text-uppercase">{{ $pickup->priceFormatted($pickup->package->amount) }}</p>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>