<div class="page-header parallax" style="background-image:url({{ asset('images/masthead.jpg') }});">
    	<div class="container">
        	<h1 class="page-title">{{ $breadcrumb_t or ''  }}</h1>
        	@if (isset($breadcrumb_p)) <p> {{ $breadcrumb_p  }} </p> @endif 
       	</div>
    </div>

    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home')}}">Home</a></li>
                        <li class="active"><a href="{{ Request::url() }}">{{ $breadcrumb_t }}</a></li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                	<ul class="utility-icons social-icons social-icons-colored">
                    	<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    	<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    	<li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
      	</div>
    </div>




@if((Route::currentRouteName()=='courses')||(Route::currentRouteName()=='courses.abroad'))
        @include('includes.listing_actionbar')
@endif