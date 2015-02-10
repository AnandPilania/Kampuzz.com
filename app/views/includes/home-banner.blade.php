<div class="hero-area">
        <!-- Search Form -->
        <div class="floated">
            <div class="search-form">
                <h2>Get Started</h2>
                <p>Search for Courses, Colleges, Tests &amp; Exams</p>
                <div class="search-form-inner">
                    <form>
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Enter course, college or exam name..">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">Search</button>
                            </span>
                        </div>
                        <span class="label label-warning pull-right">15,000+ Colleges</span>
                        <span class="label label-success pull-right">38,000+ Courses</span>
                        <a href="#" class="search-advanced-trigger">Advanced Search <i class="fa fa-arrow-down"></i></a>
                        <div class="row advanced-search-row">
                            <div class="col-md-3">
                                <label>Postcode</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Body Type</label>
                                <select name="Body Type" class="form-control selectpicker">
                                    <option selected>Any</option>
                                    <option>Wagon</option>
                                    <option>Minivan</option>
                                    <option>Coupe</option>
                                    <option>Crossover</option>
                                    <option>Van</option>
                                    <option>SUV</option>
                                    <option>Minicar</option>
                                    <option>Sedan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Make</label>
                                <select name="Make" class="form-control selectpicker">
                                    <option selected>Any</option>
                                    <option>Jaguar</option>
                                    <option>BMW</option>
                                    <option>Mercedes</option>
                                    <option>Porsche</option>
                                    <option>Nissan</option>
                                    <option>Mazda</option>
                                    <option>Acura</option>
                                    <option>Audi</option>
                                    <option>Bugatti</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Model</label>
                                <select name="Model" class="form-control selectpicker">
                                    <option selected>Any</option>
                                    <option>GTX</option>
                                    <option>GTR</option>
                                    <option>GTS</option>
                                    <option>RLX</option>
                                    <option>M6</option>
                                    <option>S Class</option>
                                    <option>C Class</option>
                                    <option>B Class</option>
                                    <option>A Class</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Start Hero Slider -->
        <div class="hero-slider heroflex flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-speed="7000" data-pause="yes">
            <ul class="slides">
                
                <li class="parallax" style="background-image:url({{ asset('images/slides/slide2.jpg')}});"></li>
                <li class="parallax" style="background-image:url({{ asset('images/slides/slide5.jpg')}});"></li>
                <li class="parallax" style="background-image:url({{ asset('images/slides/slide6.jpg')}});"></li>
                <li class="parallax" style="background-image:url({{ asset('images/slides/slide7.jpg')}});"></li>
            </ul>
        </div>
        <!-- End Hero Slider -->
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-8">
                    <div class="toggle-make">
                        <a href="#"><i class="fa fa-navicon"></i></a>
                        <span>Study Abroad</span>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-4">
                    <ul class="utility-icons social-icons social-icons-colored">
                        <li class="facebook"><a href="https://www.facebook.com/LiveKampuzz"><i class="fa fa-facebook"></i></a></li>
                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="by-type-options">
            <div class="container">
                <div class="row">
                    <ul class="owl-carousel carousel-alt" data-columns="6" data-autoplay="" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="6" data-items-desktop-small="4" data-items-mobile="3" data-items-tablet="4">

                    <?php

$countries = Menu::$countries;
foreach ($countries as $country)
{
    if ($country['code'])
    {
        echo '<li class="item">';

        echo '<a href="';
        echo route('courses.abroad', ['country' => $country['name']]);
        echo '">';
echo HTML::image("images/flags-iso/" . strtoupper($country['code']) . ".png", "Study in " . $country['name'] . "\"");
        echo '<span>' . $country['name'] . '</span></a>';
        
        echo '</li>';
    }
}
?>
                    </ul>
                </div>
            </div>
        </div>
    </div>