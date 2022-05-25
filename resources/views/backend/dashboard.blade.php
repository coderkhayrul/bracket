@extends('layouts.admin_layout')
@section('admin-content')
<div class="row row-sm">
    <div class="col-sm-6 col-xl-3">
        <div class="bg-info rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                        Today's Visits</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">5,000</p>
                    <span class="tx-11 tx-roboto tx-white-8">24% higher yesterday</span>
                </div>
            </div>
            <div id="ch1" class="ht-50 tr-y-1"></div>
        </div>
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
        <div class="bg-purple rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today
                        Sales</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">$300</p>
                    <span class="tx-11 tx-roboto tx-white-8">$390,212 before tax</span>
                </div>
            </div>
            <div id="ch3" class="ht-50 tr-y-1"></div>
        </div>
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="bg-teal rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">%
                        Unique Visits</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">35.45%</p>
                    <span class="tx-11 tx-roboto tx-white-8">23% average duration</span>
                </div>
            </div>
            <div id="ch2" class="ht-50 tr-y-1"></div>
        </div>
    </div><!-- col-3 -->
    <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="bg-primary rounded overflow-hidden">
            <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Bounce
                        Rate</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">32.16%</p>
                    <span class="tx-11 tx-roboto tx-white-8">65.45% on average time</span>
                </div>
            </div>
            <div id="ch4" class="ht-50 tr-y-1"></div>
        </div>
    </div><!-- col-3 -->
</div>
<!-- row -->
@endsection
