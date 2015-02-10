
    <!-- Actions bar -->
    <div class="actions-bar tsticky">
        <div class="container">
            <div class="row">
                
                <div class="col-md-9 col-sm-9 col-md-offset-3">
                    <div class="btn-group pull-right results-sorter">
                        <button type="button" class="btn btn-default listing-sort-btn">Sort by</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Price (High to Low)</a></li>
                            <li><a href="#">Price (Low to High)</a></li>
                            <li><a href="#">Mileage (Low to High)</a></li>
                            <li><a href="#">Mileage (High to Low)</a></li>
                        </ul>
                    </div>
                    
                    <div class="toggle-view view-count-choice pull-right">
                        <label>Show</label>
                        <div class="btn-group">
                            <a href="#" class="btn btn-default">10</a>
                            <a href="#" class="btn btn-default active">20</a>
                            <a href="#" class="btn btn-default">50</a>
                        </div>
                    </div>
                    
                    <div class="toggle-view view-format-choice pull-right">
                        <label>View</label>
                        <div class="btn-group">
                            <a href="#" class="btn btn-default active" id="results-list-view"><i class="fa fa-th-list"></i></a>
                            <a href="#" class="btn btn-default" id="results-grid-view"><i class="fa fa-th"></i></a>
                        </div>
                    </div>
                    <!-- Small Screens Filters Toggle Button -->
                    <button class="btn btn-default visible-xs" id="Show-Filters">Search Filters</button> 
                </div>
            </div>
        </div>
    </div>