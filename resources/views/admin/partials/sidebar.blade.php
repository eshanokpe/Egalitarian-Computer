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
                <a class="has-arrow ai-icon" href="{{ route('admin.user.index') }}" aria-expanded="false">
                    <i class="flaticon-381-user-7"></i>
                    <span class="nav-text">Users</span>
                    
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.courses.index') }}" aria-expanded="false">
                    <i class="flaticon-381-book"></i>
                    <span class="nav-text">Courses</span>
                </a> 
            </li>
            <li>
                <a class="has-arrow ai-icon" href="{{ route('admin.slider.index') }}" aria-expanded="false">
                    <i class="flaticon-381-book"></i>
                    <span class="nav-text">Slider</span>
                </a> 
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