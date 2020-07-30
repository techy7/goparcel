<div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $nonCustomer->id }}" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header clearfix text-left">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
            </button>
            <h5 class="text-uppercase">Access <span class="semi-bold">Roles</span></h5>
            <p class="p-b-10">Here's the access role's of {{ $nonCustomer->name }}.</p>
          </div>
          <div class="modal-body">
            <form role="form">
              <div class="form-group-attached">
                <div class="row">
                  <div class="col-md-12 m-l-20">
                    <p class="bold font-montserrat text-uppercase">Access Role: 
                        @foreach ($nonCustomer->roles as $role)
                            <span><small class="text-lowercase btn-chip btn-xs  m-b-10">{{ $role->name }}</small></span>
                        @endforeach
                    </p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>