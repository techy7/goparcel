@extends('layouts.pages.app')

@section('title', 'Schedule a Pickup')

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
        <div class="col-md-6 col-xlg-6">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                  <h3 class="mw-80">Pickup Information</h3>
                  <form id="form-personal" role="form" autocomplete="off">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default input-group">
                            <div class="form-input-group">
                                <label>Check In</label>
                                <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                            </div>
                            <div class="input-group-append ">
                                <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default">
                          <label>Location</label>
                          <input type="text" class="form-control" name="location" placeholder="123 Manuel St." required>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
              <!-- END card -->
          </div>
        <div class="col-md-6 col-xlg-6">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                  <h3 class="mw-80">Receiver Information</h3>
                  <form id="form-personal" role="form" autocomplete="off">
                    <div class="row clearfix">
                      <div class="col-xl-6">
                        <div class="form-group form-group-default">
                          <label>Name</label>
                          <input type="text" placeholder="John Doe" class="form-control" name="name" required>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group form-group-default">
                          <label>Email</label>
                          <input type="email" placeholder="email@gmail.com" class="form-control" name="email" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default">
                          <label>Contact Number</label>
                          <input type="number" class="form-control" name="c_number" placeholder="0909 909 0909" required>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
              <!-- END card -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="card card-default">
              <div class="card-body">
                <h3 class="mw-80">Package Items</h3>
                <div class="row">
                  <div class="col-lg-2">
                    <div class="form-group">
                      <div>
                        <label>Types</label>
                      </div>
                      <select class="full-width" data-init-plugin="select2">
                        <optgroup label="Alaskan/Hawaiian Time Zone">
                          <option value="AK">Alaska</option>
                          <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                          <option value="CA">California</option>
                          <option value="NV">Nevada</option>
                          <option value="OR">Oregon</option>
                          <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                          <option value="AZ">Arizona</option>
                          <option value="CO">Colorado</option>
                          <option value="ID">Idaho</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NM">New Mexico</option>
                          <option value="ND">North Dakota</option>
                          <option value="UT">Utah</option>
                          <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                          <option value="AL">Alabama</option>
                          <option value="AR">Arkansas</option>
                          <option value="IL">Illinois</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="OK">Oklahoma</option>
                          <option value="SD">South Dakota</option>
                          <option value="TX">Texas</option>
                          <option value="TN">Tennessee</option>
                          <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="IN">Indiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="OH">Ohio</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WV">West Virginia</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="4" id="name" placeholder="Briefly Describe your reports"></textarea>
                      </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="form-group">
                        <label>Quantity</label>
                      <input type="number" class="autonumeric form-control">
                      </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="form-group">
                        <label>Weight(kg)</label>
                      <input type="number" class="autonumeric form-control">
                      </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="form-group">
                        <label>Length(cm)</label>
                      <input type="number" class="autonumeric form-control">
                      </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="form-group">
                        <label>Width(cm)</label>
                      <input type="number" class="autonumeric form-control">
                      </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="form-group">
                        <label>Height(cm)</label>
                      <input type="number" class="autonumeric form-control">
                      </div>
                  </div>
                  <div class="col-lg-1">
                    <div class="form-group">
                        <button aria-label="" class="btn btn-danger btn-icon-left m-b-10 m-t-30" type="button"><i class="pg-icon">trash</i>Delete</button>
                      </div>
                  </div>
                </div>
              </div>
          </div> --}}
          <!-- START card -->
          <div class="card">
            <div class="card-body">
            <h3 class="mw-80">Package Items</h3>
              <div class="table-responsive">
                <table class="table table-hover" id="detailedTable">
                  <thead>
                    <tr>
                      <th style="width:25%">Types</th>
                      <th style="width:25%">Description</th>
                      <th style="width:10%">Quantity</th>
                      <th style="width:10%">Weight(kg)</th>
                      <th style="width:10%">Length(cm)</th>
                      <th style="width:10%">Width(cm)</th>
                      <th style="width:10%">Height(cm)</th>
                      <th style="width:25%"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="v-align-middle semi-bold">
                        <select class="full-width" data-init-plugin="select2">
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                              <option value="OR">Oregon</option>
                              <option value="WA">Washington</option>
                            </optgroup>
                            <optgroup label="Mountain Time Zone">
                              <option value="AZ">Arizona</option>
                              <option value="CO">Colorado</option>
                              <option value="ID">Idaho</option>
                              <option value="MT">Montana</option>
                              <option value="NE">Nebraska</option>
                              <option value="NM">New Mexico</option>
                              <option value="ND">North Dakota</option>
                              <option value="UT">Utah</option>
                              <option value="WY">Wyoming</option>
                            </optgroup>
                            <optgroup label="Central Time Zone">
                              <option value="AL">Alabama</option>
                              <option value="AR">Arkansas</option>
                              <option value="IL">Illinois</option>
                              <option value="IA">Iowa</option>
                              <option value="KS">Kansas</option>
                              <option value="KY">Kentucky</option>
                              <option value="LA">Louisiana</option>
                              <option value="MN">Minnesota</option>
                              <option value="MS">Mississippi</option>
                              <option value="MO">Missouri</option>
                              <option value="OK">Oklahoma</option>
                              <option value="SD">South Dakota</option>
                              <option value="TX">Texas</option>
                              <option value="TN">Tennessee</option>
                              <option value="WI">Wisconsin</option>
                            </optgroup>
                            <optgroup label="Eastern Time Zone">
                              <option value="CT">Connecticut</option>
                              <option value="DE">Delaware</option>
                              <option value="FL">Florida</option>
                              <option value="GA">Georgia</option>
                              <option value="IN">Indiana</option>
                              <option value="ME">Maine</option>
                              <option value="MD">Maryland</option>
                              <option value="MA">Massachusetts</option>
                              <option value="MI">Michigan</option>
                              <option value="NH">New Hampshire</option>
                              <option value="NJ">New Jersey</option>
                              <option value="NY">New York</option>
                              <option value="NC">North Carolina</option>
                              <option value="OH">Ohio</option>
                              <option value="PA">Pennsylvania</option>
                              <option value="RI">Rhode Island</option>
                              <option value="SC">South Carolina</option>
                              <option value="VT">Vermont</option>
                              <option value="VA">Virginia</option>
                              <option value="WV">West Virginia</option>
                            </optgroup>
                          </select>
                      </td>
                      <td class="v-align-middle">
                        <textarea class="form-control" rows="2" id="name" placeholder="Briefly Describe your reports"></textarea>
                      </td>
                      <td class="v-align-middle semi-bold">
                        <input type="number" class="autonumeric form-control">
                      </td>
                      <td class="v-align-middle">
                          <input type="number" class="autonumeric form-control">
                      </td>
                      <td class="v-align-middle">
                          <input type="number" class="autonumeric form-control">
                      </td>
                      <td class="v-align-middle">
                          <input type="number" class="autonumeric form-control">
                      </td>
                      <td class="v-align-middle">
                          <input type="number" class="autonumeric form-control">
                      </td>
                      <td class="v-align-middle">
                        <button aria-label="" class="btn btn-danger btn-icon-left m-b-10 m-t-5" type="button"><i class="pg-icon">trash</i>Delete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                {{-- <div class="row">
                    <div class="col-4">
                        <button aria-label="" class="btn btn-success btn-icon-left m-t-20" type="button"><i class="pg-icon">add</i><span class="">Add Package</span></button>
                    </div>
                    <div class="col-8">
                        <p>Lorem ipsum dolor sit amet consectetur elit. Mollitia numquam ratione ea?</p>
                    </div>
                </div> --}}
                <div class="col-md-12 d-flex align-items-center">
                    <div class="form-check form-check-inline success m-b-0">
                        <button aria-label="" class="btn btn-success btn-icon-left m-t-20" type="button"><i class="pg-icon">add</i><span class="">Add Package</span></button>
                    </div>
                    <div class="form-check form-check-inline success m-t-30 m-l-20">
                        <h4><strong>Total Actual Weight:</strong> <small>0.00kg.</small></h4>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- END card -->
        </div>
    </div>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
            <div class="btn-group btn-toolbar">
                <button aria-label="" type="button" class="btn btn-info">
                  <div class="p-t-5 p-b-5">
                    <i class="pg-icon">add</i>
                    <div class="fs-11 font-montserrat text-uppercase">ADD PICKUP</div>
                  </div>
                </button>
            </div>
        </div>
        <div class="col-5"></div>
    </div>

    </div>
</div>
@endsection

@section('lower-links-extends')
    <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/form_layouts.js') }}" type="text/javascript"></script>
@endsection