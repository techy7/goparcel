@extends('layouts.pages.app')

@section('title', __('auth.dashboard'))

@section('content')
<div class="content sm-gutter">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid padding-25 sm-padding-10">
      <div class="row">
        <div class="col-lg-4 col-xl-3 col-xlg-2 ">
          <div class="row">
            <div class="col-md-12 m-b-10">
              <!-- START WIDGET D3 widget_graphTileFlat-->
              <div class="widget-8 card  bg-success no-margin widget-loader-bar">
                <div class="container-xs-height full-height">
                  <div class="row-xs-height">
                    <div class="col-xs-height col-top">
                      <div class="card-header  top-left top-right">
                        <div class="card-title">
                          <span class="font-montserrat fs-11 all-caps">Weekly Sales </span>
                        </div>
                        <div class="card-controls">
                          <ul>
                            <li>
                              <a data-toggle="refresh" class="card-refresh" href="#"><i
                                      class="card-icon card-icon-refresh"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row-xs-height ">
                    <div class="col-xs-height col-top relative">
                      <div class="row full-height">
                        <div class="col-sm-6">
                          <div class="p-l-20 full-height d-flex flex-column justify-content-between">
                            <h3 class="no-margin p-b-5">$14,000</h3>
                            <p class="small m-t-5 m-b-20">
                              <span class="label label-white hint-text font-montserrat m-r-5">60%</span><span class="fs-12">Higher</span>
                            </p>
                          </div>
                        </div>
                        <div class="col-sm-6">
                        </div>
                      </div>
                      <div class='widget-8-chart line-chart' data-line-color="white" data-points="true" data-point-color="success" data-stroke-width="2">
                        <svg></svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END WIDGET -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 m-b-10">
              <!-- START WIDGET widget_progressTileFlat-->
              <div class="widget-9 card  bg-primary no-margin widget-loader-bar">
                <div class="full-height d-flex flex-column">
                  <div class="card-header ">
                    <div class="card-title">
                      <span class="font-montserrat fs-11 all-caps">Weekly Sales </span>
                    </div>
                    <div class="card-controls">
                      <ul>
                        <li><a href="#" class="card-refresh" data-toggle="refresh"><i class="card-icon card-icon-refresh"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="p-l-20">
                    <h3 class="no-margin p-b-5">$23,000</h3>
                    <span class="d-flex align-items-center">
              <i class="pg-icon m-r-5">arrow_down</i>
              <span class="small hint-text">65% lower than last month</span>
                    </span>
                  </div>
                  <div class="mt-auto">
                    <div class="progress progress-small m-b-20">
                      <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                      <div class="progress-bar progress-bar-white" style="width:45%"></div>
                      <!-- END BOOTSTRAP PROGRESS -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- END WIDGET -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- START WIDGET widget_statTile-->
              <div class="widget-10 card  bg-white no-margin widget-loader-bar">
                <div class="card-header  top-left top-right ">
                  <div class="card-title text-black hint-text">
                    <span class="font-montserrat fs-11 all-caps">Weekly Sales </span>
                  </div>
                  <div class="card-controls">
                    <ul>
                      <li><a data-toggle="refresh" class="card-refresh text-black" href="#"><i
                      class="card-icon card-icon-refresh"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body p-t-40">
                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="no-margin p-b-5 text-danger semi-bold">APPL 2.032</h4>
                      <div class="d-flex align-items-center pull-left small">
                        <span>WMHC</span>
                        <span class=" text-success"> <i class="pg-icon m-l-10">arrow_up</i> </span>
                        <span class="text-success font-montserrat"> 21% </span>
                      </div>
                      <div class="d-flex align-items-center pull-left m-l-20 small">
                        <span>HCRS</span>
                        <span class="text-danger"><i class="pg-icon m-l-10">arrow_down</i> </span>
                        <span class="text-danger font-montserrat"> 21% </span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="p-t-5 full-width">
                    <a href="#" class="btn-circle-arrow b-grey"><i
                  class="pg-icon">chevron_down</i></a>
                    <span class="hint-text small">Show more</span>
                  </div>
                </div>
              </div>
              <!-- END WIDGET -->
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-xl-5 col-xlg-6 m-b-10">
          <div class="row">
            <div class="col-md-12">
              <!-- START WIDGET D3 widget_graphWidget-->
              <div class="widget-12 card  widget-loader-circle no-margin">
                <div class="row">
                  <div class="col-xlg-8 ">
                    <div class="card-header  pull-up top-right ">
                      <div class="card-controls">
                        <ul>
                          <li class="hidden-xlg">
                            <div class="dropdown">
                              <a data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                <i class="card-icon card-icon-settings"></i>
                              </a>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">AAPL</a>
                                </li>
                                <li><a href="#">YHOO</a>
                                </li>
                                <li><a href="#">GOOG</a>
                                </li>
                              </ul>
                            </div>
                          </li>
                          <li>
                            <a data-toggle="refresh" class="card-refresh text-black" href="#"><i class="card-icon card-icon-refresh"></i></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-xlg-8 col-lg-12">
                      <div class="p-l-5">
                        <h2 class="pull-left m-t-5 m-b-5">Tesla Inc.</h2>
                        <h2 class="pull-right m-r-25 m-t-5 m-b-5 text-success">
                      <i class="pg-icon m-r-5">arrow_up</i>
                      <span class="">448.97</span>
                      <span class="text-success fs-12">+318.24</span>
                  </h2>
                        <div class="clearfix"></div>
                        <div class="full-width">
                          <ul class="list-inline m-t-10 p-b-10 m-b-0 b-b b-dashed b-grey">
                            <li><a href="#" class="font-montserrat fs-12 text-color">1D</a>
                            </li>
                            <li class="active"><a href="#" class="font-montserrat fs-12   bg-contrast-low text-color">5D</a>
                            </li>
                            <li><a href="#" class="font-montserrat fs-12 text-color">1M</a>
                            </li>
                            <li><a href="#" class="font-montserrat fs-12 text-color">1Y</a>
                            </li>
                          </ul>
                        </div>
                        <div class="nvd3-line line-chart text-center" data-x-grid="false">
                          <svg></svg>
                        </div>
                      </div>
                    </div>
                    <div class="col-xlg-4 visible-xlg p-l-15">
                      <div class="widget-12-search">
                        <p class="pull-left">Stocks list</p>
                        <button aria-label="" class="btn btn-default btn-rounded btn-icon pull-right">
                          <i class="pg-icon">add</i>
                        </button>
                        <div class="clearfix"></div>
                        <input type="text" placeholder="Search list" class="form-control m-t-5">
                      </div>
                      <div class="company-stat-boxes">
                        <div data-index="0" class="company-stat-box m-t-15 active p-l-5 p-r-5 p-t-10 p-b-10 b-b b-grey">
                          <div class="pull-left">
                            <p class="company-name pull-left text-uppercase bold no-margin">
                              <span class="text-success fs-11"></span> AAPL
                            </p>
                            <small class="hint-text m-l-10">Apple Inc.</small>
                          </div>
                          <div class="pull-right">
                            <p class="small hint-text no-margin inline">325.73</p>
                            <span class="label label-success m-l-5 inline">+ 12.09</span>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div data-index="1" class="company-stat-box active p-l-5 p-r-5 p-t-15 p-b-10 b-b b-grey">
                          <div class="pull-left">
                            <p class="company-name pull-left text-uppercase bold no-margin">
                              <span class="text-success fs-11"></span> GOOG
                            </p>
                            <small class="hint-text m-l-10">Alphabet Inc.</small>
                          </div>
                          <div class="pull-right">
                            <p class="small hint-text no-margin inline">1407.73</p>
                            <span class="label label-important m-l-5 inline">- 1.09</span>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div data-index="2" class="company-stat-box active p-l-5 p-r-5 p-t-15 p-b-10 b-b b-grey">
                          <div class="pull-left">
                            <p class="company-name pull-left text-uppercase bold no-margin">
                              <span class="text-success fs-11"></span> YHOO
                            </p>
                            <small class="hint-text m-l-10">Yahoo Inc.</small>
                          </div>
                          <div class="pull-right">
                            <p class="small hint-text no-margin inline">37.73</p>
                            <span class="label label-success m-l-5 inline">+ 0.09</span>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div data-index="3" class="company-stat-box active p-l-5 p-r-5 p-t-15 p-b-10 b-b b-grey">
                          <div class="pull-left">
                            <p class="company-name pull-left text-uppercase bold no-margin">
                              <span class="text-success fs-11"></span> NKE
                            </p>
                            <small class="hint-text m-l-10">Nike Inc.</small>
                          </div>
                          <div class="pull-right">
                            <p class="small hint-text no-margin inline">100.02</p>
                            <span class="label label-important m-l-5 inline">- 0.04</span>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div data-index="4" class="company-stat-box active p-l-5 p-r-5 p-t-15 p-b-10">
                          <div class="pull-left">
                            <p class="company-name pull-left text-uppercase bold no-margin">
                              <span class="text-success fs-11"></span> TSLA
                            </p>
                            <small class="hint-text m-l-10">Tesla Inc.</small>
                          </div>
                          <div class="pull-right">
                            <p class="small hint-text no-margin inline">537.73</p>
                            <span class="label label-success m-l-5 inline">+ 0.09</span>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                      <span class="pull-bottom hint-text small">VIA YAHOO Finance (Stock market API)(800) MY-STOCKS (800-692-7753)</span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END WIDGET -->
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-xl-4 m-b-10 hidden-xlg">
          <!-- START WIDGET widget_tableWidgetBasic-->
          <div class="widget-11-2 card  no-margin widget-loader-circle full-height d-flex flex-column">
            <div class="card-header">
              <div class="card-title">Today's Table
              </div>
              <div class="card-controls">
                <ul>
                  <li><a data-toggle="refresh" class="card-refresh" href="#"><i
                      class="card-icon card-icon-refresh"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="p-l-20 p-r-20 p-b-10 p-t-5">
              <div class="pull-left">
                <h3 class="text-primary no-margin">Pages</h3>
              </div>
              <h4 class="pull-right semi-bold no-margin"><sup>
          <small class="semi-bold">$</small>
      </sup> 102,967
      </h4>
              <div class="clearfix"></div>
            </div>
            <div class="widget-11-table auto-overflow">
              <table class="table table-condensed table-hover">
                <tbody>
                  <tr>
                    <td class="fs-12 w-50">Purchase Pages Extended #2502</td>
                    <td class="text-right b-r b-dashed b-grey w-25">
                      <span class="hint-text small">Qty 1</span>
                    </td>
                    <td class="w-25">
                      <span class="font-montserrat fs-18">$1000</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="fs-12 w-50">Purchase Pages Support #2325</td>
                    <td class="text-right b-r b-dashed b-grey w-25">
                      <span class="hint-text small">Qty 1</span>
                    </td>
                    <td class="w-25">
                      <span class="font-montserrat fs-18">$12</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="fs-12 w-50">Purchase CODE #2345</td>
                    <td class="text-right b-r b-dashed b-grey w-25">
                      <span class="hint-text small">Qty 1</span>
                    </td>
                    <td class="w-25">
                      <span class="font-montserrat fs-18">$27</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="fs-12 w-50">Purchase CODE #2345</td>
                    <td class="text-right b-r b-dashed b-grey w-25">
                      <span class="hint-text small">Qty 1</span>
                    </td>
                    <td class="w-25">
                      <span class="font-montserrat fs-18">$27</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="fs-12 w-50">Purchase Pages Support #2325</td>
                    <td class="text-right b-r b-dashed b-grey w-25">
                      <span class="hint-text small">Qty 1</span>
                    </td>
                    <td class="w-25">
                      <span class="font-montserrat fs-18">$12</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="fs-12 w-50">Purchase Pages Extended #2502</td>
                    <td class="text-right b-r b-dashed b-grey w-25">
                      <span class="hint-text small">Qty 1</span>
                    </td>
                    <td class="w-25">
                      <span class="font-montserrat fs-18">$1000</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="fs-12 w-50">Purchase Pages Extended #2502</td>
                    <td class="text-right b-r b-dashed b-grey w-25">
                      <span class="hint-text small">Qty 1</span>
                    </td>
                    <td class="w-25">
                      <span class="font-montserrat fs-18">$1000</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="p-t-15 p-b-15 p-l-20 p-r-20 mt-auto">
              <p class="small no-margin">
                <a href="#" class="btn-circle-arrow b-grey"><i class="pg-icon">chevron_down</i></a>
                <span class="hint-text ">Show more details of <a href="#"> Revox pvt ltd </a></span>
              </p>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
        <div class="col-lg-6 visible-md visible-xlg col-xlg-4 m-b-10">
          <!-- START WIDGET D3 widget_stackedBarWidget-->
          <div class="widget-15 card no-margin  widget-loader-circle">
            <div class="card-header top-right">
              <div class="card-controls">
                <ul>
                  <li><a href="#" class="card-refresh" data-toggle="refresh"><i
                      class="card-icon card-icon-refresh"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body no-padding">
              <ul class="nav nav-tabs nav-tabs-simple p-t-5">
                <li class="nav-item">
                  <a href="#" data-toggle="tab" class="active">
                  APPL<br>
                  22.23<br>
                  <span class="text-success">+60.223%</span>
              </a>
                </li>
                <li class="nav-item"><a href="#" data-toggle="tab" class="">
              FB<br>
              45.97<br>
              <span class="text-danger">-06.56%</span>
          </a>
                </li>
                <li class="nav-item"><a href="#" data-toggle="tab" class="">
              GOOG<br>
              22.23<br>
              <span class="text-success">+60.223%</span>
          </a>
                </li>
              </ul>
              <div class="tab-content p-l-10 p-r-10">
                <div class="tab-pane no-padding active" id="widget-15-tab-1">
                  <div class="full-width">
                    <div class="full-width">
                      <div class="widget-15-chart rickshaw-chart"></div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane no-padding" id="widget-15-tab-2">
                </div>
                <div class="tab-pane" id="widget-15-tab-3">
                </div>
              </div>
              <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                <div class="row">
                  <div class="col-md-9">
                    <p class="fs-16">Apple’s Motivation - Innovation
                      <br>distinguishes between A leader and a follower.
                    </p>
                    <p class="small hint-text">VIA Apple Store (Consumer and Education Individuals)
                      <br>(800) MY-APPLE (800-692-7753)
                    </p>
                  </div>
                  <div class="col-md-3 text-right">
                    <p class="font-montserrat bold text-success m-r-20 fs-16 m-t-0">+0.94</p>
                    <p class="font-montserrat bold text-danger m-r-20 fs-16">-0.63</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
    </div>
    <!-- END CONTAINER FLUID -->
  </div>
@endsection

@section('lower-links-extend')
<script src="{{ asset('pages/assets/js/dashboard.js') }}" type="text/javascript"></script>
@endsection
