@extends('layouts.app')

@section('title', 'Welcome')

@section('sidebar')
    @parent
@endsection

@section('content')
        <div class="main-content-container container-fluid px-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-2">

          </div>
          <!-- End Page Header -->
          <!-- Default Light Table -->
          <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">NOC</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <!-- <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">First Name</th>
                          <th scope="col" class="border-0">Last Name</th>
                          <th scope="col" class="border-0">Country</th>
                          <th scope="col" class="border-0">City</th>
                          <th scope="col" class="border-0">Phone</th>
                        </tr>
                      </thead> -->
                      <tbody>
                          <tr>
                              <td>COMVERSE  USAGE: last 72 hours</td>
                              <td><a href="billingadm/stat_12.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Updated every 60 minutes</td>
                            </tr>
                            <tr>
                              <td>COMVERSE USAGE: last 14 days</td>
                              <td><a href="billingadm/stat_12a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Updated every 60 minutes </td>
                            </tr>
                            <tr>
                              <td>USAGE: LOCATION/NASIP</td>
                              <td><a href="billingadm/adsl_day01.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>there should be usage in 20 loactions/nasip, updated every 30 minutes</td>
                            </tr>
                            <tr>
                              <td>USAGE hourly: modemuser ADSL NUUK</td>
                              <td><a href="billingadm/adsl_modem01b.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Subscriber : DSL000CC3D6E8ED app. 60 MB/hr</td>
                            </tr>
                            <tr>
                              <td>USAGE daily: modemuser ADSL NUUK : </td>
                              <td><a href="billingadm/adsl_modem01a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Subscriber : DSL000CC3D6E8ED app. 1440 MB/day</td>
                            </tr>
                            <tr>
                              <td>USAGE monthly: modemuser ADSL NUUK</td>
                              <td><a href="billingadm/adsl_modem01c.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Subscriber : DSL000CC3D6E8ED app. 46000 MB/month</td>
                            </tr>
                            <tr>
                              <td>USAGE hourly modemuser ADSL AASIAAT</td>
                              <td><a href="billingadm/adsl_modem02b.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Subscriber : DSL000CC3D6F1A9 app. 1440 MB/day</td>
                            </tr>
                            <tr>
                              <td>USAGE daily modemuser ADSL AASIAAT</td>
                              <td><a href="billingadm/adsl_modem02a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Subscriber : DSL000CC3D6F1A9 app. 1440 MB/day</td>
                            </tr>
                            <tr>
                              <td>USAGE monthly modemuser ADSL AASIAAT</td>
                              <td><a href="billingadm/adsl_modem02c.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Subscriber : DSL000CC3D6F1A9 app. 46000 MB/month</td>
                            </tr>
                            <tr>
                              <td>USAGE hourly: modemuser INTMPLS </td>
                              <td><a href="billingadm/int_modem02a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>INT82-INTER MPLS023 app. 60 MB/hr</td>
                            </tr>
                            <tr>
                              <td>USAGE daily: modemuser INTMPLS </td>
                              <td><a href="billingadm/int_modem02b.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>INT82-INTER MPLS023 app. 1440 MB/day</td>
                            </tr>
                            <tr>
                              <td>USAGE monthly: modemuser INTMPLS </td>
                              <td><a href="billingadm/int_modem03.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>INT82-INTER MPLS023 app. 46000 MB/Month</td>
                            </tr>
                            <tr>
                              <td>USAGE: modemuser INTMPLS (HEKOS) </td>
                              <td><a href="billingadm/int_modem01.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>INT82-INTER MPLS023 app. 60 MB/hr</td>
                            </tr>
                            <tr>
                              <td>USAGE: IMS call hourly </td>
                              <td><a href="billingadm/ims_customer01.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>362281 to 323555@mgc.ims.tele.gl</td>
                            </tr>
                            <tr>
                              <td>USAGE: IMS call daily</td>
                              <td><a href="billingadm/ims_day03.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>362281 to 323555@mgc.ims.tele.gl</td>
                            </tr>
                            <tr>
                              <td>USAGE: IMS call monthly</td>
                              <td><a href="billingadm/ims_day03a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>362281 to 323555@mgc.ims.tele.gl</td>
                            </tr>
                            <tr>
                              <td>USAGE: 4G daily / hourly 299511144 </td>
                              <td><a href="billingadm/lte_usb01.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>USB dongel download:  6 MB / Hour  :  COMVERSE  </td>
                            </tr>
                            <tr>
                              <td>USAGE: 2G/3G/4G data 527420  </td>
                              <td><a href="billingadm/lte_customer02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>TEST COMVERSE </td>
                            </tr>
                            <tr>
                              <td>USAGE: VOICE 527420  </td>
                              <td><a href="billingadm/gsm_customer01.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>TEST  COMVERSE  </td>
                            </tr>
                            <tr>
                              <td>USAGE: VOICE 527420  </td>
                              <td><a href="billingadm/gsm_customer02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>TEST  COMVERSE / EMM </td>
                            </tr>
                            <tr>
                              <td>USAGE: accounting sessions  HEKOS </td>
                              <td><a href="billingadm/adsl_hour08.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>HEKOS TEST TOP 100</td>
                            </tr>
                            <tr>
                              <td>USAGE: radiussessions</td>
                              <td><a href="billingadm/adsl_session02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>There should be between 8000 and  10000 sessions</td>
                            </tr>
                            <tr>
                              <td>Modems all</td>
                              <td><a href="billingadm/stat_13.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>48 hrs</td>
                            </tr>
                            <tr>
                              <td>COMVERSE USAGE GENEREL</td>
                              <td><a href="billingadm/comv_all.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>Updated ervery 60 minutes</td>
                            </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
        </div>
  @endsection
