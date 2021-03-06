<div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $pickup->id }}" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header clearfix text-left">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
            </button>
            <h5 class="text-uppercase">Package <span class="semi-bold">Details</span></h5>
            <p class="p-b-10">Hello, {{ $pickup->user->name }}! Here's your package details.</p>
          </div>
          <div class="modal-body">
            <form role="form">
              <div class="form-group-attached">
                <div class="row">
                  <div class="col-md-12 m-l-20">
                    <p class="bold font-montserrat text-uppercase">Name: <span><small class="text-uppercase">{{ $pickup->package->name }}</small></span></p>
                    @if ($pickup->package->name == 'Own Packaging')
                        <p class="bold font-montserrat text-uppercase">Length: <span><small class="text-uppercase">{{ $pickup->package_length }}</small></span></p>
                        <p class="bold font-montserrat text-uppercase">Width: <span><small class="text-uppercase">{{ $pickup->package_width }}</small></span></p>
                        <p class="bold font-montserrat text-uppercase">Height: <span><small class="text-uppercase">{{ $pickup->package_height }}</small></span></p>
                    @endif
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