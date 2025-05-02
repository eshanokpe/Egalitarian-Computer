<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                </ul>
            </li>
            <li> 
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-user-7"></i>
                    <span class="nav-text">Users</span>
                   
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.users.index') }}">Add Users</a></li>

                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">
                    <i class="flaticon-381-book"></i>
                    <span class="nav-text">Courses</span>
                   
                </a> 
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.courses.index') }}">Add Course</a></li>

                </ul>
            </li>
           
            
           
        </ul>

        <div class="copyright">
            <p><strong>Egaliterian Computer</strong> ©  {{ date('Y') }} All Rights Reserved</p>
            <p>by Egaliterian </p>
        </div>
    </div>
</div>  
<script>
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>