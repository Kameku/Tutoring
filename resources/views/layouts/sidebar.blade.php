<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{ URL::asset('/images/users/avatar-3.jpg')}}" alt="" class="avatar-md mx-auto rounded-circle">
            </div>
            
            
            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16">{{ Auth::user()->name }}</a>
                <p class="text-body mt-1 mb-0 font-size-13">Administrator</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Administrator</li>

                <li>
                    <a href="index" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="events" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="calendar" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Employees</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Students</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('enquiry.index')}}"> List Enquiry</a></li>
                        <li><a href="{{route('enquiry.create')}}">Create</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Tasks</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tasks-list">Task List</a></li>
                        <li><a href="tasks-create">Create Task</a></li>
                    </ul>
                </li>
                <li class="menu-title">Turores</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Calificaciones</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tasks-list">Examen 1</a></li>
                        <li><a href="tasks-create">Examen 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Library</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tasks-list">Subjects</a></li>
                        <li><a href="tasks-create">Concepts</a></li>
                        <li><a href="tasks-create">Concepts Details</a></li>
                        <li><a href="tasks-create">Learning Activities</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->