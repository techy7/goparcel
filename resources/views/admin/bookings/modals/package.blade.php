<div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $pickup->id }}" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i></button>
            <h4 class="text-uppercase">Package Details</h4>
            <p class="p-b-10">Here’s the package detail of {{ $pickup->user->name }}.</p>
          </div>
          <div class="modal-body">
            <p><b>Tracking Number:</b> {{ $pickup->tracking_number }}</p>
            <p><b>Delivery Status:</b> {{ $pickup->pickupActivities->first()->deliveryStatus->name }}</p>
            <p><b>Name:</b> {{ $pickup->package->name }}</p>
            @if ($pickup->package->name == 'Own Packaging')
            <p><b>Length:</b> {{ $pickup->package_length }}</p>
            <p><b>Width:</b> {{ $pickup->package_width }}</p>
            <p><b>Height:</b> {{ $pickup->package_height }}</p>
            @endif
            <div class="clearfix">
              @if ($pickup->package->name == 'Own Packaging')
              <div class="pull-right">
                <p><b>Total Payment:</b> {{ $pickup->priceFormatted($pickup->package_amount) }}</p>
              </div>
              @else
              <div class="pull-right">
                <p><b>Total Payment:</b> {{ $pickup->priceFormatted($pickup->package->amount) }}</p>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
