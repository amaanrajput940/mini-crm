<div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('companies.index')}}">
                <span data-feather="home"></span>
                {{ trans('sentence.companies')}} <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('employees.index')}}">
                <span data-feather="file"></span>
                Employee
            </a>
        </li>
    </ul>
    <h6 class="pl-3 mt-3 mb-0 text-light">Translator</h6>
    <ul class="nav flex-column">
        <li>
            <a href="{{url('dashboard/locale', 'en')}}" class="nav-link">English</a>
        </li>
        <li>
            <a href="{{url('dashboard/locale', 'fr')}}" class="nav-link">French</a>
        </li>
    </ul>
</div>
