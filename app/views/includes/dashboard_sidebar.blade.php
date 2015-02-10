<div class="col-md-3 col-sm-4 users-sidebar-wrapper">
    <!-- SIDEBAR -->
    <div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 405px;">
        <div class="users-sidebar tbssticky">

            <ul class="list-group">
                <li class="list-group-item active"><a href="{{ route('user.dashboard') }}"><i
                                class="fa fa-home"></i> Dashboard</a></li>
                <li class="list-group-item"><span class="badge">5</span> <a
                            href="{{ route('user.qna') }}"><i class="fa fa-question-circle"></i> Q&amp;A</a>
                </li>
                <li class="list-group-item"> <a
                            href="{{ route('user.following_institutes') }}"><i class="fa fa-star-o"></i>
                        Followed Institutes</a></li>
                <li class="list-group-item"> <a
                            href="{{ route('user.following_courses') }}"><i class="fa fa-star-o"></i>
                        Followed Courses</a></li>
                <li class="list-group-item"> <a
                            href="{{ route('user.following_exams') }}"><i class="fa fa-star-o"></i> Followed
                        Exams</a></li>

                <li class="list-group-item"><a href="{{ route('user.profile') }}"><i class="fa fa-user"></i>
                        My Profile</a></li>
                <li class="list-group-item"><a href="{{ route('user.logout') }}"><i
                                class="fa fa-sign-out"></i> Log Out</a></li>
            </ul>
        </div>
    </div>
</div>