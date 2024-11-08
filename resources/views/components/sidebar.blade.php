<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->





        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#students" data-bs-toggle="collapse" href="#">
                <i class="bi bi-files"></i><span>Students</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="students" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('students.create')}}">
                        <i class="bi bi-circle"></i>
                            <span>Create Student</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('students.index')}}">
                        <i class="bi bi-circle"></i>
                        <span>View Students</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#courses" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="courses" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('courses.create')}}">
                        <i class="bi bi-circle"></i>
                        <span>Create Course</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('courses.index')}}">
                        <i class="bi bi-circle"></i>
                        <span>View Courses</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#school_years" data-bs-toggle="collapse" href="">
                <i class="bi bi-calendar"></i><span>School Year</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="school_years" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('school_years.index')}}">
                        <i class="bi bi-circle"></i>
                        <span>View School Year</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('school_years.create')}}">
                        <i class="bi bi-circle"></i>
                        <span>Create School Year</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#transaction" data-bs-toggle="collapse" href="#">
                <i class="bi bi-diagram-3"></i><span>Transactions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="transaction" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('fees.create')}}">
                        <i class="bi bi-circle"></i>
                        <span>Add Fee</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('fees.index')}}">
                        <i class="bi bi-circle"></i>
                        <span>View Fee</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('payments.index')}}">
                <i class="bi bi-question-circle"></i>
                <span>Logs</span>
            </a>
        </li>
    </ul>

</aside>
