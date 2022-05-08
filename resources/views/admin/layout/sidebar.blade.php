<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/surveys') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.survey.title') }}</a></li>
           <!--<li class="nav-item"><a class="nav-link" href="{{ url('admin/questions') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.question.title') }}</a></li>-->
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/answers') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.answer.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/types') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.type.title') }}</a></li>
           {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/entries') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.entry.title') }}</a></li>--}}
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
