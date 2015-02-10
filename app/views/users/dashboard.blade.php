@extends('layouts.main')
<?php
$breadcrumb_t = 'Dashboard';
?>
@section('content')
    <div class="dashboard-wrapper">
        <div class="row">
            @include('includes.dashboard_sidebar')
            <div class="col-md-9 col-sm-8">
                <h2>Dashboard</h2>

                <p>Welcome back {{ Auth::user()->name }}!</p>

                <div class="dashboard-block">
                    <div class="dashboard-block-head">


                        <h3>Q&amp;A</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered dashboard-tables saved-cars-table">
                            <thead>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Description</td>
                                <td>Price/Status</td>
                                <td>Timestamp</td>
                                <td>Payment</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td valign="middle"><input type="checkbox"></td>
                                <td>
                                    <!-- Result -->
                                    <a href="vehicle-details.html" class="car-image"><img src="images/car2.jpg" alt=""></a>

                                    <div class="search-find-results">
                                        <h5><a href="vehicle-details.html">2010 BMW 125i E82 Coupe 2dr Auto 6sp 3.0i
                                                [MY10]</a></h5>
                                        <ul class="inline">
                                            <li><i class="fa fa-caret-right"></i> 2 door Coupe</li>
                                            <li><i class="fa fa-caret-right"></i> 6 cyl, 3.0 L Petrol</li>
                                            <li><i class="fa fa-caret-right"></i> 6 speed Automatic</li>
                                            <li><i class="fa fa-caret-right"></i> Rear Wheel Drive</li>
                                        </ul>
                                    </div>
                                </td>
                                <td><span class="price">$40,990</span></td>
                                <td><span class="text-success">Created on</span> 09/12/14 @ 12:09am</td>
                                <td align="center"><span class="label label-warning">Pending payment</span></td>
                                <td align="center">
                                    <button class="text-default" title="Archive"><i class="fa fa-archive"></i></button>
                                    <button class="text-danger" title="Delete"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop