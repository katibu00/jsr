<li class="menu-item {{($route=='admin.home')?'active':''}}">
    <a href="{{ route('admin.home') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-home"></i>
      <div data-i18n="Home">Home</div>
    </a>
</li>

<li class="menu-item {{($route=='elections.index')?'active':''}}">
    <a href="{{ route('elections.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-copy"></i>
      <div data-i18n="Elections">Elections</div>
    </a>
</li>
<li class="menu-item {{($route=='result.post')?'active':''}}">
  <a href="{{ route('result.post') }}" class="menu-link">
    <i class="menu-icon tf-icons ti ti-speakerphone"></i>
    <div data-i18n="Post Result">Post Result</div>
  </a>
</li>

<li class="menu-item {{($prefix=='/users')?'active open':''}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons ti ti-users"></i>
    <div data-i18n="Users">Users</div>
  </a>
  <ul class="menu-sub">
    <li class="menu-item {{($route=='users.agents.index')?'active':''}}">
      <a href="{{ route('users.agents.index') }}" class="menu-link">
        <div data-i18n="Agents">Agents</div>
      </a>
    </li>
    <li class="menu-item {{($route=='lga.index')?'active':''}}">
      <a href="{{ route('lga.index') }}" class="menu-link">
        <div data-i18n="Admins">Admins</div>
      </a>
    </li>
   
  </ul>
</li>

<li class="menu-item {{($prefix=='/setups')?'active open':''}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons ti ti-settings"></i>
    <div data-i18n="Settings">Settings</div>
  </a>
  <ul class="menu-sub">
    <li class="menu-item {{($route=='lga.index')?'active':''}}">
      <a href="{{ route('lga.index') }}" class="menu-link">
        <div data-i18n="LGAs">LGAs</div>
      </a>
    </li>
    <li class="menu-item {{($route=='zone.index')?'active':''}}">
      <a href="{{ route('zone.index') }}" class="menu-link">
        <div data-i18n="Senatorial Zone">Senatorial Zones</div>
      </a>
    </li>
    <li class="menu-item {{($route=='wards.index')?'active':''}}">
      <a href="{{ route('wards.index') }}" class="menu-link">
        <div data-i18n="Wards">Wards</div>
      </a>
    </li>
    <li class="menu-item {{($route=='pus.index')?'active':''}}">
      <a href="{{ route('pus.index') }}" class="menu-link">
        <div data-i18n="Polling Units">Polling Units</div>
      </a>
    </li>
    <li class="menu-item {{($route=='pp.index')?'active':''}}">
      <a href="{{ route('pp.index') }}" class="menu-link">
        <div data-i18n="Political Parties">Political Parties</div>
      </a>
    </li>
  </ul>
</li>
