@extends('dashboard.layouts.master')

@section('title', 'Dashboard')
@section('pageClass','dashboard-home')

@section('content')
<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h1 class="text-primary mb-0">Dashboard</h1>
</div>
<div class="row" style="border-style: none;">
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-lg py-2" style="background: rgba(0,13,57,0);border-style: solid;border-color: #002ab4;">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col-auto mr-2"><i class="fas fa-hand-holding-usd fa-2x text-primary"></i></div>
                    <div class="col">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Earnings (monthly)</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span class="text-white">${{ $monthlyEarning }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-lg py-2" style="background: rgba(0,13,57,0);border-style: solid;border-color: #002ab4;">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col-auto mr-2"><i class="fas fa-dollar-sign fa-2x text-primary"></i></div>
                    <div class="col">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Earnings (annual)</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span class="text-white">${{ $annualEarining }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-lg py-2" style="background: rgba(0,13,57,0);border-style: solid;border-color: #002ab4;">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col-auto mr-2"><i class="fas fa-box fa-2x text-primary"></i></div>
                    <div class="col">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>PRoducts</span></div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span class="text-white">{{ $producutsCount }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow-lg py-2" style="background: rgba(255,255,255,0);border-style: solid;border-color: #002ab4;">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col-auto mr-2"><i class="fas fa-cart-arrow-down fa-2x text-primary"></i></div>
                    <div class="col">
                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Orders</span></div>
                        <div class="text-dark font-weight-bold h5 mb-0"><span class="text-white">{{ $ordersCount }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-12 col-xl-12">
        <div class="card shadow mb-4" style="background: rgba(255,255,255,0);border-style: solid;border-color: #002ab4;">
            <div class="card-header d-flex justify-content-between align-items-center" style="background: rgba(28,200,138,0);border-style: none;border-bottom-style: solid;border-bottom-color: #002ab4;">
                <h6 class="text-primary font-weight-bold m-0">This year earnings</h6>
            </div>
            <div class="card-body shadow-lg">
                <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;,&quot;Sep&quot;,&quot;Oct&quot;,&quot;Nov&quot;,&quot;Dec&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:{{ json_encode($thisYearEarnings) }},&quot;backgroundColor&quot;:&quot;rgba(0,42,180,0.13)&quot;,&quot;borderColor&quot;:&quot;#6589ff&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;#ffffff&quot;,&quot;zeroLineColor&quot;:&quot;#ffffff&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#7595ff&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;#ffffff&quot;,&quot;zeroLineColor&quot;:&quot;#ffffff&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#7595ff&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>
            </div>
        </div>
    </div>
</div>
@stop
