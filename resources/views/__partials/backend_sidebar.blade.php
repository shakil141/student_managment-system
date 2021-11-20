<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner bg-gradient bdrs-30">
        <header class="u-sidebar-header">
            <a class="u-sidebar-logo" href="index.html">
                <img class="img-fluid" src="assets/img/logo.png" width="124" alt="Stream Dashboard">
            </a>
        </header>

        <nav class="u-sidebar-nav">
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Dashboard -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @yield('dashboard')" href="index.html">
                        <i class="fas fa-tachometer-alt u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Students -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @yield('students')" href="#!" data-target="#students">
                        <i class="fas fa-user-graduate u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Students</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="students" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">

                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('student.index') }}">
                                <span class="u-sidebar-nav-menu__item-title">All Student</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('student.create') }}">
                                <span class="u-sidebar-nav-menu__item-title">Add Student</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Students -->

                <!-- Teachers -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @yield('teacher')" href="#!" data-target="#teachers">
                        <i class="fas fa-chalkboard-teacher u-sidebar-nav-menu__item-icon"></i>

                        <span class="u-sidebar-nav-menu__item-title">Teachers</span>

                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="teachers" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">

                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('teacher.index') }}">
                                <span class="u-sidebar-nav-menu__item-title">All Teacher</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('teacher.create') }}">
                                <span class="u-sidebar-nav-menu__item-title">Add Teacher</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Teachers -->

                <!-- Class -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @yield('class')" href="{{ route('class.index') }}">
                        <i class="fas fa-chalkboard-teacher u-sidebar-nav-menu__item-icon"></i>

                        <span class="u-sidebar-nav-menu__item-title">Class</span>

                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>


                </li>

                <!-- End Class -->

                 <!-- Subject -->
                 <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @yield('subject')" href="" data-target="#subjects" >
                        <i class="fas fa-chalkboard-teacher u-sidebar-nav-menu__item-icon"></i>

                        <span class="u-sidebar-nav-menu__item-title">Subject</span>

                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>


                    <ul id="subjects" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">

                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('subject.index') }}">
                                <span class="u-sidebar-nav-menu__item-title">All Subejct</span>
                            </a>
                        </li>
                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link" href="{{ route('subject.create') }}">
                                <span class="u-sidebar-nav-menu__item-title">Add Subject</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- End Subject -->
                <!-- Mark  -->
                <li class="u-sidebar-nav-menu__item u-sidebar-nav--opened">
                    <a class="u-sidebar-nav-menu__link" href="#!" data-target="#marks">
                        <i class="far fa-clipboard u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Marks</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>

                    <ul id="marks" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="">

                        <li class="u-sidebar-nav-menu__item">
                            <a class="u-sidebar-nav-menu__link active" href="{{ route('mark.index') }}">
                                <span class="u-sidebar-nav-menu__item-title">Marks</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- End Mark -->

            </ul>
        </nav>
    </div>
</aside>
