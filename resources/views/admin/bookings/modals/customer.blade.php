<div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $pickup->id }}-{{ $pickup->id }}-{{ $pickup->id }}" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i></button>
            <h4 class="text-uppercase">Customer Details</h4>
            <p class="p-b-10">Here's the detail of {{ $pickup->user->name }}.</p>
          </div>
          <div class="modal-body">
            <p><b>Name:</b> {{ $pickup->user->name }}</p>
            <p><b>Email:</b> {{ $pickup->user->email }}</p>
            <p><b>Phone Number:</b> {{ $pickup->user->m_number }}</p>
            <p><b>Address:</b> {{ $pickup->user->address }}</p>
            <p><b>City:</b> {{ $pickup->user->city }}</p>
            <p><b>State:</b> {{ $pickup->user->state }}</p>
            <p><b>Postal Code:</b> {{ $pickup->user->postal_code }}</p>
            <p><b>Country:</b> {{ $pickup->user->country }}</p>
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
