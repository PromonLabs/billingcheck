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
              <div class="col-md-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Comverse Check</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                          <tr>
                              <td>COM => ALL DATAFLOW cur. day</td>
                              <td><a href="billingadm/comv_all.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/com_alldata.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                              <td><a href="comverse/all_usage_slideshow.html">slide</td>
                            <!--   <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:com72">info</td>-->
                            </tr>
                            <tr>
                              <td>EMM => ALL DATAFLOW</td>
                              <td><a href="http://billingcheck.srv.gl/billingadm/stat_10.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/stat_10.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>EMM </td>
                              <td><a href="billingadm/stat_11.jpeg">daily</td>
                              <td>. </td>
                              <td>. </td>
                              <td>. </td>
                            <!--  <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:emm72">info</td>-->
                            </tr>
                            <tr>
                              <td>COM => ALL DATAFLOW</td>
                              <td><a href="http://billingcheck.srv.gl/billingadm/stat_12.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/stat_12.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>COM</td>
                              <td><a href="billingadm/stat_12a.jpeg">daily</td>
                              <td>.</td>
                              <td>.</td>
                              <td><a href="comverse/comx_slideshow.html">slide</td>
                            <!--   <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:com72">info</td>-->
                            </tr>
                            <tr>
                              <td>ADSL => EMM vs COM</td>
                            <!--  <td><a href="billingadm/adsl_hour02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td><a href="billingadm/com_adsl_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/com_adsl_hourly_dev.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>COM</td>
                              <td><a href="billingadm/com_adsl_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_adsl_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_adsl_monthly.jpeg">monthly</td>
                              <td><a href="comverse/ADSL_slideshow.html">slide</td>
                            <!--  <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:adsl">info</td> -->
                            </tr>
                            <tr>
                              <td>ADSL => RADIUSSESSIONS</td>
                            <!--  <td><a href="billingadm/adsl_hour02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td><a href="billingadm/adsl_session02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                              <td>.</td>
                            <!--  <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:adsl">info</td> -->
                            </tr>
                            <tr>
                              <td>VPN => EMM vs COM</td>
                            <!--  <td><a href="http://billingcheck.srv.gl/billingadm/vpn_hour02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td><a href="billingadm/com_vpn_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/com_vpn_hourly_dev.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>COM</td>
                              <td><a href="billingadm/com_vpn_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_vpn_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_vpn_monthly.jpeg">monthly</td>
                              <td><a href="comverse/VPN_slideshow.html">slide</td>
                            <!--  <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:vpn">info</td>-->
                            </tr>
                            <tr>
                              <td>INT MPLS => EMM vs COM</td>
                            <!--  <td><a href="billingadm/int_hour02.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td><a href="billingadm/com_int_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/com_int_hourly_dev.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>COM</td>
                              <td><a href="billingadm/com_int_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_int_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_int_monthly.jpeg">monthly</td>
                              <td><a href="comverse/INT_slideshow.html">slide</td>
                            <!--  <td><a href="http://wikmi.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:mpls">info</td>-->
                            </tr>
                            <tr>
                              <td>GSM => EMM vs COM</td>
                            <!--  <td><a href="billingadm/gsm_hour02a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td><a href="billingadm/com_gsm_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/com_gsm_hourly_dev.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>. </td>
                              <td>COM</td>
                              <td><a href="billingadm/com_gsm_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_gsm_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_gsm_monthly.jpeg">monthly</td>
                              <td><a href="comverse/GSM_slideshow.html">slide</td>
                            <!--  <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:gsm">info</td>-->
                            </tr>
                            <tr>
                              <td>2G/3G/4G => COM</td>
                            <!--  <td><a href="billingadm/gprs_hour02a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td><a href="billingadm/com_gprs_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/gprs_hour02.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>PREPAID / POSTPAID </td>
                              <td>COM</td>
                              <td><a href="billingadm/com_prepaid_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_prepaid_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_prepaid_monthly.jpeg">monthly</td>
                              <td><a href="comverse/2G_slideshow.html">slide</td>
                            <!-- <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:gprs">info</td>-->
                            </tr>
                            <tr>
                              <td>2G/3G/4G => EMM</td>
                              <td><a href="billingadm/emm_mobdata_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                            <!--  <td><a href="http://billingcheck.srv.gl/billingadm/lte_hour02a.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>  -->
                              <td><a href="lte_hour02.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>.</td>
                              <td>EMM</td>
                              <td><a href="billingadm/com_postpaid_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_postpaid_hourly.jpeg">hourly</td>
                              <td>.</td>
                              <td>.</td>
                            <!--  <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:lte">info</td>-->
                            </tr>
                            <tr>
                              <td>DIAX => EMM vs COM</td>
                              <td><a href="billingadm/com_diax_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                            <!--  <td><a href="billingadm/diax_hour03.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td><a href="comverse/com_diax_hourly_dev.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                              <td>5-6 hrs delay can occur</td>
                              <td>COM</td>
                              <td><a href="billingadm/com_diax_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_diax_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_diax_monthly.jpeg">monthly</td>
                              <td><a href="comverse/DIAX_slideshow.html">slide</td>
                            <!-- <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:diax">info</td> -->

                            </tr>
                            <tr>
                              <td>MMS => EMM vs COM</td>
                              <td><a href="billingadm/com_mms_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/com_mms_hourly_dev.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                            <!--  <td><a href="http://billingcheck.srv.gl/billingadm/mms_hour01.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td>5-6 hrs delay can occur </td>
                              <td>COM</td>
                              <td><a href="billingadm/com_mms_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_mms_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_mms_monthly.jpeg">monthly</td>
                              <td><a href="comverse/MMS_slideshow.html">slide</td>
                            <!--  <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:mms">info</td>-->

                            </tr>
                            <tr>
                              <td>IMS => EMM vs COM</td>
                              <td><a href="billingadm/com_ims_hourly_dev.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              <td><a href="comverse/com_ims_hourly_dev.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                            <!--  <td><a href="http://billingcheck.srv.gl/billingadm/ims_hour03.jpeg"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td> -->
                              <td>.</td>
                              <td>COM</td>
                              <td><a href="billingadm/com_ims_daily.jpeg">daily</td>
                              <td><a href="billingadm/com_ims_hourly.jpeg">hourly</td>
                              <td><a href="billingadm/com_ims_monthly.jpeg">monthly</td>
                              <td><a href="comverse/IMS_slideshow.html">slide</td>
                            <!-- <td><a href="http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:billingcheck:ims">info</td>-->

                            </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                  <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Link to Billingcheck :</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                      <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <td>Insert data</td>
                                <td><a href="itopscheck/comverselog_insert.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              </tr>
                              <tr>
                                <td>select data</td>
                                <td><a href="itopscheck/comverselog_select.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                              </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">WHO TO CONTACT:</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                      <table class="table mb-0">
                        <thead class="bg-light">
                          <tr>
                            <td>CONTACTS</td>
                            <td><a href="comverse/contacts.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">DOCUMENTS:</h6>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                      <table class="table mb-0">
                        <thead class="bg-light">
                          <tr>
                            <td>Billingsystem(principles)</td>
                            <td><a href="comverse/billinge2e.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                          </tr>
                          <tr>
                            <td>1 ADSL THE UPGRADE 2015 to DIAMETER  (documentary slides)</td>
                            <td><a href="comverse/ADSL_slideshowBU.html"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                          </tr>
                          <tr>
                            <td>2 ADSL THE UPGRADE 2015 to DIAMETER  (documentary slides)</td>
                            <td><a href="comverse/ADSL_slideshowBU02.html"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></td>
                          <tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
            <!-- End Default Light Table -->
        </div>
@endsection
